@extends('layouts.app')

@section('title', 'Hexavara - About Us')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/about_us.css') }}" />
@endpush

@section('content')
<div class="about-us">
  <div class="main">
    <div class="hero-section">
      <img class="biru-modern-ucapan-selamat-ulang-tahun-instagram-post-2-4" src="{{ asset('assets/img/Biru Modern Ucapan Selamat Ulang Tahun Instagram Post (2) 4.png') }}" alt="Hexavara hero background" />
      <div class="container49">
        <div class="container50">
          <div class="overlay2"><div class="text22" data-t="hero_est">Est. 2013</div></div>
          <div class="heading-1">
            <div class="hi-we-are-hexavara-tech">
              <span>
                <span class="hi-we-are-hexavara-tech-span" data-t="hero_greeting">Hi, we are</span><br />
                <span class="hi-we-are-hexavara-tech-span2">Hexavara Tech.</span>
              </span>
            </div>
          </div>
          <div class="container51">
            <div class="founded-in-2013-by-its-students-hexavara-has-grown-from-an-academic-dream-into-a-powerhouse-of-digital-innovation-our-journey-began-with-a-shared-passion-for-technology-and-a-vision-to-transform-the-digital-landscape" data-t="hero_desc" data-t-html>
              Founded in 2013 by ITS students, Hexavara has grown<br />from an academic dream into a powerhouse of digital innovation. Our journey began with a shared passion for technology and a vision to transform the digital landscape.
            </div>
          </div>
          <div class="container52">
            <a href="{{ route('contact') }}" style="text-decoration:none"><div class="consult-now2" data-t="hero_btn">Consult Now</div></a>
          </div>
        </div>
        <div class="container53" aria-hidden="true">
          <img class="hero-about-visual" src="{{ asset('assets/img/hero_aboutus.png') }}" alt="Hexavara team and workspace" />
        </div>
      </div>
    </div>

    <div class="rectangle-40"></div>
    <div class="rectangle-41"></div>
    <div class="rectangle-39"></div>

    {{-- Quote Section --}}
    <div class="quote-section">
      <div class="container">
        <img class="container2" src="{{ asset('assets/img/quote.png') }}" />
        <div class="heading-2">
          <div class="text" data-t="quote_text" data-t-html>&quot;The best idea is a comprehensive solution that<br />bridges the gap between vision and reality.&quot;</div>
        </div>
        <div class="background"></div>
      </div>
    </div>

    {{-- Core Values --}}
    <div class="container3">
      <div class="heading-22"><div class="our-core-values" data-t="values_title">Our Core Values</div></div>
      <div class="container4"><div class="text2" data-t="values_subtitle" data-t-html>The principles that guide every line of code we write and every partnership we<br />build.</div></div>
    </div>
    <div class="container5">
      <div class="value-1">
        <div class="value-icon" aria-hidden="true">
          <svg width="28" height="28" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 3.5L14.3 8.2L19.5 8.9L15.7 12.6L16.6 17.8L12 15.4L7.4 17.8L8.3 12.6L4.5 8.9L9.7 8.2L12 3.5Z" stroke="#001F3F" stroke-width="1.8" stroke-linejoin="round"/>
            <path d="M9 14.8V20.2L12 18.6L15 20.2V14.8" stroke="#001F3F" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </div>
        <div class="heading-3"><div class="competitive-excellence" data-t="value1_title">Competitive Excellence</div></div>
        <div class="container7"><div class="we-compete-to-win-every-strategy-decision-and-execution-is-designed-to-position-our-clients-ahead-in-the-final-lap" data-t="value1_desc">We compete to win. Every strategy, decision, and execution is designed to position our clients ahead in the final lap.</div></div>
      </div>
      <div class="value-2">
        <div class="value-icon" aria-hidden="true">
          <svg width="28" height="28" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect x="7" y="7" width="10" height="10" rx="2.2" stroke="#001F3F" stroke-width="1.8"/>
            <path d="M10.3 12H13.7" stroke="#001F3F" stroke-width="1.8" stroke-linecap="round"/>
            <path d="M12 10.3V13.7" stroke="#001F3F" stroke-width="1.8" stroke-linecap="round"/>
          </svg>
        </div>
        <div class="heading-32"><div class="technology-driven-innovation" data-t="value2_title">Technology-Driven Innovation</div></div>
        <div class="container10"><div class="we-leverage-smart-adaptive-and-forward-thinking-solutions-to-create-sustainable-competitive-advantage" data-t="value2_desc">We leverage smart, adaptive, and forward-thinking solutions to create sustainable competitive advantage.</div></div>
      </div>
      <div class="value-3">
        <div class="value-icon" aria-hidden="true">
          <svg width="28" height="28" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M4 15.2C4.9 12 7.9 9.6 11.5 9.6C15.8 9.6 19.3 13.1 19.3 17.4" stroke="#001F3F" stroke-width="1.8" stroke-linecap="round"/>
            <path d="M11.8 5L8.9 11.1H12.2L10.8 16.4L15.4 9.4H12.1L13.4 5H11.8Z" fill="#001F3F"/>
            <circle cx="19.3" cy="17.4" r="1.6" fill="#001F3F"/>
          </svg>
        </div>
        <div class="heading-33"><div class="speed-performance" data-t="value3_title">Speed &amp; Performance</div></div>
        <div class="container7"><div class="speed-defines-us-we-move-fast-execute-with-precision-and-focus-on-measurable-results-to-ensure-peak-performance-at-every-stage" data-t="value3_desc">Speed defines us. We move fast, execute with precision, and focus on measurable results to ensure peak performance at every stage.</div></div>
      </div>
    </div>

    {{-- Video Section --}}
    <div class="video-section">
      <div class="container37">
        <div class="container38">
          <div class="heading-23"><div class="text14" data-t="video_title">Pioneering Excellence Since 2016</div></div>
          <div class="container39"><div class="text15" data-t="video_desc" data-t-html>Take a look at our journey and how we have evolved to become a leading tech<br />solutions provider.</div></div>
        </div>
        <div class="background4">
          <a class="video-link-card" href="https://www.youtube.com/watch?v=UC3PbMpkEtM" target="_blank" rel="noopener noreferrer" aria-label="Watch Hexavara Tech video on YouTube">
            <img class="video-thumbnail" src="https://img.youtube.com/vi/UC3PbMpkEtM/maxresdefault.jpg" alt="Pioneering Excellence Since 2016" onerror="this.src='https://img.youtube.com/vi/UC3PbMpkEtM/hqdefault.jpg'" />
            <span class="video-link-overlay"></span>
            <span class="video-link-content">
              <span class="video-play-button" aria-hidden="true">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8 6.5V17.5L17 12L8 6.5Z" fill="currentColor"/></svg>
              </span>
              <span class="video-link-text">
                <span class="video-link-label">Watch on YouTube</span>
                <span class="video-link-caption">Opens the full company profile video in a new tab.</span>
              </span>
            </span>
          </a>
        </div>
      </div>
    </div>

    {{-- Team Section --}}
    <div class="the-dedicated-squad-section">
      <div class="container12">
        <div class="container13">
          <div class="heading-22"><div class="text3" data-t="team_title">Meet Our Key Team</div></div>
          <div class="container14"><div class="text4" data-t="team_subtitle" data-t-html>Meet the brilliant minds behind Hexavara&#039;s success—a team of<br />passionate engineers, designers, and visionaries.</div></div>
        </div>
      </div>
      <div class="container16">
        @foreach($teamMembers as $member)
        <div class="member-{{ $loop->iteration }}">
          <div class="background2">
            <img class="member-photo" src="{{ asset('assets/img/' . $member->photo) }}" alt="{{ $member->name }}" />
          </div>
          <div class="container17">
            <div class="heading-4"><div class="alex-chen">{{ $member->name }}</div></div>
            <div class="container17"><div class="text5">{{ $member->position }}</div></div>
          </div>
        </div>
        @endforeach
      </div>
    </div>

    {{-- Client Logos --}}
    <div class="clients-logos">
      @foreach($clients->take(14) as $client)
      <img class="client-logo" src="{{ asset('assets/img/' . $client->logo) }}" alt="{{ $client->name }}" />
      @endforeach
    </div>

    {{-- Testimonials --}}
    <div class="testimonials-section">
      <div class="testimonials-header">
        <div class="testimonials-title" data-t="testimonials_title">Hear From Our Clients</div>
        <div class="testimonials-subtitle" data-t="testimonials_subtitle">Trust from industry leaders across the globe.</div>
      </div>
      <div class="testimonials-grid">
        @foreach($testimonials as $testimonial)
        <div class="testimonial-card">
          <div class="testimonial-stars">
            @for($i = 0; $i < $testimonial->rating; $i++)
            <svg width="20" height="20" viewBox="0 0 24 24" fill="#FFD700" xmlns="http://www.w3.org/2000/svg"><polygon points="12,2 15.09,10.26 23.36,10.26 17.54,15.46 19.63,23.72 12,18.52 4.37,23.72 6.46,15.46 0.64,10.26 8.91,10.26"/></svg>
            @endfor
          </div>
          <div class="testimonial-quote">&quot;{{ $testimonial->quote }}&quot;</div>
          <div class="testimonial-author">
            <div class="testimonial-avatar">
              @php $colors = ['#3B82F6','#8B5CF6','#10B981']; @endphp
              <svg class="profile-avatar" width="48" height="48" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="30" cy="30" r="30" fill="{{ $colors[$loop->index % 3] }}"/>
                <circle cx="30" cy="22" r="10" fill="white" fill-opacity="0.9"/>
                <path d="M10 52C10 40.95 19.4 32 30 32C40.6 32 50 40.95 50 52" fill="white" fill-opacity="0.9"/>
              </svg>
            </div>
            <div class="testimonial-author-meta">
              <div class="testimonial-name">{{ $testimonial->name }}</div>
              <div class="testimonial-role">{{ $testimonial->role }}</div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div>

