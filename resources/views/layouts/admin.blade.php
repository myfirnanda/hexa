<!DOCTYPE html>
<html lang="en" id="adminHtml">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Admin') — Hexavara</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL,GRAD,opsz@100..700,0..1,0,20..48" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script>
        (function() {
            if (localStorage.getItem('admin-theme') === 'light') document.documentElement.classList.add('light');
        })();
    </script>
    <script>
        (function () {
            var FALLBACK = '{{ asset('assets/img/broken.png') }}';
            window.addEventListener('error', function (e) {
                var t = e.target;
                if (t && t.tagName === 'IMG' && t.src !== FALLBACK) { t.onerror = null; t.src = FALLBACK; }
            }, true);
        })();
    </script>
</head>
<body class="font-sans admin-body min-h-screen flex">

    {{-- ── Sidebar ─────────────────────────────────── --}}
    <aside id="sidebar" class="w-[260px] admin-sidebar border-r min-h-screen fixed top-0 left-0 z-50 flex flex-col transition-transform duration-300 max-lg:-translate-x-full max-lg:[&.open]:translate-x-0">

        {{-- Brand --}}
        <div class="px-5 py-5 admin-border border-b flex items-center gap-3 relative overflow-hidden shrink-0">
            {{-- Blue accent line at top --}}
            <div class="absolute top-0 left-0 right-0 h-[3px]" style="background: linear-gradient(90deg, #1d4ed8 0%, #60a5fa 100%);"></div>
            <img src="{{ asset('assets/img/ChatGPT Image 26 Feb 2026, 11.24.32.png') }}" alt="Hexavara" class="h-8 w-auto shrink-0" />
            <div class="min-w-0">
                <div class="text-[15px] font-bold admin-text leading-tight tracking-tight">Hexavara</div>
                <div class="text-[11px] font-semibold tracking-wide uppercase admin-text-muted">Manager Panel</div>
            </div>
        </div>

        {{-- Nav --}}
        <nav class="flex-1 p-3 overflow-y-auto">
            <div class="text-[10px] font-bold uppercase tracking-[0.1em] admin-text-muted px-3 pt-4 pb-2">Menu Utama</div>

            <a href="{{ route('manager.dashboard') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium mb-0.5 transition-all duration-150 no-underline {{ request()->routeIs('manager.dashboard') ? 'admin-nav-active' : 'admin-text-secondary admin-surface-hover' }}">
                <span class="material-symbols-outlined text-xl shrink-0">dashboard</span>
                Beranda
            </a>

            <a href="{{ route('manager.orders.index') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium mb-0.5 transition-all duration-150 no-underline {{ request()->routeIs('manager.orders.*') ? 'admin-nav-active' : 'admin-text-secondary admin-surface-hover' }}">
                <span class="material-symbols-outlined text-xl shrink-0">shopping_cart</span>
                Orders
                @if($adminPendingCount > 0)
                <span class="ml-auto text-[11px] font-bold px-2 py-0.5 rounded-full bg-blue-500 text-white">{{ $adminPendingCount }}</span>
                @endif
            </a>

            <div class="text-[10px] font-bold uppercase tracking-[0.1em] admin-text-muted px-3 pt-5 pb-2">Manajemen Konten</div>

            <a href="{{ route('manager.products.index') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium mb-0.5 transition-all duration-150 no-underline {{ request()->routeIs('manager.products.*') ? 'admin-nav-active' : 'admin-text-secondary admin-surface-hover' }}">
                <span class="material-symbols-outlined text-xl shrink-0">inventory_2</span>
                Produk
            </a>

            <a href="{{ route('manager.projects.index') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium mb-0.5 transition-all duration-150 no-underline {{ request()->routeIs('manager.projects.*') ? 'admin-nav-active' : 'admin-text-secondary admin-surface-hover' }}">
                <span class="material-symbols-outlined text-xl shrink-0">work</span>
                Project
            </a>

            <a href="{{ route('manager.clients.index') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium mb-0.5 transition-all duration-150 no-underline {{ request()->routeIs('manager.clients.*') ? 'admin-nav-active' : 'admin-text-secondary admin-surface-hover' }}">
                <span class="material-symbols-outlined text-xl shrink-0">apartment</span>
                Clients
            </a>

            <a href="{{ route('manager.testimonials.index') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium mb-0.5 transition-all duration-150 no-underline {{ request()->routeIs('manager.testimonials.*') ? 'admin-nav-active' : 'admin-text-secondary admin-surface-hover' }}">
                <span class="material-symbols-outlined text-xl shrink-0">rate_review</span>
                Testimonials
            </a>
        </nav>

        {{-- User / Logout --}}
        <div class="p-3 admin-border border-t relative shrink-0">
            <div id="userDropdown" class="hidden absolute bottom-[calc(100%+6px)] left-3 right-3 admin-card rounded-xl p-1.5 z-[60] border" style="box-shadow: var(--admin-shadow-lg);">
                <div class="px-3 py-2 mb-1">
                    <div class="text-[12px] font-semibold admin-text truncate">{{ Auth::user()->name }}</div>
                    <div class="text-[11px] admin-text-muted truncate">{{ Auth::user()->email }}</div>
                </div>
                <div class="h-px admin-border mx-1 mb-1"></div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex items-center gap-2 w-full px-3 py-2 rounded-md text-[13px] font-medium bg-transparent border-none font-[inherit] cursor-pointer transition-all duration-150 hover:bg-red-500/10 hover:text-red-400" style="color: var(--admin-text-secondary);">
                        <span class="material-symbols-outlined text-[18px]">logout</span>
                        Keluar
                    </button>
                </form>
            </div>

            <button id="userTrigger" onclick="toggleUserDropdown()"
                class="flex items-center gap-2.5 w-full px-3 py-2 rounded-lg cursor-pointer bg-transparent border-none text-left font-[inherit] text-inherit transition-all duration-150 admin-surface-hover">
                <div class="size-9 rounded-lg flex items-center justify-center font-bold text-sm shrink-0" style="background: rgba(37,99,235,0.12); color: #60a5fa;">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
                <div class="flex-1 min-w-0">
                    <div class="text-[13px] font-semibold admin-text truncate">{{ Auth::user()->name }}</div>
                    <div class="text-[11px] admin-text-muted">Administrator</div>
                </div>
                <span class="material-symbols-outlined text-lg admin-text-muted shrink-0 transition-transform duration-200" id="userChevron">expand_less</span>
            </button>
        </div>
    </aside>

    {{-- Sidebar overlay (mobile) --}}
    <div id="sidebarOverlay" class="hidden fixed inset-0 bg-black/60 z-[45] max-lg:[&.open]:block backdrop-blur-sm" onclick="toggleSidebar()"></div>

    {{-- ── Main ────────────────────────────────────── --}}
    <div class="flex-1 ml-[260px] min-h-screen flex flex-col max-lg:ml-0">

        {{-- Topbar --}}
        <header class="admin-topbar border-b admin-border px-6 h-[58px] flex items-center justify-between sticky top-0 z-40 shrink-0">
            <div class="flex items-center gap-3">
                <button class="hidden max-lg:flex bg-transparent border-none admin-text-secondary cursor-pointer p-1 rounded-lg admin-surface-hover transition-colors" onclick="toggleSidebar()" aria-label="Toggle sidebar">
                    <span class="material-symbols-outlined text-2xl">menu</span>
                </button>
                <div>
                    <span class="text-[15px] font-semibold admin-text">@yield('topbar-title', 'Admin Panel')</span>
                    @hasSection('topbar-subtitle')
                    <span class="text-[13px] admin-text-muted ml-2">/ @yield('topbar-subtitle')</span>
                    @endif
                </div>
            </div>

            <div class="flex items-center gap-2">
                {{-- View site link --}}
                <a href="{{ url('/') }}" target="_blank" title="Lihat website" aria-label="Lihat website"
                   class="flex items-center justify-center size-9 rounded-lg border admin-border cursor-pointer transition-all duration-150 admin-surface-hover no-underline admin-text-secondary hover:text-blue-400">
                    <span class="material-symbols-outlined text-xl">open_in_new</span>
                </a>

                {{-- Theme toggle --}}
                <button id="themeToggle" onclick="toggleTheme()" aria-label="Toggle tema"
                    class="flex items-center justify-center size-9 rounded-lg border admin-border cursor-pointer transition-all duration-150 admin-surface-hover admin-text-secondary">
                    <span class="material-symbols-outlined text-xl" id="themeIcon">dark_mode</span>
                </button>
            </div>
        </header>

        {{-- Flash messages --}}
        @if(session('success'))
        <div class="fixed top-5 right-5 flex items-center gap-2.5 px-4 py-3 rounded-xl text-sm font-medium z-[200] toast-animate max-w-sm" style="background: rgba(16,185,129,0.12); border: 1px solid rgba(16,185,129,0.25); color: #34d399; box-shadow: var(--admin-shadow-lg);">
            <span class="material-symbols-outlined text-lg shrink-0">check_circle</span>
            <span>{{ session('success') }}</span>
        </div>
        @endif
        @if(session('error'))
        <div class="fixed top-5 right-5 flex items-center gap-2.5 px-4 py-3 rounded-xl text-sm font-medium z-[200] toast-animate max-w-sm" style="background: rgba(239,68,68,0.12); border: 1px solid rgba(239,68,68,0.25); color: #f87171; box-shadow: var(--admin-shadow-lg);">
            <span class="material-symbols-outlined text-lg shrink-0">error</span>
            <span>{{ session('error') }}</span>
        </div>
        @endif

        {{-- Content --}}
        <main class="flex-1 p-7 max-w-[1440px] w-full max-md:p-4">
            @yield('content')
        </main>
    </div>

    {{-- ── Delete Confirmation Modal ──────────────── --}}
    <div id="deleteModal" class="hidden fixed inset-0 admin-overlay z-[100] items-center justify-center [&.show]:flex">
        <div class="admin-card rounded-2xl p-7 max-w-sm w-[90%] text-center border" style="box-shadow: var(--admin-shadow-lg);">
            <div class="size-12 rounded-xl flex items-center justify-center mx-auto mb-4" style="background: rgba(239,68,68,0.1);">
                <span class="material-symbols-outlined text-2xl text-red-400">delete_forever</span>
            </div>
            <h3 class="text-base font-bold mb-2 admin-text">Konfirmasi Hapus</h3>
            <p class="text-sm admin-text-secondary mb-6 leading-relaxed">Data yang dihapus tidak dapat dikembalikan. Apakah Anda yakin?</p>
            <div class="flex gap-2.5 justify-center">
                <button onclick="closeDeleteModal()"
                    class="inline-flex items-center gap-1.5 px-5 py-2.5 rounded-lg font-semibold text-sm admin-card admin-text border admin-border cursor-pointer transition-all duration-150 admin-surface-hover">
                    Batal
                </button>
                <form id="deleteForm" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="inline-flex items-center gap-1.5 px-5 py-2.5 rounded-lg font-semibold text-sm cursor-pointer transition-all duration-150" style="background: rgba(239,68,68,0.12); color: #f87171; border: 1px solid rgba(239,68,68,0.2);" onmouseover="this.style.background='rgba(239,68,68,0.2)'" onmouseout="this.style.background='rgba(239,68,68,0.12)'">
                        <span class="material-symbols-outlined text-lg">delete</span>
                        Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>

    {{-- ── Shared Gallery Preview Modal ───────────── --}}
    <div id="gallery-img-modal" style="display:none; position:fixed; inset:0; z-index:9999; align-items:center; justify-content:center; padding:1.5rem;">
        <div id="gallery-img-backdrop" style="position:absolute; inset:0; background:rgba(0,0,0,0.90); backdrop-filter:blur(4px);"></div>
        <div style="position:relative; z-index:1; display:flex; flex-direction:column; border-radius:16px; overflow:hidden; background:var(--admin-card-bg); border:1px solid var(--admin-border); box-shadow:var(--admin-shadow-lg); width:min(90vw,860px);">
            <div class="admin-border" style="display:flex; align-items:center; justify-content:space-between; gap:0.75rem; padding:0.75rem 1.25rem; border-bottom-width:1px; border-bottom-style:solid; flex-shrink:0;">
                <span style="font-size:13px; font-weight:600; display:flex; align-items:center; gap:6px; color:var(--admin-text);">
                    <span class="material-symbols-outlined" style="font-size:17px; color:#60a5fa;">photo</span>
                    Preview Gambar
                </span>
                <div style="display:flex; align-items:center; gap:4px;">
                    <button id="gallery-zoom-out" type="button" title="Zoom Out" style="display:inline-flex; align-items:center; justify-content:center; width:28px; height:28px; border-radius:7px; background:var(--admin-btn-secondary-bg); color:var(--admin-text-secondary); border:none; cursor:pointer;">
                        <span class="material-symbols-outlined" style="font-size:17px;">zoom_out</span>
                    </button>
                    <span id="gallery-zoom-pct" style="font-size:11px; font-weight:700; color:var(--admin-text-secondary); min-width:40px; text-align:center; background:var(--admin-btn-secondary-bg); border-radius:6px; padding:3px 6px;">100%</span>
                    <button id="gallery-zoom-in" type="button" title="Zoom In" style="display:inline-flex; align-items:center; justify-content:center; width:28px; height:28px; border-radius:7px; background:var(--admin-btn-secondary-bg); color:var(--admin-text-secondary); border:none; cursor:pointer;">
                        <span class="material-symbols-outlined" style="font-size:17px;">zoom_in</span>
                    </button>
                    <button id="gallery-zoom-reset" type="button" title="Reset Zoom" style="display:inline-flex; align-items:center; justify-content:center; width:28px; height:28px; border-radius:7px; background:var(--admin-btn-secondary-bg); color:var(--admin-text-secondary); border:none; cursor:pointer;">
                        <span class="material-symbols-outlined" style="font-size:17px;">fit_screen</span>
                    </button>
                    <div style="width:1px; height:16px; background:var(--admin-border); margin:0 3px;"></div>
                    <button id="gallery-img-close" type="button" title="Tutup" style="display:inline-flex; align-items:center; justify-content:center; width:28px; height:28px; border-radius:7px; background:var(--admin-btn-secondary-bg); color:var(--admin-text-secondary); border:none; cursor:pointer;">
                        <span class="material-symbols-outlined" style="font-size:18px;">close</span>
                    </button>
                </div>
            </div>
            <div id="gallery-img-container" style="overflow:hidden; background:#04090f; display:flex; align-items:center; justify-content:center; height:72vh; cursor:default; position:relative;">
                <img id="gallery-img-preview" src="" alt="Preview" style="max-width:100%; max-height:100%; object-fit:contain; display:block; transform-origin:center center; will-change:transform; user-select:none; -webkit-user-drag:none; pointer-events:none; transition:transform 0.06s linear;">
                <div style="position:absolute; bottom:0; left:0; right:0; padding:6px 14px; background:rgba(0,0,0,0.5); display:flex; align-items:center; justify-content:center; gap:14px; pointer-events:none;">
                    <span style="font-size:11px; color:rgba(255,255,255,0.4); display:flex; align-items:center; gap:4px;"><span class="material-symbols-outlined" style="font-size:13px;">scroll</span> Scroll zoom</span>
                    <span style="color:rgba(255,255,255,0.2);">&middot;</span>
                    <span style="font-size:11px; color:rgba(255,255,255,0.4); display:flex; align-items:center; gap:4px;"><span class="material-symbols-outlined" style="font-size:13px;">pan_tool</span> Drag geser</span>
                    <span style="color:rgba(255,255,255,0.2);">&middot;</span>
                    <span style="font-size:11px; color:rgba(255,255,255,0.4);">Dbl-klik reset</span>
                </div>
            </div>
        </div>
    </div>

    {{-- Page-specific modals/scripts stack --}}
    @stack('admin-modals')

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
    window.toggleTheme = function () {
        var isLight = document.documentElement.classList.toggle('light');
        localStorage.setItem('admin-theme', isLight ? 'light' : 'dark');
        window.updateThemeIcon();
    };
    window.updateThemeIcon = function () {
        var icon = document.getElementById('themeIcon');
        if (icon) icon.textContent = document.documentElement.classList.contains('light') ? 'light_mode' : 'dark_mode';
    };
    window.toggleSidebar = function () {
        document.getElementById('sidebar').classList.toggle('open');
        document.getElementById('sidebarOverlay').classList.toggle('open');
    };
    window.toggleUserDropdown = function () {
        var dd = document.getElementById('userDropdown');
        var ch = document.getElementById('userChevron');
        dd.classList.toggle('hidden');
        if (ch) ch.textContent = dd.classList.contains('hidden') ? 'expand_less' : 'expand_more';
    };
    window.confirmDelete = function (url) {
        document.getElementById('deleteForm').action = url;
        document.getElementById('deleteModal').classList.add('show');
    };
    window.closeDeleteModal = function () {
        document.getElementById('deleteModal').classList.remove('show');
    };

    $(function () {
        window.updateThemeIcon();

        // Close user dropdown on outside click
        $(document).on('click', function (e) {
            var $t = $('#userTrigger'), $d = $('#userDropdown');
            if (!$t.is(e.target) && !$t.has(e.target).length && !$d.is(e.target) && !$d.has(e.target).length) {
                $d.addClass('hidden');
                var ch = document.getElementById('userChevron');
                if (ch) ch.textContent = 'expand_less';
            }
        });

        // Close delete modal on backdrop click
        $('#deleteModal').on('click', function (e) { if (e.target === this) window.closeDeleteModal(); });

        // Auto-remove toasts
        setTimeout(function () { $('.toast-animate').fadeOut(300, function () { $(this).remove(); }); }, 3000);

        // Dynamic form error clearing
        $(document).on('input change', '.admin-card input, .admin-card textarea, .admin-card select', function () {
            var $p = $(this).closest('.mb-5, .mb-4, .mb-3');
            $p.find('.text-xs.text-red-400').fadeOut(200, function () { $(this).remove(); });
            $(this).css('border-color', '');
        });
    });

    // ── Shared Gallery Modal ──────────────────────────────────
    (function () {
        var scale = 1, ox = 0, oy = 0, dragging = false, startX, startY, startOx, startOy;

        function applyTransform() {
            $('#gallery-img-preview').css('transform', 'translate(' + ox + 'px,' + oy + 'px) scale(' + scale + ')');
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

        function closeGallery() {
            $('#gallery-img-modal').css('display', 'none');
            $('#gallery-img-preview').attr('src', '');
            $('body').css('overflow', '');
            resetZoom();
        }

        $(function () {
            $('#gallery-img-close, #gallery-img-backdrop').on('click', closeGallery);
            $('#gallery-zoom-reset').on('click', resetZoom);
            $('#gallery-zoom-in').on('click', function () { scale = Math.min(5, scale * 1.25); applyTransform(); });
            $('#gallery-zoom-out').on('click', function () { scale = Math.max(0.5, scale / 1.25); if (scale <= 1) { ox = 0; oy = 0; } applyTransform(); });

            $('#gallery-img-container').on('wheel', function (e) {
                e.preventDefault();
                scale = Math.min(5, Math.max(0.5, scale * (e.originalEvent.deltaY > 0 ? 0.85 : 1.18)));
                applyTransform();
            }).on('mousedown', function (e) {
                if (scale <= 1) return;
                dragging = true; startX = e.clientX; startY = e.clientY; startOx = ox; startOy = oy;
                $(this).css('cursor', 'grabbing'); e.preventDefault();
            }).on('dblclick', resetZoom);

            $(document).on('mousemove', function (e) {
                if (!dragging) return;
                ox = startOx + (e.clientX - startX); oy = startOy + (e.clientY - startY); applyTransform();
            }).on('mouseup', function () {
                if (!dragging) return; dragging = false;
                $('#gallery-img-container').css('cursor', scale > 1 ? 'grab' : 'default');
            }).on('keydown', function (e) {
                if (e.key === 'Escape') closeGallery();
                if ($('#gallery-img-modal').css('display') === 'none') return;
                if (e.key === '+' || e.key === '=') { scale = Math.min(5, scale * 1.25); applyTransform(); }
                if (e.key === '-') { scale = Math.max(0.5, scale / 1.25); if (scale <= 1) { ox = 0; oy = 0; } applyTransform(); }
                if (e.key === '0') resetZoom();
            });
        });
    }());
    </script>

    @yield('scripts')
</body>
</html>
