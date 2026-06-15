@extends('layouts.admin')
@section('title', 'Kategori Produk')
@section('topbar-title', 'Kategori Produk')

@section('content')

<div class="flex items-center justify-between flex-wrap gap-4 mb-7 max-md:flex-col max-md:items-start">
    <div>
        <h1 class="text-xl font-bold admin-text">Kategori Produk</h1>
        <p class="text-sm admin-text-muted mt-1">Kelola kategori produk dengan warna badge</p>
    </div>
    <a href="{{ route('manager.product-categories.create') }}" class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-lg font-semibold text-sm text-white no-underline border-none cursor-pointer transition-all duration-150 hover:opacity-90" style="background: var(--admin-primary);">
        <span class="material-symbols-outlined text-[18px]">add</span>
        Tambah Kategori
    </a>
</div>

<div class="admin-card border rounded-xl overflow-hidden">

    <div class="px-6 py-4 border-b admin-border flex items-center justify-between gap-3 flex-wrap">
        <div>
            <span class="text-[14px] font-bold admin-text">Semua Kategori</span>
            <span class="text-[13px] admin-text-muted ml-2">({{ $categories->total() }})</span>
        </div>
        <form method="GET" action="{{ route('manager.product-categories.index') }}" class="flex items-center gap-2">
            <div class="relative">
                <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-[18px] admin-text-muted pointer-events-none select-none">search</span>
                <input type="text" name="search" value="{{ $search }}" placeholder="Cari nama kategori..."
                    class="admin-input admin-search-input rounded-lg pl-9 pr-3 py-2 text-sm outline-none w-55 focus:w-70"
                    autocomplete="off">
            </div>
            @if($search)
            <a href="{{ route('manager.product-categories.index') }}" class="text-[12px] font-medium admin-text-muted hover:admin-text transition-colors no-underline px-2 py-2 rounded-lg admin-surface-hover" title="Hapus filter">
                <span class="material-symbols-outlined text-[18px]">close</span>
            </a>
            @endif
        </form>
    </div>

    @if($categories->count())
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr style="background: var(--admin-surface-hover);">
                    <th class="text-left px-4 py-3 text-[11px] font-bold admin-text-muted uppercase tracking-wider border-b admin-border whitespace-nowrap w-10">No</th>
                    <th class="text-left px-4 py-3 text-[11px] font-bold admin-text-muted uppercase tracking-wider border-b admin-border whitespace-nowrap">Nama</th>
                    <th class="text-left px-4 py-3 text-[11px] font-bold admin-text-muted uppercase tracking-wider border-b admin-border whitespace-nowrap">Warna</th>
                    <th class="text-left px-4 py-3 text-[11px] font-bold admin-text-muted uppercase tracking-wider border-b admin-border whitespace-nowrap w-24">Aksi</th>
                </tr>
            </thead>
            <tbody class="admin-table-body">
                @foreach($categories as $index => $category)
                <tr class="admin-table-hover">
                    <td class="px-4 py-3.5 text-[13px] admin-text-muted align-middle">{{ $loop->iteration }}</td>
                    <td class="px-4 py-3.5 align-middle">
                        <div class="text-[13px] font-semibold admin-text">{{ $category->name }}</div>
                    </td>
                    <td class="px-4 py-3.5 align-middle">
                        <div class="flex items-center gap-2">
                            <div class="size-6 rounded border" style="background-color: {{ $category->color }};"></div>
                            <code class="text-[12px] admin-text-muted font-mono">{{ $category->color }}</code>
                        </div>
                    </td>
                    <td class="px-4 py-3.5 align-middle">
                        <div class="flex items-center gap-1.5">
                            <a href="{{ route('manager.product-categories.edit', $category) }}"
                               class="inline-flex items-center justify-center size-8 rounded-lg cursor-pointer transition-all duration-150 no-underline border"
                               style="background: rgba(37,99,235,0.08); color: #60a5fa; border-color: rgba(37,99,235,0.15);"
                               onmouseover="this.style.background='rgba(37,99,235,0.18)'"
                               onmouseout="this.style.background='rgba(37,99,235,0.08)'"
                               title="Edit kategori">
                                <span class="material-symbols-outlined text-[16px]">edit</span>
                            </a>
                            <button onclick="confirmDelete('{{ route('manager.product-categories.destroy', $category) }}')"
                                class="inline-flex items-center justify-center size-8 rounded-lg cursor-pointer transition-all duration-150 border"
                                style="background: rgba(239,68,68,0.08); color: #f87171; border-color: rgba(239,68,68,0.15);"
                                onmouseover="this.style.background='rgba(239,68,68,0.18)'"
                                onmouseout="this.style.background='rgba(239,68,68,0.08)'"
                                title="Hapus kategori">
                                <span class="material-symbols-outlined text-[16px]">delete</span>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="px-6 py-4 border-t admin-border">{{ $categories->links() }}</div>

    @elseif($search)
    <div class="flex flex-col items-center justify-center py-16 px-5">
        <span class="material-symbols-outlined text-5xl admin-text-muted mb-3 opacity-30">search_off</span>
        <p class="text-sm admin-text-secondary font-medium">Tidak ada hasil untuk <strong class="admin-text">"{{ $search }}"</strong></p>
        <a href="{{ route('manager.product-categories.index') }}" class="mt-3 text-[13px] no-underline" style="color: var(--admin-primary);">Hapus filter</a>
    </div>

    @else
    <div class="flex flex-col items-center justify-center py-16 px-5">
        <span class="material-symbols-outlined text-5xl admin-text-muted mb-3 opacity-30">category</span>
        <p class="text-sm admin-text-secondary mb-3">Belum ada kategori produk.</p>
        <a href="{{ route('manager.product-categories.create') }}" class="inline-flex items-center gap-1.5 px-4 py-2 rounded-lg font-semibold text-sm text-white no-underline" style="background: var(--admin-primary);">
            <span class="material-symbols-outlined text-[18px]">add</span> Tambah Kategori
        </a>
    </div>
    @endif
</div>
@endsection
