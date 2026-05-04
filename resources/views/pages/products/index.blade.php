@extends('layouts.main')
@section('title', 'Products — Hexavara')

@section('content')
<main>

    {{-- Hero — same pattern as services, about, works pages --}}
    <section class="relative w-full h-[583px] overflow-hidden bg-hex-surface lg:bg-transparent">
        <div class="absolute inset-0 z-0 bg-cover bg-top lg:block hidden opacity-80"
            style="background-image: url('{{ asset('assets/img/Biru Modern Ucapan Selamat Ulang Tahun Instagram Post (2) 4.png') }}');"></div>
        <div class="max-w-[1280px] mx-auto h-full relative z-10 px-4 lg:px-0 flex flex-col items-center justify-center text-center">
            <div class="max-w-[850px]">
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
                    class="mt-8 inline-block px-8 py-3 bg-hex-dark text-white rounded-xl font-bold text-base hover:shadow-2xl hover:-translate-y-1 transition-all shadow-xl"
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
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($products as $product)
                    @php $badge = $badgeStyles[$loop->index % count($badgeStyles)]; @endphp
                    <a href="{{ route('products.show', $product) }}"
                        class="group bg-white rounded-2xl overflow-hidden border border-slate-100 hover:shadow-2xl transition-all duration-500 hover:-translate-y-1 flex flex-col">

                        {{-- Image — fixed h-56 so layout never breaks --}}
                        <div class="h-56 overflow-hidden relative">
                            @if($product->image_cover)
                                <img src="{{ asset('storage/' . $product->image_cover) }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                    alt="{{ $product->name }}">
                            @else
                                <div class="w-full h-full flex flex-col items-center justify-center gap-3 bg-gradient-to-br from-slate-50 to-blue-50">
                                    <span class="material-symbols-outlined text-5xl text-slate-300">inventory_2</span>
                                    <span class="text-[11px] font-bold uppercase tracking-widest text-slate-400">
                                        {{ $product->tagline ?: $product->name }}
                                    </span>
                                </div>
                            @endif
                        </div>

                        {{-- Body --}}
                        <div class="p-8 flex flex-col grow">
                            @if($product->tagline)
                                <span class="inline-block w-fit px-4 py-1.5 rounded-full text-[10px] font-bold uppercase tracking-widest mb-4 {{ $badge }}">
                                    {{ $product->tagline }}
                                </span>
                            @endif
                            <h3 class="text-xl font-bold text-hex-dark mb-3">{{ $product->name }}</h3>
                            <p class="text-slate-500 text-sm leading-relaxed grow">
                                {{ Str::limit(strip_tags($product->description ?? ''), 140) }}
                            </p>
                            <div class="mt-6 flex items-center gap-2 text-hex-blue font-bold text-sm group-hover:gap-3 transition-all duration-200">
                                <span data-i18n data-en="Learn more" data-id="Selengkapnya">Learn more</span>
                                <span class="material-symbols-outlined text-base group-hover:translate-x-1 transition-transform duration-200">arrow_right_alt</span>
                            </div>
                        </div>

                    </a>
                    @endforeach
                </div>
            @endif

        </div>
    </section>

    {{-- CTA — same pattern as homepage and services pages --}}
    <section class="pt-0 pb-0 bg-white overflow-hidden">
        <div class="max-w-7xl mx-auto px-10 sm:px-20 lg:px-32">
            <div class="grid grid-cols-1 md:grid-cols-[auto_1fr] gap-16 items-end md:-ml-12">
                <div class="relative order-2 md:order-1 flex justify-start items-end">
                    <img src="{{ asset('assets/img/talent.png') }}" alt="IT Consultant Talent"
                        class="block w-full h-auto object-contain max-h-[500px] align-bottom">
                </div>
                <div class="order-1 md:order-2 self-center max-w-2xl">
                    @include('partials.solution')
                </div>
            </div>
        </div>
    </section>

</main>
@endsection
