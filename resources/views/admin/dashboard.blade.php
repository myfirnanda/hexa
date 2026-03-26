@extends('layouts.admin')
@section('title', 'Dashboard')
@section('topbar-title', 'Beranda')

@section('content')
{{-- Greeting --}}
<div class="mb-8">
    <h1 class="text-[22px] font-bold admin-text leading-tight">Selamat Datang, {{ Auth::user()->name }}</h1>
    <p class="text-sm admin-text-muted mt-1">Ringkasan aktivitas dan data website Hexavara Technology</p>
</div>

{{-- Order Stats Row --}}
<div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
    {{-- Total Orders --}}
    <div class="admin-card border rounded-xl p-4 group">
        <div class="flex items-center justify-between mb-3">
            <span class="text-[13px] font-medium admin-text-muted">Total Orders</span>
            <div class="size-9 rounded-lg flex items-center justify-center bg-blue-500/10 text-blue-500">
                <span class="material-symbols-outlined text-xl">shopping_cart</span>
            </div>
        </div>
        <div class="text-[28px] font-bold admin-text leading-none">{{ $totalOrders }}</div>
        <div class="text-[12px] admin-text-muted mt-2">Semua order masuk</div>
    </div>

    {{-- Pending --}}
    <div class="admin-card border rounded-xl p-4 group">
        <div class="flex items-center justify-between mb-3">
            <span class="text-[13px] font-medium admin-text-muted">Pending</span>
            <div class="size-9 rounded-lg flex items-center justify-center bg-amber-500/10 text-amber-500">
                <span class="material-symbols-outlined text-xl">schedule</span>
            </div>
        </div>
        <div class="text-[28px] font-bold admin-text leading-none">{{ $pendingOrders }}</div>
        <div class="text-[12px] admin-text-muted mt-2">Menunggu ditindaklanjuti</div>
    </div>

    {{-- In Progress --}}
    <div class="admin-card border rounded-xl p-4 group">
        <div class="flex items-center justify-between mb-3">
            <span class="text-[13px] font-medium admin-text-muted">In Progress</span>
            <div class="size-9 rounded-lg flex items-center justify-center bg-indigo-500/10 text-indigo-500">
                <span class="material-symbols-outlined text-xl">pending_actions</span>
            </div>
        </div>
        <div class="text-[28px] font-bold admin-text leading-none">{{ $inProgressOrders }}</div>
        <div class="text-[12px] admin-text-muted mt-2">Sedang dikerjakan</div>
    </div>

    {{-- Completed --}}
    <div class="admin-card border rounded-xl p-4 group">
        <div class="flex items-center justify-between mb-3">
            <span class="text-[13px] font-medium admin-text-muted">Completed</span>
            <div class="size-9 rounded-lg flex items-center justify-center bg-emerald-500/10 text-emerald-500">
                <span class="material-symbols-outlined text-xl">task_alt</span>
            </div>
        </div>
        <div class="text-[28px] font-bold admin-text leading-none">{{ $completedOrders }}</div>
        <div class="text-[12px] admin-text-muted mt-2">Selesai dikerjakan</div>
    </div>
</div>

