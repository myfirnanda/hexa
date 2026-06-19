@extends('layouts.admin')
@section('title', 'Edit Banner')
@section('topbar-title', 'Edit Banner')

@php $pages = \App\Models\PageBanner::$pages; @endphp

@section('content')
<div class="max-w-2xl">
    <div class="flex items-center gap-3 mb-7">
        <a href="{{ route('manager.banners.index', ['page_filter' => $banner->page]) }}" class="inline-flex items-center justify-center size-9 rounded-lg no-underline transition-all admin-surface-hover" title="Kembali">
            <span class="material-symbols-outlined text-[20px] admin-text-muted">arrow_back</span>
        </a>
        <div>
            <h1 class="text-xl font-bold admin-text">Edit Banner</h1>
            <p class="text-sm admin-text-muted mt-0.5">{{ $banner->title ?: 'Banner #' . $banner->id }}</p>
        </div>
    </div>

    @if($errors->any())
    <div class="mb-6 px-4 py-3 rounded-xl text-sm font-medium" style="background:rgba(239,68,68,0.1);color:#f87171;border:1px solid rgba(239,68,68,0.2);">
        <ul class="list-disc list-inside space-y-1">
            @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('manager.banners.update', $banner) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="admin-card border rounded-xl p-6 space-y-5">

            {{-- Page Select --}}
            <div>
                <label class="block text-[13px] font-semibold admin-text mb-1.5">Halaman <span class="text-red-400">*</span></label>
                <select name="page" class="admin-input w-full rounded-lg px-3 py-2.5 text-sm outline-none" required>
                    @foreach($pages as $key => $label)
                        <option value="{{ $key }}" {{ (old('page', $banner->page) === $key) ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Title --}}
            <div>
                <label class="block text-[13px] font-semibold admin-text mb-1.5">
                    Judul Banner <span class="text-[12px] font-normal admin-text-muted">(opsional)</span>
                </label>
                <input type="text" name="title" value="{{ old('title', $banner->title) }}"
                    placeholder="Contoh: Banner Utama Homepage"
                    class="admin-input w-full rounded-lg px-3 py-2.5 text-sm outline-none">
            </div>

            {{-- Info box --}}
            <div class="rounded-xl px-4 py-3 text-[12px] leading-relaxed" style="background:rgba(59,130,246,0.07);border:1px solid rgba(59,130,246,0.2);color:#60a5fa;">
                <span class="font-bold">ℹ️ Teks opsional & bilingual:</span> Isi versi EN dan ID agar teks berganti saat pengguna ganti bahasa.
                <strong>Jika dikosongkan, teks default dari layout halaman akan otomatis digunakan.</strong>
            </div>

            {{-- Bilingual Tabs --}}
            <div>
                <div class="flex gap-2 mb-4 items-center">
                    <span class="text-[11px] font-bold uppercase tracking-widest admin-text-muted">Konten Teks:</span>
                    <div class="flex rounded-lg overflow-hidden border admin-border" style="width:fit-content;">
                        <button type="button" id="tab-en" onclick="switchLangTab('en')"
                            style="background:var(--admin-primary);color:#fff;padding:6px 18px;font-size:13px;font-weight:700;border:none;border-right:1px solid rgba(255,255,255,0.2);cursor:pointer;transition:all .15s;letter-spacing:.02em;">
                            EN &nbsp;<span style="font-weight:400;opacity:.85;">English</span>
                        </button>
                        <button type="button" id="tab-id" onclick="switchLangTab('id')"
                            style="background:transparent;color:var(--admin-text-secondary);padding:6px 18px;font-size:13px;font-weight:600;border:none;cursor:pointer;transition:all .15s;letter-spacing:.02em;">
                            ID &nbsp;<span style="font-weight:400;opacity:.85;">Indonesia</span>
                        </button>
                    </div>
                </div>

                {{-- English Fields --}}
                <div id="fields-en" class="space-y-4">
                    <div>
                        <label class="block text-[13px] font-semibold admin-text mb-1.5">
                            Judul Hero (EN) <span class="text-[12px] font-normal admin-text-muted">(kosongkan = pakai teks default)</span>
                        </label>
                        <input type="text" name="hero_title" value="{{ old('hero_title', $banner->hero_title) }}"
                            placeholder="e.g. Transforming Ideas into Digital Excellence"
                            class="admin-input w-full rounded-lg px-3 py-2.5 text-sm outline-none">
                        <p class="text-[11px] admin-text-muted mt-1.5">
                            💡 Boleh pakai HTML — <code style="background:rgba(59,130,246,0.1);color:#60a5fa;padding:1px 5px;border-radius:4px;">Judul&lt;br /&gt;&lt;span class="text-hex-blue"&gt;Teks Biru&lt;/span&gt;</code>
                        </p>
                    </div>
                    <div>
                        <label class="block text-[13px] font-semibold admin-text mb-1.5">
                            Deskripsi Hero (EN) <span class="text-[12px] font-normal admin-text-muted">(kosongkan = pakai teks default)</span>
                        </label>
                        <textarea name="hero_description" rows="3"
                            placeholder="Kosongkan untuk pakai default..."
                            class="admin-input w-full rounded-lg px-3 py-2.5 text-sm outline-none resize-none">{{ old('hero_description', $banner->hero_description) }}</textarea>
                    </div>
                    <div>
                        <label class="block text-[13px] font-semibold admin-text mb-1.5">
                            Teks Button (EN) <span class="text-[12px] font-normal admin-text-muted">(kosongkan = pakai default)</span>
                        </label>
                        <input type="text" name="button_text" value="{{ old('button_text', $banner->button_text) }}"
                            placeholder="e.g. Consult Now"
                            class="admin-input w-full rounded-lg px-3 py-2.5 text-sm outline-none">
                    </div>
                </div>

                {{-- Indonesian Fields --}}
                <div id="fields-id" class="space-y-4 hidden">
                    <div>
                        <label class="block text-[13px] font-semibold admin-text mb-1.5">
                            Judul Hero (ID) <span class="text-[12px] font-normal admin-text-muted">(kosongkan = pakai teks default)</span>
                        </label>
                        <input type="text" name="hero_title_id" value="{{ old('hero_title_id', $banner->hero_title_id) }}"
                            placeholder="mis. Mengubah Ide Menjadi Keunggulan Digital"
                            class="admin-input w-full rounded-lg px-3 py-2.5 text-sm outline-none">
                        <p class="text-[11px] admin-text-muted mt-1.5">
                            💡 Boleh pakai HTML — <code style="background:rgba(59,130,246,0.1);color:#60a5fa;padding:1px 5px;border-radius:4px;">Judul&lt;br /&gt;&lt;span class="text-hex-blue"&gt;Teks Biru&lt;/span&gt;</code>
                        </p>
                    </div>
                    <div>
                        <label class="block text-[13px] font-semibold admin-text mb-1.5">
                            Deskripsi Hero (ID) <span class="text-[12px] font-normal admin-text-muted">(kosongkan = pakai teks default)</span>
                        </label>
                        <textarea name="hero_description_id" rows="3"
                            placeholder="Kosongkan untuk pakai default..."
                            class="admin-input w-full rounded-lg px-3 py-2.5 text-sm outline-none resize-none">{{ old('hero_description_id', $banner->hero_description_id) }}</textarea>
                    </div>
                    <div>
                        <label class="block text-[13px] font-semibold admin-text mb-1.5">
                            Teks Button (ID) <span class="text-[12px] font-normal admin-text-muted">(kosongkan = pakai default)</span>
                        </label>
                        <input type="text" name="button_text_id" value="{{ old('button_text_id', $banner->button_text_id) }}"
                            placeholder="mis. Konsultasi Sekarang"
                            class="admin-input w-full rounded-lg px-3 py-2.5 text-sm outline-none">
                    </div>
                </div>
            </div>

            {{-- Button URL --}}
            <div>
                <label class="block text-[13px] font-semibold admin-text mb-1.5">
                    Link Button <span class="text-[12px] font-normal admin-text-muted">(opsional)</span>
                </label>
                <input type="url" name="button_url" value="{{ old('button_url', $banner->button_url) }}"
                    placeholder="https://..."
                    class="admin-input w-full rounded-lg px-3 py-2.5 text-sm outline-none">
            </div>

            {{-- Current Image + Replace --}}
            <div>
                <label class="block text-[13px] font-semibold admin-text mb-1.5">Gambar Banner</label>
                <div class="mb-3 rounded-xl overflow-hidden border admin-border">
                    <img src="{{ asset('storage/' . $banner->image_path) }}" alt="{{ $banner->title }}" class="w-full max-h-48 object-cover">
                </div>
                <div id="drop-zone" class="border-2 border-dashed admin-border rounded-xl p-5 text-center cursor-pointer transition-all hover:border-blue-500" onclick="document.getElementById('banner-image-input').click()">
                    <div id="drop-placeholder">
                        <span class="material-symbols-outlined text-3xl admin-text-muted mb-1 block">upload</span>
                        <p class="text-sm admin-text-muted">Klik atau drag untuk ganti gambar</p>
                        <p class="text-[11px] admin-text-muted mt-1">JPG, PNG, WebP — maks. 4MB (kosongkan jika tidak ingin ganti)</p>
                    </div>
                    <img id="img-preview" src="" alt="" class="hidden max-h-36 mx-auto rounded-lg mt-2">
                </div>
                <input type="file" id="banner-image-input" name="image" accept="image/*" class="hidden">
            </div>

            {{-- Active --}}
            <div class="flex items-center gap-3">
                <input type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $banner->is_active) ? 'checked' : '' }} class="w-4 h-4 rounded cursor-pointer" style="accent-color: var(--admin-primary);">
                <label for="is_active" class="text-[13px] font-semibold admin-text cursor-pointer">Aktifkan banner</label>
            </div>

        </div>

        <div class="flex items-center justify-end gap-3 mt-5">
            <a href="{{ route('manager.banners.index', ['page_filter' => $banner->page]) }}" class="px-5 py-2.5 rounded-lg text-sm font-semibold admin-btn-secondary no-underline border transition-all">Batal</a>
            <button type="submit" class="px-5 py-2.5 rounded-lg text-sm font-semibold text-white transition-all hover:opacity-90" style="background: var(--admin-primary);">
                <span class="material-symbols-outlined text-[16px] align-middle mr-1">save</span>Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script>
var adminPrimary = getComputedStyle(document.documentElement).getPropertyValue('--admin-primary').trim() || '#1d4ed8';
var adminTextSec = getComputedStyle(document.documentElement).getPropertyValue('--admin-text-secondary').trim() || '#7a9ab8';

function switchLangTab(lang) {
    var isEn = lang === 'en';
    document.getElementById('fields-en').classList.toggle('hidden', !isEn);
    document.getElementById('fields-id').classList.toggle('hidden', isEn);
    document.getElementById('tab-en').style.background = isEn ? adminPrimary : 'transparent';
    document.getElementById('tab-en').style.color = isEn ? '#fff' : adminTextSec;
    document.getElementById('tab-en').style.fontWeight = isEn ? '700' : '600';
    document.getElementById('tab-id').style.background = !isEn ? adminPrimary : 'transparent';
    document.getElementById('tab-id').style.color = !isEn ? '#fff' : adminTextSec;
    document.getElementById('tab-id').style.fontWeight = !isEn ? '700' : '600';
}

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
