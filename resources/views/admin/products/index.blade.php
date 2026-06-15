@extends('layouts.admin')
@section('title', 'Produk')
@section('topbar-title', 'Produk')

@section('content')

<div class="flex items-center justify-between flex-wrap gap-4 mb-7 max-md:flex-col max-md:items-start">
    <div>
        <h1 class="text-xl font-bold admin-text">Produk</h1>
        <p class="text-sm admin-text-muted mt-1">Kelola produk yang ditampilkan di website</p>
    </div>
    <a href="{{ route('manager.products.create') }}" class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-lg font-semibold text-sm text-white no-underline border-none cursor-pointer transition-all duration-150 hover:opacity-90" style="background: var(--admin-primary);">
        <span class="material-symbols-outlined text-[18px]">add</span>
        Tambah Produk
    </a>
</div>

<div class="admin-card border rounded-xl overflow-hidden">

    <div class="px-6 py-4 border-b admin-border flex items-center justify-between gap-3 flex-wrap">
        <div>
            <span class="text-[14px] font-bold admin-text">Semua Produk</span>
            <span class="text-[13px] admin-text-muted ml-2">({{ $products->total() }})</span>
        </div>
        <form method="GET" action="{{ route('manager.products.index') }}" class="flex items-center gap-2">
            <div class="relative">
                <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-[18px] admin-text-muted pointer-events-none select-none">search</span>
                <input type="text" name="search" value="{{ $search }}" placeholder="Cari nama produk..."
                    class="admin-input admin-search-input rounded-lg pl-9 pr-3 py-2 text-sm outline-none w-55 focus:w-70"
                    autocomplete="off">
            </div>
            @if($search)
            <a href="{{ route('manager.products.index') }}" class="text-[12px] font-medium admin-text-muted hover:admin-text transition-colors no-underline px-2 py-2 rounded-lg admin-surface-hover" title="Hapus filter">
                <span class="material-symbols-outlined text-[18px]">close</span>
            </a>
            @endif
        </form>
    </div>

    @if($products->count())
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr style="background: var(--admin-surface-hover);">
                    <th class="text-left px-4 py-3 text-[11px] font-bold admin-text-muted uppercase tracking-wider border-b admin-border whitespace-nowrap w-10">No</th>
                    <th class="text-left px-4 py-3 text-[11px] font-bold admin-text-muted uppercase tracking-wider border-b admin-border whitespace-nowrap w-14">Cover</th>
                    <th class="text-left px-4 py-3 text-[11px] font-bold admin-text-muted uppercase tracking-wider border-b admin-border whitespace-nowrap">Nama</th>
                    <th class="text-left px-4 py-3 text-[11px] font-bold admin-text-muted uppercase tracking-wider border-b admin-border whitespace-nowrap">Kategori</th>
                    <th class="text-left px-4 py-3 text-[11px] font-bold admin-text-muted uppercase tracking-wider border-b admin-border whitespace-nowrap max-w-xs">Deskripsi</th>
                    <th class="text-left px-4 py-3 text-[11px] font-bold admin-text-muted uppercase tracking-wider border-b admin-border whitespace-nowrap">Features</th>
                    <th class="text-left px-4 py-3 text-[11px] font-bold admin-text-muted uppercase tracking-wider border-b admin-border whitespace-nowrap">Link Website</th>
                    <th class="text-left px-4 py-3 text-[11px] font-bold admin-text-muted uppercase tracking-wider border-b admin-border whitespace-nowrap w-24">Aksi</th>
                </tr>
            </thead>
            <tbody class="admin-table-body" id="products-table-body">
                @foreach($products as $index => $product)
                <tr class="admin-table-hover draggable-row" data-product-id="{{ $product->id }}" data-sort-order="{{ $product->sort_order }}">
                    <td class="px-4 py-3.5 text-[13px] admin-text-muted align-middle admin-stat-number">
                        <div class="flex items-center gap-1.5">
                            <span class="drag-handle material-symbols-outlined text-[15px] cursor-grab" style="display:inline-block;color:#64748b;">drag_indicator</span>
                            <span class="row-num font-semibold">{{ $loop->iteration }}</span>
                        </div>
                    </td>
                    <td class="px-4 py-3.5 align-middle">
                        <img src="{{ image_url($product->image_cover) }}"
                            class="size-10 rounded-lg object-cover admin-deep-bg border cursor-pointer hover:opacity-80 transition-opacity"
                            alt="{{ $product->name }}"
                            draggable="false"
                            onclick="openGalleryPreview('{{ image_url($product->image_cover) }}')"
                            aria-label="Preview cover {{ $product->name }}">
                    </td>
                    <td class="px-4 py-3.5 align-middle">
                        <div class="text-[13px] font-semibold admin-text">{{ $product->name }}</div>
                    </td>
                    <td class="px-4 py-3.5 align-middle">
                        @if($product->category)
                            <span class="inline-block px-2.5 py-1 rounded-md text-[11px] font-bold text-white" style="background-color: {{ $product->category->color }};">
                                {{ $product->category->name }}
                            </span>
                        @else
                            <span class="text-[12px] admin-text-muted italic">-</span>
                        @endif
                    </td>
                    <td class="px-4 py-3.5 align-middle admin-text-secondary text-[13px] max-w-xs">
                        {{ Str::limit($product->description ?? '', 60) }}
                    </td>
                    <td class="px-4 py-3.5 align-middle">
                        <span class="inline-block px-2.5 py-1 rounded-md text-[11px] font-bold admin-stat-number" style="background: rgba(37,99,235,0.10); color: #60a5fa;">
                            {{ $product->features_count ?? 0 }} fitur
                        </span>
                    </td>
                    <td class="px-4 py-3.5 align-middle">
                        @if($product->website_url)
                            <a href="{{ $product->website_url }}" target="_blank" rel="noopener noreferrer"
                               class="inline-flex items-center gap-1 text-[12px] font-medium no-underline hover:opacity-80 transition-opacity max-w-[160px] truncate"
                               style="color: #60a5fa;" title="{{ $product->website_url }}">
                                <span class="material-symbols-outlined text-[14px] flex-shrink-0">open_in_new</span>
                                <span class="truncate">{{ parse_url($product->website_url, PHP_URL_HOST) ?: $product->website_url }}</span>
                            </a>
                        @else
                            <span class="text-[12px] admin-text-muted italic">-</span>
                        @endif
                    </td>
                    <td class="px-4 py-3.5 align-middle">
                        <div class="flex items-center gap-1.5">
                            <a href="{{ route('manager.products.edit', $product) }}"
                               class="inline-flex items-center justify-center size-8 rounded-lg cursor-pointer transition-all duration-150 no-underline border"
                               style="background: rgba(37,99,235,0.08); color: #60a5fa; border-color: rgba(37,99,235,0.15);"
                               onmouseover="this.style.background='rgba(37,99,235,0.18)'"
                               onmouseout="this.style.background='rgba(37,99,235,0.08)'"
                               title="Edit produk">
                                <span class="material-symbols-outlined text-[16px]">edit</span>
                            </a>
                            <button onclick="confirmDelete('{{ route('manager.products.destroy', $product) }}')"
                                class="inline-flex items-center justify-center size-8 rounded-lg cursor-pointer transition-all duration-150 border"
                                style="background: rgba(239,68,68,0.08); color: #f87171; border-color: rgba(239,68,68,0.15);"
                                onmouseover="this.style.background='rgba(239,68,68,0.18)'"
                                onmouseout="this.style.background='rgba(239,68,68,0.08)'"
                                title="Hapus produk">
                                <span class="material-symbols-outlined text-[16px]">delete</span>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="px-6 py-4 border-t admin-border">{{ $products->links() }}</div>

    @elseif($search)
    <div class="flex flex-col items-center justify-center py-16 px-5">
        <span class="material-symbols-outlined text-5xl admin-text-muted mb-3 opacity-30">search_off</span>
        <p class="text-sm admin-text-secondary font-medium">Tidak ada hasil untuk <strong class="admin-text">"{{ $search }}"</strong></p>
        <a href="{{ route('manager.products.index') }}" class="mt-3 text-[13px] no-underline" style="color: var(--admin-primary);">Hapus filter</a>
    </div>

    @else
    <div class="flex flex-col items-center justify-center py-16 px-5">
        <span class="material-symbols-outlined text-5xl admin-text-muted mb-3 opacity-30">inventory_2</span>
        <p class="text-sm admin-text-secondary mb-3">Belum ada produk.</p>
        <a href="{{ route('manager.products.create') }}" class="inline-flex items-center gap-1.5 px-4 py-2 rounded-lg font-semibold text-sm text-white no-underline" style="background: var(--admin-primary);">
            <span class="material-symbols-outlined text-[18px]">add</span> Tambah Produk
        </a>
    </div>
    @endif