{{-- Two Column: Order Activity Chart + Order Status Breakdown --}}
<div class="grid grid-cols-1 lg:grid-cols-3 gap-4 mb-6">
    {{-- Monthly Activity (takes 2 cols) --}}
    <div class="lg:col-span-2 admin-card border rounded-xl overflow-hidden">
        <div class="px-5 py-4 admin-border border-b flex items-center justify-between">
            <div>
                <h2 class="text-[15px] font-semibold admin-text">Aktivitas Order</h2>
                <p class="text-[12px] admin-text-muted mt-0.5">6 bulan terakhir</p>
            </div>
        </div>
        <div class="p-5">
            <div class="flex items-end gap-3 h-[180px]">
                @php
                    $counts = array_column($monthlyOrders, 'count');
                    $maxCount = empty($counts) ? 1 : max($counts);
                @endphp
                @foreach($monthlyOrders as $mo)
                <div class="flex-1 flex flex-col items-center gap-2 h-full justify-end">
                    <span class="text-[12px] font-semibold admin-text">{{ $mo['count'] }}</span>
                    <div class="w-full max-w-[48px] rounded-t-md bg-blue-500/80 transition-all duration-300" style="height: {{ $maxCount > 0 ? max(($mo['count'] / $maxCount) * 140, 4) : 4 }}px;"></div>
                    <span class="text-[11px] admin-text-muted font-medium">{{ $mo['month'] }}</span>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Order Status Breakdown --}}
    <div class="admin-card border rounded-xl overflow-hidden">
        <div class="px-5 py-4 admin-border border-b">
            <h2 class="text-[15px] font-semibold admin-text">Status Orders</h2>
            <p class="text-[12px] admin-text-muted mt-0.5">Distribusi status saat ini</p>
        </div>
        <div class="p-5 space-y-4">
            @php
                $statuses = [
                    ['label' => 'Pending', 'count' => $pendingOrders, 'color' => 'bg-amber-500', 'text' => 'text-amber-500'],
                    ['label' => 'In Progress', 'count' => $inProgressOrders, 'color' => 'bg-indigo-500', 'text' => 'text-indigo-500'],
                    ['label' => 'Completed', 'count' => $completedOrders, 'color' => 'bg-emerald-500', 'text' => 'text-emerald-500'],
                    ['label' => 'Rejected', 'count' => $rejectedOrders, 'color' => 'bg-red-500', 'text' => 'text-red-500'],
                ];
            @endphp
            @foreach($statuses as $s)
            <div>
                <div class="flex items-center justify-between mb-1.5">
                    <span class="text-[13px] font-medium admin-text-secondary">{{ $s['label'] }}</span>
                    <span class="text-[13px] font-semibold {{ $s['text'] }}">{{ $s['count'] }}</span>
                </div>
                <div class="h-2 rounded-full admin-border" style="background: var(--admin-surface-hover);">
                    <div class="h-full rounded-full {{ $s['color'] }} transition-all duration-500" style="width: {{ $totalOrders > 0 ? round(($s['count'] / $totalOrders) * 100) : 0 }}%;"></div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

{{-- Content Stats Row --}}
<div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
    <a href="{{ route('admin.services.index') }}" class="admin-card border rounded-xl p-4 no-underline transition-all duration-150 hover:scale-[1.02] hover:shadow-lg">
        <div class="flex items-center gap-3">
            <div class="size-10 rounded-lg flex items-center justify-center bg-blue-500/10 text-blue-500 shrink-0">
                <span class="material-symbols-outlined text-xl">category</span>
            </div>
            <div class="min-w-0">
                <div class="text-[20px] font-bold admin-text leading-none">{{ $totalServices }}</div>
                <div class="text-[12px] admin-text-muted mt-1">Produk / Layanan</div>
            </div>
        </div>
    </a>
    <a href="{{ route('admin.projects.index') }}" class="admin-card border rounded-xl p-4 no-underline transition-all duration-150 hover:scale-[1.02] hover:shadow-lg">
        <div class="flex items-center gap-3">
            <div class="size-10 rounded-lg flex items-center justify-center bg-indigo-500/10 text-indigo-500 shrink-0">
                <span class="material-symbols-outlined text-xl">work</span>
            </div>
            <div class="min-w-0">
                <div class="text-[20px] font-bold admin-text leading-none">{{ $totalProjects }}</div>
                <div class="text-[12px] admin-text-muted mt-1">Project</div>
            </div>
        </div>
    </a>
    <a href="{{ route('admin.clients.index') }}" class="admin-card border rounded-xl p-4 no-underline transition-all duration-150 hover:scale-[1.02] hover:shadow-lg">
        <div class="flex items-center gap-3">
            <div class="size-10 rounded-lg flex items-center justify-center bg-emerald-500/10 text-emerald-500 shrink-0">
                <span class="material-symbols-outlined text-xl">apartment</span>
            </div>
            <div class="min-w-0">
                <div class="text-[20px] font-bold admin-text leading-none">{{ $totalClients }}</div>
                <div class="text-[12px] admin-text-muted mt-1">Clients</div>
            </div>
        </div>
    </a>
    <a href="{{ route('admin.testimonials.index') }}" class="admin-card border rounded-xl p-4 no-underline transition-all duration-150 hover:scale-[1.02] hover:shadow-lg">
        <div class="flex items-center gap-3">
            <div class="size-10 rounded-lg flex items-center justify-center bg-amber-500/10 text-amber-500 shrink-0">
                <span class="material-symbols-outlined text-xl">rate_review</span>
            </div>
            <div class="min-w-0">
                <div class="text-[20px] font-bold admin-text leading-none">{{ $totalTestimonials }}</div>
                <div class="text-[12px] admin-text-muted mt-1">Testimonials</div>
            </div>
        </div>
    </a>
</div>

