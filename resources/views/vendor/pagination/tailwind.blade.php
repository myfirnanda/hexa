@if ($paginator->hasPages())
<nav class="flex items-center justify-between gap-3">
    {{-- Kiri: jumlah data --}}
    <span class="text-[13px] admin-text-muted">
        {{ $paginator->total() }} data
    </span>

    {{-- Tengah: pagination numbers --}}
    <span class="flex gap-1">
        @foreach ($elements as $element)
            @if (is_string($element))
                <span class="px-2.5 py-1.5 rounded-md text-[13px] admin-text-muted border admin-border">{{ $element }}</span>
            @endif
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="px-3 py-1.5 rounded-md text-[13px] font-semibold text-white bg-blue-500 border border-blue-500">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="px-3 py-1.5 rounded-md text-[13px] admin-text-secondary border admin-border no-underline transition-colors duration-150 hover:bg-[var(--admin-surface-hover)]">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach
    </span>

    {{-- Kanan: chevron left/right --}}
    <span class="flex gap-1">
        @if ($paginator->onFirstPage())
            <span class="inline-flex items-center justify-center size-[34px] rounded-md border admin-border opacity-35 cursor-default">
                <span class="material-symbols-outlined text-lg admin-text-muted">chevron_left</span>
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="inline-flex items-center justify-center size-[34px] rounded-md border admin-border no-underline transition-colors duration-150 hover:bg-[var(--admin-surface-hover)]">
                <span class="material-symbols-outlined text-lg admin-text-secondary">chevron_left</span>
            </a>
        @endif

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="inline-flex items-center justify-center size-[34px] rounded-md border admin-border no-underline transition-colors duration-150 hover:bg-[var(--admin-surface-hover)]">
                <span class="material-symbols-outlined text-lg admin-text-secondary">chevron_right</span>
            </a>
        @else
            <span class="inline-flex items-center justify-center size-[34px] rounded-md border admin-border opacity-35 cursor-default">
                <span class="material-symbols-outlined text-lg admin-text-muted">chevron_right</span>
            </span>
        @endif
    </span>
</nav>
@endif
