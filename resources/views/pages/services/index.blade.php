@extends('layouts.main')
@section('title', 'Hexavara - Services')

@push('styles')
{{-- No page-specific styles needed for services page --}}
@endpush

@section('content')
    <main>
        <!-- Hero Section -->
        <section class="relative w-full h-[583px] overflow-hidden bg-hex-surface lg:bg-transparent">
            <div class="absolute inset-0 z-0 bg-cover bg-top lg:block hidden opacity-80" style="background-image: url('{{ asset('assets/img/Biru Modern Ucapan Selamat Ulang Tahun Instagram Post (2) 4.png') }}');"></div>
            <div class="max-w-[1280px] mx-auto h-full relative z-10 px-4 lg:px-0 flex flex-col items-center justify-center text-center">
                <div class="max-w-[850px]">
                    <h1 class="hero-title text-hex-dark mb-8" data-i18n="html" data-en="Elevating Business Through<br /><span class='text-hex-blue'>High-End Engineering</span>" data-id="Meningkatkan Bisnis Melalui<br /><span class='text-hex-blue'>Engineering Kelas Atas</span>">Elevating Business Through<br /><span class="text-hex-blue">High-End Engineering</span></h1>
                    <p class="mt-6 text-hex-slate text-lg leading-[1.65] max-w-[650px] mx-auto" data-i18n data-en="Professional software solutions tailored to your business needs. We bridge the gap between vision and reality with high-end engineering and strategic innovation." data-id="Solusi perangkat lunak profesional yang disesuaikan dengan kebutuhan bisnis Anda. Kami menjembatani visi dan realitas melalui rekayasa teknologi dan inovasi strategis.">Professional software solutions tailored to your business needs. We bridge the gap between vision and reality with high-end engineering and strategic innovation.</p>
                    <a href="cta.html" class="mt-8 inline-block px-8 py-3 bg-hex-dark text-white rounded-xl font-bold text-base hover:shadow-2xl hover:-translate-y-1 transition-all shadow-xl" data-i18n data-en="Consult Now" data-id="Konsultasi Sekarang">Consult Now</a>
                </div>
            </div>
        </section>

        <!-- Stats Strip -->
        <section class="py-16 bg-white border-b border-slate-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center divide-y md:divide-y-0 md:divide-x divide-slate-100">
                    <div class="flex flex-col items-center py-4">
                        <div class="text-4xl md:text-5xl font-extrabold text-slate-900 mb-2">77+</div>
                        <div class="text-sm font-bold text-slate-500 uppercase tracking-widest" data-i18n data-en="Happy Clients" data-id="Klien Puas">Happy Clients</div>
                    </div>
                    <div class="flex flex-col items-center py-4">
                        <div class="text-4xl md:text-5xl font-extrabold text-slate-900 mb-2">116+</div>
                        <div class="text-sm font-bold text-slate-500 uppercase tracking-widest" data-i18n data-en="Projects Delivered" data-id="Proyek Selesai">Projects Delivered</div>
                    </div>
                    <div class="flex flex-col items-center py-4">
                        <div class="text-4xl md:text-5xl font-extrabold text-slate-900 mb-2">86%</div>
                        <div class="text-sm font-bold text-slate-500 uppercase tracking-widest" data-i18n data-en="Client Retention" data-id="Retensi Klien">Client Retention</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Our Services Section -->
        <section class="py-24 bg-slate-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-[42px] font-bold text-hex-dark mb-6" data-i18n data-en="Our Services" data-id="Layanan Kami">Our Services</h2>
                    <div class="w-16 h-1 bg-hex-blue mx-auto rounded-full"></div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Card 1 -->
                    <a href="detail_service1.html" class="group bg-white rounded-[40px] p-10 border border-slate-100 hover:shadow-2xl transition-all duration-300 flex flex-col h-full cursor-pointer">
                        <div class="w-14 h-14 rounded-2xl bg-hex-surface flex items-center justify-center mb-8 group-hover:bg-hex-dark group-hover:text-white transition-colors">
                            <span class="material-symbols-outlined text-3xl">code_blocks</span>
                        </div>
                        <h3 class="text-2xl font-bold text-hex-dark mb-4" data-i18n data-en="Software Development" data-id="Pengembangan Perangkat Lunak">Software Development</h3>
                        <p class="text-hex-slate text-base leading-relaxed mb-8 min-h-[120px]" data-i18n data-en="Elevate your digital presence with our software development services. We specialize in crafting bespoke solutions to your business needs, ensuring seamless functionality and user-centric experiences." data-id="Tingkatkan kehadiran digital Anda dengan layanan pengembangan perangkat lunak kami. Kami mendedikasikan diri untuk membangun solusi kustom yang selaras dengan kebutuhan bisnis Anda, memastikan fungsi yang mulus dan pengalaman pengguna yang optimal.">Elevate your digital presence with our software development services. We specialize in crafting bespoke solutions to your business needs, ensuring seamless functionality and user-centric experiences.</p>
                        <div class="w-full h-px bg-slate-100 mb-6"></div>
                        <ul class="space-y-4 mb-8 text-hex-slate text-sm flex-grow">
                            <li class="flex items-start gap-3"><span class="material-symbols-outlined text-hex-blue text-lg">check_circle</span> <span data-i18n data-en="Web Development" data-id="Pengembangan Web">Web Development</span></li>
                            <li class="flex items-start gap-3"><span class="material-symbols-outlined text-hex-blue text-lg">check_circle</span> <span data-i18n data-en="Mobile Apps Development" data-id="Pengembangan Aplikasi Mobile">Mobile Apps Development</span></li>
                            <li class="flex items-start gap-3"><span class="material-symbols-outlined text-hex-blue text-lg">check_circle</span> <span data-i18n data-en="Geographical Information System" data-id="Sistem Informasi Geografis">Geographical Information System</span></li>
                            <li class="flex items-start gap-3"><span class="material-symbols-outlined text-hex-blue text-lg">check_circle</span> <span data-i18n data-en="Internet of Things" data-id="Internet of Things">Internet of Things</span></li>
                        </ul>
                        <span class="inline-flex items-center font-bold text-hex-blue transition-colors">
                            <span data-i18n data-en="Learn More" data-id="Selengkapnya">Learn More</span> <span class="material-symbols-outlined ml-1 transform group-hover:translate-x-1 transition-transform">arrow_forward</span>
                        </span>
                    </a>

                    <!-- Card 2 -->
                    <a href="detail_services2.html" class="group bg-white rounded-[40px] p-10 border border-slate-100 hover:shadow-2xl transition-all duration-300 flex flex-col h-full cursor-pointer">
                        <div class="w-14 h-14 rounded-2xl bg-hex-surface flex items-center justify-center mb-8 group-hover:bg-hex-dark group-hover:text-white transition-colors">
                            <span class="material-symbols-outlined text-3xl">rocket_launch</span>
                        </div>
                        <h3 class="text-2xl font-bold text-hex-dark mb-4" data-i18n data-en="Startup & Incubator" data-id="Startup & Inkubator">Startup & Incubator</h3>
                        <p class="text-hex-slate text-base leading-relaxed mb-8 min-h-[120px]" data-i18n data-en="Navigate the complexities of startup success with our expert consultancy services. From ideation to execution, we offer strategic guidance to optimize your business model." data-id="Akselerasi kesuksesan startup Anda melalui layanan konsultasi strategis dan inkubasi kami. Mulai dari pematangan ide hingga eksekusi pasar, kami memberikan panduan ahli untuk mengoptimalkan model bisnis dan skalabilitas Anda.">Navigate the complexities of startup success with our expert consultancy services. From ideation to execution, we offer strategic guidance to optimize your business model.</p>
                        <div class="w-full h-px bg-slate-100 mb-6"></div>
                        <ul class="space-y-4 mb-8 text-hex-slate text-sm flex-grow">
                            <li class="flex items-start gap-3"><span class="material-symbols-outlined text-hex-blue text-lg">check_circle</span> <span data-i18n data-en="Coaching & Mentoring" data-id="Pelatihan & Mentoring">Coaching & Mentoring</span></li>
                            <li class="flex items-start gap-3"><span class="material-symbols-outlined text-hex-blue text-lg">check_circle</span> <span data-i18n data-en="Investment Readiness" data-id="Kesiapan Investasi">Investment Readiness</span></li>
                            <li class="flex items-start gap-3"><span class="material-symbols-outlined text-hex-blue text-lg">check_circle</span> <span data-i18n data-en="Fundraising Strategy" data-id="Strategi Fundraising">Fundraising Strategy</span></li>
                            <li class="flex items-start gap-3"><span class="material-symbols-outlined text-hex-blue text-lg">check_circle</span> <span data-i18n data-en="Partnership Support" data-id="Dukungan Kemitraan">Partnership Support</span></li>
                        </ul>
                        <span class="inline-flex items-center font-bold text-hex-blue transition-colors">
                            <span data-i18n data-en="Learn More" data-id="Selengkapnya">Learn More</span> <span class="material-symbols-outlined ml-1 transform group-hover:translate-x-1 transition-transform">arrow_forward</span>
                        </span>
                    </a>

                    <!-- Card 3 -->
                    <a href="detail_service3.html" class="group bg-white rounded-[40px] p-10 border border-slate-100 hover:shadow-2xl transition-all duration-300 flex flex-col h-full cursor-pointer">
                        <div class="w-14 h-14 rounded-2xl bg-hex-surface flex items-center justify-center mb-8 group-hover:bg-hex-dark group-hover:text-white transition-colors">
                            <span class="material-symbols-outlined text-3xl">support_agent</span>
                        </div>
                        <h3 class="text-2xl font-bold text-hex-dark mb-4" data-i18n data-en="Managed Services" data-id="Layanan Terkelola">Managed Services</h3>
                        <p class="text-hex-slate text-base leading-relaxed mb-8 min-h-[120px]" data-i18n data-en="Optimize your IT infrastructure with our comprehensive managed services. We provide solutions including proactive system monitoring, and strategic IT planning." data-id="Optimalkan infrastruktur IT Anda dengan layanan pengelolaan end-to-end kami. Kami menghadirkan solusi pemantauan sistem proaktif, pemeliharaan berkala, dan perencanaan IT strategis untuk memastikan kelancaran operasional bisnis Anda.">Optimize your IT infrastructure with our comprehensive managed services. We provide solutions including proactive system monitoring, and strategic IT planning.</p>
                        <div class="w-full h-px bg-slate-100 mb-6"></div>
                        <ul class="space-y-4 mb-8 text-hex-slate text-sm flex-grow">
                            <li class="flex items-start gap-3"><span class="material-symbols-outlined text-hex-blue text-lg">check_circle</span> <span data-i18n data-en="IT Outsourcing" data-id="Outsourcing TI">IT Outsourcing</span></li>
                            <li class="flex items-start gap-3"><span class="material-symbols-outlined text-hex-blue text-lg">check_circle</span> <span data-i18n data-en="System Maintenance" data-id="Pemeliharaan Sistem">System Maintenance</span></li>
                            <li class="flex items-start gap-3"><span class="material-symbols-outlined text-hex-blue text-lg">check_circle</span> <span data-i18n data-en="Cloud Configuration" data-id="Konfigurasi Cloud">Cloud Configuration</span></li>
                            <li class="flex items-start gap-3"><span class="material-symbols-outlined text-hex-blue text-lg">check_circle</span> <span data-i18n data-en="Gap Analysis" data-id="Gap Analysis">Gap Analysis</span></li>
                        </ul>
                        <span class="inline-flex items-center font-bold text-hex-blue transition-colors">
                            <span data-i18n data-en="Learn More" data-id="Selengkapnya">Learn More</span> <span class="material-symbols-outlined ml-1 transform group-hover:translate-x-1 transition-transform">arrow_forward</span>
                        </span>
                    </a>
                </div>
            </div>
        </section>

        <!-- Additional Services -->
        <section class="py-24 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-[42px] font-bold text-hex-dark mb-4" data-i18n data-en="Additional Services" data-id="Layanan Tambahan">Additional Services</h2>
                    <p class="text-hex-slate" data-i18n data-en="Complementary solutions to boost your digital ecosystem." data-id="Solusi pelengkap untuk meningkatkan ekosistem digital Anda.">Complementary solutions to boost your digital ecosystem.</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <!-- Card 1 -->
                    <div class="group bg-white rounded-[40px] p-10 border border-slate-100 hover:shadow-2xl transition-all duration-300 flex flex-col items-center text-center">
                        <div class="w-14 h-14 rounded-2xl bg-hex-surface flex items-center justify-center mb-8 group-hover:bg-hex-dark group-hover:text-white transition-colors">
                            <span class="material-symbols-outlined text-2xl">campaign</span>
                        </div>
                        <h3 class="text-xl font-bold text-hex-dark mb-4" data-i18n data-en="Advertising" data-id="Periklanan">Advertising</h3>
                        <p class="text-hex-slate text-sm leading-relaxed" data-i18n data-en="Data-driven marketing strategies to maximize ROI and reach your audience." data-id="Strategi pemasaran berbasis data untuk memaksimalkan ROI dan menjangkau audiens Anda.">Data-driven marketing strategies to maximize ROI and reach your audience.</p>
                    </div>
                    <!-- Card 2 -->
                    <div class="group bg-white rounded-[40px] p-10 border border-slate-100 hover:shadow-2xl transition-all duration-300 flex flex-col items-center text-center">
                        <div class="w-14 h-14 rounded-2xl bg-hex-surface flex items-center justify-center mb-8 group-hover:bg-hex-dark group-hover:text-white transition-colors">
                            <span class="material-symbols-outlined text-2xl">design_services</span>
                        </div>
                        <h3 class="text-xl font-bold text-hex-dark mb-4" data-i18n data-en="UI/UX Design" data-id="Desain UI/UX">UI/UX Design</h3>
                        <p class="text-hex-slate text-sm leading-relaxed" data-i18n data-en="Intuitive interfaces for better user engagement and conversion rates." data-id="Antarmuka intuitif untuk meningkatkan interaksi pengguna dan tingkat konversi.">Intuitive interfaces for better user engagement and conversion rates.</p>
                    </div>
                    <!-- Card 3 -->
                    <div class="group bg-white rounded-[40px] p-10 border border-slate-100 hover:shadow-2xl transition-all duration-300 flex flex-col items-center text-center">
                        <div class="w-14 h-14 rounded-2xl bg-hex-surface flex items-center justify-center mb-8 group-hover:bg-hex-dark group-hover:text-white transition-colors">
                            <span class="material-symbols-outlined text-2xl">verified</span>
                        </div>
                        <h3 class="text-xl font-bold text-hex-dark mb-4" data-i18n data-en="Digital Branding" data-id="Branding Digital">Digital Branding</h3>
                        <p class="text-hex-slate text-sm leading-relaxed" data-i18n data-en="Strategic identity building for modern businesses in a competitive digital world." data-id="Pembangunan identitas strategis untuk bisnis modern di dunia digital yang kompetitif.">Strategic identity building for modern businesses in a competitive digital world.</p>
                    </div>
                    <!-- Card 4 -->
                    <div class="group bg-white rounded-[40px] p-10 border border-slate-100 hover:shadow-2xl transition-all duration-300 flex flex-col items-center text-center">
                        <div class="w-14 h-14 rounded-2xl bg-hex-surface flex items-center justify-center mb-8 group-hover:bg-hex-dark group-hover:text-white transition-colors">
                            <span class="material-symbols-outlined text-2xl">account_balance</span>
                        </div>
                        <h3 class="text-xl font-bold text-hex-dark mb-4" data-i18n data-en="Accounting Consultant" data-id="Konsultan Akuntansi">Accounting Consultant</h3>
                        <p class="text-hex-slate text-sm leading-relaxed" data-i18n data-en="Professional financial management for tech assets and business stability." data-id="Manajemen keuangan profesional untuk aset teknologi dan stabilitas bisnis.">Professional financial management for tech assets and business stability.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Values Section -->
        <section class="py-24 text-white relative overflow-hidden" style="background-color: #0B1221;">
            <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-blue-600/10 rounded-full blur-[120px] -translate-y-1/2 translate-x-1/2"></div>
            <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-blue-600/10 rounded-full blur-[120px] translate-y-1/2 -translate-x-1/2"></div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="text-center mb-16">
                    <span class="font-bold uppercase tracking-[0.2em] text-[10px] md:text-sm mb-4 block text-slate-500" data-i18n data-en="OUR VALUE" data-id="NILAI KAMI">OUR VALUE</span>
                    <h2 class="text-[42px] font-bold mb-6 text-white tracking-tight" data-i18n data-en="Why Choose Hexavara" data-id="Mengapa Memilih Hexavara">Why Choose Hexavara</h2>
                    <p class="max-w-2xl mx-auto text-sm md:text-base text-slate-400 leading-relaxed" data-i18n data-en="Excellence in Project Execution, Strategic Oversight, Trusted Technology Partner." data-id="Keunggulan Eksekusi Proyek, Pengawasan Strategis, dan Mitra Teknologi Terpercaya.">
                        Excellence in Project Execution, Strategic Oversight, Trusted Technology Partner.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-5xl mx-auto">
                    <div class="p-6 rounded-[32px] border border-white/[0.03] transition-all duration-300" style="background-color: #0a1221;">
                        <div class="w-10 h-10 bg-[#1d2636] rounded-2xl flex items-center justify-center mb-6 text-blue-500">
                            <span class="material-symbols-outlined text-xl">list_alt</span>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-4" data-i18n data-en="Roadmap for Timeline" data-id="Peta Jalan & Lini Masa">Roadmap for Timeline</h3>
                        <p class="leading-relaxed text-slate-400 text-base" data-i18n data-en="Our roadmap contains a detailed list of tasks and project timelines that you can monitor at any time. Each roadmap is created based on mutual agreement." data-id="Peta jalan kami menyajikan daftar tugas dan lini masa proyek yang mendetail dan dapat Anda pantau secara real-time. Setiap rencana disusun berdasarkan kesepakatan bersama untuk transparansi penuh.">Our roadmap contains a detailed list of tasks and project timelines that you can monitor at any time. Each roadmap is created based on mutual agreement.</p>
                    </div>
                    <div class="p-6 rounded-[32px] border border-white/[0.03] transition-all duration-300" style="background-color: #0a1221;">
                        <div class="w-10 h-10 bg-[#1d2636] rounded-2xl flex items-center justify-center mb-6 text-blue-500">
                            <span class="material-symbols-outlined text-xl">speed</span>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-4" data-i18n data-en="Weekly Sprint Monitoring" data-id="Pemantauan Sprint Mingguan">Weekly Sprint Monitoring</h3>
                        <p class="leading-relaxed text-slate-400 text-base" data-i18n data-en="This feature helps control sprints, ensuring our programmers work according to the time you've purchased. It also guarantees that your project is success." data-id="Kami menerapkan kontrol sprint yang ketat melalui pemantauan mingguan, memastikan progres pengerjaan selaras dengan target waktu yang ditetapkan demi menjamin efisiensi dan kesuksesan proyek Anda.">This feature helps control sprints, ensuring our programmers work according to the time you've purchased. It also guarantees that your project is success.</p>
                    </div>
                    <div class="p-6 rounded-[32px] border border-white/[0.03] transition-all duration-300" style="background-color: #0a1221;">
                        <div class="w-10 h-10 bg-[#1d2636] rounded-2xl flex items-center justify-center mb-6 text-blue-500">
                            <span class="material-symbols-outlined text-xl">verified_user</span>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-4" data-i18n data-en="Maximum Service" data-id="Layanan Maksimal & Responsif">Maximum Service</h3>
                        <p class="leading-relaxed text-slate-400 text-base" data-i18n data-en="We guarantee maximum service with bug fixes and improvements handled within 48 hours. This feature allows you to easily track your requests." data-id="Kami berkomitmen memberikan layanan purnajual terbaik dengan penanganan kendala dan perbaikan dalam waktu maksimal 48 jam. Anda dapat melacak status permintaan Anda dengan mudah secara transparan.">We guarantee maximum service with bug fixes and improvements handled within 48 hours. This feature allows you to easily track your requests.</p>
                    </div>
                    <div class="p-6 rounded-[32px] border border-white/[0.03] transition-all duration-300" style="background-color: #0a1221;">
                        <div class="w-10 h-10 bg-[#1d2636] rounded-2xl flex items-center justify-center mb-6 text-blue-500">
                            <span class="material-symbols-outlined text-xl">trending_up</span>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-4" data-i18n data-en="Monitor Team Performance" data-id="Pantau Performa Tim">Monitor Team Performance</h3>
                        <p class="leading-relaxed text-slate-400 text-base" data-i18n data-en="Each of our talents has daily and monthly targets aligned with the time you've purchased. They compete to deliver their best performance." data-id="Setiap talenta kami memiliki target harian dan bulanan yang terukur, selaras dengan kebutuhan proyek Anda. Kami memastikan tim memberikan performa terbaik untuk hasil yang berkualitas tinggi.">Each of our talents has daily and monthly targets aligned with the time you've purchased. They compete to deliver their best performance.</p>
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
                    <div class="order-1 md:order-2 pb-20 md:-mt-8">
                        @include('partials.solution')
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@push('scripts')
{{-- No page-specific scripts needed for services page --}}
@endpush
