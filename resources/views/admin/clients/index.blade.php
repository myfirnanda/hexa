@extends('layouts.admin')
@section('title', 'Clients')
@section('topbar-title', 'Clients')

@section('content')
<div class="flex items-center justify-between flex-wrap gap-4 mb-7 max-md:flex-col max-md:items-start">
    <div>
        <h1 class="text-2xl font-bold">Clients</h1>
        <p class="text-sm admin-text-muted mt-1">Kelola daftar klien yang ditampilkan di website</p>
    </div>
    <button type="button" onclick="openCreateClient()" class="inline-flex items-center gap-1.5 px-4 py-2 rounded-lg font-semibold text-sm bg-blue-500 text-white border-none cursor-pointer transition-all duration-150 hover:bg-blue-600">
        <span class="material-symbols-outlined">add</span>
        Tambah Client
    </button>
</div>

<div class="admin-card border rounded-xl overflow-hidden">
    <div class="px-5 py-4 border-b admin-border">
        <h2 class="text-[15px] font-semibold">Semua Clients ({{ $clients->total() }})</h2>
    </div>
    @if($clients->count())
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr>
                    <th class="text-left px-4 py-2.5 text-xs font-semibold admin-text-muted uppercase tracking-wide border-b admin-border whitespace-nowrap">#</th>
                    <th class="text-left px-4 py-2.5 text-xs font-semibold admin-text-muted uppercase tracking-wide border-b admin-border whitespace-nowrap">Logo</th>
                    <th class="text-left px-4 py-2.5 text-xs font-semibold admin-text-muted uppercase tracking-wide border-b admin-border whitespace-nowrap">Nama</th>
                    <th class="text-left px-4 py-2.5 text-xs font-semibold admin-text-muted uppercase tracking-wide border-b admin-border whitespace-nowrap">Kategori</th>
                    <th class="text-left px-4 py-2.5 text-xs font-semibold admin-text-muted uppercase tracking-wide border-b admin-border whitespace-nowrap">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clients as $client)
                <tr class="admin-table-hover">
                    <td class="px-4 py-3 text-sm border-b admin-border-light align-middle">{{ $client->id }}</td>
                    <td class="px-4 py-3 text-sm border-b admin-border-light align-middle">
                        @if($client->logo)
                        <img src="{{ asset('assets/img/clients/' . $client->logo) }}" class="size-10 rounded-lg object-contain bg-white p-1 border admin-border" alt="{{ $client->name }}">
                        @else
                        <div class="size-10 rounded-lg flex items-center justify-center admin-text-muted admin-deep-bg border">
                            <span class="material-symbols-outlined text-lg">apartment</span>
                        </div>
                        @endif
                    </td>
                    <td class="px-4 py-3 text-sm border-b admin-border-light align-middle font-semibold">{{ $client->name }}</td>
                    <td class="px-4 py-3 text-sm border-b admin-border-light align-middle">
                        <span class="inline-block px-2.5 py-1 rounded-md text-xs font-semibold capitalize bg-blue-500/12 text-blue-400">{{ ucfirst($client->category) }}</span>
                    </td>
                    <td class="px-4 py-3 text-sm border-b admin-border-light align-middle">
                        <div class="flex items-center gap-1.5">
                            <button type="button" title="Edit"
                                class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg text-[13px] admin-btn-secondary border-none cursor-pointer transition-all duration-150"
                                onclick="openEditClient({{ $client->id }}, '{{ e($client->name) }}', '{{ e($client->category) }}', '{{ $client->logo ? asset('assets/img/clients/' . $client->logo) : '' }}')">
                                <span class="material-symbols-outlined text-[16px]">edit</span>
                            </button>
                            <button type="button" title="Hapus"
                                class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg text-[13px] bg-red-500/12 text-red-400 border border-red-500/20 cursor-pointer transition-all duration-150 hover:bg-red-500/20"
                                onclick="confirmDelete('{{ route('admin.clients.destroy', $client) }}')">
                                <span class="material-symbols-outlined text-[16px]">delete</span>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="px-5 py-4">{{ $clients->links() }}</div>
    @else
    <div class="text-center py-14 px-5 admin-text-muted">
        <span class="material-symbols-outlined text-5xl mb-3 block opacity-40">apartment</span>
        <p class="text-sm">Belum ada client. Klik tombol <strong>Tambah Client</strong> untuk menambahkan.</p>
    </div>
    @endif
</div>

