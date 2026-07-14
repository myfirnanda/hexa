@extends('layouts.main')
@section('title', 'Hexavara - About Us')

@section('content')
    <!-- Hero Section -->
    <main>
        <!-- Hero Section -->
        <section class="relative w-full h-[583px] overflow-hidden lg:bg-transparent">
            {{-- Mobile background --}}
            <div id="mobileHeroBg" class="absolute inset-0 z-0 bg-cover bg-center lg:hidden"
                style="background-image: url('{{ $heroBanner ? asset('storage/' . $heroBanner->image_path) : asset('assets/img/hero/hero_graha.png') }}');"></div>
            {{-- Desktop background --}}
            <div class="absolute inset-0 z-0 bg-cover bg-top hidden lg:block opacity-80"
                style="background-image: url('{{ $heroBanner ? asset('storage/' . $heroBanner->image_path) : asset('assets/img/Biru Modern Ucapan Selamat Ulang Tahun Instagram Post (2) 4.png') }}');">
            </div>
            <div class="max-w-[1280px] mx-auto h-full relative z-10 px-4 lg:px-0 flex items-start pt-10 justify-center lg:block lg:pt-0">
                <div class="lg:absolute lg:left-[58px] lg:top-1/2 lg:-translate-y-1/2 max-w-[763px] lg:pt-0 w-full text-center
                            bg-white/60 backdrop-blur-md rounded-2xl p-6 border border-white/60
                            lg:bg-transparent lg:backdrop-blur-none lg:rounded-none lg:p-0 lg:w-auto lg:text-left lg:border-0">
                    <span
                        class="inline-flex items-center font-bold bg-blue-100 text-blue-600 rounded-full px-4 py-1 mb-6 text-sm uppercase tracking-widest">Est.
                        2013</span>
                    <h1 class="hero-title text-hex-dark" data-i18n="html"
                        data-en="Hi, we are<br /><span class='text-hex-blue'>Hexavara Tech.</span>"
                        data-id="Hai, kami adalah<br /><span class='text-hex-blue'>Hexavara Tech.</span>">Hi, we
                        are<br /><span class="text-hex-blue">Hexavara Tech.</span></h1>
                    <p class="mt-6 text-hex-slate text-lg leading-[1.65] lg:max-w-[505px]" data-i18n
                        data-en="Founded in 2013 by ITS students, Hexavara has grown from an academic dream into a powerhouse of digital innovation. Our journey began with a shared passion for technology and a vision to transform the digital landscape."
                        data-id="Didirikan pada 2013 oleh mahasiswa ITS, Hexavara telah berkembang dari mimpi akademis menjadi pusat inovasi digital. Perjalanan kami dimulai dari semangat bersama untuk teknologi dan visi mengubah lanskap digital.">
                        Founded in 2013 by ITS students, Hexavara has grown from an academic dream into a powerhouse of
                        digital innovation. Our journey began with a shared passion for technology and a vision to
                        transform the digital landscape.</p>
                    <div class="flex justify-center lg:justify-start">
                        <a href="{{ route('start-project') }}"
                            class="mt-8 inline-block px-8 py-3 bg-hex-dark text-white rounded-xl font-bold text-base hover:shadow-2xl hover:-translate-y-1 transition-all shadow-xl"
                            data-i18n data-en="Consult Now" data-id="Konsultasi Sekarang">Consult Now</a>
                    </div>
                </div>
                <img src="{{ asset('assets/img/hero/hero_graha.png') }}" alt=""
                    class="hidden lg:block absolute right-[-85px] top-0 h-[583px] object-contain">
            </div>
        </section>

        <!-- Quote Section -->
        <section class="py-24 bg-white relative">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
                <span translate="no" class="material-symbols-outlined text-6xl text-blue-600/20 mb-6 block">format_quote</span>
                <h2 class="text-[33px] font-bold text-hex-dark leading-tight mb-12 italic" data-i18n
                    data-en="&quot;The best idea is a comprehensive solution that bridges the gap between vision and reality.&quot;"
                    data-id="&quot;Ide terbaik adalah solusi komprehensif yang menjembatani kesenjangan antara visi dan realitas.&quot;">
                    "The best idea is a comprehensive solution that bridges the gap between vision and reality."
                </h2>
                <div class="w-24 h-1 bg-hex-blue mx-auto rounded-full"></div>
            </div>
        </section>

        <!-- Core Values Section -->
        <section class="py-24 bg-slate-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl lg:text-[42px] font-bold text-hex-dark mb-4 leading-tight" data-i18n
                        data-en="Our Core Values" data-id="Nilai Inti Kami">Our Core Values</h2>
                    <p class="text-slate-500 max-w-2xl mx-auto text-lg" data-i18n
                        data-en="The principles that guide every line of code we write and every partnership we build."
                        data-id="Prinsip yang memandu setiap baris kode yang kami tulis dan setiap kemitraan yang kami bangun.">
                        The principles that guide every line of code we write and every partnership we build.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                    <!-- Value 1 -->
                    <div
                        class="group bg-white rounded-[40px] p-10 border border-slate-100 hover:shadow-2xl transition-all duration-300">
                        <div
                            class="w-14 h-14 rounded-2xl bg-hex-surface flex items-center justify-center mb-8 group-hover:bg-hex-dark group-hover:text-white transition-colors">
                            <span translate="no" class="material-symbols-outlined text-3xl">emoji_events</span>
                        </div>
                        <h3 class="text-2xl font-bold text-hex-dark mb-4" data-i18n data-en="Competitive Excellence"
                            data-id="Keunggulan Kompetitif">Competitive Excellence</h3>
                        <p class="text-hex-slate text-base leading-relaxed" data-i18n
                            data-en="We compete to win. Every strategy, decision, and execution is designed to position our clients ahead in the final lap."
                            data-id="Kami bersaing untuk menang. Setiap strategi, keputusan, dan eksekusi dirancang untuk menempatkan klien kami di barisan terdepan.">
                            We compete to win. Every strategy, decision, and execution is designed to position our
                            clients ahead in the final lap.
                        </p>
                    </div>

                    <!-- Value 2 -->
                    <div
                        class="group bg-white rounded-[40px] p-10 border border-slate-100 hover:shadow-2xl transition-all duration-300">
                        <div
                            class="w-14 h-14 rounded-2xl bg-hex-surface flex items-center justify-center mb-8 group-hover:bg-hex-dark group-hover:text-white transition-colors">
                            <span translate="no" class="material-symbols-outlined text-3xl">memory</span>
                        </div>
                        <h3 class="text-2xl font-bold text-hex-dark mb-4" data-i18n
                            data-en="Technology-Driven Innovation" data-id="Inovasi Berbasis Teknologi">
                            Technology-Driven Innovation</h3>
                        <p class="text-hex-slate text-base leading-relaxed" data-i18n
                            data-en="We leverage smart, adaptive, and forward-thinking solutions to create sustainable competitive advantage."
                            data-id="Kami memanfaatkan solusi yang tangkas, adaptif, dan berwawasan ke depan untuk menciptakan keunggulan kompetitif yang berkelanjutan.">
                            We leverage smart, adaptive, and forward-thinking solutions to create sustainable
                            competitive advantage.
                        </p>
                    </div>

                    <!-- Value 3 -->
                    <div
                        class="group bg-white rounded-[40px] p-10 border border-slate-100 hover:shadow-2xl transition-all duration-300">
                        <div
                            class="w-14 h-14 rounded-2xl bg-hex-surface flex items-center justify-center mb-8 group-hover:bg-hex-dark group-hover:text-white transition-colors">
                            <span translate="no" class="material-symbols-outlined text-3xl">speed</span>
                        </div>
                        <h3 class="text-2xl font-bold text-hex-dark mb-4" data-i18n data-en="Speed &amp; Performance"
                            data-id="Kecepatan &amp; Performa">Speed & Performance</h3>
                        <p class="text-hex-slate text-base leading-relaxed" data-i18n
                            data-en="Speed defines us. We move fast, execute with precision, and focus on measurable results to ensure peak performance at every stage."
                            data-id="Kecepatan mendefinisikan kami. Kami bergerak cepat, mengeksekusi dengan presisi, dan fokus pada hasil terukur untuk memastikan performa puncak di setiap tahapan.">
                            Speed defines us. We move fast, execute with precision, and focus on measurable results to
                            ensure peak performance at every stage.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Video Section -->
        <section class="py-24 bg-slate-900 text-white relative">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center mb-12 relative z-10">
                <h2 class="text-3xl lg:text-[42px] font-bold text-white mb-6 leading-tight" data-i18n
                    data-en="Pioneering Excellence Since 2016" data-id="Merintis Keunggulan Sejak 2016">Pioneering
                    Excellence Since 2016</h2>
                <p class="text-slate-400 text-lg md:text-xl max-w-2xl mx-auto" data-i18n
                    data-en="Take a look at our journey and how we have evolved to become a leading tech solutions provider."
                    data-id="Lihatlah perjalanan kami dan bagaimana kami berkembang menjadi penyedia solusi teknologi terdepan.">
                    Take a look at our journey and how we have evolved to become a leading tech solutions provider.
                </p>
            </div>
            <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div id="about-video-player" style="aspect-ratio: 16 / 9;"
                    class="group relative rounded-3xl overflow-hidden shadow-2xl shadow-blue-900/20 bg-black">
                    <img id="about-video-thumbnail" src="https://img.youtube.com/vi/UC3PbMpkEtM/maxresdefault.jpg"
                        onerror="this.src='https://img.youtube.com/vi/UC3PbMpkEtM/hqdefault.jpg'" alt="Company Video"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    <button id="about-video-play-btn" type="button" aria-label="Play company video"
                        class="video-thumbnail-play absolute inset-0 flex items-center justify-center group-hover:bg-black/20 transition-all duration-300">
                        <span
                            class="w-20 h-20 bg-blue-600 rounded-full flex items-center justify-center text-white shadow-lg group-hover:bg-blue-500 group-hover:scale-110 transition-all duration-300">
                            <span translate="no" class="material-symbols-outlined text-4xl ml-1">play_arrow</span>
                        </span>
                    </button>
                    <iframe id="about-video-iframe" class="hidden w-full h-full"
                        title="Hexavara company profile video" loading="lazy"
                        referrerpolicy="strict-origin-when-cross-origin"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                </div>
            </div>
        </section>

        <!-- Our Projects Section -->
        <section class="py-20 bg-slate-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl lg:text-[42px] font-bold text-hex-dark mb-4" data-i18n data-en="Our Projects" data-id="Proyek Kami">Our Projects</h2>
                    <p class="text-slate-500 max-w-2xl mx-auto" data-i18n
                        data-en="We deliver our best performance in every project to ensure our customers are satisfied with the product."
                        data-id="Kami memberikan performa terbaik di setiap proyek untuk memastikan kepuasan pelanggan.">
                        We deliver our best performance in every project to ensure our customers are satisfied with the product.</p>
                </div>

                @php
                    $aboutCatMap = [
                        'software-development' => ['badge' => 'bg-blue-50 text-blue-600',   'en' => 'Software Development', 'id' => 'Pengembangan Perangkat Lunak'],
                        'digital-branding'     => ['badge' => 'bg-orange-50 text-orange-600','en' => 'Digital Branding',    'id' => 'Branding Digital'],
                        'startup-incubator'    => ['badge' => 'bg-purple-50 text-purple-600','en' => 'Startup Incubator',   'id' => 'Inkubator Startup'],
                        'it-consultant'        => ['badge' => 'bg-green-50 text-green-600',  'en' => 'IT Consultant',       'id' => 'Konsultan TI'],
                    ];
                @endphp

                <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-3 md:gap-8">
                    @foreach($projects as $proj)
                        @php
                            $projCat    = $aboutCatMap[$proj->category] ?? ['badge' => 'bg-slate-50 text-slate-600', 'en' => 'Project', 'id' => 'Proyek'];
                            $projImgUrl = $proj->image ? image_url($proj->image) : null;
                            $projDesc   = $proj->hero_description ?: \Illuminate\Support\Str::limit(strip_tags($proj->description ?? ''), 160);
                            $projDescId = $proj->hero_description_id ?: \Illuminate\Support\Str::limit(strip_tags($proj->description_id ?? ''), 160);
                        @endphp
                        <a href="{{ route('works.show', $proj) }}"
                            class="group block bg-white rounded-lg md:rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all">
                            <div class="h-32 md:h-56 overflow-hidden relative {{ !$projImgUrl ? 'flex items-center justify-center bg-blue-100' : 'bg-slate-50' }}">
                                @if($projImgUrl)
                                    <img src="{{ $projImgUrl }}"
                                        class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-500"
                                        alt="{{ $proj->name }}">
                                @else
                                    <span translate="no" class="material-symbols-outlined text-4xl md:text-6xl text-blue-400">rocket_launch</span>
                                @endif
                            </div>
                            <div class="p-3 md:p-8">
                                <div class="mb-2 md:mb-4">
                                    <span class="inline-block px-2 py-0.5 md:px-4 md:py-1.5 rounded-full {{ $projCat['badge'] }} text-[8px] md:text-[10px] font-bold tracking-widest uppercase"
                                        data-i18n data-en="{{ $projCat['en'] }}" data-id="{{ $projCat['id'] }}">{{ $projCat['en'] }}</span>
                                </div>
                                <h3 class="text-sm md:text-xl font-bold text-slate-900 mb-1 md:mb-4 line-clamp-2">{{ $proj->name }}</h3>
                                @if($projDescId)
                                    <p class="text-slate-600 text-[11px] md:text-sm line-clamp-2 md:line-clamp-3"
                                        data-i18n data-en="{{ $projDesc }}" data-id="{{ $projDescId }}">{{ $projDesc }}</p>
                                @else
                                    <p class="text-slate-600 text-[11px] md:text-sm line-clamp-2 md:line-clamp-3">{{ $projDesc }}</p>
                                @endif
                            </div>
                        </a>
                    @endforeach
                </div>

                <div class="mt-12 text-center">
                    <a href="{{ route('works.index') }}"
                        class="inline-block px-8 py-3 rounded-full border border-slate-300 text-slate-700 font-medium hover:bg-slate-100 transition-colors"
                        data-i18n data-en="View More" data-id="Lihat Lainnya">View More</a>
                </div>
            </div>
        </section>

        <!-- Key Team Section -->
        <section class="py-24 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl lg:text-[42px] font-bold text-hex-dark mb-4" data-i18n
                        data-en="Meet Our Key Team" data-id="Kenali Tim Inti Kami">Meet Our Key Team</h2>
                    <p class="text-slate-500 max-w-2xl mx-auto text-lg" data-i18n
                        data-en="Meet the brilliant minds behind Hexavara's success&mdash;a team of passionate engineers, designers, and visionaries."
                        data-id="Kenali orang-orang brilian di balik kesuksesan Hexavara&mdash;tim insinyur, desainer, dan visioner yang penuh semangat.">
                        Meet the brilliant minds behind Hexavara's success&mdash;a team of passionate engineers, designers,
                        and visionaries.</p>
                </div>

                <div class="flex flex-col md:flex-row justify-center gap-12">
                    <!-- Team Member 1 -->
                    <div class="text-center group">
                        <div
                            class="w-64 h-64 md:w-80 md:h-80 rounded-full overflow-hidden mx-auto mb-6 shadow-xl relative">
                            <div
                                class="absolute inset-0 bg-blue-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-10">
                            </div>
                            <img src="{{ asset('assets/img/tegar.jpg') }}" alt="Ramadhani Tegar Perkasa"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 mb-2">Ramadhani Tegar Perkasa</h3>
                        <p class="text-blue-600 font-medium">Founder & Commissioner</p>
                    </div>

                    <!-- Team Member 2 -->
                    <div class="text-center group">
                        <div
                            class="w-64 h-64 md:w-80 md:h-80 rounded-full overflow-hidden mx-auto mb-6 shadow-xl relative">
                            <div
                                class="absolute inset-0 bg-blue-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-10">
                            </div>
                            <img src="{{ asset('assets/img/luffi.jpg') }}" alt="Luffi Aditya Sandy"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 mb-2">Luffi Aditya Sandy</h3>
                        <p class="text-blue-600 font-medium">CEO & Founder</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Clients Section -->
        <section class="py-24 bg-white border-t border-slate-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col items-center">
                <h2 class="text-3xl lg:text-[42px] font-bold text-hex-dark mb-12 text-center" data-i18n
                    data-en="Some of Our Happy Clients" data-id="Beberapa Klien Kami yang Puas">Some of Our Happy
                    Clients</h2>
                <!-- Top Divider -->
                <div class="w-20 h-1 bg-hex-blue mx-auto rounded-full mb-12"></div>

                <!-- Partner Logos Marquee -->
                @php
                    $logoClients  = $clients->filter(fn($c) => $c->logo)->values();
                    $logoReversed = $logoClients->reverse()->values();
                @endphp

                <style>
                    @keyframes marquee-left  { from { transform: translateX(0);    } to { transform: translateX(-50%); } }
                    @keyframes marquee-right { from { transform: translateX(-50%); } to { transform: translateX(0);    } }
                    .marquee-track { display: flex; align-items: center; width: max-content; gap: 3.5rem; }
                    .marquee-track:hover { animation-play-state: paused; }
                </style>

                <div class="w-full mb-16 space-y-6 overflow-hidden">
                    {{-- Row 1: semua logo → kanan --}}
                    <div class="overflow-hidden">
                        <div class="marquee-track" style="animation: marquee-right 40s linear infinite;">
                            @foreach($logoClients->merge($logoClients) as $c)
                                <img src="{{ image_url($c->logo) }}" alt="{{ $c->name }}"
                                     class="h-8 md:h-10 w-auto object-contain opacity-75 flex-shrink-0">
                            @endforeach
                        </div>
                    </div>
                    {{-- Row 2: semua logo terbalik → kiri --}}
                    <div class="overflow-hidden">
                        <div class="marquee-track" style="animation: marquee-left 32s linear infinite;">
                            @foreach($logoReversed->merge($logoReversed) as $c)
                                <img src="{{ image_url($c->logo) }}" alt="{{ $c->name }}"
                                     class="h-8 md:h-10 w-auto object-contain opacity-75 flex-shrink-0">
                            @endforeach
                        </div>
                    </div>
                    {{-- Row 3: semua logo → kanan (lebih lambat) --}}
                    <div class="overflow-hidden">
                        <div class="marquee-track" style="animation: marquee-right 50s linear infinite;">
                            @foreach($logoClients->merge($logoClients) as $c)
                                <img src="{{ image_url($c->logo) }}" alt="{{ $c->name }}"
                                     class="h-8 md:h-10 w-auto object-contain opacity-75 flex-shrink-0">
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- View All Link -->
                <div class="mb-12">
                    <a href="{{ route('clients') }}"
                        class="view-all text-slate-800 font-bold hover:text-blue-600 underline decoration-2 underline-offset-8 transition-colors"
                        data-i18n data-en="View All" data-id="Lihat Semua">View All</a>
                </div>

                <!-- Stats -->
                <div id="about-stats-section"
                    class="grid grid-cols-3 gap-2 md:gap-8 text-center pt-8 md:pt-12 border-t border-slate-100 divide-x divide-slate-100 w-full max-w-3xl">
                    <div class="flex flex-col items-center py-2 md:py-4">
                        <div class="text-2xl md:text-5xl font-extrabold text-slate-900 mb-1 md:mb-2 about-stat-num" data-target="77" data-suffix="+">0+</div>
                        <div class="text-[9px] md:text-sm font-bold text-slate-500 uppercase tracking-widest leading-tight"
                            data-i18n data-en="Happy Clients" data-id="Klien Puas">Happy Clients</div>
                    </div>
                    <div class="flex flex-col items-center py-2 md:py-4">
                        <div class="text-2xl md:text-5xl font-extrabold text-slate-900 mb-1 md:mb-2 about-stat-num" data-target="116" data-suffix="+">0+</div>
                        <div class="text-[9px] md:text-sm font-bold text-slate-500 uppercase tracking-widest leading-tight"
                            data-i18n data-en="Projects Delivered" data-id="Proyek Diselesaikan">Projects Delivered</div>
                    </div>
                    <div class="flex flex-col items-center py-2 md:py-4">
                        <div class="text-2xl md:text-5xl font-extrabold text-slate-900 mb-1 md:mb-2 about-stat-num" data-target="86" data-suffix="%">0%</div>
                        <div class="text-[9px] md:text-sm font-bold text-slate-500 uppercase tracking-widest leading-tight"
                            data-i18n data-en="Client Retention" data-id="Retensi Klien">Client Retention</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonials Section -->
        @if($testimonials->isNotEmpty())
        @php
            $aboutAvatarColors = ['bg-blue-500', 'bg-purple-500', 'bg-emerald-500', 'bg-orange-500', 'bg-pink-500', 'bg-teal-500'];
            $aboutDesktopPages = $testimonials->chunk(3);
            $aboutTotalPages = $aboutDesktopPages->count();
            $aboutGlobalIdx = 0;
        @endphp
        <section class="py-16 md:py-24 bg-slate-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12 md:mb-16">
                    <h2 class="text-[42px] font-bold text-slate-900 mb-4" data-i18n
                        data-en="Hear From Our Clients" data-id="Kata Klien Kami">Hear From Our Clients</h2>
                    <p class="text-slate-500 max-w-2xl mx-auto" data-i18n
                        data-en="Trust from industry leaders across the globe."
                        data-id="Dipercaya oleh pemimpin industri di seluruh dunia.">Trust from industry leaders across the globe.</p>
                </div>

                {{-- Desktop carousel (3 per page) --}}
                <div class="hidden md:block">
                    <div class="overflow-hidden">
                        <div class="flex transition-transform duration-500 ease-in-out" id="about-desktop-track">
                            @foreach($aboutDesktopPages as $page)
                                <div class="w-full flex-shrink-0 grid grid-cols-3 gap-8">
                                    @foreach($page as $testimonial)
                                        @php $color = $aboutAvatarColors[$aboutGlobalIdx % count($aboutAvatarColors)]; $aboutGlobalIdx++; @endphp
                                        <div class="bg-white p-8 rounded-3xl relative shadow-xl shadow-slate-200/50 border border-slate-100">
                                            <div class="flex gap-1 text-yellow-400 mb-6">
                                                @for($s = 0; $s < ($testimonial->rating ?: 5); $s++)
                                                    <span translate="no" class="material-symbols-outlined star-icon text-lg" style="font-variation-settings: 'FILL' 1;">star</span>
                                                @endfor
                                            </div>
                                            <p class="text-slate-700 font-medium italic mb-8 text-base">"<span @if($testimonial->quote_id) data-i18n data-en="{{ $testimonial->quote }}" data-id="{{ $testimonial->quote_id }}" @endif>{{ $testimonial->quote }}</span>"</p>
                                            <div class="flex items-center gap-4">
                                                <div class="w-12 h-12 {{ $color }} rounded-full flex justify-center items-center text-white flex-shrink-0">
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
                    @if($aboutTotalPages > 1)
                        <div class="flex justify-center gap-2 mt-8" id="about-desktop-dots">
                            @for($i = 0; $i < $aboutTotalPages; $i++)
                                <button class="about-dt-dot h-2 rounded-full transition-all duration-300 {{ $i === 0 ? 'bg-hex-dark w-6' : 'bg-slate-300 w-2' }}"
                                    data-index="{{ $i }}"></button>
                            @endfor
                        </div>
                    @endif
                </div>

                {{-- Mobile carousel --}}
                <div class="md:hidden">
                    <div class="relative overflow-hidden">
                        <div class="flex transition-transform duration-500" id="about-mobile-track">
                            @php $aboutAvatarColors2 = ['bg-blue-500', 'bg-purple-500', 'bg-emerald-500', 'bg-orange-500', 'bg-pink-500', 'bg-teal-500']; @endphp
                            @foreach($testimonials as $testimonial)
                                <div class="w-full flex-shrink-0 px-2">
                                    <div class="bg-white p-6 rounded-2xl relative shadow-md shadow-slate-200/50 border border-slate-100">
                                        <div class="flex gap-0.5 text-yellow-400 mb-4">
                                            @for($s = 0; $s < ($testimonial->rating ?: 5); $s++)
                                                <span translate="no" class="material-symbols-outlined star-icon text-xl" style="font-variation-settings: 'FILL' 1;">star</span>
                                            @endfor
                                        </div>
                                        <p class="text-slate-700 font-medium italic mb-6 text-sm line-clamp-3">"<span @if($testimonial->quote_id) data-i18n data-en="{{ $testimonial->quote }}" data-id="{{ $testimonial->quote_id }}" @endif>{{ $testimonial->quote }}</span>"</p>
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 {{ $aboutAvatarColors2[$loop->index % count($aboutAvatarColors2)] }} rounded-full flex justify-center items-center text-white flex-shrink-0">
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
                    <div class="flex justify-center gap-2 mt-5" id="about-mobile-dots">
                        @foreach($testimonials as $i => $t)
                            <button class="about-m-dot h-2 rounded-full transition-all duration-300 {{ $i === 0 ? 'bg-hex-dark w-6' : 'bg-slate-300 w-2' }}"
                                data-index="{{ $i }}"></button>
                        @endforeach
                    </div>
                </div>
            </div>

            <script>
            (function() {
                // Desktop pagination
                var dTrack = document.getElementById('about-desktop-track');
                var dDots  = document.querySelectorAll('.about-dt-dot');
                if (dTrack && dDots.length > 1) {
                    var dCur = 0;
                    function dGoTo(i) {
                        dCur = i;
                        dTrack.style.transform = 'translateX(-' + (100 * i) + '%)';
                        dDots.forEach(function(d, j) {
                            d.classList.toggle('bg-hex-dark', j === i); d.style.width = j === i ? '1.5rem' : '0.5rem';
                            d.classList.toggle('bg-slate-300', j !== i);
                        });
                    }
                    dDots.forEach(function(d) { d.addEventListener('click', function() { dGoTo(+this.dataset.index); }); });
                    setInterval(function() { dGoTo((dCur + 1) % dDots.length); }, 4000);
                }
                // Mobile slider
                var mTrack = document.getElementById('about-mobile-track');
                var mDots  = document.querySelectorAll('.about-m-dot');
                if (mTrack && mDots.length > 1) {
                    var mCur = 0;
                    function mGoTo(i) {
                        mCur = i;
                        mTrack.style.transform = 'translateX(-' + (100 * i) + '%)';
                        mDots.forEach(function(d, j) {
                            d.classList.toggle('bg-hex-dark', j === i); d.style.width = j === i ? '1.5rem' : '0.5rem';
                            d.classList.toggle('bg-slate-300', j !== i);
                        });
                    }
                    mDots.forEach(function(d) { d.addEventListener('click', function() { mGoTo(+this.dataset.index); }); });
                    setInterval(function() { mGoTo((mCur + 1) % mDots.length); }, 4000);
                }
            })();
            </script>
        </section>
        @endif

        <!-- Location Section -->
        <section class="py-20 bg-white" id="lokasi">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-[32px] lg:text-[42px] font-bold text-hex-dark tracking-tight"
                        data-i18n data-en="Find Our Office" data-id="Temukan Kantor Kami">Temukan Kantor Kami</h2>
                    <p class="text-slate-500 mt-3 max-w-xl mx-auto"
                        data-i18n
                        data-en="We're ready to meet you in person. Drop by our office or reach out digitally — we'd love to hear from you."
                        data-id="Kami siap bertemu Anda. Kunjungi kantor kami atau hubungi kami secara digital — kami senang mendengar dari Anda.">
                        Kami siap bertemu Anda. Kunjungi kantor kami atau hubungi kami secara digital — kami senang mendengar dari Anda.
                    </p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 items-stretch">

                    <!-- Left: Info Card -->
                    <div class="bg-slate-50 rounded-3xl p-8 lg:p-10 flex flex-col justify-between gap-8">
                        <div class="space-y-6">
                            <!-- Address -->
                            <div class="flex items-start gap-4">
                                <div class="w-11 h-11 rounded-xl bg-[#00B4BF]/10 flex items-center justify-center flex-shrink-0 mt-0.5">
                                    <span translate="no" class="material-symbols-outlined text-hex-blue text-xl">location_on</span>
                                </div>
                                <div>
                                    <p class="font-bold text-hex-dark text-sm mb-1"
                                        data-i18n data-en="Office Address" data-id="Alamat Kantor">Alamat Kantor</p>
                                    <p class="text-hex-slate text-sm leading-relaxed">
                                        Graha Bukopin Lantai 7 &amp; 12,<br>
                                        Jl. Panglima Sudirman No. 10-18,<br>
                                        Embong Kaliasin, Genteng,<br>
                                        Kota Surabaya, Jawa Timur 60271
                                    </p>
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="flex items-center gap-4">
                                <div class="w-11 h-11 rounded-xl bg-[#00B4BF]/10 flex items-center justify-center flex-shrink-0">
                                    <span translate="no" class="material-symbols-outlined text-hex-blue text-xl">mail</span>
                                </div>
                                <div>
                                    <p class="font-bold text-hex-dark text-sm mb-0.5">Email</p>
                                    <a href="mailto:info@hexavara.com" class="text-hex-blue text-sm hover:underline">info@hexavara.com</a>
                                </div>
                            </div>

                            <!-- Phone -->
                            <div class="flex items-center gap-4">
                                <div class="w-11 h-11 rounded-xl bg-[#00B4BF]/10 flex items-center justify-center flex-shrink-0">
                                    <span translate="no" class="material-symbols-outlined text-hex-blue text-xl">call</span>
                                </div>
                                <div>
                                    <p class="font-bold text-hex-dark text-sm mb-0.5"
                                        data-i18n data-en="Phone" data-id="Telepon">Telepon</p>
                                    <a href="tel:+628113451550" class="text-hex-blue text-sm hover:underline">+62 811 3451 550</a>
                                </div>
                            </div>
                        </div>

                        <!-- Button -->
                        <a href="https://maps.google.com/?q=Graha+Bukopin+Surabaya+Jl+Panglima+Sudirman+No+10-18"
                            target="_blank" rel="noopener"
                            class="inline-flex items-center justify-center gap-2 px-6 py-3 rounded-xl bg-hex-dark text-white font-bold text-sm hover:shadow-xl hover:-translate-y-0.5 transition-all"
                            data-i18n data-en="Open in Google Maps" data-id="Buka di Google Maps">
                            <span translate="no" class="material-symbols-outlined text-base">open_in_new</span>
                            Buka di Google Maps
                        </a>
                    </div>

                    <!-- Right: Google Maps Embed -->
                    <!-- Untuk ganti lokasi: buka maps.google.com → cari lokasi → klik Share → Embed a map → salin src dari iframe dan ganti di bawah -->
                    <div class="rounded-3xl overflow-hidden shadow-md" style="min-height: 400px;">
                        <iframe
                            src="https://maps.google.com/maps?q=Graha+Bukopin+Surabaya+Jl+Panglima+Sudirman+No+10-18&output=embed"
                            width="100%"
                            height="100%"
                            style="min-height: 400px; border: 0; display: block;"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"
                            title="Hexavara Office Location">
                        </iframe>
                    </div>

                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="py-8 md:pt-0 md:pb-0 bg-white overflow-hidden">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-20 lg:px-32">

                <!-- Mobile Card Layout -->
                <div class="block md:hidden bg-slate-100 rounded-3xl overflow-hidden">
                    <div class="flex items-end">
                        <div class="flex-shrink-0 w-[48%]">
                            <img src="{{ asset('assets/img/talent.png') }}" alt="IT Consultant"
                                class="w-full object-contain">
                        </div>
                        <div class="flex-1 px-5 py-6 flex flex-col justify-center">
                            <h2 class="text-base font-bold text-[#121B26] mb-3 leading-snug" data-i18n="html"
                                data-en="Get the Right IT Solutions from the <span class='text-blue-600'>Best IT Vendor</span>. Consult with Us Today!"
                                data-id="Dapatkan Solusi IT yang Tepat dari <span class='text-blue-600'>Vendor IT Terbaik</span> — Konsultasi Sekarang!">
                                Get the Right IT Solutions from the <span class="text-blue-600">Best IT Vendor</span>. Consult with Us Today!
                            </h2>
                            <p class="text-slate-500 text-sm mb-4 leading-relaxed" data-i18n
                                data-en="Discuss your IT challenges, and our team of experienced experts will provide tailored solutions to drive your business growth and success."
                                data-id="Diskusikan tantangan IT Anda, dan tim ahli berpengalaman kami akan memberikan solusi yang disesuaikan untuk mendorong pertumbuhan bisnis Anda.">
                                Discuss your IT challenges, and our team of experienced experts will provide tailored solutions to drive your business growth and success.
                            </p>
                            <a href="{{ route('start-project') }}"
                                class="inline-flex items-center justify-center px-6 py-3 rounded-xl bg-hex-dark text-white font-bold text-sm shadow-md hover:shadow-xl transition-all"
                                data-i18n data-en="Consult Now" data-id="Konsultasi Sekarang">Consult Now</a>
                        </div>
                    </div>
                </div>

                <!-- Desktop Layout (unchanged) -->
                <div class="hidden md:grid grid-cols-[auto_1fr] gap-16 items-end -ml-12">
                    <div class="relative flex justify-start items-end">
                        <img src="{{ asset('assets/img/talent.png') }}" alt="IT Consultant Talent"
                            class="block w-auto h-auto object-contain max-h-[500px] align-bottom">
                    </div>
                    <div class="self-center max-w-2xl">
                        @include('partials.solution')
                    </div>
                </div>

            </div>
        </section>
    </main>
