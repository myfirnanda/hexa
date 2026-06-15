@extends('layouts.admin')
@section('title', 'Clients')
@section('topbar-title', 'Clients')

@section('content')

<div class="flex items-center justify-between flex-wrap gap-4 mb-7 max-md:flex-col max-md:items-start">
    <div>
        <h1 class="text-xl font-bold admin-text">Clients</h1>
        <p class="text-sm admin-text-muted mt-1">Kelola daftar klien yang ditampilkan di website</p>
    </div>
    <button type="button" onclick="openCreateClient()"
        class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-lg font-semibold text-sm text-white border-none cursor-pointer transition-all duration-150 hover:opacity-90" style="background: var(--admin-primary);">
        <span class="material-symbols-outlined text-[18px]">add</span>
        Tambah Client
    </button>
</div>

<div class="admin-card border rounded-xl overflow-hidden">

    <div class="px-6 py-4 border-b admin-border flex items-center justify-between gap-3 flex-wrap">
        <div>
            <span class="text-[14px] font-bold admin-text">Semua Clients</span>
            <span class="text-[13px] admin-text-muted ml-2">({{ $clients->total() }})</span>
        </div>
        <form method="GET" action="{{ route('manager.clients.index') }}" class="flex items-center gap-2">
            <div class="relative">
                <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-[18px] admin-text-muted pointer-events-none select-none">search</span>
                <input type="text" name="search" value="{{ $search }}" placeholder="Cari nama atau kategori..."
                    class="admin-input admin-search-input rounded-lg pl-9 pr-3 py-2 text-sm outline-none w-55 focus:w-70"
                    autocomplete="off">
            </div>
            @if($search)
            <a href="{{ route('manager.clients.index') }}" class="text-[12px] font-medium admin-text-muted no-underline px-2 py-2 rounded-lg admin-surface-hover" title="Hapus filter">
                <span class="material-symbols-outlined text-[18px]">close</span>
            </a>
            @endif
        </form>
    </div>

    @if($clients->count())
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr style="background: var(--admin-surface-hover);">
                    <th class="text-left px-4 py-3 text-[11px] font-bold admin-text-muted uppercase tracking-wider border-b admin-border whitespace-nowrap w-10">#</th>
                    <th class="text-left px-4 py-3 text-[11px] font-bold admin-text-muted uppercase tracking-wider border-b admin-border whitespace-nowrap w-14">Logo</th>
                    <th class="text-left px-4 py-3 text-[11px] font-bold admin-text-muted uppercase tracking-wider border-b admin-border whitespace-nowrap">Nama</th>
                    <th class="text-left px-4 py-3 text-[11px] font-bold admin-text-muted uppercase tracking-wider border-b admin-border whitespace-nowrap">Kategori</th>
                    <th class="text-left px-4 py-3 text-[11px] font-bold admin-text-muted uppercase tracking-wider border-b admin-border whitespace-nowrap w-24">Aksi</th>
                </tr>
            </thead>
            <tbody class="admin-table-body" id="clients-table-body">
                @foreach($clients as $client)
                <tr class="admin-table-hover draggable-row" data-client-id="{{ $client->id }}">
                    <td class="px-4 py-3.5 text-[13px] admin-text-muted align-middle admin-stat-number">
                        <div class="flex items-center gap-1.5">
                            <span class="drag-handle material-symbols-outlined text-[15px]" style="color:#64748b;">drag_indicator</span>
                            <span class="row-num font-semibold">{{ $loop->iteration }}</span>
                        </div>
                    </td>
                    <td class="px-4 py-3.5 align-middle">
                        @if($client->logo)
                        <img src="{{ image_url($client->logo) }}"
                            class="size-10 rounded-lg object-contain p-1 border admin-border"
                            style="background: #fff;"
                            alt="{{ $client->name }}">
                        @else
                        <div class="size-10 rounded-lg flex items-center justify-center admin-text-muted admin-deep-bg border">
                            <span class="material-symbols-outlined text-lg">apartment</span>
                        </div>
                        @endif
                    </td>
                    <td class="px-4 py-3.5 align-middle">
                        <div class="text-[13px] font-semibold admin-text">{{ $client->name }}</div>
                    </td>
                    <td class="px-4 py-3.5 align-middle">
                        <span class="inline-block px-2.5 py-1 rounded-md text-[11px] font-bold capitalize" style="background: rgba(37,99,235,0.10); color: #60a5fa;">
                            {{ ucfirst($client->category) }}
                        </span>
                    </td>
                    <td class="px-4 py-3.5 align-middle">
                        <div class="flex items-center gap-1.5">
                            <button type="button"
                                class="inline-flex items-center justify-center size-8 rounded-lg cursor-pointer transition-all duration-150 border"
                                style="background: rgba(37,99,235,0.08); color: #60a5fa; border-color: rgba(37,99,235,0.15);"
                                onmouseover="this.style.background='rgba(37,99,235,0.18)'"
                                onmouseout="this.style.background='rgba(37,99,235,0.08)'"
                                onclick="openEditClient({{ $client->id }}, '{{ e($client->name) }}', '{{ e($client->category) }}', '{{ $client->logo ? image_url($client->logo) : '' }}')"
                                title="Edit client">
                                <span class="material-symbols-outlined text-[16px]">edit</span>
                            </button>
                            <button type="button"
                                class="inline-flex items-center justify-center size-8 rounded-lg cursor-pointer transition-all duration-150 border"
                                style="background: rgba(239,68,68,0.08); color: #f87171; border-color: rgba(239,68,68,0.15);"
                                onmouseover="this.style.background='rgba(239,68,68,0.18)'"
                                onmouseout="this.style.background='rgba(239,68,68,0.08)'"
                                onclick="confirmDelete('{{ route('manager.clients.destroy', $client) }}')"
                                title="Hapus client">
                                <span class="material-symbols-outlined text-[16px]">delete</span>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="px-6 py-4 border-t admin-border">{{ $clients->links() }}</div>

    @elseif($search)
    <div class="flex flex-col items-center justify-center py-16 px-5">
        <span class="material-symbols-outlined text-5xl admin-text-muted mb-3 opacity-30">search_off</span>
        <p class="text-sm admin-text-secondary font-medium">Tidak ada hasil untuk <strong class="admin-text">"{{ $search }}"</strong></p>
        <a href="{{ route('manager.clients.index') }}" class="mt-3 text-[13px] no-underline" style="color: var(--admin-primary);">Hapus filter</a>
    </div>

    @else
    <div class="flex flex-col items-center justify-center py-16 px-5">
        <span class="material-symbols-outlined text-5xl admin-text-muted mb-3 opacity-30">apartment</span>
        <p class="text-sm admin-text-secondary mb-3">Belum ada client.</p>
        <button type="button" onclick="openCreateClient()"
            class="inline-flex items-center gap-1.5 px-4 py-2 rounded-lg font-semibold text-sm text-white border-none cursor-pointer" style="background: var(--admin-primary);">
            <span class="material-symbols-outlined text-[18px]">add</span> Tambah Client
        </button>
    </div>
    @endif
