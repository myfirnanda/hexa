@extends('layouts.admin')
@section('title', 'Dashboard')
@section('topbar-title', 'Beranda')

@section('content')

{{-- Page header --}}
<div class="mb-8">
    <h1 class="text-xl font-bold admin-text leading-tight">Selamat datang kembali, <span style="color: var(--admin-brand);">{{ Auth::user()->name }}</span></h1>
    <p class="text-sm admin-text-muted mt-1">Ringkasan aktivitas Hexavara Technology — {{ now()->translatedFormat('l, d F Y') }}</p>
</div>

{{-- Order Stat Cards --}}
<div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-6">

    @php
    $statCards = [
        ['label' => 'Total Orders',  'value' => $totalOrders,      'sub' => 'Semua order masuk',       'icon' => 'shopping_cart',   'color' => '#3b82f6', 'dim' => 'rgba(59,130,246,0.10)'],
        ['label' => 'Pending',       'value' => $pendingOrders,     'sub' => 'Menunggu tindak lanjut',  'icon' => 'schedule',        'color' => '#f59e0b', 'dim' => 'rgba(245,158,11,0.10)'],
        ['label' => 'In Progress',   'value' => $inProgressOrders,  'sub' => 'Sedang dikerjakan',       'icon' => 'pending_actions', 'color' => '#818cf8', 'dim' => 'rgba(129,140,248,0.10)'],
        ['label' => 'Completed',     'value' => $completedOrders,   'sub' => 'Selesai dikerjakan',      'icon' => 'task_alt',        'color' => '#10b981', 'dim' => 'rgba(16,185,129,0.10)'],
    ];
    @endphp

    @foreach($statCards as $card)
    <div class="admin-card border rounded-xl p-5 relative overflow-hidden group">
        {{-- Colored accent top border --}}
        <div class="absolute top-0 left-0 right-0 h-[3px] rounded-t-xl" style="background: {{ $card['color'] }};"></div>

        <div class="flex items-start justify-between mb-4">
            <span class="text-[12px] font-semibold admin-text-muted uppercase tracking-wider">{{ $card['label'] }}</span>
            <div class="size-8 rounded-lg flex items-center justify-center shrink-0" style="background: {{ $card['dim'] }};">
                <span class="material-symbols-outlined text-[18px]" style="color: {{ $card['color'] }};">{{ $card['icon'] }}</span>
            </div>
        </div>

        <div class="text-[32px] font-bold admin-text leading-none admin-stat-number">{{ $card['value'] }}</div>
        <div class="text-[12px] admin-text-muted mt-2">{{ $card['sub'] }}</div>
    </div>
    @endforeach
</div>

