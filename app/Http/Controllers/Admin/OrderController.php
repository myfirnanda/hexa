<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::latest()->paginate(15);
        $totalOrders = Order::count();
        $pendingOrders = Order::where('status', 'pending')->count();
        $inProgressOrders = Order::where('status', 'in_progress')->count();
        $completedOrders = Order::where('status', 'completed')->count();

        return view('admin.orders.index', compact('orders', 'totalOrders', 'pendingOrders', 'inProgressOrders', 'completedOrders'));
    }

    public function show(Order $order)
    {
        return view('admin.orders.show', compact('order'));
    }

    public function updateStatus(Order $order, string $status)
    {
        if (!in_array($status, ['pending', 'in_progress', 'completed', 'rejected'])) {
            abort(400);
        }
        $order->update(['status' => $status]);
        return back()->with('success', 'Status order berhasil diperbarui.');
    }

    public function destroy(Order $order)
    {
        if ($order->file_path && file_exists(storage_path('app/public/' . $order->file_path))) {
            unlink(storage_path('app/public/' . $order->file_path));
        }
        $order->delete();
        return redirect()->route('admin.orders.index')->with('success', 'Order berhasil dihapus.');
    }
}
