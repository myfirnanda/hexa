@extends('layouts.admin')
@section('title', 'Testimonials')
@section('topbar-title', 'Testimonials')

@section('content')
<div class="flex items-center justify-between flex-wrap gap-4 mb-7 max-md:flex-col max-md:items-start">
    <div>
        <h1 class="text-2xl font-bold">Testimonials</h1>
        <p class="text-sm admin-text-muted mt-1">Kelola testimoni klien yang ditampilkan di website</p>
    </div>
    <button type="button" onclick="openCreateTestimonial()" class="inline-flex items-center gap-1.5 px-4 py-2 rounded-lg font-semibold text-sm bg-blue-500 text-white border-none cursor-pointer transition-all duration-150 hover:bg-blue-600">
        <span class="material-symbols-outlined">add</span>
        Tambah Testimonial
    </button>
</div>

<div class="admin-card border rounded-xl overflow-hidden">
    <div class="px-5 py-4 border-b admin-border">
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
                    <td class="px-4 py-3 text-sm border-b admin-border-light align-middle">
                        <span class="text-yellow-400 tracking-wider">@for($i=0;$i<$testimonial->rating;$i++)&#9733;@endfor</span>
                    </td>
                    <td class="px-4 py-3 text-sm border-b admin-border-light align-middle admin-text-secondary truncate" style="max-width:220px">{{ $testimonial->quote }}</td>
                    <td class="px-4 py-3 text-sm border-b admin-border-light align-middle">
                        <div class="flex items-center gap-1.5">
                            <button type="button" title="Edit"
                                class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg text-[13px] admin-btn-secondary border-none cursor-pointer transition-all duration-150"
                                onclick="openEditTestimonial({{ $testimonial->id }}, '{{ e($testimonial->name) }}', '{{ e($testimonial->role) }}', {{ json_encode($testimonial->quote) }}, {{ $testimonial->rating }})">
                                <span class="material-symbols-outlined text-[16px]">edit</span>
                            </button>
                            <button type="button" title="Hapus"
                                class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg text-[13px] bg-red-500/12 text-red-400 border border-red-500/20 cursor-pointer transition-all duration-150 hover:bg-red-500/20"
                                onclick="confirmDelete('{{ route('admin.testimonials.destroy', $testimonial) }}')">
                                <span class="material-symbols-outlined text-[16px]">delete</span>
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
    <div class="text-center py-14 px-5 admin-text-muted">
        <span class="material-symbols-outlined text-5xl mb-3 block opacity-40">rate_review</span>
        <p class="text-sm">Belum ada testimonial. Klik tombol <strong>Tambah Testimonial</strong> untuk menambahkan.</p>
    </div>
    @endif
</div>

