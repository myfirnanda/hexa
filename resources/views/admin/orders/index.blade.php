@extends('layouts.admin')
@section('title', 'Orders')
@section('topbar-title', 'Orders')

@section('content')

{{-- Stat cards --}}
<div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
    @php
    $orderStats = [
        ['label' => 'Total',       'value' => $totalOrders,       'icon' => 'shopping_cart',   'color' => '#3b82f6', 'dim' => 'rgba(59,130,246,0.10)',  'filter' => ''],
        ['label' => 'Pending',     'value' => $pendingOrders,     'icon' => 'schedule',        'color' => '#f59e0b', 'dim' => 'rgba(245,158,11,0.10)',   'filter' => 'pending'],
        ['label' => 'In Progress', 'value' => $inProgressOrders,  'icon' => 'autorenew',       'color' => '#818cf8', 'dim' => 'rgba(129,140,248,0.10)',  'filter' => 'in_progress'],
        ['label' => 'Completed',   'value' => $completedOrders,   'icon' => 'task_alt',        'color' => '#10b981', 'dim' => 'rgba(16,185,129,0.10)',   'filter' => 'completed'],
    ];
    @endphp
    @foreach($orderStats as $stat)
    @php $isActive = $statusFilter === $stat['filter'] && $stat['filter'] !== ''; @endphp
    <a href="{{ route('manager.orders.index', array_filter(['status' => $stat['filter'], 'search' => $search])) }}"
       class="admin-card border rounded-xl p-5 relative overflow-hidden no-underline group transition-all duration-150 hover:scale-[1.01] {{ $isActive ? 'ring-2' : '' }}"
       style="{{ $isActive ? "ring-color: {$stat['color']};" : '' }}">
        <div class="absolute top-0 left-0 right-0 h-0.75 rounded-t-xl" style="background: {{ $stat['color'] }};"></div>
        <div class="flex items-start justify-between mb-4">
            <span class="text-[11px] font-bold admin-text-muted uppercase tracking-wider">{{ $stat['label'] }}</span>
            <div class="size-8 rounded-lg flex items-center justify-center shrink-0" style="background: {{ $stat['dim'] }};">
                <span class="material-symbols-outlined text-[18px]" style="color: {{ $stat['color'] }};">{{ $stat['icon'] }}</span>
            </div>
        </div>
        <div class="text-[28px] font-bold admin-text leading-none admin-stat-number" style="{{ $isActive ? "color: {$stat['color']};" : '' }}">{{ $stat['value'] }}</div>
    </a>
    @endforeach
</div>