</div>

{{-- Create Client Modal --}}
<div id="createClientModal" class="fixed inset-0 z-100 flex items-center justify-center p-4" style="display:none" aria-modal="true" role="dialog">
    <div id="createClientBackdrop" class="absolute inset-0 bg-black/60 backdrop-blur-sm transition-opacity duration-200 opacity-0"></div>
    <div id="createClientDialog" class="relative admin-card rounded-2xl border shadow-2xl transition-all duration-200 opacity-0 overflow-hidden w-full max-w-sm" style="transform:scale(0.95)">
        <div class="flex items-center justify-between px-5 py-4 border-b admin-border">
            <div class="flex items-center gap-3">
                <div class="size-8 rounded-lg flex items-center justify-center shrink-0" style="background: rgba(16,185,129,0.12);">
                    <span class="material-symbols-outlined text-[18px]" style="color: #34d399;">add_business</span>
                </div>
                <div>
                    <h3 class="text-[14px] font-bold admin-text leading-tight">Tambah Client</h3>
                    <p class="text-[11px] admin-text-muted mt-0.5">Tambahkan client baru ke daftar</p>
                </div>
            </div>
            <button type="button" onclick="closeCreateClient()" aria-label="Tutup"
                class="flex items-center justify-center size-8 rounded-lg border-none bg-transparent cursor-pointer admin-text-muted admin-surface-hover transition-colors duration-150">
                <span class="material-symbols-outlined text-[20px]">close</span>
            </button>
        </div>
        <form method="POST" action="{{ route('manager.clients.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_source" value="create_client">
            <div class="px-5 py-5 space-y-4">
                <div>
                    <label for="createClientName" class="block text-[12px] font-bold admin-text-secondary mb-1.5 uppercase tracking-wide">Nama Client <span class="text-red-400">*</span></label>
                    <input type="text" id="createClientName" name="name" required
                        value="{{ old('_source') === 'create_client' ? old('name') : '' }}"
                        placeholder="Nama perusahaan client..."
                        class="w-full px-3.5 py-2.5 rounded-lg admin-input font-[inherit] text-sm outline-none @error('name') border-red-400 @enderror">
                    @if(old('_source') === 'create_client')
                    @error('name')<p class="text-xs text-red-400 mt-1">{{ $message }}</p>@enderror
                    @endif
                </div>
                <div>
                    <label for="createClientCategory" class="block text-[12px] font-bold admin-text-secondary mb-1.5 uppercase tracking-wide">Kategori <span class="text-red-400">*</span></label>
                    <select id="createClientCategory" name="category" required
                        class="w-full px-3.5 py-2.5 rounded-lg admin-input font-[inherit] text-sm outline-none cursor-pointer @error('category') border-red-400 @enderror">
                        <option value="">Pilih kategori...</option>
                        @foreach(['education'=>'Education','government'=>'Government','soe'=>'SOE','finance'=>'Finance','industrial'=>'Industrial','retail'=>'Retail'] as $v => $l)
                        <option value="{{ $v }}" {{ old('_source') === 'create_client' && old('category') === $v ? 'selected' : '' }}>{{ $l }}</option>
                        @endforeach
                    </select>
                    @if(old('_source') === 'create_client')
                    @error('category')<p class="text-xs text-red-400 mt-1">{{ $message }}</p>@enderror
                    @endif
                </div>
                <div>
                    <label for="createClientLogo" class="block text-[12px] font-bold admin-text-secondary mb-1.5 uppercase tracking-wide">
                        Logo <span class="text-[11px] font-normal admin-text-muted normal-case">(opsional)</span>
                    </label>
                    <input type="file" id="createClientLogo" name="logo" accept="image/*"
                        class="w-full px-3.5 py-2.5 rounded-lg admin-input font-[inherit] text-sm outline-none @error('logo') border-red-400 @enderror">
                    @if(old('_source') === 'create_client')
                    @error('logo')<p class="text-xs text-red-400 mt-1">{{ $message }}</p>@enderror
                    @endif
                </div>
            </div>
            <div class="flex justify-end gap-2 px-5 py-4 border-t admin-border">
                <button type="button" onclick="closeCreateClient()"
                    class="inline-flex items-center px-4 py-2 rounded-lg font-semibold text-sm admin-card admin-text border admin-border cursor-pointer transition-all duration-150 admin-surface-hover">
                    Batal
                </button>
                <button type="submit"
                    class="inline-flex items-center gap-1.5 px-4 py-2 rounded-lg font-semibold text-sm text-white border-none cursor-pointer transition-all duration-150 hover:opacity-90" style="background: var(--admin-primary);">
                    <span class="material-symbols-outlined text-[18px]">save</span>
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

