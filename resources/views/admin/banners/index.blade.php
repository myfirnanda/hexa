@extends('layouts.admin')
@section('title', 'Banner Halaman')
@section('topbar-title', 'Banner Halaman')

@php
    $pages = \App\Models\PageBanner::$pages;
@endphp

@section('content')

<div class="flex items-center justify-between flex-wrap gap-4 mb-7 max-md:flex-col max-md:items-start">
    <div>
        <h1 class="text-xl font-bold admin-text">Banner Halaman</h1>
        <p class="text-sm admin-text-muted mt-1">Kelola gambar banner di setiap halaman website</p>
    </div>
    <a href="{{ route('manager.banners.create') }}" class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-lg font-semibold text-sm text-white no-underline border-none cursor-pointer transition-all duration-150 hover:opacity-90" style="background: var(--admin-primary);">
        <span class="material-symbols-outlined text-[18px]">add_photo_alternate</span>
        Tambah Banner
    </a>
</div>

<div class="admin-card border rounded-xl overflow-hidden">

    {{-- Filters --}}
    <div class="px-6 py-4 border-b admin-border flex items-center justify-between gap-3 flex-wrap">
        <div class="flex items-center gap-2 flex-wrap">
            <span class="text-[13px] font-semibold admin-text">Filter Halaman:</span>
            <a href="{{ route('manager.banners.index', array_merge(request()->except('page_filter', 'page'), ['search' => $search])) }}"
               class="px-3 py-1 rounded-lg text-[12px] font-semibold transition-all no-underline {{ !$page ? 'text-white' : 'admin-text-muted hover:admin-text' }}"
               style="{{ !$page ? 'background: var(--admin-primary);' : '' }}">
                Semua
            </a>
            @foreach($pages as $key => $label)
                <a href="{{ route('manager.banners.index', array_merge(request()->except('page_filter', 'page'), ['page_filter' => $key, 'search' => $search])) }}"
                   class="px-3 py-1 rounded-lg text-[12px] font-semibold transition-all no-underline {{ $page === $key ? 'text-white' : 'admin-text-muted hover:admin-text' }}"
                   style="{{ $page === $key ? 'background: var(--admin-primary);' : '' }}">
                    {{ $label }}
                </a>
            @endforeach
        </div>
        <form method="GET" action="{{ route('manager.banners.index') }}" class="flex items-center gap-2">
            @if($page) <input type="hidden" name="page_filter" value="{{ $page }}"> @endif
            <div class="relative">
                <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-[18px] admin-text-muted pointer-events-none select-none">search</span>
                <input type="text" name="search" value="{{ $search }}" placeholder="Cari judul banner..."
                    class="admin-input admin-search-input rounded-lg pl-9 pr-3 py-2 text-sm outline-none w-50 focus:w-64"
                    autocomplete="off">
            </div>
            @if($search)
            <a href="{{ route('manager.banners.index', $page ? ['page_filter' => $page] : []) }}"
               class="text-[12px] font-medium admin-text-muted hover:admin-text transition-colors no-underline px-2 py-2 rounded-lg admin-surface-hover">
                <span class="material-symbols-outlined text-[18px]">close</span>
            </a>
            @endif
        </form>
    </div>

    @if($banners->isNotEmpty())
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr style="background: var(--admin-surface-hover);">
                    <th class="text-left px-4 py-3 text-[11px] font-bold admin-text-muted uppercase tracking-wider border-b admin-border w-10">Urutan</th>
                    <th class="text-left px-4 py-3 text-[11px] font-bold admin-text-muted uppercase tracking-wider border-b admin-border w-20">Preview</th>
                    <th class="text-left px-4 py-3 text-[11px] font-bold admin-text-muted uppercase tracking-wider border-b admin-border">Judul</th>
                    <th class="text-left px-4 py-3 text-[11px] font-bold admin-text-muted uppercase tracking-wider border-b admin-border">Halaman</th>
                    <th class="text-left px-4 py-3 text-[11px] font-bold admin-text-muted uppercase tracking-wider border-b admin-border w-24">Status</th>
                    <th class="text-left px-4 py-3 text-[11px] font-bold admin-text-muted uppercase tracking-wider border-b admin-border w-24">Aksi</th>
                </tr>
            </thead>
            <tbody class="admin-table-body" id="banners-table-body">
                @foreach($banners as $banner)
                <tr class="admin-table-hover draggable-row" data-id="{{ $banner->id }}">
                    <td class="px-4 py-3 align-middle">
                        <div class="flex items-center gap-1.5">
                            <span class="drag-handle material-symbols-outlined text-[15px] cursor-grab" style="color:#64748b;">drag_indicator</span>
                            <span class="row-num text-[12px] admin-text-muted admin-stat-number">{{ $loop->iteration }}</span>
                        </div>
                    </td>
                    <td class="px-4 py-3 align-middle">
                        <div class="relative group cursor-pointer" onclick="openBannerPreview('{{ asset('storage/' . $banner->image_path) }}', '{{ $banner->title ?? 'Banner' }}')">
                            <img src="{{ asset('storage/' . $banner->image_path) }}"
                                 class="w-20 h-12 object-cover rounded-lg border admin-border"
                                 alt="{{ $banner->title }}">
                            <div class="absolute inset-0 bg-black/0 group-hover:bg-black/20 rounded-lg transition-all flex items-center justify-center">
                                <span class="material-symbols-outlined text-white opacity-0 group-hover:opacity-100 text-[16px] transition-opacity">zoom_in</span>
                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-3 align-middle">
                        <span class="text-[13px] font-semibold admin-text">{{ $banner->title ?: '—' }}</span>
                        @if($banner->hero_title)
                        <p class="text-[11px] admin-text-muted mt-0.5 leading-snug max-w-[260px] truncate" title="{{ strip_tags($banner->hero_title) }}">
                            <span style="color:var(--admin-primary);font-weight:600;">H:</span> {{ Str::limit(strip_tags($banner->hero_title), 50) }}
                        </p>
                        @endif
                        @if($banner->hero_description)
                        <p class="text-[11px] admin-text-muted mt-0.5 leading-snug max-w-[260px] truncate" title="{{ $banner->hero_description }}">
                            <span style="color:#94a3b8;font-weight:600;">D:</span> {{ Str::limit($banner->hero_description, 50) }}
                        </p>
                        @endif
                    </td>
                    <td class="px-4 py-3 align-middle">
                        @php
                            $pageColors = ['home' => '#2563eb', 'works' => '#7c3aed', 'about' => '#0891b2', 'products' => '#059669', 'services' => '#d97706'];
                            $pc = $pageColors[$banner->page] ?? '#64748b';
                        @endphp
                        <span class="inline-block px-2.5 py-1 rounded-md text-[11px] font-bold text-white" style="background: {{ $pc }};">
                            {{ $pages[$banner->page] ?? $banner->page }}
                        </span>
                    </td>
                    <td class="px-4 py-3 align-middle">
                        <button onclick="toggleBannerActive({{ $banner->id }}, this)"
                            data-active="{{ $banner->is_active ? '1' : '0' }}"
                            class="inline-flex items-center gap-1 px-2.5 py-1 rounded-md text-[11px] font-bold transition-all cursor-pointer border-0"
                            style="{{ $banner->is_active ? 'background:rgba(5,150,105,0.12);color:#10b981;' : 'background:rgba(100,116,139,0.12);color:#64748b;' }}">
                            <span class="material-symbols-outlined text-[13px]">{{ $banner->is_active ? 'check_circle' : 'cancel' }}</span>
                            {{ $banner->is_active ? 'Aktif' : 'Nonaktif' }}
                        </button>
                    </td>
                    <td class="px-4 py-3 align-middle">
                        <div class="flex items-center gap-1.5">
                            <a href="{{ route('manager.banners.edit', $banner) }}"
                               class="inline-flex items-center justify-center size-8 rounded-lg cursor-pointer transition-all no-underline border"
                               style="background:rgba(37,99,235,0.08);color:#60a5fa;border-color:rgba(37,99,235,0.15);"
                               onmouseover="this.style.background='rgba(37,99,235,0.18)'"
                               onmouseout="this.style.background='rgba(37,99,235,0.08)'">
                                <span class="material-symbols-outlined text-[16px]">edit</span>
                            </a>
                            <button onclick="confirmDelete('{{ route('manager.banners.destroy', $banner) }}')"
                                class="inline-flex items-center justify-center size-8 rounded-lg cursor-pointer transition-all border"
                                style="background:rgba(239,68,68,0.08);color:#f87171;border-color:rgba(239,68,68,0.15);"
                                onmouseover="this.style.background='rgba(239,68,68,0.18)'"
                                onmouseout="this.style.background='rgba(239,68,68,0.08)'">
                                <span class="material-symbols-outlined text-[16px]">delete</span>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @elseif($search || $page)
    <div class="flex flex-col items-center justify-center py-16 px-5">
        <span class="material-symbols-outlined text-5xl admin-text-muted mb-3 opacity-30">search_off</span>
        <p class="text-sm admin-text-secondary font-medium">Tidak ada banner ditemukan</p>
        <a href="{{ route('manager.banners.index') }}" class="mt-3 text-[13px] no-underline" style="color: var(--admin-primary);">Reset filter</a>
    </div>

    @else
    <div class="flex flex-col items-center justify-center py-16 px-5">
        <span class="material-symbols-outlined text-5xl admin-text-muted mb-3 opacity-30">add_photo_alternate</span>
        <p class="text-sm admin-text-secondary mb-3">Belum ada banner. Tambahkan banner pertama Anda.</p>
        <a href="{{ route('manager.banners.create') }}" class="inline-flex items-center gap-1.5 px-4 py-2 rounded-lg font-semibold text-sm text-white no-underline" style="background: var(--admin-primary);">
            <span class="material-symbols-outlined text-[18px]">add</span> Tambah Banner
        </a>
    </div>
    @endif
