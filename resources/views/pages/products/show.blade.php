@extends('layouts.main')
@section('title', 'Hexavara - Cost Management System')

@section('content')
    <main>
        <!-- Hero Section -->
        <section class="relative w-full h-[583px] overflow-hidden bg-hex-surface lg:bg-transparent">
            <div class="absolute inset-0 z-0 bg-cover bg-top lg:block hidden opacity-80" style="background-image: url('{{ asset('assets/img/Biru Modern Ucapan Selamat Ulang Tahun Instagram Post (2) 4.png') }}');"></div>
            <div class="max-w-[1280px] mx-auto h-full relative z-10 px-4 lg:px-0 flex flex-col items-center pt-16 pb-4 text-center">
                <div class="max-w-[1050px] flex-grow flex flex-col justify-center transform lg:-translate-y-8">
                    <h1 class="hero-title text-hex-dark mb-8" data-i18n data-en="Hexavara Cost Management System" data-id="Hexavara Cost Management System">Hexavara Cost Management System</h1>
                    <p class="text-hex-slate text-lg leading-[1.65] max-w-[950px] mx-auto" data-i18n data-en="Hexavara Cost Management System is a comprehensive digital solution that manages the entire cost lifecycle from budgeting and expense tracking to financial analysis and reporting. It provides full visibility into project and operational costs, enabling organizations to maintain control and improve financial efficiency." data-id="Hexavara Cost Management System adalah solusi digital komprehensif untuk mengelola biaya dari penganggaran hingga analisis keuangan. Sistem ini memberikan visibilitas penuh pada biaya operasional, memungkinkan organisasi menjaga kontrol dan meningkatkan efisiensi keuangan.">
                        Hexavara Cost Management System is a comprehensive digital solution that manages the entire cost lifecycle from budgeting and expense tracking to financial analysis and reporting. It provides full visibility into project and operational costs, enabling organizations to maintain control and improve financial efficiency.
                    </p>
                    <div class="mt-10">
                        <a href="cta.html" class="inline-block px-8 py-3 bg-hex-dark text-white rounded-xl font-bold text-base hover:shadow-2xl hover:-translate-y-1 transition-all shadow-xl" data-i18n data-en="Request Demo" data-id="Minta Demo">Request Demo</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Preview Project -->
        <section class="py-24 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl lg:text-[42px] font-bold text-hex-dark mb-4 leading-tight" data-i18n data-en="Preview Project" data-id="Pratinjau Proyek">Preview Project</h2>
                    <p class="text-slate-500 max-w-2xl mx-auto text-lg leading-relaxed" data-i18n data-en="Get an overview of the various project documentation." data-id="Dapatkan gambaran umum tentang berbagai dokumentasi proyek.">Get an overview of the various project documentation.</p>
                </div>

                <div class="flex flex-col lg:flex-row gap-8 lg:gap-12">
                    <!-- Thumbs -->
                    <div class="flex lg:flex-col gap-4 overflow-x-auto lg:overflow-visible pb-4 lg:pb-0 hide-scrollbar w-full lg:w-64 flex-shrink-0">
                        <button class="preview-thumb relative rounded-2xl overflow-hidden border-2 border-transparent hover:border-hex-blue transition-all active ring-2 ring-hex-blue" data-image="{{ asset('assets/img/project_cost2.png') }}">
                            <img src="{{ asset('assets/img/project_cost2.png') }}" alt="Preview 1" class="w-full h-24 lg:h-32 object-cover">
                        </button>
                        <button class="preview-thumb relative rounded-2xl overflow-hidden border-2 border-transparent hover:border-hex-blue transition-all opacity-60" data-image="{{ asset('assets/img/project_cost.png') }}">
                            <img src="{{ asset('assets/img/project_cost.png') }}" alt="Preview 2" class="w-full h-24 lg:h-32 object-cover">
                        </button>
                        <button class="preview-thumb relative rounded-2xl overflow-hidden border-2 border-transparent hover:border-hex-blue transition-all opacity-60" data-image="{{ asset('assets/img/project_cost3.png') }}">
                            <img src="{{ asset('assets/img/project_cost3.png') }}" alt="Preview 3" class="w-full h-24 lg:h-32 object-cover">
                        </button>
                    </div>

                    <!-- Main Image -->
                    <div class="flex-1 bg-hex-surface rounded-[40px] p-4 shadow-2xl border border-slate-100 flex items-center justify-center">
                        <img id="preview-main-image" src="{{ asset('assets/img/project_cost2.png') }}" alt="Cost System main preview" class="w-full h-auto max-h-[700px] object-contain rounded-3xl transition-opacity duration-300">
                    </div>
                </div>
            </div>
        </section>

        <!-- Core Capabilities / Key Features -->
        <section class="py-24 bg-white border-t border-slate-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <span class="text-hex-blue font-bold uppercase tracking-[0.2em] text-sm mb-4 block" data-i18n data-en="CORE CAPABILITIES" data-id="KEMAMPUAN UTAMA">CORE CAPABILITIES</span>
                    <h2 class="text-3xl lg:text-[42px] font-bold text-hex-dark mb-4 leading-tight" data-i18n data-en="Key Features" data-id="Fitur Utama">Key Features</h2>
                    <p class="text-slate-500 max-w-2xl mx-auto text-lg leading-relaxed" data-i18n data-en="Powerful tools built into a seamless workflow to transform how you manage organizational costs." data-id="Alat bantu kuat yang dibangun dalam alur kerja mulus untuk mengubah cara Anda mengelola biaya organisasi.">Powerful tools built into a seamless workflow to transform how you manage organizational costs.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Feature 1 -->
                    <div class="group bg-white rounded-[40px] p-10 border border-slate-100 hover:shadow-2xl transition-all duration-300">
                        <div class="w-14 h-14 rounded-2xl bg-hex-surface flex items-center justify-center mb-8 group-hover:bg-hex-dark group-hover:text-white transition-colors">
                            <span class="material-symbols-outlined text-3xl">account_balance_wallet</span>
                        </div>
                        <h3 class="text-2xl font-bold text-hex-dark mb-4" data-i18n data-en="Budget Planning & Allocation" data-id="Perencanaan & Alokasi Anggaran">Budget Planning & Allocation</h3>
                        <ul class="text-hex-slate text-base leading-relaxed space-y-2">
                            <li class="flex items-start gap-3" data-i18n="html" data-en="<span class='material-symbols-outlined text-hex-blue text-sm mt-1'>circle</span> Create and manage budgets by project or department" data-id="<span class='material-symbols-outlined text-hex-blue text-sm mt-1'>circle</span> Buat dan kelola anggaran per proyek atau departemen"><span class="material-symbols-outlined text-hex-blue text-sm mt-1">circle</span> Create and manage budgets by project or department</li>
                            <li class="flex items-start gap-3" data-i18n="html" data-en="<span class='material-symbols-outlined text-hex-blue text-sm mt-1'>circle</span> Allocate funds across categories" data-id="<span class='material-symbols-outlined text-hex-blue text-sm mt-1'>circle</span> Alokasikan dana ke berbagai kategori"><span class="material-symbols-outlined text-hex-blue text-sm mt-1">circle</span> Allocate funds across categories</li>
                            <li class="flex items-start gap-3" data-i18n="html" data-en="<span class='material-symbols-outlined text-hex-blue text-sm mt-1'>circle</span> Multi-level budget approval system" data-id="<span class='material-symbols-outlined text-hex-blue text-sm mt-1'>circle</span> Sistem persetujuan anggaran bertingkat"><span class="material-symbols-outlined text-hex-blue text-sm mt-1">circle</span> Multi-level budget approval system</li>
                        </ul>
                    </div>

                    <!-- Feature 2 -->
                    <div class="group bg-white rounded-[40px] p-10 border border-slate-100 hover:shadow-2xl transition-all duration-300">
                        <div class="w-14 h-14 rounded-2xl bg-hex-surface flex items-center justify-center mb-8 group-hover:bg-hex-dark group-hover:text-white transition-colors">
                            <span class="material-symbols-outlined text-3xl">monitoring</span>
                        </div>
                        <h3 class="text-2xl font-bold text-hex-dark mb-4" data-i18n data-en="Cost Tracking & Monitoring" data-id="Pelacakan & Pemantauan Biaya">Cost Tracking & Monitoring</h3>
                        <ul class="text-hex-slate text-base leading-relaxed space-y-2">
                            <li class="flex items-start gap-3" data-i18n="html" data-en="<span class='material-symbols-outlined text-hex-blue text-sm mt-1'>circle</span> Real-time expense tracking" data-id="<span class='material-symbols-outlined text-hex-blue text-sm mt-1'>circle</span> Pelacakan pengeluaran secara real-time"><span class="material-symbols-outlined text-hex-blue text-sm mt-1">circle</span> Real-time expense tracking</li>
                            <li class="flex items-start gap-3" data-i18n="html" data-en="<span class='material-symbols-outlined text-hex-blue text-sm mt-1'>circle</span> Monitor costs per project, division, or activity" data-id="<span class='material-symbols-outlined text-hex-blue text-sm mt-1'>circle</span> Pantau biaya per proyek, divisi, atau aktivitas"><span class="material-symbols-outlined text-hex-blue text-sm mt-1">circle</span> Monitor costs per project, division, or activity</li>
                            <li class="flex items-start gap-3" data-i18n="html" data-en="<span class='material-symbols-outlined text-hex-blue text-sm mt-1'>circle</span> Automatic alerts for budget overruns" data-id="<span class='material-symbols-outlined text-hex-blue text-sm mt-1'>circle</span> Peringatan otomatis untuk anggaran berlebih"><span class="material-symbols-outlined text-hex-blue text-sm mt-1">circle</span> Automatic alerts for budget overruns</li>
                        </ul>
                    </div>

                    <!-- Feature 3 -->
                    <div class="group bg-white rounded-[40px] p-10 border border-slate-100 hover:shadow-2xl transition-all duration-300">
                        <div class="w-14 h-14 rounded-2xl bg-hex-surface flex items-center justify-center mb-8 group-hover:bg-hex-dark group-hover:text-white transition-colors">
                            <span class="material-symbols-outlined text-3xl">receipt_long</span>
                        </div>
                        <h3 class="text-2xl font-bold text-hex-dark mb-4" data-i18n data-en="Expense Management" data-id="Manajemen Pengeluaran">Expense Management</h3>
                        <ul class="text-hex-slate text-base leading-relaxed space-y-2">
                            <li class="flex items-start gap-3" data-i18n="html" data-en="<span class='material-symbols-outlined text-hex-blue text-sm mt-1'>circle</span> Record and categorize expenses" data-id="<span class='material-symbols-outlined text-hex-blue text-sm mt-1'>circle</span> Catat dan kategorikan pengeluaran"><span class="material-symbols-outlined text-hex-blue text-sm mt-1">circle</span> Record and categorize expenses</li>
                            <li class="flex items-start gap-3" data-i18n="html" data-en="<span class='material-symbols-outlined text-hex-blue text-sm mt-1'>circle</span> Upload supporting documents" data-id="<span class='material-symbols-outlined text-hex-blue text-sm mt-1'>circle</span> Unggah dokumen pendukung"><span class="material-symbols-outlined text-hex-blue text-sm mt-1">circle</span> Upload supporting documents</li>
                            <li class="flex items-start gap-3" data-i18n="html" data-en="<span class='material-symbols-outlined text-hex-blue text-sm mt-1'>circle</span> Approval workflow for expense validation" data-id="<span class='material-symbols-outlined text-hex-blue text-sm mt-1'>circle</span> Alur persetujuan untuk validasi pengeluaran"><span class="material-symbols-outlined text-hex-blue text-sm mt-1">circle</span> Approval workflow for expense validation</li>
                        </ul>
                    </div>

                    <!-- Feature 4 -->
                    <div class="group bg-white rounded-[40px] p-10 border border-slate-100 hover:shadow-2xl transition-all duration-300">
                        <div class="w-14 h-14 rounded-2xl bg-hex-surface flex items-center justify-center mb-8 group-hover:bg-hex-dark group-hover:text-white transition-colors">
                            <span class="material-symbols-outlined text-3xl">bar_chart</span>
                        </div>
                        <h3 class="text-2xl font-bold text-hex-dark mb-4" data-i18n data-en="Financial Reporting" data-id="Pelaporan Keuangan">Financial Reporting</h3>
                        <ul class="text-hex-slate text-base leading-relaxed space-y-2">
                            <li class="flex items-start gap-3" data-i18n="html" data-en="<span class='material-symbols-outlined text-hex-blue text-sm mt-1'>circle</span> Generate daily, monthly, and annual reports" data-id="<span class='material-symbols-outlined text-hex-blue text-sm mt-1'>circle</span> Buat laporan harian, bulanan, dan tahunan"><span class="material-symbols-outlined text-hex-blue text-sm mt-1">circle</span> Generate daily, monthly, and annual reports</li>
                            <li class="flex items-start gap-3" data-i18n="html" data-en="<span class='material-symbols-outlined text-hex-blue text-sm mt-1'>circle</span> Profit & Loss overview" data-id="<span class='material-symbols-outlined text-hex-blue text-sm mt-1'>circle</span> Gambaran umum laba & rugi"><span class="material-symbols-outlined text-hex-blue text-sm mt-1">circle</span> Profit & Loss overview</li>
                            <li class="flex items-start gap-3" data-i18n="html" data-en="<span class='material-symbols-outlined text-hex-blue text-sm mt-1'>circle</span> Interactive dashboards with charts and insights" data-id="<span class='material-symbols-outlined text-hex-blue text-sm mt-1'>circle</span> Dashboard interaktif dengan bagan dan wawasan"><span class="material-symbols-outlined text-hex-blue text-sm mt-1">circle</span> Interactive dashboards with charts and insights</li>
                        </ul>
                    </div>

                    <!-- Feature 5 -->
                    <div class="group bg-white rounded-[40px] p-10 border border-slate-100 hover:shadow-2xl transition-all duration-300">
                        <div class="w-14 h-14 rounded-2xl bg-hex-surface flex items-center justify-center mb-8 group-hover:bg-hex-dark group-hover:text-white transition-colors">
                            <span class="material-symbols-outlined text-3xl">manage_search</span>
                        </div>
                        <h3 class="text-2xl font-bold text-hex-dark mb-4" data-i18n data-en="Cost Analysis" data-id="Analisis Biaya">Cost Analysis</h3>
                        <ul class="text-hex-slate text-base leading-relaxed space-y-2">
                            <li class="flex items-start gap-3" data-i18n="html" data-en="<span class='material-symbols-outlined text-hex-blue text-sm mt-1'>circle</span> Budget vs actual comparison" data-id="<span class='material-symbols-outlined text-hex-blue text-sm mt-1'>circle</span> Perbandingan anggaran vs aktual"><span class="material-symbols-outlined text-hex-blue text-sm mt-1">circle</span> Budget vs actual comparison</li>
                            <li class="flex items-start gap-3" data-i18n="html" data-en="<span class='material-symbols-outlined text-hex-blue text-sm mt-1'>circle</span> Identify cost inefficiencies" data-id="<span class='material-symbols-outlined text-hex-blue text-sm mt-1'>circle</span> Identifikasi inefisiensi biaya"><span class="material-symbols-outlined text-hex-blue text-sm mt-1">circle</span> Identify cost inefficiencies</li>
                            <li class="flex items-start gap-3" data-i18n="html" data-en="<span class='material-symbols-outlined text-hex-blue text-sm mt-1'>circle</span> Data-driven financial insights" data-id="<span class='material-symbols-outlined text-hex-blue text-sm mt-1'>circle</span> Wawasan keuangan berbasis data"><span class="material-symbols-outlined text-hex-blue text-sm mt-1">circle</span> Data-driven financial insights</li>
                        </ul>
                    </div>

                    <!-- Feature 6 -->
                    <div class="group bg-white rounded-[40px] p-10 border border-slate-100 hover:shadow-2xl transition-all duration-300">
                        <div class="w-14 h-14 rounded-2xl bg-hex-surface flex items-center justify-center mb-8 group-hover:bg-hex-dark group-hover:text-white transition-colors">
                            <span class="material-symbols-outlined text-3xl">admin_panel_settings</span>
                        </div>
                        <h3 class="text-2xl font-bold text-hex-dark mb-4" data-i18n data-en="User & Role Management" data-id="Manajemen User & Role">User & Role Management</h3>
                        <ul class="text-hex-slate text-base leading-relaxed space-y-2">
                            <li class="flex items-start gap-3" data-i18n="html" data-en="<span class='material-symbols-outlined text-hex-blue text-sm mt-1'>circle</span> Multi-user access control" data-id="<span class='material-symbols-outlined text-hex-blue text-sm mt-1'>circle</span> Kontrol akses multi-user"><span class="material-symbols-outlined text-hex-blue text-sm mt-1">circle</span> Multi-user access control</li>
                            <li class="flex items-start gap-3" data-i18n="html" data-en="<span class='material-symbols-outlined text-hex-blue text-sm mt-1'>circle</span> Role-based permissions" data-id="<span class='material-symbols-outlined text-hex-blue text-sm mt-1'>circle</span> Izin berbasis peran"><span class="material-symbols-outlined text-hex-blue text-sm mt-1">circle</span> Role-based permissions</li>
                            <li class="flex items-start gap-3" data-i18n="html" data-en="<span class='material-symbols-outlined text-hex-blue text-sm mt-1'>circle</span> Activity logs and audit trail" data-id="<span class='material-symbols-outlined text-hex-blue text-sm mt-1'>circle</span> Log aktivitas dan audit trail"><span class="material-symbols-outlined text-hex-blue text-sm mt-1">circle</span> Activity logs and audit trail</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- Core Benefits Section -->
        <section class="py-24 bg-hex-surface-dark text-white overflow-hidden relative">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="text-center mb-16">
                    <span class="text-blue-400 font-bold uppercase tracking-[0.2em] text-sm mb-4 block" data-i18n data-en="CORE BENEFITS" data-id="MANFAAT UTAMA">CORE BENEFITS</span>
                    <h2 class="text-[42px] font-bold" data-i18n data-en="Why Choose Our Platform?" data-id="Mengapa Memilih Platform Kami?">Why Choose Our Platform?</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <!-- Benefit 1 -->
                    <div class="flex flex-col items-center text-center">
                        <div class="w-14 h-14 rounded-full bg-blue-600/20 border border-blue-500/30 flex items-center justify-center mb-6">
                            <span class="material-symbols-outlined text-blue-400 text-2xl">visibility</span>
                        </div>
                        <h4 class="text-lg font-bold leading-snug" data-i18n="html" data-en="Full transparency over<br class='hidden lg:block' /> financial data" data-id="Transparansi penuh atas<br class='hidden lg:block' /> data keuangan">Full transparency over<br class="hidden lg:block" /> financial data</h4>
                    </div>
                    <!-- Benefit 2 -->
                    <div class="flex flex-col items-center text-center">
                        <div class="w-14 h-14 rounded-full bg-blue-600/20 border border-blue-500/30 flex items-center justify-center mb-6">
                            <span class="material-symbols-outlined text-blue-400 text-2xl">savings</span>
                        </div>
                        <h4 class="text-lg font-bold leading-snug" data-i18n="html" data-en="Better budget control and<br class='hidden lg:block' /> cost efficiency" data-id="Kontrol anggaran dan<br class='hidden lg:block' /> efisiensi biaya lebih baik">Better budget control and<br class="hidden lg:block" /> cost efficiency</h4>
                    </div>
                    <!-- Benefit 3 -->
                    <div class="flex flex-col items-center text-center">
                        <div class="w-14 h-14 rounded-full bg-blue-600/20 border border-blue-500/30 flex items-center justify-center mb-6">
                            <span class="material-symbols-outlined text-blue-400 text-2xl">speed</span>
                        </div>
                        <h4 class="text-lg font-bold leading-snug" data-i18n="html" data-en="Faster and more accurate<br class='hidden lg:block' /> decision-making" data-id="Pengambilan keputusan<br class='hidden lg:block' /> lebih cepat & akurat">Faster and more accurate<br class="hidden lg:block" /> decision-making</h4>
                    </div>
                    <!-- Benefit 4 -->
                    <div class="flex flex-col items-center text-center">
                        <div class="w-14 h-14 rounded-full bg-blue-600/20 border border-blue-500/30 flex items-center justify-center mb-6">
                            <span class="material-symbols-outlined text-blue-400 text-2xl">trending_up</span>
                        </div>
                        <h4 class="text-lg font-bold leading-snug" data-i18n="html" data-en="Scalable and adaptable<br class='hidden lg:block' /> to business growth" data-id="Skalabel dan adaptif terhadap<br class='hidden lg:block' /> pertumbuhan bisnis">Scalable and adaptable<br class="hidden lg:block" /> to business growth</h4>
                    </div>
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

                    <!-- Right: Content -->
                    @include('partials.solution')
                </div>
            </div>
        </section>
    </main>
@endsection

@push('scripts')
    <script>
        // Gallery Logic
        const thumbs = document.querySelectorAll('.preview-thumb');
        const mainImage = document.getElementById('preview-main-image');

        if (thumbs.length > 0 && mainImage) {
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
        }
    </script>
@endpush
