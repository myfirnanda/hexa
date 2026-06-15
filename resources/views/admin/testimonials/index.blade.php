@extends('layouts.admin')
@section('title', 'Testimonials')
@section('topbar-title', 'Testimonials')

@section('content')

<div class="flex items-center justify-between flex-wrap gap-4 mb-7 max-md:flex-col max-md:items-start">
    <div>
        <h1 class="text-xl font-bold admin-text">Testimonials</h1>
        <p class="text-sm admin-text-muted mt-1">Kelola testimoni klien yang ditampilkan di website</p>
    </div>
    <button type="button" onclick="openCreateTestimonial()"
        class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-lg font-semibold text-sm text-white border-none cursor-pointer transition-all duration-150 hover:opacity-90" style="background: var(--admin-primary);">
        <span class="material-symbols-outlined text-[18px]">add</span>
        Tambah Testimonial
    </button>
</div>

<div class="admin-card border rounded-xl overflow-hidden">

    <div class="px-6 py-4 border-b admin-border flex items-center justify-between gap-3 flex-wrap">
        <div>
            <span class="text-[14px] font-bold admin-text">Semua Testimonials</span>
            <span class="text-[13px] admin-text-muted ml-2">({{ $testimonials->total() }})</span>
        </div>
        <form method="GET" action="{{ route('manager.testimonials.index') }}" class="flex items-center gap-2">
            <div class="relative">
                <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-[18px] admin-text-muted pointer-events-none select-none">search</span>
                <input type="text" name="search" value="{{ $search }}" placeholder="Cari nama, role, atau kutipan..."
                    class="admin-input admin-search-input rounded-lg pl-9 pr-3 py-2 text-sm outline-none w-55 focus:w-70"
                    autocomplete="off">
            </div>
            @if($search)
            <a href="{{ route('manager.testimonials.index') }}" class="text-[12px] font-medium admin-text-muted no-underline px-2 py-2 rounded-lg admin-surface-hover" title="Hapus filter">
                <span class="material-symbols-outlined text-[18px]">close</span>
            </a>
            @endif
        </form>
    </div>

    @if($testimonials->count())
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr style="background: var(--admin-surface-hover);">
                    <th class="text-left px-4 py-3 text-[11px] font-bold admin-text-muted uppercase tracking-wider border-b admin-border whitespace-nowrap w-10">#</th>
                    <th class="text-left px-4 py-3 text-[11px] font-bold admin-text-muted uppercase tracking-wider border-b admin-border whitespace-nowrap">Nama</th>
                    <th class="text-left px-4 py-3 text-[11px] font-bold admin-text-muted uppercase tracking-wider border-b admin-border whitespace-nowrap">Role</th>
                    <th class="text-left px-4 py-3 text-[11px] font-bold admin-text-muted uppercase tracking-wider border-b admin-border whitespace-nowrap w-28">Rating</th>
                    <th class="text-left px-4 py-3 text-[11px] font-bold admin-text-muted uppercase tracking-wider border-b admin-border whitespace-nowrap">Kutipan</th>
                    <th class="text-left px-4 py-3 text-[11px] font-bold admin-text-muted uppercase tracking-wider border-b admin-border whitespace-nowrap w-24">Aksi</th>
                </tr>
            </thead>
            <tbody class="admin-table-body" id="testimonials-table-body">
                @foreach($testimonials as $testimonial)
                <tr class="admin-table-hover draggable-row" data-testimonial-id="{{ $testimonial->id }}">
                    <td class="px-4 py-3.5 text-[13px] admin-text-muted align-middle admin-stat-number">
                        <div class="flex items-center gap-1.5">
                            <span class="drag-handle material-symbols-outlined text-[15px]" style="color:#64748b;">drag_indicator</span>
                            <span class="row-num font-semibold">{{ $loop->iteration }}</span>
                        </div>
                    </td>
                    <td class="px-4 py-3.5 align-middle">
                        <div class="text-[13px] font-semibold admin-text">{{ $testimonial->name }}</div>
                    </td>
                    <td class="px-4 py-3.5 align-middle text-[13px] admin-text-secondary">{{ $testimonial->role }}</td>
                    <td class="px-4 py-3.5 align-middle">
                        <div class="flex items-center gap-1.5">
                            <span class="text-amber-400 tracking-tight text-[15px]">@for($i=0;$i<$testimonial->rating;$i++)★@endfor</span>
                            <span class="text-[11px] admin-text-muted font-bold admin-stat-number">({{ $testimonial->rating }})</span>
                        </div>
                    </td>
                    <td class="px-4 py-3.5 align-middle text-[13px] admin-text-secondary" style="max-width: 220px;">
                        <span class="line-clamp-2">{{ $testimonial->quote }}</span>
                    </td>
                    <td class="px-4 py-3.5 align-middle">
                        <div class="flex items-center gap-1.5">
                            <button type="button"
                                class="inline-flex items-center justify-center size-8 rounded-lg cursor-pointer transition-all duration-150 border"
                                style="background: rgba(37,99,235,0.08); color: #60a5fa; border-color: rgba(37,99,235,0.15);"
                                onmouseover="this.style.background='rgba(37,99,235,0.18)'"
                                onmouseout="this.style.background='rgba(37,99,235,0.08)'"
                                onclick="openEditTestimonial({{ $testimonial->id }}, '{{ e($testimonial->name) }}', '{{ e($testimonial->role) }}', {{ json_encode($testimonial->quote) }}, {{ $testimonial->rating }})"
                                title="Edit testimonial">
                                <span class="material-symbols-outlined text-[16px]">edit</span>
                            </button>
                            <button type="button"
                                class="inline-flex items-center justify-center size-8 rounded-lg cursor-pointer transition-all duration-150 border"
                                style="background: rgba(239,68,68,0.08); color: #f87171; border-color: rgba(239,68,68,0.15);"
                                onmouseover="this.style.background='rgba(239,68,68,0.18)'"
                                onmouseout="this.style.background='rgba(239,68,68,0.08)'"
                                onclick="confirmDelete('{{ route('manager.testimonials.destroy', $testimonial) }}')"
                                title="Hapus testimonial">
                                <span class="material-symbols-outlined text-[16px]">delete</span>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="px-6 py-4 border-t admin-border">{{ $testimonials->links() }}</div>

    @elseif($search)
    <div class="flex flex-col items-center justify-center py-16 px-5">
        <span class="material-symbols-outlined text-5xl admin-text-muted mb-3 opacity-30">search_off</span>
        <p class="text-sm admin-text-secondary font-medium">Tidak ada hasil untuk <strong class="admin-text">"{{ $search }}"</strong></p>
        <a href="{{ route('manager.testimonials.index') }}" class="mt-3 text-[13px] no-underline" style="color: var(--admin-primary);">Hapus filter</a>
    </div>

    @else
    <div class="flex flex-col items-center justify-center py-16 px-5">
        <span class="material-symbols-outlined text-5xl admin-text-muted mb-3 opacity-30">rate_review</span>
        <p class="text-sm admin-text-secondary mb-3">Belum ada testimonial.</p>
        <button type="button" onclick="openCreateTestimonial()"
            class="inline-flex items-center gap-1.5 px-4 py-2 rounded-lg font-semibold text-sm text-white border-none cursor-pointer" style="background: var(--admin-primary);">
            <span class="material-symbols-outlined text-[18px]">add</span> Tambah Testimonial
        </button>
    </div>
    @endif
