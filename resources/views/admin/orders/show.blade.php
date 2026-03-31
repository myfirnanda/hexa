@extends('layouts.admin')
@section('title', 'Order #' . $order->id)
@section('topbar-title', 'Detail Order')

@section('content')
<style>
    .client-info-grid { display:grid; grid-template-columns:repeat(2,1fr); gap:1rem; }
    .order-detail-grid { display:grid; grid-template-columns:repeat(3,1fr); gap:1.25rem; margin-bottom:1.25rem; }
    @media(max-width:767px) {
        .client-info-grid  { grid-template-columns:1fr; }
        .order-detail-grid { grid-template-columns:1fr; }
        .order-header-row  { flex-direction:column; align-items:flex-start; }
        .file-brief-row    { flex-direction:column; align-items:flex-start; }
    }
</style>

<div class="mb-5">
    <a href="{{ route('admin.orders.index') }}" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg font-semibold text-[13px] admin-btn-secondary no-underline border-none cursor-pointer transition-all duration-150">
        <span class="material-symbols-outlined">arrow_back</span>
        Kembali
    </a>
</div>

<div class="order-header-row flex items-center justify-between flex-wrap gap-4 mb-7">
    <div>
        <h1 class="text-2xl font-bold">Order #{{ $order->id }}</h1>
        <p class="text-sm admin-text-muted mt-1">Disubmit {{ $order->created_at->format('d F Y, H:i') }}</p>
    </div>
    @php
        $badgeClasses = match($order->status) {
            'pending' => 'bg-yellow-500/12 text-yellow-400',
            'in_progress' => 'bg-blue-500/12 text-blue-400',
            'completed' => 'bg-green-500/12 text-green-400',
            'rejected' => 'bg-red-500/12 text-red-400',
            default => 'bg-slate-500/12 text-slate-400',
        };
    @endphp
    <span class="inline-block px-4 py-1.5 rounded-full text-sm font-semibold {{ $badgeClasses }}">{{ str_replace('_', ' ', $order->status) }}</span>
</div>

{{-- Client Info --}}
<div class="admin-card border rounded-xl overflow-hidden mb-5">
    <div class="px-5 py-4 border-b admin-border flex items-center justify-between gap-3">
        <h2 class="text-[15px] font-semibold"><span class="material-symbols-outlined text-lg align-middle mr-1.5">person</span> Informasi Client</h2>
    </div>
    <div class="p-5">
        <div class="client-info-grid">
            <div>
                <div class="text-xs admin-text-muted mb-1">Nama</div>
                <div class="font-semibold">{{ $order->name }}</div>
            </div>
            <div>
                <div class="text-xs admin-text-muted mb-1">Email</div>
                <div><a href="mailto:{{ $order->email }}" class="text-blue-500 no-underline hover:text-blue-400">{{ $order->email }}</a></div>
            </div>
            <div>
                <div class="text-xs admin-text-muted mb-1">Telepon</div>
                <div>{{ $order->phone ?? '-' }}</div>
            </div>
            <div>
                <div class="text-xs admin-text-muted mb-1">Perusahaan</div>
                <div>{{ $order->company ?? '-' }}</div>
            </div>
        </div>
    </div>
</div>

{{-- Project Details + File Brief + Save (wrapped in one form) --}}
<form method="POST" action="{{ route('admin.orders.status', [$order, 'pending']) }}" id="status-form">
@csrf
@method('PATCH')

