@extends('layouts.main')
@section('title', 'Hexavara - Works')

@push('styles')
<style>
    .active-filter { background-color: #0F172A !important; color: white !important; }
    .wc-pg-num.active { background-color: #0F172A !important; color: white !important; border-color: #0F172A !important; }

    .hero-perspective-wrap {
        perspective: 2000px;
        transform-style: preserve-3d;
        height: 100%;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: visible;
    }
    .hero-perspective-grid {
        display: grid;
        grid-template-columns: repeat(4, 220px);
        gap: 0.75rem;
        transform: rotateX(45deg) rotateZ(30deg);
        opacity: 1;
        transform-origin: center center;
    }
    .hero-perspective-grid div {
        background: rgba(255,255,255,0.05);
        padding: 0;
        border-radius: 8px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.08);
        overflow: hidden;
        border: none;
    }
    .hero-perspective-grid img {
        width: 100%;
        aspect-ratio: 1/1;
        object-fit: cover;
        border-radius: 8px;
    }

    .scrollbar-hide::-webkit-scrollbar { display: none; }

    /* Lazy image fade-in for works grid */
    #wc-grid img {
        opacity: 0;
        transition: opacity 0.35s ease, transform 0.5s ease;
        object-fit: contain;
    }
    #wc-grid img.img-loaded {
        opacity: 1;
    }
    #wc-grid .card-img-wrap {
        background: #f1f5f9;
    }
    @media (min-width: 768px) {
        #wc-grid img { object-fit: contain; }
    }
</style>
@endpush

