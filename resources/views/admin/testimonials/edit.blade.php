@extends('layouts.admin')
@section('title', 'Edit Testimonial')
@section('topbar-title', 'Edit Testimonial')

@section('content')
<div class="mb-5">
    <a href="{{ route('manager.testimonials.index') }}" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg font-semibold text-[13px] admin-btn-secondary no-underline border-none cursor-pointer transition-all duration-150">
        <span class="material-symbols-outlined">arrow_back</span>
        Kembali
    </a>
</div>

<div class="flex items-center justify-between flex-wrap gap-4 mb-7 max-md:flex-col max-md:items-start">
    <h1 class="text-2xl font-bold">Edit Testimonial</h1>
</div>

<div class="admin-card border rounded-xl overflow-hidden">
    <div class="p-5">
        <form method="POST" action="{{ route('manager.testimonials.update', $testimonial) }}">
            @csrf
            @method('PUT')

            <div class="mb-5">
                <label for="name" class="block text-[13px] font-semibold admin-text-secondary mb-1.5">Nama <span class="text-red-500">*</span></label>
                <input type="text" class="w-full px-3.5 py-2.5 rounded-lg admin-input font-[inherit] text-sm outline-none transition-colors duration-200 focus:border-blue-500" id="name" name="name" value="{{ old('name', $testimonial->name) }}" required placeholder="Nama orang...">
                @error('name') <div class="text-xs text-red-400 mt-1">{{ $message }}</div> @enderror
            </div>

            {{-- EN/ID Tab Switcher --}}
            <div class="flex gap-2 mb-4 items-center">
                <span class="text-[11px] font-bold uppercase tracking-widest admin-text-muted">Bahasa Konten:</span>
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

            <div id="fields-en">
                <div class="mb-5">
                    <label for="role" class="block text-[13px] font-semibold admin-text-secondary mb-1.5">Role / Jabatan (English) <span class="text-red-500">*</span></label>
                    <input type="text" class="w-full px-3.5 py-2.5 rounded-lg admin-input font-[inherit] text-sm outline-none transition-colors duration-200 focus:border-blue-500" id="role" name="role" value="{{ old('role', $testimonial->role) }}" required placeholder="CEO, Manager, etc...">
                    @error('role') <div class="text-xs text-red-400 mt-1">{{ $message }}</div> @enderror
                </div>
                <div class="mb-5">
                    <label for="quote" class="block text-[13px] font-semibold admin-text-secondary mb-1.5">Quote / Testimoni (English) <span class="text-red-500">*</span></label>
                    <textarea class="w-full px-3.5 py-2.5 rounded-lg admin-input font-[inherit] text-sm outline-none transition-colors duration-200 focus:border-blue-500 resize-y min-h-[100px]" id="quote" name="quote" required placeholder="Testimonial content...">{{ old('quote', $testimonial->quote) }}</textarea>
                    @error('quote') <div class="text-xs text-red-400 mt-1">{{ $message }}</div> @enderror
                </div>
            </div>

            <div id="fields-id" class="hidden">
                <div class="mb-5">
                    <label for="role_id" class="block text-[13px] font-semibold admin-text-secondary mb-1.5">Role / Jabatan (Indonesia) <span class="text-xs font-normal admin-text-muted">(opsional)</span></label>
                    <input type="text" class="w-full px-3.5 py-2.5 rounded-lg admin-input font-[inherit] text-sm outline-none transition-colors duration-200 focus:border-blue-500" id="role_id" name="role_id" value="{{ old('role_id', $testimonial->role_id) }}" placeholder="CEO, Manager, dsb...">
                    @error('role_id') <div class="text-xs text-red-400 mt-1">{{ $message }}</div> @enderror
                </div>
                <div class="mb-5">
                    <label for="quote_id" class="block text-[13px] font-semibold admin-text-secondary mb-1.5">Quote / Testimoni (Indonesia) <span class="text-xs font-normal admin-text-muted">(opsional)</span></label>
                    <textarea class="w-full px-3.5 py-2.5 rounded-lg admin-input font-[inherit] text-sm outline-none transition-colors duration-200 focus:border-blue-500 resize-y min-h-[100px]" id="quote_id" name="quote_id" placeholder="Isi testimoni...">{{ old('quote_id', $testimonial->quote_id) }}</textarea>
                    @error('quote_id') <div class="text-xs text-red-400 mt-1">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="mb-5">
                <label for="rating" class="block text-[13px] font-semibold admin-text-secondary mb-1.5">Rating <span class="text-red-500">*</span></label>
                <select class="w-full px-3.5 py-2.5 rounded-lg admin-input font-[inherit] text-sm outline-none transition-colors duration-200 focus:border-blue-500 cursor-pointer max-w-[120px]" id="rating" name="rating" required>
                    @for($i = 5; $i >= 1; $i--)
                    <option value="{{ $i }}" {{ old('rating', $testimonial->rating) == $i ? 'selected' : '' }}>{{ $i }} &#9733;</option>
                    @endfor
                </select>
                @error('rating') <div class="text-xs text-red-400 mt-1">{{ $message }}</div> @enderror
            </div>

            <div class="flex gap-2.5 pt-2">
                <button type="submit" class="inline-flex items-center gap-1.5 px-4 py-2 rounded-lg font-semibold text-sm bg-blue-500 text-white no-underline border-none cursor-pointer transition-all duration-150 hover:bg-blue-600">
                    <span class="material-symbols-outlined">save</span>
                    Update
                </button>
                <a href="{{ route('manager.testimonials.index') }}" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg font-semibold text-[13px] admin-btn-secondary no-underline border-none cursor-pointer transition-all duration-150">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
var _tabPrimary = getComputedStyle(document.documentElement).getPropertyValue('--admin-primary').trim() || '#2563eb';
var _tabTextSec = getComputedStyle(document.documentElement).getPropertyValue('--admin-text-secondary').trim() || '#7a9ab8';
function switchLangTab(lang) {
    var isEn = lang === 'en';
    document.getElementById('fields-en').classList.toggle('hidden', !isEn);
    document.getElementById('fields-id').classList.toggle('hidden', isEn);
    document.getElementById('tab-en').style.background = isEn ? _tabPrimary : 'transparent';
    document.getElementById('tab-en').style.color = isEn ? '#fff' : _tabTextSec;
    document.getElementById('tab-en').style.fontWeight = isEn ? '700' : '600';
    document.getElementById('tab-id').style.background = !isEn ? _tabPrimary : 'transparent';
    document.getElementById('tab-id').style.color = !isEn ? '#fff' : _tabTextSec;
    document.getElementById('tab-id').style.fontWeight = !isEn ? '700' : '600';
}
</script>
@endsection
