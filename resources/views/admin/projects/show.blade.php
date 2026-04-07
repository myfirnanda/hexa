<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hexavara - POS KANA Project</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'hex-dark': '#0f172a',
                        'hex-blue': '#2563eb',
                        'hex-blue-light': '#0c5bed',
                        'hex-orange': '#ec5b13',
                        'hex-surface': '#f5f6f8',
                        'hex-slate': '#475569',
                        'hex-slate-light': '#64748b',
                        'hex-muted': '#514f5e',
                        'hex-surface-dark': '#0b1221'
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL,GRAD,opsz@100..700,0,0,20..48" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;400;500;700;800&display=swap" rel="stylesheet">
    <style>
        .hero-title { font-size: 60px; line-height: 1.1; letter-spacing: -1.8px; font-weight: 700; }
        @media (max-width: 768px) { .hero-title { font-size: 34px; letter-spacing: -0.8px; } }
        .is-open { display: block !important; }
        #mobile-menu.is-open { transform: translateX(0); }
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
            .solutions-mega-menu { opacity: 0; transform: translateX(-50%) translateY(8px); pointer-events: none; transition: opacity 0.2s ease, transform 0.2s ease; }
        .solutions-mega-menu.is-open { opacity: 1; transform: translateX(-50%) translateY(0); pointer-events: auto; }
    </style>
</head>

