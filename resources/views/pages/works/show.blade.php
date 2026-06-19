@extends('layouts.main')
@section('title', 'Hexavara - ' . $project->name)

@php
    $categoryMap = [
        'software-development' => ['en' => 'Software Development', 'id' => 'Pengembangan Perangkat Lunak', 'class' => 'bg-blue-100 text-blue-600'],
        'digital-branding' => ['en' => 'Digital Branding', 'id' => 'Branding Digital', 'class' => 'bg-orange-100 text-orange-600'],
        'startup-incubator' => ['en' => 'Startup Incubator', 'id' => 'Inkubator Startup', 'class' => 'bg-purple-100 text-purple-600'],
        'it-consultant' => ['en' => 'IT Consultant', 'id' => 'Konsultan TI', 'class' => 'bg-green-100 text-green-600'],
    ];
    $cat = $categoryMap[$project->category] ?? ['en' => 'Project', 'id' => 'Proyek', 'class' => 'bg-slate-100 text-slate-600'];

    // Resolve cover image URL using image_url helper (storage -> public fallback)
    $coverUrl = image_url($project->image);

    // Collect all gallery images (cover + projectImages relation)
    $galleryImages = collect();
    if ($project->image) {
        $galleryImages->push($coverUrl);
    }
    foreach ($project->projectImages as $img) {
        $galleryImages->push(image_url($img->image));
    }
    if ($galleryImages->isEmpty()) {
        $galleryImages->push(asset('assets/img/placeholder.png'));
    }
@endphp

