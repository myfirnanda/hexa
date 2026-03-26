@extends('layouts.admin')
@section('title', 'Testimonials')
@section('topbar-title', 'Testimonials')

@section('content')
<div class="flex items-center justify-between flex-wrap gap-4 mb-7 max-md:flex-col max-md:items-start">
    <div>
        <h1 class="text-2xl font-bold">Testimonials</h1>
        <p class="text-sm admin-text-muted mt-1">Kelola testimoni klien yang ditampilkan di website</p>
    </div>
    <a href="{{ route('admin.testimonials.create') }}" class="inline-flex items-center gap-1.5 px-4 py-2 rounded-lg font-semibold text-sm bg-blue-500 text-white no-underline border-none cursor-pointer transition-all duration-150 hover:bg-blue-600">
        <span class="material-symbols-outlined">add</span>
        Tambah Testimonial
    </a>
</div>

<div class="admin-card border rounded-xl overflow-hidden">
    <div class="px-5 py-4 border-b admin-border flex items-center justify-between gap-3">
        <h2 class="text-[15px] font-semibold">Semua Testimonials ({{ $testimonials->total() }})</h2>
    </div>
    @if($testimonials->count())
    <div class="overflow-x-auto">
        <table class="w-full border-collapse">
            <thead>
                <tr>
                    <th class="text-left px-4 py-2.5 text-xs font-semibold admin-text-muted uppercase tracking-wide border-b admin-border whitespace-nowrap">#</th>
                    <th class="text-left px-4 py-2.5 text-xs font-semibold admin-text-muted uppercase tracking-wide border-b admin-border whitespace-nowrap">Nama</th>
                    <th class="text-left px-4 py-2.5 text-xs font-semibold admin-text-muted uppercase tracking-wide border-b admin-border whitespace-nowrap">Role</th>
                    <th class="text-left px-4 py-2.5 text-xs font-semibold admin-text-muted uppercase tracking-wide border-b admin-border whitespace-nowrap">Rating</th>
                    <th class="text-left px-4 py-2.5 text-xs font-semibold admin-text-muted uppercase tracking-wide border-b admin-border whitespace-nowrap">Quote</th>
                    <th class="text-left px-4 py-2.5 text-xs font-semibold admin-text-muted uppercase tracking-wide border-b admin-border whitespace-nowrap">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($testimonials as $testimonial)
                <tr class="admin-table-hover">
                    <td class="px-4 py-3 text-sm border-b admin-border-light align-middle">{{ $testimonial->id }}</td>
                    <td class="px-4 py-3 text-sm border-b admin-border-light align-middle font-semibold">{{ $testimonial->name }}</td>
                    <td class="px-4 py-3 text-sm border-b admin-border-light align-middle admin-text-secondary">{{ $testimonial->role }}</td>
                    <td class="px-4 py-3 text-sm border-b admin-border-light align-middle"><span class="text-yellow-400 text-sm tracking-wider">@for($i=0;$i<$testimonial->rating;$i++)&#9733;@endfor</span></td>
                    <td class="px-4 py-3 text-sm border-b admin-border-light align-middle admin-text-secondary max-w-[300px] overflow-hidden text-ellipsis whitespace-nowrap">{{ $testimonial->quote }}</td>
                    <td class="px-4 py-3 text-sm border-b admin-border-light align-middle">
                        <div class="flex items-center gap-1.5">
                            <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg font-semibold text-[13px] admin-btn-secondary no-underline border-none cursor-pointer transition-all duration-150" title="Edit">
                                <span class="material-symbols-outlined">edit</span>
                            </a>
                            <button class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg font-semibold text-[13px] bg-red-500/12 text-red-400 border border-red-500/20 cursor-pointer transition-all duration-150 hover:bg-red-500/20" onclick="confirmDelete('{{ route('admin.testimonials.destroy', $testimonial) }}')" title="Hapus">
                                <span class="material-symbols-outlined">delete</span>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="px-5 py-4">{{ $testimonials->links() }}</div>
    @else
    <div class="text-center py-12 px-5 admin-text-muted">
        <span class="material-symbols-outlined text-5xl mb-3 opacity-50">rate_review</span>
        <p>Belum ada testimonial. Klik tombol "Tambah Testimonial" untuk menambahkan.</p>
    </div>
    @endif
</div>
@endsection
