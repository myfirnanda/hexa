@extends('layouts.main')
@section('title', 'Hexavara - ' . $product->name)

@php
    // Resolve cover image URL
    $coverUrl = image_url($product->image_cover);

    // Collect all gallery images (cover + product images)
    $galleryImages = collect();
    if ($product->image_cover) {
        $galleryImages->push($coverUrl);
    }
    foreach ($product->images as $img) {
        $galleryImages->push(image_url($img->image_path));
    }
    if ($galleryImages->isEmpty()) {
        $galleryImages->push(asset('assets/img/placeholder.png'));
    }
@endphp

@section('content')
    <main>
        <!-- Hero Section -->
        <section class="relative w-full h-[583px] overflow-hidden bg-gray-900 lg:bg-transparent">
            {{-- Mobile background --}}
            <div class="absolute inset-0 z-0 bg-cover bg-center lg:hidden"
                style="background-image: url(/assets/img/hero/hero_homepage1.png);"></div>
            {{-- Desktop background --}}
            <div class="absolute inset-0 z-0 bg-cover bg-top hidden lg:block opacity-80"
                style="background-image: url('{{ asset('assets/img/Biru Modern Ucapan Selamat Ulang Tahun Instagram Post (2) 4.png') }}');">
            </div>
            <div
                class="max-w-[1280px] mx-auto h-full relative z-10 px-4 lg:px-0 flex flex-col items-center justify-center text-center pt-8 lg:pt-0">
                <div class="max-w-[850px] w-full relative z-20 lg:px-4 lg:transform lg:-translate-y-8
                                        bg-white/60 backdrop-blur-md rounded-2xl p-6 border border-white/60
                                        lg:bg-transparent lg:backdrop-blur-none lg:rounded-none lg:p-4 lg:border-0">
                    <h1 class="hero-title text-hex-dark mb-6">{{ $product->name }}</h1>
                    @if($product->description)
                        <p class="text-hex-slate text-lg leading-[1.65] max-w-[750px] mx-auto">{{ $product->description }}</p>
                    @endif
                    <div class="mt-10 flex items-center justify-center gap-3">
                        <a href="{{ route('start-project') }}"
                            class="inline-block px-4 lg:px-8 py-2.5 lg:py-3 bg-hex-dark rounded-xl font-bold text-sm lg:text-base hover:shadow-2xl hover:-translate-y-1 transition-all shadow-xl"
                            style="color: white;" data-i18n data-en="Consult Now" data-id="Konsultasi
                                    Sekarang">Consult Now</a>
                        @if($product->website_url)
                            <a href="{{ $product->website_url }}" target="_blank" rel="noopener noreferrer"
                                class="inline-flex items-center gap-1.5 px-4 lg:px-8 py-2.5 lg:py-3 bg-hex-dark rounded-xl font-bold text-sm lg:text-base hover:shadow-2xl hover:-translate-y-1 transition-all shadow-xl"
                                style="color: white;" data-i18n="html"
                                data-en="<span class='material-symbols-outlined' style='font-size:15px;vertical-align:middle;'>open_in_new</span> Visit Website"
                                data-id="<span class='material-symbols-outlined' style='font-size:15px;vertical-align:middle;'>open_in_new</span> Kunjungi Website">
                                <span class="material-symbols-outlined text-[15px] lg:text-[18px]">open_in_new</span>
                                Visit Website
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </section>

        <!-- Preview Gallery -->
        @if($galleryImages->count() > 0)
            <section class="py-24 bg-white">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center mb-16">
                        <h2 class="text-3xl lg:text-[42px] font-bold text-hex-dark mb-4 leading-tight" data-i18n
                            data-en="Preview Product" data-id="Pratinjau Produk">Preview Product</h2>
                        <p class="text-slate-500 max-w-2xl mx-auto text-lg leading-relaxed" data-i18n
                            data-en="Get an overview of the various product documentation."
                            data-id="Dapatkan gambaran umum tentang berbagai dokumentasi produk.">Get an overview of the various
                            product documentation.</p>
                    </div>

                    <div class="flex flex-col lg:flex-row gap-6 lg:gap-10 items-start">
                        <!-- Thumbs -->
                        <div class="flex lg:flex-col flex-row gap-3
                                                    overflow-x-auto lg:overflow-x-hidden
                                                    overflow-y-hidden lg:overflow-y-auto
                                                    lg:max-h-[640px]
                                                    pb-2 lg:pb-0 pr-0 lg:pr-2
                                                    w-full lg:w-[160px] shrink-0
                                                    thumb-scroll-x lg:thumb-scroll-y">
                            @foreach($galleryImages as $index => $imgUrl)
                                <button
                                    class="preview-thumb group relative flex-shrink-0 rounded-2xl overflow-hidden border-2 transition-all duration-200
                                                                            {{ $index === 0 ? 'border-blue-500 ring-2 ring-blue-400 ring-offset-1 opacity-100' : 'border-transparent opacity-55 hover:opacity-100 hover:border-slate-300' }}"
                                    data-image="{{ $imgUrl }}"
                                    title="{{ $index === 0 ? $product->name . ' — Cover' : 'Preview ' . $index }}">
                                    <img src="{{ $imgUrl }}" alt="{{ $index === 0 ? 'Cover' : 'Preview ' . $index }}"
                                        class="w-[120px] h-[80px] lg:w-full lg:h-[100px] object-cover">
                                    @if($index === 0)
                                        <span
                                            class="absolute bottom-1 left-1 bg-blue-500 text-white text-[9px] font-bold px-1.5 py-0.5 rounded-md leading-none uppercase tracking-wide">Cover</span>
                                    @endif
                                </button>
                            @endforeach
                        </div>

                        <!-- Main Image -->
                        <div
                            class="flex-1 min-w-0 bg-[#F8FAFF] rounded-[32px] p-4 shadow-xl border border-slate-100 flex items-start justify-center">
                            <img id="preview-main-image" src="{{ $galleryImages->first() }}" alt="{{ $product->name }} preview"
                                class="w-full h-auto max-h-[640px] object-contain rounded-2xl transition-opacity duration-300 ease-in-out">
                        </div>
                    </div>
                </div>
            </section>
        @endif

        <!-- Key Features -->
        @if($product->features->count() > 0)
            <section class="py-24 bg-white border-t border-slate-100">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center mb-16">
                        <span class="text-hex-blue font-bold uppercase tracking-[0.2em] text-sm mb-4 block" data-i18n
                            data-en="CORE CAPABILITIES" data-id="KEMAMPUAN UTAMA">CORE CAPABILITIES</span>
                        <h2 class="text-3xl lg:text-[42px] font-bold text-hex-dark mb-4 leading-tight" data-i18n
                            data-en="Key Features" data-id="Fitur Utama">Key Features</h2>
                        <!-- <p class="text-slate-500 max-w-2xl mx-auto text-lg leading-relaxed" data-i18n data-en="Powerful tools built into a seamless workflow to transform how you manage your business." data-id="Alat bantu kuat yang dibangun dalam alur kerja mulus untuk mengubah cara Anda mengelola bisnis.">Powerful tools built into a seamless workflow to transform how you manage your business.</p> -->
                    </div>

                    <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-8">
                        @foreach($product->features as $feature)
                            <div
                                class="group bg-white rounded-2xl md:rounded-[40px] p-4 md:p-10 border border-slate-100 hover:shadow-2xl transition-all duration-300">
                                @if($feature->icon)
                                    <div
                                        class="w-10 h-10 md:w-14 md:h-14 rounded-xl md:rounded-2xl bg-hex-surface flex items-center justify-center mb-4 md:mb-8 group-hover:bg-hex-dark group-hover:text-white transition-colors">
                                        <span class="material-symbols-outlined text-xl md:text-3xl">{{ $feature->icon }}</span>
                                    </div>
                                @endif
                                <h3 class="text-sm md:text-2xl font-bold text-hex-dark mb-2 md:mb-4">{{ $feature->title }}</h3>
                                @if($feature->items->count() > 0)
                                    <ul class="text-hex-slate text-xs md:text-base leading-relaxed space-y-1 md:space-y-2">
                                        @foreach($feature->items as $item)
                                            <li class="flex items-start gap-2 md:gap-3">
                                                <span
                                                    class="material-symbols-outlined text-hex-blue text-xs md:text-sm mt-0.5 md:mt-1">circle</span>
                                                {{ $item->text }}
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        <!-- Core Benefits -->
        @if($product->benefits->count() > 0)
            <section class="py-24 bg-hex-surface-dark text-white overflow-hidden relative">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                    <div class="text-center mb-16">
                        <span class="text-blue-400 font-bold uppercase tracking-[0.2em] text-sm mb-4 block" data-i18n
                            data-en="CORE BENEFITS" data-id="MANFAAT UTAMA">CORE BENEFITS</span>
                        <h2 class="text-[42px] font-bold" data-i18n data-en="Why Choose Our Platform?"
                            data-id="Mengapa Memilih Platform Kami?">Why Choose Our Platform?</h2>
                    </div>

                    <div class="grid grid-cols-2 gap-6 md:gap-8 lg:grid-cols-{{ min($product->benefits->count(), 4) }}">
                        @foreach($product->benefits as $benefit)
                            <div class="flex flex-col items-center text-center">
                                @if($benefit->icon)
                                    <div
                                        class="w-14 h-14 rounded-full bg-blue-600/20 border border-blue-500/30 flex items-center justify-center mb-6">
                                        <span class="material-symbols-outlined text-blue-400 text-2xl">{{ $benefit->icon }}</span>
                                    </div>
                                @endif
                                <h4 class="text-lg font-bold leading-snug">{{ $benefit->title }}</h4>
                            </div>
                        @endforeach
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
                        <div class="flex-shrink-0 w-[48%]">
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

