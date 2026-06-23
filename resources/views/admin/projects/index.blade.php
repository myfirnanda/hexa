@extends('layouts.admin')
@section('title', 'Projects')
@section('topbar-title', 'Projects')

@section('content')

{{-- Page header --}}
<div class="flex items-center justify-between flex-wrap gap-4 mb-7 max-md:flex-col max-md:items-start">
    <div>
        <h1 class="text-xl font-bold admin-text">Projects</h1>
        <p class="text-sm admin-text-muted mt-1">Kelola portfolio project yang ditampilkan di website</p>
    </div>
    <a href="{{ route('manager.projects.create') }}" class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-lg font-semibold text-sm text-white no-underline border-none cursor-pointer transition-all duration-150 hover:opacity-90" style="background: var(--admin-primary);">
        <span class="material-symbols-outlined text-[18px]">add</span>
        Tambah Project
    </a>
</div>

{{-- About Us Order Panel --}}
<div class="admin-card border rounded-xl mb-7">
    <div class="px-6 py-4 border-b admin-border flex items-center gap-3 flex-wrap">
        <span class="text-[14px] font-bold admin-text">Tampilan About Us</span>
        <span class="text-[11px] font-bold px-2 py-1 rounded" style="background: rgba(37,99,235,0.10); color: #60a5fa;">
            <span id="about-count">{{ $aboutProjects->count() }}</span>/6 project
        </span>
        <span class="text-[12px] admin-text-muted flex-1">— Drag untuk mengatur urutan 6 project unggulan di halaman About Us</span>
        {{-- Search on the right --}}
        <div id="about-add-row" class="relative flex-shrink-0" style="width: 280px;">
            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-[16px] admin-text-muted pointer-events-none select-none">search</span>
            <input type="text" id="about-search-input" placeholder="Cari project..."
                class="admin-input rounded-lg pl-9 pr-3 py-2 text-sm w-full outline-none" autocomplete="off">
            <ul id="about-search-results"
                class="absolute w-full border admin-border rounded-lg mt-1 shadow-xl hidden"
                style="background: var(--admin-card-bg); z-index: 9999; max-height: 240px; overflow-y: auto; right: 0;"></ul>
        </div>
    </div>
    <div class="p-4">
        <p id="about-max-warn" class="text-[11px] text-amber-500 mb-2 hidden">Maksimal 6 project sudah dipilih. Hapus salah satu sebelum menambah.</p>
        <ul id="about-sort-list" class="space-y-2" style="min-height: 48px;">
            @forelse($aboutProjects as $index => $ap)
            <li class="about-sort-item flex items-center gap-3 px-3 py-2.5 rounded-lg border admin-border"
                style="background: var(--admin-surface-hover);" data-id="{{ $ap->id }}" data-name="{{ $ap->name }}">
                <span class="material-symbols-outlined text-[18px] admin-text-muted select-none" style="cursor:grab;">drag_indicator</span>
                <span class="text-[11px] font-bold admin-text-muted w-5 text-center about-pos-num">{{ $index + 1 }}</span>
                <span class="text-[13px] font-semibold admin-text flex-1 truncate">{{ $ap->name }}</span>
                <button type="button" onclick="removeFromAbout(this)"
                    class="flex-shrink-0 size-6 flex items-center justify-center rounded hover:bg-red-500/10 transition-colors"
                    style="color: #f87171;" title="Hapus dari About Us">
                    <span class="material-symbols-outlined text-[16px]">close</span>
                </button>
            </li>
            @empty
            <li id="about-empty-hint" class="text-[12px] admin-text-muted text-center py-4">
                Belum ada project. Cari dan tambahkan dari kolom pencarian di kanan atas.
            </li>
            @endforelse
        </ul>
    </div>
</div>

