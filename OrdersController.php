<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    /**
     * Melihat daftar order.
     * User hanya melihat order mereka, admin melihat semua order.
     */
    public function index()
    {
        // Cek role user (user melihat order mereka sendiri, admin melihat semua order)
        if (Auth::user()->role === 'admin') {
            $orders = Orders::all();
        } else {
            $orders = Orders::where('user_id', Auth::id())->get();
        }

        $nav = 'Orders List';
        return view('orders.index', compact('orders', 'nav'));
    }

    /**
     * Membuat order baru (form untuk order).
     */
    public function create()
    {
        $nav = 'Create Order';
        return view('orders.create', compact('nav'));
    }

    /**
     * Menyimpan order baru.
     */
    public function store(Request $request)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'service_id' => 'required|exists:services,id',
            'cleaner_id' => 'nullable|exists:cleaners,id',
            'address' => 'required|string|max:255',
            'date' => 'required|date|after_or_equal:today',
            'status' => 'nullable|string|in:pending,in_progress,completed,cancelled',
        ]);

        // Tambahkan ID user yang sedang login
        $validatedData['user_id'] = Auth::id();
        $validatedData['status'] = 'pending'; // Set default status

        // Buat order baru
        Orders::create($validatedData);

        return redirect()->route('orders.index')->with('success', 'Order successfully created.');
    }

    /**
     * Menampilkan detail order.
     */
    public function show(string $id)
    {
        $order = Orders::findOrFail($id);

        // Pastikan user hanya bisa melihat order mereka sendiri (kecuali admin)
        if (Auth::user()->role !== 'admin' && $order->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $nav = 'Order Details';
        return view('orders.show', compact('order', 'nav'));
    }

    /**
     * Mengubah status order.
     */
    public function update(Request $request, string $id)
    {
        $order = Orders::findOrFail($id);

        // Validasi data input
        $validatedData = $request->validate([
            'status' => 'required|string|in:pending,in_progress,completed,cancelled',
        ]);

        // Pastikan hanya admin atau user pemilik order yang bisa mengubah status
        if (Auth::user()->role !== 'admin' && $order->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        // Update status order
        $order->update($validatedData);

        return redirect()->route('orders.show', $id)->with('success', 'Order status updated successfully.');
    }

    /**
     * Menghapus order (user membatalkan order atau admin menghapus).
     */
    public function destroy(string $id)
    {
        $order = Orders::findOrFail($id);

        // Pastikan hanya admin atau user pemilik order yang bisa menghapus
        if (Auth::user()->role !== 'admin' && $order->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
    }
}
