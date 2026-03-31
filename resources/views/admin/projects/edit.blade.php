@extends('layouts.admin')
@section('title', 'Edit Project')
@section('topbar-title', 'Edit Project')

@section('content')
<div class="mb-5">
    <a href="{{ route('admin.projects.index') }}" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg font-semibold text-[13px] admin-btn-secondary no-underline border-none cursor-pointer transition-all duration-150">
        <span class="material-symbols-outlined">arrow_back</span>
        Kembali
    </a>
</div>

<div class="flex items-center justify-between flex-wrap gap-4 mb-7 max-md:flex-col max-md:items-start">
    <h1 class="text-2xl font-bold">Edit Project</h1>
</div>

<div class="admin-card border rounded-xl overflow-hidden">
    <div class="p-5">
        <form method="POST" action="{{ route('admin.projects.update', $project) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-2 gap-4 max-md:grid-cols-1">
                <div class="mb-5">
                    <label for="name" class="block text-[13px] font-semibold admin-text-secondary mb-1.5">Nama Project *</label>
                    <input type="text" class="w-full px-3.5 py-2.5 rounded-lg admin-input font-[inherit] text-sm outline-none transition-colors duration-200 focus:border-blue-500" id="name" name="name" value="{{ old('name', $project->name) }}" required placeholder="Nama project...">
                    @error('name') <div class="text-xs text-red-400 mt-1">{{ $message }}</div> @enderror
                </div>
                <div class="mb-5">
                    <label for="category" class="block text-[13px] font-semibold admin-text-secondary mb-1.5">Kategori *</label>
                    <select class="w-full px-3.5 py-2.5 rounded-lg admin-input font-[inherit] text-sm outline-none transition-colors duration-200 focus:border-blue-500 cursor-pointer" id="category" name="category" required>
                        <option value="">Pilih kategori...</option>
                        @foreach(['software-development' => 'Software Development', 'digital-branding' => 'Digital Branding', 'startup-incubator' => 'Startup Incubator', 'it-consultant' => 'IT Consultant'] as $val => $label)
                        <option value="{{ $val }}" {{ old('category', $project->category) === $val ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                    @error('category') <div class="text-xs text-red-400 mt-1">{{ $message }}</div> @enderror
                </div>
            </div>

            {{-- Cover Image --}}
            <div class="mb-5">
                <label for="image" class="block text-[13px] font-semibold admin-text-secondary mb-1.5">
                    Gambar Cover <span class="text-xs font-normal admin-text-muted">(kosongkan jika tidak diubah)</span>
                </label>
                @if($project->image)
                <div class="mb-2 w-48 h-28 rounded-lg overflow-hidden border admin-border">
                    <img src="{{ asset('assets/img/projects/' . $project->image) }}" class="w-full h-full object-cover" alt="Cover">
                </div>
                @endif
                <input type="file" class="w-full px-3.5 py-2.5 rounded-lg admin-input font-[inherit] text-sm outline-none transition-colors duration-200 focus:border-blue-500" id="image" name="image" accept="image/*">
                @error('image') <div class="text-xs text-red-400 mt-1">{{ $message }}</div> @enderror
            </div>

            {{-- Gallery Images --}}
            <div class="mb-5">
                <label class="block text-[13px] font-semibold admin-text-secondary mb-1.5">
                    Galeri Foto
                    <span class="text-xs font-normal admin-text-muted">(bisa pilih beberapa sekaligus)</span>
                </label>

                @if($project->projectImages->count())
                <div class="mb-3">
                    <p class="text-xs admin-text-muted mb-2">Foto saat ini — centang untuk dihapus:</p>
                    <div class="flex flex-wrap gap-3">
                        @foreach($project->projectImages as $img)
                        <label class="relative cursor-pointer" style="width:100px;height:100px;flex-shrink:0;">
                            <input type="checkbox" name="delete_images[]" value="{{ $img->id }}" class="sr-only peer">
                            <div style="width:100px;height:100px;border-radius:10px;overflow:hidden;border:2px solid #3b82f6;transition:border-color 0.15s;" class="peer-checked:border-red-400!">
                                <img src="{{ asset('assets/img/projects/' . $img->image) }}" style="width:100%;height:100%;object-fit:cover;" alt="">
                            </div>
                            {{-- Delete overlay --}}
                            <div class="absolute inset-0 flex items-center justify-center pointer-events-none transition-all duration-150" style="border-radius:10px;">
                                <span class="material-symbols-outlined text-white drop-shadow peer-checked:opacity-100" style="font-size:40px;opacity:0;transition:opacity 0.15s;">delete</span>
                            </div>
                            <div class="absolute top-2 right-2 w-6 h-6 rounded-full bg-red-500 text-white items-center justify-center hidden peer-checked:flex pointer-events-none">
                                <span class="material-symbols-outlined" style="font-size:14px;">close</span>
                            </div>
                            {{-- Preview button (stops propagation so checkbox isn't toggled) --}}
                            <button type="button"
                                onclick="event.stopPropagation();event.preventDefault();openGalleryPreview('{{ asset('assets/img/projects/' . $img->image) }}');"
                                style="position:absolute;bottom:6px;left:6px;z-index:10;width:24px;height:24px;border-radius:6px;background:rgba(0,0,0,0.55);color:#e2e8f0;border:none;cursor:pointer;display:flex;align-items:center;justify-content:center;">
                                <span class="material-symbols-outlined" style="font-size:15px;">visibility</span>
                            </button>
                        </label>
                        @endforeach
                    </div>
                </div>
                @endif

                <div id="gallery-preview" class="flex flex-wrap gap-3 mb-3"></div>
                <input type="file" id="gallery_images" name="gallery_images[]" accept="image/*" multiple
                    class="w-full px-3.5 py-2.5 rounded-lg admin-input font-[inherit] text-sm outline-none transition-colors duration-200 focus:border-blue-500">
                @error('gallery_images.*') <div class="text-xs text-red-400 mt-1">{{ $message }}</div> @enderror
            </div>

            <div class="mb-5">
                <label for="description" class="block text-[13px] font-semibold admin-text-secondary mb-1.5">Deskripsi *</label>
                <textarea class="w-full px-3.5 py-2.5 rounded-lg admin-input font-[inherit] text-sm outline-none transition-colors duration-200 focus:border-blue-500 resize-y min-h-[100px]" id="description" name="description" required placeholder="Deskripsi singkat project...">{{ old('description', $project->description) }}</textarea>
                @error('description') <div class="text-xs text-red-400 mt-1">{{ $message }}</div> @enderror
            </div>

            <div class="mb-5">
                <label for="hero_description" class="block text-[13px] font-semibold admin-text-secondary mb-1.5">Hero Description</label>
                <textarea class="w-full px-3.5 py-2.5 rounded-lg admin-input font-[inherit] text-sm outline-none transition-colors duration-200 focus:border-blue-500 resize-y min-h-[100px]" id="hero_description" name="hero_description" placeholder="Deskripsi untuk hero section...">{{ old('hero_description', $project->hero_description) }}</textarea>
                @error('hero_description') <div class="text-xs text-red-400 mt-1">{{ $message }}</div> @enderror
            </div>

            <div class="mb-5">
                <label for="summary_title" class="block text-[13px] font-semibold admin-text-secondary mb-1.5">Summary Title</label>
                <input type="text" class="w-full px-3.5 py-2.5 rounded-lg admin-input font-[inherit] text-sm outline-none transition-colors duration-200 focus:border-blue-500" id="summary_title" name="summary_title" value="{{ old('summary_title', $project->summary_title) }}" placeholder="Judul ringkasan...">
                @error('summary_title') <div class="text-xs text-red-400 mt-1">{{ $message }}</div> @enderror
            </div>

            <div class="mb-5">
                <label for="content" class="block text-[13px] font-semibold admin-text-secondary mb-1.5">Konten Detail</label>
                <textarea id="content" name="content">{{ old('content', $project->content) }}</textarea>
                @error('content') <div class="text-xs text-red-400 mt-1">{{ $message }}</div> @enderror
            </div>

            <div class="flex gap-2.5 pt-2">
                <button type="submit" class="inline-flex items-center gap-1.5 px-4 py-2 rounded-lg font-semibold text-sm bg-blue-500 text-white no-underline border-none cursor-pointer transition-all duration-150 hover:bg-blue-600">
                    <span class="material-symbols-outlined">save</span>
                    Update
                </button>
                <a href="{{ route('admin.projects.index') }}" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg font-semibold text-[13px] admin-btn-secondary no-underline border-none cursor-pointer transition-all duration-150">Batal</a>
            </div>
        </form>
    </div>
</div>

{{-- Gallery Image Preview Modal --}}
<div id="gallery-img-modal"
    style="display:none; position:fixed; inset:0; z-index:9999; align-items:center; justify-content:center; padding:1.5rem;">
    <div id="gallery-img-backdrop" style="position:absolute; inset:0; background:rgba(0,0,0,0.88);"></div>
    <div style="position:relative; z-index:1; display:flex; flex-direction:column; border-radius:16px; overflow:hidden; box-shadow:0 25px 60px rgba(0,0,0,0.6); background:var(--admin-card-bg); width:min(90vw,860px);">
        {{-- Header --}}
        <div class="admin-border" style="display:flex; align-items:center; justify-content:space-between; gap:0.75rem; padding:0.75rem 1.25rem; border-bottom-width:1px; border-bottom-style:solid; flex-shrink:0;">
            <span style="font-size:14px; font-weight:600; display:flex; align-items:center; gap:7px;">
                <span class="material-symbols-outlined" style="font-size:17px; color:#60a5fa;">photo</span>
                Preview Gambar
            </span>
            <div style="display:flex; align-items:center; gap:5px;">
                <button id="gallery-zoom-out" type="button" title="Zoom Out"
                    style="display:inline-flex; align-items:center; justify-content:center; width:28px; height:28px; border-radius:7px; background:rgba(100,116,139,0.15); color:#94a3b8; border:none; cursor:pointer;">
                    <span class="material-symbols-outlined" style="font-size:17px;">zoom_out</span>
                </button>
                <span id="gallery-zoom-pct"
                    style="font-size:12px; font-weight:700; color:#cbd5e1; min-width:42px; text-align:center; background:rgba(100,116,139,0.12); border-radius:6px; padding:3px 6px;">
                    100%
                </span>
                <button id="gallery-zoom-in" type="button" title="Zoom In"
                    style="display:inline-flex; align-items:center; justify-content:center; width:28px; height:28px; border-radius:7px; background:rgba(100,116,139,0.15); color:#94a3b8; border:none; cursor:pointer;">
                    <span class="material-symbols-outlined" style="font-size:17px;">zoom_in</span>
                </button>
                <button id="gallery-zoom-reset" type="button" title="Reset Zoom"
                    style="display:inline-flex; align-items:center; justify-content:center; width:28px; height:28px; border-radius:7px; background:rgba(100,116,139,0.15); color:#94a3b8; border:none; cursor:pointer;">
                    <span class="material-symbols-outlined" style="font-size:17px;">fit_screen</span>
                </button>
                <div style="width:1px; height:16px; background:rgba(100,116,139,0.25); margin:0 3px;"></div>
                <button id="gallery-img-close" type="button" title="Tutup"
                    style="display:inline-flex; align-items:center; justify-content:center; width:28px; height:28px; border-radius:7px; background:rgba(100,116,139,0.15); color:#94a3b8; border:none; cursor:pointer;">
                    <span class="material-symbols-outlined" style="font-size:18px;">close</span>
                </button>
            </div>
        </div>
        {{-- Image area --}}
        <div id="gallery-img-container"
            style="overflow:hidden; background:#0a0f1e; display:flex; align-items:center; justify-content:center; height:72vh; cursor:default; position:relative;">
            <img id="gallery-img-preview" src="" alt="Preview"
                style="max-width:100%; max-height:100%; object-fit:contain; display:block; transform-origin:center center; will-change:transform; user-select:none; -webkit-user-drag:none; pointer-events:none;">
            {{-- Hint bar --}}
            <div style="position:absolute; bottom:0; left:0; right:0; padding:6px 14px; background:rgba(0,0,0,0.5); display:flex; align-items:center; justify-content:center; gap:14px; pointer-events:none;">
                <span style="font-size:11px; color:rgba(255,255,255,0.45); display:flex; align-items:center; gap:4px;">
                    <span class="material-symbols-outlined" style="font-size:13px;">scroll</span> Scroll untuk zoom
                </span>
                <span style="color:rgba(255,255,255,0.2); font-size:11px;">·</span>
                <span style="font-size:11px; color:rgba(255,255,255,0.45); display:flex; align-items:center; gap:4px;">
                    <span class="material-symbols-outlined" style="font-size:13px;">pan_tool</span> Drag untuk geser
                </span>
                <span style="color:rgba(255,255,255,0.2); font-size:11px;">·</span>
                <span style="font-size:11px; color:rgba(255,255,255,0.45);">Dbl-klik untuk reset</span>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
<script>
function CkImageUploadAdapter(loader) {
    this.loader = loader;
    this.uploadUrl = '{{ route('admin.upload.image') }}';
    this.csrfToken = '{{ csrf_token() }}';
}
CkImageUploadAdapter.prototype.upload = function () {
    var self = this;
    return self.loader.file.then(function (file) {
        return new Promise(function (resolve, reject) {
            var data = new FormData();
            data.append('upload', file);
            $.ajax({
                url: self.uploadUrl,
                method: 'POST',
                headers: { 'X-CSRF-TOKEN': self.csrfToken },
                data: data,
                processData: false,
                contentType: false
            })
            .done(function (res) {
                if (res.url) { resolve({ default: res.url }); }
                else { reject(res.error || 'Upload gagal'); }
            })
            .fail(function (xhr) {
                reject((xhr.responseJSON || {}).error || 'Upload gagal');
            });
        });
    });
};
CkImageUploadAdapter.prototype.abort = function () {};

function CkImageUploadPlugin(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function (loader) {
        return new CkImageUploadAdapter(loader);
    };
}

ClassicEditor
    .create($('#content')[0], {
        extraPlugins: [CkImageUploadPlugin],
        toolbar: [
            'heading', '|',
            'bold', 'italic', '|',
            'link', 'bulletedList', 'numberedList', '|',
            'blockQuote', 'insertTable', '|',
            'uploadImage', '|',
            'outdent', 'indent', '|',
            'undo', 'redo'
        ],
        heading: {
            options: [
                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
            ]
        }
    })
    .then(function (editor) {
        window._contentEditor = editor;
        $('form').first().on('submit', function () {
            $('#content').val(editor.getData());
        });
    })
    .catch(function (err) { console.error(err); });

$(function () {
    // ── Gallery thumbnail preview (new uploads) ──────────────────
    $('#gallery_images').on('change', function () {
        var $preview = $('#gallery-preview');
        $preview.empty();
        var files = this.files;
        for (var i = 0; i < files.length; i++) {
            (function (file) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    var src = e.target.result;
                    var $div = $('<div>').css({
                        width: '100px', height: '100px', borderRadius: '10px',
                        overflow: 'hidden', border: '2px solid #3b82f6',
                        flexShrink: '0', cursor: 'pointer'
                    }).on('click', function () { openGalleryPreview(src); });
                    $div.append($('<img>').attr('src', src).css({ width: '100%', height: '100%', objectFit: 'cover' }));
                    $preview.append($div);
                };
                reader.readAsDataURL(file);
            })(files[i]);
        }
    });

    // ── Toggle delete overlay for existing gallery images ────────
    $(document).on('change', 'input[name="delete_images[]"]', function () {
        var $label = $(this).closest('label');
        var $icon = $label.find('.material-symbols-outlined').filter(function () {
            return $(this).css('font-size') === '40px';
        });
        $icon.css('opacity', this.checked ? '1' : '0');
    });

    // ── Gallery image preview modal with zoom & pan ───────────────
    var scale = 1, ox = 0, oy = 0;
    var dragging = false, startX, startY, startOx, startOy;

    function applyTransform() {
        $('#gallery-img-preview').css('transform',
            'translate(' + ox + 'px,' + oy + 'px) scale(' + scale + ')');
        $('#gallery-img-container').css('cursor', scale > 1 ? 'grab' : 'default');
        $('#gallery-zoom-pct').text(Math.round(scale * 100) + '%');
        $('#gallery-zoom-out').css('opacity', scale <= 0.5 ? '0.35' : '1');
        $('#gallery-zoom-in').css('opacity', scale >= 5 ? '0.35' : '1');
    }

    function resetZoom() { scale = 1; ox = 0; oy = 0; applyTransform(); }

    window.openGalleryPreview = function (src) {
        resetZoom();
        $('#gallery-img-preview').attr('src', src);
        $('#gallery-img-modal').css('display', 'flex');
        $('body').css('overflow', 'hidden');
    };

    function closeGalleryPreview() {
        $('#gallery-img-modal').css('display', 'none');
        $('#gallery-img-preview').attr('src', '');
        $('body').css('overflow', '');
        resetZoom();
    }

    $('#gallery-img-close, #gallery-img-backdrop').on('click', closeGalleryPreview);
    $('#gallery-zoom-reset').on('click', resetZoom);
    $('#gallery-zoom-in').on('click', function () {
        scale = Math.min(5, scale * 1.25);
        applyTransform();
    });
    $('#gallery-zoom-out').on('click', function () {
        scale = Math.max(0.5, scale / 1.25);
        if (scale <= 1) { ox = 0; oy = 0; }
        applyTransform();
    });
    $(document).on('keydown', function (e) {
        if (e.key === 'Escape') closeGalleryPreview();
        if ($('#gallery-img-modal').css('display') === 'none') return;
        if (e.key === '+' || e.key === '=') { scale = Math.min(5, scale * 1.25); applyTransform(); }
        if (e.key === '-') { scale = Math.max(0.5, scale / 1.25); if (scale <= 1) { ox = 0; oy = 0; } applyTransform(); }
        if (e.key === '0') resetZoom();
    });

    // Scroll to zoom
    $('#gallery-img-container').on('wheel', function (e) {
        e.preventDefault();
        var delta = e.originalEvent.deltaY > 0 ? 0.85 : 1.18;
        scale = Math.min(5, Math.max(0.5, scale * delta));
        applyTransform();
    });

    // Drag to pan
    $('#gallery-img-container').on('mousedown', function (e) {
        if (scale <= 1) return;
        dragging = true;
        startX = e.clientX; startY = e.clientY;
        startOx = ox; startOy = oy;
        $(this).css('cursor', 'grabbing');
        e.preventDefault();
    });
    $(document).on('mousemove', function (e) {
        if (!dragging) return;
        ox = startOx + (e.clientX - startX);
        oy = startOy + (e.clientY - startY);
        applyTransform();
    });
    $(document).on('mouseup', function () {
        if (!dragging) return;
        dragging = false;
        $('#gallery-img-container').css('cursor', scale > 1 ? 'grab' : 'default');
    });

    // Double-click to reset zoom
    $('#gallery-img-container').on('dblclick', resetZoom);
});
</script>
<style>
.ck-editor__editable { min-height: 280px; }
#gallery-img-preview { transition: transform 0.05s linear; }
</style>
@endsection