@section('content')

    <!-- Hero Section -->
    <section class="relative w-full md:h-[583px] overflow-hidden bg-hex-surface lg:bg-transparent">
        <div class="absolute inset-0 z-0 bg-cover bg-top lg:block hidden opacity-80"
            style="background-image: url('{{ asset('assets/img/Biru Modern Ucapan Selamat Ulang Tahun Instagram Post (2) 4.png') }}');">
        </div>
        <div
            class="max-w-[1280px] mx-auto md:h-full relative z-10 px-4 lg:px-0 flex flex-col items-center justify-center text-center py-16 md:py-0 lg:pt-0">
            <div class="max-w-[850px] relative z-20 px-4 transform lg:-translate-y-8">
                <div class="flex justify-center">
                    <span
                        class="inline-flex items-center font-bold {{ $cat['class'] }} rounded-full px-4 py-1 mb-6 text-sm uppercase tracking-widest"
                        data-i18n data-en="{{ $cat['en'] }}" data-id="{{ $cat['id'] }}">{{ $cat['en'] }}</span>
                </div>
                <h1 class="hero-title text-hex-dark mb-6">{{ $project->name }}</h1>
                @if($project->hero_description)
                    <p class="text-hex-slate text-lg leading-[1.65] max-w-[750px] mx-auto">{{ $project->hero_description }}</p>
                @endif
                <a href="{{ route('start-project') }}"
                    class="mt-10 inline-block px-8 py-3 bg-hex-dark rounded-xl font-bold text-white text-[1rem] hover:shadow-2xl hover:-translate-y-1 transition-all shadow-xl"
                    data-i18n data-en="Consult Now" data-id="Konsultasi Sekarang">Consult Now</a>
            </div>
        </div>
    </section>

    <!-- Preview Gallery -->
    @if($galleryImages->count() > 0)
        <section class="py-10 md:py-24 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-8 md:mb-16">
                    <h2 class="text-2xl md:text-[42px] font-bold text-hex-dark mb-3 leading-tight" data-i18n
                        data-en="Preview Project" data-id="Pratinjau Proyek">Preview Project</h2>
                    <p class="text-slate-500 max-w-2xl mx-auto text-sm md:text-lg" data-i18n
                        data-en="Get an overview of the various project documentation."
                        data-id="Dapatkan gambaran umum tentang berbagai dokumentasi proyek.">Get an overview of the various
                        project documentation.</p>
                </div>

                <div class="flex flex-col lg:flex-row gap-6 lg:gap-10 items-start">

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
                                title="{{ $index === 0 ? $project->name . ' — Cover' : 'Preview ' . $index }}">
                                <img src="{{ $imgUrl }}" alt="{{ $index === 0 ? 'Cover' : 'Preview ' . $index }}"
                                    class="w-[120px] h-[80px] lg:w-full lg:h-[100px] object-cover">
                                @if($index === 0)
                                    <span
                                        class="absolute bottom-1 left-1 bg-blue-500 text-white text-[9px] font-bold px-1.5 py-0.5 rounded-md leading-none uppercase tracking-wide"
                                        data-i18n data-en="Cover" data-id="Cover">Cover</span>
                                @endif
                            </button>
                        @endforeach
                    </div>

                    <!-- Right: Main Image Display -->
                    <div
                        class="flex-1 min-w-0 bg-[#F8FAFF] rounded-[32px] p-4 shadow-xl border border-slate-100 flex items-start justify-center">
                        <img id="preview-main-image" src="{{ $galleryImages->first() }}" alt="{{ $project->name }} preview"
                            class="w-full h-auto max-h-[280px] md:max-h-[640px] object-contain rounded-2xl transition-opacity duration-300 ease-in-out">
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- Summary Section -->
    @if($project->description || $project->summary_title)
        <section class="py-10 md:py-24 bg-hex-surface">
            <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
                @if($project->summary_title)
                    <div class="flex flex-col gap-2 mb-5 md:mb-8">
                        <span class="text-blue-600 font-bold text-sm tracking-widest uppercase" data-i18n data-en="SUMMARY"
                            data-id="RINGKASAN">SUMMARY</span>
                        <h2 class="text-3xl lg:text-4xl font-bold text-hex-dark">{{ $project->summary_title }}</h2>
                    </div>
                @endif
                @if($project->description)
                    <div class="prose prose-lg max-w-none text-hex-slate leading-relaxed mb-6">
                        {!! $project->description !!}
                    </div>
                @endif

                @if($project->client)
                    <div class="pt-6 border-t border-slate-200">
                        <a href="{{ route('clients.works', $project->client) }}"
                            class="group flex items-center justify-between gap-6 bg-slate-50 hover:bg-blue-50 border border-slate-200 hover:border-blue-200 rounded-2xl px-7 py-5 transition-all duration-300">
                            <div class="flex items-center gap-5 min-w-0">
                                <span class="text-[10px] font-bold tracking-widest uppercase text-slate-400 shrink-0" data-i18n
                                    data-en="CLIENT" data-id="KLIEN">CLIENT</span>
                                <span class="w-px h-7 bg-slate-200 shrink-0"></span>
                                @if($project->client->logo)
                                    <img src="{{ image_url($project->client->logo) }}" alt="{{ $project->client->name }}"
                                        class="h-7 w-20 object-contain shrink-0">
                                @else
                                    <span translate="no" class="material-symbols-outlined text-slate-400 text-xl shrink-0">business</span>
                                @endif
                                <p class="font-bold text-hex-dark group-hover:text-blue-600 transition-colors text-sm truncate">
                                    {{ $project->client->name }}</p>
                            </div>
                            <div class="flex items-center gap-1.5 text-blue-600 text-xs font-semibold shrink-0">
                                <span data-i18n data-en="See all projects" data-id="Lihat semua proyek">See all projects</span>
                                <span translate="no"
                                    class="material-symbols-outlined text-sm group-hover:translate-x-1 transition-transform duration-200">arrow_forward</span>
                            </div>
                        </a>
                    </div>
                @endif
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
                        <img src="{{ asset('assets/img/talent.png') }}" alt="IT Consultant" class="w-full object-contain">
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

            <!-- Desktop Layout -->
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
@endsection

@push('styles')
    <style>
        /* Vertical thumb strip scrollbar (desktop) */
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

        /* Horizontal strip scrollbar (mobile) */
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

            $thumbs.on('click', function () {
                var $thumb = $(this);

                // reset all
                $thumbs
                    .removeClass('border-blue-500 ring-2 ring-blue-400 ring-offset-1 opacity-100')
                    .addClass('border-transparent opacity-55');

                // activate clicked
                $thumb
                    .removeClass('border-transparent opacity-55')
                    .addClass('border-blue-500 ring-2 ring-blue-400 ring-offset-1 opacity-100');

                // swap main image with fade
                $mainImage.css('opacity', '0');
                setTimeout(function () {
                    $mainImage.attr('src', $thumb.data('image')).css({
                        'opacity': '1',
                        'transition': 'opacity 0.3s ease'
                    });
                }, 180);
            });
        });
    </script>
@endpush