@extends('layouts.main')
@section('title', 'Hexavara - About Us')

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
                    <span
                        class="inline-flex items-center font-bold bg-blue-100 text-blue-600 rounded-full px-4 py-1 mb-6 text-sm uppercase tracking-widest">Est.
                        2013</span>
                    <h1 class="hero-title text-hex-dark" data-i18n="html"
                        data-en="Hi, we are<br /><span class='text-hex-blue'>Hexavara Tech.</span>"
                        data-id="Hai, kami adalah<br /><span class='text-hex-blue'>Hexavara Tech.</span>">Hi, we
                        are<br /><span class="text-hex-blue">Hexavara Tech.</span></h1>
                    <p class="mt-6 text-hex-slate text-lg leading-[1.65] max-w-[505px]" data-i18n
                        data-en="Founded in 2013 by ITS students, Hexavara has grown from an academic dream into a powerhouse of digital innovation. Our journey began with a shared passion for technology and a vision to transform the digital landscape."
                        data-id="Didirikan pada 2013 oleh mahasiswa ITS, Hexavara telah berkembang dari mimpi akademis menjadi pusat inovasi digital. Perjalanan kami dimulai dari semangat bersama untuk teknologi dan visi mengubah lanskap digital.">
                        Founded in 2013 by ITS students, Hexavara has grown from an academic dream into a powerhouse of
                        digital innovation. Our journey began with a shared passion for technology and a vision to
                        transform the digital landscape.</p>
                    <a href="{{ route('start-project') }}"
                        class="mt-8 inline-block px-8 py-3 bg-hex-dark text-white rounded-xl font-bold text-base hover:shadow-2xl hover:-translate-y-1 transition-all shadow-xl"
                        data-i18n data-en="Consult Now" data-id="Konsultasi Sekarang">Consult Now</a>
                </div>
                <img src="{{ asset('assets/img/hero_graha.png') }}" alt=""
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
                <a href="https://www.youtube.com/watch?v=UC3PbMpkEtM" target="_blank" rel="noopener noreferrer"
                    class="group block relative rounded-3xl overflow-hidden shadow-2xl shadow-blue-900/20">
                    <img src="https://img.youtube.com/vi/UC3PbMpkEtM/maxresdefault.jpg"
                        onerror="this.src='https://img.youtube.com/vi/UC3PbMpkEtM/hqdefault.jpg'" alt="Company Video"
                        class="w-full h-auto object-cover group-hover:scale-105 transition-transform duration-700">
                    <div
                        class="video-thumbnail-play absolute inset-0 flex items-center justify-center group-hover:bg-black/20 transition-all duration-300">
                        <div
                            class="w-20 h-20 bg-blue-600 rounded-full flex items-center justify-center text-white shadow-lg group-hover:bg-blue-500 group-hover:scale-110 transition-all duration-300">
                            <span class="material-symbols-outlined text-4xl ml-1">play_arrow</span>
                        </div>
                    </div>
                </a>
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
                    class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-7 gap-8 md:gap-12 mb-16 mx-auto max-w-[1200px] items-center justify-items-center opacity-80">
                    <img src="{{ asset('assets/img/unilever.png') }}" alt="Unilever" class="h-8 md:h-12 w-auto object-contain">
                    <img src="{{ asset('assets/img/wika.png') }}" alt="Wika" class="h-8 md:h-10 w-auto object-contain">
                    <img src="{{ asset('assets/img/pjb.png') }}" alt="PJB" class="h-10 md:h-12 w-auto object-contain">
                    <img src="{{ asset('assets/img/telkom.png') }}" alt="Telkom" class="h-10 md:h-12 w-auto object-contain">
                    <img src="{{ asset('assets/img/kominfo.png') }}" alt="Kominfo" class="h-10 md:h-12 w-auto object-contain">
                    <img src="{{ asset('assets/img/unair.png') }}" alt="Unair" class="h-12 md:h-16 w-auto object-contain">
                    <img src="{{ asset('assets/img/its.png') }}" alt="ITS" class="h-12 md:h-16 w-auto object-contain">

                    <img src="{{ asset('assets/img/ubaya.png') }}" alt="Ubaya" class="h-12 md:h-14 w-auto object-contain">
                    <img src="{{ asset('assets/img/univ_indonesia.png') }}" alt="UI" class="h-12 md:h-16 w-auto object-contain">
                    <img src="{{ asset('assets/img/bkd_jatim.png') }}" alt="BKD" class="h-10 md:h-12 w-auto object-contain">
                    <img src="{{ asset('assets/img/prov_bengkulu.png') }}" alt="Bengkulu" class="h-12 md:h-16 w-auto object-contain">
                    <img src="{{ asset('assets/img/banjarbaru.png') }}" alt="Banjarbaru" class="h-12 md:h-16 w-auto object-contain">
                    <img src="{{ asset('assets/img/lamongan.png') }}" alt="Lamongan" class="h-12 md:h-16 w-auto object-contain">
                    <img src="{{ asset('assets/img/pamekasan.png') }}" alt="Pamekasan" class="h-12 md:h-16 w-auto object-contain">
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
        <section class="py-24 bg-slate-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl lg:text-[42px] font-bold text-hex-dark mb-4" data-i18n
                        data-en="Hear From Our Clients" data-id="Kata Klien Kami">Hear From Our Clients</h2>
                    <p class="text-slate-500 max-w-2xl mx-auto text-lg" data-i18n
                        data-en="Trust from industry leaders across the globe."
                        data-id="Dipercaya oleh pemimpin industri di seluruh dunia.">Trust from industry leaders across
                        the globe.</p>
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
                            <div class="w-12 h-12 bg-blue-500 rounded-full flex justify-center items-center text-white">
                                <span class="material-symbols-outlined">person</span></div>
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
                            adding a group of experts to our own office. Professional, communicative, and exceptionally
                            skilled."</p>
                        <div class="flex items-center gap-4">
                            <div
                                class="w-12 h-12 bg-purple-500 rounded-full flex justify-center items-center text-white">
                                <span class="material-symbols-outlined">person</span></div>
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
                                <span class="material-symbols-outlined">person</span></div>
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
                        <img src="{{ asset('assets/img/talent.png') }}" alt="IT Consultant Talent"
                            class="w-full h-auto object-contain max-h-[500px] transform translate-y-2">
                    </div>

                    <!-- Right: Content -->
                    @include('partials.solution')
                </div>
            </div>
        </section>

    </main>
@endsection