{{-- Edit Client Modal --}}
<div id="editClientModal" class="fixed inset-0 z-100 flex items-center justify-center p-4" style="display:none" aria-modal="true" role="dialog">
    <div id="editClientBackdrop" class="absolute inset-0 bg-black/60 backdrop-blur-sm transition-opacity duration-200 opacity-0"></div>
    <div id="editClientDialog" class="relative admin-card rounded-2xl border shadow-2xl transition-all duration-200 opacity-0 overflow-hidden w-full max-w-sm" style="transform:scale(0.95)">
        <div class="flex items-center justify-between px-5 py-4 border-b admin-border">
            <div class="flex items-center gap-3">
                <div class="size-8 rounded-lg flex items-center justify-center shrink-0" style="background: var(--admin-brand-dim);">
                    <span class="material-symbols-outlined text-[18px]" style="color: var(--admin-brand);">edit</span>
                </div>
                <div>
                    <h3 class="text-[14px] font-bold admin-text leading-tight">Edit Client</h3>
                    <p class="text-[11px] admin-text-muted mt-0.5">Perbarui informasi client</p>
                </div>
            </div>
            <button type="button" onclick="closeEditClient()" aria-label="Tutup"
                class="flex items-center justify-center size-8 rounded-lg border-none bg-transparent cursor-pointer admin-text-muted admin-surface-hover transition-colors duration-150">
                <span class="material-symbols-outlined text-[20px]">close</span>
            </button>
        </div>
        <form id="editClientForm" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="px-5 py-5 space-y-4">
                <div>
                    <label for="editClientName" class="block text-[12px] font-bold admin-text-secondary mb-1.5 uppercase tracking-wide">Nama Client <span class="text-red-400">*</span></label>
                    <input type="text" id="editClientName" name="name" required placeholder="Nama perusahaan client..."
                        class="w-full px-3.5 py-2.5 rounded-lg admin-input font-[inherit] text-sm outline-none">
                </div>
                <div>
                    <label for="editClientCategory" class="block text-[12px] font-bold admin-text-secondary mb-1.5 uppercase tracking-wide">Kategori <span class="text-red-400">*</span></label>
                    <select id="editClientCategory" name="category" required
                        class="w-full px-3.5 py-2.5 rounded-lg admin-input font-[inherit] text-sm outline-none cursor-pointer">
                        <option value="">Pilih kategori...</option>
                        <option value="education">Education</option>
                        <option value="government">Government</option>
                        <option value="soe">SOE</option>
                        <option value="finance">Finance</option>
                        <option value="industrial">Industrial</option>
                        <option value="retail">Retail</option>
                    </select>
                </div>
                <div>
                    <label for="editClientLogo" class="block text-[12px] font-bold admin-text-secondary mb-1.5 uppercase tracking-wide">
                        Logo <span class="text-[11px] font-normal admin-text-muted normal-case">(kosongkan jika tidak diubah)</span>
                    </label>
                    <div id="editClientLogoPreview" class="mb-2 p-2 rounded-lg admin-deep-bg border admin-border" style="display:none">
                        <p class="text-[11px] admin-text-muted mb-1.5">Logo saat ini:</p>
                        <img id="editClientLogoImg" src="" alt="" class="rounded bg-white p-1" style="max-width:100px;max-height:100px;object-fit:contain;">
                    </div>
                    <input type="file" id="editClientLogo" name="logo" accept="image/*"
                        class="w-full px-3.5 py-2.5 rounded-lg admin-input font-[inherit] text-sm outline-none">
                </div>
            </div>
            <div class="flex justify-end gap-2 px-5 py-4 border-t admin-border">
                <button type="button" onclick="closeEditClient()"
                    class="inline-flex items-center px-4 py-2 rounded-lg font-semibold text-sm admin-card admin-text border admin-border cursor-pointer transition-all duration-150 admin-surface-hover">
                    Batal
                </button>
                <button type="submit"
                    class="inline-flex items-center gap-1.5 px-4 py-2 rounded-lg font-semibold text-sm text-white border-none cursor-pointer transition-all duration-150 hover:opacity-90" style="background: var(--admin-primary);">
                    <span class="material-symbols-outlined text-[18px]">save</span>
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
(function ($) {
    function makeModal(modalId, backdropId, dialogId) {
        var $modal = $('#' + modalId), $backdrop = $('#' + backdropId), $dialog = $('#' + dialogId), busy = false;
        function open() {
            $modal.css('display', 'flex');
            $('body').css('overflow', 'hidden');
            requestAnimationFrame(function () {
                $backdrop.css('opacity', '1');
                $dialog.css({ opacity: '1', transform: 'scale(1)' });
            });
        }
        function close() {
            if (busy) return; busy = true;
            $backdrop.css('opacity', '0');
            $dialog.css({ opacity: '0', transform: 'scale(0.95)' });
            setTimeout(function () { $modal.css('display', 'none'); $('body').css('overflow', ''); busy = false; }, 200);
        }
        $backdrop.on('click', close);
        return { open: open, close: close, $modal: $modal };
    }

    var create = makeModal('createClientModal', 'createClientBackdrop', 'createClientDialog');
    var edit   = makeModal('editClientModal',   'editClientBackdrop',   'editClientDialog');

    window.openCreateClient  = function () { create.open(); setTimeout(function(){ $('#createClientName').trigger('focus'); }, 100); };
    window.closeCreateClient = create.close;

    window.openEditClient = function (id, name, category, logoUrl) {
        $('#editClientForm').attr('action', '/manager/clients/' + id);
        $('#editClientName').val(name);
        $('#editClientCategory').val(category);
        $('#editClientLogo').val('');
        if (logoUrl) { $('#editClientLogoImg').attr('src', logoUrl); $('#editClientLogoPreview').css('display', 'block'); }
        else         { $('#editClientLogoPreview').css('display', 'none'); }
        edit.open(); setTimeout(function(){ $('#editClientName').trigger('focus'); }, 100);
    };
    window.closeEditClient = edit.close;

    $(function () {
        @if($errors->any() && old('_source') === 'create_client') create.open(); @endif

        // Drag-and-drop sort
        var $tbody = $('#clients-table-body');
        if ($tbody.length) {
            $tbody.sortable({
                axis: 'y',
                cancel: 'button, a, input, select, textarea',
                cursor: 'grabbing',
                opacity: 0.75,
                placeholder: 'sort-placeholder',
                helper: function (e, ui) {
                    ui.children().each(function () { $(this).width($(this).width()); });
                    return ui;
                },
                start: function (e, ui) { ui.placeholder.height(ui.item.outerHeight()); },
                update: function () {
                    $tbody.find('.draggable-row').each(function (i) { $(this).find('.row-num').text(i + 1); });
                    var order = [];
                    $tbody.find('.draggable-row').each(function () {
                        var id = parseInt($(this).data('client-id'));
                        if (!isNaN(id)) order.push(id);
                    });
                    $.ajax({
                        url: '{{ route("manager.clients.sort") }}',
                        type: 'POST',
                        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                        data: { order: order },
                        error: function (xhr) { console.error('Sort error:', xhr.status, xhr.responseText); }
                    });
                }
            }).disableSelection();
        }
        $(document).on('keydown', function (e) {
            if (e.key !== 'Escape') return;
            if (edit.$modal.is(':visible'))   window.closeEditClient();
            if (create.$modal.is(':visible')) window.closeCreateClient();
        });
    });
}(jQuery));
</script>
<style>
#clients-table-body .draggable-row { cursor: grab; }
#clients-table-body .sort-placeholder { visibility: visible !important; background: rgba(59,130,246,0.07) !important; outline: 2px dashed rgba(59,130,246,0.35); }
#clients-table-body .ui-sortable-helper { box-shadow: 0 8px 28px rgba(0,0,0,0.45) !important; }
</style>
@endsection