</div>

{{-- Image Preview Modal --}}
<div id="banner-preview-modal" class="fixed inset-0 z-[9999] items-center justify-center p-4 hidden">
    <div class="absolute inset-0 bg-black/70 backdrop-blur-sm" onclick="closeBannerPreview()"></div>
    <div class="relative max-w-3xl w-full z-10">
        <button onclick="closeBannerPreview()" class="absolute -top-10 right-0 text-white/70 hover:text-white flex items-center gap-1 text-sm">
            <span class="material-symbols-outlined">close</span> Tutup
        </button>
        <img id="banner-preview-img" src="" alt="" class="w-full rounded-xl shadow-2xl">
        <p id="banner-preview-title" class="text-white text-center mt-3 text-sm font-medium"></p>
    </div>
</div>

@endsection

@section('scripts')
<script>
$(function () {
    var $tbody = $('#banners-table-body');
    if (!$tbody.length) return;

    $tbody.sortable({
        axis: 'y',
        cancel: 'button, a, input',
        cursor: 'grabbing',
        opacity: 0.75,
        placeholder: 'sort-placeholder',
        helper: function (e, ui) {
            ui.children().each(function () { $(this).width($(this).width()); });
            return ui;
        },
        start: function (e, ui) { ui.placeholder.height(ui.item.outerHeight()); },
        update: function () { updateRowNumbers(); saveSort(); }
    }).disableSelection();

    function updateRowNumbers() {
        $tbody.find('.draggable-row').each(function (i) {
            $(this).find('.row-num').text(i + 1);
        });
    }

    function saveSort() {
        var order = [];
        $tbody.find('.draggable-row').each(function () {
            var id = parseInt($(this).data('id'));
            if (!isNaN(id)) order.push(id);
        });
        $.ajax({
            url: '{{ route("manager.banners.sort") }}',
            type: 'POST',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: { order: order },
            error: function (xhr) { console.error('Sort error:', xhr.status, xhr.responseText); }
        });
    }
});

