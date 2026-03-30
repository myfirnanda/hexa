@extends('layouts.main')
@section('title', 'Hexavara - Software Development')
@push('styles')
<style>
        .hero-title { font-size: 60px; line-height: 1.1; letter-spacing: -1.8px; font-weight: 700; }
        @media (max-width: 768px) { .hero-title { font-size: 34px; letter-spacing: -0.8px; } }
        .solutions-mega-menu { opacity: 0; transform: translateX(-50%) translateY(8px); pointer-events: none; transition: opacity 0.2s ease, transform 0.2s ease; }
        .solutions-mega-menu.is-open { opacity: 1; transform: translateX(-50%) translateY(0); pointer-events: auto; }
        body { font-family: 'Inter', sans-serif; }

        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
@endpush
@section('content')
    <main>
        <!-- Hero Section -->
        <section class="relative w-full h-[583px] overflow-hidden bg-hex-surface lg:bg-transparent">
            <div class="absolute inset-0 z-0 bg-cover bg-top lg:block hidden opacity-80" style="background-image: url('img/Biru Modern Ucapan Selamat Ulang Tahun Instagram Post (2) 4.png');"></div>
            <div class="max-w-[1280px] mx-auto h-full relative z-10 px-4 lg:px-0 flex flex-col items-center pt-16 pb-4 text-center">
                <div class="max-w-[950px] flex-grow flex flex-col justify-center transform lg:-translate-y-8">
                    <h1 class="hero-title text-hex-dark mb-8" data-i18n data-en="Startup & Incubator" data-id="Startup & Inkubator">Startup & Inkubator</h1>
                    <p class="text-hex-slate text-lg leading-[1.65] max-w-[850px] mx-auto" data-i18n data-en="Navigate the complexities of startup success with our expert consulting services. From ideation to execution, we provide strategic guidance, hands-on mentoring, and access to a powerful network of investment partners to accelerate your growth." data-id="Navigasi kompleksitas kesuksesan startup dengan layanan konsultasi ahli kami. Mulai dari ide hingga eksekusi, kami menyediakan panduan strategis, mentoring langsung, dan akses ke jaringan mitra investor yang kuat untuk mempercepat pertumbuhan Anda.">
                        Navigasi kompleksitas kesuksesan startup dengan layanan konsultasi ahli kami. Mulai dari ide hingga eksekusi, kami menyediakan panduan strategis, mentoring langsung, dan akses ke jaringan mitra investor yang kuat untuk mempercepat pertumbuhan Anda.
                    </p>
                    <div class="mt-10">
                        <a href="cta.html" class="inline-block px-8 py-3 bg-hex-dark text-white rounded-xl font-bold text-base hover:shadow-2xl hover:-translate-y-1 transition-all shadow-xl" data-i18n data-en="Consult Now" data-id="Konsultasi Sekarang">Konsultasi Sekarang</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Our Offerings -->
        <section class="py-24 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl lg:text-[42px] font-bold text-hex-dark mb-4 leading-tight" data-i18n data-en="Our Offerings" data-id="Penawaran Kami">Penawaran Kami</h2>
                    <p class="text-slate-500 max-w-2xl mx-auto text-lg" data-i18n data-en="A comprehensive incubator program designed to transform your vision into a sustainable business." data-id="Program inkubator komprehensif yang dirancang untuk mengubah visi Anda menjadi bisnis yang berkelanjutan.">Program inkubator komprehensif yang dirancang untuk mengubah visi Anda menjadi bisnis yang berkelanjutan.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Card 1 -->
                    <div class="group bg-white rounded-[40px] p-10 border border-slate-100 hover:shadow-2xl transition-all duration-300">
                        <div class="w-14 h-14 rounded-2xl bg-hex-surface flex items-center justify-center mb-8 group-hover:bg-hex-dark group-hover:text-white transition-colors">
                            <span class="material-symbols-outlined text-3xl">groups</span>
                        </div>
                        <h3 class="text-2xl font-bold text-hex-dark mb-4" data-i18n data-en="Coaching" data-id="Coaching">Coaching</h3>
                        <p class="text-hex-slate text-base leading-relaxed" data-i18n data-en="One-on-one sessions with industry veterans to refine your business model and strategy." data-id="Sesi tatap muka dengan veteran industri untuk menyempurnakan model bisnis dan strategi Anda.">Sesi tatap muka dengan veteran industri untuk menyempurnakan model bisnis dan strategi Anda.</p>
                    </div>
                    <!-- Card 2 -->
                    <div class="group bg-white rounded-[40px] p-10 border border-slate-100 hover:shadow-2xl transition-all duration-300">
                        <div class="w-14 h-14 rounded-2xl bg-hex-surface flex items-center justify-center mb-8 group-hover:bg-hex-dark group-hover:text-white transition-colors">
                            <span class="material-symbols-outlined text-3xl">payments</span>
                        </div>
                        <h3 class="text-2xl font-bold text-hex-dark mb-4" data-i18n data-en="Investment" data-id="Investasi">Investasi</h3>
                        <p class="text-hex-slate text-base leading-relaxed" data-i18n data-en="Preparation for funding rounds through financial auditing and pitch desk optimization." data-id="Persiapan untuk putaran pendanaan melalui audit keuangan dan optimasi pitch deck.">Persiapan untuk putaran pendanaan melalui audit keuangan dan optimasi pitch deck.</p>
                    </div>
                    <!-- Card 3 -->
                    <div class="group bg-white rounded-[40px] p-10 border border-slate-100 hover:shadow-2xl transition-all duration-300">
                        <div class="w-14 h-14 rounded-2xl bg-hex-surface flex items-center justify-center mb-8 group-hover:bg-hex-dark group-hover:text-white transition-colors">
                            <span class="material-symbols-outlined text-3xl">account_balance_wallet</span>
                        </div>
                        <h3 class="text-2xl font-bold text-hex-dark mb-4" data-i18n data-en="Fundraising" data-id="Penggalangan Dana">Penggalangan Dana</h3>
                        <p class="text-hex-slate text-base leading-relaxed" data-i18n data-en="Connecting startups with venture capitals and angel investors for necessary capital injection." data-id="Menghubungkan startup dengan modal ventura dan investor malaikat untuk suntikan modal.">Menghubungkan startup dengan modal ventura dan investor malaikat untuk suntikan modal.</p>
                    </div>
                    <!-- Card 4 -->
                    <div class="group bg-white rounded-[40px] p-10 border border-slate-100 hover:shadow-2xl transition-all duration-300">
                        <div class="w-14 h-14 rounded-2xl bg-hex-surface flex items-center justify-center mb-8 group-hover:bg-hex-dark group-hover:text-white transition-colors">
                            <span class="material-symbols-outlined text-3xl">rocket_launch</span>
                        </div>
                        <h3 class="text-2xl font-bold text-hex-dark mb-4" data-i18n data-en="Early Stage Development" data-id="Pengembangan Awal">Pengembangan Awal</h3>
                        <p class="text-hex-slate text-base leading-relaxed" data-i18n data-en="Technical development support to build your MVP (Minimum Viable Product) quickly and correctly." data-id="Dukungan pengembangan teknis untuk membangun MVP (Minimum Viable Product) dengan cepat dan tepat.">Dukungan pengembangan teknis untuk membangun MVP (Minimum Viable Product) dengan cepat dan tepat.</p>
                    </div>
                    <!-- Card 5 -->
                    <div class="group bg-white rounded-[40px] p-10 border border-slate-100 hover:shadow-2xl transition-all duration-300">
                        <div class="w-14 h-14 rounded-2xl bg-hex-surface flex items-center justify-center mb-8 group-hover:bg-hex-dark group-hover:text-white transition-colors">
                            <span class="material-symbols-outlined text-3xl">handshake</span>
                        </div>
                        <h3 class="text-2xl font-bold text-hex-dark mb-4" data-i18n data-en="Partnerships" data-id="Kemitraan">Kemitraan</h3>
                        <p class="text-hex-slate text-base leading-relaxed" data-i18n data-en="Forging strategic alliances with corporate partners to open new market opportunities." data-id="Menjalin aliansi strategis dengan mitra korporat untuk membuka peluang pasar baru.">Menjalin aliansi strategis dengan mitra korporat untuk membuka peluang pasar baru.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Core Advantages Section -->
        <section class="py-24 bg-hex-surface-dark text-white overflow-hidden relative">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="text-center mb-20">
                    <span class="text-blue-400 font-bold uppercase tracking-[0.2em] text-sm mb-4 block" data-i18n data-en="CORE ADVANTAGES" data-id="KEUNGGULAN UTAMA">KEUNGGULAN UTAMA</span>
                    <h2 class="text-[42px] font-bold" data-i18n data-en="Why Choose Our Startup & Incubator Program?" data-id="Mengapa Memilih Program Inkubator Kami?">Mengapa Memilih Program Inkubator Kami?</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <!-- Advantage 1 -->
                    <div class="flex flex-col items-center text-center">
                        <div class="w-12 h-12 rounded-full bg-blue-600/20 border border-blue-500/30 flex items-center justify-center mb-6">
                            <span class="material-symbols-outlined text-blue-400">trending_up</span>
                        </div>
                        <h4 class="text-xl font-bold mb-3" data-i18n data-en="Growth Acceleration" data-id="Akselerasi Pertumbuhan">Akselerasi Pertumbuhan</h4>
                        <p class="text-slate-400 text-sm leading-relaxed" data-i18n data-en="Faster time-to-market with proven strategies and operational efficiency." data-id="Waktu ke pasar yang lebih cepat dengan strategi terbukti dan efisiensi operasional.">Waktu ke pasar yang lebih cepat dengan strategi terbukti dan efisiensi operasional.</p>
                    </div>
                    <!-- Advantage 2 -->
                    <div class="flex flex-col items-center text-center">
                        <div class="w-12 h-12 rounded-full bg-blue-600/20 border border-blue-500/30 flex items-center justify-center mb-6">
                            <span class="material-symbols-outlined text-blue-400">hub</span>
                        </div>
                        <h4 class="text-xl font-bold mb-3" data-i18n data-en="Strong Investor Network" data-id="Jaringan Investor Kuat">Jaringan Investor Kuat</h4>
                        <p class="text-slate-400 text-sm leading-relaxed" data-i18n data-en="Direct access to top venture capitals and angel investors in the region." data-id="Akses langsung ke modal ventura dan investor malaikat papan atas di kawasan ini.">Akses langsung ke modal ventura dan investor malaikat papan atas di kawasan ini.</p>
                    </div>
                    <!-- Advantage 3 -->
                    <div class="flex flex-col items-center text-center">
                        <div class="w-12 h-12 rounded-full bg-blue-600/20 border border-blue-500/30 flex items-center justify-center mb-6">
                            <span class="material-symbols-outlined text-blue-400">architecture</span>
                        </div>
                        <h4 class="text-xl font-bold mb-3" data-i18n data-en="Business Model Optimization" data-id="Optimasi Model Bisnis">Optimasi Model Bisnis</h4>
                        <p class="text-slate-400 text-sm leading-relaxed" data-i18n data-en="Refining your unique value proposition to ensure product-market fit." data-id="Menyempurnakan proposisi nilai unik Anda untuk memastikan kesesuaian produk-pasar.">Menyempurnakan proposisi nilai unik Anda untuk memastikan kesesuaian produk-pasar.</p>
                    </div>
                    <!-- Advantage 4 -->
                    <div class="flex flex-col items-center text-center">
                        <div class="w-12 h-12 rounded-full bg-blue-600/20 border border-blue-500/30 flex items-center justify-center mb-6">
                            <span class="material-symbols-outlined text-blue-400">school</span>
                        </div>
                        <h4 class="text-xl font-bold mb-3" data-i18n data-en="Expert Mentorship" data-id="Mentorship Ahli">Mentorship Ahli</h4>
                        <p class="text-slate-400 text-sm leading-relaxed" data-i18n data-en="Guidance from serial entrepreneurs and domain experts who've done it before." data-id="Panduan dari wirausahawan serial dan ahli domain yang telah melakukannya sebelumnya.">Panduan dari wirausahawan serial dan ahli domain yang telah melakukannya sebelumnya.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Technology Stack -->
        <section class="py-24 bg-slate-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="mb-12">
                    <span class="text-hex-blue font-bold uppercase tracking-[0.2em] text-sm mb-4 block" data-i18n data-en="TECH STACK" data-id="TECH STACK">TECH STACK</span>
                    <h2 class="text-[42px] font-bold text-hex-dark" data-i18n data-en="Empowering startups with practical and scalable tools" data-id="Memberdayakan startup dengan perangkat praktis dan terukur">Memberdayakan startup dengan perangkat praktis dan terukur</h2>
                </div>

                <div class="flex flex-wrap gap-3">
                    <span class="px-6 py-2.5 bg-white border border-slate-200 rounded-full text-sm font-bold text-slate-600 shadow-sm">React</span>
                    <span class="px-6 py-2.5 bg-white border border-slate-200 rounded-full text-sm font-bold text-slate-600 shadow-sm">Next.js</span>
                    <span class="px-6 py-2.5 bg-white border border-slate-200 rounded-full text-sm font-bold text-slate-600 shadow-sm">Flutter</span>
                    <span class="px-6 py-2.5 bg-white border border-slate-200 rounded-full text-sm font-bold text-slate-600 shadow-sm">Node.js</span>
                    <span class="px-6 py-2.5 bg-white border border-slate-200 rounded-full text-sm font-bold text-slate-600 shadow-sm">Laravel</span>
                    <span class="px-6 py-2.5 bg-white border border-slate-200 rounded-full text-sm font-bold text-slate-600 shadow-sm">Firebase</span>
                    <span class="px-6 py-2.5 bg-white border border-slate-200 rounded-full text-sm font-bold text-slate-600 shadow-sm">Supabase</span>
                    <span class="px-6 py-2.5 bg-white border border-slate-200 rounded-full text-sm font-bold text-slate-600 shadow-sm">AWS / GCP</span>
                    <span class="px-6 py-2.5 bg-white border border-slate-200 rounded-full text-sm font-bold text-slate-600 shadow-sm">Vercel</span>
                    <span class="px-6 py-2.5 bg-white border border-slate-200 rounded-full text-sm font-bold text-slate-600 shadow-sm">Google Analytics</span>
                    <span class="px-6 py-2.5 bg-white border border-slate-200 rounded-full text-sm font-bold text-slate-600 shadow-sm">Figma</span>
                    <span class="px-6 py-2.5 bg-white border border-slate-200 rounded-full text-sm font-bold text-slate-600 shadow-sm">Notion</span>
                    <span class="px-6 py-2.5 bg-white border border-slate-200 rounded-full text-sm font-bold text-slate-600 shadow-sm">Slack</span>
                    <span class="px-6 py-2.5 bg-white border border-slate-200 rounded-full text-sm font-bold text-slate-600 shadow-sm">Stripe</span>
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
                        <h2 class="text-3xl md:text-[42px] font-bold text-[#121B26] mb-6 leading-tight" data-i18n="html" data-en="Get the Right IT Solutions from the <span class='text-blue-600'>Best IT Vendor</span> — Consult with Us Today!" data-id="Dapatkan Solusi IT yang Tepat dari <span class='text-blue-600'>Vendor IT Terbaik</span> — Konsultasi Sekarang!">
                            Dapatkan Solusi IT yang Tepat dari <span class="text-blue-600">Vendor IT Terbaik</span> — Konsultasi Sekarang!
                        </h2>
                        <p class="text-slate-500 text-base md:text-lg mb-10 max-w-2xl leading-relaxed" data-i18n data-en="Discuss your IT challenges, and our team of experienced experts will provide tailored solutions to drive your business growth and success." data-id="Diskusikan tantangan IT Anda, dan tim ahli berpengalaman kami akan memberikan solusi yang disesuaikan untuk mendorong pertumbuhan bisnis Anda.">Diskusikan tantangan IT Anda, dan tim ahli berpengalaman kami akan memberikan solusi yang disesuaikan untuk mendorong pertumbuhan bisnis Anda.</p>
                        <a href="#" class="inline-flex items-center px-8 py-3 rounded-xl bg-hex-dark text-white font-bold text-base hover:shadow-2xl hover:-translate-y-1 transition-all shadow-xl" data-i18n data-en="Consult Now" data-id="Konsultasi Sekarang">Konsultasi Sekarang</a>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@push('scripts')
    <script>
        // Mega Menu Logic
        const trigger = document.getElementById('solutions-trigger');
        const menu = document.getElementById('solutions-mega-menu');

        trigger.addEventListener('click', (e) => {
            e.stopPropagation();
            menu.classList.toggle('is-open');
        });

        document.addEventListener('click', () => {
            menu.classList.remove('is-open');
        });

        menu.addEventListener('click', (e) => {
            e.stopPropagation();
        });

        // Lang Switcher
        const langSwitcher = document.getElementById('lang-switcher');
        const langBtns = langSwitcher.querySelectorAll('button');

        langBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                langBtns.forEach(b => {
                    b.classList.remove('active', 'bg-white', 'shadow-sm');
                    b.classList.add('text-gray-500');
                });
                btn.classList.add('active', 'bg-white', 'shadow-sm');
                btn.classList.remove('text-gray-500');
            });
        });
    </script>
@endpush