<div class="admin-card border rounded-xl overflow-hidden">

    {{-- Search + filter toolbar --}}
    <div class="px-6 py-4 border-b admin-border flex items-center justify-between gap-3 flex-wrap">
        <div class="flex items-center gap-3 flex-wrap">
            <div>
                <span class="text-[14px] font-bold admin-text">Semua Orders</span>
                @if($statusFilter)
                <span class="ml-2 text-[11px] font-bold px-2 py-0.5 rounded-full uppercase tracking-wider" style="background: rgba(37,99,235,0.1); color: #60a5fa;">{{ str_replace('_', ' ', $statusFilter) }}</span>
                @endif
            </div>
            @if($statusFilter)
            <a href="{{ route('manager.orders.index', $search ? ['search' => $search] : []) }}" class="text-[12px] admin-text-muted no-underline hover:admin-text transition-colors">× Clear filter</a>
            @endif
        </div>
        <form method="GET" action="{{ route('manager.orders.index') }}" class="flex items-center gap-2">
            @if($statusFilter)
            <input type="hidden" name="status" value="{{ $statusFilter }}">
            @endif
            <div class="relative">
                <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-[18px] admin-text-muted pointer-events-none select-none">search</span>
                <input type="text" name="search" value="{{ $search }}" placeholder="Cari nama, email, perusahaan..."
                    class="admin-input admin-search-input rounded-lg pl-9 pr-3 py-2 text-sm outline-none w-55 focus:w-70"
                    autocomplete="off">
            </div>
            @if($search)
            <a href="{{ route('manager.orders.index', $statusFilter ? ['status' => $statusFilter] : []) }}" class="text-[12px] font-medium admin-text-muted no-underline px-2 py-2 rounded-lg admin-surface-hover">
                <span class="material-symbols-outlined text-[18px]">close</span>
            </a>
            @endif
        </form>
    </div>

    @if($orders->count())
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr style="background: var(--admin-surface-hover);">
                    <th class="text-left px-4 py-3 text-[11px] font-bold admin-text-muted uppercase tracking-wider border-b admin-border whitespace-nowrap w-10">#</th>
                    <th class="text-left px-4 py-3 text-[11px] font-bold admin-text-muted uppercase tracking-wider border-b admin-border whitespace-nowrap">Client</th>
                    <th class="text-left px-4 py-3 text-[11px] font-bold admin-text-muted uppercase tracking-wider border-b admin-border whitespace-nowrap">Budget</th>
                    <th class="text-left px-4 py-3 text-[11px] font-bold admin-text-muted uppercase tracking-wider border-b admin-border whitespace-nowrap">Status</th>
                    <th class="text-left px-4 py-3 text-[11px] font-bold admin-text-muted uppercase tracking-wider border-b admin-border whitespace-nowrap">Tanggal</th>
                    <th class="text-left px-4 py-3 text-[11px] font-bold admin-text-muted uppercase tracking-wider border-b admin-border whitespace-nowrap w-24">Aksi</th>
                </tr>
            </thead>
            <tbody class="admin-table-body">
                @foreach($orders as $order)
                @php
                    $sMap = ['pending' => ['#f59e0b','rgba(245,158,11,0.10)'], 'in_progress' => ['#818cf8','rgba(129,140,248,0.10)'], 'completed' => ['#10b981','rgba(16,185,129,0.10)'], 'rejected' => ['#f87171','rgba(239,68,68,0.10)']];
                    [$sc, $sdim] = $sMap[$order->status] ?? ['#64748b','rgba(100,116,139,0.10)'];
                @endphp
                <tr class="admin-table-hover">
                    <td class="px-4 py-3.5 text-[13px] admin-text-muted align-middle admin-stat-number">{{ $order->id }}</td>
                    <td class="px-4 py-3.5 align-middle">
                        <div class="text-[13px] font-semibold admin-text">{{ $order->name }}</div>
                        <div class="text-[11px] admin-text-muted mt-0.5">{{ $order->email }}</div>
                        @if($order->phone)<div class="text-[11px] admin-text-muted">{{ $order->phone }}</div>@endif
                        @if($order->file_path)
                        <div class="flex items-center gap-1 text-[11px] mt-0.5" style="color: #34d399;">
                            <span class="material-symbols-outlined text-[13px]">attach_file</span> File
                        </div>
                        @endif
                    </td>
                    <td class="px-4 py-3.5 text-[13px] align-middle admin-text-secondary font-medium admin-stat-number">{{ $order->budget ?: '—' }}</td>
                    <td class="px-4 py-3.5 align-middle">
                        <div class="mb-1.5">
                            <span class="inline-block px-2.5 py-1 rounded-full text-[11px] font-bold capitalize" style="background: {{ $sdim }}; color: {{ $sc }};">{{ str_replace('_', ' ', $order->status) }}</span>
                        </div>
                        <form method="POST" action="{{ route('manager.orders.status', [$order, 'pending']) }}">
                            @csrf @method('PATCH')
                            <select class="admin-input px-2 py-1 rounded-lg text-[12px] outline-none cursor-pointer" style="max-width: 130px;"
                                onchange="this.form.action='{{ url('/manager/orders/'.$order->id.'/status') }}/'+this.value; this.form.submit()">
                                <option value="" disabled selected>Ubah status...</option>
                                <option value="pending">Pending</option>
                                <option value="in_progress">In Progress</option>
                                <option value="completed">Completed</option>
                                <option value="rejected">Rejected</option>
                            </select>
                        </form>
                    </td>
                    <td class="px-4 py-3.5 align-middle admin-text-muted text-[12px] whitespace-nowrap admin-stat-number">
                        {{ $order->created_at->format('d M Y') }}<br>
                        <span class="text-[11px]">{{ $order->created_at->format('H:i') }}</span>
                    </td>
                    <td class="px-4 py-3.5 align-middle">
                        <div class="flex items-center gap-1.5">
                            <a href="{{ route('manager.orders.show', $order) }}"
                               class="inline-flex items-center justify-center size-8 rounded-lg no-underline transition-all duration-150 border"
                               style="background: rgba(37,99,235,0.08); color: #60a5fa; border-color: rgba(37,99,235,0.15);"
                               onmouseover="this.style.background='rgba(37,99,235,0.18)'"
                               onmouseout="this.style.background='rgba(37,99,235,0.08)'"
                               title="Lihat detail">
                                <span class="material-symbols-outlined text-[16px]">visibility</span>
                            </a>
                            <button onclick="confirmDelete('{{ route('manager.orders.destroy', $order) }}')"
                                class="inline-flex items-center justify-center size-8 rounded-lg cursor-pointer transition-all duration-150 border"
                                style="background: rgba(239,68,68,0.08); color: #f87171; border-color: rgba(239,68,68,0.15);"
                                onmouseover="this.style.background='rgba(239,68,68,0.18)'"
                                onmouseout="this.style.background='rgba(239,68,68,0.08)'"
                                title="Hapus order">
                                <span class="material-symbols-outlined text-[16px]">delete</span>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="px-6 py-4 border-t admin-border">{{ $orders->links() }}</div>

    @elseif($search || $statusFilter)
    <div class="flex flex-col items-center justify-center py-16 px-5">
        <span class="material-symbols-outlined text-5xl admin-text-muted mb-3 opacity-30">search_off</span>
        <p class="text-sm admin-text-secondary font-medium">Tidak ada order yang cocok dengan filter ini.</p>
        <a href="{{ route('manager.orders.index') }}" class="mt-3 text-[13px] no-underline" style="color: var(--admin-primary);">Hapus semua filter</a>
    </div>

    @else
    <div class="flex flex-col items-center justify-center py-16 px-5">
        <span class="material-symbols-outlined text-5xl admin-text-muted mb-3 opacity-30">inbox</span>
        <p class="text-sm admin-text-secondary">Belum ada order masuk.</p>
    </div>
    @endif
</div>
@endsection
