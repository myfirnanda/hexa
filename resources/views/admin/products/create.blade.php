@extends('layouts.admin')
@section('title', 'Tambah Produk')
@section('topbar-title', 'Tambah Produk')

@section('content')
<div class="mb-5">
    <a href="{{ route('admin.products.index') }}" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg font-semibold text-[13px] admin-btn-secondary no-underline border-none cursor-pointer transition-all duration-150">
        <span class="material-symbols-outlined">arrow_back</span>
        Kembali
    </a>
</div>

<div class="flex items-center justify-between flex-wrap gap-4 mb-7 max-md:flex-col max-md:items-start">
    <h1 class="text-2xl font-bold admin-text">Tambah Produk Baru</h1>
</div>

{{-- Server-side validation errors --}}
@if($errors->any())
<div class="mb-6 p-4 rounded-xl bg-red-500/10 border border-red-500/20">
    <div class="flex items-start gap-2.5">
        <span class="material-symbols-outlined text-red-400 mt-0.5" style="font-size:18px;">error</span>
        <div class="flex-1">
            <p class="text-sm font-semibold text-red-400 mb-1.5">Terdapat kesalahan pada form:</p>
            <ul class="text-[13px] text-red-400/90 space-y-0.5 list-disc pl-4">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endif

{{-- Client-side validation errors --}}
<div id="client-errors" class="mb-6 p-4 rounded-xl bg-red-500/10 border border-red-500/20" style="display:none;">
    <div class="flex items-start gap-2.5">
        <span class="material-symbols-outlined text-red-400 mt-0.5" style="font-size:18px;">error</span>
        <div class="flex-1">
            <p class="text-sm font-semibold text-red-400 mb-1.5">Terdapat kesalahan pada form:</p>
            <ul id="client-errors-list" class="text-[13px] text-red-400/90 space-y-0.5 list-disc pl-4"></ul>
        </div>
    </div>
</div>