function toggleBannerActive(id, btn) {
    $.ajax({
        url: '/manager/banners/' + id + '/toggle',
        type: 'PATCH',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'Accept': 'application/json'
        },
        success: function (res) {
            var active = res.is_active;
            $(btn).attr('data-active', active ? '1' : '0');
            $(btn).css(active
                ? { background: 'rgba(5,150,105,0.12)', color: '#10b981' }
                : { background: 'rgba(100,116,139,0.12)', color: '#64748b' }
            );
            $(btn).find('.material-symbols-outlined').text(active ? 'check_circle' : 'cancel');
            $(btn).contents().filter(function(){ return this.nodeType === 3; }).last().replaceWith(active ? ' Aktif' : ' Nonaktif');
        }
    });
}

function openBannerPreview(src, title) {
    document.getElementById('banner-preview-img').src = src;
    document.getElementById('banner-preview-title').textContent = title;
    document.getElementById('banner-preview-modal').classList.remove('hidden');
    document.getElementById('banner-preview-modal').classList.add('flex');
}

function closeBannerPreview() {
    document.getElementById('banner-preview-modal').classList.add('hidden');
    document.getElementById('banner-preview-modal').classList.remove('flex');
}

document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') closeBannerPreview();
});
</script>
<style>
#banners-table-body .draggable-row { cursor: grab; }
#banners-table-body .sort-placeholder { visibility: visible !important; background: rgba(59,130,246,0.07) !important; outline: 2px dashed rgba(59,130,246,0.35); height: 58px; }
#banners-table-body .ui-sortable-helper { box-shadow: 0 8px 28px rgba(0,0,0,0.45) !important; }
</style>
@endsection
