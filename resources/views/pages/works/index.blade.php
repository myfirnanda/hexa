@extends('layouts.app')

@section('title', 'Hexavara - Works')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/works.css') }}" />
@endpush

@section('content')
<div class="clients-page">
  <main>
    <section class="hero-section">
      <div class="hero-banner"></div>

      <div class="hero-mosaic" aria-hidden="true">
        <div class="mosaic-grid">
          <div class="mosaic-tile"><img src="{{ asset('assets/img/proyek_all_wika.svg') }}" alt="" /></div>
          <div class="mosaic-tile"><img src="{{ asset('assets/img/proyek_all_telkom.svg') }}" alt="" /></div>
          <div class="mosaic-tile"><img src="{{ asset('assets/img/proyek_all_beraucoal.jpg') }}" alt="" /></div>
          <div class="mosaic-tile"><img src="{{ asset('assets/img/proyek_all_calcius.jpg') }}" alt="" /></div>
          <div class="mosaic-tile"><img src="{{ asset('assets/img/proyek_all_industri.jpg') }}" alt="" /></div>
          <div class="mosaic-tile"><img src="{{ asset('assets/img/proyek_all_bmt.jpg') }}" alt="" /></div>
          <div class="mosaic-tile"><img src="{{ asset('assets/img/proyek_all_unilever.svg') }}" alt="" /></div>
          <div class="mosaic-tile"><img src="{{ asset('assets/img/proyek_all_kana.jpg') }}" alt="" /></div>
          <div class="mosaic-tile"><img src="{{ asset('assets/img/proyek_all_ppdb.jpg') }}" alt="" /></div>
          <div class="mosaic-tile"><img src="{{ asset('assets/img/proyek_all_pamekasan.svg') }}" alt="" /></div>
          <div class="mosaic-tile"><img src="{{ asset('assets/img/proyek_all_zelltech.svg') }}" alt="" /></div>
          <div class="mosaic-tile"><img src="{{ asset('assets/img/proyek_all_beraucoal.jpg') }}" alt="" /></div>
          <div class="mosaic-tile"><img src="{{ asset('assets/img/proyek_all_telkom.svg') }}" alt="" /></div>
          <div class="mosaic-tile"><img src="{{ asset('assets/img/proyek_all_wika.svg') }}" alt="" /></div>
          <div class="mosaic-tile"><img src="{{ asset('assets/img/proyek_all_calcius.jpg') }}" alt="" /></div>
          <div class="mosaic-tile"><img src="{{ asset('assets/img/proyek_all_industri.jpg') }}" alt="" /></div>
          <div class="mosaic-tile"><img src="{{ asset('assets/img/proyek_all_bmt.jpg') }}" alt="" /></div>
          <div class="mosaic-tile"><img src="{{ asset('assets/img/proyek_all_kana.jpg') }}" alt="" /></div>
          <div class="mosaic-tile"><img src="{{ asset('assets/img/proyek_all_pamekasan.svg') }}" alt="" /></div>
          <div class="mosaic-tile"><img src="{{ asset('assets/img/proyek_all_ppdb.jpg') }}" alt="" /></div>
        </div>
      </div>

      <div class="hero-content">
        <h1 class="hero-title" data-t="hero_title" data-t-html>
          Consult, Design,<br />
          &amp; <span class="hero-accent">Develop</span>
        </h1>
        <p class="hero-description" data-t="hero_desc">
          Help businesses realize their digitalization goals. Use Free 60-minute consultation
          to start your digital journey.
        </p>
      </div>
    </section>

    <section class="wc-section" id="works-projects">
      <div class="wc-inner">
        <div class="wc-section-head">
          <h2 class="wc-section-title" data-t="works_title">Our Works</h2>
          <p class="wc-section-desc" data-t="works_desc">
            Experience innovation, explore excellence. Our Works exhibit a harmonious blend of
            creativity and functionality, setting new standards in design and client satisfaction.
          </p>
        </div>

        <div class="wc-filters">
          <button type="button" class="wc-chip active" data-filter="all" data-t="filter_all">All</button>
          <button type="button" class="wc-chip" data-filter="software-development" data-t="filter_softdev">Software Development</button>
          <button type="button" class="wc-chip" data-filter="digital-branding" data-t="filter_digital">Digital Branding</button>
          <button type="button" class="wc-chip" data-filter="startup-incubator" data-t="filter_startup">Startup Incubator</button>
          <button type="button" class="wc-chip" data-filter="it-consultant" data-t="filter_itconsult">IT Consultant</button>
        </div>

        <div class="wc-grid" id="wc-grid">
          @foreach($projects as $project)
          <a href="{{ route('works.show', $project) }}" class="wc-card" data-category="{{ $project->category }}" style="text-decoration:none;color:inherit;">
            <div class="wc-card-img">
              @if($project->image)
              <img src="{{ asset('assets/img/' . $project->image) }}" alt="{{ $project->name }}" />
              @else
              <div class="wc-card-placeholder wc-ph-blue">
                <svg width="48" height="48" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 2L2 7l10 5 10-5-10-5z" stroke="white" stroke-width="1.5" stroke-linejoin="round"/><path d="M2 17l10 5 10-5" stroke="white" stroke-width="1.5" stroke-linejoin="round"/><path d="M2 12l10 5 10-5" stroke="white" stroke-width="1.5" stroke-linejoin="round"/></svg>
              </div>
              @endif
            </div>
            <div class="wc-card-body">
              @php
                $badgeMap = [
                  'software-development' => 'badge-softdev',
                  'digital-branding' => 'badge-digital',
                  'startup-incubator' => 'badge-startup',
                  'it-consultant' => 'badge-it',
                ];
              @endphp
              <span class="wc-badge {{ $badgeMap[$project->category] ?? 'badge-softdev' }}">{{ ucwords(str_replace('-', ' ', $project->category)) }}</span>
              <h3 class="wc-card-title">{{ $project->name }}</h3>
              <p class="wc-card-text">{{ $project->description }}</p>
            </div>
          </a>
          @endforeach
        </div>

        <div class="wc-pagination" id="wc-pagination">
          <button type="button" class="wc-pg-btn" id="wc-pg-prev">&#8592;</button>
          <div class="wc-pg-numbers" id="wc-pg-numbers"></div>
          <button type="button" class="wc-pg-btn" id="wc-pg-next">&#8594;</button>
        </div>
      </div>
    </section>
  </main>