</div>

{{-- Create Testimonial Modal --}}
<div id="createTestimonialModal" class="fixed inset-0 z-100 flex items-center justify-center p-4" style="display:none" aria-modal="true" role="dialog">
    <div id="createTestimonialBackdrop" class="absolute inset-0 bg-black/60 backdrop-blur-sm transition-opacity duration-200 opacity-0"></div>
    <div id="createTestimonialDialog" class="relative admin-card rounded-2xl border shadow-2xl transition-all duration-200 opacity-0 overflow-hidden w-full max-w-md" style="transform:scale(0.95)">
        <div class="flex items-center justify-between px-5 py-4 border-b admin-border">
            <div class="flex items-center gap-3">
                <div class="size-8 rounded-lg flex items-center justify-center shrink-0" style="background: rgba(16,185,129,0.12);">
                    <span class="material-symbols-outlined text-[18px]" style="color: #34d399;">add_comment</span>
                </div>
                <div>
                    <h3 class="text-[14px] font-bold admin-text leading-tight">Tambah Testimonial</h3>
                    <p class="text-[11px] admin-text-muted mt-0.5">Tambahkan testimoni baru</p>
                </div>
            </div>
            <button type="button" onclick="closeCreateTestimonial()" aria-label="Tutup"
                class="flex items-center justify-center size-8 rounded-lg border-none bg-transparent cursor-pointer admin-text-muted admin-surface-hover transition-colors duration-150">
                <span class="material-symbols-outlined text-[20px]">close</span>
            </button>
        </div>
        <form method="POST" action="{{ route('manager.testimonials.store') }}">
            @csrf
            <input type="hidden" name="_source" value="create_testimonial">
            <div class="px-5 py-5 space-y-4">
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label for="createTestimonialName" class="block text-[12px] font-bold admin-text-secondary mb-1.5 uppercase tracking-wide">Nama <span class="text-red-400">*</span></label>
                        <input type="text" id="createTestimonialName" name="name" required
                            value="{{ old('_source') === 'create_testimonial' ? old('name') : '' }}"
                            placeholder="Nama..."
                            class="w-full px-3.5 py-2.5 rounded-lg admin-input font-[inherit] text-sm outline-none @if(old('_source')==='create_testimonial' && $errors->has('name')) border-red-400 @endif">
                        @if(old('_source') === 'create_testimonial')
                        @error('name')<p class="text-xs text-red-400 mt-1">{{ $message }}</p>@enderror
                        @endif
                    </div>
                    <div>
                        <label for="createTestimonialRole" class="block text-[12px] font-bold admin-text-secondary mb-1.5 uppercase tracking-wide">Role <span class="text-red-400">*</span></label>
                        <input type="text" id="createTestimonialRole" name="role" required
                            value="{{ old('_source') === 'create_testimonial' ? old('role') : '' }}"
                            placeholder="CEO, Manager..."
                            class="w-full px-3.5 py-2.5 rounded-lg admin-input font-[inherit] text-sm outline-none @if(old('_source')==='create_testimonial' && $errors->has('role')) border-red-400 @endif">
                        @if(old('_source') === 'create_testimonial')
                        @error('role')<p class="text-xs text-red-400 mt-1">{{ $message }}</p>@enderror
                        @endif
                    </div>
                </div>
                <div>
                    <label for="createTestimonialQuote" class="block text-[12px] font-bold admin-text-secondary mb-1.5 uppercase tracking-wide">Quote <span class="text-red-400">*</span></label>
                    <textarea id="createTestimonialQuote" name="quote" rows="4" required
                        placeholder="Isi testimoni..."
                        class="w-full px-3.5 py-2.5 rounded-lg admin-input font-[inherit] text-sm outline-none resize-none @if(old('_source')==='create_testimonial' && $errors->has('quote')) border-red-400 @endif">{{ old('_source') === 'create_testimonial' ? old('quote') : '' }}</textarea>
                    @if(old('_source') === 'create_testimonial')
                    @error('quote')<p class="text-xs text-red-400 mt-1">{{ $message }}</p>@enderror
                    @endif
                </div>
                <div>
                    <label for="createTestimonialRating" class="block text-[12px] font-bold admin-text-secondary mb-1.5 uppercase tracking-wide">Rating <span class="text-red-400">*</span></label>
                    <select id="createTestimonialRating" name="rating" required
                        class="px-3.5 py-2.5 rounded-lg admin-input font-[inherit] text-sm outline-none cursor-pointer w-32">
                        @for($r=5;$r>=1;$r--)
                        <option value="{{ $r }}" {{ old('_source')==='create_testimonial' && old('rating')==$r ? 'selected' : '' }}>
                            {{ $r }} {{ str_repeat('★', $r) }}
                        </option>
                        @endfor
                    </select>
                </div>
            </div>
            <div class="flex justify-end gap-2 px-5 py-4 border-t admin-border">
                <button type="button" onclick="closeCreateTestimonial()"
                    class="inline-flex items-center px-4 py-2 rounded-lg font-semibold text-sm admin-card admin-text border admin-border cursor-pointer transition-all duration-150 admin-surface-hover">
                    Batal
                </button>
                <button type="submit"
                    class="inline-flex items-center gap-1.5 px-4 py-2 rounded-lg font-semibold text-sm text-white border-none cursor-pointer transition-all duration-150 hover:opacity-90" style="background: var(--admin-primary);">
                    <span class="material-symbols-outlined text-[18px]">save</span>
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

