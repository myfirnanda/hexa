<!-- Header -->
<header class="relative w-full z-[120] bg-white lg:h-[103px] border-b border-gray-100 lg:border-none">
    <div class="max-w-[1280px] mx-auto h-full flex items-center justify-between px-4 lg:px-0 relative">
        <a href="{{ route('home') }}" class="lg:absolute lg:left-[37px] lg:top-1/2 lg:-translate-y-1/2 block">
            <img src="{{ asset('assets/img/brand-logo-main.png') }}" alt="Hexavara" class="w-[130px] md:w-[170px] h-auto object-contain">
        </a>

        <!-- Mobile Menu Toggles -->
        <div class="flex items-center gap-4 lg:hidden">
            <div class="flex items-center gap-2 bg-gray-100 p-1 rounded-lg">
                <button class="px-2 py-0.5 text-[8px] font-black rounded-md active bg-white shadow-sm" data-lang="en">EN</button>
                <button class="px-2 py-0.5 text-[8px] font-black rounded-md text-gray-500" data-lang="id">ID</button>
            </div>
            <button id="mobile-menu-open" class="p-2 text-hex-dark">
                <span class="material-symbols-outlined text-3xl">menu</span>
            </button>
        </div>

        <nav class="hidden lg:flex items-center gap-8 absolute left-[380px] top-1/2 -translate-y-1/2">
            <a href="{{ route('works.index') }}" class="text-[17px] font-medium text-black hover:text-hex-blue transition-colors" data-i18n data-en="Works" data-id="Portofolio">Works</a>
            <a href="{{ route('about') }}" class="text-[17px] font-medium text-black hover:text-hex-blue transition-colors" data-i18n data-en="About Us" data-id="Tentang Kami">About Us</a>
            <a href="{{ route('services.index') }}" class="text-[17px] font-medium text-black hover:text-hex-blue transition-colors" data-i18n data-en="Services" data-id="Layanan">Services</a>
            <button id="solutions-trigger" class="text-[17px] font-medium text-black hover:text-hex-blue flex items-center gap-1 transition-colors">
                <span data-i18n data-en="Solutions" data-id="Solusi">Solutions</span>
            </button>
        </nav>
        <div class="hidden lg:flex items-center gap-4 absolute left-[970px] top-1/2 -translate-y-1/2 w-[247px] h-[40px]">
            <div class="language-switch flex bg-gray-200 p-1 rounded-lg h-8 items-center" id="lang-switcher">
                <button class="px-3 py-1 text-[10px] font-black rounded-md lang-en active bg-white shadow-sm" data-lang="en">EN</button>
                <button class="px-3 py-1 text-[10px] font-black rounded-md lang-id text-gray-500" data-lang="id">ID</button>
            </div>
            <a href="{{ route('start-project') }}" class="px-6 py-2.5 bg-hex-dark text-white rounded-xl text-sm font-bold hover:opacity-90 transition-all whitespace-nowrap shadow-lg" data-i18n data-en="Start a Project?" data-id="Mulai Proyek?">Start a Project?</a>
        </div>
    </div>

    <!-- Mobile Menu Sidebar -->
    <div id="mobile-menu" class="fixed inset-0 z-[200] bg-white transform translate-x-full transition-transform duration-300 overflow-y-auto lg:hidden">
        <div class="p-6">
            <div class="flex items-center justify-between mb-12">
                <img src="{{ asset('assets/img/brand-logo-main.png') }}" alt="Hexavara" class="h-8 w-auto">
                <button id="mobile-menu-close" class="p-2 text-hex-dark">
                    <span class="material-symbols-outlined text-3xl">close</span>
                </button>
            </div>
            <div class="flex flex-col gap-6 mb-12">
                <a href="{{ route('works.index') }}" class="text-2xl font-bold text-hex-dark" data-i18n data-en="Works" data-id="Portofolio">Works</a>
                <a href="{{ route('about') }}" class="text-2xl font-bold text-hex-dark" data-i18n data-en="About Us" data-id="Tentang Kami">About Us</a>
                <a href="{{ route('services.index') }}" class="text-2xl font-bold text-hex-dark" data-i18n data-en="Services" data-id="Layanan">Services</a>
                <div class="border-t border-gray-100 pt-6">
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-4">Our Solutions</p>
                    <div class="grid grid-cols-1 gap-4">
                        <a href="{{ route('services.index') }}" class="flex items-center gap-3 text-lg font-medium text-hex-dark">
                            <span class="material-symbols-outlined text-hex-blue">dashboard_customize</span>
                            <span data-i18n data-en="Custom Software" data-id="Perangkat Lunak Khusus">Custom Software</span>
                        </a>
                        <a href="{{ route('services.index') }}" class="flex items-center gap-3 text-lg font-medium text-hex-dark">
                            <span class="material-symbols-outlined text-hex-blue">rocket_launch</span>
                            <span data-i18n data-en="Startup Services" data-id="Layanan Startup">Startup Services</span>
                        </a>
                        <a href="{{ route('products.show') }}" class="flex items-center gap-3 text-lg font-medium text-hex-dark">
                            <span class="material-symbols-outlined text-hex-blue">account_balance_wallet</span>
                            <span data-i18n data-en="Cost System" data-id="Sistem Biaya">Cost System</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="mt-auto">
                <a href="{{ route('start-project') }}" class="block w-full text-center px-8 py-4 bg-hex-dark text-white rounded-2xl font-bold text-lg" data-i18n data-en="Start a Project?" data-id="Mulai Proyek?">Start a Project?</a>
            </div>
        </div>
    </div>

    <!-- Mega Menu -->
    <div id="solutions-mega-menu" class="solutions-mega-menu absolute left-1/2 top-[88px] w-[min(1180px,calc(100vw-32px))] bg-white border border-gray-100 rounded-2xl shadow-2xl p-8 z-[140]">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
            <div>
                <h3 class="text-xs font-bold text-hex-slate uppercase tracking-widest mb-6 pb-2 border-b" data-i18n data-en="Solution by Service" data-id="Solusi Berdasarkan Layanan">Solution by Service</h3>
                <div class="space-y-4">
                    <a href="{{ route('services.index') }}" class="flex items-center gap-3 text-sm font-medium text-hex-dark hover:text-hex-blue transition-colors group">
                        <span class="material-symbols-outlined text-hex-blue group-hover:scale-110 transition-transform">dashboard_customize</span>
                        <span data-i18n data-en="Custom Software" data-id="Perangkat Lunak Khusus">Custom Software</span>
                    </a>
                    <a href="{{ route('services.index') }}" class="flex items-center gap-3 text-sm font-medium text-hex-dark hover:text-hex-blue transition-colors group">
                        <span class="material-symbols-outlined text-hex-blue group-hover:scale-110 transition-transform">rocket_launch</span>
                        <span data-i18n data-en="Startup Services" data-id="Layanan Startup">Startup Services</span>
                    </a>
                    <a href="{{ route('services.index') }}" class="flex items-center gap-3 text-sm font-medium text-hex-dark hover:text-hex-blue transition-colors group">
                        <span class="material-symbols-outlined text-hex-blue group-hover:scale-110 transition-transform">settings_suggest</span>
                        <span data-i18n data-en="Managed IT" data-id="IT Terkelola">Managed IT</span>
                    </a>
                    <a href="{{ route('services.index') }}" class="flex items-center gap-3 text-sm font-medium text-hex-dark hover:text-hex-blue transition-colors group">
                        <span class="material-symbols-outlined text-hex-blue group-hover:scale-110 transition-transform">psychology</span>
                        <span data-i18n data-en="IT Consulting" data-id="Konsultasi TI">IT Consulting</span>
                    </a>
                </div>
            </div>
            <div>
                <h3 class="text-xs font-bold text-hex-slate uppercase tracking-widest mb-6 pb-2 border-b" data-i18n data-en="Ready to Use" data-id="Siap Digunakan">Ready to Use</h3>
                <div class="grid grid-cols-2 gap-4">
                    <a href="{{ route('products.show') }}" class="p-3 bg-blue-50 rounded-xl flex items-center gap-3 group cursor-pointer hover:bg-blue-100 transition-colors">
                        <span class="material-symbols-outlined text-blue-600">account_balance_wallet</span>
                        <div><p class="text-[10px] font-bold" data-i18n data-en="Cost System" data-id="Sistem Biaya">Cost System</p><p class="text-[8px] text-blue-600 uppercase font-bold" data-i18n data-en="Platform" data-id="Platform">Platform</p></div>
                    </a>
                    <a href="#" class="p-3 bg-indigo-50 rounded-xl flex items-center gap-3 group cursor-pointer hover:bg-indigo-100 transition-colors">
                        <span class="material-symbols-outlined text-indigo-600">payments</span>
                        <div><p class="text-[10px] font-bold" data-i18n data-en="VaraPay" data-id="VaraPay">VaraPay</p><p class="text-[8px] text-indigo-600 uppercase font-bold" data-i18n data-en="Fintech" data-id="Fintech">Fintech</p></div>
                    </a>
                    <a href="#" class="p-3 bg-teal-50 rounded-xl flex items-center gap-3 group cursor-pointer hover:bg-teal-100 transition-colors">
                        <span class="material-symbols-outlined text-teal-600">grid_view</span>
                        <div><p class="text-[10px] font-bold" data-i18n data-en="NexaGrid" data-id="NexaGrid">NexaGrid</p><p class="text-[8px] text-teal-600 uppercase font-bold" data-i18n data-en="AI Suite" data-id="Suite AI">AI Suite</p></div>
                    </a>
                    <a href="#" class="p-3 bg-sky-50 rounded-xl flex items-center gap-3 group cursor-pointer hover:bg-sky-100 transition-colors">
                        <span class="material-symbols-outlined text-sky-600">cloud</span>
                        <div><p class="text-[10px] font-bold" data-i18n data-en="VaraCloud" data-id="VaraCloud">VaraCloud</p><p class="text-[8px] text-sky-600 uppercase font-bold" data-i18n data-en="Infra" data-id="Infra">Infra</p></div>
                    </a>
                </div>
            </div>
            <div class="bg-gray-50 p-6 rounded-2xl flex flex-col justify-center">
                <p class="text-sm font-bold text-hex-dark mb-2" data-i18n data-en="Need a custom solution?" data-id="Butuh solusi khusus?">Need a custom solution?</p>
                <p class="text-[12px] text-hex-slate mb-6" data-i18n data-en="Our team of experts is ready to help you build the perfect platform for your business needs." data-id="Tim ahli kami siap membantu Anda membangun platform yang sempurna untuk kebutuhan bisnis Anda.">Our team of experts is ready to help you build the perfect platform for your business needs.</p>
                <a href="{{ route('start-project') }}" class="text-sm font-bold text-hex-blue flex items-center gap-2 hover:gap-3 transition-all" data-i18n="html" data-en="Talk to us <span class='material-symbols-outlined text-sm'>arrow_forward</span>" data-id="Hubungi kami <span class='material-symbols-outlined text-sm'>arrow_forward</span>">Talk to us <span class="material-symbols-outlined text-sm">arrow_forward</span></a>
            </div>
        </div>
    </div>
</header>
