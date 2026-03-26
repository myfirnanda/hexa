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
            var t = localStorage.getItem('admin-theme');
            if (t === 'light') document.documentElement.classList.add('light');
        })();
    </script>
</head>
<body class="font-sans admin-body min-h-screen flex">
    {{-- Sidebar --}}
    <aside id="sidebar" class="w-[260px] admin-sidebar border-r min-h-screen fixed top-0 left-0 z-50 flex flex-col transition-transform duration-300 max-lg:-translate-x-full max-lg:[&.open]:translate-x-0">
        {{-- Brand --}}
        <div class="px-5 py-6 admin-border border-b flex items-center gap-3">
            <img src="{{ asset('assets/img/ChatGPT Image 26 Feb 2026, 11.24.32.png') }}" alt="Hexavara" class="h-9 w-auto" />
            <span class="text-base font-bold admin-text">Hexavara</span>
        </div>
        {{-- Nav --}}
        <nav class="flex-1 p-3 overflow-y-auto">
            <div class="text-[11px] font-semibold uppercase tracking-wider admin-text-muted px-3 pt-4 pb-2">Menu</div>
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium mb-0.5 transition-all duration-150 no-underline {{ request()->routeIs('admin.dashboard') ? 'bg-blue-500/12 text-blue-400 admin-nav-active' : 'admin-text-secondary admin-surface-hover' }}">
                <span class="material-symbols-outlined text-xl">dashboard</span>
                Beranda
            </a>
            <a href="{{ route('admin.orders.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium mb-0.5 transition-all duration-150 no-underline {{ request()->routeIs('admin.orders.*') ? 'bg-blue-500/12 text-blue-400 admin-nav-active' : 'admin-text-secondary admin-surface-hover' }}">
                <span class="material-symbols-outlined text-xl">shopping_cart</span>
                Orders
                @php $pendingCount = \App\Models\Order::where('status','pending')->count(); @endphp
                @if($pendingCount > 0)
                <span class="ml-auto bg-blue-500 text-white text-[11px] font-semibold px-2 py-0.5 rounded-full">{{ $pendingCount }}</span>
                @endif
            </a>

            <div class="text-[11px] font-semibold uppercase tracking-wider admin-text-muted px-3 pt-4 pb-2">Manajemen Konten</div>
            <a href="{{ route('admin.services.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium mb-0.5 transition-all duration-150 no-underline {{ request()->routeIs('admin.services.*') ? 'bg-blue-500/12 text-blue-400 admin-nav-active' : 'admin-text-secondary admin-surface-hover' }}">
                <span class="material-symbols-outlined text-xl">category</span>
                Produk / Layanan
            </a>
            <a href="{{ route('admin.projects.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium mb-0.5 transition-all duration-150 no-underline {{ request()->routeIs('admin.projects.*') ? 'bg-blue-500/12 text-blue-400 admin-nav-active' : 'admin-text-secondary admin-surface-hover' }}">
                <span class="material-symbols-outlined text-xl">work</span>
                Project
            </a>
            <a href="{{ route('admin.clients.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium mb-0.5 transition-all duration-150 no-underline {{ request()->routeIs('admin.clients.*') ? 'bg-blue-500/12 text-blue-400 admin-nav-active' : 'admin-text-secondary admin-surface-hover' }}">
                <span class="material-symbols-outlined text-xl">apartment</span>
                Clients
            </a>
            <a href="{{ route('admin.testimonials.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium mb-0.5 transition-all duration-150 no-underline {{ request()->routeIs('admin.testimonials.*') ? 'bg-blue-500/12 text-blue-400 admin-nav-active' : 'admin-text-secondary admin-surface-hover' }}">
                <span class="material-symbols-outlined text-xl">rate_review</span>
                Testimonials
            </a>
        </nav>
        {{-- Footer / User dropdown --}}
        <div class="p-3 admin-border border-t relative">
            <div id="userDropdown" class="hidden absolute bottom-[calc(100%+4px)] left-3 right-3 admin-card rounded-xl p-1.5 z-[60]" style="box-shadow: var(--admin-shadow-lg);">
                <a href="{{ route('home') }}" class="flex items-center gap-2 w-full px-3 py-2 rounded-md admin-text-secondary text-[13px] font-medium no-underline transition-all duration-150 admin-surface-hover" target="_blank">
                    <span class="material-symbols-outlined text-lg">open_in_new</span>
                    Lihat Website
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex items-center gap-2 w-full px-3 py-2 rounded-md admin-text-secondary text-[13px] font-medium bg-transparent border-none font-[inherit] cursor-pointer transition-all duration-150 hover:bg-red-500/12 hover:text-red-400">
                        <span class="material-symbols-outlined text-lg">logout</span>
                        Logout
                    </button>
                </form>
            </div>
            <button id="userTrigger" onclick="toggleUserDropdown()" class="flex items-center gap-2.5 w-full px-3 py-2 rounded-lg cursor-pointer bg-transparent border-none text-left font-[inherit] text-inherit transition-all duration-150 admin-surface-hover [&.open_>.chevron]:rotate-90">
                <div class="size-9 rounded-lg bg-blue-500/12 flex items-center justify-center text-blue-400 font-bold text-sm shrink-0">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
                <div class="flex-1 min-w-0">
                    <div class="text-[13px] font-semibold admin-text">{{ Auth::user()->name }}</div>
                    <div class="text-[11px] admin-text-muted truncate">{{ Auth::user()->email }}</div>
                </div>
                <div class="chevron admin-text-muted shrink-0 transition-transform duration-200">
                    <span class="material-symbols-outlined text-lg">chevron_right</span>
                </div>
            </button>
        </div>
    </aside>

    {{-- Sidebar overlay (mobile) --}}
    <div id="sidebarOverlay" class="hidden fixed inset-0 bg-black/50 z-[45] max-lg:[&.open]:block" onclick="toggleSidebar()"></div>

    {{-- Main --}}
    <div class="flex-1 ml-[260px] min-h-screen flex flex-col max-lg:ml-0">
        {{-- Topbar --}}
        <header class="admin-topbar border-b admin-border px-7 h-[60px] flex items-center justify-between sticky top-0 z-40">
            <div class="flex items-center gap-3">
                <button class="hidden max-lg:flex bg-transparent border-none admin-text-secondary cursor-pointer p-1" onclick="toggleSidebar()">
                    <span class="material-symbols-outlined text-2xl">menu</span>
                </button>
                <span class="text-base font-semibold admin-text">@yield('topbar-title', 'Admin Panel')</span>
            </div>
            <div class="flex items-center gap-2">
                {{-- Theme toggle --}}
                <button id="themeToggle" onclick="toggleTheme()" class="flex items-center justify-center size-9 rounded-lg bg-transparent border admin-border cursor-pointer transition-all duration-150 admin-surface-hover" title="Toggle theme">
                    <span class="material-symbols-outlined text-xl admin-text-secondary" id="themeIcon">dark_mode</span>
                </button>
                <a href="{{ route('home') }}" class="flex items-center gap-1.5 px-3 py-1.5 rounded-lg no-underline admin-text-secondary text-[13px] transition-all duration-150 admin-surface-hover" target="_blank">
                    <span class="material-symbols-outlined text-[16px]">open_in_new</span>
                    <span class="max-sm:hidden">Lihat Website</span>
                </a>
            </div>
        </header>

        {{-- Content --}}
        <main class="flex-1 p-7 max-w-[1400px] w-full max-md:p-4">
            @if(session('success'))
            <div class="fixed top-5 right-5 px-5 py-3 rounded-lg text-sm font-medium z-[200] flex items-center gap-2 bg-green-900 text-green-200 toast-animate">
                <span class="material-symbols-outlined text-lg">check_circle</span>
                {{ session('success') }}
            </div>
            @endif
            @if(session('error'))
            <div class="fixed top-5 right-5 px-5 py-3 rounded-lg text-sm font-medium z-[200] flex items-center gap-2 bg-red-950 text-red-300 toast-animate">
                <span class="material-symbols-outlined text-lg">error</span>
                {{ session('error') }}
            </div>
            @endif

            @yield('content')
        </main>
    </div>

    {{-- Delete modal --}}
    <div id="deleteModal" class="hidden fixed inset-0 admin-overlay z-[100] items-center justify-center [&.show]:flex">
        <div class="admin-card rounded-2xl p-7 max-w-sm w-[90%] text-center border">
            <h3 class="text-lg font-semibold mb-2 admin-text">Konfirmasi Hapus</h3>
            <p class="text-sm admin-text-secondary mb-6">Apakah Anda yakin ingin menghapus item ini? Tindakan ini tidak dapat dibatalkan.</p>
            <div class="flex gap-2.5 justify-center">
                <button class="inline-flex items-center gap-1.5 px-4 py-2 rounded-lg font-semibold text-sm admin-card admin-text border admin-border cursor-pointer transition-all duration-150 admin-surface-hover" onclick="closeDeleteModal()">Batal</button>
                <form id="deleteForm" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="inline-flex items-center gap-1.5 px-4 py-2 rounded-lg font-semibold text-sm bg-red-500/12 text-red-400 border border-red-500/20 cursor-pointer transition-all duration-150 hover:bg-red-500/20">
                        <span class="material-symbols-outlined text-lg">delete</span>
                        Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Theme toggle
        function toggleTheme() {
            var html = document.documentElement;
            var isLight = html.classList.toggle('light');
            localStorage.setItem('admin-theme', isLight ? 'light' : 'dark');
            updateThemeIcon();
        }
        function updateThemeIcon() {
            var icon = document.getElementById('themeIcon');
            if (icon) icon.textContent = document.documentElement.classList.contains('light') ? 'light_mode' : 'dark_mode';
        }
        updateThemeIcon();

        // Sidebar toggle
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('open');
            document.getElementById('sidebarOverlay').classList.toggle('open');
        }

        // User dropdown
        function toggleUserDropdown() {
            var trigger = document.getElementById('userTrigger');
            var dropdown = document.getElementById('userDropdown');
            trigger.classList.toggle('open');
            dropdown.classList.toggle('hidden');
        }
        document.addEventListener('click', function(e) {
            var trigger = document.getElementById('userTrigger');
            var dropdown = document.getElementById('userDropdown');
            if (!trigger.contains(e.target) && !dropdown.contains(e.target)) {
                trigger.classList.remove('open');
                dropdown.classList.add('hidden');
            }
        });

        // Delete modal
        function confirmDelete(url) {
            document.getElementById('deleteForm').action = url;
            document.getElementById('deleteModal').classList.add('show');
        }
        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.remove('show');
        }
        document.getElementById('deleteModal').addEventListener('click', function(e) {
            if (e.target === this) closeDeleteModal();
        });
    </script>
    @yield('scripts')
</body>
</html>
