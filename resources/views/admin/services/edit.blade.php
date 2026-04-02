@extends('layouts.admin')
@section('title', 'Edit Layanan')
@section('topbar-title', 'Edit Layanan')

@section('content')
<div class="mb-5">
    <a href="{{ route('admin.services.index') }}" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg font-semibold text-[13px] admin-btn-secondary no-underline border cursor-pointer transition-all duration-150">
        <span class="material-symbols-outlined">arrow_back</span>
        Kembali
    </a>
</div>

<div class="flex items-center justify-between flex-wrap gap-4 mb-7 max-md:flex-col max-md:items-start">
    <h1 class="text-2xl font-bold admin-text">Edit Layanan</h1>
</div>

<div class="admin-card border rounded-xl overflow-hidden">
    <div class="p-5">
        <form method="POST" action="{{ route('admin.services.update', $service) }}">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-2 gap-4 max-md:grid-cols-1">
                <div class="mb-5">
                    <label for="name" class="block text-[13px] font-semibold admin-text-secondary mb-1.5">Nama Layanan <span class="text-red-500">*</span></label>
                    <input type="text" class="w-full px-3.5 py-2.5 rounded-lg border admin-input font-[inherit] text-sm outline-none transition-colors duration-200 focus:border-blue-500" id="name" name="name" value="{{ old('name', $service->name) }}" required placeholder="Nama layanan...">
                    @error('name') <div class="text-xs text-red-400 mt-1">{{ $message }}</div> @enderror
                </div>
                <div class="mb-5">
                    <label for="type" class="block text-[13px] font-semibold admin-text-secondary mb-1.5">Tipe <span class="text-red-500">*</span></label>
                    <select class="w-full px-3.5 py-2.5 rounded-lg border admin-input font-[inherit] text-sm outline-none transition-colors duration-200 focus:border-blue-500 cursor-pointer" id="type" name="type" required>
                        <option value="main" {{ old('type', $service->type) === 'main' ? 'selected' : '' }}>Main</option>
                        <option value="additional" {{ old('type', $service->type) === 'additional' ? 'selected' : '' }}>Additional</option>
                    </select>
                    @error('type') <div class="text-xs text-red-400 mt-1">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="mb-5">
                <label for="description" class="block text-[13px] font-semibold admin-text-secondary mb-1.5">Deskripsi <span class="text-red-500">*</span></label>
                <textarea class="w-full px-3.5 py-2.5 rounded-lg border admin-input font-[inherit] text-sm outline-none transition-colors duration-200 focus:border-blue-500 resize-y min-h-[100px]" id="description" name="description" required placeholder="Deskripsi layanan...">{{ old('description', $service->description) }}</textarea>
                @error('description') <div class="text-xs text-red-400 mt-1">{{ $message }}</div> @enderror
            </div>

            <div class="mb-5">
                <label for="icon" class="block text-[13px] font-semibold admin-text-secondary mb-1.5">Icon</label>
                <input type="text" class="w-full px-3.5 py-2.5 rounded-lg border admin-input font-[inherit] text-sm outline-none transition-colors duration-200 focus:border-blue-500" id="icon" name="icon" value="{{ old('icon', $service->icon) }}" placeholder="Nama material icon (mis: code)">
                <div class="text-xs admin-text-muted mt-1">Material Symbols Outlined icon name</div>
                @error('icon') <div class="text-xs text-red-400 mt-1">{{ $message }}</div> @enderror
            </div>

            <div class="flex gap-2.5 pt-2">
                <button type="submit" class="inline-flex items-center gap-1.5 px-4 py-2 rounded-lg font-semibold text-sm bg-blue-500 text-white no-underline border-none cursor-pointer transition-all duration-150 hover:bg-blue-600">
                    <span class="material-symbols-outlined">save</span>
                    Update
                </button>
                <a href="{{ route('admin.services.index') }}" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg font-semibold text-[13px] admin-btn-secondary no-underline border cursor-pointer transition-all duration-150">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
