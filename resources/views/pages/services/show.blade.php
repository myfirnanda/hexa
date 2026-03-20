@extends('layouts.app')

@section('title', $service->name . ' — Hexavara')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/service.css') }}" />
@endpush

@section('content')
<div class="sd-page">

    {{-- Hero --}}
    <section class="sd-hero">
        <div class="sd-hero-inner">
            <h1 data-t="hero_title">{{ $service->name }}</h1>
            <p class="sd-hero-desc" data-t="hero_desc">{{ $service->description }}</p>
            <a href="{{ route('contact') }}" class="sd-hero-btn" data-t="hero_btn">Consult Now</a>
        </div>
    </section>

    {{-- Client Logos Strip --}}
    <section class="sd-logos">
        <div class="sd-logos-inner">
            @foreach($clients ?? [] as $client)
            <img src="{{ asset('assets/img/' . $client->logo) }}" alt="{{ $client->name }}">
            @endforeach
        </div>
    </section>

    {{-- Expertise Banner --}}
    <section class="sd-expertise">
        <div class="sd-expertise-inner">
            <div class="sd-expertise-text">
                <span class="sd-kicker" data-t="expertise_kicker">OUR EXPERTISE</span>
                <h2 class="sd-expertise-title" data-t="expertise_title">Crafting Powerful Software Solutions for Modern Businesses</h2>
            </div>
            <div class="sd-expertise-cards">
                <div class="sd-expertise-card">
                    <h3 data-t="exp_card1_title">Innovation First</h3>
                    <p data-t="exp_card1_desc">Utilizing cutting-edge technologies to solve complex business challenges.</p>
                </div>
                <div class="sd-expertise-card">
                    <h3 data-t="exp_card2_title">Scalable Architecture</h3>
                    <p data-t="exp_card2_desc">Building solutions that grow seamlessly with your user base and requirements.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Sub-Services --}}
    <section class="sd-subservices">
        <div class="sd-subservices-inner">
            <span class="sd-section-kicker" data-t="svc_kicker">OUR SERVICES</span>
            <h2 class="sd-section-title" data-t="svc_title">Comprehensive Software Development Solutions</h2>

            <div class="sd-subservices-grid">
                <div class="sd-subservice-card">
                    <div class="sd-subservice-icon icon-web"><span class="material-symbols-outlined">language</span></div>
                    <h3 data-t="svc1_title">Web Development</h3>
                    <p class="sd-subservice-desc" data-t="svc1_desc">Responsive, secure, and high-performance web applications tailored to your goals.</p>
                    <div class="sd-features-label" data-t="key_features">KEY FEATURES</div>
                    <ul class="sd-features-list">
                        <li data-t="svc1_f1">Progressive Web Apps</li>
                        <li data-t="svc1_f2">API Integrations</li>
                        <li data-t="svc1_f3">SEO Optimized</li>
                    </ul>
                </div>

                <div class="sd-subservice-card">
                    <div class="sd-subservice-icon icon-mobile"><span class="material-symbols-outlined">smartphone</span></div>
                    <h3 data-t="svc2_title">Mobile Apps Development</h3>
                    <p class="sd-subservice-desc" data-t="svc2_desc">Native and cross-platform mobile solutions for iOS and Android.</p>
                    <div class="sd-features-label" data-t="key_features">KEY FEATURES</div>
                    <ul class="sd-features-list">
                        <li data-t="svc2_f1">iOS &amp; Android Native</li>
                        <li data-t="svc2_f2">Flutter / React Native</li>
                        <li data-t="svc2_f3">Intuitive UI/UX</li>
                    </ul>
                </div>

                <div class="sd-subservice-card">
                    <div class="sd-subservice-icon icon-gis"><span class="material-symbols-outlined">map</span></div>
                    <h3 data-t="svc3_title">Geographical Information System</h3>
                    <p class="sd-subservice-desc" data-t="svc3_desc">Advanced spatial data visualization and analysis tools for informed decision making.</p>
                    <div class="sd-features-label" data-t="key_features">KEY FEATURES</div>
                    <ul class="sd-features-list">
                        <li data-t="svc3_f1">Custom Mapping</li>
                        <li data-t="svc3_f2">Spatial Data Analysis</li>
                        <li data-t="svc3_f3">Real-time Tracking</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    {{-- Core Advantages --}}
    <section class="sd-advantages">
        <div class="sd-advantages-inner">
            <span class="sd-section-kicker" data-t="adv_kicker">CORE ADVANTAGES</span>
            <h2 class="sd-section-title" data-t="adv_title">Why Choose Our Software Solutions?</h2>

            <div class="sd-advantages-grid">
                <div class="sd-advantage-card">
                    <div class="sd-advantage-icon"><span class="material-symbols-outlined">cloud_upload</span></div>
                    <h3 data-t="adv1_title">Scalable Infrastructure</h3>
                    <p class="sd-advantage-desc" data-t="adv1_desc">Architecture built to handle rapid growth and high user traffic without performance loss.</p>
                </div>
                <div class="sd-advantage-card">
                    <div class="sd-advantage-icon"><span class="material-symbols-outlined">shield</span></div>
                    <h3 data-t="adv2_title">Secure &amp; Protected</h3>
                    <p class="sd-advantage-desc" data-t="adv2_desc">Multi-layered security protocols to safeguard your business and customer data.</p>
                </div>
                <div class="sd-advantage-card">
                    <div class="sd-advantage-icon"><span class="material-symbols-outlined">rocket_launch</span></div>
                    <h3 data-t="adv3_title">Continuous Innovation</h3>
                    <p class="sd-advantage-desc" data-t="adv3_desc">Access to the latest tech stacks and agile methodologies for modern solutions.</p>
                </div>
                <div class="sd-advantage-card">
                    <div class="sd-advantage-icon"><span class="material-symbols-outlined">tune</span></div>
                    <h3 data-t="adv4_title">Fully Customizable</h3>
                    <p class="sd-advantage-desc" data-t="adv4_desc">Bespoke development tailored entirely to your unique business logic and workflows.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Development Process --}}
    <section class="sd-process">
        <div class="sd-process-inner">
            <span class="sd-section-kicker" data-t="proc_kicker">OUR WORKFLOW</span>
            <h2 class="sd-section-title" data-t="proc_title">Our Development Process</h2>
            <p class="sd-section-subtitle" data-t="proc_subtitle">A structured approach to turning your vision into a high-performing digital reality.</p>

            <div class="sd-timeline">
                <div class="sd-step sd-step-right">
                    <div class="sd-step-number">01</div>
                    <div class="sd-step-card">
                        <h3><span data-t="step1_title">Requirement Gathering</span> <span class="step-icon material-symbols-outlined">assignment</span></h3>
                        <p data-t="step1_i1">Collecting Problems</p>
                        <p data-t="step1_i2">Explore Of Current Solution</p>
                        <p data-t="step1_i3">Auditing Existing Solution</p>
                    </div>
                </div>

                <div class="sd-step sd-step-left">
                    <div class="sd-step-number">02</div>
                    <div class="sd-step-card">
                        <h3><span class="step-icon material-symbols-outlined">manage_search</span> <span data-t="step2_title">Problem Analysis</span></h3>
                        <p data-t="step2_i1">Define Problem Points</p>
                        <p data-t="step2_i2">Analyze Flow Problems</p>
                        <p data-t="step2_i3">Define Solution</p>
                    </div>
                </div>

                <div class="sd-step sd-step-right">
                    <div class="sd-step-number">03</div>
                    <div class="sd-step-card">
                        <h3><span data-t="step3_title">Planning</span> <span class="step-icon material-symbols-outlined">folder_open</span></h3>
                        <p data-t="step3_i1">Flow System &amp; Wireframing</p>
                        <p data-t="step3_i2">System Architecture Design</p>
                        <p data-t="step3_i3">Technology Stack Selection</p>
                        <p data-t="step3_i4">Rapid Prototyping</p>
                    </div>
                </div>

                <div class="sd-step sd-step-left">
                    <div class="sd-step-number">04</div>
                    <div class="sd-step-card">
                        <h3><span class="step-icon material-symbols-outlined">code</span> <span data-t="step4_title">Developing</span></h3>
                        <p data-t="step4_i1">Agile Sprint Planning</p>
                        <p data-t="step4_i2">High-Quality Implementation</p>
                        <p data-t="step4_i3">Rigorous Usability Testing</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