<form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data" id="productForm">
    @csrf

    {{-- Basic Info --}}
    <div class="admin-card border rounded-xl overflow-hidden mb-6">
        <div class="px-5 py-4 border-b admin-border">
            <h2 class="text-[15px] font-semibold admin-text">Informasi Dasar</h2>
        </div>
        <div class="p-5 space-y-5">
            <div>
                <label for="name" class="block text-[13px] font-semibold admin-text-secondary mb-1.5">Nama Produk <span class="text-red-500">*</span></label>
                <input type="text" class="w-full px-3.5 py-2.5 rounded-lg admin-input font-[inherit] text-sm outline-none transition-colors duration-200 focus:border-blue-500" id="name" name="name" value="{{ old('name') }}" required placeholder="Nama produk...">
                @error('name') <div class="text-xs text-red-400 mt-1">{{ $message }}</div> @enderror
            </div>
            <div>
                <label for="description" class="block text-[13px] font-semibold admin-text-secondary mb-1.5">Deskripsi</label>
                <textarea class="w-full px-3.5 py-2.5 rounded-lg admin-input font-[inherit] text-sm outline-none transition-colors duration-200 focus:border-blue-500 resize-y" style="min-height: 120px" id="description" name="description" placeholder="Deskripsi singkat produk...">{{ old('description') }}</textarea>
                @error('description') <div class="text-xs text-red-400 mt-1">{{ $message }}</div> @enderror
            </div>
        </div>
    </div>

    {{-- Images --}}
    <div class="admin-card border rounded-xl overflow-hidden mb-6">
        <div class="px-5 py-4 border-b admin-border">
            <h2 class="text-[15px] font-semibold admin-text">Gambar</h2>
        </div>
        <div class="p-5 space-y-5">
            <div>
                <label for="image_cover" class="block text-[13px] font-semibold admin-text-secondary mb-1.5">Gambar Cover</label>
                <div id="cover-preview" class="mb-3"></div>
                <input type="file" class="w-full px-3.5 py-2.5 rounded-lg admin-input font-[inherit] text-sm outline-none transition-colors duration-200 focus:border-blue-500" id="image_cover" name="image_cover" accept="image/*">
                @error('image_cover') <div class="text-xs text-red-400 mt-1">{{ $message }}</div> @enderror
            </div>
            <div>
                <label for="gallery_images" class="block text-[13px] font-semibold admin-text-secondary mb-1.5">
                    Galeri Foto <span class="text-xs font-normal admin-text-muted">(opsional, bisa pilih beberapa sekaligus)</span>
                </label>
                <div id="gallery-preview" class="flex flex-wrap gap-3 mb-3"></div>
                <input type="file" id="gallery_images" name="gallery_images[]" accept="image/*" multiple
                    class="w-full px-3.5 py-2.5 rounded-lg admin-input font-[inherit] text-sm outline-none transition-colors duration-200 focus:border-blue-500">
                @error('gallery_images.*') <div class="text-xs text-red-400 mt-1">{{ $message }}</div> @enderror
            </div>
        </div>
    </div>

    {{-- Features --}}
    <div class="admin-card border rounded-xl overflow-hidden mb-6">
        <div class="px-5 py-4 border-b admin-border flex items-center justify-between flex-wrap gap-3">
            <div class="flex items-center gap-2.5">
                <h2 class="text-[15px] font-semibold admin-text">Features</h2>
                <span id="feature-counter" class="text-xs font-semibold px-2 py-0.5 rounded-full bg-blue-500/12 text-blue-400">0</span>
            </div>
            <select id="featureCountSelect" class="px-3 py-2 rounded-lg admin-input font-[inherit] text-sm outline-none transition-colors duration-200 focus:border-blue-500 min-w-[180px]">
                <option value="" disabled selected>Pilih jumlah feature</option>
                <option value="3">3 Features</option>
                <option value="6">6 Features</option>
            </select>
        </div>
        <div class="p-5">
            @if($errors->has('features') || $errors->has('features.*'))
            <div class="mb-4 p-3 rounded-lg bg-red-500/10 border border-red-500/20 text-[13px] text-red-400">
                <span class="material-symbols-outlined align-middle mr-1" style="font-size:15px;">warning</span>
                {{ $errors->first('features') ?: 'Terdapat kesalahan pada data features.' }}
            </div>
            @endif
            <div id="features-container"></div>
            <p id="no-features-msg" class="text-sm admin-text-muted text-center py-4">
                <span class="material-symbols-outlined block mx-auto mb-1 opacity-40" style="font-size:28px;">format_list_bulleted</span>
                Pilih jumlah feature untuk memulai.<br>
                <span class="text-xs">Setiap feature memiliki 3 items yang wajib diisi.</span>
            </p>
        </div>
    </div>

    {{-- Benefits --}}
    <div class="admin-card border rounded-xl overflow-hidden mb-6">
        <div class="px-5 py-4 border-b admin-border flex items-center justify-between">
            <div class="flex items-center gap-2.5">
                <h2 class="text-[15px] font-semibold admin-text">Benefits</h2>
                <span id="benefit-counter" class="text-xs font-semibold px-2 py-0.5 rounded-full bg-blue-500/12 text-blue-400">0 / 4</span>
            </div>
            <button type="button" id="addBenefitBtn" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg font-semibold text-[13px] bg-blue-500 text-white border-none cursor-pointer transition-all duration-150 hover:bg-blue-600">
                <span class="material-symbols-outlined" style="font-size:16px;">add</span>
                Tambah Benefit
            </button>
        </div>
        <div class="p-5">
            @if($errors->has('benefits') || $errors->has('benefits.*'))
            <div class="mb-4 p-3 rounded-lg bg-red-500/10 border border-red-500/20 text-[13px] text-red-400">
                <span class="material-symbols-outlined align-middle mr-1" style="font-size:15px;">warning</span>
                {{ $errors->first('benefits') ?: 'Terdapat kesalahan pada data benefits.' }}
            </div>
            @endif
            <div id="benefits-container"></div>
            <p id="no-benefits-msg" class="text-sm admin-text-muted text-center py-4">
                <span class="material-symbols-outlined block mx-auto mb-1 opacity-40" style="font-size:28px;">star</span>
                Tepat 4 benefits harus ditambahkan.<br>
                <span class="text-xs">Klik "Tambah Benefit" untuk memulai.</span>
            </p>
        </div>
    </div>

    {{-- Submit --}}
    <div class="flex gap-2.5 pt-5 pb-2">
        <button type="submit" class="inline-flex items-center gap-1.5 px-4 py-2 rounded-lg font-semibold text-sm bg-blue-500 text-white no-underline border-none cursor-pointer transition-all duration-150 hover:bg-blue-600">
            <span class="material-symbols-outlined">save</span>
            Simpan
        </button>
        <a href="{{ route('admin.products.index') }}" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg font-semibold text-[13px] admin-btn-secondary no-underline border-none cursor-pointer transition-all duration-150">Batal</a>
    </div>
</form>

