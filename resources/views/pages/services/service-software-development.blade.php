@extends('layouts.main')
@section('title', 'Hexavara - Software Development')
@push('styles')
    <style>
        .hero-title { font-size: 60px; line-height: 1.1; letter-spacing: -1.8px; font-weight: 700; }
        @media (max-width: 768px) { .hero-title { font-size: 34px; letter-spacing: -0.8px; } }
        .is-open { display: block !important; }
        #mobile-menu.is-open { transform: translateX(0); }
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }

        @keyframes detailLogoMarquee {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        .detail-logo-track {
            display: flex;
            width: max-content;
            animation: detailLogoMarquee 44s linear infinite;
        }
            .solutions-mega-menu { opacity: 0; transform: translateX(-50%) translateY(8px); pointer-events: none; transition: opacity 0.2s ease, transform 0.2s ease; }
        .solutions-mega-menu.is-open { opacity: 1; transform: translateX(-50%) translateY(0); pointer-events: auto; }
    </style>
@endpush
@section('content')
    <main>
        <!-- Hero Section -->
        <section class="relative w-full h-[583px] overflow-hidden bg-hex-surface lg:bg-transparent">
            <div class="absolute inset-0 z-0 bg-cover bg-top lg:block hidden opacity-80" style="background-image: url('img/Biru Modern Ucapan Selamat Ulang Tahun Instagram Post (2) 4.png');"></div>
            <div class="max-w-[1280px] mx-auto h-full relative z-10 px-4 lg:px-0 flex flex-col items-center pt-16 pb-4 text-center">
                <div class="max-w-[950px] flex-grow flex flex-col justify-center transform lg:-translate-y-8">
                    <h1 class="hero-title text-hex-dark mb-8" data-i18n data-en="Software Development" data-id="Pengembangan Perangkat Lunak">Software Development</h1>
                    <p class="text-hex-slate text-lg leading-[1.65] max-w-[850px] mx-auto" data-i18n data-en="Elevate your digital presence with our software development services. We specialize in crafting bespoke solutions to your business needs, ensuring seamless functionality and user-centric experiences. Our expert team employs the latest technologies to deliver scalable, high-performance software that propels your business forward." data-id="Tingkatkan kehadiran digital Anda dengan layanan pengembangan perangkat lunak kami. Kami spesialis dalam membangun solusi kustom untuk kebutuhan bisnis Anda, memastikan fungsi yang mulus dan pengalaman yang berpusat pada pengguna. Tim ahli kami menggunakan teknologi terbaru untuk menghadirkan perangkat lunak berperforma tinggi.">
                        Elevate your digital presence with our software development services. We specialize in crafting bespoke solutions to your business needs, ensuring seamless functionality and user-centric experiences. Our expert team employs the latest technologies to deliver scalable, high-performance software that propels your business forward.
                    </p>
                    <div class="mt-10">
                        <a href="cta.html" class="inline-block px-8 py-3 bg-hex-dark text-white rounded-xl font-bold text-base hover:shadow-2xl hover:-translate-y-1 transition-all shadow-xl" data-i18n data-en="Consult Now" data-id="Konsultasi Sekarang">Consult Now</a>
                    </div>
                </div>

                <!-- Marquee Clients (Bottom Aligned) -->
                <div class="w-full mt-auto relative overflow-hidden">
                    <div class="detail-logo-track flex items-center pr-12">
                        <div class="flex items-center gap-12 h-16">
                            <img class="h-10 opacity-70" src="img/telkom.png" alt="Telkom" />
                            <img class="h-10 opacity-70" src="img/wika.png" alt="WIKA" />
                            <img class="h-10 opacity-70" src="img/berau_coal.png" alt="Berau Coal" />
                            <img class="h-10 opacity-70" src="img/pjb.png" alt="PJB" />
                            <img class="h-10 opacity-70" src="img/unilever.png" alt="Unilever" />
                            <img class="h-10 opacity-70" src="img/zelltech.png" alt="Zelltech" />
                            <img class="h-10 opacity-70" src="img/jmf.png" alt="JMF" />
                            <img class="h-10 opacity-70" src="img/bmt_muda.png" alt="BMT Muda" />
                            <img class="h-10 opacity-70" src="img/dianca_goods.png" alt="Dianca Goods" />
                            <img class="h-10 opacity-70" src="img/kana.png" alt="Kana" />
                            <img class="h-10 opacity-70" src="img/rs_soetomo.png" alt="RS Soetomo" />
                            <img class="h-10 opacity-70" src="img/lamongan.png" alt="Lamongan" />
                            <img class="h-10 opacity-70" src="img/pamekasan.png" alt="Pamekasan" />
                            <img class="h-10 opacity-70" src="img/banjarbaru.png" alt="Banjarbaru" />
                            <img class="h-10 opacity-70" src="img/kota_bengkulu.png" alt="Kota Bengkulu" />
                            <img class="h-10 opacity-70" src="img/prov_bengkulu.png" alt="Provinsi Bengkulu" />
                            <img class="h-10 opacity-70" src="img/unair.png" alt="Universitas Airlangga" />
                            <img class="h-10 opacity-70" src="img/roudlotul_falah.png" alt="Roudlotul Falah" />
                            <img class="h-10 opacity-70" src="img/bkd_jatim.png" alt="BKD Jatim" />
                        </div>
                        <div class="flex items-center gap-12 h-16">
                            <img class="h-10 opacity-70" src="img/telkom.png" alt="Telkom" />
                            <img class="h-10 opacity-70" src="img/wika.png" alt="WIKA" />
                            <img class="h-10 opacity-70" src="img/berau_coal.png" alt="Berau Coal" />
                            <img class="h-10 opacity-70" src="img/pjb.png" alt="PJB" />
                            <img class="h-10 opacity-70" src="img/unilever.png" alt="Unilever" />
                            <img class="h-10 opacity-70" src="img/zelltech.png" alt="Zelltech" />
                            <img class="h-10 opacity-70" src="img/jmf.png" alt="JMF" />
                            <img class="h-10 opacity-70" src="img/bmt_muda.png" alt="BMT Muda" />
                            <img class="h-10 opacity-70" src="img/dianca_goods.png" alt="Dianca Goods" />
                            <img class="h-10 opacity-70" src="img/kana.png" alt="Kana" />
                            <img class="h-10 opacity-70" src="img/rs_soetomo.png" alt="RS Soetomo" />
                            <img class="h-10 opacity-70" src="img/lamongan.png" alt="Lamongan" />
                            <img class="h-10 opacity-70" src="img/pamekasan.png" alt="Pamekasan" />
                            <img class="h-10 opacity-70" src="img/banjarbaru.png" alt="Banjarbaru" />
                            <img class="h-10 opacity-70" src="img/kota_bengkulu.png" alt="Kota Bengkulu" />
                            <img class="h-10 opacity-70" src="img/prov_bengkulu.png" alt="Provinsi Bengkulu" />
                            <img class="h-10 opacity-70" src="img/unair.png" alt="Universitas Airlangga" />
                            <img class="h-10 opacity-70" src="img/roudlotul_falah.png" alt="Roudlotul Falah" />
                            <img class="h-10 opacity-70" src="img/bkd_jatim.png" alt="BKD Jatim" />
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Our Offerings -->
        <section class="py-24 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl lg:text-[42px] font-bold text-hex-dark mb-4 leading-tight" data-i18n data-en="Our Offerings" data-id="Layanan Kami">Our Offerings</h2>
                    <p class="text-slate-500 max-w-2xl mx-auto text-lg" data-i18n data-en="Comprehensive software solutions tailored to your unique business challenges." data-id="Solusi perangkat lunak komprehensif yang disesuaikan dengan tantangan unik bisnis Anda.">Comprehensive software solutions tailored to your unique business challenges.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Card 1 -->
                    <div class="group bg-white rounded-[40px] p-10 border border-slate-100 hover:shadow-2xl transition-all duration-300">
                        <div class="w-14 h-14 rounded-2xl bg-hex-surface flex items-center justify-center mb-8 group-hover:bg-hex-dark group-hover:text-white transition-colors">
                            <span class="material-symbols-outlined text-3xl">language</span>
                        </div>
                        <h3 class="text-2xl font-bold text-hex-dark mb-4" data-i18n data-en="Web Development" data-id="Pengembangan Web">Web Development</h3>
                        <p class="text-hex-slate text-base leading-relaxed" data-i18n data-en="From dynamic landing pages to complex enterprise web portals, we build fast, secure, and scalable web applications tailored to your brand and user needs. Our solutions are optimized for performance across all devices and browsers." data-id="Dari landing page dinamis hingga portal web enterprise yang kompleks, kami membangun aplikasi web yang cepat, aman, dan skalabel yang disesuaikan dengan kebutuhan pengguna Anda.">From dynamic landing pages to complex enterprise web portals, we build fast, secure, and scalable web applications tailored to your brand and user needs. Our solutions are optimized for performance across all devices and browsers.</p>
                    </div>
                    <!-- Card 2 -->
                    <div class="group bg-white rounded-[40px] p-10 border border-slate-100 hover:shadow-2xl transition-all duration-300">
                        <div class="w-14 h-14 rounded-2xl bg-hex-surface flex items-center justify-center mb-8 group-hover:bg-hex-dark group-hover:text-white transition-colors">
                            <span class="material-symbols-outlined text-3xl">smartphone</span>
                        </div>
                        <h3 class="text-2xl font-bold text-hex-dark mb-4" data-i18n data-en="Mobile Apps Development" data-id="Pengembangan Aplikasi Mobile">Mobile Apps Development</h3>
                        <p class="text-hex-slate text-base leading-relaxed" data-i18n data-en="We design and develop intuitive mobile applications for iOS and Android platforms. Whether native or cross-platform, our apps deliver smooth performance, rich UX, and deep integration with device features and third-party services." data-id="Kami merancang dan mengembangkan aplikasi mobile intuitif untuk iOS dan Android. Baik native maupun cross-platform, aplikasi kami menghadirkan performa mulus dan integrasi fitur perangkat yang mendalam.">We design and develop intuitive mobile applications for iOS and Android platforms. Whether native or cross-platform, our apps deliver smooth performance, rich UX, and deep integration with device features and third-party services.</p>
                    </div>
                    <!-- Card 3 -->
                    <div class="group bg-white rounded-[40px] p-10 border border-slate-100 hover:shadow-2xl transition-all duration-300">
                        <div class="w-14 h-14 rounded-2xl bg-hex-surface flex items-center justify-center mb-8 group-hover:bg-hex-dark group-hover:text-white transition-colors">
                            <span class="material-symbols-outlined text-3xl">map</span>
                        </div>
                        <h3 class="text-2xl font-bold text-hex-dark mb-4" data-i18n data-en="Geographical Information System" data-id="Sistem Informasi Geografis">Geographical Information System</h3>
                        <p class="text-hex-slate text-base leading-relaxed" data-i18n data-en="We develop powerful GIS applications that transform raw spatial data into actionable insights. Ideal for logistics, urban planning, agriculture, and resource management - enabling smarter, location-aware decision making." data-id="Kami mengembangkan aplikasi GIS kuat yang mengubah data spasial menjadi wawasan berharga. Ideal untuk logistik, tata kota, dan manajemen sumber daya - memungkinkan pengambilan keputusan berbasis lokasi yang cerdas.">We develop powerful GIS applications that transform raw spatial data into actionable insights. Ideal for logistics, urban planning, agriculture, and resource management - enabling smarter, location-aware decision making.</p>
                    </div>
                    <!-- Card 4 -->
                    <div class="group bg-white rounded-[40px] p-10 border border-slate-100 hover:shadow-2xl transition-all duration-300">
                        <div class="w-14 h-14 rounded-2xl bg-hex-surface flex items-center justify-center mb-8 group-hover:bg-hex-dark group-hover:text-white transition-colors">
                            <span class="material-symbols-outlined text-3xl">router</span>
                        </div>
                        <h3 class="text-2xl font-bold text-hex-dark mb-4" data-i18n data-en="Internet of Things" data-id="Internet of Things">Internet of Things</h3>
                        <p class="text-hex-slate text-base leading-relaxed" data-i18n data-en="Connect your physical world to intelligent software. We architect end-to-end IoT ecosystems - from embedded firmware and sensor networks to real-time dashboards and cloud infrastructure - enabling smart automation and monitoring." data-id="Hubungkan dunia fisik Anda ke perangkat lunak cerdas. Kami merancang ekosistem IoT ujung-ke-ujung - dari sensor hingga dashboard realtime - memungkinkan otomatisasi dan pemantauan pintar.">Connect your physical world to intelligent software. We architect end-to-end IoT ecosystems - from embedded firmware and sensor networks to real-time dashboards and cloud infrastructure - enabling smart automation and monitoring.</p>
                    </div>
                    <!-- Card 5 -->
                    <div class="group bg-white rounded-[40px] p-10 border border-slate-100 hover:shadow-2xl transition-all duration-300">
                        <div class="w-14 h-14 rounded-2xl bg-hex-surface flex items-center justify-center mb-8 group-hover:bg-hex-dark group-hover:text-white transition-colors">
                            <span class="material-symbols-outlined text-3xl">hub</span>
                        </div>
                        <h3 class="text-2xl font-bold text-hex-dark mb-4" data-i18n data-en="Enterprise Resource Planning" data-id="Enterprise Resource Planning">Enterprise Resource Planning</h3>
                        <p class="text-hex-slate text-base leading-relaxed" data-i18n data-en="Unify your business operations with a custom ERP system that integrates procurement, inventory, finance, HR, and production into a single, streamlined platform - giving leadership full visibility and control over every process." data-id="Satukan operasional bisnis Anda dengan sistem ERP kustom yang mengintegrasikan pengadaan, inventaris, keuangan, dan produksi ke dalam satu platform efisien - memberikan visibilitas penuh bagi manajemen.">Unify your business operations with a custom ERP system that integrates procurement, inventory, finance, HR, and production into a single, streamlined platform - giving leadership full visibility and control over every process.</p>
                    </div>
                    <!-- Card 6 -->
                    <div class="group bg-white rounded-[40px] p-10 border border-slate-100 hover:shadow-2xl transition-all duration-300">
                        <div class="w-14 h-14 rounded-2xl bg-hex-surface flex items-center justify-center mb-8 group-hover:bg-hex-dark group-hover:text-white transition-colors">
                            <span class="material-symbols-outlined text-3xl">manage_accounts</span>
                        </div>
                        <h3 class="text-2xl font-bold text-hex-dark mb-4" data-i18n data-en="Backoffice Management Services" data-id="Layanan Manajemen Backoffice">Backoffice Management Services</h3>
                        <p class="text-hex-slate text-base leading-relaxed" data-i18n data-en="Digitize and automate your internal operations with dedicated modules for Accounting, Human Resource Development (HRD), and Health, Safety & Environment (HSE) - streamlining compliance, payroll, audits, and reporting workflows." data-id="Digitalisasi dan otomatisasi operasional internal Anda dengan modul Akuntansi, HRD, dan K3 - menyederhanakan kepatuhan, payroll, audit, dan alur kerja pelaporan.">Digitize and automate your internal operations with dedicated modules for Accounting, Human Resource Development (HRD), and Health, Safety & Environment (HSE) - streamlining compliance, payroll, audits, and reporting workflows.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Core Advantages Section -->
        <section class="py-24 bg-hex-surface-dark text-white overflow-hidden relative">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="text-center mb-20">
                    <span class="text-blue-400 font-bold uppercase tracking-[0.2em] text-sm mb-4 block" data-i18n data-en="CORE ADVANTAGES" data-id="KEUNGGULAN UTAMA">CORE ADVANTAGES</span>
                    <h2 class="text-[42px] font-bold" data-i18n data-en="Why Choose Our Software Solutions?" data-id="Mengapa Memilih Solusi Perangkat Lunak Kami?">Why Choose Our Software Solutions?</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <!-- Advantage 1 -->
                    <div class="flex flex-col items-center text-center">
                        <div class="w-12 h-12 rounded-full bg-blue-600/20 border border-blue-500/30 flex items-center justify-center mb-6">
                            <span class="material-symbols-outlined text-blue-400">grid_view</span>
                        </div>
                        <h4 class="text-xl font-bold mb-3" data-i18n data-en="Scalable Infrastructure" data-id="Infrastruktur Skalabel">Scalable Infrastructure</h4>
                        <p class="text-slate-400 text-sm leading-relaxed" data-i18n data-en="Architecture built to handle rapid growth and high user traffic without performance loss." data-id="Arsitektur yang dibangun untuk menangani pertumbuhan pesat dan traffic tinggi tanpa penurunan performa.">Architecture built to handle rapid growth and high user traffic without performance loss.</p>
                    </div>
                    <!-- Advantage 2 -->
                    <div class="flex flex-col items-center text-center">
                        <div class="w-12 h-12 rounded-full bg-blue-600/20 border border-blue-500/30 flex items-center justify-center mb-6">
                            <span class="material-symbols-outlined text-blue-400">shield</span>
                        </div>
                        <h4 class="text-xl font-bold mb-3" data-i18n data-en="Secure & Protected" data-id="Aman & Terlindungi">Secure & Protected</h4>
                        <p class="text-slate-400 text-sm leading-relaxed" data-i18n data-en="Multi-layered security protocols to safeguard your business and customer data." data-id="Protokol keamanan berlapis untuk melindungi data bisnis dan pelanggan Anda.">Multi-layered security protocols to safeguard your business and customer data.</p>
                    </div>
                    <!-- Advantage 3 -->
                    <div class="flex flex-col items-center text-center">
                        <div class="w-12 h-12 rounded-full bg-blue-600/20 border border-blue-500/30 flex items-center justify-center mb-6">
                            <span class="material-symbols-outlined text-blue-400">tips_and_updates</span>
                        </div>
                        <h4 class="text-xl font-bold mb-3" data-i18n data-en="Continuous Innovation" data-id="Inovasi Berkelanjutan">Continuous Innovation</h4>
                        <p class="text-slate-400 text-sm leading-relaxed" data-i18n data-en="Access to the latest tech stacks and agile methodologies for modern solutions." data-id="Akses ke stack teknologi terbaru dan metodologi agile untuk solusi modern.">Access to the latest tech stacks and agile methodologies for modern solutions.</p>
                    </div>
                    <!-- Advantage 4 -->
                    <div class="flex flex-col items-center text-center">
                        <div class="w-12 h-12 rounded-full bg-blue-600/20 border border-blue-500/30 flex items-center justify-center mb-6">
                            <span class="material-symbols-outlined text-blue-400">settings_input_composite</span>
                        </div>
                        <h4 class="text-xl font-bold mb-3" data-i18n data-en="Fully Customizable" data-id="Sepenuhnya Kustom">Fully Customizable</h4>
                        <p class="text-slate-400 text-sm leading-relaxed" data-i18n data-en="Bespoke development tailored to your unique business logic and workflows." data-id="Pengembangan kustom yang disesuaikan dengan logika bisnis dan alur kerja unik Anda.">Bespoke development tailored to your unique business logic and workflows.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Our Workflow -->
        <section class="py-24 bg-white relative">
            <div class="max-w-[1000px] mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-20">
                    <span class="text-hex-blue font-bold uppercase tracking-[0.2em] text-sm mb-4 block" data-i18n data-en="OUR WORKFLOW" data-id="ALUR KERJA KAMI">OUR WORKFLOW</span>
                    <h2 class="text-[42px] font-bold text-hex-dark" data-i18n data-en="Our Development Process" data-id="Proses Pengembangan Kami">Our Development Process</h2>
                    <p class="mt-4 text-slate-500 text-lg" data-i18n data-en="A structured approach to turning your vision into a high-performing digital reality." data-id="Pendekatan terstruktur untuk mengubah visi Anda menjadi realitas digital berperforma tinggi.">A structured approach to turning your vision into a high-performing digital reality.</p>
                </div>

                <div class="relative">
                    <!-- Vertical Line -->
                    <div class="absolute left-1/2 top-0 bottom-0 w-[2px] bg-slate-100 -translate-x-1/2 hidden md:block"></div>

                    <div class="space-y-12 relative">
                        <!-- Step 1 -->
                        <div class="flex flex-col md:flex-row items-center gap-8 md:gap-0">
                            <div class="md:w-1/2 flex justify-center md:justify-end md:pr-12 md:order-1 order-2">
                                <div class="bg-white p-8 rounded-3xl shadow-xl border border-slate-50 max-w-[340px] w-full relative">
                                    <div class="flex items-center gap-3 mb-4">
                                        <h4 class="text-xl font-bold" data-i18n data-en="Requirement Gathering" data-id="Pengumpulan Kebutuhan">Requirement Gathering</h4>
                                        <span class="material-symbols-outlined text-blue-600">assignment_ind</span>
                                    </div>
                                    <ul class="space-y-2 text-slate-500 text-sm">
                                        <li class="flex items-center gap-2" data-i18n data-en="Collecting Problems" data-id="Inventarisasi Masalah">Collecting Problems</li>
                                        <li class="flex items-center gap-2" data-i18n data-en="Explore Of Current Solution" data-id="Eksplorasi Solusi Saat Ini">Explore Of Current Solution</li>
                                        <li class="flex items-center gap-2" data-i18n data-en="Auditing Existing Solution" data-id="Audit Solusi Eksisting">Auditing Existing Solution</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="md:w-16 md:h-16 w-12 h-12 rounded-full border-4 border-white bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-lg z-10 md:order-2 order-1 shadow-md">01</div>
                            <div class="md:w-1/2 md:order-3 hidden md:block"></div>
                        </div>

                        <!-- Step 2 -->
                        <div class="flex flex-col md:flex-row items-center gap-8 md:gap-0">
                            <div class="md:w-1/2 md:order-1 hidden md:block"></div>
                            <div class="md:w-16 md:h-16 w-12 h-12 rounded-full border-4 border-white bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-lg z-10 md:order-2 order-1 shadow-md">02</div>
                            <div class="md:w-1/2 flex justify-center md:justify-start md:pl-12 md:order-3 order-2">
                                <div class="bg-white p-8 rounded-3xl shadow-xl border border-slate-50 max-w-[340px] w-full relative">
                                    <div class="flex items-center gap-3 mb-4">
                                        <h4 class="text-xl font-bold" data-i18n data-en="Problem Analysis" data-id="Analisis Masalah">Problem Analysis</h4>
                                        <span class="material-symbols-outlined text-blue-600">troubleshoot</span>
                                    </div>
                                    <ul class="space-y-2 text-slate-500 text-sm">
                                        <li class="flex items-center gap-2" data-i18n data-en="Define Problem Points" data-id="Menentukan Titik Poin Masalah">Define Problem Points</li>
                                        <li class="flex items-center gap-2" data-i18n data-en="Analyze Flow Problem" data-id="Analisis Alur Masalah">Analyze Flow Problem</li>
                                        <li class="flex items-center gap-2" data-i18n data-en="Define Solution" data-id="Menentukan Solusi Terpilih">Define Solution</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Step 3 -->
                        <div class="flex flex-col md:flex-row items-center gap-8 md:gap-0">
                            <div class="md:w-1/2 flex justify-center md:justify-end md:pr-12 md:order-1 order-2">
                                <div class="bg-white p-8 rounded-3xl shadow-xl border border-slate-50 max-w-[340px] w-full relative">
                                    <div class="flex items-center gap-3 mb-4">
                                        <h4 class="text-xl font-bold" data-i18n data-en="Planning" data-id="Perencanaan">Planning</h4>
                                        <span class="material-symbols-outlined text-blue-600">architecture</span>
                                    </div>
                                    <ul class="space-y-2 text-slate-500 text-sm">
                                        <li class="flex items-center gap-2" data-i18n data-en="Flow System & Wireframing" data-id="Alur Sistem & Wireframing">Flow System & Wireframing</li>
                                        <li class="flex items-center gap-2" data-i18n data-en="System Architecture Design" data-id="Desain Arsitektur Sistem">System Architecture Design</li>
                                        <li class="flex items-center gap-2" data-i18n data-en="Technology Stack Selection" data-id="Pemilihan Tech Stack">Technology Stack Selection</li>
                                        <li class="flex items-center gap-2" data-i18n data-en="Rapid Prototyping" data-id="Prototyping Cepat">Rapid Prototyping</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="md:w-16 md:h-16 w-12 h-12 rounded-full border-4 border-white bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-lg z-10 md:order-2 order-1 shadow-md">03</div>
                            <div class="md:w-1/2 md:order-3 hidden md:block"></div>
                        </div>

                        <!-- Step 4 -->
                        <div class="flex flex-col md:flex-row items-center gap-8 md:gap-0">
                            <div class="md:w-1/2 md:order-1 hidden md:block"></div>
                            <div class="md:w-16 md:h-16 w-12 h-12 rounded-full border-4 border-white bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-lg z-10 md:order-2 order-1 shadow-md">04</div>
                            <div class="md:w-1/2 flex justify-center md:justify-start md:pl-12 md:order-3 order-2">
                                <div class="bg-white p-8 rounded-3xl shadow-xl border border-slate-50 max-w-[340px] w-full relative">
                                    <div class="flex items-center gap-3 mb-4">
                                        <h4 class="text-xl font-bold" data-i18n data-en="Developing" data-id="Pengembangan">Developing</h4>
                                        <span class="material-symbols-outlined text-blue-600">terminal</span>
                                    </div>
                                    <ul class="space-y-2 text-slate-500 text-sm">
                                        <li class="flex items-center gap-2" data-i18n data-en="Agile Sprint Planning" data-id="Perencanaan Agile Sprint">Agile Sprint Planning</li>
                                        <li class="flex items-center gap-2" data-i18n data-en="High-Quality Implementation" data-id="Implementasi Berkualitas Tinggi">High-Quality Implementation</li>
                                        <li class="flex items-center gap-2" data-i18n data-en="Rigorous Usability Testing" data-id="Pengujian Usabilitas Ketat">Rigorous Usability Testing</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Technology Stack -->
        <section class="py-24 bg-slate-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="mb-12">
                    <span class="text-hex-blue font-bold uppercase tracking-[0.2em] text-sm mb-4 block" data-i18n data-en="TECHNOLOGY STACK" data-id="STACK TEKNOLOGI">TECHNOLOGY STACK</span>
                    <h2 class="text-[42px] font-bold text-hex-dark" data-i18n data-en="Built with industry-leading technologies" data-id="Dibangun dengan teknologi terkemuka industri">Built with industry-leading technologies</h2>
                </div>

                <div class="flex flex-wrap gap-3">
                    <span class="px-6 py-2.5 bg-white border border-slate-200 rounded-full text-sm font-bold text-slate-600 shadow-sm">React</span>
                    <span class="px-6 py-2.5 bg-white border border-slate-200 rounded-full text-sm font-bold text-slate-600 shadow-sm">Next.js</span>
                    <span class="px-6 py-2.5 bg-white border border-slate-200 rounded-full text-sm font-bold text-slate-600 shadow-sm">Vue.js</span>
                    <span class="px-6 py-2.5 bg-white border border-slate-200 rounded-full text-sm font-bold text-slate-600 shadow-sm">Flutter</span>
                    <span class="px-6 py-2.5 bg-white border border-slate-200 rounded-full text-sm font-bold text-slate-600 shadow-sm">React Native</span>
                    <span class="px-6 py-2.5 bg-white border border-slate-200 rounded-full text-sm font-bold text-slate-600 shadow-sm">Node.js</span>
                    <span class="px-6 py-2.5 bg-white border border-slate-200 rounded-full text-sm font-bold text-slate-600 shadow-sm">Python</span>
                    <span class="px-6 py-2.5 bg-white border border-slate-200 rounded-full text-sm font-bold text-slate-600 shadow-sm">Laravel</span>
                    <span class="px-6 py-2.5 bg-white border border-slate-200 rounded-full text-sm font-bold text-slate-600 shadow-sm">PostgreSQL</span>
                    <span class="px-6 py-2.5 bg-white border border-slate-200 rounded-full text-sm font-bold text-slate-600 shadow-sm">MongoDB</span>
                    <span class="px-6 py-2.5 bg-white border border-slate-200 rounded-full text-sm font-bold text-slate-600 shadow-sm">Docker</span>
                    <span class="px-6 py-2.5 bg-white border border-slate-200 rounded-full text-sm font-bold text-slate-600 shadow-sm">Kubernetes</span>
                    <span class="px-6 py-2.5 bg-white border border-slate-200 rounded-full text-sm font-bold text-slate-600 shadow-sm">AWS / GCP</span>
                    <span class="px-6 py-2.5 bg-white border border-slate-200 rounded-full text-sm font-bold text-slate-600 shadow-sm">QGIS / Mapbox</span>
                    <span class="px-6 py-2.5 bg-white border border-slate-200 rounded-full text-sm font-bold text-slate-600 shadow-sm">Arduino / Raspberry Pi</span>
                    <span class="px-6 py-2.5 bg-white border border-slate-200 rounded-full text-sm font-bold text-slate-600 shadow-sm">MQTT</span>
                    <span class="px-6 py-2.5 bg-white border border-slate-200 rounded-full text-sm font-bold text-slate-600 shadow-sm">Odoo / SAP</span>
                    <span class="px-6 py-2.5 bg-white border border-slate-200 rounded-full text-sm font-bold text-slate-600 shadow-sm">GraphQL</span>
                </div>
            </div>
        </section>
    </main>
@endsection





