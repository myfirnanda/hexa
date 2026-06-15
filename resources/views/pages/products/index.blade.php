@extends('layouts.main')
@section('title', 'Products — Hexavara')

@section('content')
<main>

    {{-- Hero --}}
    <section class="relative w-full h-[583px] overflow-hidden bg-gray-900 lg:bg-transparent">
        {{-- Mobile background image --}}
        <div class="absolute inset-0 z-0 bg-cover bg-center lg:hidden"
            style="background-image: url('{{ asset('assets/img/hero/hero_homepage1.png') }}');"></div>
        {{-- Desktop background image --}}
        <div class="absolute inset-0 z-0 bg-cover bg-top hidden lg:block opacity-80"
            style="background-image: url('{{ asset('assets/img/Biru Modern Ucapan Selamat Ulang Tahun Instagram Post (2) 4.png') }}');"></div>
        <div class="max-w-[1280px] mx-auto h-full relative z-10 px-4 lg:px-0 flex flex-col items-center justify-center text-center">
            <div class="max-w-[850px] w-full
                        bg-white/60 backdrop-blur-md rounded-2xl p-6 border border-white/60
                        lg:bg-transparent lg:backdrop-blur-none lg:rounded-none lg:p-0 lg:border-0">
                <h1 class="hero-title text-hex-dark" data-i18n="html"
                    data-en="Ready-to-Use<br /><span class='text-hex-blue'>Digital Products</span>"
                    data-id="Produk Digital<br /><span class='text-hex-blue'>Siap Pakai</span>">
                    Ready-to-Use<br /><span class="text-hex-blue">Digital Products</span>
                </h1>
                <p class="mt-6 text-hex-slate text-lg leading-[1.65] max-w-[600px] mx-auto" data-i18n
                    data-en="Enterprise-grade platforms built to accelerate your business operations from day one."
                    data-id="Platform kelas enterprise yang dibangun untuk mengakselerasi operasional bisnis Anda sejak hari pertama.">
                    Enterprise-grade platforms built to accelerate your business operations from day one.
                </p>
                <a href="{{ route('start-project') }}"
                    class="mt-8 inline-block px-8 py-3 bg-hex-dark rounded-xl font-bold text-base hover:shadow-2xl hover:-translate-y-1 transition-all shadow-xl"
                    style="color: white;"
                    data-i18n data-en="Consult Now" data-id="Konsultasi Sekarang">Consult Now</a>
            </div>
        </div>
    </section>

    {{-- Products Grid --}}
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="text-center mb-16">
                <h2 class="text-[42px] font-bold text-hex-dark mb-4" data-i18n data-en="Our Products" data-id="Produk Kami">Our Products</h2>
                <p class="text-slate-500 max-w-2xl mx-auto text-lg leading-relaxed" data-i18n
                    data-en="Explore our ready-to-use digital products built for modern enterprises."
                    data-id="Jelajahi produk digital siap pakai kami yang dibangun untuk perusahaan modern.">
                    Explore our ready-to-use digital products built for modern enterprises.
                </p>
                <div class="w-20 h-1 bg-hex-blue mx-auto rounded-full mt-6"></div>
            </div>

            @if($products->isEmpty())
                <div class="text-center py-24">
                    <span class="material-symbols-outlined text-5xl text-slate-300 mb-4 block">inventory_2</span>
                    <p class="text-slate-500" data-i18n data-en="No products available yet." data-id="Belum ada produk tersedia.">No products available yet.</p>
                </div>
            @else
                @php
                    $badgeStyles = [
                        'bg-blue-50 text-blue-600',
                        'bg-indigo-50 text-indigo-600',
                        'bg-purple-50 text-purple-600',
                        'bg-teal-50 text-teal-600',
                        'bg-amber-50 text-amber-600',
                        'bg-pink-50 text-pink-600',
                    ];
                @endphp
                <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-8" id="products-grid">
                    @foreach($products as $product)
                    @php $badge = $badgeStyles[$loop->index % count($badgeStyles)]; @endphp
                    <a href="{{ route('products.show', $product) }}"
                        class="pc-card group bg-white rounded-2xl overflow-hidden border border-slate-100 hover:shadow-2xl transition-all duration-500 hover:-translate-y-1 flex flex-col">

                        {{-- Image --}}
                        <div class="h-32 md:h-56 overflow-hidden relative bg-slate-50">
                            @if($product->image_cover)
                                <img src="{{ asset('storage/' . $product->image_cover) }}"
                                    class="w-full h-full object-contain md:object-cover group-hover:scale-105 transition-transform duration-500"
                                    alt="{{ $product->name }}">
                            @else
                                <div class="w-full h-full flex flex-col items-center justify-center gap-2 bg-gradient-to-br from-slate-50 to-blue-50">
                                    <span class="material-symbols-outlined text-3xl md:text-5xl text-slate-300">inventory_2</span>
                                    <span class="text-[9px] md:text-[11px] font-bold uppercase tracking-widest text-slate-400">
                                        {{ $product->tagline ?: $product->name }}
                                    </span>
                                </div>
                            @endif
                        </div>

                        {{-- Body --}}
                        <div class="p-3 md:p-8 flex flex-col grow">
                            @if($product->category)
                                <span class="block max-w-full px-2 py-1 md:px-4 md:py-1.5 rounded-full text-[9px] md:text-[10px] font-bold uppercase tracking-widest mb-2 md:mb-4 truncate {{ $badge }}">{{ $product->category->name }}</span>
                            @elseif($product->tagline)
                                <span class="block max-w-full px-2 py-1 md:px-4 md:py-1.5 rounded-full text-[9px] md:text-[10px] font-bold uppercase tracking-widest mb-2 md:mb-4 truncate {{ $badge }}">
                                    {{ $product->tagline }}
                                </span>
                            @endif
                            <h3 class="text-sm md:text-xl font-bold text-hex-dark mb-2 md:mb-3 line-clamp-1 md:line-clamp-none">{{ $product->name }}</h3>
                            <p class="text-slate-500 text-xs md:text-sm leading-relaxed grow line-clamp-2 md:line-clamp-none">
                                {{ Str::limit(strip_tags($product->description ?? ''), 140) }}
                            </p>
                            <div class="mt-3 md:mt-6 flex items-center gap-1 md:gap-2 text-hex-blue font-bold text-xs md:text-sm group-hover:gap-3 transition-all duration-200">
                                <span data-i18n data-en="Learn more" data-id="Selengkapnya">Learn more</span>
                                <span class="material-symbols-outlined text-xs md:text-base group-hover:translate-x-1 transition-transform duration-200">arrow_right_alt</span>
                            </div>
                        </div>

                    </a>
                    @endforeach
                </div>

                {{-- Mobile Pagination --}}
                <div class="mt-8" id="products-pagination" style="display:none">
                    <div class="flex justify-center items-center gap-1.5">
                        <button type="button" id="pc-pg-prev"
                            class="w-8 h-8 rounded-full border border-slate-200 bg-white flex items-center justify-center text-slate-600 hover:bg-slate-50 transition-colors disabled:opacity-40 shadow-sm font-bold text-xs">&#8592;</button>
                        <div class="flex gap-1.5" id="pc-pg-numbers"></div>
                        <button type="button" id="pc-pg-next"
                            class="w-8 h-8 rounded-full border border-slate-200 bg-white flex items-center justify-center text-slate-600 hover:bg-slate-50 transition-colors disabled:opacity-40 shadow-sm font-bold text-xs">&#8594;</button>
                    </div>
                </div>
            @endif

        </div>
    </section>

    {{-- CTA — same pattern as homepage and services pages --}}
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
$(function () {
    if ($(window).width() >= 768) return;

    var ITEMS = 6;
    var $cards = $('#products-grid .pc-card');
    var total = $cards.length;
    if (total <= ITEMS) return;

    var pages = Math.ceil(total / ITEMS);
    var current = 1;
    var $pagination = $('#products-pagination');
    var $pgNumbers = $('#pc-pg-numbers');
    var $pgPrev = $('#pc-pg-prev');
    var $pgNext = $('#pc-pg-next');

    function renderNumbers() {
        $pgNumbers.empty();

        // Sliding window: show at most 5 page numbers
        var startPage = 1, endPage = pages;
        if (pages > 5) {
            if (current <= 3) {
                startPage = 1; endPage = 5;
            } else if (current >= pages - 2) {
                startPage = pages - 4; endPage = pages;
            } else {
                startPage = current - 2; endPage = current + 2;
            }
        }

        for (var i = startPage; i <= endPage; i++) {
            var $btn = $('<button type="button"></button>')
                .addClass('w-8 h-8 rounded-full border flex items-center justify-center font-bold text-xs shadow-sm transition-all ' +
                    (i === current
                        ? 'bg-[#0F172A] text-white border-[#0F172A]'
                        : 'bg-white text-slate-600 border-slate-200 hover:bg-slate-50'))
                .text(i);
            (function (pg) {
                $btn.on('click', function () { showPage(pg); });
            })(i);
            $pgNumbers.append($btn);
        }
    }

    function showPage(page) {
        current = page;
        $cards.hide();
        $cards.slice((page - 1) * ITEMS, page * ITEMS).show();
        renderNumbers();
        $pgPrev.prop('disabled', current === 1);
        $pgNext.prop('disabled', current === pages);
        $('html, body').animate({ scrollTop: $('#products-grid').offset().top - 80 }, 200);
    }

    $pgPrev.on('click', function () { if (current > 1) showPage(current - 1); });
    $pgNext.on('click', function () { if (current < pages) showPage(current + 1); });

    $pagination.css('display', 'block');
    showPage(1);
});
</script>
@endpush