{{-- Gallery Image Preview Modal --}}
<div id="gallery-img-modal"
    style="display:none; position:fixed; inset:0; z-index:9999; align-items:center; justify-content:center; padding:1.5rem;">
    <div id="gallery-img-backdrop" style="position:absolute; inset:0; background:rgba(0,0,0,0.88);"></div>
    <div style="position:relative; z-index:1; display:flex; flex-direction:column; border-radius:16px; overflow:hidden; box-shadow:0 25px 60px rgba(0,0,0,0.6); background:var(--admin-card-bg); width:min(90vw,860px);">
        <div class="admin-border" style="display:flex; align-items:center; justify-content:space-between; gap:0.75rem; padding:0.75rem 1.25rem; border-bottom-width:1px; border-bottom-style:solid; flex-shrink:0;">
            <span style="font-size:14px; font-weight:600; display:flex; align-items:center; gap:7px;">
                <span class="material-symbols-outlined" style="font-size:17px; color:#60a5fa;">photo</span>
                Preview Gambar
            </span>
            <div style="display:flex; align-items:center; gap:5px;">
                <button id="gallery-zoom-out" type="button" title="Zoom Out" style="display:inline-flex; align-items:center; justify-content:center; width:28px; height:28px; border-radius:7px; background:rgba(100,116,139,0.15); color:#94a3b8; border:none; cursor:pointer;">
                    <span class="material-symbols-outlined" style="font-size:17px;">zoom_out</span>
                </button>
                <span id="gallery-zoom-pct" style="font-size:12px; font-weight:700; color:#cbd5e1; min-width:42px; text-align:center; background:rgba(100,116,139,0.12); border-radius:6px; padding:3px 6px;">100%</span>
                <button id="gallery-zoom-in" type="button" title="Zoom In" style="display:inline-flex; align-items:center; justify-content:center; width:28px; height:28px; border-radius:7px; background:rgba(100,116,139,0.15); color:#94a3b8; border:none; cursor:pointer;">
                    <span class="material-symbols-outlined" style="font-size:17px;">zoom_in</span>
                </button>
                <button id="gallery-zoom-reset" type="button" title="Reset Zoom" style="display:inline-flex; align-items:center; justify-content:center; width:28px; height:28px; border-radius:7px; background:rgba(100,116,139,0.15); color:#94a3b8; border:none; cursor:pointer;">
                    <span class="material-symbols-outlined" style="font-size:17px;">fit_screen</span>
                </button>
                <div style="width:1px; height:16px; background:rgba(100,116,139,0.25); margin:0 3px;"></div>
                <button id="gallery-img-close" type="button" title="Tutup" style="display:inline-flex; align-items:center; justify-content:center; width:28px; height:28px; border-radius:7px; background:rgba(100,116,139,0.15); color:#94a3b8; border:none; cursor:pointer;">
                    <span class="material-symbols-outlined" style="font-size:18px;">close</span>
                </button>
            </div>
        </div>
        <div id="gallery-img-container" style="overflow:hidden; background:#0a0f1e; display:flex; align-items:center; justify-content:center; height:72vh; cursor:default; position:relative;">
            <img id="gallery-img-preview" src="" alt="Preview" style="max-width:100%; max-height:100%; object-fit:contain; display:block; transform-origin:center center; will-change:transform; user-select:none; -webkit-user-drag:none; pointer-events:none;">
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

{{-- Icon Picker Modal --}}
@include('admin.products._icon-picker')
@endsection

