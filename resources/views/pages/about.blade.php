@extends('layouts.main')
@section('title', 'Hexavara - About Us')

@section('content')
    <!-- Hero Section -->
    <main>
        <!-- Hero Section -->
        <section class="relative w-full h-[583px] overflow-hidden bg-gray-900 lg:bg-transparent">
            {{-- Mobile background --}}
            <div id="mobileHeroBg" class="absolute inset-0 z-0 bg-cover bg-center lg:hidden"
                style="background-image: url('{{ $heroBanner ? asset('storage/' . $heroBanner->image_path) : asset('assets/img/hero/hero_graha.png') }}');"></div>
            {{-- Desktop background --}}
            <div class="absolute inset-0 z-0 bg-cover bg-top hidden lg:block opacity-80"
                style="background-image: url('{{ $heroBanner ? asset('storage/' . $heroBanner->image_path) : asset('assets/img/Biru Modern Ucapan Selamat Ulang Tahun Instagram Post (2) 4.png') }}');">
            </div>
            <div class="max-w-[1280px] mx-auto h-full relative z-10 px-4 lg:px-0 flex items-center justify-center lg:block">
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
                <span class="material-symbols-outlined text-6xl text-blue-600/20 mb-6 block">format_quote</span>
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
                            <span class="material-symbols-outlined text-3xl">emoji_events</span>
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
                            <span class="material-symbols-outlined text-3xl">memory</span>
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
                            <span class="material-symbols-outlined text-3xl">speed</span>
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
                            <span class="material-symbols-outlined text-4xl ml-1">play_arrow</span>
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
                <h2 class="text-3xl lg:text-[42px] font-bold text-hex-dark mb-12" data-i18n
                    data-en="Some of Our Happy Clients" data-id="Beberapa Klien Kami yang Puas">Some of Our Happy
                    Clients</h2>
                <!-- Top Divider -->
                <div class="w-20 h-1 bg-hex-blue mx-auto rounded-full mb-12"></div>

                <!-- Partner Logos Grid -->
                <div
                    class="grid grid-cols-7 gap-8 md:gap-12 mb-16 mx-auto max-w-[1200px] items-center justify-items-center opacity-80">
                    @foreach($clients->filter(fn($c) => $c->logo)->take(14) as $client)
                        <img src="{{ image_url($client->logo) }}" alt="{{ $client->name }}" class="h-10 md:h-12 w-auto object-contain">
                    @endforeach
                </div>

                <!-- View All Link -->
                <div>
                    <a href="{{ route('clients') }}"
                        class="view-all text-slate-800 font-bold hover:text-blue-600 underline decoration-2 underline-offset-8 transition-colors">View
                        All</a>
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
                                                    <span class="material-symbols-outlined star-icon text-lg" style="font-variation-settings: 'FILL' 1;">star</span>
                                                @endfor
                                            </div>
                                            <p class="text-slate-700 font-medium italic mb-8 text-base">"{{ $testimonial->quote }}"</p>
                                            <div class="flex items-center gap-4">
                                                <div class="w-12 h-12 {{ $color }} rounded-full flex justify-center items-center text-white flex-shrink-0">
                                                    <span class="material-symbols-outlined text-xl">person</span>
                                                </div>
                                                <div>
                                                    <p class="font-bold text-slate-900 text-base">{{ $testimonial->name }}</p>
                                                    <p class="text-sm text-slate-500">{{ $testimonial->role }}</p>
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
                                                <span class="material-symbols-outlined star-icon text-xl" style="font-variation-settings: 'FILL' 1;">star</span>
                                            @endfor
                                        </div>
                                        <p class="text-slate-700 font-medium italic mb-6 text-sm line-clamp-3">"{{ $testimonial->quote }}"</p>
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 {{ $aboutAvatarColors2[$loop->index % count($aboutAvatarColors2)] }} rounded-full flex justify-center items-center text-white flex-shrink-0">
                                                <span class="material-symbols-outlined text-base">person</span>
                                            </div>
                                            <div>
                                                <p class="font-bold text-slate-900 text-sm">{{ $testimonial->name }}</p>
                                                <p class="text-xs text-slate-500">{{ $testimonial->role }}</p>
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
