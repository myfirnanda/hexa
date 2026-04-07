@extends('layouts.admin')
@section('title', 'Produk')
@section('topbar-title', 'Produk')

@section('content')
<div class="flex items-center justify-between flex-wrap gap-4 mb-7 max-md:flex-col max-md:items-start">
    <div>
        <h1 class="text-2xl font-bold admin-text">Produk</h1>
        <p class="text-sm admin-text-muted mt-1">Kelola produk yang ditampilkan di website</p>
    </div>
    <a href="{{ route('admin.products.create') }}" class="inline-flex items-center gap-1.5 px-4 py-2 rounded-lg font-semibold text-sm bg-blue-500 text-white no-underline border-none cursor-pointer transition-all duration-150 hover:bg-blue-600">
        <span class="material-symbols-outlined">add</span>
        Tambah Produk
    </a>
</div>

<div class="admin-card border rounded-xl overflow-hidden">
    <div class="px-5 py-4 border-b admin-border flex items-center justify-between gap-3">
        <h2 class="text-[15px] font-semibold admin-text">Semua Produk ({{ $products->total() }})</h2>
    </div>
    @if($products->count())
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr>
                    <th class="text-left px-4 py-2.5 text-xs font-semibold admin-text-muted uppercase tracking-wide border-b admin-border whitespace-nowrap">#</th>
                    <th class="text-left px-4 py-2.5 text-xs font-semibold admin-text-muted uppercase tracking-wide border-b admin-border whitespace-nowrap">Cover</th>
                    <th class="text-left px-4 py-2.5 text-xs font-semibold admin-text-muted uppercase tracking-wide border-b admin-border whitespace-nowrap">Nama</th>
                    <th class="text-left px-4 py-2.5 text-xs font-semibold admin-text-muted uppercase tracking-wide border-b admin-border whitespace-nowrap">Tagline</th>
                    <th class="text-left px-4 py-2.5 text-xs font-semibold admin-text-muted uppercase tracking-wide border-b admin-border whitespace-nowrap">Features</th>
                    <th class="text-left px-4 py-2.5 text-xs font-semibold admin-text-muted uppercase tracking-wide border-b admin-border whitespace-nowrap">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr class="admin-table-hover">
                    <td class="px-4 py-3 text-sm border-b admin-border-light align-middle admin-text">{{ $product->id }}</td>
                    <td class="px-4 py-3 text-sm border-b admin-border-light align-middle">
                        <img src="{{ image_url($product->image_cover) }}" class="size-10 rounded-lg object-cover admin-deep-bg border cursor-pointer" alt="{{ $product->name }}" onclick="openGalleryPreview('{{ image_url($product->image_cover) }}')">
                    </td>
                    <td class="px-4 py-3 text-sm border-b admin-border-light align-middle font-semibold admin-text">{{ $product->name }}</td>
                    <td class="px-4 py-3 text-sm border-b admin-border-light align-middle admin-text-secondary text-[13px] max-w-[320px]">{{ Str::limit($product->tagline, 60) }}</td>
                    <td class="px-4 py-3 text-sm border-b admin-border-light align-middle">
                        <span class="inline-block px-2.5 py-1 rounded-md text-xs font-semibold bg-blue-500/12 text-blue-400">{{ $product->features_count ?? $product->features()->count() }}</span>
                    </td>
                    <td class="px-4 py-3 text-sm border-b admin-border-light align-middle">
                        <div class="flex items-center gap-1.5">
                            <a href="{{ route('admin.products.edit', $product) }}" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg font-semibold text-[13px] admin-btn-secondary no-underline border cursor-pointer transition-all duration-150" title="Edit">
                                <span class="material-symbols-outlined">edit</span>
                            </a>
                            <button class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg font-semibold text-[13px] bg-red-500/12 text-red-400 border border-red-500/20 cursor-pointer transition-all duration-150 hover:bg-red-500/20" onclick="confirmDelete('{{ route('admin.products.destroy', $product) }}')" title="Hapus">
                                <span class="material-symbols-outlined">delete</span>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="px-5 py-4">{{ $products->links() }}</div>
    @else
    <div class="text-center py-12 px-5 admin-text-muted">
        <span class="material-symbols-outlined block text-5xl mb-3 opacity-50">inventory_2</span>
        <p>Belum ada produk. Klik tombol "Tambah Produk" untuk menambahkan.</p>
    </div>
    @endif
