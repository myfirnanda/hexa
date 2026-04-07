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
        <section class="relative w-full h-[583px] overflow-hidden bg-hex-surface lg:bg-transparent">
            <div class="absolute inset-0 z-0 bg-cover bg-top lg:block hidden opacity-80" style="background-image: url('{{ asset('assets/img/Biru Modern Ucapan Selamat Ulang Tahun Instagram Post (2) 4.png') }}');"></div>
            <div class="max-w-[1280px] mx-auto h-full relative z-10 px-4 lg:px-0 flex flex-col items-center justify-center text-center pt-8 lg:pt-0">
                <div class="max-w-[850px] relative z-20 px-4 transform lg:-translate-y-8">
                    <h1 class="hero-title text-hex-dark mb-6">{{ $product->name }}</h1>
                    @if($product->description)
                        <p class="text-hex-slate text-lg leading-[1.65] max-w-[750px] mx-auto">{{ $product->description }}</p>
                    @endif
                    <a href="{{ route('start-project') }}" class="mt-10 inline-block px-8 py-3 bg-hex-dark text-white rounded-xl font-bold text-base hover:shadow-2xl hover:-translate-y-1 transition-all shadow-xl" data-i18n data-en="Request Demo" data-id="Minta Demo">Request Demo</a>
                </div>
            </div>
        </section>

        <!-- Preview Gallery -->
        @if($galleryImages->count() > 0)
            <section class="py-24 bg-white">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center mb-16">
                        <h2 class="text-3xl lg:text-[42px] font-bold text-hex-dark mb-4 leading-tight" data-i18n data-en="Preview Product" data-id="Pratinjau Produk">Preview Product</h2>
                        <p class="text-slate-500 max-w-2xl mx-auto text-lg leading-relaxed" data-i18n data-en="Get an overview of the various product documentation." data-id="Dapatkan gambaran umum tentang berbagai dokumentasi produk.">Get an overview of the various product documentation.</p>
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
                                    <img src="{{ $imgUrl }}"
                                        alt="{{ $index === 0 ? 'Cover' : 'Preview ' . $index }}"
                                        class="w-[120px] h-[80px] lg:w-full lg:h-[100px] object-cover">
                                    @if($index === 0)
                                        <span class="absolute bottom-1 left-1 bg-blue-500 text-white text-[9px] font-bold px-1.5 py-0.5 rounded-md leading-none uppercase tracking-wide">Cover</span>
                                    @endif
                                </button>
                            @endforeach
                        </div>

                        <!-- Main Image -->
                        <div class="flex-1 min-w-0 bg-[#F8FAFF] rounded-[32px] p-4 shadow-xl border border-slate-100 flex items-start justify-center">
                            <img id="preview-main-image"
                                src="{{ $galleryImages->first() }}"
                                alt="{{ $product->name }} preview"
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
                        <span class="text-hex-blue font-bold uppercase tracking-[0.2em] text-sm mb-4 block" data-i18n data-en="CORE CAPABILITIES" data-id="KEMAMPUAN UTAMA">CORE CAPABILITIES</span>
                        <h2 class="text-3xl lg:text-[42px] font-bold text-hex-dark mb-4 leading-tight" data-i18n data-en="Key Features" data-id="Fitur Utama">Key Features</h2>
                        <p class="text-slate-500 max-w-2xl mx-auto text-lg leading-relaxed" data-i18n data-en="Powerful tools built into a seamless workflow to transform how you manage your business." data-id="Alat bantu kuat yang dibangun dalam alur kerja mulus untuk mengubah cara Anda mengelola bisnis.">Powerful tools built into a seamless workflow to transform how you manage your business.</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach($product->features as $feature)
                            <div class="group bg-white rounded-[40px] p-10 border border-slate-100 hover:shadow-2xl transition-all duration-300">
                                @if($feature->icon)
                                    <div class="w-14 h-14 rounded-2xl bg-hex-surface flex items-center justify-center mb-8 group-hover:bg-hex-dark group-hover:text-white transition-colors">
                                        <span class="material-symbols-outlined text-3xl">{{ $feature->icon }}</span>
                                    </div>
                                @endif
                                <h3 class="text-2xl font-bold text-hex-dark mb-4">{{ $feature->title }}</h3>
                                @if($feature->items->count() > 0)
                                    <ul class="text-hex-slate text-base leading-relaxed space-y-2">
                                        @foreach($feature->items as $item)
                                            <li class="flex items-start gap-3">
                                                <span class="material-symbols-outlined text-hex-blue text-sm mt-1">circle</span>
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
                        <span class="text-blue-400 font-bold uppercase tracking-[0.2em] text-sm mb-4 block" data-i18n data-en="CORE BENEFITS" data-id="MANFAAT UTAMA">CORE BENEFITS</span>
                        <h2 class="text-[42px] font-bold" data-i18n data-en="Why Choose Our Platform?" data-id="Mengapa Memilih Platform Kami?">Why Choose Our Platform?</h2>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-{{ min($product->benefits->count(), 4) }} gap-8">
                        @foreach($product->benefits as $benefit)
                            <div class="flex flex-col items-center text-center">
                                @if($benefit->icon)
                                    <div class="w-14 h-14 rounded-full bg-blue-600/20 border border-blue-500/30 flex items-center justify-center mb-6">
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
        <section class="pt-0 pb-0 bg-white overflow-hidden">
            <div class="max-w-7xl mx-auto px-10 sm:px-20 lg:px-32">
                <div class="grid grid-cols-1 md:grid-cols-[auto_1fr] gap-16 items-end md:-ml-12">
                    <!-- Left: Talent Image -->
                    <div class="relative order-2 md:order-1 flex justify-start items-end">
                        <img src="{{ asset('assets/img/talent.png') }}" alt="IT Consultant Talent" class="w-full h-auto object-contain max-h-[500px] transform translate-y-2">
                    </div>

                    <!-- Right: Content -->
                    <div class="order-1 md:order-2">
                        @include('partials.solution')
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@push('styles')
    <style>
        .thumb-scroll-y::-webkit-scrollbar { width: 4px; }
        .thumb-scroll-y::-webkit-scrollbar-track { background: transparent; }
        .thumb-scroll-y::-webkit-scrollbar-thumb { background: #CBD5E1; border-radius: 9999px; }
        .thumb-scroll-y::-webkit-scrollbar-thumb:hover { background: #94A3B8; }
        .thumb-scroll-x::-webkit-scrollbar { height: 4px; }
        .thumb-scroll-x::-webkit-scrollbar-track { background: transparent; }
        .thumb-scroll-x::-webkit-scrollbar-thumb { background: #CBD5E1; border-radius: 9999px; }
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
