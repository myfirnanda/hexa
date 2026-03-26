@extends('layouts.admin')
@section('title', 'Order #' . $order->id)
@section('topbar-title', 'Detail Order')

@section('content')
<div class="mb-5">
    <a href="{{ route('admin.orders.index') }}" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg font-semibold text-[13px] admin-btn-secondary no-underline border-none cursor-pointer transition-all duration-150">
        <span class="material-symbols-outlined">arrow_back</span>
        Kembali
    </a>
</div>

<div class="flex items-center justify-between flex-wrap gap-4 mb-7 max-md:flex-col max-md:items-start">
    <div>
        <h1 class="text-2xl font-bold">Order #{{ $order->id }}</h1>
        <p class="text-sm admin-text-muted mt-1">Disubmit {{ $order->created_at->format('d F Y, H:i') }}</p>
    </div>
    @php
        $badgeClasses = match($order->status) {
            'pending' => 'bg-yellow-500/12 text-yellow-400',
            'in_progress' => 'bg-blue-500/12 text-blue-400',
            'completed' => 'bg-green-500/12 text-green-400',
            'rejected' => 'bg-red-500/12 text-red-400',
            default => 'bg-slate-500/12 text-slate-400',
        };
    @endphp
    <span class="inline-block px-4 py-1.5 rounded-full text-sm font-semibold {{ $badgeClasses }}">{{ str_replace('_', ' ', $order->status) }}</span>
</div>

{{-- Client Info --}}
<div class="admin-card border rounded-xl overflow-hidden mb-5">
    <div class="px-5 py-4 border-b admin-border flex items-center justify-between gap-3">
        <h2 class="text-[15px] font-semibold"><span class="material-symbols-outlined text-lg align-middle mr-1.5">person</span> Informasi Client</h2>
    </div>
    <div class="p-5">
        <div class="grid grid-cols-2 gap-4 max-md:grid-cols-1">
            <div>
                <div class="text-xs admin-text-muted mb-1">Nama</div>
                <div class="font-semibold">{{ $order->name }}</div>
            </div>
            <div>
                <div class="text-xs admin-text-muted mb-1">Email</div>
                <div><a href="mailto:{{ $order->email }}" class="text-blue-500 no-underline hover:text-blue-400">{{ $order->email }}</a></div>
            </div>
            @if($order->phone)
            <div>
                <div class="text-xs admin-text-muted mb-1">Telepon</div>
                <div>{{ $order->phone }}</div>
            </div>
            @endif
            @if($order->company)
            <div>
                <div class="text-xs admin-text-muted mb-1">Perusahaan</div>
                <div>{{ $order->company }}</div>
            </div>
            @endif
        </div>
    </div>
</div>

{{-- Project Details --}}
<div class="admin-card border rounded-xl overflow-hidden mb-5">
    <div class="px-5 py-4 border-b admin-border flex items-center justify-between gap-3">
        <h2 class="text-[15px] font-semibold"><span class="material-symbols-outlined text-lg align-middle mr-1.5">assignment</span> Detail Project</h2>
    </div>
    <div class="p-5">
        @if($order->categories)
        <div class="mb-4">
            <div class="text-xs admin-text-muted mb-2">Kategori</div>
            <div class="flex flex-wrap gap-1.5">
                @foreach($order->categories as $cat)
                <span class="bg-indigo-500/12 text-indigo-400 px-3 py-1 rounded-full text-xs font-medium">{{ $cat }}</span>
                @endforeach
            </div>
        </div>
        @endif
        @if($order->budget)
        <div class="mb-4">
            <div class="text-xs admin-text-muted mb-1">Budget</div>
            <div class="font-semibold">{{ $order->budget }}</div>
        </div>
        @endif
        <div>
            <div class="text-xs admin-text-muted mb-2">Deskripsi Project</div>
            @if($order->project_description)
            <p class="text-sm admin-text-secondary leading-relaxed whitespace-pre-wrap">{{ $order->project_description }}</p>
            @else
            <p class="text-sm admin-text-muted italic">Tidak ada deskripsi.</p>
            @endif
        </div>
    </div>
</div>

{{-- File --}}
<div class="admin-card border rounded-xl overflow-hidden mb-5">
    <div class="px-5 py-4 border-b admin-border flex items-center justify-between gap-3">
        <h2 class="text-[15px] font-semibold"><span class="material-symbols-outlined text-lg align-middle mr-1.5">attach_file</span> File Brief</h2>
    </div>
    <div class="p-5">
        @if($order->file_path)
        @php
            $fileName = basename($order->file_path);
            $ext = strtoupper(pathinfo($fileName, PATHINFO_EXTENSION));
        @endphp
        <div class="flex items-center justify-between gap-3 p-3.5 admin-deep-bg border rounded-[10px] flex-wrap">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-blue-500/12 rounded-[10px] flex items-center justify-center text-blue-400">
                    <span class="material-symbols-outlined">description</span>
                </div>
                <div>
                    <div class="text-sm font-medium">{{ $fileName }}</div>
                    <div class="text-xs admin-text-muted">{{ $ext }} file</div>
                </div>
            </div>
            <a href="{{ asset('storage/' . $order->file_path) }}" download class="inline-flex items-center gap-1.5 px-4 py-2 rounded-lg font-semibold text-sm bg-blue-500 text-white no-underline border-none cursor-pointer transition-all duration-150 hover:bg-blue-600" target="_blank">
                <span class="material-symbols-outlined">download</span> Download
            </a>
        </div>
        @else
        <p class="admin-text-muted italic text-sm">Tidak ada file yang dilampirkan.</p>
        @endif
    </div>
</div>

{{-- Update Status --}}
<div class="admin-card border rounded-xl overflow-hidden">
    <div class="px-5 py-4 border-b admin-border flex items-center justify-between gap-3">
        <h2 class="text-[15px] font-semibold"><span class="material-symbols-outlined text-lg align-middle mr-1.5">tune</span> Update Status</h2>
    </div>
    <div class="p-5">
        <form method="POST" action="{{ route('admin.orders.status', [$order, 'pending']) }}" id="status-form" class="flex items-center gap-3 flex-wrap">
            @csrf
            @method('PATCH')
            <select class="admin-input max-w-[220px] px-3.5 py-2.5 rounded-lg font-[inherit] text-sm outline-none transition-colors duration-200 focus:border-blue-500 cursor-pointer" id="status-select">
                <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="in_progress" {{ $order->status === 'in_progress' ? 'selected' : '' }}>In Progress</option>
                <option value="completed" {{ $order->status === 'completed' ? 'selected' : '' }}>Completed</option>
                <option value="rejected" {{ $order->status === 'rejected' ? 'selected' : '' }}>Rejected</option>
            </select>
            <button type="submit" class="inline-flex items-center gap-1.5 px-4 py-2 rounded-lg font-semibold text-sm bg-blue-500 text-white no-underline border-none cursor-pointer transition-all duration-150 hover:bg-blue-600">Simpan Status</button>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
document.getElementById('status-form').addEventListener('submit', function() {
    var val = document.getElementById('status-select').value;
    this.action = '{{ url("/admin/orders/".$order->id."/status") }}/' + val;
});
</script>
@endsection