{{-- ============================================================ --}}
{{-- CREATE TESTIMONIAL MODAL --}}
{{-- ============================================================ --}}
<div id="createTestimonialModal" class="fixed inset-0 z-100 flex items-center justify-center p-4" style="display:none" aria-modal="true" role="dialog">
    <div id="createTestimonialBackdrop" class="absolute inset-0 bg-black/50 backdrop-blur-sm transition-opacity duration-200 opacity-0"></div>
    <div id="createTestimonialDialog" class="relative admin-card rounded-2xl border shadow-2xl transition-all duration-200 opacity-0 overflow-hidden" style="width:100%;max-width:400px;transform:scale(0.95)">
        <div class="flex items-center justify-between px-5 py-4 border-b admin-border">
            <div class="flex items-center gap-3">
                <div class="size-8 rounded-lg bg-green-500/15 flex items-center justify-center shrink-0">
                    <span class="material-symbols-outlined text-[18px] text-green-400">add_comment</span>
                </div>
                <div>
                    <h3 class="text-[15px] font-semibold admin-text leading-tight">Tambah Testimonial</h3>
                    <p class="text-xs admin-text-muted mt-0.5">Tambahkan testimoni baru</p>
                </div>
            </div>
            <button type="button" onclick="closeCreateTestimonial()" aria-label="Tutup"
                class="flex items-center justify-center size-8 rounded-lg border-none bg-transparent cursor-pointer admin-text-muted admin-surface-hover transition-colors duration-150">
                <span class="material-symbols-outlined text-[20px]">close</span>
            </button>
        </div>
        <form method="POST" action="{{ route('admin.testimonials.store') }}">
            @csrf
            <input type="hidden" name="_source" value="create_testimonial">
            <div class="px-5 py-5 space-y-4">
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label for="createTestimonialName" class="block text-[13px] font-semibold admin-text-secondary mb-1.5">Nama <span class="text-red-400">*</span></label>
                        <input type="text" id="createTestimonialName" name="name" required
                            value="{{ old('_source') === 'create_testimonial' ? old('name') : '' }}"
                            placeholder="Nama..."
                            class="w-full px-3.5 py-2.5 rounded-lg admin-input font-[inherit] text-sm outline-none transition-colors duration-200 focus:border-blue-500 @if(old('_source')==='create_testimonial' && $errors->has('name')) border-red-400 @endif">
                        @if(old('_source') === 'create_testimonial')
                        @error('name')<p class="text-xs text-red-400 mt-1">{{ $message }}</p>@enderror
                        @endif
                    </div>
                    <div>
                        <label for="createTestimonialRole" class="block text-[13px] font-semibold admin-text-secondary mb-1.5">Role <span class="text-red-400">*</span></label>
                        <input type="text" id="createTestimonialRole" name="role" required
                            value="{{ old('_source') === 'create_testimonial' ? old('role') : '' }}"
                            placeholder="CEO, Manager..."
                            class="w-full px-3.5 py-2.5 rounded-lg admin-input font-[inherit] text-sm outline-none transition-colors duration-200 focus:border-blue-500 @if(old('_source')==='create_testimonial' && $errors->has('role')) border-red-400 @endif">
                        @if(old('_source') === 'create_testimonial')
                        @error('role')<p class="text-xs text-red-400 mt-1">{{ $message }}</p>@enderror
                        @endif
                    </div>
                </div>
                <div>
                    <label for="createTestimonialQuote" class="block text-[13px] font-semibold admin-text-secondary mb-1.5">Quote / Testimoni <span class="text-red-400">*</span></label>
                    <textarea id="createTestimonialQuote" name="quote" rows="4" required
                        placeholder="Isi testimoni..."
                        class="w-full px-3.5 py-2.5 rounded-lg admin-input font-[inherit] text-sm outline-none transition-colors duration-200 focus:border-blue-500 resize-none @if(old('_source')==='create_testimonial' && $errors->has('quote')) border-red-400 @endif">{{ old('_source') === 'create_testimonial' ? old('quote') : '' }}</textarea>
                    @if(old('_source') === 'create_testimonial')
                    @error('quote')<p class="text-xs text-red-400 mt-1">{{ $message }}</p>@enderror
                    @endif
                </div>
                <div>
                    <label for="createTestimonialRating" class="block text-[13px] font-semibold admin-text-secondary mb-1.5">Rating <span class="text-red-400">*</span></label>
                    <select id="createTestimonialRating" name="rating" required
                        class="px-3.5 py-2.5 rounded-lg admin-input font-[inherit] text-sm outline-none transition-colors duration-200 focus:border-blue-500 cursor-pointer" style="width:7rem">
                        <option value="5" {{ old('_source')==='create_testimonial' && old('rating')==5 ? 'selected' : '' }}>5 &#9733;&#9733;&#9733;&#9733;&#9733;</option>
                        <option value="4" {{ old('_source')==='create_testimonial' && old('rating')==4 ? 'selected' : '' }}>4 &#9733;&#9733;&#9733;&#9733;</option>
                        <option value="3" {{ old('_source')==='create_testimonial' && old('rating')==3 ? 'selected' : '' }}>3 &#9733;&#9733;&#9733;</option>
                        <option value="2" {{ old('_source')==='create_testimonial' && old('rating')==2 ? 'selected' : '' }}>2 &#9733;&#9733;</option>
                        <option value="1" {{ old('_source')==='create_testimonial' && old('rating')==1 ? 'selected' : '' }}>1 &#9733;</option>
                    </select>
                </div>
            </div>
            <div class="flex justify-end gap-2 px-5 py-4 border-t admin-border">
                <button type="button" onclick="closeCreateTestimonial()"
                    class="inline-flex items-center px-4 py-2 rounded-lg font-semibold text-sm admin-card admin-text border admin-border cursor-pointer transition-all duration-150 admin-surface-hover">
                    Batal
                </button>
                <button type="submit"
                    class="inline-flex items-center gap-1.5 px-4 py-2 rounded-lg font-semibold text-sm bg-blue-500 text-white border-none cursor-pointer transition-all duration-150 hover:bg-blue-600">
                    <span class="material-symbols-outlined text-[18px]">save</span>
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