<div class="admin-card border rounded-xl overflow-hidden">

    {{-- Card header with search --}}
    <div class="px-6 py-4 border-b admin-border flex items-center justify-between gap-3 flex-wrap">
        <div>
            <span class="text-[14px] font-bold admin-text">Semua Projects</span>
            <span class="text-[13px] admin-text-muted ml-2">({{ $projects->total() }})</span>
        </div>
        <form method="GET" action="{{ route('manager.projects.index') }}" class="flex items-center gap-2">
            <div class="relative">
                <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-[18px] admin-text-muted pointer-events-none select-none">search</span>
                <input type="text" name="search" value="{{ $search }}" placeholder="Cari nama atau kategori..."
                    class="admin-input admin-search-input rounded-lg pl-9 pr-3 py-2 text-sm outline-none w-55 focus:w-70"
                    autocomplete="off">
            </div>
            @if($search)
            <a href="{{ route('manager.projects.index') }}" class="text-[12px] font-medium admin-text-muted hover:admin-text transition-colors no-underline px-2 py-2 rounded-lg admin-surface-hover" title="Hapus filter">
                <span class="material-symbols-outlined text-[18px]">close</span>
            </a>
            @endif
        </form>
    </div>

    @if($projects->count())
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr style="background: var(--admin-surface-hover);">
                    <th class="text-left px-4 py-3 text-[11px] font-bold admin-text-muted uppercase tracking-wider border-b admin-border whitespace-nowrap w-10">#</th>
                    <th class="text-left px-4 py-3 text-[11px] font-bold admin-text-muted uppercase tracking-wider border-b admin-border whitespace-nowrap w-14">Cover</th>
                    <th class="text-left px-4 py-3 text-[11px] font-bold admin-text-muted uppercase tracking-wider border-b admin-border whitespace-nowrap">Nama Project</th>
                    <th class="text-left px-4 py-3 text-[11px] font-bold admin-text-muted uppercase tracking-wider border-b admin-border whitespace-nowrap">Kategori</th>
                    <th class="text-left px-4 py-3 text-[11px] font-bold admin-text-muted uppercase tracking-wider border-b admin-border whitespace-nowrap w-24">Aksi</th>
                </tr>
            </thead>
            <tbody class="admin-table-body" id="projects-table-body">
                @foreach($projects as $project)
                <tr class="admin-table-hover draggable-row" data-project-id="{{ $project->id }}">
                    <td class="px-4 py-3.5 text-[13px] admin-text-muted align-middle admin-stat-number">
                        <div class="flex items-center gap-1.5">
                            <span class="drag-handle material-symbols-outlined text-[15px]" style="color:#64748b;">drag_indicator</span>
                            <span class="row-num font-semibold">{{ $loop->iteration }}</span>
                        </div>
                    </td>
                    <td class="px-4 py-3.5 align-middle">
                        <img src="{{ image_url($project->image) }}"
                            class="size-10 rounded-lg object-cover admin-deep-bg border cursor-pointer hover:opacity-80 transition-opacity"
                            alt="{{ $project->name }}"
                            onclick="openGalleryPreview('{{ image_url($project->image) }}')"
                            aria-label="Preview gambar {{ $project->name }}">
                    </td>
                    <td class="px-4 py-3.5 align-middle">
                        <div class="text-[13px] font-semibold admin-text">{{ $project->name }}</div>
                    </td>
                    <td class="px-4 py-3.5 align-middle">
                        <span class="inline-block px-2.5 py-1 rounded-md text-[11px] font-bold capitalize" style="background: rgba(37,99,235,0.10); color: #60a5fa;">
                            {{ ucwords(str_replace('-', ' ', $project->category)) }}
                        </span>
                    </td>
                    <td class="px-4 py-3.5 align-middle">
                        <div class="flex items-center gap-1.5">
                            <a href="{{ route('manager.projects.edit', $project) }}"
                               class="inline-flex items-center justify-center size-8 rounded-lg cursor-pointer transition-all duration-150 no-underline border"
                               style="background: rgba(37,99,235,0.08); color: #60a5fa; border-color: rgba(37,99,235,0.15);"
                               onmouseover="this.style.background='rgba(37,99,235,0.18)'"
                               onmouseout="this.style.background='rgba(37,99,235,0.08)'"
                               title="Edit project" aria-label="Edit {{ $project->name }}">
                                <span class="material-symbols-outlined text-[16px]">edit</span>
                            </a>
                            <button onclick="confirmDelete('{{ route('manager.projects.destroy', $project) }}')"
                                class="inline-flex items-center justify-center size-8 rounded-lg cursor-pointer transition-all duration-150 border"
                                style="background: rgba(239,68,68,0.08); color: #f87171; border-color: rgba(239,68,68,0.15);"
                                onmouseover="this.style.background='rgba(239,68,68,0.18)'"
                                onmouseout="this.style.background='rgba(239,68,68,0.08)'"
                                title="Hapus project" aria-label="Hapus {{ $project->name }}">
                                <span class="material-symbols-outlined text-[16px]">delete</span>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="px-6 py-4 border-t admin-border">{{ $projects->links() }}</div>

    @elseif($search)

    <div class="flex flex-col items-center justify-center py-16 px-5">
        <span class="material-symbols-outlined text-5xl admin-text-muted mb-3 opacity-30">search_off</span>
        <p class="text-sm admin-text-secondary font-medium">Tidak ada hasil untuk <strong class="admin-text">"{{ $search }}"</strong></p>
        <a href="{{ route('manager.projects.index') }}" class="mt-3 text-[13px] no-underline" style="color: var(--admin-primary);">Hapus filter</a>
    </div>

    @else
    <div class="flex flex-col items-center justify-center py-16 px-5">
        <span class="material-symbols-outlined text-5xl admin-text-muted mb-3 opacity-30">work</span>
        <p class="text-sm admin-text-secondary mb-3">Belum ada project.</p>
        <a href="{{ route('manager.projects.create') }}" class="inline-flex items-center gap-1.5 px-4 py-2 rounded-lg font-semibold text-sm text-white no-underline" style="background: var(--admin-primary);">
            <span class="material-symbols-outlined text-[18px]">add</span> Tambah Project
        </a>
    </div>
    @endif