{{-- Main chart row --}}
<div class="grid grid-cols-1 lg:grid-cols-3 gap-4 mb-6">

    {{-- Monthly Activity bar chart --}}
    <div class="lg:col-span-2 admin-card border rounded-xl overflow-hidden">
        <div class="px-6 py-4 admin-border border-b flex items-center justify-between">
            <div>
                <h2 class="text-[14px] font-bold admin-text">Aktivitas Order</h2>
                <p class="text-[12px] admin-text-muted mt-0.5">6 bulan terakhir</p>
            </div>
            <span class="text-[11px] font-semibold px-2.5 py-1 rounded-full admin-text-muted" style="background: var(--admin-surface-hover);">Orders / Bulan</span>
        </div>

        <div class="p-6">
            @php
                $counts = array_column($monthlyOrders, 'count');
                $maxCount = empty($counts) ? 1 : max($counts);
                $chartH = 160;
            @endphp

            {{-- Chart area with grid lines --}}
            <div class="relative" style="height: {{ $chartH + 40 }}px;">
                {{-- Grid lines (4 horizontal) --}}
                @for($g = 1; $g <= 4; $g++)
                <div class="absolute left-0 right-0 border-t admin-border-light"
                     style="bottom: {{ 40 + ($g / 4) * $chartH }}px; border-style: dashed;"></div>
                @endfor

                {{-- Bars --}}
                <div class="absolute left-0 right-0 bottom-0 flex items-end gap-3 px-1" style="height: {{ $chartH + 40 }}px;">
                    @foreach($monthlyOrders as $mo)
                    @php
                        $barH = $maxCount > 0 ? max(round(($mo['count'] / $maxCount) * $chartH), 4) : 4;
                        $isMax = $mo['count'] == $maxCount && $mo['count'] > 0;
                    @endphp
                    <div class="flex-1 flex flex-col items-center gap-2 justify-end" style="height: {{ $chartH + 40 }}px;">
                        <span class="text-[12px] font-bold admin-stat-number {{ $isMax ? '' : 'admin-text-secondary' }}" style="{{ $isMax ? 'color: var(--admin-brand);' : '' }}">{{ $mo['count'] > 0 ? $mo['count'] : '' }}</span>
                        <div class="w-full max-w-[44px] rounded-t-md transition-all duration-500 group-hover:opacity-80"
                             style="height: {{ $barH }}px; background: {{ $isMax ? 'var(--admin-brand)' : 'var(--admin-primary)' }}; opacity: 0.75;"></div>
                        <span class="text-[11px] admin-text-muted font-medium whitespace-nowrap">{{ $mo['month'] }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    {{-- Order status breakdown --}}
    <div class="admin-card border rounded-xl overflow-hidden">
        <div class="px-6 py-4 admin-border border-b">
            <h2 class="text-[14px] font-bold admin-text">Distribusi Status</h2>
            <p class="text-[12px] admin-text-muted mt-0.5">Komposisi order saat ini</p>
        </div>
        <div class="p-6 space-y-5">
            @php
                $distStatuses = [
                    ['label' => 'Pending',     'count' => $pendingOrders,    'color' => '#f59e0b'],
                    ['label' => 'In Progress', 'count' => $inProgressOrders, 'color' => '#818cf8'],
                    ['label' => 'Completed',   'count' => $completedOrders,  'color' => '#10b981'],
                    ['label' => 'Rejected',    'count' => $rejectedOrders,   'color' => '#f87171'],
                ];
                $distTotal = max($totalOrders, 1);
            @endphp
            @foreach($distStatuses as $s)
            <div>
                <div class="flex items-center justify-between mb-2">
                    <div class="flex items-center gap-2">
                        <div class="size-2 rounded-full shrink-0" style="background: {{ $s['color'] }};"></div>
                        <span class="text-[13px] font-medium admin-text-secondary">{{ $s['label'] }}</span>
                    </div>
                    <span class="text-[13px] font-bold admin-stat-number" style="color: {{ $s['color'] }};">{{ $s['count'] }}</span>
                </div>
                <div class="h-1.5 rounded-full overflow-hidden" style="background: var(--admin-surface-hover);">
                    <div class="h-full rounded-full transition-all duration-700"
                         style="width: {{ round(($s['count'] / $distTotal) * 100) }}%; background: {{ $s['color'] }};"></div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

{{-- Content Counters --}}
<div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">
    @php
    $contentCards = [
        ['route' => 'manager.projects.index',      'label' => 'Project',       'count' => $totalProjects,      'icon' => 'work',        'color' => '#818cf8', 'dim' => 'rgba(129,140,248,0.10)'],
        ['route' => 'manager.clients.index',       'label' => 'Clients',       'count' => $totalClients,       'icon' => 'apartment',   'color' => '#10b981', 'dim' => 'rgba(16,185,129,0.10)'],
        ['route' => 'manager.testimonials.index',  'label' => 'Testimonials',  'count' => $totalTestimonials,  'icon' => 'rate_review', 'color' => '#f59e0b', 'dim' => 'rgba(245,158,11,0.10)'],
    ];
    @endphp
    @foreach($contentCards as $cc)
    <a href="{{ route($cc['route']) }}" class="admin-card border rounded-xl p-5 no-underline group transition-all duration-150 hover:scale-[1.01] flex items-center gap-4" style="hover:box-shadow: var(--admin-shadow-lg);">
        <div class="size-12 rounded-xl flex items-center justify-center shrink-0" style="background: {{ $cc['dim'] }};">
            <span class="material-symbols-outlined text-2xl" style="color: {{ $cc['color'] }};">{{ $cc['icon'] }}</span>
        </div>
        <div>
            <div class="text-[28px] font-bold admin-text leading-none admin-stat-number">{{ $cc['count'] }}</div>
            <div class="text-[12px] admin-text-muted mt-1 font-medium">{{ $cc['label'] }}</div>
        </div>
        <span class="material-symbols-outlined ml-auto text-xl admin-text-muted group-hover:translate-x-0.5 transition-transform">chevron_right</span>
    </a>
    @endforeach
</div>

{{-- Bottom row: Recent orders + Popular categories --}}
<div class="grid grid-cols-1 lg:grid-cols-3 gap-4">

    {{-- Recent orders --}}
    <div class="lg:col-span-2 admin-card border rounded-xl overflow-hidden">
        <div class="px-6 py-4 admin-border border-b flex items-center justify-between">
            <div>
                <h2 class="text-[14px] font-bold admin-text">Order Terbaru</h2>
                <p class="text-[12px] admin-text-muted mt-0.5">5 order terakhir</p>
            </div>
            <a href="{{ route('manager.orders.index') }}" class="text-[12px] font-semibold no-underline transition-colors" style="color: var(--admin-primary);" onmouseover="this.style.color='#60a5fa'" onmouseout="this.style.color='var(--admin-primary)'">
                Lihat Semua →
            </a>
        </div>

        @if($recentOrders->count())
        <div class="admin-row-divide">
            @foreach($recentOrders as $order)
            @php
                $statusMap = ['completed' => ['#10b981','rgba(16,185,129,0.1)'], 'in_progress' => ['#818cf8','rgba(129,140,248,0.1)'], 'rejected' => ['#f87171','rgba(239,68,68,0.1)'], 'pending' => ['#f59e0b','rgba(245,158,11,0.1)']];
                [$sc, $sdim] = $statusMap[$order->status] ?? ['#64748b','rgba(100,116,139,0.1)'];
            @endphp
            <div class="px-6 py-3.5 flex items-center gap-4 admin-table-hover">
                <div class="size-9 rounded-lg flex items-center justify-center shrink-0 text-xs font-bold" style="background: {{ $sdim }}; color: {{ $sc }};">
                    {{ strtoupper(substr($order->name, 0, 2)) }}
                </div>
                <div class="flex-1 min-w-0">
                    <div class="text-[13px] font-semibold admin-text truncate">{{ $order->name }}</div>
                    <div class="text-[11px] admin-text-muted truncate">{{ $order->company ?: $order->email }}</div>
                </div>
                <div class="text-right shrink-0 hidden sm:block">
                    <div class="text-[13px] font-medium admin-text-secondary">{{ $order->budget ?: '—' }}</div>
                    <div class="text-[11px] admin-text-muted">{{ $order->created_at->format('d M Y') }}</div>
                </div>
                <span class="inline-block px-2.5 py-1 rounded-md text-[11px] font-bold capitalize shrink-0" style="background: {{ $sdim }}; color: {{ $sc }};">
                    {{ str_replace('_', ' ', $order->status) }}
                </span>
                <a href="{{ route('manager.orders.show', $order) }}" class="flex items-center justify-center size-8 rounded-lg no-underline transition-all duration-150 admin-surface-hover shrink-0 admin-text-muted">
                    <span class="material-symbols-outlined text-lg">chevron_right</span>
                </a>
            </div>
            @endforeach
        </div>
        @else
        <div class="flex flex-col items-center justify-center py-16 px-5">
            <span class="material-symbols-outlined text-5xl admin-text-muted mb-3 opacity-30">inbox</span>
            <p class="text-sm admin-text-muted">Belum ada order masuk.</p>
        </div>
        @endif
    </div>

    {{-- Popular categories --}}
    <div class="admin-card border rounded-xl overflow-hidden">
        <div class="px-6 py-4 admin-border border-b">
            <h2 class="text-[14px] font-bold admin-text">Layanan Populer</h2>
            <p class="text-[12px] admin-text-muted mt-0.5">Berdasarkan jumlah order</p>
        </div>
        @if($allCategories->count())
        <div class="p-6 space-y-4">
            @php $catMax = $allCategories->first(); $catIdx = 0; @endphp
            @foreach($allCategories as $catName => $catCount)
            @php
                $barColors = ['var(--admin-primary)', '#10b981', '#f59e0b', '#818cf8', '#f87171'];
                $barColor = $barColors[$catIdx % count($barColors)];
                $catIdx++;
            @endphp
            <div>
                <div class="flex items-center justify-between mb-1.5">
                    <span class="text-[12px] font-semibold admin-text-secondary capitalize">{{ str_replace(['-', '_'], ' ', $catName) }}</span>
                    <span class="text-[11px] font-bold admin-stat-number admin-text-muted">{{ $catCount }}×</span>
                </div>
                <div class="h-1.5 rounded-full overflow-hidden" style="background: var(--admin-surface-hover);">
                    <div class="h-full rounded-full transition-all duration-700" style="width: {{ $catMax > 0 ? round(($catCount / $catMax) * 100) : 0 }}%; background: {{ $barColor }};"></div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="flex flex-col items-center justify-center py-12 px-5">
            <span class="material-symbols-outlined text-4xl admin-text-muted mb-2 opacity-30">bar_chart</span>
            <p class="text-[13px] admin-text-muted">Belum cukup data.</p>
        </div>
        @endif
    </div>

</div>
@endsection
