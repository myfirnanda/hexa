@extends('layouts.app')

@section('title', $project->name . ' — Hexavara')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/works.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/work-detail.css') }}" />
@endpush

@section('content')
@php
  $badgeMap = [
    'software-development' => 'badge-softdev',
    'digital-branding' => 'badge-digital',
    'startup-incubator' => 'badge-startup',
    'it-consultant' => 'badge-it',
  ];
  $badgeClass = $badgeMap[$project->category] ?? 'badge-softdev';
  $heroDesc = $project->hero_description ?: $project->description;
  $summaryTitle = $project->summary_title ?: ('Learning About ' . $project->name);
@endphp

<main>
    {{-- Hero --}}
    <section class="wd-hero">
        <div class="wd-hero-inner">
            <div class="wd-hero-content">
                <span class="wd-hero-badge {{ $badgeClass }}" data-t="badge_{{ str_replace('-', '', $project->category) }}">{{ ucwords(str_replace('-', ' ', $project->category)) }}</span>
                <h1 class="wd-hero-title">{{ $project->name }}</h1>
                <p class="wd-hero-desc">{{ $heroDesc }}</p>
                <a class="wd-hero-btn" href="{{ route('contact') }}">
                    <span data-t="consult_btn">Consult Now</span>
                    <span class="material-symbols-outlined" aria-hidden="true">arrow_forward</span>
                </a>
            </div>
            <div class="wd-hero-visual">
                @if($project->images && count($project->images))
                <div class="wd-hero-screenshots">
                    @foreach(array_slice($project->images, 0, 3) as $idx => $img)
                    <img class="wd-hero-screenshot wd-hero-screenshot-{{ $idx + 1 }}" src="{{ asset('assets/img/' . $img) }}" alt="{{ $project->name }} screenshot {{ $idx + 1 }}">
                    @endforeach
                </div>
                @elseif($project->image)
                <img class="wd-hero-main-img" src="{{ asset('assets/img/' . $project->image) }}" alt="{{ $project->name }}">
                @endif
            </div>
        </div>
    </section>

    {{-- Preview --}}
    @if($project->images && count($project->images))
    <section class="wd-preview">
        <div class="wd-preview-inner">
            <h2 class="wd-preview-title" data-t="preview_title">Preview Project</h2>
            <p class="wd-preview-desc" data-t="preview_desc">Get an overview of the various projects we have developed.</p>
            <div class="wd-preview-gallery">
                @foreach($project->images as $img)
                <div class="wd-preview-item">
                    <img src="{{ asset('assets/img/' . $img) }}" alt="{{ $project->name }} preview">
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- Summary / Content --}}
    @if($project->content)
    <section class="wd-summary">
        <div class="wd-summary-inner">
            <span class="wd-summary-badge" data-t="summary_badge">SUMMARY</span>
            <h2 class="wd-summary-title">{{ $summaryTitle }}</h2>
            <div class="wd-summary-content ck-content">
                {!! $project->content !!}
            </div>
            <hr class="wd-summary-divider">
        </div>
    </section>
    @endif
</main>

@push('scripts')
<script>
var pageTranslations = {
    en: {
        consult_btn: 'Consult Now',
        preview_title: 'Preview Project',
        preview_desc: 'Get an overview of the various projects we have developed.',
        summary_badge: 'SUMMARY',
        badge_softwaredevelopment: 'Software Development',
        badge_digitalbranding: 'Digital Branding',
        badge_startupincubator: 'Startup Incubator',
        badge_itconsultant: 'IT Consultant'
    },
    id: {
        consult_btn: 'Konsultasi Sekarang',
        preview_title: 'Pratinjau Proyek',
        preview_desc: 'Lihat gambaran umum berbagai proyek yang telah kami kembangkan.',
        summary_badge: 'RINGKASAN',
        badge_softwaredevelopment: 'Pengembangan Software',
        badge_digitalbranding: 'Branding Digital',
        badge_startupincubator: 'Inkubator Startup',
        badge_itconsultant: 'Konsultan IT'
    }
};
</script>
@endpush
@endsection
