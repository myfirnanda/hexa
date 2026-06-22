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
        <section class="relative w-full h-[583px] overflow-hidden bg-gray-900 lg:bg-transparent">
            <div id="mobileHeroBg" class="absolute inset-0 z-0 bg-cover bg-center lg:hidden"></div>
            <div class="max-w-[1280px] mx-auto h-full relative z-10 px-4 lg:px-0 flex items-center justify-center lg:block">
                <div
                    class="lg:absolute lg:left-[58px] lg:top-1/2 lg:-translate-y-1/2 lg:z-[2] max-w-[763px] lg:max-w-[490px] lg:pt-0 w-full
                                    bg-white/60 backdrop-blur-md rounded-2xl p-6 text-center border border-white/60
                                    lg:bg-transparent lg:backdrop-blur-none lg:rounded-none lg:p-0 lg:w-auto lg:text-left lg:border-0">
                    @if($heroBanner && $heroBanner->hero_title)
                        @if($heroBanner->hero_title_id)
                            <h1 class="hero-title text-hex-dark" data-i18n="html"
                                data-en="{{ $heroBanner->hero_title }}"
                                data-id="{{ $heroBanner->hero_title_id }}">{!! $heroBanner->hero_title !!}</h1>
                        @else
                            <h1 class="hero-title text-hex-dark">{!! $heroBanner->hero_title !!}</h1>
                        @endif
                    @else
                        <h1 class="hero-title text-hex-dark" data-i18n="html"
                            data-en="Transforming<br />Ideas into <span class=’text-hex-blue’>Digital<br />Excellence</span>"
                            data-id="Mengubah Ide<br />Menjadi <span class=’text-hex-blue’>Keunggulan<br />Digital</span>">
                            Transforming<br />Ideas into <span class="text-hex-blue">Digital<br />Excellence</span></h1>
                    @endif
                    @if($heroBanner && $heroBanner->hero_description)
                        @if($heroBanner->hero_description_id)
                            <p class="mt-6 text-hex-slate text-lg leading-[1.65] lg:max-w-[505px]" data-i18n
                                data-en="{{ $heroBanner->hero_description }}"
                                data-id="{{ $heroBanner->hero_description_id }}">{{ $heroBanner->hero_description }}</p>
                        @else
                            <p class="mt-6 text-hex-slate text-lg leading-[1.65] lg:max-w-[505px]">
                                {{ $heroBanner->hero_description }}</p>
                        @endif
                    @else
                        <p class="mt-6 text-hex-slate text-lg leading-[1.65] lg:max-w-[505px]" data-i18n
                            data-en="Enhance your business capabilities to innovate and compete in today’s dynamic market by harnessing the power of data."
                            data-id="Tingkatkan kapabilitas bisnis untuk berinovasi dan bersaing melalui pemanfaatan data secara tepat.">
                            Enhance your business capabilities to innovate and compete in today’s dynamic market by
                            harnessing the power of data.</p>
                    @endif
                    <div class="flex justify-center lg:justify-start">
                        @if($heroBanner && $heroBanner->button_text)
                            @if($heroBanner->button_text_id)
                                <a href="{{ $heroBanner->button_url ?: route(‘start-project’) }}"
                                    class="mt-8 inline-block px-8 py-3 bg-hex-dark rounded-xl font-bold text-base hover:shadow-2xl hover:-translate-y-1 transition-all shadow-xl"
                                    style="color:white;" data-i18n
                                    data-en="{{ $heroBanner->button_text }}"
                                    data-id="{{ $heroBanner->button_text_id }}">{{ $heroBanner->button_text }}</a>
                            @else
                                <a href="{{ $heroBanner->button_url ?: route(‘start-project’) }}"
                                    class="mt-8 inline-block px-8 py-3 bg-hex-dark rounded-xl font-bold text-base hover:shadow-2xl hover:-translate-y-1 transition-all shadow-xl"
                                    style="color:white;">{{ $heroBanner->button_text }}</a>
                            @endif
                        @else
                            <a href="{{ route(‘start-project’) }}"
                                class="mt-8 inline-block px-8 py-3 bg-hex-dark rounded-xl font-bold text-base hover:shadow-2xl hover:-translate-y-1 transition-all shadow-xl"
                                style="color:white;" data-i18n data-en="Consult Now" data-id="Konsultasi Sekarang">Consult
                                Now</a>
                        @endif
                    </div>
                </div>
                <img src="{{ $heroBanner ? asset('storage/' . $heroBanner->image_path) : '' }}" alt="Hero Image"
                    class="hidden lg:block absolute right-[-85px] top-0 h-[583px] object-contain lg:z-[1]" id="randomImage">
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
                @php
                    $homeLogos = [
                        ['src' => '/assets/img/clients/telkom.png', 'alt' => 'Telkom Indonesia'],
                        ['src' => '/assets/img/clients/sinarmas.png', 'alt' => 'Sinarmas'],
                        ['src' => '/assets/img/clients/unilever.png', 'alt' => 'Unilever'],
                        ['src' => '/assets/img/clients/PJB.png', 'alt' => 'PJB'],
                        ['src' => '/assets/img/clients/kominfo.png', 'alt' => 'Kominfo'],
                        ['src' => '/assets/img/clients/wika.png', 'alt' => 'WIKA'],
                        ['src' => '/assets/img/clients/its.png', 'alt' => 'ITS'],
                        ['src' => '/assets/img/clients/unair.png', 'alt' => 'Universitas Airlangga'],
                        ['src' => '/assets/img/clients/univ_indonesia.png', 'alt' => 'Universitas Indonesia'],
                        ['src' => '/assets/img/clients/banjarbaru.png', 'alt' => 'Kota Banjarbaru'],
                        ['src' => '/assets/img/clients/ubaya.png', 'alt' => 'Ubaya'],
                        ['src' => '/assets/img/clients/bank_bengkulu.png', 'alt' => 'Bank Bengkulu'],
                    ];
                @endphp
                <div class="grid grid-cols-4 gap-3 md:grid-cols-6 md:gap-8 mb-16 mx-auto max-w-[1200px] opacity-80">
                    @foreach($homeLogos as $logo)
                        <div class="w-full h-12 md:h-24 flex items-center justify-center px-1 md:px-3">
                            <img src="{{ $logo['src'] }}" alt="{{ $logo['alt'] }}" class="max-h-full max-w-full object-contain">
                        </div>
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
                    class="grid grid-cols-3 gap-2 md:gap-8 text-center pt-8 md:pt-16 border-t border-slate-100 divide-x divide-slate-100">
                    <div class="flex flex-col items-center py-2 md:py-4">
                        <div class="text-2xl md:text-5xl font-extrabold text-slate-900 mb-1 md:mb-2 stat-number"
                            data-target="77" data-suffix="+">0+</div>
                        <div class="text-[9px] md:text-sm font-bold text-slate-500 uppercase tracking-widest leading-tight"
                            data-i18n data-en="Happy Clients" data-id="Klien Puas">Happy Clients</div>
                    </div>
                    <div class="flex flex-col items-center py-2 md:py-4">
                        <div class="text-2xl md:text-5xl font-extrabold text-slate-900 mb-1 md:mb-2 stat-number"
                            data-target="116" data-suffix="+">0+</div>
                        <div class="text-[9px] md:text-sm font-bold text-slate-500 uppercase tracking-widest leading-tight"
                            data-i18n data-en="Projects Delivered" data-id="Proyek Diselesaikan">Projects Delivered</div>
                    </div>
                    <div class="flex flex-col items-center py-2 md:py-4">
                        <div class="text-2xl md:text-5xl font-extrabold text-slate-900 mb-1 md:mb-2 stat-number"
                            data-target="86" data-suffix="%">0%</div>
                        <div class="text-[9px] md:text-sm font-bold text-slate-500 uppercase tracking-widest leading-tight"
                            data-i18n data-en="Client Retention" data-id="Retensi Klien">Client Retention</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Products Section -->
        <section class="pt-12 pb-20 bg-slate-900 text-white overflow-hidden relative">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="mb-12">
                    <h2 class="products text-[42px] font-bold mb-4" data-i18n data-en="Product" data-id="Produk">Product
                    </h2>
                    <p class="text8 text-slate-400 text-lg max-w-2xl" data-i18n
                        data-en="A showcase of our recent high-impact digital products."
                        data-id="Tampilan produk digital unggulan terbaru kami.">A showcase of our recent high-impact
                        digital products.</p>
                </div>

                @php
                    $productColors = [
                        ['gradient' => 'from-blue-600/20', 'hover' => 'group-hover:text-blue-400', 'color' => '#0C5BED', 'bg' => 'rgba(12, 91, 237, 0.2)'],
                        ['gradient' => 'from-purple-600/20', 'hover' => 'group-hover:text-purple-400', 'color' => '#9333ea', 'bg' => 'rgba(147, 51, 234, 0.2)'],
                        ['gradient' => 'from-teal-600/20', 'hover' => 'group-hover:text-teal-400', 'color' => '#0d9488', 'bg' => 'rgba(13, 148, 136, 0.2)'],
                        ['gradient' => 'from-indigo-600/20', 'hover' => 'group-hover:text-indigo-400', 'color' => '#4f46e5', 'bg' => 'rgba(79, 70, 229, 0.2)'],
                    ];
                    $dpCardIdx = 0;
                    $productDesktopPages = $products->chunk(3);
                    $totalProductDesktopDots = $productDesktopPages->count();
                @endphp

                <!-- Desktop: 3-per-page carousel with dots + auto-slide -->
                <div class="hidden md:block">
                    <div class="overflow-hidden">
                        <div class="flex transition-transform duration-500 ease-in-out" id="desktop-product-track">
                            @foreach($productDesktopPages as $page)
                                <div class="w-full flex-shrink-0 grid grid-cols-3 gap-6">
                                    @foreach($page as $product)
                                        @php $c = $productColors[$dpCardIdx % count($productColors)];
                                        $dpCardIdx++; @endphp
                                                        <a href="{{ route('products.show', $product) }}"
                                                            class="rounded-3xl border border-white/10 overflow-hidden relative group flex flex-col cursor-pointer min-h-[480px]"
                                                            style="background: rgba(18, 27, 38, 0.5); backdrop-filter: blur(12px);">
                                                            <div
                                                                class="absolute inset-0 bg-gradient-to-br {{ $c['gradient'] }} to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none">
                                                            </div>
                                                            @if($product->image_cover)
                                                                <div class="w-full h-48 border-b border-white/10 overflow-hidden bg-white/5">
                                                                    <img src="{{ asset('storage/' . $product->image_cover) }}"
                                                                        class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-500"
                                                                        alt="{{ $product->name }}">
                                                                </div>
                                                            @else
                                                                <div
                                                                    class="w-full h-48 border-b border-white/10 flex items-center justify-center bg-white/5">
                                                                    <span translate="no" class="material-symbols-outlined text-5xl text-white/20">inventory_2</span>
                                                                </div>
                                                            @endif
                                                            <div class="p-8 relative z-10 flex-grow flex flex-col items-start">
                                                                @if($product->category)
                                                                    <span
                                                                        class="block max-w-full px-4 py-1.5 rounded-full text-[10px] font-bold uppercase tracking-widest mb-4 truncate"
                                                                        style="color: {{ $c['color'] }}; background: {{ $c['bg'] }};">{{ $product->category->name }}</span>
                                                                @elseif($product->tagline)
                                                                    <span
                                                                        class="block max-w-full px-4 py-1.5 rounded-full text-[10px] font-bold uppercase tracking-widest mb-4 truncate"
                                                                        style="color: {{ $c['color'] }}; background: {{ $c['bg'] }};">{{ $product->tagline }}</span>
                                                                @endif
                                                                <h3 class="text-2xl font-bold text-white mb-4">{{ $product->name }}</h3>
                                                                <p class="text-slate-400 mb-8 flex-grow">
                                                                    {{ Str::limit(strip_tags($product->description ?? ''), 140) }}</p>
                                                                <span
                                                                    class="w-fit inline-flex items-center text-white font-bold {{ $c['hover'] }} transition-colors gap-2 mt-auto group/btn">
                                                                    <span data-i18n data-en="Learn more" data-id="Selengkapnya">Learn more</span>
                                                                    <span translate="no"
                                                                        class="material-symbols-outlined transform group-hover/btn:translate-x-1 transition-transform">arrow_right_alt</span>
                                                                </span>
                                                            </div>
                                                        </a>
                                    @endforeach
                                            </div>
                            @endforeach
                                </div>
                            </div>
                            @if($totalProductDesktopDots > 1)
                                <div class="flex justify-center gap-2 mt-6" id="desktop-product-dots">
                                    @for($i = 0; $i < $totalProductDesktopDots; $i++)
                                        <button
                                            class="dp-dot h-2 rounded-full transition-all duration-300 {{ $i === 0 ? 'bg-white w-6' : 'bg-white/40 w-2' }}"
                                            data-index="{{ $i }}"></button>
                                    @endfor
                                </div>
                            @endif
                            <div class="flex justify-end pr-1 mt-4">
                                <a href="{{ route('products.index') }}"
                                    class="group inline-flex items-center gap-1 text-white/70 text-sm font-semibold hover:text-white transition-colors">
                                    <span data-i18n data-en="View All Products" data-id="Lihat Semua Produk">View All
                                        Products</span>
                                    <span translate="no"
                                        class="material-symbols-outlined text-sm group-hover:translate-x-1 transition-transform duration-200">arrow_right_alt</span>
                                </a>
                            </div>
                        </div>

                        <!-- Mobile: single-card carousel -->
                        <div class="md:hidden">
                            <div class="relative w-full overflow-hidden">
                                <div class="flex gap-6 transition-transform duration-500 ease-in-out" id="product-slider">
                                    @foreach($products->take(3) as $product)
                                        @php $c = $productColors[$loop->index % count($productColors)]; @endphp
                                        <a href="{{ route('products.show', $product) }}"
                                            class="min-w-[85vw] min-h-[480px] rounded-3xl border border-white/10 overflow-hidden relative group flex flex-col cursor-pointer"
                                            style="background: rgba(18, 27, 38, 0.5); backdrop-filter: blur(12px);">
                                            <div
                                                class="absolute inset-0 bg-gradient-to-br {{ $c['gradient'] }} to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none">
                                            </div>
                                            @if($product->image_cover)
                                                <img src="{{ asset('storage/' . $product->image_cover) }}"
                                                    class="w-full h-48 object-cover border-b border-white/10" alt="{{ $product->name }}">
                                            @else
                                                <div
                                                    class="w-full h-48 border-b border-white/10 flex items-center justify-center bg-white/5">
                                                    <span translate="no" class="material-symbols-outlined text-5xl text-white/20">inventory_2</span>
                                                </div>
                                            @endif
                                            <div class="p-8 relative z-10 flex-grow flex flex-col items-start">
                                                @if($product->category)
                                                    <span
                                                        class="block max-w-full px-4 py-1.5 rounded-full text-[10px] font-bold uppercase tracking-widest mb-4 truncate"
                                                        style="color: {{ $c['color'] }}; background: {{ $c['bg'] }};">{{ $product->category->name }}</span>
                                                @elseif($product->tagline)
                                                    <span
                                                        class="block max-w-full px-4 py-1.5 rounded-full text-[10px] font-bold uppercase tracking-widest mb-4 truncate"
                                                        style="color: {{ $c['color'] }}; background: {{ $c['bg'] }};">{{ $product->tagline }}</span>
                                                @endif
                                                <h3 class="text-2xl font-bold text-white mb-4">{{ $product->name }}</h3>
                                                <p class="text-slate-400 mb-8 flex-grow">
                                                    {{ Str::limit(strip_tags($product->description ?? ''), 140) }}</p>
                                                <span
                                                    class="w-fit inline-flex items-center text-white font-bold {{ $c['hover'] }} transition-colors gap-2 mt-auto group/btn">
                                                    <span data-i18n data-en="Learn more" data-id="Selengkapnya">Learn more</span>
                                                    <span translate="no"
                                                        class="material-symbols-outlined transform group-hover/btn:translate-x-1 transition-transform">arrow_right_alt</span>
                                                </span>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                            <div class="mt-6">
                                <div class="flex justify-center gap-2 mb-4" id="product-dots">
                                    @foreach($products->take(3) as $product)
                                        <button
                                            class="product-dot h-2 rounded-full transition-all duration-300 {{ $loop->first ? 'bg-white w-6' : 'bg-white/40 w-2' }}"
                                            data-index="{{ $loop->index }}"></button>
                                    @endforeach
                                </div>
                                <div class="flex justify-end pr-1">
                                    <a href="{{ route('products.index') }}"
                                        class="group inline-flex items-center gap-1 text-white/70 text-sm font-semibold hover:text-white transition-colors">
                                        <span data-i18n data-en="View All Products" data-id="Lihat Semua Produk">View All
                                            Products</span>
                                        <span translate="no"
                                            class="material-symbols-outlined text-sm group-hover:translate-x-1 transition-transform duration-200">arrow_right_alt</span>
                                    </a>
                                </div>
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
                                <p class="text-slate-500 text-base md:text-xl leading-relaxed" data-i18n="html"
                                    data-en="Together with our clients, we build the future.<br />Developing software solutions that tackle your industry's biggest challenges."
                                    data-id="Bersama klien kami, membangun masa depan.<br />Mengembangkan solusi perangkat lunak untuk tantangan terbesar industri Anda.">
                                    Together with our clients, we build the future.<br />
                                    Developing software solutions that tackle your industry's biggest challenges.
                                </p>
                            </div>
                            <div class="pb-2 hidden md:block">
                                <a href="{{ route('services.index') }}"
                                    class="text-blue-600 font-bold flex items-center gap-2 hover:text-blue-700 transition-colors group">
                                    <span data-i18n data-en="View All Services" data-id="Lihat Semua Layanan">View All
                                        Services</span>
                                    <span translate="no"
                                        class="material-symbols-outlined transform group-hover:translate-x-1 transition-transform">arrow_right_alt</span>
                                </a>
                            </div>
                        </div>

                        <!-- Services Grid -->
                        <div class="max-w-5xl mx-auto grid grid-cols-3 gap-2 md:gap-8" id="services-grid">
                            <!-- Service 1 -->
                            <a href="{{ route('services.software-development') }}"
                                class="group block bg-white border-2 border-slate-100 rounded-xl md:rounded-[40px] p-3 md:p-10 h-[160px] md:h-[500px] relative overflow-hidden transition-all duration-500 shadow-sm hover:shadow-xl hover:-translate-y-2 hover:bg-[#0F172A]">
                                <div class="relative z-10">
                                    <h3 class="text-[13px] md:text-3xl font-bold text-[#121B26] leading-tight group-hover:text-white transition-colors"
                                        data-i18n="html" data-en="Software<br />Development"
                                        data-id="Pengembangan<br />Perangkat Lunak">Software<br />Development</h3>
                                    <p class="mt-8 text-white/90 text-base leading-relaxed opacity-0 group-hover:opacity-100 transition-opacity duration-500 hidden md:block"
                                        data-i18n
                                        data-en="Elevate your digital presence with our software development services. We specialize in crafting bespoke solutions to your business needs, ensuring seamless functionality and user-centric experiences. Our expert team employs the latest technologies to deliver scalable, high-performance software that propels your business forward."
                                        data-id="Tingkatkan kehadiran digital Anda dengan layanan pengembangan perangkat lunak kami.">
                                        Elevate your digital presence with our software development services. We specialize in
                                        crafting bespoke solutions to your business needs, ensuring seamless functionality and
                                        user-centric experiences. Our expert team employs the latest technologies to deliver
                                        scalable, high-performance software that propels your business forward.
                                    </p>
                                </div>
                                <div
                                    class="absolute bottom-2 right-2 md:bottom-0 md:right-0 md:transform md:translate-x-4 md:translate-y-4 group-hover:opacity-0 transition-opacity duration-300">
                                    <img src="{{ asset('assets/img/icon-gear-chrome.png') }}"
                                        class="w-16 h-16 md:w-64 md:h-64 object-contain opacity-90" alt="Software Development">
                                </div>
                            </a>

                            <!-- Service 2 -->
                            <a href="{{ route('services.startup-incubator') }}"
                                class="group block bg-white border-2 border-slate-100 rounded-xl md:rounded-[40px] p-3 md:p-10 h-[160px] md:h-[500px] relative overflow-hidden transition-all duration-500 shadow-sm hover:shadow-xl hover:-translate-y-2 hover:bg-[#0F172A]">
                                <div class="relative z-10">
                                    <h3 class="text-[13px] md:text-3xl font-bold text-[#121B26] leading-tight group-hover:text-white transition-colors"
                                        data-i18n="html" data-en="Startup &amp;<br />Incubator"
                                        data-id="Startup &amp;<br />Inkubator">Startup &<br />Incubator</h3>
                                    <p class="mt-8 text-white/90 text-base leading-relaxed opacity-0 group-hover:opacity-100 transition-opacity duration-500 hidden md:block"
                                        data-i18n
                                        data-en="Navigate the complexities of startup success with our expert consultancy services. From ideation to execution, we offer strategic guidance to optimize your business model."
                                        data-id="Navigasi kompleksitas keberhasilan startup dengan layanan konsultasi ahli kami.">
                                        Navigate the complexities of startup success with our expert consultancy services. From
                                        ideation to execution, we offer strategic guidance to optimize your business model.
                                    </p>
                                </div>
                                <div
                                    class="absolute bottom-2 right-2 md:bottom-0 md:right-0 md:transform md:translate-x-4 md:translate-y-4 group-hover:opacity-0 transition-opacity duration-300">
                                    <img src="{{ asset('assets/img/icon-rocket-launch.png') }}"
                                        class="w-16 h-16 md:w-64 md:h-64 object-contain opacity-90" alt="Startup & Incubator">
                                </div>
                            </a>

                            <!-- Service 3 -->
                            <a href="{{ route('services.managedService') }}"
                                class="group block bg-white border-2 border-slate-100 rounded-xl md:rounded-[40px] p-3 md:p-10 h-[160px] md:h-[500px] relative overflow-hidden transition-all duration-500 shadow-sm hover:shadow-xl hover:-translate-y-2 hover:bg-[#0F172A]">
                                <div class="relative z-10">
                                    <h3 class="text-[13px] md:text-3xl font-bold text-[#121B26] leading-tight group-hover:text-white transition-colors"
                                        data-i18n="html" data-en="Managed<br />Services" data-id="Layanan<br />Terkelola">
                                        Managed<br />Services</h3>
                                    <p class="mt-8 text-white/90 text-base leading-relaxed opacity-0 group-hover:opacity-100 transition-opacity duration-500 hidden md:block"
                                        data-i18n
                                        data-en="Optimize your IT infrastructure with our comprehensive managed services. We provide comprehensive solutions, including proactive system monitoring, and strategic IT planning."
                                        data-id="Optimalkan infrastruktur TI Anda dengan layanan terkelola kami yang komprehensif.">
                                        Optimize your IT infrastructure with our comprehensive managed services. We provide
                                        comprehensive solutions, including proactive system monitoring, and strategic IT planning.
                                    </p>
                                </div>
                                <div
                                    class="absolute bottom-2 right-2 md:bottom-0 md:right-0 md:transform md:translate-x-4 md:translate-y-4 group-hover:opacity-0 transition-opacity duration-300">
                                    <img src="{{ asset('assets/img/icon-download-preview.png') }}"
                                        class="w-16 h-16 md:w-64 md:h-64 object-contain opacity-90" alt="Managed Services">
                                </div>
                            </a>
                        </div>

                        <!-- Lihat Semua Layanan - mobile only, di bawah cards -->
                        <div class="md:hidden mt-5 flex justify-end pr-1">
                            <a href="{{ route('services.index') }}"
                                class="text-blue-600 font-bold flex items-center gap-2 hover:text-blue-700 transition-colors group">
                                <span data-i18n data-en="View All Services" data-id="Lihat Semua Layanan">View All Services</span>
                                <span translate="no" class="material-symbols-outlined transform group-hover:translate-x-1 transition-transform">arrow_right_alt</span>
                            </a>
                        </div>
                    </div>
                </section>

                <!-- Projects Filters Section -->
                <section class="py-20 bg-slate-50 border-t border-slate-100">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="text-center mb-12">
                            <h2 class="our-projects text-[42px] font-bold text-slate-900 mb-4" data-i18n data-en="Our Projects"
                                data-id="Proyek Kami">Our Projects</h2>
                            <p class="we-deliver-our-best-performance-in-every-project-to-ensure-our-customers-are-satisfied-with-the-product text-slate-500 max-w-2xl mx-auto"
                                data-i18n
                                data-en="We deliver our best performance in every project to ensure our customers are satisfied with the product."
                                data-id="Kami memberikan performa terbaik di setiap proyek untuk memastikan kepuasan pelanggan.">
                                We deliver our best performance in every project to ensure our customers are satisfied with the
                                product.</p>
                        </div>

                        <!-- Filter Bar -->
                        <div class="flex justify-center mb-8 md:mb-12">
                            <div
                                class="flex flex-wrap justify-center gap-2 md:inline-flex md:bg-slate-100 md:p-1.5 md:rounded-full md:gap-1 md:shadow-inner">
                                <button
                                    class="btn-filter active-filter px-4 py-1.5 md:px-6 md:py-2.5 rounded-full font-medium transition-all text-xs md:text-sm bg-slate-900 text-white"
                                    data-filter="all" data-i18n data-en="All" data-id="Semua">All</button>
                                <button
                                    class="btn-filter px-4 py-1.5 md:px-6 md:py-2.5 rounded-full text-slate-500 font-medium hover:text-[#0F172A] transition-all text-xs md:text-sm bg-white md:bg-transparent border border-slate-300 md:border-0"
                                    data-filter="software-development" data-i18n data-en="Software Development"
                                    data-id="Pengembangan Perangkat Lunak">Software Development</button>
                                <button
                                    class="btn-filter px-4 py-1.5 md:px-6 md:py-2.5 rounded-full text-slate-500 font-medium hover:text-[#0F172A] transition-all text-xs md:text-sm bg-white md:bg-transparent border border-slate-300 md:border-0"
                                    data-filter="digital-branding" data-i18n data-en="Digital Branding"
                                    data-id="Branding Digital">Digital Branding</button>
                                <button
                                    class="btn-filter px-4 py-1.5 md:px-6 md:py-2.5 rounded-full text-slate-500 font-medium hover:text-[#0F172A] transition-all text-xs md:text-sm bg-white md:bg-transparent border border-slate-300 md:border-0"
                                    data-filter="startup-incubator" data-i18n data-en="Startup Incubator"
                                    data-id="Inkubator Startup">Startup Incubator</button>
                                <button
                                    class="btn-filter px-4 py-1.5 md:px-6 md:py-2.5 rounded-full text-slate-500 font-medium hover:text-[#0F172A] transition-all text-xs md:text-sm bg-white md:bg-transparent border border-slate-300 md:border-0"
                                    data-filter="it-consultant" data-i18n data-en="IT Consultant" data-id="Konsultan TI">IT
                                    Consultant</button>
                            </div>
                        </div>

                        @php
                            $homeCatMap = [
                                'software-development' => ['badge' => 'bg-blue-50 text-blue-600', 'en' => 'Software Development', 'id' => 'Pengembangan Perangkat Lunak'],
                                'digital-branding' => ['badge' => 'bg-orange-50 text-orange-600', 'en' => 'Digital Branding', 'id' => 'Branding Digital'],
                                'startup-incubator' => ['badge' => 'bg-purple-50 text-purple-600', 'en' => 'Startup Incubator', 'id' => 'Inkubator Startup'],
                                'it-consultant' => ['badge' => 'bg-green-50 text-green-600', 'en' => 'IT Consultant', 'id' => 'Konsultan TI'],
                            ];
                        @endphp
                        <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-3 md:gap-8">
                            @foreach($projects->take(6) as $homeProject)
                                @php
                                    $homeCat = $homeCatMap[$homeProject->category] ?? ['badge' => 'bg-slate-50 text-slate-600', 'en' => 'Project', 'id' => 'Proyek'];
                                    $homeImgUrl = $homeProject->image ? image_url($homeProject->image) : null;
                                    $homeDesc = $homeProject->hero_description ?: Str::limit(strip_tags($homeProject->description ?? ''), 160);
                                    $homeDescId = $homeProject->hero_description_id ?: Str::limit(strip_tags($homeProject->description_id ?? ''), 160);
                                @endphp
                                <a href="{{ route('works.show', $homeProject) }}"
                                    class="project-card group block bg-white rounded-lg md:rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all"
                                    data-filter="all {{ $homeProject->category }}">
                                    <div
                                        class="h-32 md:h-56 overflow-hidden relative {{ !$homeImgUrl ? 'flex items-center justify-center bg-blue-100' : 'bg-slate-50' }}">
                                        @if($homeImgUrl)
                                            <img src="{{ $homeImgUrl }}"
                                                class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-500"
                                                alt="{{ $homeProject->name }}">
                                        @else
                                            <span translate="no" class="material-symbols-outlined text-4xl md:text-6xl text-blue-400">rocket_launch</span>
                                        @endif
                                    </div>
                                    <div class="p-3 md:p-8">
                                        <div class="mb-2 md:mb-4">
                                            <span
                                                class="inline-block px-2 py-0.5 md:px-4 md:py-1.5 rounded-full {{ $homeCat['badge'] }} text-[8px] md:text-[10px] font-bold tracking-widest uppercase"
                                                data-i18n data-en="{{ $homeCat['en'] }}"
                                                data-id="{{ $homeCat['id'] }}">{{ $homeCat['en'] }}</span>
                                        </div>
                                        <h3 class="text-sm md:text-xl font-bold text-slate-900 mb-1 md:mb-4 line-clamp-2">
                                            {{ $homeProject->name }}
                                        </h3>
                                        @if($homeDescId)
                                        <p class="project-card-desc text-slate-600 text-[11px] md:text-sm line-clamp-2 md:line-clamp-3"
                                            data-i18n data-en="{{ $homeDesc }}" data-id="{{ $homeDescId }}">{{ $homeDesc }}</p>
                                        @else
                                        <p class="project-card-desc text-slate-600 text-[11px] md:text-sm line-clamp-2 md:line-clamp-3">{{ $homeDesc }}</p>
                                        @endif
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
                            <span class="font-bold uppercase tracking-[0.2em] text-[10px] md:text-sm mb-4 block"
                                style="color: #94a3b8;" data-i18n data-en="OUR VALUE" data-id="NILAI KAMI">OUR VALUE</span>
                            <h2 class="text-[42px] font-bold mb-6 text-white tracking-tight" data-i18n data-en="Why Choose Hexavara"
                                data-id="Mengapa Memilih Hexavara">Why Choose Hexavara</h2>
                            <p class="max-w-2xl mx-auto text-sm md:text-base leading-relaxed" style="color: #94a3b8;" data-i18n
                                data-en="Excellence in Project Execution, Strategic Oversight, Trusted Technology Partner."
                                data-id="Keunggulan dalam Eksekusi Proyek, Pengawasan Strategis, Mitra Teknologi Terpercaya.">
                                Excellence in Project Execution, Strategic Oversight, Trusted Technology Partner.
                            </p>
                        </div>

                        <div class="grid grid-cols-2 md:grid-cols-2 gap-3 md:gap-8 max-w-5xl mx-auto">
                            <!-- Value 1 -->
                            <div class="p-4 md:p-6 rounded-2xl md:rounded-[32px] border border-white/[0.03] transition-all duration-300 h-full"
                                style="background-color: #0a1221;">
                                <div
                                    class="w-9 h-9 md:w-10 md:h-10 bg-[#1d2636] rounded-xl md:rounded-2xl flex items-center justify-center mb-4 md:mb-6 text-blue-500">
                                    <span translate="no" class="material-symbols-outlined text-lg md:text-xl">list_alt</span>
                                </div>
                                <h3 class="text-base md:text-xl font-bold text-white mb-3 md:mb-4 leading-snug" data-i18n
                                    data-en="Roadmap for Timeline" data-id="Peta Jalan & Timeline">Roadmap for Timeline</h3>
                                <p class="text-xs md:text-base leading-[1.6] md:leading-relaxed text-justify"
                                    style="color: #94a3b8;" data-i18n
                                    data-en="Our roadmap contains a detailed list of tasks and project timelines that you can monitor at any time. Each roadmap is created based on mutual agreement."
                                    data-id="Peta jalan kami berisi daftar tugas dan jadwal proyek terperinci yang dapat Anda pantau kapan saja. Setiap peta jalan dibuat berdasarkan kesepakatan bersama.">
                                    Our roadmap contains a detailed list of tasks and project timelines that you can monitor at any
                                    time. Each roadmap is created based on mutual agreement.
                                </p>
                            </div>

                            <!-- Value 2 -->
                            <div class="p-4 md:p-6 rounded-2xl md:rounded-[32px] border border-white/[0.03] transition-all duration-300 h-full"
                                style="background-color: #0a1221;">
                                <div
                                    class="w-9 h-9 md:w-10 md:h-10 bg-[#1d2636] rounded-xl md:rounded-2xl flex items-center justify-center mb-4 md:mb-6 text-blue-500">
                                    <span translate="no" class="material-symbols-outlined text-lg md:text-xl">speed</span>
                                </div>
                                <h3 class="text-base md:text-xl font-bold text-white mb-3 md:mb-4 leading-tight" data-i18n
                                    data-en="Weekly Sprint Monitoring" data-id="Pemantauan Sprint Mingguan">Weekly Sprint Monitoring
                                </h3>
                                <p class="text-xs md:text-base leading-[1.6] md:leading-relaxed text-justify"
                                    style="color: #94a3b8;" data-i18n
                                    data-en="This feature helps control sprints, ensuring our programmers work according to the time you've purchased. It also guarantees that your project is success."
                                    data-id="Fitur ini membantu mengendalikan sprint, memastikan programmer kami bekerja sesuai waktu yang Anda beli. Fitur ini juga menjamin keberhasilan proyek Anda.">
                                    This feature helps control sprints, ensuring our programmers work according to the time you've
                                    purchased. It also guarantees success.
                                </p>
                            </div>

                            <!-- Value 3 -->
                            <div class="p-4 md:p-6 rounded-2xl md:rounded-[32px] border border-white/[0.03] transition-all duration-300 h-full"
                                style="background-color: #0a1221;">
                                <div
                                    class="w-9 h-9 md:w-10 md:h-10 bg-[#1d2636] rounded-xl md:rounded-2xl flex items-center justify-center mb-4 md:mb-6 text-blue-500">
                                    <span translate="no" class="material-symbols-outlined text-lg md:text-xl">verified_user</span>
                                </div>
                                <h3 class="text-base md:text-xl font-bold text-white mb-3 md:mb-4 leading-tight" data-i18n
                                    data-en="Maximum Service" data-id="Layanan Maksimal">Maximum Service</h3>
                                <p class="text-xs md:text-base leading-[1.6] md:leading-relaxed text-justify"
                                    style="color: #94a3b8;" data-i18n
                                    data-en="We guarantee maximum service with bug fixes and improvements handled within 48 hours. This feature allows you to easily track your requests."
                                    data-id="Kami menjamin layanan maksimal dengan perbaikan bug dan peningkatan ditangani dalam 48 jam. Fitur ini memungkinkan Anda melacak permintaan dengan mudah.">
                                    We guarantee maximum service with bug fixes and improvements handled within 48 hours. Track
                                    requests easily.
                                </p>
                            </div>

                            <!-- Value 4 -->
                            <div class="p-4 md:p-6 rounded-2xl md:rounded-[32px] border border-white/[0.03] transition-all duration-300 h-full"
                                style="background-color: #0a1221;">
                                <div
                                    class="w-9 h-9 md:w-10 md:h-10 bg-[#1d2636] rounded-xl md:rounded-2xl flex items-center justify-center mb-4 md:mb-6 text-blue-500">
                                    <span translate="no" class="material-symbols-outlined text-lg md:text-xl">trending_up</span>
                                </div>
                                <h3 class="text-base md:text-xl font-bold text-white mb-3 md:mb-4 leading-tight" data-i18n
                                    data-en="Monitor Team Performance" data-id="Pantau Performa Tim">Monitor Team Performance</h3>
                                <p class="text-xs md:text-base leading-[1.6] md:leading-relaxed text-justify"
                                    style="color: #94a3b8;" data-i18n
                                    data-en="Each of our talents has daily and monthly targets aligned with the time you've purchased. They compete to deliver their best performance."
                                    data-id="Setiap talenta kami memiliki target harian dan bulanan yang selaras dengan waktu yang Anda beli. Mereka bersaing untuk memberikan performa terbaik.">
                                    Each talent has daily and monthly targets. They compete to deliver best performance.
                                </p>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Clients Section -->
                @if($testimonials->isNotEmpty())
                    <section class="py-16 md:py-24 bg-slate-50">
                        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                            <div class="text-center mb-12 md:mb-16">
                                <h2 class="text9 text-[42px] font-bold text-slate-900 mb-4" data-i18n data-en="Hear From Our Clients"
                                    data-id="Kata Klien Kami">Hear From Our Clients</h2>
                                <p class="trust-from-industry-leaders-across-the-globe text-slate-500" data-i18n
                                    data-en="Trust from industry leaders across the globe."
                                    data-id="Dipercaya oleh pemimpin industri di seluruh dunia.">Trust from industry leaders
                                    across the globe.</p>
                            </div>

                            <!-- Desktop Carousel (3 per page) -->
                            @php
                                $avatarColors = ['bg-blue-500', 'bg-purple-500', 'bg-emerald-500', 'bg-orange-500', 'bg-pink-500', 'bg-teal-500'];
                                $desktopPages = $testimonials->chunk(3);
                                $totalDesktopPages = $desktopPages->count();
                                $globalTestimonialIdx = 0;
                            @endphp
                            <div class="hidden md:block">
                                <div class="overflow-hidden">
                                    <div class="flex transition-transform duration-500 ease-in-out" id="desktop-testimonial-track">
                                        @foreach($desktopPages as $page)
                                            <div class="w-full flex-shrink-0 grid grid-cols-3 gap-8">
                                                @foreach($page as $testimonial)
                                                    @php $color = $avatarColors[$globalTestimonialIdx % count($avatarColors)];
                                                    $globalTestimonialIdx++; @endphp
                                                    <div
                                                        class="bg-white p-8 rounded-3xl relative shadow-xl shadow-slate-200/50 border border-slate-100">
                                                        <div class="flex gap-1 text-yellow-400 mb-6">
                                                            @for($s = 0; $s < ($testimonial->rating ?: 5); $s++)
                                                                <span translate="no" class="material-symbols-outlined star-icon text-lg"
                                                                    style="font-variation-settings: 'FILL' 1;">star</span>
                                                            @endfor
                                                        </div>
                                                        <p class="text-slate-700 font-medium italic mb-8 text-base">"<span @if($testimonial->quote_id) data-i18n data-en="{{ $testimonial->quote }}" data-id="{{ $testimonial->quote_id }}" @endif>{{ $testimonial->quote }}</span>"
                                                        </p>
                                                        <div class="flex items-center gap-4">
                                                            <div
                                                                class="w-12 h-12 {{ $color }} rounded-full flex justify-center items-center text-white flex-shrink-0">
                                                                <span translate="no" class="material-symbols-outlined text-xl">person</span>
                                                            </div>
                                                            <div>
                                                                <p class="font-bold text-slate-900 text-base">{{ $testimonial->name }}</p>
                                                                <p class="text-sm text-slate-500" @if($testimonial->role_id) data-i18n data-en="{{ $testimonial->role }}" data-id="{{ $testimonial->role_id }}" @endif>{{ $testimonial->role }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                @if($totalDesktopPages > 1)
                                    <div class="flex justify-center gap-2 mt-8" id="desktop-testimonial-dots">
                                        @for($i = 0; $i < $totalDesktopPages; $i++)
                                            <button
                                                class="desktop-t-dot h-2 rounded-full transition-all duration-300 {{ $i === 0 ? 'bg-hex-dark w-6' : 'bg-slate-300 w-2' }}"
                                                data-index="{{ $i }}"></button>
                                        @endfor
                                    </div>
                                @endif
                            </div>

                            <!-- Mobile Carousel -->
                            <div class="md:hidden">
                                <div class="relative overflow-hidden">
                                    <div class="flex transition-transform duration-500" id="testimonial-slider">
                                        @php $avatarColors = ['bg-blue-500', 'bg-purple-500', 'bg-emerald-500', 'bg-orange-500', 'bg-pink-500', 'bg-teal-500']; @endphp
                                        @foreach($testimonials as $testimonial)
                                            <div class="w-full flex-shrink-0 px-2">
                                                <div
                                                    class="bg-white p-6 rounded-2xl relative shadow-md shadow-slate-200/50 border border-slate-100">
                                                    <div class="flex gap-0.5 text-yellow-400 mb-4" style="justify-content: flex-start;">
                                                        @for($s = 0; $s < ($testimonial->rating ?: 5); $s++)
                                                            <span translate="no" class="material-symbols-outlined star-icon text-xl font-bold"
                                                                style="font-variation-settings: 'FILL' 1;">star</span>
                                                        @endfor
                                                    </div>
                                                    <p class="text-slate-700 font-medium italic mb-6 text-sm line-clamp-3">"<span @if($testimonial->quote_id) data-i18n data-en="{{ $testimonial->quote }}" data-id="{{ $testimonial->quote_id }}" @endif>{{ $testimonial->quote }}</span>"</p>
                                                    <div class="flex items-center gap-3">
                                                        <div
                                                            class="w-10 h-10 {{ $avatarColors[$loop->index % count($avatarColors)] }} rounded-full flex justify-center items-center text-white flex-shrink-0">
                                                            <span translate="no" class="material-symbols-outlined text-base">person</span>
                                                        </div>
                                                        <div>
                                                            <p class="font-bold text-slate-900 text-sm">{{ $testimonial->name }}</p>
                                                            <p class="text-xs text-slate-500" @if($testimonial->role_id) data-i18n data-en="{{ $testimonial->role }}" data-id="{{ $testimonial->role_id }}" @endif>{{ $testimonial->role }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <!-- Pagination Dots -->
                                <div class="flex justify-center gap-2 mt-8">
                                    @for($i = 0; $i < count($testimonials); $i++)
                                        <button
                                            class="testimonial-dot w-2.5 h-2.5 rounded-full bg-slate-300 transition-all {{ $i === 0 ? 'bg-blue-600 w-8' : '' }}"
                                            data-index="{{ $i }}"></button>
                                    @endfor
                                </div>
                            </div>
                        </div>
                    </section>
                @endif

                <!-- CTA Section -->
                <section class="py-8 md:pt-0 md:pb-0 bg-white overflow-hidden">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-20 lg:px-32">

                        <!-- Mobile Card Layout -->
                        <div class="block md:hidden bg-slate-100 rounded-3xl overflow-hidden">
                            <div class="flex items-end">
                                <div class="flex-shrink-0 w-[50%]">
                                    <img src="{{ asset('assets/img/talent.png') }}" alt="IT Consultant"
                                        class="w-full object-contain">
                                </div>
                                <div class="flex-1 px-5 py-6 flex flex-col justify-center">
                                    <h2 class="text-base font-bold text-[#121B26] mb-3 leading-snug" data-i18n="html"
                                        data-en="Get the Right IT Solutions from the <span class='text-blue-600'>Best IT Vendor</span>. Consult with Us Today!"
                                        data-id="Dapatkan Solusi IT yang Tepat dari <span class='text-blue-600'>Vendor IT Terbaik</span> — Konsultasi Sekarang!">
                                        Get the Right IT Solutions from the <span class="text-blue-600">Best IT Vendor</span>.
                                        Consult with Us Today!
                                    </h2>
                                    <p class="text-slate-500 text-sm mb-4 leading-relaxed" data-i18n
                                        data-en="Discuss your IT challenges, and our team of experienced experts will provide tailored solutions to drive your business growth and success."
                                        data-id="Diskusikan tantangan IT Anda, dan tim ahli berpengalaman kami akan memberikan solusi yang disesuaikan untuk mendorong pertumbuhan bisnis Anda.">
                                        Discuss your IT challenges, and our team of experienced experts will provide tailored
                                        solutions to drive your business growth and success.
                                    </p>
                                    <a href="{{ route('start-project') }}"
                                        class="inline-flex items-center justify-center px-6 py-3 rounded-xl bg-hex-dark text-white font-bold text-sm shadow-md hover:shadow-xl transition-all"
                                        data-i18n data-en="Consult Now" data-id="Konsultasi Sekarang">
                                        Consult Now
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Desktop Layout -->
                        <div class="hidden md:grid grid-cols-[auto_1fr] gap-16 items-end -ml-12">
                            <div class="relative flex justify-start items-end">
                                <img src="{{ asset('assets/img/talent.png') }}" alt="IT Consultant Talent"
                                    class="block w-auto h-auto object-contain max-h-[500px] align-bottom">
                            </div>
                            <div class="self-end max-w-2xl">
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

                $filterBtns.removeClass('active-filter bg-slate-900 text-white').addClass('text-slate-500');
                $(this).addClass('active-filter bg-slate-900 text-white').removeClass('text-slate-500');

                $projectCards.each(function () {
                    var cardFilters = (String($(this).data('filter')) || '').split(' ');
                    $(this).css('display', $.inArray(filter, cardFilters) !== -1 ? 'block' : 'none');
                });
            });

            if ($slider.length) {
                var totalCards = $slider.children().length;

                function updateSlider() {
                    var $firstCard = $slider.children().first();
                    if (!$firstCard.length) { return; }
                    var cardWidth = $firstCard.outerWidth() + 24;
                    $slider.css('transform', 'translateX(-' + (currentIdx * cardWidth) + 'px)');
                    // Update dots
                    var $dots = $('.product-dot');
                    $dots.removeClass('bg-white w-6').addClass('bg-white/40 w-2');
                    $dots.eq(currentIdx).addClass('bg-white w-6').removeClass('bg-white/40 w-2');
                }

                // Desktop arrow controls
                $nextBtn.on('click', function (e) {
                    e.preventDefault();
                    var visibleCards = $(window).width() >= 768 ? 2 : 1;
                    if (currentIdx < totalCards - visibleCards) { currentIdx++; updateSlider(); }
                });
                $prevBtn.on('click', function (e) {
                    e.preventDefault();
                    if (currentIdx > 0) { currentIdx--; updateSlider(); }
                });

                // Mobile dot click
                $('.product-dot').on('click', function () {
                    currentIdx = parseInt($(this).data('index'));
                    updateSlider();
                });

                // Mobile auto-slide
                if ($(window).width() < 768) {
                    setInterval(function () {
                        currentIdx = (currentIdx + 1) % totalCards;
                        updateSlider();
                    }, 4000);
                }

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

            // Mobile Testimonial Carousel
            (function () {
                var $slider = $('#testimonial-slider');
                var $dots = $('.testimonial-dot');
                var currentIdx = 0;
                var totalSlides = $dots.length;

                if (totalSlides > 0) {
                    function updateSlider() {
                        $slider.css('transform', 'translateX(-' + (currentIdx * 100) + '%)');
                        $dots.removeClass('bg-blue-600 w-8').addClass('bg-slate-300');
                        $dots.eq(currentIdx).addClass('bg-blue-600 w-8').removeClass('bg-slate-300');
                    }

                    $dots.on('click', function () {
                        currentIdx = $(this).data('index');
                        updateSlider();
                    });

                    setInterval(function () {
                        currentIdx = (currentIdx + 1) % totalSlides;
                        updateSlider();
                    }, 5000);
                }
            })();

            // Desktop Product Carousel (3-per-page, dots + auto-slide)
            (function () {
                var $track = $('#desktop-product-track');
                var $dots = $('.dp-dot');
                var current = 0;
                var total = $dots.length;

                if ($track.length === 0 || total <= 1) return;

                function goTo(index) {
                    current = index;
                    $track.css('transform', 'translateX(-' + (100 * index) + '%)');
                    $dots.removeClass('bg-white w-6').addClass('bg-white/40 w-2');
                    $dots.eq(index).addClass('bg-white w-6').removeClass('bg-white/40 w-2');
                }

                $dots.on('click', function () { goTo(parseInt($(this).data('index'))); });
                setInterval(function () { goTo((current + 1) % total); }, 4000);
            })();

            // Desktop Testimonial Carousel
            (function () {
                var $track = $('#desktop-testimonial-track');
                var $dots = $('.desktop-t-dot');
                var current = 0;
                var total = $dots.length;

                if ($track.length === 0 || total <= 1) return;

                function goTo(index) {
                    current = index;
                    $track.css('transform', 'translateX(-' + (100 * index) + '%)');
                    $dots.removeClass('bg-hex-dark w-6').addClass('bg-slate-300 w-2');
                    $dots.eq(index).addClass('bg-hex-dark w-6').removeClass('bg-slate-300 w-2');
                }

                $dots.on('click', function () {
                    goTo(parseInt($(this).data('index')));
                });

                setInterval(function () {
                    goTo((current + 1) % total);
                }, 5000);
            })();

            var bannerUrl = "{{ $heroBanner ? asset('storage/' . $heroBanner->image_path) : '' }}";
            if (bannerUrl) {
                // Banner aktif: desktop pakai src server-side, mobile pakai bg
                $("#mobileHeroBg").css("background-image", "url(" + bannerUrl + ")");
            } else {
                let images = [
                    "{{ asset('assets/img/hero/hero_homepage1.png') }}",
                    "{{ asset('assets/img/hero/hero_homepage2.png') }}",
                    "{{ asset('assets/img/hero/hero_homepage3.png') }}",
                ];
                let random = Math.floor(Math.random() * images.length);
                $("#randomImage").attr("src", images[random]);
                $("#mobileHeroBg").css("background-image", "url(" + images[random] + ")");
            }
            });
    </script>
@endpush