@endsection

@push('scripts')
    <script>
        // Stats count-up animation
        (function () {
            var hasRun = false;
            var DURATION = 2000;
            function easeOutQuart(t) { return 1 - Math.pow(1 - t, 4); }
            function runCountUp() {
                if (hasRun) return;
                hasRun = true;
                document.querySelectorAll('.about-stat-num').forEach(function (el) {
                    var target = parseInt(el.dataset.target, 10);
                    var suffix = el.dataset.suffix || '';
                    var startTime = null;
                    function step(ts) {
                        if (!startTime) startTime = ts;
                        var progress = Math.min((ts - startTime) / DURATION, 1);
                        el.textContent = Math.floor(easeOutQuart(progress) * target) + suffix;
                        if (progress < 1) requestAnimationFrame(step);
                        else el.textContent = target + suffix;
                    }
                    requestAnimationFrame(step);
                });
            }
            var el = document.getElementById('about-stats-section');
            if (el && 'IntersectionObserver' in window) {
                new IntersectionObserver(function (entries, obs) {
                    if (entries[0].isIntersecting) { runCountUp(); obs.disconnect(); }
                }, { threshold: 0.3 }).observe(el);
            } else if (el) {
                runCountUp();
            }
        })();

        // Video player
        document.addEventListener('DOMContentLoaded', function () {
            var playButton = document.getElementById('about-video-play-btn');
            var thumbnail = document.getElementById('about-video-thumbnail');
            var iframe = document.getElementById('about-video-iframe');

            if (!playButton || !thumbnail || !iframe) {
                return;
            }

            playButton.addEventListener('click', function () {
                if (!iframe.src) {
                    iframe.src = 'https://www.youtube.com/embed/UC3PbMpkEtM?autoplay=1&rel=0';
                }

                iframe.classList.remove('hidden');
                playButton.classList.add('hidden');
                thumbnail.classList.add('hidden');
            });
        });
    </script>
@endpush
