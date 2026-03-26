@extends('layouts.admin')
@section('title', 'Produk / Layanan')
@section('topbar-title', 'Produk / Layanan')

@section('content')
<div class="flex items-center justify-between flex-wrap gap-4 mb-7 max-md:flex-col max-md:items-start">
    <div>
        <h1 class="text-2xl font-bold admin-text">Produk / Layanan</h1>
        <p class="text-sm admin-text-muted mt-1">Kelola produk dan layanan yang ditampilkan di website</p>
    </div>
    <a href="{{ route('admin.services.create') }}" class="inline-flex items-center gap-1.5 px-4 py-2 rounded-lg font-semibold text-sm bg-blue-500 text-white no-underline border-none cursor-pointer transition-all duration-150 hover:bg-blue-600">
        <span class="material-symbols-outlined">add</span>
        Tambah Layanan
    </a>
</div>

<div class="admin-card border rounded-xl overflow-hidden">
    <div class="px-5 py-4 border-b admin-border flex items-center justify-between gap-3">
        <h2 class="text-[15px] font-semibold admin-text">Semua Layanan ({{ $services->total() }})</h2>
    </div>
    @if($services->count())
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr>
                    <th class="text-left px-4 py-2.5 text-xs font-semibold admin-text-muted uppercase tracking-wide border-b admin-border whitespace-nowrap">#</th>
                    <th class="text-left px-4 py-2.5 text-xs font-semibold admin-text-muted uppercase tracking-wide border-b admin-border whitespace-nowrap">Nama</th>
                    <th class="text-left px-4 py-2.5 text-xs font-semibold admin-text-muted uppercase tracking-wide border-b admin-border whitespace-nowrap">Deskripsi</th>
                    <th class="text-left px-4 py-2.5 text-xs font-semibold admin-text-muted uppercase tracking-wide border-b admin-border whitespace-nowrap">Tipe</th>
                    <th class="text-left px-4 py-2.5 text-xs font-semibold admin-text-muted uppercase tracking-wide border-b admin-border whitespace-nowrap">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($services as $service)
                <tr class="admin-table-hover">
                    <td class="px-4 py-3 text-sm border-b admin-border-light align-middle admin-text">{{ $service->id }}</td>
                    <td class="px-4 py-3 text-sm border-b admin-border-light align-middle font-semibold admin-text">{{ $service->name }}</td>
                    <td class="px-4 py-3 text-sm border-b admin-border-light align-middle admin-text-secondary text-[13px] max-w-[320px]">{{ Str::limit($service->description, 80) }}</td>
                    <td class="px-4 py-3 text-sm border-b admin-border-light align-middle">
                        <span class="{{ $service->type === 'main' ? 'inline-block px-2.5 py-1 rounded-md text-xs font-semibold capitalize bg-blue-500/12 text-blue-400' : 'inline-block px-2.5 py-1 rounded-md text-xs font-semibold capitalize bg-indigo-400/12 text-indigo-400' }}">{{ $service->type }}</span>
                    </td>
                    <td class="px-4 py-3 text-sm border-b admin-border-light align-middle">
                        <div class="flex items-center gap-1.5">
                            <a href="{{ route('admin.services.edit', $service) }}" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg font-semibold text-[13px] admin-btn-secondary no-underline border cursor-pointer transition-all duration-150" title="Edit">
                                <span class="material-symbols-outlined">edit</span>
                            </a>
                            <button class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg font-semibold text-[13px] bg-red-500/12 text-red-400 border border-red-500/20 cursor-pointer transition-all duration-150 hover:bg-red-500/20" onclick="confirmDelete('{{ route('admin.services.destroy', $service) }}')" title="Hapus">
                                <span class="material-symbols-outlined">delete</span>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="px-5 py-4">{{ $services->links() }}</div>
    @else
    <div class="text-center py-12 px-5 admin-text-muted">
        <span class="material-symbols-outlined text-5xl mb-3 opacity-50">category</span>
        <p>Belum ada layanan. Klik tombol "Tambah Layanan" untuk menambahkan.</p>
    </div>
    @endif
</div>
@endsection
