@extends('layouts.admin')
@section('title', 'Clients')
@section('topbar-title', 'Clients')

@section('content')
<div class="flex items-center justify-between flex-wrap gap-4 mb-7 max-md:flex-col max-md:items-start">
    <div>
        <h1 class="text-2xl font-bold">Clients</h1>
        <p class="text-sm admin-text-muted mt-1">Kelola daftar klien yang ditampilkan di website</p>
    </div>
    <a href="{{ route('admin.clients.create') }}" class="inline-flex items-center gap-1.5 px-4 py-2 rounded-lg font-semibold text-sm bg-blue-500 text-white no-underline border-none cursor-pointer transition-all duration-150 hover:bg-blue-600">
        <span class="material-symbols-outlined">add</span>
        Tambah Client
    </a>
</div>

<div class="admin-card border rounded-xl overflow-hidden">
    <div class="px-5 py-4 border-b admin-border flex items-center justify-between gap-3">
        <h2 class="text-[15px] font-semibold">Semua Clients ({{ $clients->total() }})</h2>
    </div>
    @if($clients->count())
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr>
                    <th class="text-left px-4 py-2.5 text-xs font-semibold admin-text-muted uppercase tracking-wide border-b admin-border whitespace-nowrap">#</th>
                    <th class="text-left px-4 py-2.5 text-xs font-semibold admin-text-muted uppercase tracking-wide border-b admin-border whitespace-nowrap">Logo</th>
                    <th class="text-left px-4 py-2.5 text-xs font-semibold admin-text-muted uppercase tracking-wide border-b admin-border whitespace-nowrap">Nama</th>
                    <th class="text-left px-4 py-2.5 text-xs font-semibold admin-text-muted uppercase tracking-wide border-b admin-border whitespace-nowrap">Kategori</th>
                    <th class="text-left px-4 py-2.5 text-xs font-semibold admin-text-muted uppercase tracking-wide border-b admin-border whitespace-nowrap">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clients as $client)
                <tr class="admin-table-hover">
                    <td class="px-4 py-3 text-sm border-b admin-border-light align-middle">{{ $client->id }}</td>
                    <td class="px-4 py-3 text-sm border-b admin-border-light align-middle">
                        @if($client->logo)
                        <img src="{{ asset('assets/img/' . $client->logo) }}" class="size-10 rounded-lg object-contain bg-white p-1 border admin-border" alt="{{ $client->name }}">
                        @else
                        <div class="size-10 rounded-lg flex items-center justify-center admin-text-muted admin-deep-bg border">
                            <span class="material-symbols-outlined text-lg">apartment</span>
                        </div>
                        @endif
                    </td>
                    <td class="px-4 py-3 text-sm border-b admin-border-light align-middle font-semibold">{{ $client->name }}</td>
                    <td class="px-4 py-3 text-sm border-b admin-border-light align-middle"><span class="inline-block px-2.5 py-1 rounded-md text-xs font-semibold capitalize bg-blue-500/12 text-blue-400">{{ ucfirst($client->category) }}</span></td>
                    <td class="px-4 py-3 text-sm border-b admin-border-light align-middle">
                        <div class="flex items-center gap-1.5">
                            <a href="{{ route('admin.clients.edit', $client) }}" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg font-semibold text-[13px] admin-btn-secondary no-underline border-none cursor-pointer transition-all duration-150" title="Edit">
                                <span class="material-symbols-outlined">edit</span>
                            </a>
                            <button class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg font-semibold text-[13px] bg-red-500/12 text-red-400 border border-red-500/20 cursor-pointer transition-all duration-150 hover:bg-red-500/20" onclick="confirmDelete('{{ route('admin.clients.destroy', $client) }}')" title="Hapus">
                                <span class="material-symbols-outlined">delete</span>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="px-5 py-4">{{ $clients->links() }}</div>
    @else
    <div class="text-center py-12 px-5 admin-text-muted">
        <span class="material-symbols-outlined text-5xl mb-3 opacity-50">apartment</span>
        <p>Belum ada client. Klik tombol "Tambah Client" untuk menambahkan.</p>
    </div>
    @endif
</div>
@endsection
