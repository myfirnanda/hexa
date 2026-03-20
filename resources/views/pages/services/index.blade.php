@extends('layouts.app')

@section('title', 'Hexavara - Services')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/clients.css') }}" />
@endpush

@section('content')
<div class="clients-page service-page">
  <main>
    <section class="hero-section service-hero-section">
      <div class="hero-banner"></div>
      <div class="hero-content service-hero-content">
        <h1 class="hero-title service-hero-title" data-t="hero_title" data-t-html>
          Transforming Ideas into<br />
          <span class="service-hero-accent">Digital Excellence</span>
        </h1>
        <p class="hero-description service-hero-description" data-t="hero_desc">
          Professional software solutions tailored to your business needs. We bridge the gap between
          vision and reality with high-end engineering and strategic innovation.
        </p>
        <a class="service-hero-button" href="{{ route('contact') }}" data-t="hero_btn">Consult Now</a>
      </div>
    </section>

    <section class="service-stats-strip" aria-label="Service achievements">
      <div class="service-stats-inner">
        <article class="service-stat-item">
          <div class="service-stat-value" data-count-target="77" data-count-suffix="+">0+</div>
          <div class="service-stat-text" data-t="stat_clients">Happy Clients</div>
        </article>
        <article class="service-stat-item">
          <div class="service-stat-value" data-count-target="116" data-count-suffix="+">0+</div>
          <div class="service-stat-text" data-t="stat_projects">Projects Delivered</div>
        </article>
        <article class="service-stat-item">
          <div class="service-stat-value" data-count-target="86" data-count-suffix="%">0%</div>
          <div class="service-stat-text" data-t="stat_retention">Client Retention</div>
        </article>
      </div>
    </section>

    <section class="service-offerings-section" aria-labelledby="service-offerings-title">
      <div class="service-offerings-inner">
        <div class="service-offerings-head">
          <h2 class="service-offerings-title" id="service-offerings-title" data-t="offerings_title">Our Services</h2>
          <div class="service-offerings-line"></div>
        </div>

        <div class="service-card-grid">
          <article class="service-offering-card">
            <h3 class="service-card-title" data-t="card1_title">Software Development</h3>
            <p class="service-card-description" data-t="card1_desc">
              Elevate your digital presence with our software development services. We specialize in crafting bespoke solutions to your business needs, ensuring seamless functionality and user-centric experiences. Our expert team employs the latest technologies to deliver scalable, high-performance software that propels your business forward.
            </p>
            <div class="service-card-divider"></div>
            <ul class="service-card-list">
              <li>Web Development</li>
              <li>Mobile Apps Development</li>
              <li>Geographical Information System</li>
              <li>Internet of Things</li>
              <li>Enterprise Resource Planning</li>
              <li>Backoffice Management Services (Accounting, HRD, HSE, etc)</li>
            </ul>
            <a class="service-card-link" href="{{ route('services.show', 'software-development') }}" data-t="card_learn">Learn More</a>
          </article>

          <article class="service-offering-card">
            <h3 class="service-card-title" data-t="card2_title">Startup &amp; Incubator</h3>
            <p class="service-card-description" data-t="card2_desc">
              Navigate the complexities of startup success with our expert consultancy services. From ideation to execution, we offer strategic guidance to optimize your business model. With bunch of investor partner behind us we will help to accelerate growth of your startup. Make a collaboration with us to turn your entrepreneurial vision into reality.
            </p>
            <div class="service-card-divider"></div>
            <ul class="service-card-list">
              <li>Coaching</li>
              <li>Investment</li>
              <li>Fundraising</li>
              <li>Seed &amp; Development</li>
              <li>Partnership</li>
            </ul>
            <a class="service-card-link" href="{{ route('services.show', 'startup-incubator') }}" data-t="card_learn2">Learn More</a>
          </article>

          <article class="service-offering-card">
            <h3 class="service-card-title" data-t="card3_title">Managed Services</h3>
            <p class="service-card-description" data-t="card3_desc">
              Optimize your IT infrastructure with our comprehensive managed services. We provide comprehensive solutions, including proactive system monitoring, and strategic IT planning. Trust us to optimize your technology segment, ensuring most effective operations and allowing you to stay ahead in the digital landscape.
            </p>
            <div class="service-card-divider"></div>
            <ul class="service-card-list">
              <li>IT Outsourcing</li>
              <li>Maintenance</li>
              <li>Data Migration</li>
              <li>Configuration</li>
              <li>Training</li>
              <li>Gap Analysis</li>
              <li>IT Consultant</li>
            </ul>
            <a class="service-card-link" href="{{ route('services.show', 'managed-services') }}" data-t="card_learn3">Learn More</a>
          </article>
        </div>
      </div>
    </section>

    <section class="additional-services-section" aria-labelledby="additional-services-title">
      <div class="additional-services-inner">
        <div class="additional-services-head">
          <h2 class="additional-services-title" id="additional-services-title" data-t="additional_title">Additional Services</h2>
          <p class="additional-services-description" data-t="additional_desc">
            Comprehensive support for every aspect of your business growth.
          </p>
        </div>

        <div class="additional-services-grid">
          <article class="additional-service-card">
            <div class="additional-service-icon" aria-hidden="true">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M5 9H8" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                <path d="M4 13H9" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                <path d="M6 17H10" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                <path d="M14 8L19 5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                <path d="M14 16L19 19" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                <circle cx="12.5" cy="12" r="2.5" stroke="currentColor" stroke-width="1.8"/>
              </svg>
            </div>
            <h3 class="additional-service-card-title" data-t="add1_title">Digital Branding</h3>
            <p class="additional-service-card-text" data-t="add1_desc">Building strong digital identities that resonate with your target audience.</p>
          </article>

          <article class="additional-service-card">
            <div class="additional-service-icon" aria-hidden="true">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 15V9" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                <path d="M20 16V8" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                <path d="M9 18V6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                <path d="M14.5 13.5L20 8" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M16.5 8H20V11.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </div>
            <h3 class="additional-service-card-title" data-t="add2_title">Advertising</h3>
            <p class="additional-service-card-text" data-t="add2_desc">Data-driven marketing strategies to maximize your ROI and reach.</p>
          </article>

          <article class="additional-service-card">
            <div class="additional-service-icon" aria-hidden="true">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="4" y="5" width="6" height="6" rx="1.5" stroke="currentColor" stroke-width="1.8"/>
                <rect x="14" y="5" width="6" height="6" rx="1.5" stroke="currentColor" stroke-width="1.8"/>
                <rect x="4" y="15" width="6" height="6" rx="1.5" stroke="currentColor" stroke-width="1.8"/>
                <path d="M16 17L20 21" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                <path d="M20 17L16 21" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
              </svg>
            </div>
            <h3 class="additional-service-card-title" data-t="add3_title">UI/UX Design</h3>
            <p class="additional-service-card-text" data-t="add3_desc">Creating intuitive and visually stunning interfaces for better engagement.</p>
          </article>

          <article class="additional-service-card">
            <div class="additional-service-icon" aria-hidden="true">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="8" cy="9" r="2.5" stroke="currentColor" stroke-width="1.8"/>
                <circle cx="16.5" cy="10" r="2" stroke="currentColor" stroke-width="1.8"/>
                <path d="M3.5 18C4.3 15.8 6.2 14.5 8.5 14.5C10.8 14.5 12.7 15.8 13.5 18" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                <path d="M14 17.5C14.5 16 15.9 15 17.5 15C19.1 15 20.3 15.8 21 17.2" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
              </svg>
            </div>
            <h3 class="additional-service-card-title" data-t="add4_title">Business Consultant</h3>
            <p class="additional-service-card-text" data-t="add4_desc">Strategic advisory to optimize business processes and scalability.</p>
          </article>

          <article class="additional-service-card">
            <div class="additional-service-icon" aria-hidden="true">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 9H20" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                <path d="M6 9V18.5H18V9" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/>
                <path d="M9 18.5V13H15V18.5" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/>
                <path d="M3 9L12 4L21 9" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </div>
            <h3 class="additional-service-card-title" data-t="add5_title">Accounting Consultant</h3>
            <p class="additional-service-card-text" data-t="add5_desc">Professional financial management and reporting for your tech assets.</p>
          </article>

          <article class="additional-service-card">
            <div class="additional-service-icon" aria-hidden="true">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="10" cy="8" r="3" stroke="currentColor" stroke-width="1.8"/>
                <path d="M4.5 18.5C5.4 15.8 7.4 14.2 10 14.2C12.6 14.2 14.6 15.8 15.5 18.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                <circle cx="18" cy="17" r="2.5" stroke="currentColor" stroke-width="1.8"/>
                <path d="M19.8 18.8L22 21" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
              </svg>
            </div>
            <h3 class="additional-service-card-title" data-t="add6_title">HR Consultant</h3>
            <p class="additional-service-card-text" data-t="add6_desc">Talent acquisition and management strategies for digital-first teams.</p>
          </article>
        </div>
      </div>
    </section>

    <section class="service-value-section" aria-labelledby="service-value-title">
      <div class="service-value-inner">
        <div class="service-value-head">
          <div class="service-value-kicker" data-t="val_kicker">Our Value</div>
          <h2 class="service-value-title" id="service-value-title" data-t="val_title">Why Choose Hexavara</h2>
          <p class="service-value-description" data-t="val_desc">
            Excellence in Project Execution, Strategic Oversight, Trusted Technology Partner.
          </p>
        </div>

        <div class="service-value-grid">
          <article class="service-value-card">
            <div class="service-value-icon" aria-hidden="true">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="4" y="4" width="16" height="16" rx="3" stroke="currentColor" stroke-width="1.8"/>
                <path d="M8 2V6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                <path d="M16 2V6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                <path d="M8 11H16" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                <path d="M8 15H12" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
              </svg>
            </div>
            <h3 class="service-value-card-title" data-t="val1_title">Roadmap for Timeline</h3>
            <p class="service-value-card-text" data-t="val1_desc">Our roadmap contains a detailed list of tasks and project timelines that you can monitor at any time. Each roadmap is created based on mutual agreement.</p>
          </article>

          <article class="service-value-card">
            <div class="service-value-icon" aria-hidden="true">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="12" cy="12" r="8" stroke="currentColor" stroke-width="1.8"/>
                <path d="M12 7V12L15.5 10.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M5 5L3 3" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                <path d="M19 5L21 3" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
              </svg>
            </div>
            <h3 class="service-value-card-title" data-t="val2_title">Weekly Sprint Monitoring</h3>
            <p class="service-value-card-text" data-t="val2_desc">This feature helps control sprints, ensuring our programmers work according to the time you've purchased. It also guarantees that your project is success.</p>
          </article>

          <article class="service-value-card">
            <div class="service-value-icon" aria-hidden="true">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 3L18 5.5V10.5C18 14.3 15.6 17.7 12 19C8.4 17.7 6 14.3 6 10.5V5.5L12 3Z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/>
                <path d="M9.5 10.8L11.2 12.5L14.7 9" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </div>
            <h3 class="service-value-card-title" data-t="val3_title">Maximum Service</h3>
            <p class="service-value-card-text" data-t="val3_desc">We guarantee maximum service with bug fixes and improvements handled within 48 hours. This feature allows you to easily track your requests.</p>
          </article>

          <article class="service-value-card">
            <div class="service-value-icon" aria-hidden="true">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="8" cy="9" r="2.5" stroke="currentColor" stroke-width="1.8"/>
                <circle cx="16" cy="8" r="2" stroke="currentColor" stroke-width="1.8"/>
                <path d="M4 18C4.8 15.8 6.6 14.5 8.8 14.5C11 14.5 12.8 15.8 13.6 18" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                <path d="M13.5 17C14.1 15.7 15.4 14.8 16.9 14.8C18.5 14.8 19.8 15.7 20.5 17.2" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
              </svg>
            </div>
            <h3 class="service-value-card-title" data-t="val4_title">Monitor Team Performance</h3>
            <p class="service-value-card-text" data-t="val4_desc">Each of our talents has daily and monthly targets aligned with the time you've purchased. They compete to deliver their best performance.</p>
          </article>
        </div>
      </div>
    </section>
  </main>