{{-- ============================================================ --}}
{{-- EDIT TESTIMONIAL MODAL --}}
{{-- ============================================================ --}}
<div id="editTestimonialModal" class="fixed inset-0 z-100 flex items-center justify-center p-4" style="display:none" aria-modal="true" role="dialog">
    <div id="editTestimonialBackdrop" class="absolute inset-0 bg-black/50 backdrop-blur-sm transition-opacity duration-200 opacity-0"></div>
    <div id="editTestimonialDialog" class="relative admin-card rounded-2xl border shadow-2xl transition-all duration-200 opacity-0 overflow-hidden" style="width:100%;max-width:400px;transform:scale(0.95)">
        <div class="flex items-center justify-between px-5 py-4 border-b admin-border">
            <div class="flex items-center gap-3">
                <div class="size-8 rounded-lg bg-blue-500/15 flex items-center justify-center shrink-0">
                    <span class="material-symbols-outlined text-[18px] text-blue-400">rate_review</span>
                </div>
                <div>
                    <h3 class="text-[15px] font-semibold admin-text leading-tight">Edit Testimonial</h3>
                    <p class="text-xs admin-text-muted mt-0.5">Perbarui data testimoni</p>
                </div>
            </div>
            <button type="button" onclick="closeEditTestimonial()" aria-label="Tutup"
                class="flex items-center justify-center size-8 rounded-lg border-none bg-transparent cursor-pointer admin-text-muted admin-surface-hover transition-colors duration-150">
                <span class="material-symbols-outlined text-[20px]">close</span>
            </button>
        </div>
        <form id="editTestimonialForm" method="POST">
            @csrf
            @method('PUT')
            <div class="px-5 py-5 space-y-4">
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label for="editTestimonialName" class="block text-[13px] font-semibold admin-text-secondary mb-1.5">Nama <span class="text-red-400">*</span></label>
                        <input type="text" id="editTestimonialName" name="name" required
                            placeholder="Nama orang..."
                            class="w-full px-3.5 py-2.5 rounded-lg admin-input font-[inherit] text-sm outline-none transition-colors duration-200 focus:border-blue-500">
                    </div>
                    <div>
                        <label for="editTestimonialRole" class="block text-[13px] font-semibold admin-text-secondary mb-1.5">Role <span class="text-red-400">*</span></label>
                        <input type="text" id="editTestimonialRole" name="role" required
                            placeholder="CEO, Manager..."
                            class="w-full px-3.5 py-2.5 rounded-lg admin-input font-[inherit] text-sm outline-none transition-colors duration-200 focus:border-blue-500">
                    </div>
                </div>
                <div>
                    <label for="editTestimonialQuote" class="block text-[13px] font-semibold admin-text-secondary mb-1.5">Quote / Testimoni <span class="text-red-400">*</span></label>
                    <textarea id="editTestimonialQuote" name="quote" rows="4" required
                        placeholder="Isi testimoni..."
                        class="w-full px-3.5 py-2.5 rounded-lg admin-input font-[inherit] text-sm outline-none transition-colors duration-200 focus:border-blue-500 resize-none"></textarea>
                </div>
                <div>
                    <label for="editTestimonialRating" class="block text-[13px] font-semibold admin-text-secondary mb-1.5">Rating <span class="text-red-400">*</span></label>
                    <select id="editTestimonialRating" name="rating" required
                        class="px-3.5 py-2.5 rounded-lg admin-input font-[inherit] text-sm outline-none transition-colors duration-200 focus:border-blue-500 cursor-pointer" style="width:7rem">
                        <option value="5">5 &#9733;&#9733;&#9733;&#9733;&#9733;</option>
                        <option value="4">4 &#9733;&#9733;&#9733;&#9733;</option>
                        <option value="3">3 &#9733;&#9733;&#9733;</option>
                        <option value="2">2 &#9733;&#9733;</option>
                        <option value="1">1 &#9733;</option>
                    </select>
                </div>
            </div>
            <div class="flex justify-end gap-2 px-5 py-4 border-t admin-border">
                <button type="button" onclick="closeEditTestimonial()"
                    class="inline-flex items-center px-4 py-2 rounded-lg font-semibold text-sm admin-card admin-text border admin-border cursor-pointer transition-all duration-150 admin-surface-hover">
                    Batal
                </button>
                <button type="submit"
                    class="inline-flex items-center gap-1.5 px-4 py-2 rounded-lg font-semibold text-sm bg-blue-500 text-white border-none cursor-pointer transition-all duration-150 hover:bg-blue-600">
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
        var $modal = $('#' + modalId);
        var $backdrop = $('#' + backdropId);
        var $dialog = $('#' + dialogId);
        var busy = false;

        function open() {
            $modal.css('display', 'flex');
            $('body').css('overflow', 'hidden');

            requestAnimationFrame(function () {
                $backdrop.css('opacity', '1');
                $dialog.css({
                    opacity: '1',
                    transform: 'scale(1)'
                });
            });
        }

        function close() {
            if (busy) return;
            busy = true;

            $backdrop.css('opacity', '0');
            $dialog.css({
                opacity: '0',
                transform: 'scale(0.95)'
            });

            setTimeout(function () {
                $modal.css('display', 'none');
                $('body').css('overflow', '');
                busy = false;
            }, 200);
        }

        $backdrop.on('click', close);
        return { open: open, close: close, $modal: $modal };
    }

    var create = makeModal('createTestimonialModal', 'createTestimonialBackdrop', 'createTestimonialDialog');
    var edit = makeModal('editTestimonialModal', 'editTestimonialBackdrop', 'editTestimonialDialog');

    window.openCreateTestimonial = function () {
        create.open();
        $('#createTestimonialName').trigger('focus');
    };

    window.closeCreateTestimonial = create.close;

    window.openEditTestimonial = function (id, name, role, quote, rating) {
        $('#editTestimonialForm').attr('action', '/admin/testimonials/' + id);
        $('#editTestimonialName').val(name);
        $('#editTestimonialRole').val(role);
        $('#editTestimonialQuote').val(quote);
        $('#editTestimonialRating').val(rating);

        edit.open();
        $('#editTestimonialName').trigger('focus');
    };

    window.closeEditTestimonial = edit.close;

    $(function () {
        @if($errors->any() && old('_source') === 'create_testimonial')
        create.open();
        @endif

        $(document).on('keydown', function (e) {
            if (e.key !== 'Escape') return;
            if (edit.$modal.is(':visible')) window.closeEditTestimonial();
            if (create.$modal.is(':visible')) window.closeCreateTestimonial();
        });
    });
}(jQuery));
</script>
@endsection
