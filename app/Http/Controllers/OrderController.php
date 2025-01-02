<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\CleanerController;


class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['user', 'cleaner', 'service'])
            ->latest()
            ->paginate(10);

        if ($orders->isEmpty()) {
            return view('user.order.index')->with('orders', collect());
        }

        return view('user.order.index', compact('orders'));
    }


    public function create(Request $request)
    {
        $serviceId = $request->query('service_id');
        $service = Service::find($serviceId);

        if (!$service) {
            abort(404, 'Service not found');
        }

        return view('user.order.create', compact('service'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'service_date' => 'required|date',
            'service_time' => 'required',
            'notes' => 'nullable|string',
            'cleaner_id' => 'nullable|string'
        ]);

        $order = Order::create([
            'user_id' => auth()->id(),
            'service_id' => $request->service_id,
            'full_name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'service_date' => $request->service_date,
            'service_time' => $request->service_time,
            'notes' => $request->notes,
            'status' => 'pending',
            'cleaner_id' => $request->cleaner_id
        ]);

        return redirect()->route('payment.create', ['order_id' => $order->id]);
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,in_progress,completed,cancelled',
        ]);

        $order->update([
            'status' => $request->status,
        ]);

        return redirect()->route('user.order.index')->with('success', 'Order status updated successfully!');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('user.order.index')->with('success', 'Order deleted successfully!');
    }
}
