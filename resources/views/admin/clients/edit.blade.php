@extends('layouts.admin')
@section('title', 'Edit Client')
@section('topbar-title', 'Edit Client')

@section('content')
<div class="mb-5">
    <a href="{{ route('admin.clients.index') }}" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg font-semibold text-[13px] admin-btn-secondary no-underline border-none cursor-pointer transition-all duration-150">
        <span class="material-symbols-outlined">arrow_back</span>
        Kembali
    </a>
</div>

<div class="flex items-center justify-between flex-wrap gap-4 mb-7 max-md:flex-col max-md:items-start">
    <h1 class="text-2xl font-bold">Edit Client</h1>
</div>

<div class="admin-card border rounded-xl overflow-hidden">
    <div class="p-5">
        <form method="POST" action="{{ route('admin.clients.update', $client) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-2 gap-4 max-md:grid-cols-1">
                <div class="mb-5">
                    <label for="name" class="block text-[13px] font-semibold admin-text-secondary mb-1.5">Nama Client *</label>
                    <input type="text" class="w-full px-3.5 py-2.5 rounded-lg admin-input font-[inherit] text-sm outline-none transition-colors duration-200 focus:border-blue-500" id="name" name="name" value="{{ old('name', $client->name) }}" required placeholder="Nama perusahaan client...">
                    @error('name') <div class="text-xs text-red-400 mt-1">{{ $message }}</div> @enderror
                </div>
                <div class="mb-5">
                    <label for="category" class="block text-[13px] font-semibold admin-text-secondary mb-1.5">Kategori *</label>
                    <select class="w-full px-3.5 py-2.5 rounded-lg admin-input font-[inherit] text-sm outline-none transition-colors duration-200 focus:border-blue-500 cursor-pointer" id="category" name="category" required>
                        <option value="">Pilih kategori...</option>
                        @foreach(['education' => 'Education', 'government' => 'Government', 'soe' => 'SOE', 'finance' => 'Finance', 'industrial' => 'Industrial', 'retail' => 'Retail'] as $val => $label)
                        <option value="{{ $val }}" {{ old('category', $client->category) === $val ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                    @error('category') <div class="text-xs text-red-400 mt-1">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="mb-5">
                <label for="logo" class="block text-[13px] font-semibold admin-text-secondary mb-1.5">Logo</label>
                <input type="file" class="w-full px-3.5 py-2.5 rounded-lg admin-input font-[inherit] text-sm outline-none transition-colors duration-200 focus:border-blue-500" id="logo" name="logo" accept="image/*">
                @if($client->logo)
                <div class="text-xs admin-text-muted mt-2 flex items-center gap-2">
                    Logo saat ini: <img src="{{ asset('assets/img/' . $client->logo) }}" class="h-7 rounded bg-white p-0.5" alt="">
                </div>
                @endif
                @error('logo') <div class="text-xs text-red-400 mt-1">{{ $message }}</div> @enderror
            </div>

            <div class="flex gap-2.5 pt-2">
                <button type="submit" class="inline-flex items-center gap-1.5 px-4 py-2 rounded-lg font-semibold text-sm bg-blue-500 text-white no-underline border-none cursor-pointer transition-all duration-150 hover:bg-blue-600">
                    <span class="material-symbols-outlined">save</span>
                    Update
                </button>
                <a href="{{ route('admin.clients.index') }}" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg font-semibold text-[13px] admin-btn-secondary no-underline border-none cursor-pointer transition-all duration-150">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