{{-- ============================================================ --}}
{{-- CREATE CLIENT MODAL --}}
{{-- ============================================================ --}}
<div id="createClientModal" class="fixed inset-0 z-100 flex items-center justify-center p-4" style="display:none" aria-modal="true" role="dialog">
    <div id="createClientBackdrop" class="absolute inset-0 bg-black/50 backdrop-blur-sm transition-opacity duration-200 opacity-0"></div>
    <div id="createClientDialog" class="relative admin-card rounded-2xl border shadow-2xl transition-all duration-200 opacity-0 overflow-hidden" style="width:100%;max-width:400px;transform:scale(0.95)">
        <div class="flex items-center justify-between px-5 py-4 border-b admin-border">
            <div class="flex items-center gap-3">
                <div class="size-8 rounded-lg bg-green-500/15 flex items-center justify-center shrink-0">
                    <span class="material-symbols-outlined text-[18px] text-green-400">add_business</span>
                </div>
                <div>
                    <h3 class="text-[15px] font-semibold admin-text leading-tight">Tambah Client</h3>
                    <p class="text-xs admin-text-muted mt-0.5">Tambahkan client baru ke daftar</p>
                </div>
            </div>
            <button type="button" onclick="closeCreateClient()" aria-label="Tutup"
                class="flex items-center justify-center size-8 rounded-lg border-none bg-transparent cursor-pointer admin-text-muted admin-surface-hover transition-colors duration-150">
                <span class="material-symbols-outlined text-[20px]">close</span>
            </button>
        </div>
        <form method="POST" action="{{ route('admin.clients.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_source" value="create_client">
            <div class="px-5 py-5 space-y-4">
                <div>
                    <label for="createClientName" class="block text-[13px] font-semibold admin-text-secondary mb-1.5">Nama Client <span class="text-red-400">*</span></label>
                    <input type="text" id="createClientName" name="name" required
                        value="{{ old('_source') === 'create_client' ? old('name') : '' }}"
                        placeholder="Nama perusahaan client..."
                        class="w-full px-3.5 py-2.5 rounded-lg admin-input font-[inherit] text-sm outline-none transition-colors duration-200 focus:border-blue-500 @error('name') border-red-400 @enderror">
                    @if(old('_source') === 'create_client')
                    @error('name')<p class="text-xs text-red-400 mt-1">{{ $message }}</p>@enderror
                    @endif
                </div>
                <div>
                    <label for="createClientCategory" class="block text-[13px] font-semibold admin-text-secondary mb-1.5">Kategori <span class="text-red-400">*</span></label>
                    <select id="createClientCategory" name="category" required
                        class="w-full px-3.5 py-2.5 rounded-lg admin-input font-[inherit] text-sm outline-none transition-colors duration-200 focus:border-blue-500 cursor-pointer @error('category') border-red-400 @enderror">
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
                    <label for="createClientLogo" class="block text-[13px] font-semibold admin-text-secondary mb-1.5">
                        Logo <span class="text-xs font-normal admin-text-muted">(opsional)</span>
                    </label>
                    <input type="file" id="createClientLogo" name="logo" accept="image/*"
                        class="w-full px-3.5 py-2.5 rounded-lg admin-input font-[inherit] text-sm outline-none transition-colors duration-200 focus:border-blue-500 @error('logo') border-red-400 @enderror">
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
                    class="inline-flex items-center gap-1.5 px-4 py-2 rounded-lg font-semibold text-sm bg-blue-500 text-white border-none cursor-pointer transition-all duration-150 hover:bg-blue-600">
                    <span class="material-symbols-outlined text-[18px]">save</span>
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