</div>

{{-- Cover Image Preview Modal --}}
<div id="gallery-img-modal"
    style="display:none; position:fixed; inset:0; z-index:9999; align-items:center; justify-content:center; padding:1.5rem;">
    <div id="gallery-img-backdrop" style="position:absolute; inset:0; background:rgba(0,0,0,0.88);"></div>
    <div style="position:relative; z-index:1; display:flex; flex-direction:column; border-radius:16px; overflow:hidden; box-shadow:0 25px 60px rgba(0,0,0,0.6); background:var(--admin-card-bg); width:min(90vw,860px);">
        <div class="admin-border" style="display:flex; align-items:center; justify-content:space-between; gap:0.75rem; padding:0.75rem 1.25rem; border-bottom-width:1px; border-bottom-style:solid; flex-shrink:0;">
            <span style="font-size:14px; font-weight:600; display:flex; align-items:center; gap:7px;">
                <span class="material-symbols-outlined" style="font-size:17px; color:#60a5fa;">photo</span>
                Preview Gambar
            </span>
            <div style="display:flex; align-items:center; gap:5px;">
                <button id="gallery-zoom-out" type="button" title="Zoom Out" style="display:inline-flex; align-items:center; justify-content:center; width:28px; height:28px; border-radius:7px; background:rgba(100,116,139,0.15); color:#94a3b8; border:none; cursor:pointer;">
                    <span class="material-symbols-outlined" style="font-size:17px;">zoom_out</span>
                </button>
                <span id="gallery-zoom-pct" style="font-size:12px; font-weight:700; color:#cbd5e1; min-width:42px; text-align:center; background:rgba(100,116,139,0.12); border-radius:6px; padding:3px 6px;">100%</span>
                <button id="gallery-zoom-in" type="button" title="Zoom In" style="display:inline-flex; align-items:center; justify-content:center; width:28px; height:28px; border-radius:7px; background:rgba(100,116,139,0.15); color:#94a3b8; border:none; cursor:pointer;">
                    <span class="material-symbols-outlined" style="font-size:17px;">zoom_in</span>
                </button>
                <button id="gallery-zoom-reset" type="button" title="Reset Zoom" style="display:inline-flex; align-items:center; justify-content:center; width:28px; height:28px; border-radius:7px; background:rgba(100,116,139,0.15); color:#94a3b8; border:none; cursor:pointer;">
                    <span class="material-symbols-outlined" style="font-size:17px;">fit_screen</span>
                </button>
                <div style="width:1px; height:16px; background:rgba(100,116,139,0.25); margin:0 3px;"></div>
                <button id="gallery-img-close" type="button" title="Tutup" style="display:inline-flex; align-items:center; justify-content:center; width:28px; height:28px; border-radius:7px; background:rgba(100,116,139,0.15); color:#94a3b8; border:none; cursor:pointer;">
                    <span class="material-symbols-outlined" style="font-size:18px;">close</span>
                </button>
            </div>
        </div>
        <div id="gallery-img-container" style="overflow:hidden; background:#0a0f1e; display:flex; align-items:center; justify-content:center; height:72vh; cursor:default; position:relative;">
            <img id="gallery-img-preview" src="" alt="Preview" style="max-width:100%; max-height:100%; object-fit:contain; display:block; transform-origin:center center; will-change:transform; user-select:none; -webkit-user-drag:none; pointer-events:none;">
            <div style="position:absolute; bottom:0; left:0; right:0; padding:6px 14px; background:rgba(0,0,0,0.5); display:flex; align-items:center; justify-content:center; gap:14px; pointer-events:none;">
                <span style="font-size:11px; color:rgba(255,255,255,0.45); display:flex; align-items:center; gap:4px;">
                    <span class="material-symbols-outlined" style="font-size:13px;">scroll</span> Scroll untuk zoom
                </span>
                <span style="color:rgba(255,255,255,0.2); font-size:11px;">&middot;</span>
                <span style="font-size:11px; color:rgba(255,255,255,0.45); display:flex; align-items:center; gap:4px;">
                    <span class="material-symbols-outlined" style="font-size:13px;">pan_tool</span> Drag untuk geser
                </span>
                <span style="color:rgba(255,255,255,0.2); font-size:11px;">&middot;</span>
                <span style="font-size:11px; color:rgba(255,255,255,0.45);">Dbl-klik untuk reset</span>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
