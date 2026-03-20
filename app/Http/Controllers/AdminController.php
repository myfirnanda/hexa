<?php

namespace App\Http\Controllers;

use App\Models\Order;

class AdminController extends Controller
{
    public function dashboard()
    {
        $orders = Order::latest()->paginate(15);
        $totalOrders = Order::count();
        $pendingOrders = Order::where('status', 'pending')->count();
        $inProgressOrders = Order::where('status', 'in_progress')->count();
        $completedOrders = Order::where('status', 'completed')->count();

        return view('admin.dashboard', compact('orders', 'totalOrders', 'pendingOrders', 'inProgressOrders', 'completedOrders'));
    }

    public function show(Order $order)
    {
        return view('admin.order-detail', compact('order'));
    }

    public function updateStatus(Order $order, string $status)
    {
        if (!in_array($status, ['pending', 'in_progress', 'completed', 'rejected'])) {
            abort(400);
        }
        $order->update(['status' => $status]);
        return back()->with('success', 'Order status updated.');
    }
}
