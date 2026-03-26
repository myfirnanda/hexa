@extends('layouts.admin')
@section('title', 'Orders')
@section('topbar-title', 'Orders')

@section('content')
<div class="flex items-center justify-between flex-wrap gap-4 mb-7 max-md:flex-col max-md:items-start">
    <div>
        <h1 class="text-2xl font-bold">Orders</h1>
        <p class="text-sm admin-text-muted mt-1">Kelola semua order dari klien</p>
    </div>
</div>

<div class="grid grid-cols-4 gap-4 mb-6 max-lg:grid-cols-2 max-sm:grid-cols-1">
    <div class="admin-card border rounded-xl p-4 flex items-center gap-4">
        <div class="w-10 h-10 rounded-lg flex items-center justify-center bg-blue-500/12 text-blue-400">
            <span class="material-symbols-outlined">shopping_cart</span>
        </div>
        <div>
            <div class="text-xs admin-text-muted">Total</div>
            <div class="text-xl font-bold">{{ $totalOrders }}</div>
        </div>
    </div>
    <div class="admin-card border rounded-xl p-4 flex items-center gap-4">
        <div class="w-10 h-10 rounded-lg flex items-center justify-center bg-yellow-500/12 text-yellow-400">
            <span class="material-symbols-outlined">pending</span>
        </div>
        <div>
            <div class="text-xs admin-text-muted">Pending</div>
            <div class="text-xl font-bold">{{ $pendingOrders }}</div>
        </div>
    </div>
    <div class="admin-card border rounded-xl p-4 flex items-center gap-4">
        <div class="w-10 h-10 rounded-lg flex items-center justify-center bg-indigo-500/12 text-indigo-400">
            <span class="material-symbols-outlined">autorenew</span>
        </div>
        <div>
            <div class="text-xs admin-text-muted">In Progress</div>
            <div class="text-xl font-bold">{{ $inProgressOrders }}</div>
        </div>
    </div>
    <div class="admin-card border rounded-xl p-4 flex items-center gap-4">
        <div class="w-10 h-10 rounded-lg flex items-center justify-center bg-green-500/12 text-green-400">
            <span class="material-symbols-outlined">check_circle</span>
        </div>
        <div>
            <div class="text-xs admin-text-muted">Completed</div>
            <div class="text-xl font-bold">{{ $completedOrders }}</div>
        </div>
    </div>
</div>

<div class="admin-card border rounded-xl overflow-hidden">
    <div class="px-5 py-4 border-b admin-border flex items-center justify-between gap-3">
        <h2 class="text-[15px] font-semibold">Semua Orders</h2>
    </div>
    @if($orders->count())
    <div class="overflow-x-auto">
        <table class="w-full border-collapse">
            <thead>
                <tr>
                    <th class="text-left px-4 py-2.5 text-xs font-semibold admin-text-muted uppercase tracking-wide border-b admin-border whitespace-nowrap">#</th>
                    <th class="text-left px-4 py-2.5 text-xs font-semibold admin-text-muted uppercase tracking-wide border-b admin-border whitespace-nowrap">Client</th>
                    <th class="text-left px-4 py-2.5 text-xs font-semibold admin-text-muted uppercase tracking-wide border-b admin-border whitespace-nowrap">Budget</th>
                    <th class="text-left px-4 py-2.5 text-xs font-semibold admin-text-muted uppercase tracking-wide border-b admin-border whitespace-nowrap">Status</th>
                    <th class="text-left px-4 py-2.5 text-xs font-semibold admin-text-muted uppercase tracking-wide border-b admin-border whitespace-nowrap">Tanggal</th>
                    <th class="text-left px-4 py-2.5 text-xs font-semibold admin-text-muted uppercase tracking-wide border-b admin-border whitespace-nowrap">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                @php
                    $badgeClasses = match($order->status) {
                        'pending' => 'bg-yellow-500/12 text-yellow-400',
                        'in_progress' => 'bg-blue-500/12 text-blue-400',
                        'completed' => 'bg-green-500/12 text-green-400',
                        'rejected' => 'bg-red-500/12 text-red-400',
                        default => 'bg-slate-500/12 text-slate-400',
                    };
                @endphp
                <tr class="admin-table-hover">
                    <td class="px-4 py-3 text-sm border-b admin-border-light align-middle">{{ $order->id }}</td>
                    <td class="px-4 py-3 text-sm border-b admin-border-light align-middle">
                        <div class="font-semibold">{{ $order->name }}</div>
                        <div class="text-xs admin-text-muted">{{ $order->email }}</div>
                        @if($order->phone)<div class="text-xs admin-text-muted">{{ $order->phone }}</div>@endif
                        @if($order->file_path)
                        <div class="flex items-center gap-1 text-[11px] text-green-400 mt-0.5">
                            <span class="material-symbols-outlined text-[14px]">attach_file</span> File
                        </div>
                        @endif
                    </td>
                    <td class="px-4 py-3 text-sm border-b admin-border-light align-middle admin-text-secondary">{{ $order->budget ?: '-' }}</td>
                    <td class="px-4 py-3 text-sm border-b admin-border-light align-middle">
                        <span class="inline-block px-2.5 py-1 rounded-full text-xs font-semibold {{ $badgeClasses }}">{{ str_replace('_', ' ', $order->status) }}</span>
                        <form method="POST" action="{{ route('admin.orders.status', [$order, 'pending']) }}" class="mt-1.5">
                            @csrf
                            @method('PATCH')
                            <select class="admin-input px-2 py-1 rounded-lg text-xs outline-none transition-colors duration-200 focus:border-blue-500 cursor-pointer max-w-[130px]" onchange="this.form.action='{{ url('/admin/orders/'.$order->id.'/status') }}/'+this.value;this.form.submit()">
                                <option value="" disabled selected>Ubah...</option>
                                <option value="pending">Pending</option>
                                <option value="in_progress">In Progress</option>
                                <option value="completed">Completed</option>
                                <option value="rejected">Rejected</option>
                            </select>
                        </form>
                    </td>
                    <td class="px-4 py-3 text-sm border-b admin-border-light align-middle admin-text-muted text-[13px] whitespace-nowrap">
                        {{ $order->created_at->format('d M Y') }}<br>
                        <span class="admin-text-muted">{{ $order->created_at->format('H:i') }}</span>
                    </td>
                    <td class="px-4 py-3 text-sm border-b admin-border-light align-middle">
                        <div class="flex items-center gap-2">
                            <a href="{{ route('admin.orders.show', $order) }}" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg font-semibold text-[13px] admin-btn-secondary no-underline border-none cursor-pointer transition-all duration-150" title="Detail">
                                <span class="material-symbols-outlined">visibility</span>
                            </a>
                            <button class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg font-semibold text-[13px] bg-red-500/12 text-red-400 border border-red-500/20 cursor-pointer transition-all duration-150 hover:bg-red-500/20" onclick="confirmDelete('{{ route('admin.orders.destroy', $order) }}')" title="Hapus">
                                <span class="material-symbols-outlined">delete</span>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="px-5 py-4">
        {{ $orders->links() }}
    </div>
    @else
    <div class="text-center py-12 px-5 admin-text-muted">
        <span class="material-symbols-outlined block text-5xl mb-3 opacity-50">inbox</span>
        <p>Belum ada order. Order akan muncul ketika klien submit form kontak.</p>
    </div>
    @endif
</div>
@endsection