</div>
@endsection

@section('scripts')
<script>
// ── About Us sortable panel ──────────────────────────────────────────
var aboutSortUrl  = '{{ route("manager.projects.about-sort") }}';
var csrfToken     = $('meta[name="csrf-token"]').attr('content');
var allProjects   = @json($allProjectsForSelect->map(fn($p) => ['id' => $p->id, 'name' => $p->name]));

function getAboutIds() {
    var ids = [];
    $('#about-sort-list .about-sort-item').each(function () { ids.push($(this).data('id')); });
    return ids;
}

function saveAboutSort() {
    $.ajax({
        url: aboutSortUrl, type: 'POST',
        headers: { 'X-CSRF-TOKEN': csrfToken },
        data: { order: getAboutIds() },
        error: function (xhr) { console.error('About sort error:', xhr.responseText); }
    });
}

function refreshAboutPositions() {
    $('#about-sort-list .about-sort-item').each(function (i) {
        $(this).find('.about-pos-num').text(i + 1);
    });
    var count = $('#about-sort-list .about-sort-item').length;
    $('#about-count').text(count);
    if (count >= 6) {
        $('#about-search-input').prop('disabled', true).attr('placeholder', 'Sudah 6/6 project');
        $('#about-max-warn').removeClass('hidden');
    } else {
        $('#about-search-input').prop('disabled', false).attr('placeholder', 'Cari project...');
        $('#about-max-warn').addClass('hidden');
    }
    if (count === 0) {
        if ($('#about-empty-hint').length === 0) {
            $('#about-sort-list').append('<li id="about-empty-hint" class="text-[12px] admin-text-muted text-center py-4">Belum ada project. Cari dan tambahkan dari kolom di bawah.</li>');
        }
    } else {
        $('#about-empty-hint').remove();
    }
}

function appendAboutItem(id, name) {
    var count = $('#about-sort-list .about-sort-item').length;
    if (count >= 6) return;
    var num  = count + 1;
    var html = '<li class="about-sort-item flex items-center gap-3 px-3 py-2.5 rounded-lg border admin-border" style="background:var(--admin-surface-hover);" data-id="' + id + '" data-name="' + name + '">' +
        '<span class="material-symbols-outlined text-[18px] admin-text-muted select-none" style="cursor:grab;">drag_indicator</span>' +
        '<span class="text-[11px] font-bold admin-text-muted w-5 text-center about-pos-num">' + num + '</span>' +
        '<span class="text-[13px] font-semibold admin-text flex-1 truncate">' + name + '</span>' +
        '<button type="button" onclick="removeFromAbout(this)" class="flex-shrink-0 size-6 flex items-center justify-center rounded hover:bg-red-500/10 transition-colors" style="color:#f87171;" title="Hapus dari About Us">' +
        '<span class="material-symbols-outlined text-[16px]">close</span></button></li>';
    $('#about-sort-list').append(html);
    // Re-init sortable on new items
    $('#about-sort-list').sortable('refresh');
}