<body class="bg-white text-hex-dark antialiased overflow-x-hidden relative">

    <!-- Header -->
    <header class="relative w-full z-[120] bg-white lg:h-[103px] border-b border-gray-100 lg:border-none">
        <div class="max-w-[1280px] mx-auto h-full flex items-center justify-between px-4 lg:px-0 relative">
            <a href="index.html" class="lg:absolute lg:left-[37px] lg:top-1/2 lg:-translate-y-1/2 block">
                <img src="img/brand-logo-main.png" alt="Hexavara" class="w-[130px] md:w-[170px] h-auto object-contain">
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
                <a href="works.html" class="text-[17px] font-medium text-black hover:text-hex-blue transition-colors" data-i18n data-en="Works" data-id="Portofolio">Works</a>
                <a href="about_us.html" class="text-[17px] font-medium text-black hover:text-hex-blue transition-colors" data-i18n data-en="About Us" data-id="Tentang Kami">About Us</a>
                <a href="service.html" class="text-[17px] font-medium text-black hover:text-hex-blue transition-colors" data-i18n data-en="Services" data-id="Layanan">Services</a>
                <button id="solutions-trigger" class="text-[17px] font-medium text-black hover:text-hex-blue flex items-center gap-1 transition-colors">
                    <span data-i18n data-en="Solutions" data-id="Solusi">Solutions</span>
                </button>
            </nav>
            <div class="hidden lg:flex items-center gap-4 absolute left-[970px] top-1/2 -translate-y-1/2 w-[247px] h-[40px]">
                <div class="language-switch flex bg-gray-200 p-1 rounded-lg h-8 items-center" id="lang-switcher">
                    <button class="px-3 py-1 text-[10px] font-black rounded-md lang-en active bg-white shadow-sm" data-lang="en">EN</button>
                    <button class="px-3 py-1 text-[10px] font-black rounded-md lang-id text-gray-500" data-lang="id">ID</button>
                </div>
                <a href="cta.html" class="px-6 py-2.5 bg-hex-dark text-white rounded-xl text-sm font-bold hover:opacity-90 transition-all whitespace-nowrap shadow-lg" data-i18n data-en="Start a Project?" data-id="Mulai Proyek?">Start a Project?</a>
            </div>
        </div>

        <!-- Mobile Menu Sidebar -->
        <div id="mobile-menu" class="fixed inset-0 z-[200] bg-white transform translate-x-full transition-transform duration-300 overflow-y-auto lg:hidden">
            <div class="p-6">
                <!-- Mobile Header -->
                <div class="flex items-center justify-between mb-12">
                    <img src="img/brand-logo-main.png" alt="Hexavara" class="h-8 w-auto">
                    <button id="mobile-menu-close" class="p-2 text-hex-dark">
                        <span class="material-symbols-outlined text-3xl">close</span>
                    </button>
                </div>

                <!-- Mobile Links -->
                <div class="flex flex-col gap-6 mb-12">
                    <a href="works.html" class="text-2xl font-bold text-hex-dark" data-i18n data-en="Works" data-id="Portofolio">Works</a>
                    <a href="about_us.html" class="text-2xl font-bold text-hex-dark" data-i18n data-en="About Us" data-id="Tentang Kami">About Us</a>
                    <a href="service.html" class="text-2xl font-bold text-hex-dark" data-i18n data-en="Services" data-id="Layanan">Services</a>
                    <div class="border-t border-gray-100 pt-6">
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-4">Our Solutions</p>
                        <div class="grid grid-cols-1 gap-4">
                            <a href="service.html" class="flex items-center gap-3 text-lg font-medium text-hex-dark">
                                <span class="material-symbols-outlined text-hex-blue">dashboard_customize</span>
                                <span data-i18n data-en="Custom Software" data-id="Perangkat Lunak Khusus">Custom Software</span>
                            </a>
                            <a href="service.html" class="flex items-center gap-3 text-lg font-medium text-hex-dark">
                                <span class="material-symbols-outlined text-hex-blue">rocket_launch</span>
                                <span data-i18n data-en="Startup Services" data-id="Layanan Startup">Startup Services</span>
                            </a>
                            <a href="detail_product.html" class="flex items-center gap-3 text-lg font-medium text-hex-dark">
                                <span class="material-symbols-outlined text-hex-blue">account_balance_wallet</span>
                                <span data-i18n data-en="Cost System" data-id="Sistem Biaya">Cost System</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="mt-auto">
                    <a href="cta.html" class="block w-full text-center px-8 py-4 bg-hex-dark text-white rounded-2xl font-bold text-lg" data-i18n data-en="Start a Project?" data-id="Mulai Proyek?">Start a Project?</a>
                </div>
            </div>
        </div>
        <!-- Mega Menu inner (restored content) -->
        <div id="solutions-mega-menu" class="solutions-mega-menu absolute left-1/2 top-[88px] w-[min(1180px,calc(100vw-32px))] bg-white border border-gray-100 rounded-2xl shadow-2xl p-8 z-[140]">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                <div>
                    <h3 class="text-xs font-bold text-hex-slate uppercase tracking-widest mb-6 pb-2 border-b" data-i18n data-en="Solution by Service" data-id="Solusi Berdasarkan Layanan">Solution by Service</h3>
                    <div class="space-y-4">
                        <a href="service.html" class="flex items-center gap-3 text-sm font-medium text-hex-dark hover:text-hex-blue transition-colors group">
                            <span class="material-symbols-outlined text-hex-blue group-hover:scale-110 transition-transform">dashboard_customize</span>
                            <span data-i18n data-en="Custom Software" data-id="Perangkat Lunak Khusus">Custom Software</span>
                        </a>
                        <a href="service.html" class="flex items-center gap-3 text-sm font-medium text-hex-dark hover:text-hex-blue transition-colors group">
                            <span class="material-symbols-outlined text-hex-blue group-hover:scale-110 transition-transform">rocket_launch</span>
                            <span data-i18n data-en="Startup Services" data-id="Layanan Startup">Startup Services</span>
                        </a>
                        <a href="service.html" class="flex items-center gap-3 text-sm font-medium text-hex-dark hover:text-hex-blue transition-colors group">
                            <span class="material-symbols-outlined text-hex-blue group-hover:scale-110 transition-transform">settings_suggest</span>
                            <span data-i18n data-en="Managed IT" data-id="IT Terkelola">Managed IT</span>
                        </a>
                        <a href="service.html" class="flex items-center gap-3 text-sm font-medium text-hex-dark hover:text-hex-blue transition-colors group">
                            <span class="material-symbols-outlined text-hex-blue group-hover:scale-110 transition-transform">psychology</span>
                            <span data-i18n data-en="IT Consulting" data-id="Konsultasi TI">IT Consulting</span>
                        </a>
                    </div>
                </div>
                <div>
                    <h3 class="text-xs font-bold text-hex-slate uppercase tracking-widest mb-6 pb-2 border-b" data-i18n data-en="Ready to Use" data-id="Siap Digunakan">Ready to Use</h3>
                    <div class="grid grid-cols-2 gap-4">
                        <a href="detail_product.html" class="p-3 bg-blue-50 rounded-xl flex items-center gap-3 group cursor-pointer hover:bg-blue-100 transition-colors">
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
                    <a href="cta.html" class="text-sm font-bold text-hex-blue flex items-center gap-2 hover:gap-3 transition-all" data-i18n="html" data-en="Talk to us <span class='material-symbols-outlined text-sm'>arrow_forward</span>" data-id="Hubungi kami <span class='material-symbols-outlined text-sm'>arrow_forward</span>">Talk to us <span class="material-symbols-outlined text-sm">arrow_forward</span></a>
                </div>
            </div>
        </div>
    </header>

    <main>
        <!-- Hero Section -->
        <section class="relative w-full h-[583px] overflow-hidden bg-hex-surface lg:bg-transparent">
            <div class="absolute inset-0 z-0 bg-cover bg-top lg:block hidden opacity-80" style="background-image: url('img/Biru Modern Ucapan Selamat Ulang Tahun Instagram Post (2) 4.png');"></div>
            <div class="max-w-[1280px] mx-auto h-full relative z-10 px-4 lg:px-0 flex flex-col items-center justify-center text-center pt-8 lg:pt-0">
                <div class="max-w-[850px] relative z-20 px-4 transform lg:-translate-y-8">
                    <div class="flex justify-center">
                        <span class="inline-flex items-center font-bold bg-blue-100 text-blue-600 rounded-full px-4 py-1 mb-6 text-sm uppercase tracking-widest" data-i18n data-en="Software Development" data-id="Pengembangan Perangkat Lunak">Software Development</span>
                    </div>
                    <h1 class="hero-title text-hex-dark mb-6" data-i18n data-en="POS KANA" data-id="POS KANA">POS KANA</h1>
                    <p class="text-hex-slate text-lg leading-[1.65] max-w-[750px] mx-auto" data-i18n data-en="Kana Cooperative is a company engaged in trade and distribution of Indonesian products to international markets, particularly sugar and edible bird's nests. Kana also develops various innovative products such as BANU mineral water and beverages like Sano and Duel." data-id="Koperasi Kana adalah perusahaan perdagangan dan distribusi produk Indonesia ke pasar internasional, khususnya gula dan sarang burung walet. Kana juga mengembangkan berbagai produk inovatif seperti air mineral BANU dan minuman Sano serta Duel.">Kana Cooperative is a company engaged in trade and distribution of Indonesian products to international markets, particularly sugar and edible bird's nests. Kana also develops various innovative products such as BANU mineral water and beverages like Sano and Duel.</p>
                    <a href="cta.html" class="mt-10 inline-block px-8 py-3 bg-hex-dark text-white rounded-xl font-bold text-base hover:shadow-2xl hover:-translate-y-1 transition-all shadow-xl" data-i18n data-en="Consult Now" data-id="Konsultasi Sekarang">Consult Now</a>
                </div>
            </div>
        </section>

        <!-- Preview Gallery -->
        <section class="py-24 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl lg:text-[42px] font-bold text-hex-dark mb-4 leading-tight" data-i18n data-en="Preview Project" data-id="Pratinjau Proyek">Preview Project</h2>
                    <p class="text-slate-500 max-w-2xl mx-auto text-lg" data-i18n data-en="Get an overview of the various project documentation." data-id="Dapatkan gambaran umum tentang berbagai dokumentasi proyek.">Get an overview of the various project documentation.</p>
                </div>

                <div class="flex flex-col lg:flex-row gap-8 lg:gap-12">
                    <!-- Thumbs -->
                    <div class="flex lg:flex-col gap-4 overflow-x-auto lg:overflow-visible pb-4 lg:pb-0 hide-scrollbar w-full lg:w-64 flex-shrink-0">
                        <button class="preview-thumb relative rounded-2xl overflow-hidden border-2 border-transparent hover:border-hex-blue transition-all active ring-2 ring-hex-blue" data-image="img/POS_KANA1.png">
                            <img src="img/POS_KANA1.png" alt="Preview 1" class="w-full h-24 lg:h-32 object-cover">
                        </button>
                        <button class="preview-thumb relative rounded-2xl overflow-hidden border-2 border-transparent hover:border-hex-blue transition-all opacity-60" data-image="img/POS_KANA2.png">
                            <img src="img/POS_KANA2.png" alt="Preview 2" class="w-full h-24 lg:h-32 object-cover">
                        </button>
                        <button class="preview-thumb relative rounded-2xl overflow-hidden border-2 border-transparent hover:border-hex-blue transition-all opacity-60" data-image="img/POS_KANA3.png">
                            <img src="img/POS_KANA3.png" alt="Preview 3" class="w-full h-24 lg:h-32 object-cover">
                        </button>
                    </div>

                    <!-- Main Image -->
                    <div class="flex-1 bg-hex-surface rounded-[40px] p-4 shadow-2xl border border-slate-100 flex items-center justify-center">
                        <img id="preview-main-image" src="img/POS_KANA1.png" alt="POS KANA main preview" class="w-full h-auto max-h-[700px] object-contain rounded-3xl transition-opacity duration-300">
                    </div>
                </div>
            </div>
        </section>

        <!-- Summary Section -->
        <section class="py-24 bg-hex-surface">
            <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col gap-2 mb-8">
                    <span class="text-blue-600 font-bold text-sm tracking-widest uppercase" data-i18n data-en="SUMMARY" data-id="RINGKASAN">SUMMARY</span>
                    <h2 class="text-3xl lg:text-4xl font-bold text-hex-dark" data-i18n data-en="Learning About POS Kana" data-id="Mempelajari Tentang POS Kana">Learning About POS Kana</h2>
                </div>
                <div class="space-y-6 text-hex-slate text-lg leading-relaxed">
                    <p data-i18n data-en="POS Kana is a web-based business management system designed to support distribution and trading operations within a single integrated platform. The system helps companies manage business processes more efficiently, from procurement and sales transactions to comprehensive business reporting." data-id="POS Kana adalah sistem manajemen bisnis berbasis web yang dirancang untuk mendukung operasional distribusi dan perdagangan dalam satu platform terintegrasi. Sistem ini membantu mengatur proses bisnis secara efisien, mulai dari pengadaan hingga pelaporan bisnis.">
                        POS Kana is a web-based business management system designed to support distribution and trading operations within a single integrated platform. The system helps companies manage business processes more efficiently, from procurement and sales transactions to comprehensive business reporting.
                    </p>
                    <p data-i18n data-en="The dashboard provides real-time business performance monitoring, including sales transactions, procurement activities, and financial reports, enabling management to make faster and more accurate decisions." data-id="Dashboard ini menyediakan pemantauan performa bisnis secara real-time, termasuk transaksi penjualan, aktivitas pengadaan, dan laporan keuangan, memungkinkan manajemen mengambil keputusan lebih cepat dan akurat.">
                        The dashboard provides real-time business performance monitoring, including sales transactions, procurement activities, and financial reports, enabling management to make faster and more accurate decisions.
                    </p>
                    <div>
                        <p class="font-bold text-hex-dark mb-4" data-i18n data-en="Key advantages:" data-id="Keuntungan utama:">Key advantages:</p>
                        <ul class="list-disc pl-5 space-y-2">
                            <li data-i18n data-en="Integrated POS and business management system" data-id="Sistem POS dan manajemen bisnis yang terintegrasi">Integrated POS and business management system</li>
                            <li data-i18n data-en="Real-time dashboard for monitoring sales, procurement, and financial performance" data-id="Dashboard real-time untuk memantau penjualan, pengadaan, dan performa keuangan">Real-time dashboard for monitoring sales, procurement, and financial performance</li>
                            <li data-i18n data-en="Inventory and warehouse management across multiple locations" data-id="Manajemen stok dan gudang di berbagai lokasi">Inventory and warehouse management across multiple locations</li>
                            <li data-i18n data-en="Sales KPI monitoring and performance tracking" data-id="Pemantauan KPI penjualan dan pelacakan performa">Sales KPI monitoring and performance tracking</li>
                            <li data-i18n data-en="Comprehensive reporting covering sales, inventory, and finance" data-id="Pelaporan komprehensif mencakup penjualan, stok, dan keuangan">Comprehensive reporting covering sales, inventory, and finance</li>
                        </ul>
                    </div>
                    <p data-i18n data-en="Through the implementation of POS Kana, the company can manage its business operations in a more structured way, improve distribution efficiency, and gain accurate business insights to support sustainable growth." data-id="Melalui implementasi POS Kana, perusahaan dapat mengelola operasional bisnisnya secara lebih terstruktur, meningkatkan efisiensi distribusi, dan mendapatkan wawasan bisnis yang akurat.">
                        Through the implementation of POS Kana, the company can manage its business operations in a more structured way, improve distribution efficiency, and gain accurate business insights to support sustainable growth.
                    </p>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
    <section class="pt-0 pb-0 bg-white overflow-hidden">
        <div class="max-w-7xl mx-auto px-10 sm:px-20 lg:px-32">
            <div class="grid grid-cols-1 md:grid-cols-[auto_1fr] gap-16 items-end md:-ml-12">
                <!-- Left: Talent Image -->
                <div class="relative order-2 md:order-1 flex justify-start items-end">
                    <img src="img/talent.png" alt="IT Consultant Talent" class="w-full h-auto object-contain max-h-[500px] transform translate-y-2">
                </div>

                <!-- Right: Content -->
                <div class="order-1 md:order-2 pb-20 md:-mt-8">
                    <h2 class="text-3xl md:text-[42px] font-bold text-[#121B26] mb-6 leading-tight" data-i18n="html" data-en="Get the Right IT Solutions from the <span class='text-blue-600'>Best IT Vendor</span> - Consult with Us Today!" data-id="Dapatkan Solusi IT yang Tepat dari <span class='text-blue-600'>Vendor IT Terbaik</span> — Konsultasi Sekarang!">
                        Get the Right IT Solutions from the <span class="text-blue-600">Best IT Vendor</span> — Consult with Us Today!
                    </h2>
                    <p class="text-slate-500 text-base md:text-lg mb-10 max-w-2xl leading-relaxed" data-i18n data-en="Discuss your IT challenges, and our team of experienced experts will provide tailored solutions to drive your business growth and success." data-id="Diskusikan tantangan IT Anda, dan tim ahli berpengalaman kami akan memberikan solusi yang disesuaikan untuk mendorong pertumbuhan bisnis Anda.">
                        Discuss your IT challenges, and our team of experienced experts will provide tailored solutions to drive your business growth and success.
                    </p>
                    <a href="#" class="inline-flex items-center px-8 py-3 rounded-xl bg-hex-dark text-white font-bold text-base hover:shadow-2xl hover:-translate-y-1 transition-all shadow-xl" data-i18n data-en="Consult Now" data-id="Konsultasi Sekarang">
                        Consult Now
                    </a>
                </div>
            </div>
        </div>
    </section>
    </main>

    <!-- Footer -->
    <footer class="bg-white text-slate-600 py-16 border-t border-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-12 border-b border-slate-100 pb-12">
                <div class="lg:col-span-2">
                    <img src="img/brand-logo-main.png" alt="Hexavara logo"
                        class="h-12 w-auto mb-6 opacity-90">
                    <div class="footer-brand-name font-bold text-slate-900 text-xl mb-2">Hexavara Technology</div>
                    <div class="footer-brand-tag text-slate-500 mb-6" data-i18n data-en="Software Development and IT Consulting" data-id="Pengembangan Perangkat Lunak dan Konsultan IT">Software Development and IT Consulting</div>
                    <div class="footer-brand-description text-slate-500 text-base max-w-md">
                        <strong class="text-slate-900">Surabaya</strong><br />
                        Graha Bukopin Lantai 7 dan 12, Jl. Panglima Sudirman No. 10-18, Embong Kaliasin, Genteng, Kota
                        Surabaya, Jawa Timur 60271
                    </div>
                </div>
                <div>
                    <h4 class="footer-heading text-slate-900 font-bold mb-6 uppercase tracking-wider text-sm" data-i18n data-en="Company" data-id="Perusahaan">Company</h4>
                    <ul class="space-y-4">
                        <li><a href="works.html" class="footer-link hover:text-blue-600 transition-colors" data-i18n data-en="Works" data-id="Portofolio">Works</a></li>
                        <li><a href="about_us.html" class="footer-link hover:text-blue-600 transition-colors" data-i18n data-en="About Us" data-id="Tentang Kami">About Us</a>
                        </li>
                        <li><a href="service.html" class="footer-link hover:text-blue-600 transition-colors" data-i18n data-en="Services" data-id="Layanan">Services</a>
                        </li>
                        <li><a href="solution.html" class="footer-link hover:text-blue-600 transition-colors" data-i18n data-en="Solutions" data-id="Solusi">Solutions</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h4 class="footer-heading text-slate-900 font-bold mb-6 uppercase tracking-wider text-sm" data-i18n data-en="Contact Us" data-id="Hubungi Kami">Contact Us
                    </h4>
                    <ul class="space-y-4 mb-8">
                        <li class="flex items-center gap-3"><span
                                class="material-symbols-outlined text-slate-400">mail</span> info@hexavara.com</li>
                        <li class="flex items-center gap-3"><span
                                class="material-symbols-outlined text-slate-400">call</span> +628113451550</li>
                    </ul>
                    <h4 class="footer-heading text-slate-900 font-bold mb-6 uppercase tracking-wider text-sm" data-i18n data-en="Follow Us" data-id="Ikuti Kami">Follow Us</h4>
                    <div class="flex gap-4">
                        <a href="https://instagram.com/hexavara"
                            class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center hover:bg-hex-dark hover:text-white transition-colors"
                            aria-label="Instagram">
                            <svg class="w-5 h-5 text-slate-600 hover:text-inherit" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c.796 0 1.441.645 1.441 1.44s-.645 1.44-1.441 1.44c-.795 0-1.439-.645-1.439-1.44s.644-1.44 1.439-1.44z"/></svg>
                        </a>
                        <a href="https://linkedin.com/company/hexavara"
                            class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center hover:bg-hex-dark hover:text-white transition-colors"
                            aria-label="LinkedIn">
                            <svg class="w-5 h-5 text-slate-600 hover:text-inherit" viewBox="0 0 24 24" fill="currentColor"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                        </a>
                        <a href="https://api.whatsapp.com"
                            class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center hover:bg-hex-dark hover:text-white transition-colors"
                            aria-label="WhatsApp">
                            <svg class="w-5 h-5 text-slate-600 hover:text-inherit" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.733 1.482h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="footer-copyright text-sm text-slate-400" data-i18n data-en="© 2026 Hexavara Tech. All rights reserved." data-id="© 2026 Hexavara Tech. Hak cipta dilindungi.">© 2026 Hexavara Tech. All rights reserved.</div>
                <div class="mt-4 md:mt-0 flex gap-6 text-sm">
                    <a href="#" class="hover:text-blue-600 transition-colors" data-i18n data-en="Privacy Policy" data-id="Kebijakan Privasi">Privacy Policy</a>
                    <a href="#" class="hover:text-blue-600 transition-colors" data-i18n data-en="Terms of Service" data-id="Syarat Layanan">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>

    <script src="js/main.js"></script>
    <script src="js/lang.js"></script>
    <script>
        // Gallery Logic
        const thumbs = document.querySelectorAll('.preview-thumb');
        const mainImage = document.getElementById('preview-main-image');

        thumbs.forEach(thumb => {
            thumb.addEventListener('click', () => {
                thumbs.forEach(t => {
                    t.classList.remove('active', 'ring-2', 'ring-hex-blue', 'opacity-100');
                    t.classList.add('opacity-60');
                });
                thumb.classList.add('active', 'ring-2', 'ring-hex-blue', 'opacity-100');
                thumb.classList.remove('opacity-60');

                mainImage.style.opacity = '0';
                setTimeout(() => {
                    mainImage.src = thumb.getAttribute('data-image');
                    mainImage.style.opacity = '1';
                }, 200);
            });
        });
    </script>
    <script src="js/lang.js"></script>
</body>

</html>