@section('content')
    <main>
        <!-- Hero Section -->
        <section class="relative w-full h-[583px] overflow-hidden bg-gray-900 lg:bg-hex-surface flex items-center">
            {{-- Mobile background image --}}
            <div id="mobileHeroBg" class="absolute inset-0 z-0 bg-cover bg-center lg:hidden"
                style="background-image: url('{{ $heroBanner ? asset('storage/' . $heroBanner->image_path) : asset('assets/img/hero/hero_homepage1.png') }}');"></div>
            {{-- Desktop background image --}}
            <div class="absolute inset-0 z-0 bg-cover bg-top opacity-50 hidden lg:block"
                style="background-image: url('{{ $heroBanner ? asset('storage/' . $heroBanner->image_path) : asset('assets/img/Biru Modern Ucapan Selamat Ulang Tahun Instagram Post (2) 4.png') }}');"></div>
            <div class="max-w-[1280px] mx-auto h-full w-full relative z-10 px-4 lg:px-0 flex items-center justify-center lg:block">
                <div class="lg:absolute lg:left-[58px] lg:top-1/2 lg:-translate-y-1/2 max-w-xl z-20 w-full
                            bg-white/60 backdrop-blur-md rounded-2xl p-6 text-center border border-white/60
                            lg:bg-transparent lg:backdrop-blur-none lg:rounded-none lg:p-0 lg:w-auto lg:text-left lg:border-0">
                    <h1 class="hero-title text-hex-dark" data-i18n="html" data-en="Consult, Design,<br />& <span class='text-hex-blue'>Develop</span>" data-id="Konsultasi, Desain,<br />& <span class='text-hex-blue'>Kembangkan</span>">Consult, Design,<br />& <span class="text-hex-blue">Develop</span></h1>
                    <p class="mt-6 text-hex-slate text-lg leading-[1.65] hero-desc lg:max-w-[505px]" data-i18n data-en="Help businesses realize their digitalization goals. Use Free 60-minute consultation to start your digital journey." data-id="Bantu bisnis wujudkan impian digitalisasi. Gunakan gratis 60 menit konsultasi untuk memulai perjalanan digital Anda.">Help businesses realize their digitalization goals. Use Free 60-minute consultation to start your digital journey.</p>
                    <div class="mt-10 flex gap-4 justify-center lg:justify-start">
                        <a href="{{ route('start-project') }}" class="px-8 py-3 bg-hex-dark text-white rounded-xl font-bold text-base hover:shadow-2xl hover:-translate-y-1 transition-all shadow-xl" data-i18n data-en="Consult Now" data-id="Konsultasi Sekarang">Consult Now</a>
                    </div>
                </div>
                <div class="hidden lg:block relative h-full">
                    <div class="hero-perspective-wrap absolute right-[-480px] bottom-[-100px]">
                        <div class="hero-perspective-grid">
                            @php $heroImgs = $projects->whereNotNull('image')->values(); @endphp
                            @foreach($heroImgs->take(28) as $heroImg)
                            <div><img src="{{ image_url($heroImg->image) }}" alt="" loading="{{ $loop->index < 8 ? 'eager' : 'lazy' }}" decoding="async"></div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Our Works Section -->
        <section class="py-24 bg-[#F8FAFC]" id="works-projects">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-[42px] font-bold text-hex-dark mb-6 section-title" data-i18n data-en="Our Works" data-id="Karya Kami">Our Works</h2>
                    <p class="text-lg text-hex-slate max-w-3xl mx-auto leading-relaxed section-desc" data-i18n data-en="Experience innovation, explore excellence. Our Works exhibit a harmonious blend of creativity and functionality, setting new standards in design and client satisfaction." data-id="Rasakan inovasi, jelajahi keunggulan. Karya kami menunjukkan perpaduan harmonis kreativitas dan fungsionalitas, menetapkan standar baru desain dan pelayanan klien.">
                        Experience innovation, explore excellence. Our Works exhibit a harmonious blend of creativity and functionality, setting new standards in design and client satisfaction.
                    </p>
                </div>

                <!-- Filters -->
                <div class="flex justify-center mb-16">
                    <div class="flex flex-wrap justify-center gap-1.5 md:inline-flex md:gap-1 md:bg-slate-100 md:p-1.5 md:rounded-full md:shadow-inner">
                        <button class="wc-chip active-filter px-3 py-1.5 md:px-6 md:py-2.5 rounded-full font-bold md:font-medium text-[11px] md:text-sm text-white transition-all" data-filter="all" data-i18n data-en="All" data-id="Semua">All</button>
                        <button class="wc-chip border border-slate-300 md:border-0 bg-white md:bg-transparent px-3 py-1.5 md:px-6 md:py-2.5 rounded-full text-slate-700 md:text-slate-500 font-semibold md:font-medium hover:text-[#0F172A] transition-all text-[11px] md:text-sm" data-filter="software-development" data-i18n data-en="Software Development" data-id="Pengembangan Software">Software Development</button>
                        <button class="wc-chip border border-slate-300 md:border-0 bg-white md:bg-transparent px-3 py-1.5 md:px-6 md:py-2.5 rounded-full text-slate-700 md:text-slate-500 font-semibold md:font-medium hover:text-[#0F172A] transition-all text-[11px] md:text-sm" data-filter="digital-branding" data-i18n data-en="Digital Branding" data-id="Branding Digital">Digital Branding</button>
                        <button class="wc-chip border border-slate-300 md:border-0 bg-white md:bg-transparent px-3 py-1.5 md:px-6 md:py-2.5 rounded-full text-slate-700 md:text-slate-500 font-semibold md:font-medium hover:text-[#0F172A] transition-all text-[11px] md:text-sm" data-filter="startup-incubator" data-i18n data-en="Startup Incubator" data-id="Inkubator Startup">Startup Incubator</button>
                        <button class="wc-chip border border-slate-300 md:border-0 bg-white md:bg-transparent px-3 py-1.5 md:px-6 md:py-2.5 rounded-full text-slate-700 md:text-slate-500 font-semibold md:font-medium hover:text-[#0F172A] transition-all text-[11px] md:text-sm" data-filter="it-consultant" data-i18n data-en="IT Consultant" data-id="Konsultan TI">IT Consultant</button>
                    </div>
                </div>

                <!-- Grid -->
                <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-3 md:gap-8" id="wc-grid">
                    <!-- Cards will be injected by script -->
                </div>

                <!-- Pagination -->
                <div class="mt-20 flex justify-center items-center gap-1.5" id="wc-pagination">
                    <button type="button" class="w-8 h-8 md:w-12 md:h-12 rounded-full border border-slate-200 bg-white flex items-center justify-center text-slate-600 hover:bg-slate-50 transition-colors disabled:opacity-50 disabled:cursor-not-allowed shadow-sm font-bold text-xs md:text-base" id="wc-pg-prev">&#8592;</button>
                    <div class="flex gap-1.5" id="wc-pg-numbers"></div>
                    <button type="button" class="w-8 h-8 md:w-12 md:h-12 rounded-full border border-slate-200 bg-white flex items-center justify-center text-slate-600 hover:bg-slate-50 transition-colors disabled:opacity-50 disabled:cursor-not-allowed shadow-sm font-bold text-xs md:text-base" id="wc-pg-next">&#8594;</button>
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
        const ITEMS_PER_PAGE = window.innerWidth < 768 ? 6 : 12;
        let currentFilter = 'all';
        let currentPage = 1;

        // Project Data (dynamic from DB)
        const projects = {!! json_encode($projects->map(function($p) {
            return [
                'id'         => $p->id,
                'category'   => $p->category,
                'title'      => $p->name,
                'img'        => image_url($p->image),
                'summary'    => $p->summary_title ?: ($p->hero_description ?? ''),
                'summary_id' => $p->summary_title_id ?: ($p->hero_description_id ?? ''),
                'url'        => route('works.show', $p),
            ];
        })->values()) !!};

        function getCategoryConfig(cat) {
            switch(cat) {
                case 'software-development': return { class: 'bg-blue-50 text-blue-600', en: 'SOFTWARE DEVELOPMENT', id: 'PENGEMBANGAN SOFTWARE' };
                case 'it-consultant': return { class: 'bg-green-50 text-green-600', en: 'IT CONSULTANT', id: 'KONSULTAN TI' };
                case 'digital-branding': return { class: 'bg-orange-50 text-orange-600', en: 'DIGITAL BRANDING', id: 'BRANDING DIGITAL' };
                case 'startup-incubator': return { class: 'bg-purple-50 text-purple-600', en: 'STARTUP INCUBATOR', id: 'INKUBATOR STARTUP' };
                default: return { class: 'bg-slate-50 text-slate-600', en: 'PROJECT', id: 'PROYEK' };
            }
        }

        function renderCards() {
            var $grid = $('#wc-grid');
            if (!$grid.length) return;
            $grid.empty();

            const currentLang = window.hexLanguage ? window.hexLanguage.get() : 'en';
            const readMoreText = currentLang === 'id' ? 'Selengkapnya' : 'Read More';

            const filtered = currentFilter === 'all' ? projects : projects.filter(p => p.category === currentFilter);
            const totalPages = Math.ceil(filtered.length / ITEMS_PER_PAGE);
            const start = (currentPage - 1) * ITEMS_PER_PAGE;
            const end = start + ITEMS_PER_PAGE;

            const paged = filtered.slice(start, end);

            paged.forEach(p => {
                const config = getCategoryConfig(p.category);
                const cardHtml = `
                    <a href="${p.url}" class="group bg-white rounded-2xl overflow-hidden border border-slate-100 hover:shadow-2xl transition-all duration-500 hover:-translate-y-1 flex flex-col">
                    <div class="h-32 md:h-56 overflow-hidden relative card-img-wrap">
                        <img src="${p.img}"
                             alt="${p.title}"
                             loading="lazy"
                             decoding="async"
                             class="w-full h-full object-cover group-hover:scale-110"
                             onload="this.classList.add('img-loaded')"
                             onerror="this.src='{{ asset('assets/img/placeholder.png') }}';this.classList.add('img-loaded')">
                    </div>
                    <div class="p-3 md:p-8 flex-1 flex flex-col">
                        <div class="mb-2 md:mb-4">
                            <span class="inline-block px-2 py-1 md:px-4 md:py-1.5 rounded-full text-[9px] md:text-[10px] font-bold tracking-widest ${config.class}">
                                ${currentLang === 'en' ? config.en : config.id}
                            </span>
                        </div>
                        <h3 class="text-sm md:text-xl font-bold text-hex-dark mb-2 md:mb-4 line-clamp-1">${p.title}</h3>
                        <p class="text-slate-500 text-xs md:text-sm leading-relaxed line-clamp-2 md:line-clamp-3 mb-3 md:mb-6">${(currentLang === 'id' && p.summary_id) ? p.summary_id : p.summary}</p>
                        <div class="mt-auto flex items-center gap-1 md:gap-2 text-hex-blue font-bold text-xs md:text-sm">
                            ${readMoreText} <span translate="no" class="material-symbols-outlined text-xs md:text-sm translate-y-px">arrow_forward</span>
                        </div>
                    </div>
                    </a>
                `;
                $grid.append(cardHtml);
            });

            const $pagination = $('#wc-pagination');
            if ($pagination.length) {
                $pagination.css('display', totalPages > 1 ? 'flex' : 'none');
                if(totalPages > 1) {
                    renderPagination(totalPages);
                    $('#wc-pg-prev').prop('disabled', currentPage === 1);
                    $('#wc-pg-next').prop('disabled', currentPage === totalPages);
                }
            }
        }

        function renderPagination(totalPages) {
            const $pgNumbers = $('#wc-pg-numbers');
            if (!$pgNumbers.length) return;
            $pgNumbers.empty();

            const isMobile = window.innerWidth < 768;
            const btnSize = isMobile ? 'w-8 h-8 text-xs' : 'w-12 h-12 text-sm';

            // Sliding window: show at most 5 page numbers
            let startPage = 1, endPage = totalPages;
            if (totalPages > 5) {
                if (currentPage <= 3) {
                    startPage = 1; endPage = 5;
                } else if (currentPage >= totalPages - 2) {
                    startPage = totalPages - 4; endPage = totalPages;
                } else {
                    startPage = currentPage - 2; endPage = currentPage + 2;
                }
            }

            for (let i = startPage; i <= endPage; i++) {
                const $btn = $('<button type="button"></button>');
                $btn
                    .addClass(`wc-pg-num ${btnSize} rounded-full border flex items-center justify-center font-bold shadow-sm transition-all ${i === currentPage ? 'active bg-[#0F172A] text-white border-[#0F172A]' : 'bg-white text-slate-600 border-slate-200 hover:bg-slate-50'}`)
                    .text(i)
                    .on('click', function () {
                        currentPage = i;
                        renderCards();
                        const $worksProjects = $('#works-projects');
                        if ($worksProjects.length) {
                            $('html, body').animate({ scrollTop: $worksProjects.offset().top - 100 }, 300);
                        }
                    });
                $pgNumbers.append($btn);
            }
        }

        // Event Listeners for Filters
        $('.wc-chip').on('click', function () {
                $('.wc-chip').removeClass('active-filter text-white').addClass('text-slate-500');
                $(this).addClass('active-filter text-white').removeClass('text-slate-500');
                currentFilter = $(this).data('filter');
                currentPage = 1;
                renderCards();
        });

        $('#wc-pg-prev').on('click', function () { if(currentPage > 1) { currentPage--; renderCards(); } });
        $('#wc-pg-next').on('click', function () { if(currentPage < Math.ceil(projects.length/ITEMS_PER_PAGE)) { currentPage++; renderCards(); } });

        // Listen for language changes (native event from lang.js)
        window.addEventListener('languageChanged', function () {
            renderCards();
        });

        // Initial Load
        renderCards();
    </script>
@endpush
