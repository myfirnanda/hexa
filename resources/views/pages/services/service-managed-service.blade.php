@extends('layouts.main')
@section('title', 'Hexavara - Managed Service')
@push('styles')
    <style>
        .hero-title { font-size: 60px; line-height: 1.1; letter-spacing: -1.8px; font-weight: 700; }
        @media (max-width: 768px) { .hero-title { font-size: 34px; letter-spacing: -0.8px; } }
        .is-open { display: block !important; }
        #mobile-menu.is-open { transform: translateX(0); }
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }

        .detail-logo-track {
            display: flex;
            flex-wrap: wrap;
            gap: 2rem;
        }
            .solutions-mega-menu { opacity: 0; transform: translateX(-50%) translateY(8px); pointer-events: none; transition: opacity 0.2s ease, transform 0.2s ease; }
        .solutions-mega-menu.is-open { opacity: 1; transform: translateX(-50%) translateY(0); pointer-events: auto; }
    </style>
@endpush
@section('content')
    <main>
        <!-- Hero Section -->
        <section class="relative w-full h-[583px] overflow-hidden bg-hex-surface lg:bg-transparent">
            <div class="absolute inset-0 z-0 bg-cover bg-top lg:block hidden opacity-80" style="background-image: url('{{ asset('assets/img/Biru Modern Ucapan Selamat Ulang Tahun Instagram Post (2) 4.png') }}');"></div>
            <div class="max-w-[1280px] mx-auto h-full relative z-10 px-4 lg:px-0 flex flex-col items-center pt-16 pb-4 text-center">
                <div class="max-w-[950px] flex-grow flex flex-col justify-center transform lg:-translate-y-8">
                    <h1 class="hero-title text-hex-dark mb-8" data-i18n data-en="Managed Services" data-id="Layanan Terkelola">Managed Services</h1>
                    <p class="text-hex-slate text-lg leading-[1.65] max-w-[850px] mx-auto" data-i18n data-en="Optimize your IT infrastructure with our comprehensive managed services. From proactive monitoring to strategic IT planning, we ensure your systems run efficiently, securely, and without disruption empowering your business to stay ahead in the digital landscape." data-id="Optimalkan infrastruktur IT Anda dengan layanan terkelola kami yang komprehensif. Dari pemantauan proaktif hingga perencanaan IT strategis, kami memastikan sistem Anda berjalan efisien, aman, dan tanpa hambatan.">
                        Optimize your IT infrastructure with our comprehensive managed services. From proactive monitoring to strategic IT planning, we ensure your systems run efficiently, securely, and without disruption empowering your business to stay ahead in the digital landscape.
                    </p>
                    <div class="mt-10">
                        <a href="cta.html" class="inline-block px-8 py-3 bg-hex-dark text-white rounded-xl font-bold text-base hover:shadow-2xl hover:-translate-y-1 transition-all shadow-xl" data-i18n data-en="Consult Now" data-id="Konsultasi Sekarang">Consult Now</a>
                    </div>
                </div>

                <!-- Marquee Clients (Bottom Aligned) -->
                <div class="w-full mt-auto relative overflow-hidden">
                    <div class="detail-logo-track items-center justify-center">
                        @foreach($clients->filter(fn($c) => $c->logo) as $client)
                        <img class="h-10 opacity-70" src="{{ image_url($client->logo) }}" alt="{{ $client->name }}" />
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <!-- Our Offerings -->
        <section class="py-24 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl lg:text-[42px] font-bold text-hex-dark mb-4 leading-tight" data-i18n data-en="Our Offerings" data-id="Layanan Kami">Our Offerings</h2>
                    <p class="text-slate-500 max-w-2xl mx-auto text-lg" data-i18n data-en="Comprehensive IT management solutions tailored to your unique operational needs." data-id="Solusi manajemen IT komprehensif yang disesuaikan dengan kebutuhan operasional unik Anda.">Comprehensive IT management solutions tailored to your unique operational needs.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Card 1 -->
                    <div class="group bg-white rounded-[40px] p-10 border border-slate-100 hover:shadow-2xl transition-all duration-300">
                        <div class="w-14 h-14 rounded-2xl bg-hex-surface flex items-center justify-center mb-8 group-hover:bg-hex-dark group-hover:text-white transition-colors">
                            <span class="material-symbols-outlined text-3xl">engineering</span>
                        </div>
                        <h3 class="text-2xl font-bold text-hex-dark mb-4" data-i18n data-en="IT Outsourcing" data-id="Outsourcing IT">IT Outsourcing</h3>
                        <p class="text-hex-slate text-base leading-relaxed" data-i18n data-en="Delegate your IT operations to our expert team and reduce internal workload while ensuring professional, scalable, and cost-efficient technology management." data-id="Delegasikan operasional IT Anda kepada tim ahli kami untuk mengurangi beban kerja internal sekaligus memastikan manajemen teknologi yang profesional dan efisien.">Delegate your IT operations to our expert team and reduce internal workload while ensuring professional, scalable, and cost-efficient technology management.</p>
                    </div>
                    <!-- Card 2 -->
                    <div class="group bg-white rounded-[40px] p-10 border border-slate-100 hover:shadow-2xl transition-all duration-300">
                        <div class="w-14 h-14 rounded-2xl bg-hex-surface flex items-center justify-center mb-8 group-hover:bg-hex-dark group-hover:text-white transition-colors">
                            <span class="material-symbols-outlined text-3xl">build</span>
                        </div>
                        <h3 class="text-2xl font-bold text-hex-dark mb-4" data-i18n data-en="Maintenance" data-id="Pemeliharaan">Maintenance</h3>
                        <p class="text-hex-slate text-base leading-relaxed" data-i18n data-en="Keep your systems running smoothly with routine maintenance, updates, bug fixing, and performance optimization to prevent downtime and disruptions." data-id="Pastikan sistem Anda berjalan mulus dengan pemeliharaan rutin, pembaruan, perbaikan bug, dan optimasi performa untuk mencegah downtime.">Keep your systems running smoothly with routine maintenance, updates, bug fixing, and performance optimization to prevent downtime and disruptions.</p>
                    </div>
                    <!-- Card 3 -->
                    <div class="group bg-white rounded-[40px] p-10 border border-slate-100 hover:shadow-2xl transition-all duration-300">
                        <div class="w-14 h-14 rounded-2xl bg-hex-surface flex items-center justify-center mb-8 group-hover:bg-hex-dark group-hover:text-white transition-colors">
                            <span class="material-symbols-outlined text-3xl">database</span>
                        </div>
                        <h3 class="text-2xl font-bold text-hex-dark mb-4" data-i18n data-en="Data Migration" data-id="Migrasi Data">Data Migration</h3>
                        <p class="text-hex-slate text-base leading-relaxed" data-i18n data-en="Seamlessly migrate your data across systems, platforms, or cloud environments with minimal risk, ensuring data integrity and security." data-id="Migrasikan data Anda antar sistem, platform, atau lingkungan cloud dengan risiko minimal, memastikan integritas dan keamanan data.">Seamlessly migrate your data across systems, platforms, or cloud environments with minimal risk, ensuring data integrity and security.</p>
                    </div>
                    <!-- Card 4 -->
                    <div class="group bg-white rounded-[40px] p-10 border border-slate-100 hover:shadow-2xl transition-all duration-300">
                        <div class="w-14 h-14 rounded-2xl bg-hex-surface flex items-center justify-center mb-8 group-hover:bg-hex-dark group-hover:text-white transition-colors">
                            <span class="material-symbols-outlined text-3xl">settings</span>
                        </div>
                        <h3 class="text-2xl font-bold text-hex-dark mb-4" data-i18n data-en="Configuration" data-id="Konfigurasi">Configuration</h3>
                        <p class="text-hex-slate text-base leading-relaxed" data-i18n data-en="We handle system setup, server configuration, and environment optimization to ensure your infrastructure is aligned with best practices." data-id="Kami menangani penyiapan sistem, konfigurasi server, dan optimasi lingkungan untuk memastikan infrastruktur Anda selaras dengan praktik terbaik.">We handle system setup, server configuration, and environment optimization to ensure your infrastructure is aligned with best practices.</p>
                    </div>
                    <!-- Card 5 -->
                    <div class="group bg-white rounded-[40px] p-10 border border-slate-100 hover:shadow-2xl transition-all duration-300">
                        <div class="w-14 h-14 rounded-2xl bg-hex-surface flex items-center justify-center mb-8 group-hover:bg-hex-dark group-hover:text-white transition-colors">
                            <span class="material-symbols-outlined text-3xl">school</span>
                        </div>
                        <h3 class="text-2xl font-bold text-hex-dark mb-4" data-i18n data-en="Training" data-id="Pelatihan">Training</h3>
                        <p class="text-hex-slate text-base leading-relaxed" data-i18n data-en="Empower your team with hands-on training to effectively use systems, tools, and technologies implemented within your organization." data-id="Berdayakan tim Anda dengan pelatihan praktis untuk menggunakan sistem, alat, dan teknologi yang diimplementasikan secara efektif.">Empower your team with hands-on training to effectively use systems, tools, and technologies implemented within your organization.</p>
                    </div>
                    <!-- Card 6 -->
                    <div class="group bg-white rounded-[40px] p-10 border border-slate-100 hover:shadow-2xl transition-all duration-300">
                        <div class="w-14 h-14 rounded-2xl bg-hex-surface flex items-center justify-center mb-8 group-hover:bg-hex-dark group-hover:text-white transition-colors">
                            <span class="material-symbols-outlined text-3xl">analytics</span>
                        </div>
                        <h3 class="text-2xl font-bold text-hex-dark mb-4" data-i18n data-en="Gap Analysis" data-id="Analisis Kesenjangan">Gap Analysis</h3>
                        <p class="text-hex-slate text-base leading-relaxed" data-i18n data-en="Identify inefficiencies and improvement areas in your current IT systems, workflows, and infrastructure to optimize performance and reduce risks." data-id="Identifikasi inefisiensi dan area perbaikan dalam sistem IT, alur kerja, dan infrastruktur Anda untuk optimasi performa.">Identify inefficiencies and improvement areas in your current IT systems, workflows, and infrastructure to optimize performance and reduce risks.</p>
                    </div>
                    <!-- Card 7 -->
                     <div class="group bg-white rounded-[40px] p-10 border border-slate-100 hover:shadow-2xl transition-all duration-300">
                        <div class="w-14 h-14 rounded-2xl bg-hex-surface flex items-center justify-center mb-8 group-hover:bg-hex-dark group-hover:text-white transition-colors">
                            <span class="material-symbols-outlined text-3xl">psychology</span>
                        </div>
                        <h3 class="text-2xl font-bold text-hex-dark mb-4" data-i18n data-en="IT Consultant" data-id="Konsultan IT">IT Consultant</h3>
                        <p class="text-hex-slate text-base leading-relaxed" data-i18n data-en="Get strategic IT guidance tailored to your business goals â€” from digital transformation planning to infrastructure scaling and technology selection." data-id="Dapatkan panduan IT strategis mulai dari perencanaan transformasi digital hingga penskalaan infrastruktur dan pemilihan teknologi.">Get strategic IT guidance tailored to your business goals â€” from digital transformation planning to infrastructure scaling and technology selection.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Core Advantages Section -->
        <section class="py-24 bg-hex-surface-dark text-white overflow-hidden relative">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="text-center mb-20">
                    <span class="text-blue-400 font-bold uppercase tracking-[0.2em] text-sm mb-4 block" data-i18n data-en="CORE ADVANTAGES" data-id="KEUNGGULAN UTAMA">CORE ADVANTAGES</span>
                    <h2 class="text-[42px] font-bold" data-i18n data-en="Why Choose Our Managed Services?" data-id="Mengapa Memilih Layanan Terkelola Kami?">Why Choose Our Managed Services?</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <!-- Advantage 1 -->
                    <div class="flex flex-col items-center text-center">
                        <div class="w-12 h-12 rounded-full bg-blue-600/20 border border-blue-500/30 flex items-center justify-center mb-6">
                            <span class="material-symbols-outlined text-blue-400">visibility</span>
                        </div>
                        <h4 class="text-xl font-bold mb-3" data-i18n data-en="Proactive Monitoring" data-id="Pemantauan Proaktif">Proactive Monitoring</h4>
                        <p class="text-slate-400 text-sm leading-relaxed" data-i18n data-en="Continuous monitoring to detect and resolve issues before they impact your operations." data-id="Pemantauan berkelanjutan untuk mendeteksi dan menyelesaikan masalah sebelum berdampak pada operasional Anda.">Continuous monitoring to detect and resolve issues before they impact your operations.</p>
                    </div>
                    <!-- Advantage 2 -->
                    <div class="flex flex-col items-center text-center">
                        <div class="w-12 h-12 rounded-full bg-blue-600/20 border border-blue-500/30 flex items-center justify-center mb-6">
                            <span class="material-symbols-outlined text-blue-400">security</span>
                        </div>
                        <h4 class="text-xl font-bold mb-3" data-i18n data-en="Secure & Reliable Systems" data-id="Sistem Aman & Andal">Secure & Reliable Systems</h4>
                        <p class="text-slate-400 text-sm leading-relaxed" data-i18n data-en="Advanced security practices to protect your infrastructure and sensitive data." data-id="Praktik keamanan tingkat lanjut untuk melindungi infrastruktur dan data sensitif Anda.">Advanced security practices to protect your infrastructure and sensitive data.</p>
                    </div>
                    <!-- Advantage 3 -->
                    <div class="flex flex-col items-center text-center">
                        <div class="w-12 h-12 rounded-full bg-blue-600/20 border border-blue-500/30 flex items-center justify-center mb-6">
                            <span class="material-symbols-outlined text-blue-400">speed</span>
                        </div>
                        <h4 class="text-xl font-bold mb-3" data-i18n data-en="Optimized Performance" data-id="Performa Teroptimasi">Optimized Performance</h4>
                        <p class="text-slate-400 text-sm leading-relaxed" data-i18n data-en="Ensure your systems operate at peak efficiency with regular optimization." data-id="Pastikan sistem Anda beroperasi pada efisiensi puncak dengan optimasi berkala.">Ensure your systems operate at peak efficiency with regular optimization.</p>
                    </div>
                    <!-- Advantage 4 -->
                    <div class="flex flex-col items-center text-center">
                        <div class="w-12 h-12 rounded-full bg-blue-600/20 border border-blue-500/30 flex items-center justify-center mb-6">
                            <span class="material-symbols-outlined text-blue-400">expand</span>
                        </div>
                        <h4 class="text-xl font-bold mb-3" data-i18n data-en="Flexible & Scalable" data-id="Fleksibel & Skalabel">Flexible & Scalable</h4>
                        <p class="text-slate-400 text-sm leading-relaxed" data-i18n data-en="Services that grow with your business needs â€” from startup to enterprise." data-id="Layanan yang berkembang seiring kebutuhan bisnis â€” dari startup hingga enterprise.">Services that grow with your business needs â€” from startup to enterprise.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Technology Stack -->
        <section class="py-24 bg-slate-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="mb-12">
                    <span class="text-hex-blue font-bold uppercase tracking-[0.2em] text-sm mb-4 block" data-i18n data-en="TECHNOLOGY STACK" data-id="STACK TEKNOLOGI">TECHNOLOGY STACK</span>
                    <h2 class="text-[42px] font-bold text-hex-dark" data-i18n data-en="Built with reliable and widely-used technologies" data-id="Dibangun dengan teknologi andal yang banyak digunakan">Built with reliable and widely-used technologies</h2>
                </div>

                <div class="flex flex-wrap gap-3">
                    <span class="px-6 py-2.5 bg-white border border-slate-200 rounded-full text-sm font-bold text-slate-600 shadow-sm">AWS / GCP</span>
                    <span class="px-6 py-2.5 bg-white border border-slate-200 rounded-full text-sm font-bold text-slate-600 shadow-sm">Linux Server</span>
                    <span class="px-6 py-2.5 bg-white border border-slate-200 rounded-full text-sm font-bold text-slate-600 shadow-sm">Nginx</span>
                    <span class="px-6 py-2.5 bg-white border border-slate-200 rounded-full text-sm font-bold text-slate-600 shadow-sm">Docker</span>
                    <span class="px-6 py-2.5 bg-white border border-slate-200 rounded-full text-sm font-bold text-slate-600 shadow-sm">Kubernetes</span>
                    <span class="px-6 py-2.5 bg-white border border-slate-200 rounded-full text-sm font-bold text-slate-600 shadow-sm">PostgreSQL</span>
                    <span class="px-6 py-2.5 bg-white border border-slate-200 rounded-full text-sm font-bold text-slate-600 shadow-sm">MySQL</span>
                    <span class="px-6 py-2.5 bg-white border border-slate-200 rounded-full text-sm font-bold text-slate-600 shadow-sm">MongoDB</span>
                    <span class="px-6 py-2.5 bg-white border border-slate-200 rounded-full text-sm font-bold text-slate-600 shadow-sm">Redis</span>
                    <span class="px-6 py-2.5 bg-white border border-slate-200 rounded-full text-sm font-bold text-slate-600 shadow-sm">Grafana</span>
                    <span class="px-6 py-2.5 bg-white border border-slate-200 rounded-full text-sm font-bold text-slate-600 shadow-sm">Prometheus</span>
                    <span class="px-6 py-2.5 bg-white border border-slate-200 rounded-full text-sm font-bold text-slate-600 shadow-sm">GitHub Actions</span>
                    <span class="px-6 py-2.5 bg-white border border-slate-200 rounded-full text-sm font-bold text-slate-600 shadow-sm">SSL / HTTPS</span>
                    <span class="px-6 py-2.5 bg-white border border-slate-200 rounded-full text-sm font-bold text-slate-600 shadow-sm">Cloudflare</span>
                    <span class="px-6 py-2.5 bg-white border border-slate-200 rounded-full text-sm font-bold text-slate-600 shadow-sm">REST API</span>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="pt-0 pb-0 bg-white overflow-hidden">
            <div class="max-w-7xl mx-auto px-10 sm:px-20 lg:px-32">
                <div class="grid grid-cols-1 md:grid-cols-[auto_1fr] gap-16 items-end md:-ml-12">
                    <!-- Left: Talent Image -->
                    <div class="relative order-2 md:order-1 flex justify-start items-end">
                        <img src="{{ asset('assets/img/talent.png') }}" alt="IT Consultant Talent" class="w-full h-auto object-contain max-h-[500px] transform translate-y-2">
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

    <script src="js/main.js"></script>
    <script src="js/lang.js"></script>
</body>
@endsection