window.removeFromAbout = function (btn) {
    var $item = $(btn).closest('.about-sort-item');
    $item.remove();
    refreshAboutPositions();
    saveAboutSort();
};

// ── Search input logic ───────────────────────────────────────────────
function renderSearchResults(query) {
    var $results = $('#about-search-results');
    var addedIds = getAboutIds().map(Number);
    var q        = query.trim().toLowerCase();
    var filtered = allProjects.filter(function (p) {
        return !addedIds.includes(p.id) && (!q || p.name.toLowerCase().includes(q));
    });
    if (!filtered.length || !q) { $results.addClass('hidden').empty(); return; }
    $results.empty();
    filtered.slice(0, 8).forEach(function (p) {
        var $li = $('<li>').addClass('px-3 py-2.5 text-[13px] font-medium admin-text cursor-pointer')
            .css({'border-bottom': '1px solid var(--admin-border, rgba(255,255,255,0.06))'})
            .text(p.name)
            .hover(function () { $(this).css('background', 'var(--admin-surface-hover)'); },
                   function () { $(this).css('background', ''); })
            .on('click', function () {
                appendAboutItem(p.id, p.name);
                $results.addClass('hidden').empty();
                $('#about-search-input').val('');
                refreshAboutPositions();
                saveAboutSort();
            });
        $results.append($li);
    });
    $results.removeClass('hidden');
}

$(function () {
    // About Us sortable
    $('#about-sort-list').sortable({
        axis: 'y',
        cancel: 'button, a, input, select',
        cursor: 'grabbing',
        opacity: 0.75,
        placeholder: 'sort-placeholder',
        helper: function (e, ui) {
            ui.children().each(function () { $(this).width($(this).width()); });
            return ui;
        },
        start: function (e, ui) { ui.placeholder.height(ui.item.outerHeight()); },
        update: function () { refreshAboutPositions(); saveAboutSort(); }
    }).disableSelection();

    // Init state on load
    refreshAboutPositions();

    // Search input events
    $('#about-search-input').on('input', function () {
        renderSearchResults($(this).val());
    }).on('keydown', function (e) {
        if (e.key === 'Escape') { $('#about-search-results').addClass('hidden').empty(); $(this).val(''); }
    });

    // Close dropdown when clicking outside
    $(document).on('click', function (e) {
        if (!$(e.target).closest('#about-add-row').length) {
            $('#about-search-results').addClass('hidden').empty();
        }
    });

    // ── Main table sortable ──────────────────────────────────────────
    var $tbody = $('#projects-table-body');
    if (!$tbody.length) return;

    $tbody.sortable({
        axis: 'y',
        cancel: 'button, a, input, select, textarea',
        cursor: 'grabbing',
        opacity: 0.75,
        placeholder: 'sort-placeholder',
        helper: function (e, ui) {
            ui.children().each(function () { $(this).width($(this).width()); });
            return ui;
        },
        start: function (e, ui) { ui.placeholder.height(ui.item.outerHeight()); },
        update: function () {
            $tbody.find('.draggable-row').each(function (i) {
                $(this).find('.row-num').text(i + 1);
            });
            var order = [];
            $tbody.find('.draggable-row').each(function () {
                var id = parseInt($(this).data('project-id'));
                if (!isNaN(id)) order.push(id);
            });
            $.ajax({
                url: '{{ route("manager.projects.sort") }}',
                type: 'POST',
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                data: { order: order },
                error: function (xhr) { console.error('Sort error:', xhr.status, xhr.responseText); }
            });
        }
    }).disableSelection();
});
</script>
<style>
#projects-table-body .draggable-row { cursor: grab; }
#projects-table-body .sort-placeholder { visibility: visible !important; background: rgba(59,130,246,0.07) !important; outline: 2px dashed rgba(59,130,246,0.35); }
#projects-table-body .ui-sortable-helper { box-shadow: 0 8px 28px rgba(0,0,0,0.45) !important; }
</style>
@endsection