{{-- Edit Testimonial Modal --}}
<div id="editTestimonialModal" class="fixed inset-0 z-100 flex items-center justify-center p-4" style="display:none" aria-modal="true" role="dialog">
    <div id="editTestimonialBackdrop" class="absolute inset-0 bg-black/60 backdrop-blur-sm transition-opacity duration-200 opacity-0"></div>
    <div id="editTestimonialDialog" class="relative admin-card rounded-2xl border shadow-2xl transition-all duration-200 opacity-0 overflow-hidden w-full max-w-md" style="transform:scale(0.95)">
        <div class="flex items-center justify-between px-5 py-4 border-b admin-border">
            <div class="flex items-center gap-3">
                <div class="size-8 rounded-lg flex items-center justify-center shrink-0" style="background: var(--admin-brand-dim);">
                    <span class="material-symbols-outlined text-[18px]" style="color: var(--admin-brand);">rate_review</span>
                </div>
                <div>
                    <h3 class="text-[14px] font-bold admin-text leading-tight">Edit Testimonial</h3>
                    <p class="text-[11px] admin-text-muted mt-0.5">Perbarui data testimoni</p>
                </div>
            </div>
            <button type="button" onclick="closeEditTestimonial()" aria-label="Tutup"
                class="flex items-center justify-center size-8 rounded-lg border-none bg-transparent cursor-pointer admin-text-muted admin-surface-hover transition-colors duration-150">
                <span class="material-symbols-outlined text-[20px]">close</span>
            </button>
        </div>
        <form id="editTestimonialForm" method="POST">
            @csrf @method('PUT')
            <div class="px-5 py-5 space-y-4">
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label for="editTestimonialName" class="block text-[12px] font-bold admin-text-secondary mb-1.5 uppercase tracking-wide">Nama <span class="text-red-400">*</span></label>
                        <input type="text" id="editTestimonialName" name="name" required placeholder="Nama..."
                            class="w-full px-3.5 py-2.5 rounded-lg admin-input font-[inherit] text-sm outline-none">
                    </div>
                    <div>
                        <label for="editTestimonialRole" class="block text-[12px] font-bold admin-text-secondary mb-1.5 uppercase tracking-wide">Role <span class="text-red-400">*</span></label>
                        <input type="text" id="editTestimonialRole" name="role" required placeholder="CEO, Manager..."
                            class="w-full px-3.5 py-2.5 rounded-lg admin-input font-[inherit] text-sm outline-none">
                    </div>
                </div>
                <div>
                    <label for="editTestimonialQuote" class="block text-[12px] font-bold admin-text-secondary mb-1.5 uppercase tracking-wide">Quote <span class="text-red-400">*</span></label>
                    <textarea id="editTestimonialQuote" name="quote" rows="4" required placeholder="Isi testimoni..."
                        class="w-full px-3.5 py-2.5 rounded-lg admin-input font-[inherit] text-sm outline-none resize-none"></textarea>
                </div>
                <div>
                    <label for="editTestimonialRating" class="block text-[12px] font-bold admin-text-secondary mb-1.5 uppercase tracking-wide">Rating <span class="text-red-400">*</span></label>
                    <select id="editTestimonialRating" name="rating" required
                        class="px-3.5 py-2.5 rounded-lg admin-input font-[inherit] text-sm outline-none cursor-pointer w-32">
                        @for($r=5;$r>=1;$r--)
                        <option value="{{ $r }}">{{ $r }} {{ str_repeat('★', $r) }}</option>
                        @endfor
                    </select>
                </div>
            </div>
            <div class="flex justify-end gap-2 px-5 py-4 border-t admin-border">
                <button type="button" onclick="closeEditTestimonial()"
                    class="inline-flex items-center px-4 py-2 rounded-lg font-semibold text-sm admin-card admin-text border admin-border cursor-pointer transition-all duration-150 admin-surface-hover">
                    Batal
                </button>
                <button type="submit"
                    class="inline-flex items-center gap-1.5 px-4 py-2 rounded-lg font-semibold text-sm text-white border-none cursor-pointer transition-all duration-150 hover:opacity-90" style="background: var(--admin-primary);">
                    <span class="material-symbols-outlined text-[18px]">save</span>
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
(function ($) {
    function makeModal(modalId, backdropId, dialogId) {
        var $modal = $('#' + modalId), $backdrop = $('#' + backdropId), $dialog = $('#' + dialogId), busy = false;
        function open() {
            $modal.css('display', 'flex'); $('body').css('overflow', 'hidden');
            requestAnimationFrame(function () { $backdrop.css('opacity', '1'); $dialog.css({ opacity: '1', transform: 'scale(1)' }); });
        }
        function close() {
            if (busy) return; busy = true;
            $backdrop.css('opacity', '0'); $dialog.css({ opacity: '0', transform: 'scale(0.95)' });
            setTimeout(function () { $modal.css('display', 'none'); $('body').css('overflow', ''); busy = false; }, 200);
        }
        $backdrop.on('click', close);
        return { open: open, close: close, $modal: $modal };
    }

    var create = makeModal('createTestimonialModal', 'createTestimonialBackdrop', 'createTestimonialDialog');
    var edit   = makeModal('editTestimonialModal',   'editTestimonialBackdrop',   'editTestimonialDialog');

    window.openCreateTestimonial  = function () { create.open(); setTimeout(function(){ $('#createTestimonialName').trigger('focus'); }, 100); };
    window.closeCreateTestimonial = create.close;

    window.openEditTestimonial = function (id, name, role, quote, rating) {
        $('#editTestimonialForm').attr('action', '/manager/testimonials/' + id);
        $('#editTestimonialName').val(name);
        $('#editTestimonialRole').val(role);
        $('#editTestimonialQuote').val(quote);
        $('#editTestimonialRating').val(rating);
        edit.open(); setTimeout(function(){ $('#editTestimonialName').trigger('focus'); }, 100);
    };
    window.closeEditTestimonial = edit.close;

    $(function () {
        @if($errors->any() && old('_source') === 'create_testimonial') create.open(); @endif

        // Drag-and-drop sort
        var $tbody = $('#testimonials-table-body');
        if ($tbody.length) {
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
                    $tbody.find('.draggable-row').each(function (i) { $(this).find('.row-num').text(i + 1); });
                    var order = [];
                    $tbody.find('.draggable-row').each(function () {
                        var id = parseInt($(this).data('testimonial-id'));
                        if (!isNaN(id)) order.push(id);
                    });
                    $.ajax({
                        url: '{{ route("manager.testimonials.sort") }}',
                        type: 'POST',
                        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                        data: { order: order },
                        error: function (xhr) { console.error('Sort error:', xhr.status, xhr.responseText); }
                    });
                }
            }).disableSelection();
        }
        $(document).on('keydown', function (e) {
            if (e.key !== 'Escape') return;
            if (edit.$modal.is(':visible'))   window.closeEditTestimonial();
            if (create.$modal.is(':visible')) window.closeCreateTestimonial();
        });
    });
}(jQuery));
</script>
<style>
#testimonials-table-body .draggable-row { cursor: grab; }
#testimonials-table-body .sort-placeholder { visibility: visible !important; background: rgba(59,130,246,0.07) !important; outline: 2px dashed rgba(59,130,246,0.35); }
#testimonials-table-body .ui-sortable-helper { box-shadow: 0 8px 28px rgba(0,0,0,0.45) !important; }
</style>
@endsection