{{-- Two Column: Recent Orders + Popular Categories --}}
<div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
    {{-- Recent Orders (takes 2 cols) --}}
    <div class="lg:col-span-2 admin-card border rounded-xl overflow-hidden">
        <div class="px-5 py-4 admin-border border-b flex items-center justify-between">
            <div>
                <h2 class="text-[15px] font-semibold admin-text">Order Terbaru</h2>
                <p class="text-[12px] admin-text-muted mt-0.5">5 order terakhir yang masuk</p>
            </div>
            <a href="{{ route('admin.orders.index') }}" class="text-[13px] font-medium text-blue-500 no-underline hover:text-blue-400 transition-colors">
                Lihat Semua &rarr;
            </a>
        </div>
        @if($recentOrders->count())
        <div class="divide-y admin-border">
            @foreach($recentOrders as $order)
            <div class="px-5 py-3.5 flex items-center gap-4 admin-table-hover transition-colors">
                <div class="size-9 rounded-lg flex items-center justify-center shrink-0 text-sm font-bold
                    @if($order->status === 'completed') bg-emerald-500/10 text-emerald-500
                    @elseif($order->status === 'in_progress') bg-indigo-500/10 text-indigo-500
                    @elseif($order->status === 'rejected') bg-red-500/10 text-red-500
                    @else bg-amber-500/10 text-amber-500
                    @endif
                ">{{ strtoupper(substr($order->name, 0, 2)) }}</div>
                <div class="flex-1 min-w-0">
                    <div class="text-sm font-semibold admin-text truncate">{{ $order->name }}</div>
                    <div class="text-[12px] admin-text-muted truncate">{{ $order->company ?: $order->email }}</div>
                </div>
                <div class="text-right shrink-0 hidden sm:block">
                    <div class="text-sm font-medium admin-text-secondary">{{ $order->budget ?: '-' }}</div>
                    <div class="text-[11px] admin-text-muted">{{ $order->created_at->format('d M Y') }}</div>
                </div>
                <div class="shrink-0">
                    @php
                        $badgeMap = [
                            'pending' => 'bg-amber-500/10 text-amber-500',
                            'in_progress' => 'bg-indigo-500/10 text-indigo-500',
                            'completed' => 'bg-emerald-500/10 text-emerald-500',
                            'rejected' => 'bg-red-500/10 text-red-500',
                        ];
                    @endphp
                    <span class="inline-block px-2.5 py-1 rounded-md text-[11px] font-semibold capitalize {{ $badgeMap[$order->status] ?? '' }}">{{ str_replace('_', ' ', $order->status) }}</span>
                </div>
                <a href="{{ route('admin.orders.show', $order) }}" class="flex items-center justify-center size-8 rounded-lg admin-text-muted no-underline transition-all duration-150 admin-surface-hover shrink-0">
                    <span class="material-symbols-outlined text-lg">chevron_right</span>
                </a>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-16 px-5">
            <span class="material-symbols-outlined text-4xl admin-text-muted mb-3 block opacity-40">inbox</span>
            <p class="text-sm admin-text-muted">Belum ada order masuk.</p>
        </div>
        @endif
    </div>

    {{-- Popular Categories --}}
    <div class="admin-card border rounded-xl overflow-hidden">
        <div class="px-5 py-4 admin-border border-b">
            <h2 class="text-[15px] font-semibold admin-text">Kategori Populer</h2>
            <p class="text-[12px] admin-text-muted mt-0.5">Layanan paling diminati</p>
        </div>
        @if($allCategories->count())
        <div class="p-5 space-y-3">
            @php $catMax = $allCategories->first(); @endphp
            @foreach($allCategories as $catName => $catCount)
            <div>
                <div class="flex items-center justify-between mb-1.5">
                    <span class="text-[13px] font-medium admin-text-secondary capitalize">{{ str_replace(['-', '_'], ' ', $catName) }}</span>
                    <span class="text-[12px] font-semibold admin-text-muted">{{ $catCount }}x</span>
                </div>
                <div class="h-1.5 rounded-full" style="background: var(--admin-surface-hover);">
                    <div class="h-full rounded-full bg-blue-500 transition-all duration-500" style="width: {{ $catMax > 0 ? round(($catCount / $catMax) * 100) : 0 }}%;"></div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-12 px-5">
            <span class="material-symbols-outlined text-3xl admin-text-muted mb-2 block opacity-40">bar_chart</span>
            <p class="text-[13px] admin-text-muted">Belum cukup data kategori.</p>
        </div>
        @endif
    </div>
</div>
@endsection
