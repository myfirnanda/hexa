@extends('layouts.admin')
@section('title', isset($project) ? 'Edit Project' : 'Tambah Project')
@section('topbar-title', isset($project) ? 'Edit Project' : 'Tambah Project')

@section('content')
<div class="mb-5">
    <a href="{{ route('admin.projects.index') }}" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg font-semibold text-[13px] admin-btn-secondary no-underline border-none cursor-pointer transition-all duration-150">
        <span class="material-symbols-outlined">arrow_back</span>
        Kembali
    </a>
</div>

<div class="flex items-center justify-between flex-wrap gap-4 mb-7 max-md:flex-col max-md:items-start">
    <h1 class="text-2xl font-bold">{{ isset($project) ? 'Edit Project' : 'Tambah Project Baru' }}</h1>
</div>

<div class="admin-card border rounded-xl overflow-hidden">
    <div class="p-5">
        <form method="POST" action="{{ isset($project) ? route('admin.projects.update', $project) : route('admin.projects.store') }}" enctype="multipart/form-data">
            @csrf
            @if(isset($project)) @method('PUT') @endif

            <div class="grid grid-cols-2 gap-4 max-md:grid-cols-1">
                <div class="mb-5">
                    <label for="name" class="block text-[13px] font-semibold admin-text-secondary mb-1.5">Nama Project *</label>
                    <input type="text" class="w-full px-3.5 py-2.5 rounded-lg admin-input font-[inherit] text-sm outline-none transition-colors duration-200 focus:border-blue-500" id="name" name="name" value="{{ old('name', $project->name ?? '') }}" required placeholder="Nama project...">
                    @error('name') <div class="text-xs text-red-400 mt-1">{{ $message }}</div> @enderror
                </div>
                <div class="mb-5">
                    <label for="category" class="block text-[13px] font-semibold admin-text-secondary mb-1.5">Kategori *</label>
                    <select class="w-full px-3.5 py-2.5 rounded-lg admin-input font-[inherit] text-sm outline-none transition-colors duration-200 focus:border-blue-500 cursor-pointer" id="category" name="category" required>
                        <option value="">Pilih kategori...</option>
                        @foreach(['software-development' => 'Software Development', 'digital-branding' => 'Digital Branding', 'startup-incubator' => 'Startup Incubator', 'it-consultant' => 'IT Consultant'] as $val => $label)
                        <option value="{{ $val }}" {{ old('category', $project->category ?? '') === $val ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                    @error('category') <div class="text-xs text-red-400 mt-1">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="mb-5">
                <label for="image" class="block text-[13px] font-semibold admin-text-secondary mb-1.5">Gambar</label>
                <input type="file" class="w-full px-3.5 py-2.5 rounded-lg admin-input font-[inherit] text-sm outline-none transition-colors duration-200 focus:border-blue-500" id="image" name="image" accept="image/*">
                @if(isset($project) && $project->image)
                <div class="text-xs admin-text-muted mt-2 flex items-center gap-2">
                    Saat ini: <img src="{{ asset('assets/img/' . $project->image) }}" class="h-9 rounded" alt="">
                    <span>{{ $project->image }}</span>
                </div>
                @endif
                @error('image') <div class="text-xs text-red-400 mt-1">{{ $message }}</div> @enderror
            </div>

            <div class="mb-5">
                <label for="description" class="block text-[13px] font-semibold admin-text-secondary mb-1.5">Deskripsi *</label>
                <textarea class="w-full px-3.5 py-2.5 rounded-lg admin-input font-[inherit] text-sm outline-none transition-colors duration-200 focus:border-blue-500 resize-y min-h-[100px]" id="description" name="description" required placeholder="Deskripsi singkat project...">{{ old('description', $project->description ?? '') }}</textarea>
                @error('description') <div class="text-xs text-red-400 mt-1">{{ $message }}</div> @enderror
            </div>

            <div class="mb-5">
                <label for="hero_description" class="block text-[13px] font-semibold admin-text-secondary mb-1.5">Hero Description</label>
                <textarea class="w-full px-3.5 py-2.5 rounded-lg admin-input font-[inherit] text-sm outline-none transition-colors duration-200 focus:border-blue-500 resize-y min-h-[100px]" id="hero_description" name="hero_description" placeholder="Deskripsi untuk hero section...">{{ old('hero_description', $project->hero_description ?? '') }}</textarea>
                @error('hero_description') <div class="text-xs text-red-400 mt-1">{{ $message }}</div> @enderror
            </div>

            <div class="mb-5">
                <label for="summary_title" class="block text-[13px] font-semibold admin-text-secondary mb-1.5">Summary Title</label>
                <input type="text" class="w-full px-3.5 py-2.5 rounded-lg admin-input font-[inherit] text-sm outline-none transition-colors duration-200 focus:border-blue-500" id="summary_title" name="summary_title" value="{{ old('summary_title', $project->summary_title ?? '') }}" placeholder="Judul ringkasan...">
                @error('summary_title') <div class="text-xs text-red-400 mt-1">{{ $message }}</div> @enderror
            </div>

            <div class="mb-5">
                <label for="content" class="block text-[13px] font-semibold admin-text-secondary mb-1.5">Konten Detail</label>
                <textarea class="w-full px-3.5 py-2.5 rounded-lg admin-input font-[inherit] text-sm outline-none transition-colors duration-200 focus:border-blue-500 resize-y min-h-[180px]" id="content" name="content" placeholder="Konten detail project (HTML diperbolehkan)...">{{ old('content', $project->content ?? '') }}</textarea>
                @error('content') <div class="text-xs text-red-400 mt-1">{{ $message }}</div> @enderror
            </div>

            <div class="flex gap-2.5 pt-2">
                <button type="submit" class="inline-flex items-center gap-1.5 px-4 py-2 rounded-lg font-semibold text-sm bg-blue-500 text-white no-underline border-none cursor-pointer transition-all duration-150 hover:bg-blue-600">
                    <span class="material-symbols-outlined">save</span>
                    {{ isset($project) ? 'Update' : 'Simpan' }}
                </button>
                <a href="{{ route('admin.projects.index') }}" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg font-semibold text-[13px] admin-btn-secondary no-underline border-none cursor-pointer transition-all duration-150">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
