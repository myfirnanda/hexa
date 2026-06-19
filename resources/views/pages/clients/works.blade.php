@extends('layouts.main')
@section('title', 'Hexavara - ' . $client->name . ' Works')

@push('styles')
<style>
    .active-filter { background-color: #0F172A !important; color: white !important; }
    #wc-grid img { opacity: 0; transition: opacity 0.35s ease; }
    #wc-grid img.img-loaded { opacity: 1; }
    #wc-grid .card-img-wrap { background: #f1f5f9; }
</style>
@endpush

@section('content')
<main>
    <!-- Breadcrumb + Hero -->
    <section class="relative w-full bg-hex-surface overflow-hidden py-16 lg:py-24">
        <div class="absolute inset-0 z-0 bg-cover bg-top lg:block hidden opacity-60"
            style="background-image: url('{{ asset('assets/img/Biru Modern Ucapan Selamat Ulang Tahun Instagram Post (2) 4.png') }}');"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <!-- Breadcrumb -->
            <nav class="flex items-center gap-2 text-sm text-slate-500 mb-8">
                <a href="{{ route('clients') }}" class="hover:text-blue-600 transition-colors font-medium" data-i18n data-en="Clients" data-id="Klien">Clients</a>
                <span translate="no" class="material-symbols-outlined text-base">chevron_right</span>
                <span class="text-hex-dark font-semibold">{{ $client->name }}</span>
            </nav>

            <div class="flex flex-col lg:flex-row items-start lg:items-center gap-6">
                @if($client->logo)
                    <div class="w-20 h-20 bg-white rounded-2xl shadow-lg flex items-center justify-center p-3 border border-slate-100 shrink-0">
                        <img src="{{ image_url($client->logo) }}" alt="{{ $client->name }}" class="h-full w-auto object-contain">
                    </div>
                @else
                    <div class="w-20 h-20 bg-white rounded-2xl shadow-lg flex items-center justify-center border border-slate-100 shrink-0">
                        <span translate="no" class="material-symbols-outlined text-slate-400 text-4xl">business</span>
                    </div>
                @endif
                <div>
                    <p class="text-blue-600 font-bold text-sm tracking-widest uppercase mb-2" data-i18n data-en="Client Portfolio" data-id="Portofolio Klien">Client Portfolio</p>
                    <h1 class="text-3xl lg:text-5xl font-bold text-hex-dark leading-tight">{{ $client->name }}</h1>
                    <p class="mt-2 text-slate-500 text-lg">
                        {{ $projects->count() }}
                        <span data-i18n data-en="project(s) completed together" data-id="proyek yang diselesaikan bersama">project(s) completed together</span>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Works Grid -->
    <section class="py-24 bg-[#F8FAFC]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($projects->isEmpty())
                <div class="text-center py-24">
                    <span translate="no" class="material-symbols-outlined text-6xl text-slate-300 block mb-4">work_off</span>
                    <p class="text-slate-400 text-lg" data-i18n
                        data-en="No works linked to this client yet."
                        data-id="Belum ada proyek yang dikaitkan dengan klien ini.">
                        No works linked to this client yet.
                    </p>
                    <a href="{{ route('clients') }}"
                        class="mt-6 inline-flex items-center gap-2 text-blue-600 font-bold hover:underline">
                        <span translate="no" class="material-symbols-outlined">arrow_back</span>
                        <span data-i18n data-en="Back to Clients" data-id="Kembali ke Klien">Back to Clients</span>
                    </a>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8" id="wc-grid">
                    @php
                        $categoryMap = [
                            'software-development' => ['en' => 'SOFTWARE DEVELOPMENT', 'id' => 'PENGEMBANGAN SOFTWARE', 'class' => 'bg-blue-50 text-blue-600'],
                            'digital-branding'     => ['en' => 'DIGITAL BRANDING',     'id' => 'BRANDING DIGITAL',      'class' => 'bg-orange-50 text-orange-600'],
                            'startup-incubator'    => ['en' => 'STARTUP INCUBATOR',    'id' => 'INKUBATOR STARTUP',     'class' => 'bg-purple-50 text-purple-600'],
                            'it-consultant'        => ['en' => 'IT CONSULTANT',        'id' => 'KONSULTAN TI',          'class' => 'bg-green-50 text-green-600'],
                        ];
                    @endphp

                    @foreach($projects as $project)
                        @php
                            $cat = $categoryMap[$project->category] ?? ['en' => 'PROJECT', 'id' => 'PROYEK', 'class' => 'bg-slate-50 text-slate-600'];
                            $workUrl = route('clients.works.show', [$client, $project]);
                        @endphp
                        <a href="{{ $workUrl }}"
                            class="group bg-white rounded-2xl overflow-hidden border border-slate-100 hover:shadow-2xl transition-all duration-500 hover:-translate-y-1 flex flex-col">
                            <div class="h-56 overflow-hidden relative card-img-wrap">
                                <img src="{{ image_url($project->image) }}"
                                    alt="{{ $project->name }}"
                                    loading="lazy"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                                    onload="this.classList.add('img-loaded')"
                                    onerror="this.src='{{ asset('assets/img/placeholder.png') }}';this.classList.add('img-loaded')">
                            </div>
                            <div class="p-8 flex-1 flex flex-col">
                                <div class="mb-4">
                                    <span class="inline-block px-4 py-1.5 rounded-full text-[10px] font-bold tracking-widest {{ $cat['class'] }}"
                                        data-i18n data-en="{{ $cat['en'] }}" data-id="{{ $cat['id'] }}">{{ $cat['en'] }}</span>
                                </div>
                                <h3 class="text-xl font-bold text-hex-dark mb-4 line-clamp-2">{{ $project->name }}</h3>
                                @if($project->summary_title)
                                    <p class="text-slate-500 text-sm leading-relaxed line-clamp-3 mb-6">{{ $project->summary_title }}</p>
                                @endif
                                <div class="mt-auto flex items-center gap-2 text-hex-blue font-bold text-sm">
                                    <span data-i18n data-en="Read More" data-id="Selengkapnya">Read More</span>
                                    <span translate="no" class="material-symbols-outlined text-sm translate-y-px">arrow_forward</span>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    <!-- CTA Section -->
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
