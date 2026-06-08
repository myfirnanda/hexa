<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search', '');
        $statusFilter = $request->input('status', '');

        $orders = Order::query()
            ->when($search, fn($q) => $q->where(fn($sub) => $sub
                ->where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%")
                ->orWhere('company', 'like', "%{$search}%")))
            ->when($statusFilter, fn($q) => $q->where('status', $statusFilter))
            ->latest()
            ->paginate(15)
            ->withQueryString();

        $totalOrders     = Order::count();
        $pendingOrders   = Order::where('status', 'pending')->count();
        $inProgressOrders = Order::where('status', 'in_progress')->count();
        $completedOrders = Order::where('status', 'completed')->count();

        return view('admin.orders.index', compact(
            'orders', 'totalOrders', 'pendingOrders', 'inProgressOrders',
            'completedOrders', 'search', 'statusFilter'
        ));
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
        return redirect()->route('manager.orders.index')->with('success', 'Order berhasil dihapus.');
    }
}
