@extends('layouts.admin')
@section('title', 'Tambah Kategori Produk')
@section('topbar-title', 'Tambah Kategori Produk')

@section('content')

<div class="mb-7">
    <a href="{{ route('manager.product-categories.index') }}" class="inline-flex items-center gap-2 text-sm no-underline transition-colors" style="color: var(--admin-primary);">
        <span class="material-symbols-outlined text-[18px]">arrow_back</span>
        Kembali
    </a>
</div>

<div class="max-w-2xl">
    <div class="admin-card border rounded-xl p-6">
        <h2 class="text-lg font-bold admin-text mb-6">Tambah Kategori Produk Baru</h2>

        <form method="POST" action="{{ route('manager.product-categories.store') }}">
            @csrf

            <div class="space-y-5">
                <!-- Nama -->
                <div>
                    <label for="name" class="block text-sm font-semibold admin-text mb-2">Nama Kategori <span class="text-red-500">*</span></label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}"
                        class="w-full admin-input px-3 py-2.5 rounded-lg text-sm {{ $errors->has('name') ? 'border-red-500' : '' }}"
                        placeholder="Contoh: E-Commerce, ERP, CMS"
                        required>
                    @error('name')
                        <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Warna -->
                <div>
                    <label for="color" class="block text-sm font-semibold admin-text mb-2">Warna Badge <span class="text-red-500">*</span></label>
                    <div class="flex items-center gap-3">
                        <input type="color" id="color" name="color" value="{{ old('color', '#0C5BED') }}"
                            class="w-12 h-10 rounded-lg cursor-pointer"
                            required>
                        <input type="text" id="color-text" name="color-text" value="{{ old('color', '#0C5BED') }}"
                            class="flex-1 admin-input px-3 py-2.5 rounded-lg text-sm {{ $errors->has('color') ? 'border-red-500' : '' }}"
                            placeholder="#0C5BED"
                            readonly>
                    </div>
                    @error('color')
                        <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Preview -->
                <div>
                    <label class="block text-sm font-semibold admin-text mb-2">Preview</label>
                    <div class="p-4 rounded-lg admin-surface-hover">
                        <span class="inline-block px-3 py-1.5 rounded-full text-white text-sm font-bold" id="preview-badge" style="background-color: {{ old('color', '#0C5BED') }};">
                            {{ old('name', 'Preview Kategori') }}
                        </span>
                    </div>
                </div>
            </div>

            <div class="flex items-center gap-3 mt-8">
                <button type="submit" class="inline-flex items-center gap-1.5 px-6 py-2.5 rounded-lg font-semibold text-sm text-white no-underline border-none cursor-pointer transition-all duration-150 hover:opacity-90" style="background: var(--admin-primary);">
                    <span class="material-symbols-outlined text-[18px]">check</span>
                    Simpan Kategori
                </button>
                <a href="{{ route('manager.product-categories.index') }}" class="inline-flex items-center gap-1.5 px-6 py-2.5 rounded-lg font-semibold text-sm no-underline border transition-all duration-150" style="color: var(--admin-primary); border-color: var(--admin-primary);">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>

<script>
document.getElementById('color').addEventListener('input', function() {
    const color = this.value;
    document.getElementById('color-text').value = color;
    document.getElementById('name').addEventListener('input', updatePreview);
    document.getElementById('preview-badge').style.backgroundColor = color;
});

function updatePreview() {
    const name = document.getElementById('name').value || 'Preview Kategori';
    document.getElementById('preview-badge').textContent = name;
}

document.getElementById('name').addEventListener('input', updatePreview);
</script>
@endsection
