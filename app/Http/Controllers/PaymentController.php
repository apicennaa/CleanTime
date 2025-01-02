<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PaymentController extends Controller
{
    public function index()
    {

        $invoices = session('invoice');
        return view('payment.index', compact('invoices'));
    }

    public function create(Request $request)
    {
        $order = Order::where('id', $request->order_id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        return view('payment.create', compact('order'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'payment_method' => 'required|in:credit_card,bank_transfer,e-wallet'
        ]);

        $order = Order::where('id', $request->order_id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        $payment = Payment::create([
            'order_id' => $order->id,
            'payment_method' => $request->payment_method,
        ]);

        $invoice = Order::select(
            'orders.id as order_id',
            'services.service_name',
            'orders.full_name',
            'orders.phone',
            'orders.address',
            'orders.service_date',
            'orders.service_time',
            'orders.status',
            'payments.payment_method',
            'services.service_price'
        )
            ->join('services', 'orders.service_id', '=', 'services.id')
            ->join('payments', 'orders.id', '=', 'payments.order_id')
            ->where('orders.id', $order->id)
            ->first();
        session()->put('order_id', $order->id);
        return redirect()->route('payment.index')
            ->with('success', 'Payment initiated successfully')
            ->with('invoice', $invoice);
    }


    public function downloadInvoice($id)
    {
        $order = Order::with('service')
            ->where('id', $id)
            ->firstOrFail();
        $payments = Payment::where('order_id', $id)->first();
        $data = [
            'service_name' => $order->service->service_name,
            'full_name' => $order->full_name,
            'phone' => $order->phone,
            'address' => $order->address,
            'service_date' => $order->service_date,
            'service_time' => $order->service_time,
            'status' => $order->status,
            'payment_method' => $payments->payment_method,
            'service_price' => $order->service->service_price,
        ];

        $pdf = Pdf::loadView('pdf.invoice', $data);

        return $pdf->download('invoice_' . $id . '.pdf');
    }
}