@section('scripts')
<script>
$(function () {
    // ══════════════════════════════════════════════════════════════
    // Constants
    // ══════════════════════════════════════════════════════════════
    var ITEMS_PER_FEATURE = 3;
    var MAX_BENEFITS = 4, MIN_BENEFITS = 4;
    var featuresCreated = false;
    var benefitIndex = 0;

    // ══════════════════════════════════════════════════════════════
    // Material Symbols icon list
    // ══════════════════════════════════════════════════════════════
    var materialIcons = [
        'home','search','menu','settings','close','check','add','remove','delete','edit','save','send','share',
        'download','upload','refresh','sync','undo','redo','content_copy','print','archive','logout','login',
        'arrow_back','arrow_forward','expand_more','expand_less','chevron_left','chevron_right','more_vert',
        'more_horiz','apps','fullscreen','open_in_new','launch','sort','filter_list','swap_vert',
        'add_circle','remove_circle','check_circle','cancel','info','help','warning','error','flag',
        'bookmark','label','push_pin','link','visibility','visibility_off','done','done_all','pending',
        'email','mail','phone','call','chat','message','sms','forum','notifications','campaign',
        'contact_mail','contact_phone','mark_email_read','drafts','inbox','outbox',
        'person','group','people','public','thumb_up','thumb_down','mood','school','work','badge',
        'diversity_3','groups','face','sentiment_satisfied','emoji_people','handshake',
        'business','store','storefront','shopping_cart','shopping_bag','payments','credit_card',
        'receipt','receipt_long','account_balance','account_balance_wallet','savings','paid','sell',
        'point_of_sale','currency_exchange','attach_money','money','price_check','price_change',
        'bar_chart','pie_chart','show_chart','timeline','trending_up','trending_down','analytics',
        'insights','leaderboard','query_stats','monitoring','data_usage','donut_large','ssid_chart',
        'smartphone','tablet_mac','laptop','laptop_mac','desktop_windows','tv','watch','memory',
        'storage','wifi','bluetooth','nfc','usb','sd_card','battery_full','signal_cellular_4_bar',
        'image','photo_camera','videocam','movie','music_note','audiotrack','mic','headphones',
        'speaker','volume_up','volume_off','play_arrow','pause','stop','skip_next','camera',
        'folder','folder_open','upload_file','description','article','newspaper','picture_as_pdf',
        'note','note_add','topic','inventory_2','snippet_folder','source','file_copy',
        'place','my_location','map','navigation','near_me','directions','directions_car',
        'local_shipping','flight','flight_takeoff','restaurant','hotel','local_cafe',
        'local_hospital','explore','travel_explore','language','translate','public',
        'cloud','cloud_upload','cloud_download','sunny','dark_mode','light_mode','eco','park',
        'water_drop','bolt','thunderstorm','air','forest','grass','wb_sunny','nights_stay',
        'science','rocket_launch','rocket','code','terminal','api','data_object','developer_mode',
        'bug_report','build','construction','engineering','precision_manufacturing','handyman',
        'security','shield','lock','lock_open','key','password','admin_panel_settings',
        'verified_user','privacy_tip','gpp_good','policy','health_and_safety','vpn_key',
        'auto_stories','menu_book','library_books','calculate','psychology','neurology','biotech',
        'favorite','heart_check','medical_services','healing','fitness_center','self_improvement',
        'sports','sports_soccer','sports_esports','sports_martial_arts','pool','hiking',
        'palette','brush','draw','design_services','auto_fix_high','filter','tune','format_paint',
        'gradient','texture','animation','auto_awesome','magic_button','blur_on','flare',
        'dashboard','grid_view','view_list','view_module','table_chart','calendar_today','event',
        'task','checklist','assignment','list_alt','view_quilt','space_dashboard',
        'star','circle','hexagon','diamond','change_history','category','interests','extension',
        'widgets','token','shapes','square','pentagon','ac_unit',
        'lightbulb','emoji_objects','celebration','cake','redeem','local_fire_department',
        'workspace_premium','military_tech','verified','new_releases','speed','bolt',
        'inventory','package_2','deployed_code','support_agent','contact_support','live_help',
        'corporate_fare','domain','apartment','location_city','real_estate_agent','cottage',
        'qr_code','fingerprint','face','sensor_door','smart_toy','robot','toys',
        'local_atm','account_tree','hub','mediation','device_hub','cast','cast_connected',
        'attach_file','text_snippet','rule','gavel','balance','scale',
        'vaccines','medication','monitor_heart','bloodtype','emergency',
        'compost','recycling','energy_savings_leaf','nest_eco_leaf','nature','spa',
        'volunteer_activism','loyalty','card_giftcard','military_tech','trophy'
    ];

    // ══════════════════════════════════════════════════════════════
    // Icon Picker
    // ══════════════════════════════════════════════════════════════
    var iconPickerTarget = null; // The .icon-picker-wrap element

    function renderIconGrid(filter) {
        var $grid = $('#icon-grid');
        $grid.empty();
        filter = (filter || '').toLowerCase().trim();
        var filtered = materialIcons.filter(function (name) {
            return !filter || name.replace(/_/g, ' ').indexOf(filter) !== -1 || name.indexOf(filter) !== -1;
        });
        // Remove duplicates
        var seen = {};
        filtered = filtered.filter(function(n) { if (seen[n]) return false; seen[n] = true; return true; });

        if (filtered.length === 0) {
            $('#icon-no-results').show();
            $('#icon-search-count').text('');
            return;
        }
        $('#icon-no-results').hide();
        $('#icon-search-count').text(filtered.length + ' icon ditemukan');

        var currentVal = iconPickerTarget ? iconPickerTarget.find('.icon-value').val() : '';
        filtered.forEach(function (name) {
            var isActive = name === currentVal;
            var $item = $('<div>').addClass('icon-picker-item').attr('data-name', name)
                .css({
                    display: 'flex', flexDirection: 'column', alignItems: 'center', justifyContent: 'center',
                    padding: '8px 4px', borderRadius: '10px', cursor: 'pointer', border: '2px solid transparent',
                    transition: 'all 0.15s', textAlign: 'center', minHeight: '68px',
                    background: isActive ? 'rgba(59,130,246,0.15)' : 'rgba(100,116,139,0.06)',
                    borderColor: isActive ? '#3b82f6' : 'transparent'
                })
                .on('mouseenter', function () {
                    if (!isActive) $(this).css({ background: 'rgba(100,116,139,0.12)', borderColor: 'rgba(100,116,139,0.2)' });
                })
                .on('mouseleave', function () {
                    if (!isActive) $(this).css({ background: 'rgba(100,116,139,0.06)', borderColor: 'transparent' });
                })
                .on('click', function () { selectIconValue(name); });

            $item.append($('<span>').addClass('material-symbols-outlined').css({ fontSize: '24px', marginBottom: '3px' }).addClass(isActive ? 'text-blue-400' : 'admin-text-secondary').text(name));
            $item.append($('<span>').css({ fontSize: '9px', lineHeight: '1.2', wordBreak: 'break-all', opacity: '0.6' }).addClass('admin-text-secondary').text(name.replace(/_/g, ' ')));
            $grid.append($item);
        });
    }

    window.openIconPicker = function (wrapEl) {
        iconPickerTarget = $(wrapEl);
        $('#icon-search').val('');
        renderIconGrid('');
        $('#icon-picker-modal').css('display', 'flex');
        $('body').css('overflow', 'hidden');
        setTimeout(function () { $('#icon-search').focus(); }, 100);
    };

    window.closeIconPicker = function () {
        $('#icon-picker-modal').css('display', 'none');
        $('body').css('overflow', '');
        iconPickerTarget = null;
    };

    window.selectIconValue = function (name) {
        if (!iconPickerTarget) return;
        iconPickerTarget.find('.icon-value').val(name);
        iconPickerTarget.find('.icon-preview').text(name).css({ color: '#60a5fa', fontSize: '22px' });
        iconPickerTarget.find('.icon-name-label').text(name.replace(/_/g, ' '));
        iconPickerTarget.find('.icon-picker-btn').css({ borderColor: '#3b82f6', background: 'rgba(59,130,246,0.08)' });
        closeIconPicker();
    };

    window.clearIconSelection = function () {
        if (!iconPickerTarget) return;
        iconPickerTarget.find('.icon-value').val('');
        iconPickerTarget.find('.icon-preview').text('add_circle').css({ color: '', fontSize: '' });
        iconPickerTarget.find('.icon-name-label').text('Pilih icon...');
        iconPickerTarget.find('.icon-picker-btn').css({ borderColor: '', background: '' });
        renderIconGrid($('#icon-search').val());
    };

    $('#icon-search').on('input', function () { renderIconGrid($(this).val()); });
    $('#icon-picker-backdrop').on('click', function () { closeIconPicker(); });
    $(document).on('keydown', function (e) {
        if (e.key === 'Escape' && $('#icon-picker-modal').css('display') !== 'none') closeIconPicker();
    });

    // ══════════════════════════════════════════════════════════════
    // Gallery thumbnail preview (new uploads) with DataTransfer
    // ══════════════════════════════════════════════════════════════
    var galleryFiles = [];

    function rebuildGalleryInput() {
        var dt = new DataTransfer();
        galleryFiles.forEach(function (f) { dt.items.add(f); });
        document.getElementById('gallery_images').files = dt.files;
    }

    function renderGalleryPreviews() {
        var $preview = $('#gallery-preview');
        $preview.empty();
        galleryFiles.forEach(function (file, idx) {
            (function (f, i) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    var src = e.target.result;
                    var $wrap = $('<div>').css({ position: 'relative', width: '100px', height: '100px', flexShrink: '0' });
                    var $img = $('<div>').css({
                        width: '100px', height: '100px', borderRadius: '10px',
                        overflow: 'hidden', border: '2px solid #3b82f6', cursor: 'pointer'
                    }).on('click', function () { openGalleryPreview(src); });
                    $img.append($('<img>').attr('src', src).css({ width: '100%', height: '100%', objectFit: 'cover' }));
                    var $del = $('<button type="button">').html('<span class="material-symbols-outlined" style="font-size:14px;">close</span>')
                        .css({
                            position: 'absolute', top: '-8px', right: '-8px', zIndex: 10,
                            width: '20px', height: '20px', borderRadius: '50%',
                            background: '#ef4444', color: 'white', border: 'none',
                            cursor: 'pointer', display: 'flex', alignItems: 'center',
                            justifyContent: 'center', boxShadow: '0 2px 4px rgba(0,0,0,0.3)'
                        }).attr('title', 'Hapus gambar').on('click', function () {
                            galleryFiles.splice(i, 1);
                            rebuildGalleryInput();
                            renderGalleryPreviews();
                        });
                    $wrap.append($img).append($del);
                    $preview.append($wrap);
                };
                reader.readAsDataURL(f);
            })(file, idx);
        });
    }

    $('#gallery_images').on('change', function () {
        var newFiles = Array.from(this.files);
        newFiles.forEach(function (f) { galleryFiles.push(f); });
        rebuildGalleryInput();
        renderGalleryPreviews();
    });

    // ══════════════════════════════════════════════════════════════
    // Cover image preview
    // ══════════════════════════════════════════════════════════════
    $('#image_cover').on('change', function () {
        var $preview = $('#cover-preview');
        $preview.empty();
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                var src = e.target.result;
                var $div = $('<div>').css({
                    width: '150px', height: '150px', borderRadius: '10px',
                    overflow: 'hidden', border: '2px solid #3b82f6', cursor: 'pointer'
                }).on('click', function () { openGalleryPreview(src); });
                $div.append($('<img>').attr('src', src).css({ width: '100%', height: '100%', objectFit: 'cover' }));
                $preview.append($div);
            };
            reader.readAsDataURL(this.files[0]);
        }
    });

    // ══════════════════════════════════════════════════════════════
    // Gallery image preview modal with zoom & pan
    // ══════════════════════════════════════════════════════════════
    var scale = 1, ox = 0, oy = 0;
    var dragging = false, startX, startY, startOx, startOy;

    function applyTransform() {
        $('#gallery-img-preview').css('transform', 'translate(' + ox + 'px,' + oy + 'px) scale(' + scale + ')');
        $('#gallery-img-container').css('cursor', scale > 1 ? 'grab' : 'default');
        $('#gallery-zoom-pct').text(Math.round(scale * 100) + '%');
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
    $('#gallery-zoom-in').on('click', function () { scale = Math.min(5, scale * 1.25); applyTransform(); });
    $('#gallery-zoom-out').on('click', function () { scale = Math.max(0.5, scale / 1.25); if (scale <= 1) { ox = 0; oy = 0; } applyTransform(); });
    $(document).on('keydown', function (e) {
        if (e.key === 'Escape' && $('#gallery-img-modal').css('display') !== 'none') closeGalleryPreview();
    });
    $('#gallery-img-container').on('wheel', function (e) {
        e.preventDefault();
        var delta = e.originalEvent.deltaY > 0 ? 0.85 : 1.18;
        scale = Math.min(5, Math.max(0.5, scale * delta));
        applyTransform();
    });
    $('#gallery-img-container').on('mousedown', function (e) {
        if (scale <= 1) return;
        dragging = true; startX = e.clientX; startY = e.clientY; startOx = ox; startOy = oy;
        $(this).css('cursor', 'grabbing'); e.preventDefault();
    });
    $(document).on('mousemove', function (e) { if (!dragging) return; ox = startOx + (e.clientX - startX); oy = startOy + (e.clientY - startY); applyTransform(); });
    $(document).on('mouseup', function () { if (!dragging) return; dragging = false; $('#gallery-img-container').css('cursor', scale > 1 ? 'grab' : 'default'); });
    $('#gallery-img-container').on('dblclick', resetZoom);

    // ══════════════════════════════════════════════════════════════
    // Helpers
    // ══════════════════════════════════════════════════════════════
    function escAttr(str) {
        return $('<div>').text(str || '').html().replace(/"/g, '&quot;');
    }

    // ══════════════════════════════════════════════════════════════
    // Features (Select-driven, fixed 3 items per feature)
    // ══════════════════════════════════════════════════════════════
    function createAllFeatures(dataArr) {
        var $container = $('#features-container');
        $container.empty();
        for (var i = 0; i < 6; i++) {
            var data = (dataArr && dataArr[i]) ? dataArr[i] : {};
            var items = data.items || ['', '', ''];
            while (items.length < ITEMS_PER_FEATURE) items.push('');

            var iconVal = data.icon || '';
            var hasIcon = iconVal !== '';

            var html = '';
            html += '<div class="feature-accordion border admin-border rounded-xl mb-3 overflow-hidden" data-index="' + i + '" id="feature-acc-' + i + '">';
            // Header
            html += '<div class="feature-header flex items-center justify-between px-4 py-3 cursor-pointer admin-surface-hover transition-colors duration-150" onclick="toggleFeatureAccordion(this)">';
            html += '<div class="flex items-center gap-2.5">';
            html += '<span class="material-symbols-outlined text-blue-400 accordion-chevron transition-transform duration-200" style="font-size:20px;">expand_more</span>';
            html += '<span class="inline-flex items-center justify-center size-6 rounded-md bg-blue-500 text-white text-[11px] font-bold">#' + (i + 1) + '</span>';
            html += '<span class="feature-title-display text-sm font-semibold admin-text">' + escAttr(data.title || 'Feature ' + (i + 1)) + '</span>';
            html += '</div>';
            html += '</div>';
            // Body
            html += '<div class="feature-body px-4 pb-4" style="display:none;">';
            // Title + Icon row
            html += '<div class="grid grid-cols-2 gap-3 mb-4 max-md:grid-cols-1">';
            html += '<div>';
            html += '<label class="block text-[13px] font-semibold admin-text-secondary mb-1.5">Judul Feature <span class="text-red-500">*</span></label>';
            html += '<input type="text" name="features[' + i + '][title]" value="' + escAttr(data.title) + '" required class="feature-title-input w-full px-3.5 py-2.5 rounded-lg admin-input font-[inherit] text-sm outline-none transition-colors duration-200 focus:border-blue-500" placeholder="Judul feature..." oninput="updateFeatureTitle(this)">';
            html += '</div>';
            html += '<div>';
            html += '<label class="block text-[13px] font-semibold admin-text-secondary mb-1.5">Icon</label>';
            html += '<div class="icon-picker-wrap flex items-center gap-2.5">';
            html += '<button type="button" class="icon-picker-btn inline-flex items-center justify-center size-10 rounded-lg border-2 border-dashed admin-border cursor-pointer transition-all duration-200 hover:border-blue-400" style="' + (hasIcon ? 'border-color:#3b82f6; background:rgba(59,130,246,0.08); border-style:solid;' : '') + '" onclick="openIconPicker(this.parentElement)">';
            html += '<span class="material-symbols-outlined icon-preview" style="font-size:22px;' + (hasIcon ? ' color:#60a5fa;' : '') + '">' + (hasIcon ? escAttr(iconVal) : 'add_circle') + '</span>';
            html += '</button>';
            html += '<input type="hidden" name="features[' + i + '][icon]" class="icon-value" value="' + escAttr(iconVal) + '">';
            html += '<span class="icon-name-label text-[11px] admin-text-muted">' + (hasIcon ? escAttr(iconVal).replace(/_/g, ' ') : 'Pilih icon...') + '</span>';
            html += '</div>';
            html += '</div>';
            html += '</div>';
            // Items (fixed 3)
            html += '<div class="flex items-center gap-2 mb-2.5">';
            html += '<label class="block text-[13px] font-semibold admin-text-secondary">Items</label>';
            html += '<span class="text-[11px] font-semibold px-1.5 py-0.5 rounded bg-blue-500/12 text-blue-400">3 / 3</span>';
            html += '</div>';
            html += '<div class="space-y-2">';
            for (var j = 0; j < ITEMS_PER_FEATURE; j++) {
                html += '<div class="flex items-center gap-2">';
                html += '<span class="inline-flex items-center justify-center size-6 rounded-md bg-slate-500/10 text-[11px] font-bold admin-text-muted flex-shrink-0">' + (j + 1) + '</span>';
                html += '<input type="text" name="features[' + i + '][items][]" value="' + escAttr(items[j]) + '" required class="flex-1 px-3 py-2 rounded-lg admin-input font-[inherit] text-sm outline-none transition-colors duration-200 focus:border-blue-500" placeholder="Item #' + (j + 1) + '...">';
                html += '</div>';
            }
            html += '</div>';
            html += '</div>';
            html += '</div>';

            $container.append(html);
        }
        featuresCreated = true;
    }

    function applyFeatureVisibility(count) {
        for (var i = 0; i < 6; i++) {
            var $acc = $('#feature-acc-' + i);
            if (i < count) {
                $acc.show();
                $acc.find('input').prop('disabled', false);
            } else {
                $acc.hide();
                $acc.find('input').prop('disabled', true);
            }
        }
        $('#feature-counter').text(count);
        $('#no-features-msg').hide();
    }

    window.toggleFeatureAccordion = function (header) {
        var $body = $(header).next('.feature-body');
        var $chevron = $(header).find('.accordion-chevron');
        $body.slideToggle(200);
        $chevron.toggleClass('rotate-180');
    };

    window.updateFeatureTitle = function (input) {
        var val = $(input).val();
        var idx = $(input).closest('.feature-accordion').data('index');
        $(input).closest('.feature-accordion').find('.feature-title-display').text(val || 'Feature ' + (idx + 1));
    };

    // Feature count select handler
    $('#featureCountSelect').on('change', function () {
        var count = parseInt($(this).val());
        if (!featuresCreated) {
            createAllFeatures([]);
        }
        applyFeatureVisibility(count);
        // Open first accordion if all closed
        var $first = $('#feature-acc-0');
        if ($first.find('.feature-body').is(':hidden')) {
            $first.find('.feature-body').slideDown(200);
            $first.find('.accordion-chevron').addClass('rotate-180');
        }
    });

    // ══════════════════════════════════════════════════════════════
    // Benefits
    // ══════════════════════════════════════════════════════════════
    function updateBenefitState() {
        var count = $('#benefits-container .benefit-row').length;
        $('#benefit-counter').text(count + ' / ' + MAX_BENEFITS);

        if (count >= MAX_BENEFITS) {
            $('#addBenefitBtn').prop('disabled', true).addClass('opacity-50 !cursor-not-allowed');
        } else {
            $('#addBenefitBtn').prop('disabled', false).removeClass('opacity-50 !cursor-not-allowed');
        }

        $('#benefits-container .benefit-row').each(function () {
            var $delBtn = $(this).find('.benefit-delete-btn');
            if (count <= MIN_BENEFITS) {
                $delBtn.prop('disabled', true).addClass('opacity-30 !cursor-not-allowed');
            } else {
                $delBtn.prop('disabled', false).removeClass('opacity-30 !cursor-not-allowed');
            }
        });

        $('#no-benefits-msg').toggle(count === 0);
    }

    function createBenefitHtml(idx, data) {
        data = data || {};
        var iconVal = data.icon || '';
        var hasIcon = iconVal !== '';
        var html = '<div class="benefit-row flex items-start gap-3 mb-3 p-3 border admin-border rounded-xl">';
        html += '<div class="flex-1 grid grid-cols-2 gap-3 max-md:grid-cols-1">';
        html += '<div>';
        html += '<label class="block text-[13px] font-semibold admin-text-secondary mb-1.5">Judul Benefit <span class="text-red-500">*</span></label>';
        html += '<input type="text" name="benefits[' + idx + '][title]" value="' + escAttr(data.title) + '" required class="w-full px-3.5 py-2.5 rounded-lg admin-input font-[inherit] text-sm outline-none transition-colors duration-200 focus:border-blue-500" placeholder="Judul benefit...">';
        html += '</div>';
        html += '<div>';
        html += '<label class="block text-[13px] font-semibold admin-text-secondary mb-1.5">Icon</label>';
        html += '<div class="icon-picker-wrap flex items-center gap-2.5">';
        html += '<button type="button" class="icon-picker-btn inline-flex items-center justify-center size-10 rounded-lg border-2 border-dashed admin-border cursor-pointer transition-all duration-200 hover:border-blue-400" style="' + (hasIcon ? 'border-color:#3b82f6; background:rgba(59,130,246,0.08); border-style:solid;' : '') + '" onclick="openIconPicker(this.parentElement)">';
        html += '<span class="material-symbols-outlined icon-preview" style="font-size:22px;' + (hasIcon ? ' color:#60a5fa;' : '') + '">' + (hasIcon ? escAttr(iconVal) : 'add_circle') + '</span>';
        html += '</button>';
        html += '<input type="hidden" name="benefits[' + idx + '][icon]" class="icon-value" value="' + escAttr(iconVal) + '">';
        html += '<span class="icon-name-label text-[11px] admin-text-muted">' + (hasIcon ? escAttr(iconVal).replace(/_/g, ' ') : 'Pilih icon...') + '</span>';
        html += '</div>';
        html += '</div>';
        html += '</div>';
        html += '<button type="button" class="benefit-delete-btn mt-6 inline-flex items-center justify-center size-8 rounded-lg bg-red-500/12 text-red-400 border-none cursor-pointer hover:bg-red-500/20 transition-colors" onclick="removeBenefit(this)" title="Hapus benefit">';
        html += '<span class="material-symbols-outlined" style="font-size:16px;">delete</span>';
        html += '</button>';
        html += '</div>';
        return html;
    }

    window.removeBenefit = function (btn) {
        if ($('#benefits-container .benefit-row').length <= MIN_BENEFITS) return;
        $(btn).closest('.benefit-row').fadeOut(200, function () {
            $(this).remove();
            updateBenefitState();
        });
    };

    $('#addBenefitBtn').on('click', function () {
        if ($('#benefits-container .benefit-row').length >= MAX_BENEFITS) return;
        $(createBenefitHtml(benefitIndex)).appendTo('#benefits-container');
        benefitIndex++;
        updateBenefitState();
    });

    // ══════════════════════════════════════════════════════════════
    // Load old() data (after validation failure)
    // ══════════════════════════════════════════════════════════════
    var oldFeatures = @json(old('features', []));
    var oldBenefits = @json(old('benefits', []));

    // Features: restore from old()
    if (oldFeatures && typeof oldFeatures === 'object' && Object.keys(oldFeatures).length > 0) {
        var dataArr = [];
        $.each(oldFeatures, function (idx, fData) {
            if (fData) dataArr.push({ title: fData.title || '', icon: fData.icon || '', items: fData.items || [] });
        });
        createAllFeatures(dataArr);
        var count = dataArr.length <= 3 ? 3 : 6;
        $('#featureCountSelect').val(String(count));
        applyFeatureVisibility(count);
    }

    // Benefits: restore from old()
    if (oldBenefits && typeof oldBenefits === 'object' && Object.keys(oldBenefits).length > 0) {
        $.each(oldBenefits, function (idx, bData) {
            if (!bData) return;
            $(createBenefitHtml(benefitIndex, {
                title: bData.title || '',
                icon: bData.icon || ''
            })).appendTo('#benefits-container');
            benefitIndex++;
        });
    }
    updateBenefitState();

    // ══════════════════════════════════════════════════════════════
    // Client-side validation on submit
    // ══════════════════════════════════════════════════════════════
    $('#productForm').on('submit', function (e) {
        var errors = [];
        var selectedCount = $('#featureCountSelect').val();

        if (!selectedCount) {
            errors.push('Pilih jumlah feature (3 atau 6).');
        } else {
            var count = parseInt(selectedCount);
            for (var i = 0; i < count; i++) {
                var $acc = $('#feature-acc-' + i);
                var title = $acc.find('.feature-title-input').val();
                if (!title || !title.trim()) errors.push('Feature #' + (i + 1) + ': judul wajib diisi.');

                $acc.find('input[name*="[items]"]').each(function (j) {
                    if (!$(this).val() || !$(this).val().trim()) {
                        errors.push('Feature #' + (i + 1) + ', Item #' + (j + 1) + ': teks tidak boleh kosong.');
                    }
                });
            }
        }

        var benefitCount = $('#benefits-container .benefit-row').length;
        if (benefitCount !== MAX_BENEFITS) errors.push('Harus ada tepat ' + MAX_BENEFITS + ' benefits (saat ini: ' + benefitCount + ').');

        $('#benefits-container .benefit-row').each(function (i) {
            var title = $(this).find('input[name*="[title]"]').val();
            if (!title || !title.trim()) errors.push('Benefit #' + (i + 1) + ': judul wajib diisi.');
        });

        if (errors.length > 0) {
            e.preventDefault();
            var $errBox = $('#client-errors');
            var $errList = $('#client-errors-list');
            $errList.empty();
            errors.forEach(function (msg) {
                $errList.append('<li>' + $('<span>').text(msg).html() + '</li>');
            });
            $errBox.show();
            $('html, body').animate({ scrollTop: $errBox.offset().top - 80 }, 300);
            return false;
        }
        $('#client-errors').hide();
    });
});
</script>
<style>
#gallery-img-preview { transition: transform 0.05s linear; }
.accordion-chevron.rotate-180 { transform: rotate(180deg); }
</style>
@endsection
