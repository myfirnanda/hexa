@extends('layouts.main')
@section('title', 'Hexavara - Clients')

@push('styles')
<style>
    .active-filter { background-color: #0F172A !important; color: white !important; }
    .btn-active { background-color: #0F172A !important; color: white !important; border-color: #0F172A !important; }
    .category-card { display: none; }
    .category-grid.all-view .category-card { display: block; }
    .category-grid.single-view .category-card { display: block; padding-top: 2rem; }
</style>
@endpush

@section('content')
    <!-- Hero Section -->
    <section class="relative w-full h-[583px] overflow-hidden bg-hex-surface lg:bg-transparent">
        <div class="absolute inset-0 z-0 bg-cover bg-top lg:block hidden opacity-80" style="background-image: url('{{ asset('assets/img/Biru Modern Ucapan Selamat Ulang Tahun Instagram Post (2) 4.png') }}');"></div>
        <div class="max-w-[1280px] mx-auto h-full relative z-10 px-4 lg:px-0">
            <div class="lg:absolute lg:left-[58px] lg:top-1/2 lg:-translate-y-1/2 max-w-[763px] pt-12 lg:pt-0">
                <h1 class="hero-title text-hex-dark" data-i18n="html" data-en="Our <span class='text-hex-blue'>Clients</span>" data-id="Klien <span class='text-hex-blue'>Kami</span>">Our <span class="text-hex-blue">Clients</span></h1>
                <p class="mt-6 text-hex-slate text-lg leading-[1.65] max-w-[505px]" data-i18n data-en="We deliver on our customers' expectations by providing them with powerful ERP solutions that are focused on pricing, inventory optimization, and uptime management." data-id="Kami memenuhi ekspektasi klien melalui solusi ERP yang andal, berfokus pada penetapan harga, optimasi persediaan, dan kestabilan operasional.">We deliver on our customers' expectations by providing them with powerful ERP solutions that are focused on pricing, inventory optimization, and uptime management.</p>
            </div>
            <img src="{{ asset('assets/img/hero/hero_clients.png') }}" alt="" class="hidden lg:block absolute right-[-85px] top-0 h-[583px] object-contain">
        </div>
    </section>

    <!-- Clients Section -->
    <section class="py-24 bg-slate-50" id="clients-section">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center mb-16">
            <div class="text-blue-600 font-bold text-sm tracking-[0.2em] uppercase mb-4" data-i18n data-en="CATEGORIZED COMPANIES/INSTITUTIONS" data-id="KATEGORI PERUSAHAAN/INSTANSI">CATEGORIZED COMPANIES/INSTITUTIONS</div>
            <h2 class="section-title text-[42px] font-bold text-slate-900 mb-6" data-i18n data-en="Trusted Across Sectors" data-id="Dipercaya di Berbagai Sektor">Trusted Across Sectors</h2>
            <p class="section-description text-lg text-slate-600 max-w-2xl mx-auto" data-i18n data-en="Hexavara works with universities, public institutions, enterprises, finance, manufacturing, and lifestyle brands across Indonesia." data-id="Hexavara bekerja sama dengan universitas, instansi publik, perusahaan, keuangan, manufaktur, dan merek gaya hidup di seluruh Indonesia.">
                Hexavara works with universities, public institutions, enterprises,
                finance, manufacturing, and lifestyle brands across Indonesia.
            </p>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Category Chips -->
            <div class="flex justify-center mb-12">
                <div class="inline-flex flex-wrap justify-center bg-slate-100 p-1.5 rounded-3xl lg:rounded-full gap-1 shadow-inner max-w-full">
                    <button type="button" class="category-chip active-filter px-6 py-2.5 rounded-full font-medium transition-all text-sm whitespace-nowrap" data-filter="all" data-i18n data-en="All" data-id="Semua">All</button>
                    <button type="button" class="category-chip px-6 py-2.5 rounded-full text-slate-500 font-medium hover:text-[#0F172A] transition-all text-sm whitespace-nowrap" data-filter="education" data-i18n data-en="Education & Academia" data-id="Pendidikan & Akademik">Education & Academia</button>
                    <button type="button" class="category-chip px-6 py-2.5 rounded-full text-slate-500 font-medium hover:text-[#0F172A] transition-all text-sm whitespace-nowrap" data-filter="government" data-i18n data-en="Government & Public Sector" data-id="Pemerintah & Sektor Publik">Government & Public Sector</button>
                    <button type="button" class="category-chip px-6 py-2.5 rounded-full text-slate-500 font-medium hover:text-[#0F172A] transition-all text-sm whitespace-nowrap" data-filter="soe" data-i18n data-en="SOE & Energy" data-id="BUMN & Energi">SOE & Energy</button>
                    <button type="button" class="category-chip px-6 py-2.5 rounded-full text-slate-500 font-medium hover:text-[#0F172A] transition-all text-sm whitespace-nowrap" data-filter="finance" data-i18n data-en="Banking & Finance" data-id="Perbankan & Keuangan">Banking & Finance</button>
                    <button type="button" class="category-chip px-6 py-2.5 rounded-full text-slate-500 font-medium hover:text-[#0F172A] transition-all text-sm whitespace-nowrap" data-filter="industrial" data-i18n data-en="Industrial & FMCG" data-id="Industri & FMCG">Industrial & FMCG</button>
                    <button type="button" class="category-chip px-6 py-2.5 rounded-full text-slate-500 font-medium hover:text-[#0F172A] transition-all text-sm whitespace-nowrap" data-filter="retail" data-i18n data-en="Retail & Lifestyle" data-id="Ritel & Gaya Hidup">Retail & Lifestyle</button>
                </div>
            </div>

            <div class="category-grid all-view space-y-16" id="category-grid">

                @foreach($categories as $catKey => $catLabel)
                    @php $catClients = $clients->where('category', $catKey); @endphp
                @if($catClients->isNotEmpty())
                <section class="category-card scroll-mt-32" data-category="{{ $catKey }}">
                  <div class="category-card-header mb-8 pb-4 border-b-2 border-slate-100">
                    <h3 class="text-2xl font-bold text-slate-800 border-l-4 border-blue-500 pl-4">{{ $catLabel }}</h3>
                  </div>
                  <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-6">
                    @foreach($catClients as $client)
                    <article class="client-item group bg-white p-6 rounded-2xl border border-slate-200/60 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col items-center justify-center text-center gap-4">
                        @if($client->logo)
                        <img src="{{ Storage::url($client->logo) }}" alt="{{ $client->name }}" class="h-16 w-auto object-contain transition-all duration-300" />
                        @else
                        <div class="h-16 w-16 rounded-xl bg-slate-100 flex items-center justify-center">
                            <span class="material-symbols-outlined text-slate-400 text-2xl">business</span>
                        </div>
                        @endif
                        <div class="w-full border-t border-slate-100 pt-3 mt-auto">
                            <strong class="text-xs text-slate-600 group-hover:text-blue-600 transition-colors line-clamp-2">{{ $client->name }}</strong>
                        </div>
                    </article>
                    @endforeach
                  </div>
                </section>
                @endif
                @endforeach
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
@endsection

@push('scripts')
    <script>
    $(function () {
      var $chips = $('.category-chip');
      var $cards = $('.category-card');
      var $grid = $('#category-grid');

      $chips.on('click', function () {
        var selected = $(this).data('filter');

        $chips.removeClass('active-filter').addClass('text-slate-500');
        $(this).removeClass('text-slate-500').addClass('active-filter');

        $cards.each(function () {
          var matches = selected === 'all' || $(this).data('category') === selected;
          $(this).toggle(matches);
        });

        if ($grid.length) {
          if (selected === 'all') {
            $grid.addClass('all-view').removeClass('single-view');
          } else {
            $grid.removeClass('all-view').addClass('single-view');
          }
        }
      });
    });
    </script>
@endpush