</div>

@push('scripts')
<script>
var pageTranslations = {
    en: {
        hero_title: 'Consult, Design,<br />&amp; <span class="hero-accent">Develop</span>',
        hero_desc: 'Help businesses realize their digitalization goals. Use Free 60-minute consultation to start your digital journey.',
        works_title: 'Our Works',
        works_desc: 'Experience innovation, explore excellence. Our Works exhibit a harmonious blend of creativity and functionality, setting new standards in design and client satisfaction.',
        filter_all: 'All', filter_softdev: 'Software Development', filter_digital: 'Digital Branding',
        filter_startup: 'Startup Incubator', filter_itconsult: 'IT Consultant'
    },
    id: {
        hero_title: 'Konsultasi, Desain,<br />&amp; <span class="hero-accent">Pengembangan</span>',
        hero_desc: 'Membantu bisnis mewujudkan tujuan digitalisasi mereka. Gunakan konsultasi gratis 60 menit untuk memulai perjalanan digital Anda.',
        works_title: 'Karya Kami',
        works_desc: 'Rasakan inovasi, jelajahi keunggulan. Karya kami menampilkan perpaduan harmonis antara kreativitas dan fungsionalitas, menetapkan standar baru dalam desain dan kepuasan klien.',
        filter_all: 'Semua', filter_softdev: 'Pengembangan Software', filter_digital: 'Branding Digital',
        filter_startup: 'Startup Inkubator', filter_itconsult: 'Konsultan IT'
    }
};
</script>
<script>
(function(){
  var chips = document.querySelectorAll('.wc-chip');
  var cards = document.querySelectorAll('.wc-card');
  chips.forEach(function(chip){
    chip.addEventListener('click', function(){
      chips.forEach(function(c){ c.classList.remove('active'); });
      chip.classList.add('active');
      var filter = chip.getAttribute('data-filter');
      cards.forEach(function(card){
        if(filter === 'all' || card.getAttribute('data-category') === filter){
          card.style.display = '';
        } else {
          card.style.display = 'none';
        }
      });
    });
  });
})();
</script>
@endpush
@endsection