@push('styles')
    <style>
        .thumb-scroll-y::-webkit-scrollbar {
            width: 4px;
        }

        .thumb-scroll-y::-webkit-scrollbar-track {
            background: transparent;
        }

        .thumb-scroll-y::-webkit-scrollbar-thumb {
            background: #CBD5E1;
            border-radius: 9999px;
        }

        .thumb-scroll-y::-webkit-scrollbar-thumb:hover {
            background: #94A3B8;
        }

        .thumb-scroll-x::-webkit-scrollbar {
            height: 4px;
        }

        .thumb-scroll-x::-webkit-scrollbar-track {
            background: transparent;
        }

        .thumb-scroll-x::-webkit-scrollbar-thumb {
            background: #CBD5E1;
            border-radius: 9999px;
        }
    </style>
@endpush

@push('scripts')
    <script>
        $(function () {
            var $thumbs = $('.preview-thumb');
            var $mainImage = $('#preview-main-image');

            if ($thumbs.length && $mainImage.length) {
                $thumbs.on('click', function () {
                    var $thumb = $(this);

                    $thumbs
                        .removeClass('border-blue-500 ring-2 ring-blue-400 ring-offset-1 opacity-100')
                        .addClass('border-transparent opacity-55');

                    $thumb
                        .removeClass('border-transparent opacity-55')
                        .addClass('border-blue-500 ring-2 ring-blue-400 ring-offset-1 opacity-100');

                    $mainImage.css('opacity', '0');
                    setTimeout(function () {
                        $mainImage.attr('src', $thumb.data('image')).css({
                            'opacity': '1',
                            'transition': 'opacity 0.3s ease'
                        });
                    }, 200);
                });
            }
        });
    </script>
@endpush