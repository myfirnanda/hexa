@extends('layouts.main')

@section('title', 'Hexavara')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/homepage1.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/homepage-responsive.css') }}" />
@endpush

@section('content')
    <!-- Hero Section -->
    <main>
        <!-- Hero Section -->
        <section class="relative w-full h-[583px] overflow-hidden bg-hex-surface lg:bg-transparent">
            <div class="absolute inset-0 z-0 bg-cover bg-top lg:block hidden opacity-80"
                style="background-image: url('{{ asset('assets/img/Biru Modern Ucapan Selamat Ulang Tahun Instagram Post (2) 4.png') }}');">
            </div>
            <div class="max-w-[1280px] mx-auto h-full relative z-10 px-4 lg:px-0">
                <div class="lg:absolute lg:left-[58px] lg:top-1/2 lg:-translate-y-1/2 max-w-[763px] pt-12 lg:pt-0">
                    <h1 class="hero-title text-hex-dark" data-i18n="html"
                        data-en="Transforming<br />Ideas into <span class='text-hex-blue'>Digital<br />Excellence</span>"
                        data-id="Mengubah Ide<br />Menjadi <span class='text-hex-blue'>Keunggulan<br />Digital</span>">
                        Transforming<br />Ideas into <span class="text-hex-blue">Digital<br />Excellence</span></h1>
                    <p class="mt-6 text-hex-slate text-lg leading-[1.65] max-w-[505px]" data-i18n
                        data-en="Enhance your business capabilities to innovate and compete in today’s dynamic market by harnessing the power of data."
                        data-id="Tingkatkan kapabilitas bisnis untuk berinovasi dan bersaing melalui pemanfaatan data secara tepat.">
                        Enhance your business capabilities to innovate and compete in today’s dynamic market by
                        harnessing the power of data.</p>
                    <a href="{{ route('start-project') }}"
                        class="mt-8 inline-block px-8 py-3 bg-hex-dark text-white rounded-xl font-bold text-base hover:shadow-2xl hover:-translate-y-1 transition-all shadow-xl"
                        data-i18n data-en="Consult Now" data-id="Konsultasi Sekarang">Consult Now</a>
                </div>
                <img src="" alt="Hero Image"
                    class="hidden lg:block absolute right-[-85px] top-0 h-[583px] object-contain" id="randomImage">
            </div>
        </section>

        <!-- Stats Section -->
        <section class="py-16 bg-white">
            <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h2 class="text-2xl md:text-3xl font-medium text-slate-900 mb-12">
                    <span
                        class="we-have-collaborated-with-50-client-partners-from-big-company-and-foundation-all-over-indonesia"
                        data-i18n="html"
                        data-en="We have collaborated with <span class='text-blue-600 font-bold'>50+ client partners</span> from<br />Big Company and foundation all over Indonesia."
                        data-id="Telah berkolaborasi dengan <span class='text-blue-600 font-bold'>50+ mitra klien</span> dari<br />perusahaan besar dan lembaga di seluruh Indonesia.">
                        We have collaborated with <span class="text-blue-600 font-bold">50+ client partners</span>
                        from<br />Big Company and foundation all over Indonesia.
                    </span>
                </h2>
                <div class="w-20 h-1 bg-blue-600 mx-auto rounded-full mb-12"></div>

                <!-- Partner Logos Grid - Responsive Layout -->
                <div
                    class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-7 gap-8 md:gap-12 mb-16 mx-auto max-w-[1200px] items-center justify-items-center opacity-80">
                    @foreach($clients as $homeClient)
                        @if($homeClient->logo)
                            <img src="{{ Storage::url($homeClient->logo) }}" alt="{{ $homeClient->name }}" class="h-10 md:h-12 w-auto object-contain">
                        @endif
                    @endforeach
                </div>

                <!-- View All Link -->
                <div class="mb-12">
                    <a href="{{ route('clients') }}"
                        class="view-all text-slate-800 font-bold hover:text-blue-600 underline decoration-2 underline-offset-8 transition-colors"
                        data-i18n data-en="View All" data-id="Lihat Semua">View
                        All</a>
                </div>

                <!-- Stats Detailed -->
                <div id="stats-section"
                    class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center pt-16 border-t border-slate-100 divide-y md:divide-y-0 md:divide-x divide-slate-100">
                    <div class="flex flex-col items-center py-4">
                        <div class="text-4xl md:text-5xl font-extrabold text-slate-900 mb-2 stat-number" data-target="77" data-suffix="+">0+</div>
                        <div class="text-sm font-bold text-slate-500 uppercase tracking-widest" data-i18n
                            data-en="Happy Clients" data-id="Klien Puas">Happy Clients</div>
                    </div>
                    <div class="flex flex-col items-center py-4">
                        <div class="text-4xl md:text-5xl font-extrabold text-slate-900 mb-2 stat-number" data-target="116" data-suffix="+">0+</div>
                        <div class="text-sm font-bold text-slate-500 uppercase tracking-widest" data-i18n
                            data-en="Projects Delivered" data-id="Proyek Diselesaikan">Projects Delivered</div>
                    </div>
                    <div class="flex flex-col items-center py-4">
                        <div class="text-4xl md:text-5xl font-extrabold text-slate-900 mb-2 stat-number" data-target="86" data-suffix="%">0%</div>
                        <div class="text-sm font-bold text-slate-500 uppercase tracking-widest" data-i18n
                            data-en="Client Retention" data-id="Retensi Klien">Client Retention</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Products Section -->
        <section class="pt-12 pb-20 bg-slate-900 text-white overflow-hidden relative">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col md:flex-row justify-between items-end mb-12">
                    <div>
                        <h2 class="products text-[42px] font-bold mb-4" data-i18n data-en="Product" data-id="Produk">
                            Product</h2>
                        <p class="text8 text-slate-400 text-lg max-w-2xl" data-i18n
                            data-en="A showcase of our recent high-impact digital products."
                            data-id="Tampilan produk digital unggulan terbaru kami.">A showcase of our recent
                            high-impact digital products.</p>
                    </div>
                    <div class="flex space-x-4 mt-6 md:mt-0">
                        <button id="products-prev"
                            class="w-12 h-12 rounded-full bg-white/10 flex items-center justify-center hover:bg-white/20 transition-all text-white">
                            <span class="material-symbols-outlined">chevron_left</span>
                        </button>
                        <button id="products-next"
                            class="w-12 h-12 rounded-full bg-white/10 flex items-center justify-center hover:bg-white/20 transition-all text-white">
                            <span class="material-symbols-outlined">chevron_right</span>
                        </button>
                    </div>
                </div>

                <!-- Carousel container -->
                <div class="relative w-full overflow-hidden">
                    <div class="flex gap-6 transition-transform duration-500 ease-in-out" id="product-slider">
                        <!-- Card 1 -->
                        <a href="detail_product.html"
                            class="min-w-[85vw] md:min-w-[450px] min-h-[480px] rounded-3xl border border-white/10 overflow-hidden relative group flex flex-col block cursor-pointer"
                            style="background: rgba(18, 27, 38, 0.5); backdrop-filter: blur(12px);"
                            data-product-card="0">
                            <div
                                class="absolute inset-0 bg-gradient-to-br from-blue-600/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none">
                            </div>
                            <img src="{{ asset('assets/img/projects/project_cost.png') }}" class="w-full h-48 object-cover border-b border-white/10"
                                alt="Hexavara Cost System">
                            <div class="p-8 relative z-10 flex-grow flex flex-col items-start">
                                <span
                                    class="enterprise-saa-s inline-block w-fit px-4 py-1.5 rounded-full text-[#0C5BED] text-[10px] font-bold uppercase tracking-widest mb-4"
                                    style="background: rgba(12, 91, 237, 0.2);" data-i18n
                                    data-en="Enterprise Software" data-id="Perangkat Lunak Enterprise">Enterprise
                                    Software</span>
                                <h3 class="text7 text-2xl font-bold text-white mb-4" data-i18n="html"
                                    data-en="Hexavara Cost<br />Management System"
                                    data-id="Hexavara Cost<br />Management System">Hexavara Cost<br />Management System
                                </h3>
                                <p class="text6 text-slate-400 mb-8 flex-grow" data-i18n
                                    data-en="The unified operating system for modern enterprises, bridging the gap between operations and finance."
                                    data-id="Sistem operasi terpadu untuk perusahaan modern, menjembatani kesenjangan antara operasional dan keuangan.">
                                    The unified operating system for modern
                                    enterprises, bridging the gap between operations and finance.</p>
                                <span
                                    class="w-fit inline-flex items-center text-white font-bold group-hover:text-blue-400 transition-colors gap-2 mt-auto group/btn">
                                    <span class="learn-more" data-i18n data-en="Learn more"
                                        data-id="Selengkapnya">Learn more</span>
                                    <span
                                        class="material-symbols-outlined transform group-hover/btn:translate-x-1 transition-transform">arrow_right_alt</span>
                                </span>
                            </div>
                        </a>

                        <!-- Card 2 -->
                        <a href="#"
                            class="min-w-[85vw] md:min-w-[450px] min-h-[480px] rounded-3xl border border-white/10 overflow-hidden relative group flex flex-col block cursor-pointer"
                            style="background: rgba(18, 27, 38, 0.5); backdrop-filter: blur(12px);"
                            data-product-card="1">
                            <div
                                class="absolute inset-0 bg-gradient-to-br from-purple-600/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none">
                            </div>
                            <img src="{{ asset('assets/img/overlay-blur.png') }}" class="w-full h-48 object-cover border-b border-white/10"
                                alt="VaraPay Core">
                            <div class="p-8 relative z-10 flex-grow flex flex-col items-start">
                                <span
                                    class="financial-tech inline-block w-fit px-4 py-1.5 rounded-full text-[#9333ea] text-[10px] font-bold uppercase tracking-widest mb-4"
                                    style="background: rgba(147, 51, 234, 0.2);" data-i18n data-en="FINANCIAL TECH"
                                    data-id="TEKNOLOGI FINANSIAL">FINANCIAL TECH</span>
                                <h3 class="vara-pay-core text-2xl font-bold text-white mb-4">VaraPay Core</h3>
                                <p class="global-payments-infrastructure-designed-for-the-digital-economy-supporting-100-currencies-and-instant-settlement text-slate-400 mb-8 flex-grow"
                                    data-i18n
                                    data-en="Smart cost management system for efficient budgeting and better financial control."
                                    data-id="Sistem manajemen biaya cerdas untuk penganggaran efisien dan kontrol keuangan yang lebih baik.">
                                    Smart cost management system for efficient budgeting and better financial control.
                                </p>
                                <span
                                    class="w-fit inline-flex items-center text-white font-bold group-hover:text-purple-400 transition-colors gap-2 mt-auto group/btn">
                                    <span class="learn-more" data-i18n data-en="Learn more"
                                        data-id="Selengkapnya">Learn more</span>
                                    <span
                                        class="material-symbols-outlined transform group-hover/btn:translate-x-1 transition-transform">arrow_right_alt</span>
                                </span>
                            </div>
                        </a>

                        <!-- Card 3 -->
                        <a href="#"
                            class="min-w-[85vw] md:min-w-[450px] min-h-[480px] rounded-3xl border border-white/10 overflow-hidden relative group flex flex-col block cursor-pointer"
                            style="background: rgba(18, 27, 38, 0.5); backdrop-filter: blur(12px);"
                            data-product-card="2">
                            <div
                                class="absolute inset-0 bg-gradient-to-br from-teal-600/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none">
                            </div>
                            <img src="{{ asset('assets/img/image-overlay-shadow.png') }}"
                                class="w-full h-48 object-cover border-b border-white/10" alt="NexaGrid Suite">
                            <div class="p-8 relative z-10 flex-grow flex flex-col items-start">
                                <span
                                    class="dummy-product-badge inline-block w-fit px-4 py-1.5 rounded-full text-[#0d9488] text-[10px] font-bold uppercase tracking-widest mb-4"
                                    style="background: rgba(13, 148, 136, 0.2);" data-i18n data-en="AI PLATFORM"
                                    data-id="PLATFORM AI">AI PLATFORM</span>
                                <h3 class="dummy-product-title text-2xl font-bold text-white mb-4">NexaGrid Suite</h3>
                                <p class="dummy-product-description text-slate-400 mb-8 flex-grow" data-i18n
                                    data-en="Enterprise suite for analytics, automation, and cross-team collaboration with scalable cloud architecture."
                                    data-id="Suite enterprise untuk analitik, otomasi, dan kolaborasi lintas tim dengan arsitektur cloud yang skalabel.">
                                    Enterprise suite for
                                    analytics, automation, and cross-team collaboration with scalable cloud
                                    architecture.
                                </p>
                                <span
                                    class="w-fit inline-flex items-center text-white font-bold group-hover:text-teal-400 transition-colors gap-2 mt-auto group/btn">
                                    <span class="learn-more" data-i18n data-en="Learn more"
                                        data-id="Selengkapnya">Learn more</span>
                                    <span
                                        class="material-symbols-outlined transform group-hover/btn:translate-x-1 transition-transform">arrow_right_alt</span>
                                </span>
                            </div>
                        </a>

                        <!-- Card 4 -->
                        <a href="#"
                            class="min-w-[85vw] md:min-w-[450px] min-h-[480px] rounded-3xl border border-white/10 overflow-hidden relative group flex flex-col block cursor-pointer"
                            style="background: rgba(18, 27, 38, 0.5); backdrop-filter: blur(12px);"
                            data-product-card="3">
                            <div
                                class="absolute inset-0 bg-gradient-to-br from-indigo-600/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none">
                            </div>
                            <img src="{{ asset('assets/img/projects/proyek_all_wika.png') }}"
                                class="w-full h-48 object-cover border-b border-white/10" alt="Cloud Infrastructure">
                            <div class="p-8 relative z-10 flex-grow flex flex-col items-start">
                                <span
                                    class="cloud-solutions-badge inline-block w-fit px-4 py-1.5 rounded-full text-[#4f46e5] text-[10px] font-bold uppercase tracking-widest mb-4"
                                    style="background: rgba(79, 70, 229, 0.2);" data-i18n data-en="CLOUD SOLUTIONS"
                                    data-id="SOLUSI CLOUD">CLOUD SOLUTIONS</span>
                                <h3 class="cloud-solutions-title text-2xl font-bold text-white mb-4">VaraCloud Engine
                                </h3>
                                <p class="cloud-solutions-description text-slate-400 mb-8 flex-grow" data-i18n
                                    data-en="High-performance cloud infrastructure for web applications, databases, and secure enterprise backups."
                                    data-id="Infrastruktur cloud berperforma tinggi untuk aplikasi web, database, dan pencadangan enterprise yang aman.">
                                    High-performance cloud infrastructure for web applications, databases, and secure
                                    enterprise backups.
                                </p>
                                <span
                                    class="w-fit inline-flex items-center text-white font-bold group-hover:text-indigo-400 transition-colors gap-2 mt-auto group/btn">
                                    <span class="learn-more" data-i18n data-en="Learn more"
                                        data-id="Selengkapnya">Learn more</span>
                                    <span
                                        class="material-symbols-outlined transform group-hover/btn:translate-x-1 transition-transform">arrow_right_alt</span>
                                </span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Services Section -->
        <section class="py-24 bg-white relative overflow-hidden">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Header Group -->
                <div
                    class="max-w-5xl mx-auto flex flex-col md:flex-row justify-between items-start md:items-end mb-16 gap-6">
                    <div class="max-w-xl">
                        <h2 class="text-[42px] font-bold text-[#121B26] mb-4" data-i18n data-en="Services"
                            data-id="Layanan">Services</h2>
                        <p class="text-slate-500 text-lg leading-relaxed" data-i18n="html"
                            data-en="Together with our clients, we build the future.<br />Developing software solutions that tackle your industry's biggest challenges."
                            data-id="Bersama klien kami, membangun masa depan.<br />Mengembangkan solusi perangkat lunak untuk tantangan terbesar industri Anda.">
                            Together with our clients, we build the future.<br />
                            Developing software solutions that tackle your industry's biggest challenges.
                        </p>
                    </div>
                    <div class="pb-2">
                        <a href="{{ route('services.index') }}"
                            class="text-blue-600 font-bold flex items-center gap-2 hover:text-blue-700 transition-colors group">
                            <span data-i18n data-en="View All Services" data-id="Lihat Semua Layanan">View All
                                Services</span>
                            <span
                                class="material-symbols-outlined transform group-hover:translate-x-1 transition-transform">arrow_right_alt</span>
                        </a>
                    </div>
                </div>

                <!-- Services Grid -->
                <div class="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Service 1 -->
                    <a href="{{ route('services.software-development') }}"
                        class="group block bg-white border-2 border-slate-100 rounded-[40px] p-10 h-[500px] relative overflow-hidden transition-all duration-500 shadow-sm hover:shadow-xl hover:-translate-y-2 hover:bg-[#0F172A]">
                        <div class="relative z-10">
                            <h3 class="text-3xl font-bold text-[#121B26] leading-tight group-hover:text-white transition-colors"
                                data-i18n="html" data-en="Software<br />Development"
                                data-id="Pengembangan<br />Perangkat Lunak">Software<br />Development</h3>
                            <p class="mt-8 text-white/90 text-base leading-relaxed opacity-0 group-hover:opacity-100 transition-opacity duration-500"
                                data-i18n
                                data-en="Elevate your digital presence with our software development services. We specialize in crafting bespoke solutions to your business needs, ensuring seamless functionality and user-centric experiences. Our expert team employs the latest technologies to deliver scalable, high-performance software that propels your business forward."
                                data-id="Tingkatkan kehadiran digital Anda dengan layanan pengembangan perangkat lunak kami. Kami mengkhususkan diri dalam membuat solusi khusus untuk kebutuhan bisnis Anda, memastikan fungsionalitas yang mulus dan pengalaman yang berpusat pada pengguna.">
                                Elevate your digital presence with our software development services. We specialize in
                                crafting bespoke solutions to your business needs, ensuring seamless functionality and
                                user-centric experiences. Our expert team employs the latest technologies to deliver
                                scalable, high-performance software that propels your business forward.
                            </p>
                        </div>
                        <div
                            class="absolute bottom-0 right-0 transform translate-x-4 translate-y-4 group-hover:opacity-0 transition-opacity duration-300">
                            <img src="{{ asset('assets/img/icon-gear-chrome.png') }}"
                                class="w-64 h-64 object-contain opacity-90 group-hover:opacity-100 transition-opacity"
                                alt="Software Development">
                        </div>
                    </a>

                    <!-- Service 2 -->
                    <a href="{{ route('services.startup-incubator') }}"
                        class="group block bg-white border-2 border-slate-100 rounded-[40px] p-10 h-[500px] relative overflow-hidden transition-all duration-500 shadow-sm hover:shadow-xl hover:-translate-y-2 hover:bg-[#0F172A]">
                        <div class="relative z-10">
                            <h3 class="text-3xl font-bold text-[#121B26] leading-tight group-hover:text-white transition-colors"
                                data-i18n="html" data-en="Startup &amp;<br />Incubator"
                                data-id="Startup &amp;<br />Inkubator">Startup &<br />Incubator</h3>
                            <p class="mt-8 text-white/90 text-base leading-relaxed opacity-0 group-hover:opacity-100 transition-opacity duration-500"
                                data-i18n
                                data-en="Navigate the complexities of startup success with our expert consultancy services. From ideation to execution, we offer strategic guidance to optimize your business model. With investor partner behind us we will help to accelerate growth of your startup. Make a collaboration with us to turn your entrepreneurial vision into reality."
                                data-id="Navigasi kompleksitas keberhasilan startup dengan layanan konsultasi ahli kami. Dari ide hingga eksekusi, kami menawarkan panduan strategis untuk mengoptimalkan model bisnis Anda. Dengan mitra investor di belakang kami, kami akan membantu mengakselerasi pertumbuhan startup Anda.">
                                Navigate the complexities of startup success with our expert consultancy services. From
                                ideation to execution, we offer strategic guidance to optimize your business model. With
                                investor partner behind us we will help to accelerate growth of your startup. Make a
                                collaboration with us to turn your entrepreneurial vision into reality.
                            </p>
                        </div>
                        <div
                            class="absolute bottom-0 right-0 transform translate-x-4 translate-y-4 group-hover:opacity-0 transition-opacity duration-300">
                            <img src="{{ asset('assets/img/icon-rocket-launch.png') }}"
                                class="w-64 h-64 object-contain opacity-90 group-hover:opacity-100 transition-opacity"
                                alt="Startup & Incubator">
                        </div>
                    </a>

                    <!-- Service 3 -->
                    <a href="{{ route('services.managedService') }}"
                        class="group block bg-white border-2 border-slate-100 rounded-[40px] p-10 h-[500px] relative overflow-hidden transition-all duration-500 shadow-sm hover:shadow-xl hover:-translate-y-2 hover:bg-[#0F172A]">
                        <div class="relative z-10">
                            <h3 class="text-3xl font-bold text-[#121B26] leading-tight group-hover:text-white transition-colors"
                                data-i18n="html" data-en="Managed<br />Services" data-id="Layanan<br />Terkelola">
                                Managed<br />Services</h3>
                            <p class="mt-8 text-white/90 text-base leading-relaxed opacity-0 group-hover:opacity-100 transition-opacity duration-500"
                                data-i18n
                                data-en="Optimize your IT infrastructure with our comprehensive managed services. We provide comprehensive solutions, including proactive system monitoring, and strategic IT planning. Trust us to optimize your technology segment, ensuring most effective operations and allowing you to stay ahead in the digital landscape."
                                data-id="Optimalkan infrastruktur TI Anda dengan layanan terkelola kami yang komprehensif. Kami menyediakan solusi lengkap, termasuk pemantauan sistem secara proaktif dan perencanaan TI strategis untuk memastikan operasi yang paling efektif.">
                                Optimize your IT infrastructure with our comprehensive managed services. We provide
                                comprehensive solutions, including proactive system monitoring, and strategic IT
                                planning. Trust us to optimize your technology segment, ensuring most effective
                                operations and allowing you to stay ahead in the digital landscape.
                            </p>
                        </div>
                        <div
                            class="absolute bottom-0 right-0 transform translate-x-4 translate-y-4 group-hover:opacity-0 transition-opacity duration-300">
                            <img src="{{ asset('assets/img/icon-download-preview.png') }}"
                                class="w-64 h-64 object-contain opacity-90 group-hover:opacity-100 transition-opacity"
                                alt="Managed Services">
                        </div>
                    </a>
                </div>
            </div>
        </section>

        <!-- Projects Filters Section -->
        <section class="py-20 bg-slate-50 border-t border-slate-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="our-projects text-[42px] font-bold text-slate-900 mb-4" data-i18n
                        data-en="Our Projects" data-id="Proyek Kami">Our Projects</h2>
                    <p class="we-deliver-our-best-performance-in-every-project-to-ensure-our-customers-are-satisfied-with-the-product text-slate-500 max-w-2xl mx-auto"
                        data-i18n
                        data-en="We deliver our best performance in every project to ensure our customers are satisfied with the product."
                        data-id="Kami memberikan performa terbaik di setiap proyek untuk memastikan kepuasan pelanggan.">
                        We deliver our best performance in every project to ensure our customers are satisfied with the
                        product.</p>
                </div>

                <!-- Filter Bar -->
                <div class="flex justify-center mb-12">
                    <div
                        class="inline-flex flex-wrap justify-center bg-slate-100 p-1.5 rounded-full gap-1 shadow-inner">
                        <button
                            class="btn-filter active-filter px-6 py-2.5 rounded-full text-slate-700 font-medium transition-all text-sm"
                            data-filter="all" data-i18n data-en="All" data-id="Semua">All</button>
                        <button
                            class="btn-filter px-6 py-2.5 rounded-full text-slate-500 font-medium hover:text-[#0F172A] transition-all text-sm"
                            data-filter="software-development" data-i18n data-en="Software Development"
                            data-id="Pengembangan Perangkat Lunak">Software Development</button>
                        <button
                            class="btn-filter px-6 py-2.5 rounded-full text-slate-500 font-medium hover:text-[#0F172A] transition-all text-sm"
                            data-filter="digital-branding" data-i18n data-en="Digital Branding"
                            data-id="Branding Digital">Digital Branding</button>
                        <button
                            class="btn-filter px-6 py-2.5 rounded-full text-slate-500 font-medium hover:text-[#0F172A] transition-all text-sm"
                            data-filter="startup-incubator" data-i18n data-en="Startup Incubator"
                            data-id="Inkubator Startup">Startup Incubator</button>
                        <button
                            class="btn-filter px-6 py-2.5 rounded-full text-slate-500 font-medium hover:text-[#0F172A] transition-all text-sm"
                            data-filter="it-consultant" data-i18n data-en="IT Consultant" data-id="Konsultan TI">IT
                            Consultant</button>
                    </div>
                </div>

                @php
                    $homeCatMap = [
                        'software-development' => ['badge' => 'bg-blue-50 text-blue-600',   'en' => 'Software Development', 'id' => 'Pengembangan Perangkat Lunak'],
                        'digital-branding'     => ['badge' => 'bg-orange-50 text-orange-600','en' => 'Digital Branding',     'id' => 'Branding Digital'],
                        'startup-incubator'    => ['badge' => 'bg-purple-50 text-purple-600','en' => 'Startup Incubator',    'id' => 'Inkubator Startup'],
                        'it-consultant'        => ['badge' => 'bg-green-50 text-green-600',  'en' => 'IT Consultant',        'id' => 'Konsultan TI'],
                    ];
                @endphp
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($projects->take(6) as $homeProject)
                    @php
                        $homeCat = $homeCatMap[$homeProject->category] ?? ['badge' => 'bg-slate-50 text-slate-600', 'en' => 'Project', 'id' => 'Proyek'];
                        if ($homeProject->image) {
                            $homeImgUrl = str_starts_with($homeProject->image, 'projects/')
                                ? Storage::url($homeProject->image)
                                : asset('assets/img/projects/' . $homeProject->image);
                        } else {
                            $homeImgUrl = null;
                        }
                        $homeDesc = $homeProject->hero_description ?: Str::limit(strip_tags($homeProject->description ?? ''), 160);
                    @endphp
                    <a href="{{ route('works.show', $homeProject) }}"
                        class="project-card group block bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all"
                        data-filter="all {{ $homeProject->category }}">
                        <div class="h-56 overflow-hidden relative {{ !$homeImgUrl ? 'flex items-center justify-center bg-blue-100' : '' }}">
                            @if($homeImgUrl)
                                <img src="{{ $homeImgUrl }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                    alt="{{ $homeProject->name }}">
                            @else
                                <span class="material-symbols-outlined text-6xl text-blue-400">rocket_launch</span>
                            @endif
                        </div>
                        <div class="p-8">
                            <div class="mb-4">
                                <span class="inline-block px-4 py-1.5 rounded-full {{ $homeCat['badge'] }} text-[10px] font-bold tracking-widest uppercase mb-3"
                                    data-i18n data-en="{{ $homeCat['en'] }}" data-id="{{ $homeCat['id'] }}">{{ $homeCat['en'] }}</span>
                            </div>
                            <h3 class="text-xl font-bold text-slate-900 mb-4">{{ $homeProject->name }}</h3>
                            <p class="project-card-desc text-slate-600 text-sm line-clamp-3">{{ $homeDesc }}</p>
                        </div>
                    </a>
                    @endforeach
                </div>

                <div class="mt-12 text-center">
                    <a href="{{ route('works.index') }}"
                        class="projects-view-more inline-block px-8 py-3 rounded-full border border-slate-300 text-slate-700 font-medium hover:bg-slate-100 transition-colors"
                        data-i18n data-en="View More" data-id="Lihat Lainnya">View
                        More</a>
                </div>
            </div>
        </section>

        <!-- Values Section -->
        <section class="py-24 text-white relative overflow-hidden" style="background-color: #0B1221;">
            <!-- Background Glows -->
            <div
                class="absolute top-0 right-0 w-[500px] h-[500px] bg-blue-600/10 rounded-full blur-[120px] -translate-y-1/2 translate-x-1/2">
            </div>
            <div
                class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-blue-600/10 rounded-full blur-[120px] translate-y-1/2 -translate-x-1/2">
            </div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="text-center mb-16">
                    <span class="font-bold uppercase tracking-[0.2em] text-[10px] md:text-sm mb-4 block text-slate-500"
                        data-i18n data-en="OUR VALUE" data-id="NILAI KAMI">OUR VALUE</span>
                    <h2 class="text-[42px] font-bold mb-6 text-white tracking-tight" data-i18n
                        data-en="Why Choose Hexavara" data-id="Mengapa Memilih Hexavara">Why Choose Hexavara</h2>
                    <p class="max-w-2xl mx-auto text-sm md:text-base text-slate-400 leading-relaxed" data-i18n
                        data-en="Excellence in Project Execution, Strategic Oversight, Trusted Technology Partner."
                        data-id="Keunggulan dalam Eksekusi Proyek, Pengawasan Strategis, Mitra Teknologi Terpercaya.">
                        Excellence in Project Execution, Strategic Oversight, Trusted Technology Partner.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-5xl mx-auto">
                    <!-- Value 1 -->
                    <div class="p-6 rounded-[32px] border border-white/[0.03] transition-all duration-300"
                        style="background-color: #0a1221;">
                        <div
                            class="w-10 h-10 bg-[#1d2636] rounded-2xl flex items-center justify-center mb-6 text-blue-500">
                            <span class="material-symbols-outlined text-xl">list_alt</span>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-4" data-i18n data-en="Roadmap for Timeline"
                            data-id="Peta Jalan & Timeline">Roadmap for Timeline</h3>
                        <p class="leading-relaxed text-slate-400 text-base" data-i18n
                            data-en="Our roadmap contains a detailed list of tasks and project timelines that you can monitor at any time. Each roadmap is created based on mutual agreement."
                            data-id="Peta jalan kami berisi daftar tugas dan jadwal proyek terperinci yang dapat Anda pantau kapan saja. Setiap peta jalan dibuat berdasarkan kesepakatan bersama.">
                            Our roadmap contains a detailed list of tasks and project timelines that you can monitor at
                            any time. Each roadmap is created based on mutual agreement.
                        </p>
                    </div>

                    <!-- Value 2 -->
                    <div class="p-6 rounded-[32px] border border-white/[0.03] transition-all duration-300"
                        style="background-color: #0a1221;">
                        <div
                            class="w-10 h-10 bg-[#1d2636] rounded-2xl flex items-center justify-center mb-6 text-blue-500">
                            <span class="material-symbols-outlined text-xl">speed</span>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-4" data-i18n data-en="Weekly Sprint Monitoring"
                            data-id="Pemantauan Sprint Mingguan">Weekly Sprint Monitoring</h3>
                        <p class="leading-relaxed text-slate-400 text-base" data-i18n
                            data-en="This feature helps control sprints, ensuring our programmers work according to the time you've purchased. It also guarantees that your project is success."
                            data-id="Fitur ini membantu mengendalikan sprint, memastikan programmer kami bekerja sesuai waktu yang Anda beli. Fitur ini juga menjamin keberhasilan proyek Anda.">
                            This feature helps control sprints, ensuring our programmers work according to the time
                            you've purchased. It also guarantees that your project is success.
                        </p>
                    </div>

                    <!-- Value 3 -->
                    <div class="p-6 rounded-[32px] border border-white/[0.03] transition-all duration-300"
                        style="background-color: #0a1221;">
                        <div
                            class="w-10 h-10 bg-[#1d2636] rounded-2xl flex items-center justify-center mb-6 text-blue-500">
                            <span class="material-symbols-outlined text-xl">verified_user</span>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-4" data-i18n data-en="Maximum Service"
                            data-id="Layanan Maksimal">Maximum Service</h3>
                        <p class="leading-relaxed text-slate-400 text-base" data-i18n
                            data-en="We guarantee maximum service with bug fixes and improvements handled within 48 hours. This feature allows you to easily track your requests."
                            data-id="Kami menjamin layanan maksimal dengan perbaikan bug dan peningkatan ditangani dalam 48 jam. Fitur ini memungkinkan Anda melacak permintaan dengan mudah.">
                            We guarantee maximum service with bug fixes and improvements handled within 48 hours. This
                            feature allows you to easily track your requests.
                        </p>
                    </div>

                    <!-- Value 4 -->
                    <div class="p-6 rounded-[32px] border border-white/[0.03] transition-all duration-300"
                        style="background-color: #0a1221;">
                        <div
                            class="w-10 h-10 bg-[#1d2636] rounded-2xl flex items-center justify-center mb-6 text-blue-500">
                            <span class="material-symbols-outlined text-xl">trending_up</span>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-4" data-i18n data-en="Monitor Team Performance"
                            data-id="Pantau Performa Tim">Monitor Team Performance</h3>
                        <p class="leading-relaxed text-slate-400 text-base" data-i18n
                            data-en="Each of our talents has daily and monthly targets aligned with the time you've purchased. They compete to deliver their best performance."
                            data-id="Setiap talenta kami memiliki target harian dan bulanan yang selaras dengan waktu yang Anda beli. Mereka bersaing untuk memberikan performa terbaik.">
                            Each of our talents has daily and monthly targets aligned with the time you've purchased.
                            They compete to deliver their best performance.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Clients Section -->
        <section class="py-24 bg-slate-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text9 text-[42px] font-bold text-slate-900 mb-4" data-i18n
                        data-en="Hear From Our Clients" data-id="Kata Klien Kami">Hear From Our Clients</h2>
                    <p class="trust-from-industry-leaders-across-the-globe text-slate-500" data-i18n
                        data-en="Trust from industry leaders across the globe."
                        data-id="Dipercaya oleh pemimpin industri di seluruh dunia.">Trust from industry leaders
                        across the globe.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Testimonial 1 -->
                    <div
                        class="bg-white p-8 rounded-3xl relative shadow-xl shadow-slate-200/50 border border-slate-100">
                        <div class="flex gap-1 text-yellow-400 mb-6">
                            <span class="material-symbols-outlined star-icon"
                                style="font-variation-settings: 'FILL' 1;">star</span><span
                                class="material-symbols-outlined star-icon"
                                style="font-variation-settings: 'FILL' 1;">star</span><span
                                class="material-symbols-outlined star-icon"
                                style="font-variation-settings: 'FILL' 1;">star</span><span
                                class="material-symbols-outlined star-icon"
                                style="font-variation-settings: 'FILL' 1;">star</span><span
                                class="material-symbols-outlined star-icon"
                                style="font-variation-settings: 'FILL' 1;">star</span>
                        </div>
                        <p class="text-slate-700 font-medium italic mb-8">"Hexavara Tech transformed our vision into a
                            scalable product within months. Their technical depth and commitment to quality are
                            unparalleled."</p>
                        <div class="flex items-center gap-4">
                            <div
                                class="w-12 h-12 bg-blue-500 rounded-full flex justify-center items-center text-white">
                                <span class="material-symbols-outlined">person</span>
                            </div>
                            <div>
                                <p class="font-bold text-slate-900">Mark Stevenson</p>
                                <p class="text-sm text-slate-500">CEO at TechFlow</p>
                            </div>
                        </div>
                    </div>
                    <!-- Testimonial 2 -->
                    <div
                        class="bg-white p-8 rounded-3xl relative shadow-xl shadow-slate-200/50 border border-slate-100">
                        <div class="flex gap-1 text-yellow-400 mb-6">
                            <span class="material-symbols-outlined star-icon"
                                style="font-variation-settings: 'FILL' 1;">star</span><span
                                class="material-symbols-outlined star-icon"
                                style="font-variation-settings: 'FILL' 1;">star</span><span
                                class="material-symbols-outlined star-icon"
                                style="font-variation-settings: 'FILL' 1;">star</span><span
                                class="material-symbols-outlined star-icon"
                                style="font-variation-settings: 'FILL' 1;">star</span><span
                                class="material-symbols-outlined star-icon"
                                style="font-variation-settings: 'FILL' 1;">star</span>
                        </div>
                        <p class="text-slate-700 font-medium italic mb-8">"Working with the Hexavara team was like
                            adding a
                            group of experts to our own office. Professional, communicative, and exceptionally skilled."
                        </p>
                        <div class="flex items-center gap-4">
                            <div
                                class="w-12 h-12 bg-purple-500 rounded-full flex justify-center items-center text-white">
                                <span class="material-symbols-outlined">person</span>
                            </div>
                            <div>
                                <p class="font-bold text-slate-900">Lisa Ray</p>
                                <p class="text-sm text-slate-500">VP of Engineering, Nexus</p>
                            </div>
                        </div>
                    </div>
                    <!-- Testimonial 3 -->
                    <div
                        class="bg-white p-8 rounded-3xl relative shadow-xl shadow-slate-200/50 border border-slate-100">
                        <div class="flex gap-1 text-yellow-400 mb-6">
                            <span class="material-symbols-outlined star-icon"
                                style="font-variation-settings: 'FILL' 1;">star</span><span
                                class="material-symbols-outlined star-icon"
                                style="font-variation-settings: 'FILL' 1;">star</span><span
                                class="material-symbols-outlined star-icon"
                                style="font-variation-settings: 'FILL' 1;">star</span><span
                                class="material-symbols-outlined star-icon"
                                style="font-variation-settings: 'FILL' 1;">star</span><span
                                class="material-symbols-outlined star-icon"
                                style="font-variation-settings: 'FILL' 1;">star</span>
                        </div>
                        <p class="text-slate-700 font-medium italic mb-8">"They don't just build what you ask for; they
                            suggest what you actually need. Their strategic thinking has been vital for our growth."</p>
                        <div class="flex items-center gap-4">
                            <div
                                class="w-12 h-12 bg-emerald-500 rounded-full flex justify-center items-center text-white">
                                <span class="material-symbols-outlined">person</span>
                            </div>
                            <div>
                                <p class="font-bold text-slate-900">James Carter</p>
                                <p class="text-sm text-slate-500">Founder, Quantum Labs</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="pt-0 pb-0 bg-white overflow-hidden">
            <div class="max-w-7xl mx-auto px-10 sm:px-20 lg:px-32">
                <div class="grid grid-cols-1 md:grid-cols-[auto_1fr] gap-16 items-end md:-ml-12">
                    <!-- Left: Talent Image -->
                    <div class="relative order-2 md:order-1 flex justify-start items-end">
                        <img src="{{ asset('assets/img/talent.png') }}" alt="IT Consultant Talent" class="block w-full h-auto object-contain max-h-[500px] align-bottom">
                    </div>

                    <!-- Right: Content -->
                    <div class="order-1 md:order-2 self-center max-w-2xl">
                        @include('partials.solution')
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@push('scripts')
    <script>
        $(function () {
            var $filterBtns = $('.btn-filter');
            var $projectCards = $('.project-card');
            var $nextBtn = $('#products-next');
            var $prevBtn = $('#products-prev');
            var $slider = $('#product-slider');
            var currentIdx = 0;

            $filterBtns.on('click', function () {
                var filter = $(this).data('filter');

                $filterBtns.removeClass('active-filter text-white').addClass('text-slate-500');
                $(this).addClass('active-filter text-white').removeClass('text-slate-500');

                $projectCards.each(function () {
                    var cardFilters = (String($(this).data('filter')) || '').split(' ');
                    $(this).css('display', $.inArray(filter, cardFilters) !== -1 ? 'block' : 'none');
                });
            });

            if ($nextBtn.length && $prevBtn.length && $slider.length) {
                function updateSlider() {
                    var $firstCard = $slider.children().first();
                    if (!$firstCard.length) {
                        return;
                    }

                    var cardWidth = $firstCard.outerWidth() + 24;
                    $slider.css('transform', 'translateX(-' + (currentIdx * cardWidth) + 'px)');
                }

                $nextBtn.on('click', function (e) {
                    e.preventDefault();
                    var totalCards = $slider.children().length;
                    var visibleCards = $(window).width() >= 768 ? 2 : 1;

                    if (currentIdx < totalCards - visibleCards) {
                        currentIdx++;
                        updateSlider();
                    }
                });

                $prevBtn.on('click', function (e) {
                    e.preventDefault();
                    if (currentIdx > 0) {
                        currentIdx--;
                        updateSlider();
                    }
                });

                $(window).on('resize', updateSlider);
                setTimeout(updateSlider, 500);
            }

            // --- Stats Count-Up Animation ---
            (function () {
                var hasRun = false;
                var DURATION = 3000;

                function easeOutQuart(t) {
                    return 1 - Math.pow(1 - t, 4);
                }

                function runCountUp() {
                    if (hasRun) return;
                    hasRun = true;

                    $('.stat-number').each(function () {
                        var $el = $(this);
                        var target = parseInt($el.data('target'), 10);
                        var suffix = $el.data('suffix') || '';
                        var startTime = null;

                        function step(timestamp) {
                            if (!startTime) startTime = timestamp;
                            var elapsed = timestamp - startTime;
                            var progress = Math.min(elapsed / DURATION, 1);
                            var current = Math.floor(easeOutQuart(progress) * target);
                            $el.text(current + suffix);
                            if (progress < 1) {
                                requestAnimationFrame(step);
                            } else {
                                $el.text(target + suffix);
                            }
                        }

                        requestAnimationFrame(step);
                    });
                }

                var statsEl = document.getElementById('stats-section');
                if (statsEl && 'IntersectionObserver' in window) {
                    var observer = new IntersectionObserver(function (entries) {
                        entries.forEach(function (entry) {
                            if (entry.isIntersecting) {
                                runCountUp();
                                observer.disconnect();
                            }
                        });
                    }, { threshold: 0.3 });
                    observer.observe(statsEl);
                } else {
                    // Fallback: langsung jalankan tanpa animasi
                    $('.stat-number').each(function () {
                        var $el = $(this);
                        $el.text($el.data('target') + ($el.data('suffix') || ''));
                    });
                }
            })();
            // --- End Stats Count-Up ---

            let images = [
                "{{ asset('assets/img/hero/hero_homepage1.png') }}",
                "{{ asset('assets/img/hero/hero_homepage2.png') }}",
                "{{ asset('assets/img/hero/hero_homepage3.png') }}",
            ];

            let random = Math.floor(Math.random() * images.length);
            $("#randomImage").attr("src", images[random]);
        });
    </script>
@endpush
