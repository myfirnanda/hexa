@extends('layouts.admin')
@section('title', 'Projects')
@section('topbar-title', 'Projects')

@section('content')
<div class="flex items-center justify-between flex-wrap gap-4 mb-7 max-md:flex-col max-md:items-start">
    <div>
        <h1 class="text-2xl font-bold">Projects</h1>
        <p class="text-sm admin-text-muted mt-1">Kelola portfolio project yang ditampilkan di website</p>
    </div>
    <a href="{{ route('admin.projects.create') }}" class="inline-flex items-center gap-1.5 px-4 py-2 rounded-lg font-semibold text-sm bg-blue-500 text-white no-underline border-none cursor-pointer transition-all duration-150 hover:bg-blue-600">
        <span class="material-symbols-outlined">add</span>
        Tambah Project
    </a>
</div>

<div class="admin-card border rounded-xl overflow-hidden">
    <div class="px-5 py-4 border-b admin-border flex items-center justify-between gap-3">
        <h2 class="text-[15px] font-semibold">Semua Projects ({{ $projects->total() }})</h2>
    </div>
    @if($projects->count())
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr>
                    <th class="text-left px-4 py-2.5 text-xs font-semibold admin-text-muted uppercase tracking-wide border-b admin-border whitespace-nowrap">#</th>
                    <th class="text-left px-4 py-2.5 text-xs font-semibold admin-text-muted uppercase tracking-wide border-b admin-border whitespace-nowrap">Image</th>
                    <th class="text-left px-4 py-2.5 text-xs font-semibold admin-text-muted uppercase tracking-wide border-b admin-border whitespace-nowrap">Nama</th>
                    <th class="text-left px-4 py-2.5 text-xs font-semibold admin-text-muted uppercase tracking-wide border-b admin-border whitespace-nowrap">Kategori</th>
                    <th class="text-left px-4 py-2.5 text-xs font-semibold admin-text-muted uppercase tracking-wide border-b admin-border whitespace-nowrap">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($projects as $project)
                <tr class="admin-table-hover">
                    <td class="px-4 py-3 text-sm border-b admin-border-light align-middle">{{ $project->id }}</td>
                    <td class="px-4 py-3 text-sm border-b admin-border-light align-middle">
                        @if($project->image)
                        <img src="{{ asset('assets/img/projects/' . $project->image) }}" class="size-10 rounded-lg object-cover admin-deep-bg border" alt="{{ $project->name }}">
                        @else
                        <div class="size-10 rounded-lg flex items-center justify-center admin-text-muted admin-deep-bg border">
                            <span class="material-symbols-outlined text-[18px]">image</span>
                        </div>
                        @endif
                    </td>
                    <td class="px-4 py-3 text-sm border-b admin-border-light align-middle font-semibold">{{ $project->name }}</td>
                    <td class="px-4 py-3 text-sm border-b admin-border-light align-middle"><span class="inline-block px-2.5 py-1 rounded-md text-xs font-semibold capitalize bg-blue-500/12 text-blue-400">{{ ucwords(str_replace('-', ' ', $project->category)) }}</span></td>
                    <td class="px-4 py-3 text-sm border-b admin-border-light align-middle">
                        <div class="flex items-center gap-1.5">
                            <a href="{{ route('admin.projects.edit', $project) }}" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg font-semibold text-[13px] admin-btn-secondary no-underline border-none cursor-pointer transition-all duration-150" title="Edit">
                                <span class="material-symbols-outlined">edit</span>
                            </a>
                            <button class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg font-semibold text-[13px] bg-red-500/12 text-red-400 border border-red-500/20 cursor-pointer transition-all duration-150 hover:bg-red-500/20" onclick="confirmDelete('{{ route('admin.projects.destroy', $project) }}')" title="Hapus">
                                <span class="material-symbols-outlined">delete</span>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="px-5 py-4">{{ $projects->links() }}</div>
    @else
    <div class="text-center py-12 px-5 admin-text-muted">
        <span class="material-symbols-outlined block text-5xl mb-3 opacity-50">work</span>
        <p>Belum ada project. Klik tombol "Tambah Project" untuk menambahkan.</p>
    </div>
    @endif
</div>
@endsection