</div>

@push('scripts')
<script>
var pageTranslations = {
    en: {
        hero_title: 'Transforming Ideas into<br /><span class="service-hero-accent">Digital Excellence</span>',
        hero_desc: 'Professional software solutions tailored to your business needs. We bridge the gap between vision and reality with high-end engineering and strategic innovation.',
        hero_btn: 'Consult Now',
        stat_clients: 'Happy Clients', stat_projects: 'Projects Delivered', stat_retention: 'Client Retention',
        offerings_title: 'Our Services',
        card1_title: 'Software Development',
        card1_desc: 'Elevate your digital presence with our software development services. We specialize in crafting bespoke solutions to your business needs, ensuring seamless functionality and user-centric experiences. Our expert team employs the latest technologies to deliver scalable, high-performance software that propels your business forward.',
        card2_title: 'Startup & Incubator',
        card2_desc: 'Navigate the complexities of startup success with our expert consultancy services. From ideation to execution, we offer strategic guidance to optimize your business model. With bunch of investor partner behind us we will help to accelerate growth of your startup. Make a collaboration with us to turn your entrepreneurial vision into reality.',
        card3_title: 'Managed Services',
        card3_desc: 'Optimize your IT infrastructure with our comprehensive managed services. We provide comprehensive solutions, including proactive system monitoring, and strategic IT planning. Trust us to optimize your technology segment, ensuring most effective operations and allowing you to stay ahead in the digital landscape.',
        card_learn: 'Learn More', card_learn2: 'Learn More', card_learn3: 'Learn More',
        additional_title: 'Additional Services',
        additional_desc: 'Comprehensive support for every aspect of your business growth.',
        add1_title: 'Digital Branding', add1_desc: 'Building strong digital identities that resonate with your target audience.',
        add2_title: 'Advertising', add2_desc: 'Data-driven marketing strategies to maximize your ROI and reach.',
        add3_title: 'UI/UX Design', add3_desc: 'Creating intuitive and visually stunning interfaces for better engagement.',
        add4_title: 'Business Consultant', add4_desc: 'Strategic advisory to optimize business processes and scalability.',
        add5_title: 'Accounting Consultant', add5_desc: 'Professional financial management and reporting for your tech assets.',
        add6_title: 'HR Consultant', add6_desc: 'Talent acquisition and management strategies for digital-first teams.',
        val_kicker: 'Our Value', val_title: 'Why Choose Hexavara',
        val_desc: 'Excellence in Project Execution, Strategic Oversight, Trusted Technology Partner.',
        val1_title: 'Roadmap for Timeline', val1_desc: 'Our roadmap contains a detailed list of tasks and project timelines that you can monitor at any time. Each roadmap is created based on mutual agreement.',
        val2_title: 'Weekly Sprint Monitoring', val2_desc: 'This feature helps control sprints, ensuring our programmers work according to the time you\'ve purchased. It also guarantees that your project is success.',
        val3_title: 'Maximum Service', val3_desc: 'We guarantee maximum service with bug fixes and improvements handled within 48 hours. This feature allows you to easily track your requests.',
        val4_title: 'Monitor Team Performance', val4_desc: 'Each of our talents has daily and monthly targets aligned with the time you\'ve purchased. They compete to deliver their best performance.'
    },
    id: {
        hero_title: 'Mengubah Ide Menjadi<br /><span class="service-hero-accent">Keunggulan Digital</span>',
        hero_desc: 'Solusi perangkat lunak profesional yang disesuaikan dengan kebutuhan bisnis Anda. Kami menjembatani kesenjangan antara visi dan realitas dengan rekayasa tingkat tinggi dan inovasi strategis.',
        hero_btn: 'Konsultasi Sekarang',
        stat_clients: 'Klien Puas', stat_projects: 'Proyek Terselesaikan', stat_retention: 'Retensi Klien',
        offerings_title: 'Layanan Kami',
        card1_title: 'Pengembangan Software',
        card1_desc: 'Tingkatkan kehadiran digital Anda dengan layanan pengembangan software kami. Kami berspesialisasi dalam menciptakan solusi yang disesuaikan dengan kebutuhan bisnis Anda, memastikan fungsionalitas yang mulus dan pengalaman yang berpusat pada pengguna.',
        card2_title: 'Startup & Inkubator',
        card2_desc: 'Navigasi kompleksitas kesuksesan startup dengan layanan konsultasi ahli kami. Dari ide hingga eksekusi, kami menawarkan panduan strategis untuk mengoptimalkan model bisnis Anda. Dengan mitra investor di belakang kami, kami akan membantu mempercepat pertumbuhan startup Anda.',
        card3_title: 'Layanan Terkelola',
        card3_desc: 'Optimalkan infrastruktur TI Anda dengan layanan terkelola komprehensif kami. Kami menyediakan solusi lengkap, termasuk pemantauan sistem proaktif dan perencanaan TI strategis.',
        card_learn: 'Selengkapnya', card_learn2: 'Selengkapnya', card_learn3: 'Selengkapnya',
        additional_title: 'Layanan Tambahan',
        additional_desc: 'Dukungan komprehensif untuk setiap aspek pertumbuhan bisnis Anda.',
        add1_title: 'Branding Digital', add1_desc: 'Membangun identitas digital yang kuat yang beresonansi dengan audiens target Anda.',
        add2_title: 'Periklanan', add2_desc: 'Strategi pemasaran berbasis data untuk memaksimalkan ROI dan jangkauan Anda.',
        add3_title: 'Desain UI/UX', add3_desc: 'Menciptakan antarmuka intuitif dan visual yang memukau untuk keterlibatan yang lebih baik.',
        add4_title: 'Konsultan Bisnis', add4_desc: 'Penasehat strategis untuk mengoptimalkan proses bisnis dan skalabilitas.',
        add5_title: 'Konsultan Akuntansi', add5_desc: 'Manajemen keuangan profesional dan pelaporan untuk aset teknologi Anda.',
        add6_title: 'Konsultan SDM', add6_desc: 'Strategi akuisisi dan manajemen talenta untuk tim digital.',
        val_kicker: 'Nilai Kami', val_title: 'Mengapa Memilih Hexavara',
        val_desc: 'Keunggulan dalam Eksekusi Proyek, Pengawasan Strategis, Mitra Teknologi Terpercaya.',
        val1_title: 'Roadmap Timeline', val1_desc: 'Roadmap kami berisi daftar tugas dan jadwal proyek yang dapat Anda pantau kapan saja. Setiap roadmap dibuat berdasarkan kesepakatan bersama.',
        val2_title: 'Monitoring Sprint Mingguan', val2_desc: 'Fitur ini membantu mengontrol sprint, memastikan programmer kami bekerja sesuai waktu yang Anda beli. Ini juga menjamin proyek Anda sukses.',
        val3_title: 'Layanan Maksimal', val3_desc: 'Kami menjamin layanan maksimal dengan perbaikan bug dan peningkatan ditangani dalam 48 jam. Fitur ini memungkinkan Anda melacak permintaan dengan mudah.',
        val4_title: 'Monitor Performa Tim', val4_desc: 'Setiap talenta kami memiliki target harian dan bulanan sesuai waktu yang Anda beli. Mereka berkompetisi untuk memberikan performa terbaik.'
    }
};
</script>
@endpush
@endsection
