@extends('layouts.main')
@section('title', 'Hexavara - POS KANA Project')
@section('content')

    <!-- Hero Section -->
    <section class="relative w-full h-[583px] overflow-hidden bg-hex-surface lg:bg-transparent">
        <div class="absolute inset-0 z-0 bg-cover bg-top lg:block hidden opacity-80" style="background-image: url('{{ asset('assets/img/Biru Modern Ucapan Selamat Ulang Tahun Instagram Post (2) 4.png') }}');"></div>
        <div class="max-w-[1280px] mx-auto h-full relative z-10 px-4 lg:px-0 flex flex-col items-center justify-center text-center pt-8 lg:pt-0">
            <div class="max-w-[850px] relative z-20 px-4 transform lg:-translate-y-8">
                <div class="flex justify-center">
                    <span class="inline-flex items-center font-bold bg-blue-100 text-blue-600 rounded-full px-4 py-1 mb-6 text-sm uppercase tracking-widest" data-i18n data-en="Software Development" data-id="Pengembangan Perangkat Lunak">Software Development</span>
                </div>
                <h1 class="hero-title text-hex-dark mb-6" data-i18n data-en="POS KANA" data-id="POS KANA">POS KANA</h1>
                <p class="text-hex-slate text-lg leading-[1.65] max-w-[750px] mx-auto" data-i18n data-en="Kana Cooperative is a company engaged in trade and distribution of Indonesian products to international markets, particularly sugar and edible bird's nests. Kana also develops various innovative products such as BANU mineral water and beverages like Sano and Duel." data-id="Koperasi Kana adalah perusahaan perdagangan dan distribusi produk Indonesia ke pasar internasional, khususnya gula dan sarang burung walet. Kana juga mengembangkan berbagai produk inovatif seperti air mineral BANU dan minuman Sano serta Duel.">Kana Cooperative is a company engaged in trade and distribution of Indonesian products to international markets, particularly sugar and edible bird's nests. Kana also develops various innovative products such as BANU mineral water and beverages like Sano and Duel.</p>
                <a href="cta.html" class="mt-10 inline-block px-8 py-3 bg-hex-dark rounded-xl font-bold text-white text-[1rem] hover:shadow-2xl hover:-translate-y-1 transition-all shadow-xl" data-i18n data-en="Consult Now" data-id="Konsultasi Sekarang">Consult Now</a>
            </div>
        </div>
    </section>

    <!-- Preview Gallery -->
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl lg:text-[42px] font-bold text-hex-dark mb-4 leading-tight" data-i18n data-en="Preview Project" data-id="Pratinjau Proyek">Preview Project</h2>
                <p class="text-slate-500 max-w-2xl mx-auto text-lg" data-i18n data-en="Get an overview of the various project documentation." data-id="Dapatkan gambaran umum tentang berbagai dokumentasi proyek.">Get an overview of the various project documentation.</p>
            </div>

            <div class="flex flex-col lg:flex-row gap-8 lg:gap-12">
                <!-- Thumbs -->
                <div class="flex lg:flex-col gap-4 overflow-x-auto lg:overflow-visible pb-4 lg:pb-0 hide-scrollbar w-full lg:w-64 shrink-0">
                    <button class="preview-thumb relative rounded-2xl overflow-hidden border-2 border-transparent hover:border-hex-blue transition-all active ring-2 ring-hex-blue" data-image="{{ asset('assets/img/POS_KANA1.png') }}">
                        <img src="{{ asset('assets/img/POS_KANA1.png') }}" alt="Preview 1" class="w-full h-24 lg:h-32 object-cover">
                    </button>
                    <button class="preview-thumb relative rounded-2xl overflow-hidden border-2 border-transparent hover:border-hex-blue transition-all opacity-60" data-image="{{ asset('assets/img/POS_KANA2.png') }}">
                        <img src="{{ asset('assets/img/POS_KANA2.png') }}" alt="Preview 2" class="w-full h-24 lg:h-32 object-cover">
                    </button>
                    <button class="preview-thumb relative rounded-2xl overflow-hidden border-2 border-transparent hover:border-hex-blue transition-all opacity-60" data-image="{{ asset('assets/img/POS_KANA3.png') }}">
                        <img src="{{ asset('assets/img/POS_KANA3.png') }}" alt="Preview 3" class="w-full h-24 lg:h-32 object-cover">
                    </button>
                </div>

                <!-- Main Image -->
                <div class="flex-1 bg-hex-surface rounded-[40px] p-4 shadow-2xl border border-slate-100 flex items-center justify-center">
                    <img id="preview-main-image" src="{{ asset('assets/img/POS_KANA1.png') }}" alt="POS KANA main preview" class="w-full h-auto max-h-[700px] object-contain rounded-3xl transition-opacity duration-300">
                </div>
            </div>
        </div>
    </section>

    <!-- Summary Section -->
    <section class="py-24 bg-hex-surface">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col gap-2 mb-8">
                <span class="text-blue-600 font-bold text-sm tracking-widest uppercase" data-i18n data-en="SUMMARY" data-id="RINGKASAN">SUMMARY</span>
                <h2 class="text-3xl lg:text-4xl font-bold text-hex-dark" data-i18n data-en="Learning About POS Kana" data-id="Mempelajari Tentang POS Kana">Learning About POS Kana</h2>
            </div>
            <div class="space-y-6 text-hex-slate text-lg leading-relaxed">
                <p data-i18n data-en="POS Kana is a web-based business management system designed to support distribution and trading operations within a single integrated platform. The system helps companies manage business processes more efficiently, from procurement and sales transactions to comprehensive business reporting." data-id="POS Kana adalah sistem manajemen bisnis berbasis web yang dirancang untuk mendukung operasional distribusi dan perdagangan dalam satu platform terintegrasi. Sistem ini membantu mengatur proses bisnis secara efisien, mulai dari pengadaan hingga pelaporan bisnis.">
                    POS Kana is a web-based business management system designed to support distribution and trading operations within a single integrated platform. The system helps companies manage business processes more efficiently, from procurement and sales transactions to comprehensive business reporting.
                </p>
                <p data-i18n data-en="The dashboard provides real-time business performance monitoring, including sales transactions, procurement activities, and financial reports, enabling management to make faster and more accurate decisions." data-id="Dashboard ini menyediakan pemantauan performa bisnis secara real-time, termasuk transaksi penjualan, aktivitas pengadaan, dan laporan keuangan, memungkinkan manajemen mengambil keputusan lebih cepat dan akurat.">
                    The dashboard provides real-time business performance monitoring, including sales transactions, procurement activities, and financial reports, enabling management to make faster and more accurate decisions.
                </p>
                <div>
                    <p class="font-bold text-hex-dark mb-4" data-i18n data-en="Key advantages:" data-id="Keuntungan utama:">Key advantages:</p>
                    <ul class="list-disc pl-5 space-y-2">
                        <li data-i18n data-en="Integrated POS and business management system" data-id="Sistem POS dan manajemen bisnis yang terintegrasi">Integrated POS and business management system</li>
                        <li data-i18n data-en="Real-time dashboard for monitoring sales, procurement, and financial performance" data-id="Dashboard real-time untuk memantau penjualan, pengadaan, dan performa keuangan">Real-time dashboard for monitoring sales, procurement, and financial performance</li>
                        <li data-i18n data-en="Inventory and warehouse management across multiple locations" data-id="Manajemen stok dan gudang di berbagai lokasi">Inventory and warehouse management across multiple locations</li>
                        <li data-i18n data-en="Sales KPI monitoring and performance tracking" data-id="Pemantauan KPI penjualan dan pelacakan performa">Sales KPI monitoring and performance tracking</li>
                        <li data-i18n data-en="Comprehensive reporting covering sales, inventory, and finance" data-id="Pelaporan komprehensif mencakup penjualan, stok, dan keuangan">Comprehensive reporting covering sales, inventory, and finance</li>
                    </ul>
                </div>
                <p data-i18n data-en="Through the implementation of POS Kana, the company can manage its business operations in a more structured way, improve distribution efficiency, and gain accurate business insights to support sustainable growth." data-id="Melalui implementasi POS Kana, perusahaan dapat mengelola operasional bisnisnya secara lebih terstruktur, meningkatkan efisiensi distribusi, dan mendapatkan wawasan bisnis yang akurat.">
                    Through the implementation of POS Kana, the company can manage its business operations in a more structured way, improve distribution efficiency, and gain accurate business insights to support sustainable growth.
                </p>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="pt-0 pb-0 bg-white overflow-hidden">
        <div class="max-w-7xl mx-auto px-10 sm:px-20 lg:px-32">
            <div class="grid grid-cols-1 md:grid-cols-[auto_1fr] gap-16 items-end md:-ml-12">
                <!-- Left: Talent Image -->
                <div class="relative order-2 md:order-1 flex justify-start items-end">
                    <img src="{{ asset('assets/img/talent.png') }}" alt="IT Consultant Talent" class="w-full h-auto object-contain max-h-[500px] transform translate-y-2">
                </div>

                <!-- Right: Solution partial -->
                <div class="order-1 md:order-2">
                    @include('partials.solution')
                </div>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
<script>
    // Gallery Logic (page-specific)
    const thumbs = document.querySelectorAll('.preview-thumb');
    const mainImage = document.getElementById('preview-main-image');

    thumbs.forEach(thumb => {
        thumb.addEventListener('click', () => {
            thumbs.forEach(t => {
                t.classList.remove('active', 'ring-2', 'ring-hex-blue', 'opacity-100');
                t.classList.add('opacity-60');
            });
            thumb.classList.add('active', 'ring-2', 'ring-hex-blue', 'opacity-100');
            thumb.classList.remove('opacity-60');

            mainImage.style.opacity = '0';
            setTimeout(() => {
                mainImage.src = thumb.getAttribute('data-image');
                mainImage.style.opacity = '1';
            }, 200);
        });
    });
</script>
@endpush