{{-- Project Details --}}
<div class="admin-card border rounded-xl overflow-hidden mb-5">
    <div class="px-5 py-4 border-b admin-border flex items-center justify-between gap-3">
        <h2 class="text-[15px] font-semibold"><span class="material-symbols-outlined text-lg align-middle mr-1.5">assignment</span> Detail Project</h2>
    </div>
    <div class="p-5">
        {{-- Row 1: Kategori | Budget | Status --}}
        <div class="order-detail-grid">
            <div>
                <div class="text-xs admin-text-muted mb-2">Kategori</div>
                @if($order->categories)
                    <div class="flex flex-wrap gap-1.5">
                        @foreach($order->categories as $cat)
                        <span class="bg-indigo-500/12 text-indigo-400 px-3 py-1 rounded-full text-xs font-medium">{{ $cat }}</span>
                        @endforeach
                    </div>
                @else
                    <span class="text-sm admin-text-muted italic">-</span>
                @endif
            </div>
            <div>
                <div class="text-xs admin-text-muted mb-1">Budget</div>
                <div class="font-semibold">{{ $order->budget ?? '-' }}</div>
            </div>
            <div>
                <div class="text-xs admin-text-muted mb-2">Status Proyek</div>
                <select class="admin-input w-full px-3.5 py-2.5 rounded-lg font-[inherit] text-sm outline-none transition-colors duration-200 focus:border-blue-500 cursor-pointer" id="status-select">
                    <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="in_progress" {{ $order->status === 'in_progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="completed" {{ $order->status === 'completed' ? 'selected' : '' }}>Completed</option>
                    <option value="rejected" {{ $order->status === 'rejected' ? 'selected' : '' }}>Rejected</option>
                </select>
            </div>
        </div>
        {{-- Row 2: Deskripsi (full width) --}}
        <div>
            <div class="text-xs admin-text-muted mb-2">Deskripsi Project</div>
            @if($order->project_description)
            <p class="text-sm admin-text-secondary leading-relaxed whitespace-pre-wrap">{{ $order->project_description }}</p>
            @else
            <p class="text-sm admin-text-muted italic">Tidak ada deskripsi.</p>
            @endif
        </div>
    </div>
</div>

{{-- File Brief --}}
<div class="admin-card border rounded-xl overflow-hidden mb-5">
    <div class="px-5 py-4 border-b admin-border flex items-center justify-between gap-3">
        <h2 class="text-[15px] font-semibold"><span class="material-symbols-outlined text-lg align-middle mr-1.5">attach_file</span> File Brief</h2>
    </div>
    <div class="p-5">
        @if($order->file_path)
        @php
            $fileName = basename($order->file_path);
            $ext = strtoupper(pathinfo($fileName, PATHINFO_EXTENSION));
            $fileUrl = asset('storage/' . $order->file_path);
        @endphp
        <div class="file-brief-row flex items-center justify-between gap-3 p-3.5 admin-deep-bg border rounded-[10px]">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-blue-500/12 rounded-[10px] flex items-center justify-center text-blue-400">
                    <span class="material-symbols-outlined">description</span>
                </div>
                <div>
                    <div class="text-sm font-medium">{{ $fileName }}</div>
                    <div class="text-xs admin-text-muted">{{ $ext }} file</div>
                </div>
            </div>
            <button type="button"
                id="btn-preview-file"
                data-url="{{ $fileUrl }}"
                data-filename="{{ $fileName }}"
                class="inline-flex items-center gap-1.5 px-4 py-2 rounded-lg font-semibold text-sm border-none cursor-pointer transition-all duration-150 text-blue-400">
                <span class="material-symbols-outlined text-[18px]">visibility</span> Preview
            </button>
        </div>
        @else
        <p class="admin-text-muted italic text-sm">Tidak ada file yang dilampirkan.</p>
        @endif
    </div>
</div>

{{-- Save button: bottom right, outside cards --}}
<div class="flex justify-end mb-5">
    <button type="submit" class="inline-flex items-center gap-1.5 px-5 py-2.5 rounded-lg font-semibold text-sm bg-blue-500 text-white border-none cursor-pointer transition-all duration-150 hover:bg-blue-600">
        <span class="material-symbols-outlined text-[18px]">save</span> Simpan Perubahan
    </button>
</div>

</form>

{{-- Preview Modal --}}
<div id="file-preview-modal" role="dialog" aria-modal="true"
    style="display:none; position:fixed; inset:0; z-index:9999; align-items:center; justify-content:center; padding:1rem;">
    {{-- Backdrop --}}
    <div id="file-preview-backdrop"
        style="position:absolute; inset:0; background:rgba(0,0,0,0.7);"></div>
    {{-- Modal Card --}}
    <div style="position:relative; z-index:1; width:100%; max-width:1024px; height:90vh; display:flex; flex-direction:column; border-radius:16px; overflow:hidden; box-shadow:0 25px 60px rgba(0,0,0,0.5); background:var(--admin-card-bg);">
        {{-- Header --}}
        <div class="admin-border" style="display:flex; align-items:center; justify-content:space-between; gap:1rem; padding:1rem 1.25rem; border-bottom-width:1px; border-bottom-style:solid; flex-shrink:0;">
            <h3 style="margin:0; font-size:15px; font-weight:600; display:flex; align-items:center; gap:8px;">
                <span class="material-symbols-outlined" style="font-size:18px; color:#60a5fa;">description</span>
                Preview Dokumen
            </h3>
            <div style="display:flex; align-items:center; gap:8px;">
                <button id="btn-close-preview" type="button"
                    style="display:inline-flex; align-items:center; justify-content:center; width:32px; height:32px; border-radius:8px; background:rgba(100,116,139,0.15); color:#94a3b8; border:none; cursor:pointer;">
                    <span class="material-symbols-outlined" style="font-size:18px;">close</span>
                </button>
            </div>
        </div>
        {{-- Body --}}
        <div style="flex:1; overflow:hidden; background:#0f172a;">
            <iframe id="file-preview-iframe" src="" title="Preview Dokumen"
                style="width:100%; height:100%; border:none; display:block;"></iframe>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
$(function () {
    $('#status-form').on('submit', function () {
        var val = $('#status-select').val();
        $(this).attr('action', '{{ url("/admin/orders/".$order->id."/status") }}/' + val);
    });

    // File Preview Modal
    var $modal   = $('#file-preview-modal');
    var $iframe  = $('#file-preview-iframe');
    var $dlBtn   = $('#modal-download-btn');

    function openPreview(url, filename) {
        $iframe.attr('src', url);
        $dlBtn.attr('href', url).attr('download', filename);
        $modal.css('display', 'flex');
        $('body').css('overflow', 'hidden');
    }

    function closePreview() {
        $modal.css('display', 'none');
        $iframe.attr('src', '');
        $('body').css('overflow', '');
    }

    $('#btn-preview-file').on('click', function () {
        openPreview($(this).data('url'), $(this).data('filename'));
    });

    $('#btn-close-preview, #file-preview-backdrop').on('click', closePreview);

    $(document).on('keydown', function (e) {
        if (e.key === 'Escape') closePreview();
    });
});
</script>
@endsection
