@extends('layouts.admin')
@section('title', 'Edit Testimonial')
@section('topbar-title', 'Edit Testimonial')

@section('content')
<div class="mb-5">
    <a href="{{ route('admin.testimonials.index') }}" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg font-semibold text-[13px] admin-btn-secondary no-underline border-none cursor-pointer transition-all duration-150">
        <span class="material-symbols-outlined">arrow_back</span>
        Kembali
    </a>
</div>

<div class="flex items-center justify-between flex-wrap gap-4 mb-7 max-md:flex-col max-md:items-start">
    <h1 class="text-2xl font-bold">Edit Testimonial</h1>
</div>

<div class="admin-card border rounded-xl overflow-hidden">
    <div class="p-5">
        <form method="POST" action="{{ route('admin.testimonials.update', $testimonial) }}">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-2 gap-4 max-md:grid-cols-1">
                <div class="mb-5">
                    <label for="name" class="block text-[13px] font-semibold admin-text-secondary mb-1.5">Nama *</label>
                    <input type="text" class="w-full px-3.5 py-2.5 rounded-lg admin-input font-[inherit] text-sm outline-none transition-colors duration-200 focus:border-blue-500" id="name" name="name" value="{{ old('name', $testimonial->name) }}" required placeholder="Nama orang...">
                    @error('name') <div class="text-xs text-red-400 mt-1">{{ $message }}</div> @enderror
                </div>
                <div class="mb-5">
                    <label for="role" class="block text-[13px] font-semibold admin-text-secondary mb-1.5">Role / Jabatan *</label>
                    <input type="text" class="w-full px-3.5 py-2.5 rounded-lg admin-input font-[inherit] text-sm outline-none transition-colors duration-200 focus:border-blue-500" id="role" name="role" value="{{ old('role', $testimonial->role) }}" required placeholder="CEO, Manager, dsb...">
                    @error('role') <div class="text-xs text-red-400 mt-1">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="mb-5">
                <label for="quote" class="block text-[13px] font-semibold admin-text-secondary mb-1.5">Quote / Testimoni *</label>
                <textarea class="w-full px-3.5 py-2.5 rounded-lg admin-input font-[inherit] text-sm outline-none transition-colors duration-200 focus:border-blue-500 resize-y min-h-[100px]" id="quote" name="quote" required placeholder="Isi testimoni...">{{ old('quote', $testimonial->quote) }}</textarea>
                @error('quote') <div class="text-xs text-red-400 mt-1">{{ $message }}</div> @enderror
            </div>

            <div class="mb-5">
                <label for="rating" class="block text-[13px] font-semibold admin-text-secondary mb-1.5">Rating *</label>
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
                <a href="{{ route('admin.testimonials.index') }}" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg font-semibold text-[13px] admin-btn-secondary no-underline border-none cursor-pointer transition-all duration-150">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