$(function () {
    var scale = 1, ox = 0, oy = 0;
    var dragging = false, startX, startY, startOx, startOy;

    function applyTransform() {
        $('#gallery-img-preview').css('transform', 'translate(' + ox + 'px,' + oy + 'px) scale(' + scale + ')');
        $('#gallery-img-container').css('cursor', scale > 1 ? 'grab' : 'default');
        $('#gallery-zoom-pct').text(Math.round(scale * 100) + '%');
        $('#gallery-zoom-out').css('opacity', scale <= 0.5 ? '0.35' : '1');
        $('#gallery-zoom-in').css('opacity', scale >= 5 ? '0.35' : '1');
    }
    function resetZoom() { scale = 1; ox = 0; oy = 0; applyTransform(); }

    window.openGalleryPreview = function (src) {
        resetZoom();
        $('#gallery-img-preview').attr('src', src);
        $('#gallery-img-modal').css('display', 'flex');
        $('body').css('overflow', 'hidden');
    };
    function closeGalleryPreview() {
        $('#gallery-img-modal').css('display', 'none');
        $('#gallery-img-preview').attr('src', '');
        $('body').css('overflow', '');
        resetZoom();
    }

    $('#gallery-img-close, #gallery-img-backdrop').on('click', closeGalleryPreview);
    $('#gallery-zoom-reset').on('click', resetZoom);
    $('#gallery-zoom-in').on('click', function () { scale = Math.min(5, scale * 1.25); applyTransform(); });
    $('#gallery-zoom-out').on('click', function () { scale = Math.max(0.5, scale / 1.25); if (scale <= 1) { ox = 0; oy = 0; } applyTransform(); });
    $(document).on('keydown', function (e) {
        if (e.key === 'Escape') closeGalleryPreview();
        if ($('#gallery-img-modal').css('display') === 'none') return;
        if (e.key === '+' || e.key === '=') { scale = Math.min(5, scale * 1.25); applyTransform(); }
        if (e.key === '-') { scale = Math.max(0.5, scale / 1.25); if (scale <= 1) { ox = 0; oy = 0; } applyTransform(); }
        if (e.key === '0') resetZoom();
    });
    $('#gallery-img-container').on('wheel', function (e) {
        e.preventDefault();
        var delta = e.originalEvent.deltaY > 0 ? 0.85 : 1.18;
        scale = Math.min(5, Math.max(0.5, scale * delta));
        applyTransform();
    });
    $('#gallery-img-container').on('mousedown', function (e) {
        if (scale <= 1) return;
        dragging = true; startX = e.clientX; startY = e.clientY; startOx = ox; startOy = oy;
        $(this).css('cursor', 'grabbing'); e.preventDefault();
    });
    $(document).on('mousemove', function (e) { if (!dragging) return; ox = startOx + (e.clientX - startX); oy = startOy + (e.clientY - startY); applyTransform(); });
    $(document).on('mouseup', function () { if (!dragging) return; dragging = false; $('#gallery-img-container').css('cursor', scale > 1 ? 'grab' : 'default'); });
    $('#gallery-img-container').on('dblclick', resetZoom);
});
</script>
<style>
#gallery-img-preview { transition: transform 0.05s linear; }
</style>
@endsection
