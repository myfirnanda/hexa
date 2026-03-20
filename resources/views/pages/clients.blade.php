@extends('layouts.app')

@section('title', 'Hexavara - Clients')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/clients.css') }}" />
@endpush

@section('content')
<div class="clients-page">
  <main>
    <section class="hero-section">
      <div class="hero-banner"></div>
      <img class="hero-visual" src="{{ asset('assets/img/hero_clients.png') }}" alt="Hexavara hero illustration" />

      <div class="hero-content">
        <h1 class="hero-title" data-t="hero_title">Our Clients</h1>
        <p class="hero-description" data-t="hero_desc">
          We deliver on our customers' expectations by providing them with
          powerful ERP solutions that are focused on pricing, inventory
          optimization, and uptime management.
        </p>
      </div>
    </section>

    <section class="clients-section">
      <div class="section-head">
        <div class="section-kicker" data-t="section_kicker">Categorized Companies/Institutions</div>
        <h2 class="section-title" data-t="section_title">Trusted Across Sectors</h2>
        <p class="section-description" data-t="section_desc">
          Hexavara works with universities, public institutions, enterprises,
          finance, manufacturing, and lifestyle brands across Indonesia.
        </p>
      </div>

      <div class="category-chips" aria-label="Client categories">
        <button type="button" class="category-chip active" data-filter="all">All</button>
        @foreach($categories as $key => $label)
        <button type="button" class="category-chip" data-filter="{{ $key }}">{{ $label }}</button>
        @endforeach
      </div>

      <div class="category-grid all-view" id="category-grid">
        @php
          $categoryNames = [
            'education' => 'Education & Academia',
            'government' => 'Government & Public Sector',
            'soe' => 'State-Owned Enterprises (SOE) & Energy',
            'finance' => 'Banking & Finance',
            'industrial' => 'Industrial, Manufacturing & FMCG',
            'retail' => 'Retail, Services & Lifestyle',
          ];
        @endphp
        @foreach($categoryNames as $catKey => $catName)
          @php $catClients = $clients->where('category', $catKey); @endphp
          @if($catClients->count())
          <section class="category-card" data-category="{{ $catKey }}">
            <div class="category-card-header">
              <h3>{{ $catName }}</h3>
            </div>
            <div class="client-list">
              @foreach($catClients as $client)
              <article class="client-item">
                <img src="{{ asset('assets/img/' . $client->logo) }}" alt="{{ $client->name }}" />
                <div><strong>{{ $client->name }}</strong></div>
              </article>
              @endforeach
            </div>
          </section>
          @endif
        @endforeach
      </div>
    </section>
  </main>
</div>

@push('scripts')
<script>
var pageTranslations = {
    en: {
        hero_title: 'Our Clients',
        hero_desc: 'We deliver on our customers\' expectations by providing them with powerful ERP solutions that are focused on pricing, inventory optimization, and uptime management.',
        section_kicker: 'Categorized Companies/Institutions',
        section_title: 'Trusted Across Sectors',
        section_desc: 'Hexavara works with universities, public institutions, enterprises, finance, manufacturing, and lifestyle brands across Indonesia.'
    },
    id: {
        hero_title: 'Klien Kami',
        hero_desc: 'Kami memenuhi harapan pelanggan dengan menyediakan solusi ERP yang berfokus pada penetapan harga, optimalisasi inventaris, dan manajemen uptime.',
        section_kicker: 'Perusahaan/Institusi Terkategori',
        section_title: 'Dipercaya Lintas Sektor',
        section_desc: 'Hexavara bekerja sama dengan universitas, institusi publik, perusahaan, keuangan, manufaktur, dan brand gaya hidup di seluruh Indonesia.'
    }
};
</script>
<script>
(function(){
  var chips = document.querySelectorAll('.category-chip');
  var cards = document.querySelectorAll('.category-card');
  var grid = document.getElementById('category-grid');

  chips.forEach(function(chip){
    chip.addEventListener('click', function(){
      chips.forEach(function(c){ c.classList.remove('active'); });
      chip.classList.add('active');
      var filter = chip.getAttribute('data-filter');
      if(filter === 'all'){
        grid.classList.add('all-view');
        cards.forEach(function(card){ card.style.display = ''; });
      } else {
        grid.classList.remove('all-view');
        cards.forEach(function(card){
          card.style.display = card.getAttribute('data-category') === filter ? '' : 'none';
        });
      }
    });
  });
})();
</script>
@endpush
@endsection