</div>
@endsection

@section('scripts')
<script>
$(function () {
    var $tbody = $('#products-table-body');
    if (!$tbody.length) return;

    $tbody.sortable({
        axis: 'y',
        cancel: 'button, a, input, select, textarea',
        cursor: 'grabbing',
        opacity: 0.75,
        placeholder: 'sort-placeholder',
        helper: function (e, ui) {
            // Fix cell widths so the floating row looks correct
            ui.children().each(function () {
                $(this).width($(this).width());
            });
            return ui;
        },
        start: function (e, ui) {
            ui.placeholder.height(ui.item.outerHeight());
        },
        update: function () {
            updateRowNumbers();
            saveSort();
        }
    }).disableSelection();

    function updateRowNumbers() {
        $tbody.find('.draggable-row').each(function (i) {
            $(this).find('.row-num').text(i + 1);
        });
    }

    function saveSort() {
        var order = [];
        $tbody.find('.draggable-row').each(function () {
            var id = parseInt($(this).data('product-id'));
            if (!isNaN(id)) order.push(id);
        });
        $.ajax({
            url: '{{ route("manager.products.sort") }}',
            type: 'POST',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            contentType: 'application/json',
            data: JSON.stringify({ order: order }),
            error: function (err) { console.error('Sort error:', err); }
        });
    }
});
</script>
<style>
#products-table-body .draggable-row { cursor: grab; }
#products-table-body .sort-placeholder { visibility: visible !important; background: rgba(59,130,246,0.07) !important; outline: 2px dashed rgba(59,130,246,0.35); }
#products-table-body .ui-sortable-helper { box-shadow: 0 8px 28px rgba(0,0,0,0.45) !important; }
</style>
@endsection