@push('scripts')
<script>
var pageTranslations = {
    en: {
        hero_est: 'Est. 2013',
        hero_greeting: 'Hi, we are',
        hero_desc: 'Founded in 2013 by ITS students, Hexavara has grown<br />from an academic dream into a powerhouse of digital innovation. Our journey began with a shared passion for technology and a vision to transform the digital landscape.',
        hero_btn: 'Consult Now',
        quote_text: '"The best idea is a comprehensive solution that<br />bridges the gap between vision and reality."',
        values_title: 'Our Core Values',
        values_subtitle: 'The principles that guide every line of code we write and every partnership we<br />build.',
        value1_title: 'Competitive Excellence',
        value1_desc: 'We compete to win. Every strategy, decision, and execution is designed to position our clients ahead in the final lap.',
        value2_title: 'Technology-Driven Innovation',
        value2_desc: 'We leverage smart, adaptive, and forward-thinking solutions to create sustainable competitive advantage.',
        value3_title: 'Speed & Performance',
        value3_desc: 'Speed defines us. We move fast, execute with precision, and focus on measurable results to ensure peak performance at every stage.',
        video_title: 'Pioneering Excellence Since 2016',
        video_desc: 'Take a look at our journey and how we have evolved to become a leading tech<br />solutions provider.',
        team_title: 'Meet Our Key Team',
        team_subtitle: 'Meet the brilliant minds behind Hexavara\u2019s success\u2014a team of<br />passionate engineers, designers, and visionaries.',
        testimonials_title: 'Hear From Our Clients',
        testimonials_subtitle: 'Trust from industry leaders across the globe.'
    },
    id: {
        hero_est: 'Est. 2013',
        hero_greeting: 'Hai, kami adalah',
        hero_desc: 'Didirikan pada 2013 oleh mahasiswa ITS, Hexavara telah berkembang<br />dari mimpi akademis menjadi kekuatan inovasi digital. Perjalanan kami dimulai dengan semangat bersama untuk teknologi dan visi untuk mentransformasi lanskap digital.',
        hero_btn: 'Konsultasi Sekarang',
        quote_text: '"Ide terbaik adalah solusi komprehensif yang<br />menjembatani kesenjangan antara visi dan realitas."',
        values_title: 'Nilai Inti Kami',
        values_subtitle: 'Prinsip-prinsip yang memandu setiap baris kode yang kami tulis dan setiap kemitraan yang kami<br />bangun.',
        value1_title: 'Keunggulan Kompetitif',
        value1_desc: 'Kami bersaing untuk menang. Setiap strategi, keputusan, dan eksekusi dirancang untuk memposisikan klien kami di depan.',
        value2_title: 'Inovasi Berbasis Teknologi',
        value2_desc: 'Kami memanfaatkan solusi yang cerdas, adaptif, dan berpikiran maju untuk menciptakan keunggulan kompetitif yang berkelanjutan.',
        value3_title: 'Kecepatan & Performa',
        value3_desc: 'Kecepatan mendefinisikan kami. Kami bergerak cepat, eksekusi dengan presisi, dan fokus pada hasil terukur untuk memastikan performa puncak di setiap tahap.',
        video_title: 'Merintis Keunggulan Sejak 2016',
        video_desc: 'Lihat perjalanan kami dan bagaimana kami telah berkembang menjadi penyedia solusi teknologi<br />terkemuka.',
        team_title: 'Temui Tim Kunci Kami',
        team_subtitle: 'Kenali pemikir brilian di balik kesuksesan Hexavara\u2014tim<br />insinyur, desainer, dan visioner yang penuh semangat.',
        testimonials_title: 'Dengarkan dari Klien Kami',
        testimonials_subtitle: 'Dipercaya oleh pemimpin industri di seluruh dunia.'
    }
};
</script>
@endpush
@endsection
