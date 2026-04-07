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
</style>
@endpush

@section('content')
    <main>
        <!-- Hero Section -->
        <section class="relative w-full h-[583px] overflow-hidden bg-hex-surface flex items-center">
            <div class="absolute inset-0 z-0 bg-cover bg-top opacity-50" style="background-image: url('{{ asset('assets/img/Biru Modern Ucapan Selamat Ulang Tahun Instagram Post (2) 4.png') }}');"></div>
            <div class="max-w-[1280px] mx-auto h-full w-full relative z-10 px-4 lg:px-0">
                <div class="lg:absolute lg:left-[58px] lg:top-1/2 lg:-translate-y-1/2 max-w-xl z-20">
                    <h1 class="hero-title text-hex-dark" data-i18n="html" data-en="Consult, Design,<br />& <span class='text-hex-blue'>Develop</span>" data-id="Konsultasi, Desain,<br />& <span class='text-hex-blue'>Kembangkan</span>">Consult, Design,<br />& <span class="text-hex-blue">Develop</span></h1>
                    <p class="mt-6 text-hex-slate text-lg leading-[1.65] max-w-[505px] hero-desc" data-i18n data-en="Help businesses realize their digitalization goals. Use Free 60-minute consultation to start your digital journey." data-id="Bantu bisnis wujudkan impian digitalisasi. Gunakan gratis 60 menit konsultasi untuk memulai perjalanan digital Anda.">Help businesses realize their digitalization goals. Use Free 60-minute consultation to start your digital journey.</p>
                    <div class="mt-10 flex gap-4">
                        <a href="{{ route('start-project') }}" class="px-8 py-3 bg-hex-dark text-white rounded-xl font-bold text-base hover:shadow-2xl hover:-translate-y-1 transition-all shadow-xl" data-i18n data-en="Consult Now" data-id="Konsultasi Sekarang">Consult Now</a>
                    </div>
                </div>
                <div class="hidden lg:block relative h-full">
                    <div class="hero-perspective-wrap absolute right-[-480px] bottom-[-100px]">
                        <div class="hero-perspective-grid">
                            <div><img src="{{ asset('assets/img/POS_KANA1.png') }}" alt=""></div>
                            <div><img src="{{ asset('assets/img/projects/proyek_all_telkom.png') }}" alt=""></div>
                            <div><img src="{{ asset('assets/img/projects/proyek_all_wika.png') }}" alt=""></div>
                            <div><img src="{{ asset('assets/img/projects/proyek_all_industri.jpg') }}" alt=""></div>
                            <div><img src="{{ asset('assets/img/projects/proyek_all_ppdb.jpg') }}" alt=""></div>
                            <div><img src="{{ asset('assets/img/projects/proyek_all_kana.jpg') }}" alt=""></div>
                            <div><img src="{{ asset('assets/img/projects/proyek_all_bmt.jpg') }}" alt=""></div>
                            <div><img src="{{ asset('assets/img/projects/proyek_all_calcius.jpg') }}" alt=""></div>
                            <div><img src="{{ asset('assets/img/projects/proyek_all_zelltech.png') }}" alt=""></div>
                            <div><img src="{{ asset('assets/img/projects/proyek_all_unilever.png') }}" alt=""></div>
                            <div><img src="{{ asset('assets/img/projects/proyek_softdev_silly.png') }}" alt=""></div>
                            <div><img src="{{ asset('assets/img/projects/proyek_softdev_banjarbaru.png') }}" alt=""></div>
                            <div><img src="{{ asset('assets/img/projects/proyek_all_pamekasan.png') }}" alt=""></div>
                            <div><img src="{{ asset('assets/img/projects/proyek_digital_ubaya.png') }}" alt=""></div>
                            <div><img src="{{ asset('assets/img/projects/proyek_digital_aisya.png') }}" alt=""></div>
                            <div><img src="{{ asset('assets/img/projects/proyek_digital_jmf.png') }}" alt=""></div>
                            <!-- Added 3 more rows (12 items) -->
                            <div><img src="{{ asset('assets/img/POS_KANA1.png') }}" alt=""></div>
                            <div><img src="{{ asset('assets/img/projects/proyek_all_telkom.png') }}" alt=""></div>
                            <div><img src="{{ asset('assets/img/projects/proyek_all_wika.png') }}" alt=""></div>
                            <div><img src="{{ asset('assets/img/projects/proyek_all_industri.jpg') }}" alt=""></div>
                            <div><img src="{{ asset('assets/img/projects/proyek_all_ppdb.jpg') }}" alt=""></div>
                            <div><img src="{{ asset('assets/img/projects/proyek_all_kana.jpg') }}" alt=""></div>
                            <div><img src="{{ asset('assets/img/projects/proyek_all_bmt.jpg') }}" alt=""></div>
                            <div><img src="{{ asset('assets/img/projects/proyek_all_calcius.jpg') }}" alt=""></div>
                            <div><img src="{{ asset('assets/img/projects/proyek_all_zelltech.png') }}" alt=""></div>
                            <div><img src="{{ asset('assets/img/projects/proyek_all_unilever.png') }}" alt=""></div>
                            <div><img src="{{ asset('assets/img/projects/proyek_softdev_silly.png') }}" alt=""></div>
                            <div><img src="{{ asset('assets/img/projects/proyek_softdev_banjarbaru.png') }}" alt=""></div>
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
                    <div class="inline-flex flex-wrap justify-center bg-slate-100 p-1.5 rounded-full gap-1 shadow-inner">
                        <button class="wc-chip active-filter px-6 py-2.5 rounded-full text-white font-medium transition-all text-sm" data-filter="all" data-i18n data-en="All" data-id="Semua">All</button>
                        <button class="wc-chip px-6 py-2.5 rounded-full text-slate-500 font-medium hover:text-[#0F172A] transition-all text-sm" data-filter="software-development" data-i18n data-en="Software Development" data-id="Pengembangan Software">Software Development</button>
                        <button class="wc-chip px-6 py-2.5 rounded-full text-slate-500 font-medium hover:text-[#0F172A] transition-all text-sm" data-filter="digital-branding" data-i18n data-en="Digital Branding" data-id="Branding Digital">Digital Branding</button>
                        <button class="wc-chip px-6 py-2.5 rounded-full text-slate-500 font-medium hover:text-[#0F172A] transition-all text-sm" data-filter="startup-incubator" data-i18n data-en="Startup Incubator" data-id="Inkubator Startup">Startup Incubator</button>
                        <button class="wc-chip px-6 py-2.5 rounded-full text-slate-500 font-medium hover:text-[#0F172A] transition-all text-sm" data-filter="it-consultant" data-i18n data-en="IT Consultant" data-id="Konsultan TI">IT Consultant</button>
                    </div>
                </div>

                <!-- Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8" id="wc-grid">
                    <!-- Cards will be injected by script -->
                </div>

                <!-- Pagination -->
                <div class="mt-20 flex justify-center items-center gap-2" id="wc-pagination">
                    <button type="button" class="w-12 h-12 rounded-full border border-slate-200 bg-white flex items-center justify-center text-slate-600 hover:bg-slate-50 transition-colors disabled:opacity-50 disabled:cursor-not-allowed shadow-sm font-bold" id="wc-pg-prev">&#8592;</button>
                    <div class="flex gap-2" id="wc-pg-numbers"></div>
                    <button type="button" class="w-12 h-12 rounded-full border border-slate-200 bg-white flex items-center justify-center text-slate-600 hover:bg-slate-50 transition-colors disabled:opacity-50 disabled:cursor-not-allowed shadow-sm font-bold" id="wc-pg-next">&#8594;</button>
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
        const ITEMS_PER_PAGE = 12;
        let currentFilter = 'all';
        let currentPage = 1;

        // Project Data (dynamic from DB)
        const projects = {!! json_encode($projects->map(function($p) {
            return [
                'id'       => $p->id,
                'category' => $p->category,
                'title'    => $p->name,
                'img'      => image_url($p->image),
                'summary'  => $p->summary_title ?? '',
                'url'      => route('works.show', $p),
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
                    <div class="h-56 overflow-hidden relative">
                        <img src="${p.img}" alt="${p.title}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    </div>
                    <div class="p-8 flex-1 flex flex-col">
                        <div class="mb-4">
                            <span class="inline-block px-4 py-1.5 rounded-full text-[10px] font-bold tracking-widest ${config.class}">
                                ${currentLang === 'en' ? config.en : config.id}
                            </span>
                        </div>
                        <h3 class="text-xl font-bold text-hex-dark mb-4 line-clamp-2">${p.title}</h3>
                        <p class="text-slate-500 text-sm leading-relaxed line-clamp-3 mb-6">${p.summary}</p>
                        <div class="mt-auto flex items-center gap-2 text-hex-blue font-bold text-sm">
                            ${readMoreText} <span class="material-symbols-outlined text-sm translate-y-px">arrow_forward</span>
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
            for (let i = 1; i <= totalPages; i++) {
                const $btn = $('<button type="button"></button>');
                $btn
                    .addClass(`w-12 h-12 rounded-full border border-slate-200 flex items-center justify-center font-bold text-sm shadow-sm transition-all ${i === currentPage ? 'active bg-hex-dark text-white border-hex-dark' : 'bg-white text-slate-600 hover:bg-slate-50'}`)
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

        // Listen for language changes
        $(window).on('languageChanged', function () {
            renderCards();
        });

        // Initial Load
        renderCards();
    </script>
@endpush
