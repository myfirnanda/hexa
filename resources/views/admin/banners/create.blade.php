@extends('layouts.admin')
@section('title', 'Tambah Banner')
@section('topbar-title', 'Tambah Banner')

@php $pages = \App\Models\PageBanner::$pages; @endphp

@section('content')
<div class="max-w-2xl">
    <div class="flex items-center gap-3 mb-7">
        <a href="{{ route('manager.banners.index') }}" class="inline-flex items-center justify-center size-9 rounded-lg no-underline transition-all admin-surface-hover" title="Kembali">
            <span class="material-symbols-outlined text-[20px] admin-text-muted">arrow_back</span>
        </a>
        <div>
            <h1 class="text-xl font-bold admin-text">Tambah Banner</h1>
            <p class="text-sm admin-text-muted mt-0.5">Upload gambar banner baru untuk halaman website</p>
        </div>
    </div>

    @if($errors->any())
    <div class="mb-6 px-4 py-3 rounded-xl text-sm font-medium" style="background:rgba(239,68,68,0.1);color:#f87171;border:1px solid rgba(239,68,68,0.2);">
        <ul class="list-disc list-inside space-y-1">
            @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('manager.banners.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="admin-card border rounded-xl p-6 space-y-5">

            {{-- Page Select --}}
            <div>
                <label class="block text-[13px] font-semibold admin-text mb-1.5">Halaman <span class="text-red-400">*</span></label>
                <select name="page" class="admin-input w-full rounded-lg px-3 py-2.5 text-sm outline-none" required>
                    <option value="">— Pilih Halaman —</option>
                    @foreach($pages as $key => $label)
                        <option value="{{ $key }}" {{ old('page') === $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Title --}}
            <div>
                <label class="block text-[13px] font-semibold admin-text mb-1.5">
                    Judul Banner <span class="text-[12px] font-normal admin-text-muted">(opsional, untuk label di admin)</span>
                </label>
                <input type="text" name="title" value="{{ old('title') }}"
                    placeholder="Contoh: Banner Utama Homepage"
                    class="admin-input w-full rounded-lg px-3 py-2.5 text-sm outline-none">
            </div>

            {{-- Info box --}}
            <div class="rounded-xl px-4 py-3 text-[12px] leading-relaxed" style="background:rgba(59,130,246,0.07);border:1px solid rgba(59,130,246,0.2);color:#60a5fa;">
                <span class="font-bold">ℹ️ Teks opsional:</span> Field Judul Hero, Deskripsi, dan Teks Button bersifat opsional.
                <strong>Jika dikosongkan, teks default dari layout halaman akan otomatis digunakan.</strong>
                Isi hanya jika ingin mengganti teks default.
            </div>

            {{-- Hero Title --}}
            <div>
                <label class="block text-[13px] font-semibold admin-text mb-1.5">
                    Judul Hero <span class="text-[12px] font-normal admin-text-muted">(kosongkan = pakai teks default halaman)</span>
                </label>
                <input type="text" name="hero_title" value="{{ old('hero_title') }}"
                    placeholder="Kosongkan untuk pakai default, atau isi dengan HTML..."
                    class="admin-input w-full rounded-lg px-3 py-2.5 text-sm outline-none">
                <p class="text-[11px] admin-text-muted mt-1.5 leading-relaxed">
                    💡 <strong>Teks biru + ganti baris:</strong> Gunakan tag HTML —<br>
                    <code style="background:rgba(59,130,246,0.1);color:#60a5fa;padding:1px 5px;border-radius:4px;font-size:11px;">Transforming Ideas into&lt;br /&gt;&lt;span class="text-hex-blue"&gt;Digital Excellence&lt;/span&gt;</code><br>
                    <span class="admin-text-muted">Tambahkan <code style="background:rgba(255,255,255,0.07);padding:1px 4px;border-radius:3px;font-size:10px;">&lt;br /&gt;</code> untuk ganti baris agar tampilan sesuai layout.</span>
                </p>
            </div>

            {{-- Hero Description --}}
            <div>
                <label class="block text-[13px] font-semibold admin-text mb-1.5">
                    Deskripsi Hero <span class="text-[12px] font-normal admin-text-muted">(kosongkan = pakai teks default halaman)</span>
                </label>
                <textarea name="hero_description" rows="3"
                    placeholder="Kosongkan untuk pakai default, atau isi dengan teks baru..."
                    class="admin-input w-full rounded-lg px-3 py-2.5 text-sm outline-none resize-none">{{ old('hero_description') }}</textarea>
            </div>

            {{-- Button Text & URL --}}
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-[13px] font-semibold admin-text mb-1.5">
                        Teks Button <span class="text-[12px] font-normal admin-text-muted">(kosongkan = pakai default)</span>
                    </label>
                    <input type="text" name="button_text" value="{{ old('button_text') }}"
                        placeholder="Kosongkan untuk pakai teks default..."
                        class="admin-input w-full rounded-lg px-3 py-2.5 text-sm outline-none">
                </div>
                <div>
                    <label class="block text-[13px] font-semibold admin-text mb-1.5">
                        Link Button <span class="text-[12px] font-normal admin-text-muted">(opsional)</span>
                    </label>
                    <input type="url" name="button_url" value="{{ old('button_url') }}"
                        placeholder="https://..."
                        class="admin-input w-full rounded-lg px-3 py-2.5 text-sm outline-none">
                </div>
            </div>

            {{-- Image Upload --}}
            <div>
                <label class="block text-[13px] font-semibold admin-text mb-1.5">Gambar Banner <span class="text-red-400">*</span></label>
                <div id="drop-zone" class="border-2 border-dashed admin-border rounded-xl p-6 text-center cursor-pointer transition-all hover:border-blue-500" onclick="document.getElementById('banner-image-input').click()">
                    <div id="drop-placeholder">
                        <span class="material-symbols-outlined text-4xl admin-text-muted mb-2 block">add_photo_alternate</span>
                        <p class="text-sm admin-text-muted">Klik atau drag & drop gambar di sini</p>
                        <p class="text-[11px] admin-text-muted mt-1">JPG, PNG, WebP — maks. 4MB</p>
                    </div>
                    <img id="img-preview" src="" alt="" class="hidden max-h-48 mx-auto rounded-lg mt-2">
                </div>
                <input type="file" id="banner-image-input" name="image" accept="image/*" class="hidden" required>
            </div>

            {{-- Active --}}
            <div class="flex items-center gap-3">
                <input type="checkbox" id="is_active" name="is_active" value="1" checked class="w-4 h-4 rounded cursor-pointer" style="accent-color: var(--admin-primary);">
                <label for="is_active" class="text-[13px] font-semibold admin-text cursor-pointer">Aktifkan banner</label>
            </div>

        </div>

        <div class="flex items-center justify-end gap-3 mt-5">
            <a href="{{ route('manager.banners.index') }}" class="px-5 py-2.5 rounded-lg text-sm font-semibold admin-btn-secondary no-underline border transition-all">Batal</a>
            <button type="submit" class="px-5 py-2.5 rounded-lg text-sm font-semibold text-white transition-all hover:opacity-90" style="background: var(--admin-primary);">
                <span class="material-symbols-outlined text-[16px] align-middle mr-1">save</span>Simpan Banner
            </button>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script>
var input = document.getElementById('banner-image-input');
input.addEventListener('change', function () {
    var file = this.files[0];
    if (!file) return;
    var reader = new FileReader();
    reader.onload = function (e) {
        document.getElementById('drop-placeholder').classList.add('hidden');
        var prev = document.getElementById('img-preview');
        prev.src = e.target.result;
        prev.classList.remove('hidden');
    };
    reader.readAsDataURL(file);
});

var dz = document.getElementById('drop-zone');
dz.addEventListener('dragover', function(e) { e.preventDefault(); dz.style.borderColor = '#3b82f6'; });
dz.addEventListener('dragleave', function() { dz.style.borderColor = ''; });
dz.addEventListener('drop', function(e) {
    e.preventDefault();
    dz.style.borderColor = '';
    var file = e.dataTransfer.files[0];
    if (file && file.type.startsWith('image/')) {
        var dt = new DataTransfer();
        dt.items.add(file);
        input.files = dt.files;
        input.dispatchEvent(new Event('change'));
    }
});
</script>
@endsection