{{-- ============================================================ --}}
{{-- EDIT CLIENT MODAL --}}
{{-- ============================================================ --}}
<div id="editClientModal" class="fixed inset-0 z-100 flex items-center justify-center p-4" style="display:none" aria-modal="true" role="dialog">
    <div id="editClientBackdrop" class="absolute inset-0 bg-black/50 backdrop-blur-sm transition-opacity duration-200 opacity-0"></div>
    <div id="editClientDialog" class="relative admin-card rounded-2xl border shadow-2xl transition-all duration-200 opacity-0 overflow-hidden" style="width:100%;max-width:400px;transform:scale(0.95)">
        <div class="flex items-center justify-between px-5 py-4 border-b admin-border">
            <div class="flex items-center gap-3">
                <div class="size-8 rounded-lg bg-blue-500/15 flex items-center justify-center shrink-0">
                    <span class="material-symbols-outlined text-[18px] text-blue-400">edit</span>
                </div>
                <div>
                    <h3 class="text-[15px] font-semibold admin-text leading-tight">Edit Client</h3>
                    <p class="text-xs admin-text-muted mt-0.5">Perbarui informasi client</p>
                </div>
            </div>
            <button type="button" onclick="closeEditClient()" aria-label="Tutup"
                class="flex items-center justify-center size-8 rounded-lg border-none bg-transparent cursor-pointer admin-text-muted admin-surface-hover transition-colors duration-150">
                <span class="material-symbols-outlined text-[20px]">close</span>
            </button>
        </div>
        <form id="editClientForm" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="px-5 py-5 space-y-4">
                <div>
                    <label for="editClientName" class="block text-[13px] font-semibold admin-text-secondary mb-1.5">Nama Client <span class="text-red-400">*</span></label>
                    <input type="text" id="editClientName" name="name" required
                        placeholder="Nama perusahaan client..."
                        class="w-full px-3.5 py-2.5 rounded-lg admin-input font-[inherit] text-sm outline-none transition-colors duration-200 focus:border-blue-500">
                </div>
                <div>
                    <label for="editClientCategory" class="block text-[13px] font-semibold admin-text-secondary mb-1.5">Kategori <span class="text-red-400">*</span></label>
                    <select id="editClientCategory" name="category" required
                        class="w-full px-3.5 py-2.5 rounded-lg admin-input font-[inherit] text-sm outline-none transition-colors duration-200 focus:border-blue-500 cursor-pointer">
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
                    <label for="editClientLogo" class="block text-[13px] font-semibold admin-text-secondary mb-1.5">
                        Logo <span class="text-xs font-normal admin-text-muted">(kosongkan jika tidak diubah)</span>
                    </label>
                    <div id="editClientLogoPreview" class="mb-2 p-2 rounded-lg admin-deep-bg border admin-border" style="display:none">
                        <p class="text-[11px] admin-text-muted mb-1.5">Logo saat ini:</p>
                        <img id="editClientLogoImg" src="" alt="" style="max-width:100px;max-height:100px;object-fit:contain;" class="rounded bg-white p-1">
                    </div>
                    <input type="file" id="editClientLogo" name="logo" accept="image/*"
                        class="w-full px-3.5 py-2.5 rounded-lg admin-input font-[inherit] text-sm outline-none transition-colors duration-200 focus:border-blue-500">
                </div>
            </div>
            <div class="flex justify-end gap-2 px-5 py-4 border-t admin-border">
                <button type="button" onclick="closeEditClient()"
                    class="inline-flex items-center px-4 py-2 rounded-lg font-semibold text-sm admin-card admin-text border admin-border cursor-pointer transition-all duration-150 admin-surface-hover">
                    Batal
                </button>
                <button type="submit"
                    class="inline-flex items-center gap-1.5 px-4 py-2 rounded-lg font-semibold text-sm bg-blue-500 text-white border-none cursor-pointer transition-all duration-150 hover:bg-blue-600">
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
        var $modal = $('#' + modalId);
        var $backdrop = $('#' + backdropId);
        var $dialog = $('#' + dialogId);
        var busy = false;

        function open() {
            $modal.css('display', 'flex');
            $('body').css('overflow', 'hidden');

            requestAnimationFrame(function () {
                $backdrop.css('opacity', '1');
                $dialog.css({
                    opacity: '1',
                    transform: 'scale(1)'
                });
            });
        }

        function close() {
            if (busy) return;
            busy = true;

            $backdrop.css('opacity', '0');
            $dialog.css({
                opacity: '0',
                transform: 'scale(0.95)'
            });

            setTimeout(function () {
                $modal.css('display', 'none');
                $('body').css('overflow', '');
                busy = false;
            }, 200);
        }

        $backdrop.on('click', close);
        return { open: open, close: close, $modal: $modal };
    }

    var create = makeModal('createClientModal', 'createClientBackdrop', 'createClientDialog');
    var edit = makeModal('editClientModal', 'editClientBackdrop', 'editClientDialog');

    window.openCreateClient = function () {
        create.open();
        $('#createClientName').trigger('focus');
    };

    window.closeCreateClient = create.close;

    window.openEditClient = function (id, name, category, logoUrl) {
        $('#editClientForm').attr('action', '/admin/clients/' + id);
        $('#editClientName').val(name);
        $('#editClientCategory').val(category);
        $('#editClientLogo').val('');

        if (logoUrl) {
            $('#editClientLogoImg').attr('src', logoUrl);
            $('#editClientLogoPreview').css('display', 'block');
        } else {
            $('#editClientLogoPreview').css('display', 'none');
        }

        edit.open();
        $('#editClientName').trigger('focus');
    };

    window.closeEditClient = edit.close;

    $(function () {
        @if($errors->any() && old('_source') === 'create_client')
        create.open();
        @endif

        $(document).on('keydown', function (e) {
            if (e.key !== 'Escape') return;
            if (edit.$modal.is(':visible')) window.closeEditClient();
            if (create.$modal.is(':visible')) window.closeCreateClient();
        });
    });
}(jQuery));
</script>
@endsection