@push('scripts')
<script>
var pageTranslations = {
    en: {
        hero_title: 'Software Development',
        hero_desc: 'Elevate your digital presence with our software development services. We specialize in crafting bespoke solutions to your business needs, ensuring seamless functionality and user-centric experiences. Our expert team employs the latest technologies to deliver scalable, high-performance software that propels your business forward.',
        hero_btn: 'Consult Now',
        expertise_kicker: 'OUR EXPERTISE', expertise_title: 'Crafting Powerful Software Solutions for Modern Businesses',
        exp_card1_title: 'Innovation First', exp_card1_desc: 'Utilizing cutting-edge technologies to solve complex business challenges.',
        exp_card2_title: 'Scalable Architecture', exp_card2_desc: 'Building solutions that grow seamlessly with your user base and requirements.',
        svc_kicker: 'OUR SERVICES', svc_title: 'Comprehensive Software Development Solutions',
        svc1_title: 'Web Development', svc1_desc: 'Responsive, secure, and high-performance web applications tailored to your goals.',
        svc1_f1: 'Progressive Web Apps', svc1_f2: 'API Integrations', svc1_f3: 'SEO Optimized',
        svc2_title: 'Mobile Apps Development', svc2_desc: 'Native and cross-platform mobile solutions for iOS and Android.',
        svc2_f1: 'iOS & Android Native', svc2_f2: 'Flutter / React Native', svc2_f3: 'Intuitive UI/UX',
        svc3_title: 'Geographical Information System', svc3_desc: 'Advanced spatial data visualization and analysis tools for informed decision making.',
        svc3_f1: 'Custom Mapping', svc3_f2: 'Spatial Data Analysis', svc3_f3: 'Real-time Tracking',
        key_features: 'KEY FEATURES',
        adv_kicker: 'CORE ADVANTAGES', adv_title: 'Why Choose Our Software Solutions?',
        adv1_title: 'Scalable Infrastructure', adv1_desc: 'Architecture built to handle rapid growth and high user traffic without performance loss.',
        adv2_title: 'Secure & Protected', adv2_desc: 'Multi-layered security protocols to safeguard your business and customer data.',
        adv3_title: 'Continuous Innovation', adv3_desc: 'Access to the latest tech stacks and agile methodologies for modern solutions.',
        adv4_title: 'Fully Customizable', adv4_desc: 'Bespoke development tailored entirely to your unique business logic and workflows.',
        proc_kicker: 'OUR WORKFLOW', proc_title: 'Our Development Process',
        proc_subtitle: 'A structured approach to turning your vision into a high-performing digital reality.',
        step1_title: 'Requirement Gathering', step1_i1: 'Collecting Problems', step1_i2: 'Explore Of Current Solution', step1_i3: 'Auditing Existing Solution',
        step2_title: 'Problem Analysis', step2_i1: 'Define Problem Points', step2_i2: 'Analyze Flow Problems', step2_i3: 'Define Solution',
        step3_title: 'Planning', step3_i1: 'Flow System & Wireframing', step3_i2: 'System Architecture Design', step3_i3: 'Technology Stack Selection', step3_i4: 'Rapid Prototyping',
        step4_title: 'Developing', step4_i1: 'Agile Sprint Planning', step4_i2: 'High-Quality Implementation', step4_i3: 'Rigorous Usability Testing'
    },
    id: {
        hero_title: 'Pengembangan Software',
        hero_desc: 'Tingkatkan kehadiran digital Anda dengan layanan pengembangan software kami. Kami mengkhususkan diri dalam membuat solusi khusus untuk kebutuhan bisnis Anda, memastikan fungsionalitas yang mulus dan pengalaman yang berpusat pada pengguna. Tim ahli kami menggunakan teknologi terkini untuk menghasilkan software yang skalabel dan berkinerja tinggi yang mendorong bisnis Anda maju.',
        hero_btn: 'Konsultasi Sekarang',
        expertise_kicker: 'KEAHLIAN KAMI', expertise_title: 'Menciptakan Solusi Software yang Powerful untuk Bisnis Modern',
        exp_card1_title: 'Inovasi Utama', exp_card1_desc: 'Memanfaatkan teknologi mutakhir untuk menyelesaikan tantangan bisnis yang kompleks.',
        exp_card2_title: 'Arsitektur Skalabel', exp_card2_desc: 'Membangun solusi yang berkembang dengan mulus seiring basis pengguna dan kebutuhan Anda.',
        svc_kicker: 'LAYANAN KAMI', svc_title: 'Solusi Pengembangan Software Komprehensif',
        svc1_title: 'Pengembangan Web', svc1_desc: 'Aplikasi web yang responsif, aman, dan berkinerja tinggi yang disesuaikan dengan tujuan Anda.',
        svc1_f1: 'Progressive Web Apps', svc1_f2: 'Integrasi API', svc1_f3: 'Optimasi SEO',
        svc2_title: 'Pengembangan Aplikasi Mobile', svc2_desc: 'Solusi mobile native dan cross-platform untuk iOS dan Android.',
        svc2_f1: 'Native iOS & Android', svc2_f2: 'Flutter / React Native', svc2_f3: 'UI/UX Intuitif',
        svc3_title: 'Sistem Informasi Geografis', svc3_desc: 'Visualisasi dan analisis data spasial canggih untuk pengambilan keputusan yang tepat.',
        svc3_f1: 'Pemetaan Kustom', svc3_f2: 'Analisis Data Spasial', svc3_f3: 'Pelacakan Real-time',
        key_features: 'FITUR UTAMA',
        adv_kicker: 'KEUNGGULAN UTAMA', adv_title: 'Mengapa Memilih Solusi Software Kami?',
        adv1_title: 'Infrastruktur Skalabel', adv1_desc: 'Arsitektur yang dibangun untuk menangani pertumbuhan cepat dan lalu lintas tinggi tanpa kehilangan performa.',
        adv2_title: 'Aman & Terlindungi', adv2_desc: 'Protokol keamanan berlapis untuk melindungi bisnis dan data pelanggan Anda.',
        adv3_title: 'Inovasi Berkelanjutan', adv3_desc: 'Akses ke stack teknologi terbaru dan metodologi agile untuk solusi modern.',
        adv4_title: 'Sepenuhnya Dapat Dikustomisasi', adv4_desc: 'Pengembangan khusus yang disesuaikan sepenuhnya dengan logika bisnis dan alur kerja unik Anda.',
        proc_kicker: 'ALUR KERJA KAMI', proc_title: 'Proses Pengembangan Kami',
        proc_subtitle: 'Pendekatan terstruktur untuk mengubah visi Anda menjadi realitas digital berkinerja tinggi.',
        step1_title: 'Pengumpulan Kebutuhan', step1_i1: 'Mengumpulkan Permasalahan', step1_i2: 'Eksplorasi Solusi Saat Ini', step1_i3: 'Audit Solusi yang Ada',
        step2_title: 'Analisis Masalah', step2_i1: 'Mendefinisikan Poin Masalah', step2_i2: 'Menganalisis Alur Masalah', step2_i3: 'Mendefinisikan Solusi',
        step3_title: 'Perencanaan', step3_i1: 'Flow System & Wireframing', step3_i2: 'Desain Arsitektur Sistem', step3_i3: 'Pemilihan Teknologi', step3_i4: 'Prototipe Cepat',
        step4_title: 'Pengembangan', step4_i1: 'Perencanaan Sprint Agile', step4_i2: 'Implementasi Berkualitas Tinggi', step4_i3: 'Pengujian Kegunaan Ketat'
    }
};
</script>
@endpush
@endsection
