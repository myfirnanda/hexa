@extends('layouts.homepage')

@section('title', 'Hexavara')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/homepage1.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/homepage-responsive.css') }}" />
@endpush

@section('content')
<div class="homepage">
  {{-- Background decorations --}}
  <div class="hp-decor" aria-hidden="true">
    <div class="rectangle-37"></div>
    <div class="rectangle-27"></div>
    <div class="rectangle-5"></div>
  </div>

  {{-- Navbar --}}
  <header class="hp-nav">
    <a class="logo-home-link" href="{{ route('home') }}" aria-label="Go to homepage">
      <img class="chat-gpt-image-26-feb-2026-11-24-32-1" src="{{ asset('assets/img/ChatGPT Image 26 Feb 2026, 11.24.32.png') }}" />
    </a>
    <button class="hp-hamburger" id="hp-hamburger" type="button" aria-label="Toggle navigation" aria-expanded="false">
      <span></span><span></span><span></span>
    </button>
    <nav class="hp-nav-links" id="hp-nav-links">
      <a class="about-us" href="{{ route('about') }}" data-t="nav_about">About Us</a>
      <a class="services" href="{{ route('services.index') }}" style="text-decoration: none; color: inherit;" data-t="nav_services">Services</a>
      <button class="solutions" id="solutions-trigger" type="button" aria-haspopup="true" aria-expanded="false" aria-controls="solutions-mega-menu" data-t="nav_solutions">Solutions</button>
      <a class="works" href="{{ route('works.index') }}" style="text-decoration: none; color: inherit;" data-t="nav_works">Works</a>
    </nav>
    <div class="hp-nav-actions">
      <div class="background3" role="group" aria-label="Language switcher">
        <div class="button4 lang-btn lang-btn-active" data-lang="en" role="button" tabindex="0" aria-pressed="true">
          <div class="en">EN</div>
        </div>
        <div class="button5 lang-btn" data-lang="id" role="button" tabindex="0" aria-pressed="false">
          <div class="id">ID</div>
        </div>
      </div>
      <div class="button-shadow2"></div>
      <div class="start-a-project" onclick="window.location.href='{{ route('contact') }}'" data-t="btn_startproject">Start a Project?</div>
    </div>

    {{-- Solutions Mega Menu --}}
    <div class="solutions-mega-menu" id="solutions-mega-menu" aria-hidden="true">
      <div class="solutions-mega-menu-inner">
        <div class="solutions-mega-column">
          <h3 class="solutions-mega-title">Solution by Service</h3>
          <div class="solutions-mega-list">
            <a class="solutions-mega-link" href="#"><span class="material-symbols-outlined" aria-hidden="true">account_tree</span><span>Enterprise Resource Planning</span></a>
            <a class="solutions-mega-link" href="#"><span class="material-symbols-outlined" aria-hidden="true">groups</span><span>Customer Relationship Management</span></a>
            <a class="solutions-mega-link" href="#"><span class="material-symbols-outlined" aria-hidden="true">query_stats</span><span>Business Intelligence &amp; Analytics</span></a>
            <a class="solutions-mega-link" href="#"><span class="material-symbols-outlined" aria-hidden="true">cloud_sync</span><span>Cloud Migration &amp; Strategy</span></a>
            <a class="solutions-mega-link" href="#"><span class="material-symbols-outlined" aria-hidden="true">verified_user</span><span>Cybersecurity &amp; Compliance</span></a>
          </div>
        </div>
        <div class="solutions-mega-column">
          <h3 class="solutions-mega-title">Solution by Industry</h3>
          <div class="solutions-mega-list">
            <a class="solutions-mega-link solutions-mega-link-industry" href="#"><span class="material-symbols-outlined" aria-hidden="true">shopping_bag</span><span>Consumer Goods</span></a>
            <a class="solutions-mega-link solutions-mega-link-industry" href="#"><span class="material-symbols-outlined" aria-hidden="true">monitor_heart</span><span>Healthcare</span></a>
            <a class="solutions-mega-link solutions-mega-link-industry" href="#"><span class="material-symbols-outlined" aria-hidden="true">conveyor_belt</span><span>Supply Chain</span></a>
          </div>
        </div>
        <div class="solutions-mega-column">
          <h3 class="solutions-mega-title">Ready to Use Platform</h3>
          <div class="solutions-platform-list">
            <div class="solutions-platform-item"><div class="solutions-platform-icon solutions-platform-icon-teal"><span class="material-symbols-outlined" aria-hidden="true">diversity_3</span></div><div><p class="solutions-platform-name">Crowdfunding</p><p class="solutions-platform-meta">Platform</p></div></div>
            <div class="solutions-platform-item"><div class="solutions-platform-icon solutions-platform-icon-red"><span class="material-symbols-outlined" aria-hidden="true">account_balance_wallet</span></div><div><p class="solutions-platform-name">Corporate Budgeting</p><p class="solutions-platform-meta">Platform</p></div></div>
            <div class="solutions-platform-item"><div class="solutions-platform-icon solutions-platform-icon-orange"><span class="material-symbols-outlined" aria-hidden="true">shopping_cart</span></div><div><p class="solutions-platform-name">E-Commerce</p><p class="solutions-platform-meta">Platform</p></div></div>
            <div class="solutions-platform-item"><div class="solutions-platform-icon solutions-platform-icon-green"><span class="material-symbols-outlined" aria-hidden="true">event</span></div><div><p class="solutions-platform-name">Event Management</p><p class="solutions-platform-meta">Platform</p></div></div>
            <div class="solutions-platform-item"><div class="solutions-platform-icon solutions-platform-icon-blue"><span class="material-symbols-outlined" aria-hidden="true">storefront</span></div><div><p class="solutions-platform-name">Multi-Merchant</p><p class="solutions-platform-meta">Platform</p></div></div>
          </div>
        </div>
      </div>
    </div>
  </header>

  {{-- Hero --}}
  <section class="hp-hero">
    <img class="biru-modern-ucapan-selamat-ulang-tahun-instagram-post-2-4" src="{{ asset('assets/img/Biru Modern Ucapan Selamat Ulang Tahun Instagram Post (2) 4.png') }}" />
    @php $heroImages = ['hero_homepage1.png','hero_homepage2.png','hero_homepage3.png']; @endphp
    <img class="hero-homepage1-stack" src="{{ asset('assets/img/' . $heroImages[array_rand($heroImages)]) }}" alt="Hero image" />
    <div class="transforming-ideas-into-digital-excellence">
      <span>
        <span class="transforming-ideas-into-digital-excellence-span" data-t="hero_line1" data-t-html>Transforming<br />Ideas into</span>
        <span class="transforming-ideas-into-digital-excellence-span2" data-t="hero_line2" data-t-html>Digital<br />Excellence</span>
      </span>
    </div>
    <div class="enhance-your-business-capabilities-to-innovate-and-compete-in-today-s-dynamic-market-by-harnessing-the-power-of-data" data-t="hero_desc" data-t-html>
      Enhance your business capabilities to innovate and compete in today's dynamic market by harnessing the power of data.<br />
    </div>
    <div class="hero-btn-group">
      <div class="button-shadow3"></div>
      <div class="consult-now2" onclick="window.location.href='{{ route('contact') }}'" data-t="btn_consult">Consult Now</div>
      <div class="hero-start-project" onclick="window.location.href='{{ route('contact') }}'" data-t="btn_startproject">Start a Project?</div>
    </div>
  </section>

  {{-- Collaboration --}}
  <section class="hp-collab">
    <div class="heading-3">
      <div class="we-have-collaborated-with-50-client-partners-from-big-company-and-foundation-all-over-indonesia">
        <span>
          <span class="we-have-collaborated-with-50-client-partners-from-big-company-and-foundation-all-over-indonesia-span" data-t="collab_before">We have collaborated with </span>
          <span class="we-have-collaborated-with-50-client-partners-from-big-company-and-foundation-all-over-indonesia-span2" data-t="collab_highlight">50+ client partners</span>
          <span class="we-have-collaborated-with-50-client-partners-from-big-company-and-foundation-all-over-indonesia-span" data-t="collab_after" data-t-html> from<br />Big Company and foundation all over Indonesia.</span>
        </span>
      </div>
    </div>
    <div class="background"></div>
  </section>

  {{-- Client Logos --}}
  <section class="hp-clients">
    <div class="clients-logos">
      @foreach($clients->take(14) as $client)
      <img class="client-logo" src="{{ asset('assets/img/' . $client->logo) }}" alt="{{ $client->name }}" loading="lazy" />
      @endforeach
    </div>
    <a class="button6" href="{{ route('clients') }}"><div class="view-all" data-t="btn_viewall">View All</div></a>
  </section>

  {{-- Stats --}}
  <section class="hp-stats">
    <div class="container">
      <div class="container2"><div class="_77" data-count-target="77" data-count-suffix="+">0+</div></div>
      <div class="container2"><div class="text" data-t="stat_clients">Happy Clients</div></div>
    </div>
    <div class="container3">
      <div class="container2"><div class="text2" data-count-target="116" data-count-suffix="+">0+</div></div>
      <div class="container2"><div class="text3" data-t="stat_projects">Projects Delivered</div></div>
    </div>
    <div class="container4">
      <div class="container2"><div class="text4" data-count-target="86" data-count-suffix="%">0%</div></div>
      <div class="container2"><div class="text5" data-t="stat_retention">Client Retention</div></div>
    </div>
  </section>

  {{-- Products Carousel --}}
  <section class="hp-products">
    <div class="heading-32"></div>
    <div class="products" data-t="label_products">Products</div>
    <div class="container9"><div class="text8" data-t="products_desc">A showcase of our recent high-impact digital products.</div></div>

    <div class="product-card-wrap" data-product-card="0" data-base-slot="0">
      <div class="rectangle-8 product-slide-card"></div>
      <div class="background-border product-slide-card">
        <img class="image-overlay-shadow" src="{{ asset('assets/img/image-overlay-shadow.png') }}" />
      </div>
      <div class="container5 product-slide-card">
        <div class="text6" data-t="product1_desc">The unified operating system for modern enterprises, bridging the gap between operations and finance.</div>
      </div>
      <div class="group-10 product-slide-card">
        <div class="button"><div class="learn-more">Learn more</div><img class="container6" src="{{ asset('assets/img/Container_learn.png') }}" /></div>
      </div>
      <div class="heading-4 product-slide-card"><div class="text7">HexaFlow ERP</div></div>
      <div class="overlay product-slide-card"><div class="enterprise-saa-s">Enterprise SaaS</div></div>
    </div>

    <div class="product-card-wrap" data-product-card="1" data-base-slot="1">
      <div class="rectangle-9 product-slide-card"></div>
      <div class="container7 product-slide-card">
        <div class="global-payments-infrastructure-designed-for-the-digital-economy-supporting-100-currencies-and-instant-settlement">Global payments infrastructure designed for<br />the digital economy, supporting 100+<br />currencies and instant settlement.</div>
      </div>
      <div class="heading-5 product-slide-card"><div class="vara-pay-core">VaraPay Core</div></div>
      <div class="overlay2 product-slide-card"><div class="financial-tech">FINANCIAL TECH</div></div>
      <img class="overlay-blur" src="{{ asset('assets/img/overlay-blur-bg.png') }}" />
      <div class="background-border2 product-slide-card">
        <img class="image-overlay-shadow" src="{{ asset('assets/img/image-overlay-shadow.png') }}" />
      </div>
      <div class="button2 product-slide-card">
        <div class="learn-more">Learn more</div><img class="container8" src="{{ asset('assets/img/Container_learn.png') }}" />
      </div>
    </div>

    <div class="product-card-wrap" data-product-card="2" data-base-slot="2">
      <div class="rectangle-9-card3 product-slide-card"></div>
      <div class="container7-card3 product-slide-card">
        <div class="dummy-product-description">Enterprise suite for analytics, automation, and cross-team collaboration with scalable cloud architecture and secure data governance.</div>
      </div>
      <div class="heading-5-card3 product-slide-card"><div class="dummy-product-title">NexaGrid Suite</div></div>
      <div class="overlay2-card3 product-slide-card"><div class="dummy-product-badge">AI PLATFORM</div></div>
      <div class="background-border3 product-slide-card">
        <img class="image-overlay-shadow" src="{{ asset('assets/img/image-overlay-shadow.png') }}" alt="Dummy product preview" />
      </div>
      <div class="button2-card3 product-slide-card">
        <div class="learn-more">Learn more</div><img class="container8" src="{{ asset('assets/img/Container_learn.png') }}" alt="Learn more" />
      </div>
    </div>

    <div class="button7" id="products-prev" role="button" tabindex="0" aria-label="Previous product">
      <div class="button-shadow4"></div>
      <img class="container44" src="{{ asset('assets/img/Container_geserkiri.png') }}" />
    </div>
    <div class="button8" id="products-next" role="button" tabindex="0" aria-label="Next product">
      <div class="button-shadow4"></div>
      <img class="container45" src="{{ asset('assets/img/Container_geserkiri.png') }}" />
    </div>
  </section>

  {{-- Services Section --}}
  <section class="hp-services">
    <div class="services2" data-t="label_services">Services</div>
    <div class="container10">
      <div class="together-with-our-clients-we-build-the-future-developing-software-solutions-that-tackle-your-industry-s-biggest-challenges" data-t="services_desc" data-t-html>Together with our clients, we build the future.<br />Developing software solutions that tackle your industry's biggest challenges.</div>
    </div>
    <div class="service-card-wrap">
      <div class="rectangle-13"></div>
      <div class="software-development" data-t="svc_softdev">Software Development</div>
      <div class="software-development-hover-card">
        <div class="software-development-hover-title" data-t="svc_softdev_title" data-t-html>Software<br />Development</div>
        <div class="software-development-hover-description" data-t="svc_softdev_desc">Elevate your digital presence with our software development services. We specialize in crafting bespoke solutions to your business needs, ensuring seamless functionality and user-centric experiences. Our expert team employs the latest technologies to deliver scalable, high-performance software that propels your business forward.</div>
      </div>
    </div>
    <div class="service-card-wrap">
      <div class="rectangle-15"></div>
      <div class="startup-incubator-hitbox"></div>
      <div class="startup-incubator" data-t="svc_startup">Startup &amp; Incubator</div>
      <div class="startup-incubator-hover-card">
        <div class="startup-incubator-hover-title" data-t="svc_startup_title" data-t-html>Startup &amp;<br />Incubator</div>
        <div class="startup-incubator-hover-description" data-t="svc_startup_desc">Navigate the complexities of startup success with our expert consultancy services. From ideation to execution, we offer strategic guidance to optimize your business model. With bunch of investor partner behind us we will help to accelerate growth of your startup. Make a collaboration with us to turn your entrepreneurial vision into reality.</div>
      </div>
    </div>
    <div class="service-card-wrap">
      <div class="rectangle-16"></div>
      <div class="managed-services" data-t="svc_managed">Managed Services</div>
      <div class="managed-services-hover-card">
        <div class="managed-services-hover-title" data-t="svc_managed_title" data-t-html>Managed<br />Services</div>
        <div class="managed-services-hover-description" data-t="svc_managed_desc">Optimize your IT infrastructure with our comprehensive managed services. We provide comprehensive solutions, including proactive system monitoring, and strategic IT planning. Trust us to optimize your technology segment, ensuring most effective operations and allowing you to stay ahead in the digital landscape.</div>
      </div>
    </div>
    <div class="gemini-generated-image-fy-1-iw-8-fy-1-iw-8-fy-1-i-removebg-preview-1"></div>
    <div class="chat-gpt-image-26-feb-2026-20-46-28-1"></div>
    <img class="download-premium-png-of-png-gear-icon-chrome-material-silver-shape-white-background-by-sakarin-sukmanatham-about-gear-gear-icon-chrome-silver-icon-and-chrome-icon-13500505-removebg-preview-1" src="{{ asset('assets/img/Download_premium_png_of_PNG_Gear_icon_Chrome_material_silver_shape_white_background_by_Sakarin_Sukmanatham_about_gear__gear_icon__chrome__silver_icon__and_chrome_icon_13500505-removebg-preview.png') }}" />
    <img class="download-premium-png-of-png-rocket-luanching-chrome-material-white-background-removebg-preview-1" src="{{ asset('assets/img/Download_premium_png_of_PNG_Rocket_luanching_Chrome_material_white_background-removebg-preview.png') }}" />
    <img class="download-3-removebg-preview-1" src="{{ asset('assets/img/download__3_-removebg-preview.png') }}" />
    <div class="button9">
      <div class="view-all-services" data-t="btn_viewallservices">View All Services</div>
      <img class="container46" src="{{ asset('assets/img/Container_biru+viewall.png') }}" />
    </div>
  </section>

  {{-- Projects Section --}}
  <section class="projects-section">
    <div class="our-projects" data-t="projects_title">Our Projects</div>
    <div class="container40">
      <div class="we-deliver-our-best-performance-in-every-project-to-ensure-our-customers-are-satisfied-with-the-product" data-t="projects_subtitle">We deliver our best performance in every project to ensure our customers are satisfied with the product.</div>
    </div>
    <div class="overlay-border projects-filter-bar">
      <div class="button10 btn-filter active-filter" data-filter="all"><div class="all">All</div></div>
      <div class="button11 btn-filter" data-filter="software-development"><div class="software-development8">Software Development</div></div>
      <div class="button11 btn-filter" data-filter="digital-branding"><div class="text22">Digital Branding</div></div>
      <div class="button11 btn-filter" data-filter="startup-incubator"><div class="text23">Startup Incubator</div></div>
      <div class="button11 btn-filter" data-filter="it-consultant"><div class="text24">IT Consultant</div></div>
    </div>
    <div class="projects-grid">
      @foreach($projects as $project)
      <div class="project-card" data-filter="{{ $project->category }}">
        <div class="project-card-image">
          @if($project->image)
          <img src="{{ asset('assets/img/' . $project->image) }}" alt="{{ $project->name }}" loading="lazy" />
          @endif
        </div>
        <div class="project-card-body">
          <div class="project-card-badge project-badge-{{ Str::slug(str_replace('-', '', $project->category)) }}">{{ ucwords(str_replace('-', ' ', $project->category)) }}</div>
          <a class="project-card-title" href="{{ route('works.show', $project) }}">{{ $project->name }}</a>
          <div class="project-card-desc">{{ $project->description }}</div>
        </div>
      </div>
      @endforeach
    </div>
    <button type="button" class="projects-view-more" data-t="btn_viewmore">View More</button>
  </section>

  {{-- Why Choose Hexavara --}}
  <section class="hp-whychoose">
  <div class="rectangle-19"></div>
  <div class="why-choose-hexavara" data-t="why_title">Why Choose Hexavara</div>
  <div class="container41">
    <div class="excellence-in-project-execution-strategic-oversight-trusted-technology-partner" data-t="why_subtitle">Excellence in Project Execution, Strategic Oversight, Trusted Technology Partner.</div>
  </div>
  <div class="our-value" data-t="why_value">Our Value</div>
  <div class="value-card-wrap">
    <div class="rectangle-28"></div>
    <svg class="group-50" width="30" height="30" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
      <line x1="6" y1="3" x2="6" y2="21" stroke="white" stroke-width="1.5" stroke-linecap="round"/>
      <circle cx="6" cy="6" r="2" fill="white"/><circle cx="6" cy="12" r="2" fill="white"/><circle cx="6" cy="18" r="2" fill="white"/>
      <rect x="10" y="4.5" width="9" height="3" rx="1.5" fill="white"/>
      <rect x="10" y="10.5" width="6" height="3" rx="1.5" fill="white"/>
      <rect x="10" y="16.5" width="8" height="3" rx="1.5" fill="white"/>
    </svg>
    <div class="roadmap-for-timeline" data-t="why_roadmap">Roadmap for Timeline</div>
    <div class="our-roadmap-contains-a-detailed-list-of-tasks-and-project-timelines-that-you-can-monitor-at-any-time-each-roadmap-is-created-based-on-mutual-agreement" data-t="why_roadmap_desc">Our roadmap contains a detailed list of tasks and project timelines that you can monitor at any time. Each roadmap is created based on mutual agreement.</div>
  </div>
  <div class="value-card-wrap">
    <div class="rectangle-30"></div>
    <svg class="image-82" width="30" height="30" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M12 2.5L4.5 5.5V11C4.5 15.2 7.7 19.1 12 20.5C16.3 19.1 19.5 15.2 19.5 11V5.5L12 2.5Z" stroke="white" stroke-width="1.8" stroke-linejoin="round"/>
      <path d="M8.5 11.5L11 14L15.5 9" stroke="white" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
    <div class="maximum-service" data-t="why_maxservice">Maximum Service</div>
    <div class="we-guarantee-maximum-service-with-bug-fixes-and-improvements-handled-within-48-hours-this-feature-allows-you-to-easily-track-your-requests" data-t="why_maxservice_desc" data-t-html>We guarantee maximum service with bug fixes and improvements handled within 48 hours. This feature allows <br />you to easily track your requests.</div>
  </div>
  <div class="value-card-wrap">
    <div class="rectangle-29"></div>
    <svg class="image-83" width="30" height="30" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M4.5 16.5C3.2 15 2.5 13.1 2.5 11C2.5 6.3 6.3 2.5 11 2.5C15.7 2.5 19.5 6.3 19.5 11C19.5 13.1 18.8 15 17.5 16.5" stroke="white" stroke-width="1.8" stroke-linecap="round"/>
      <line x1="11" y1="5" x2="11" y2="7" stroke="white" stroke-width="1.5" stroke-linecap="round"/>
      <line x1="5" y1="11" x2="7" y2="11" stroke="white" stroke-width="1.5" stroke-linecap="round"/>
      <line x1="15" y1="11" x2="17" y2="11" stroke="white" stroke-width="1.5" stroke-linecap="round"/>
      <line x1="6.7" y1="6.7" x2="8.1" y2="8.1" stroke="white" stroke-width="1.5" stroke-linecap="round"/>
      <line x1="11" y1="11" x2="15" y2="7.5" stroke="white" stroke-width="2" stroke-linecap="round"/>
      <circle cx="11" cy="11" r="1.5" fill="white"/>
    </svg>
    <div class="weekly-sprint-monitoring" data-t="why_sprint">Weekly Sprint Monitoring</div>
    <div class="this-feature-helps-control-sprints-ensuring-our-programmers-work-according-to-the-time-you-ve-purchased-it-also-guarantees-that-your-project-is-success" data-t="why_sprint_desc" data-t-html>This feature helps control sprints, ensuring our programmers work according to the time you've purchased. It also <br />guarantees that your project is success.</div>
  </div>
  <div class="value-card-wrap">
    <div class="rectangle-31"></div>
    <svg class="image-84" width="30" height="30" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M3 17L8 11L12 15L17 8L21 11" stroke="white" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
      <path d="M18 8H21V11" stroke="white" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
      <line x1="3" y1="20" x2="21" y2="20" stroke="white" stroke-width="1.5" stroke-linecap="round"/>
    </svg>
    <div class="monitor-team-performanc" data-t="why_monitor">Monitor Team Performance</div>
    <div class="each-of-our-talents-has-daily-and-monthly-targets-aligned-with-the-time-you-ve-purchased-they-compete-to-deliver-their-best-performance" data-t="why_monitor_desc" data-t-html>Each of our talents has daily and monthly targets aligned <br />with the time you've purchased. They compete to deliver <br />their best performance.</div>
  </div>
  </section>

  {{-- Testimonials --}}
  <section class="hp-testimonials">
  <div class="testimonials-section-label" data-t="label_testimonials">Testimonials</div>
  <div class="text9" data-t="testimonials_title">Hear From Our Clients</div>
  <div class="trust-from-industry-leaders-across-the-globe" data-t="testimonials_subtitle">Trust from industry leaders across the globe.</div>
  <div class="container11">
    @foreach($testimonials as $testimonial)
    <div class="testimonial-{{ $loop->iteration }}">
      <div class="container12">
        @for($i = 0; $i < $testimonial->rating; $i++)
        <svg width="20" height="20" viewBox="0 0 24 24" fill="#FFD700" xmlns="http://www.w3.org/2000/svg"><polygon points="12,2 15.09,10.26 23.36,10.26 17.54,15.46 19.63,23.72 12,18.52 4.37,23.72 6.46,15.46 0.64,10.26 8.91,10.26"/></svg>
        @endfor
      </div>
      <div class="container18">
        <div class="hexavara-tech-transformed-our-vision-into-a-scalable-product-within-months-their-technical-depth-and-commitment-to-quality-are-unparalleled">&quot;{{ $testimonial->quote }}&quot;</div>
      </div>
      <div class="container19">
        <div class="background2">
          @php
            $colors = ['#3B82F6', '#8B5CF6', '#10B981'];
            $color = $colors[($loop->index) % 3];
          @endphp
          <svg class="profile-avatar" width="48" height="48" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="30" cy="30" r="30" fill="{{ $color }}"/>
            <circle cx="30" cy="22" r="10" fill="white" fill-opacity="0.9"/>
            <path d="M10 52C10 40.95 19.4 32 30 32C40.6 32 50 40.95 50 52" fill="white" fill-opacity="0.9"/>
          </svg>
        </div>
        <div class="container20">
          <div class="container18"><div class="text10">{{ $testimonial->name }}</div></div>
          <div class="container18"><div class="text11">{{ $testimonial->role }}</div></div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  </section>

  {{-- CTA Section --}}
  <div class="section">
    <div class="cta-full">
      <div class="cta-badge-label" data-t="cta_badge">Ready to Get Started?</div>
      <div class="cta-main-heading" data-t="cta_heading" data-t-html>
        Get the Right IT Solutions from the<br/>
        <span class="cta-blue">Best IT Vendor</span> — Consult with Us Today!
      </div>
      <div class="cta-description" data-t="cta_desc">
        Discuss your IT challenges, and our team of experienced experts will
        provide tailored solutions to drive your business growth and success.
      </div>
      <div class="button3">
        <div class="button-shadow"></div>
        <a class="consult-now" href="{{ route('contact') }}" style="text-decoration:none;color:inherit;" data-t="cta_btn">Consult Now</a>
      </div>
    </div>
  </div>

  {{-- Footer --}}
  <div class="footer">
    <div class="container32">
      <div class="footer-simple">
        <div class="footer-brand-panel">
          <div class="footer-brand-top">
            <img class="footer-logo" src="{{ asset('assets/img/ChatGPT Image 26 Feb 2026, 11.24.32.png') }}" alt="Hexavara logo" />
            <div class="footer-brand-copy">
              <div class="footer-brand-name">Hexavara Technology</div>
              <div class="footer-brand-tag" data-t="footer_brand_tag">Software Development and IT Consulting</div>
            </div>
          </div>
          <div class="footer-brand-description">
            Surabaya<br />
            Graha Bukopin Lantai 7 dan 12, Jl. Panglima Sudirman No. 10-18, Embong Kaliasin, Genteng, Kota Surabaya, Jawa Timur 60271
          </div>
        </div>
        <div class="footer-nav">
          <div class="footer-links-group">
            <div class="footer-heading" data-t="footer_company">Company</div>
            <a class="footer-link" href="{{ route('works.index') }}" data-t="footer_works">Works</a>
            <a class="footer-link" href="{{ route('about') }}" data-t="footer_about">About Us</a>
            <a class="footer-link" href="{{ route('services.index') }}" data-t="footer_services">Services</a>
            <a class="footer-link" href="#" data-t="footer_solutions">Solutions</a>
          </div>
          <div class="footer-links-group footer-contact-group">
            <div class="footer-heading" data-t="footer_contact">Contact Us</div>
            <div class="footer-contact-item">info@hexavara.com</div>
            <div class="footer-contact-item">+628113451550</div>
          </div>
          <div class="footer-links-group">
            <div class="footer-heading" data-t="footer_follow">Follow Us</div>
            <div class="footer-social-links">
              <a class="footer-social-link" href="https://www.instagram.com/hexavara/" target="_blank" rel="noopener noreferrer" aria-label="Hexavara Instagram">
                <svg class="footer-social-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect x="3.5" y="3.5" width="17" height="17" rx="5" stroke="currentColor" stroke-width="1.8"/>
                  <circle cx="12" cy="12" r="4" stroke="currentColor" stroke-width="1.8"/>
                  <circle cx="17.2" cy="6.8" r="1.2" fill="currentColor"/>
                </svg>
                <span>Instagram</span>
              </a>
              <a class="footer-social-link" href="https://www.linkedin.com/company/hexavara-technology/" target="_blank" rel="noopener noreferrer" aria-label="Hexavara LinkedIn">
                <svg class="footer-social-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect x="3.5" y="3.5" width="17" height="17" rx="3" stroke="currentColor" stroke-width="1.8"/>
                  <rect x="7" y="10" width="2.4" height="7" fill="currentColor"/>
                  <circle cx="8.2" cy="7.6" r="1.3" fill="currentColor"/>
                  <path d="M12 10H14.4V11.2C14.9 10.4 15.9 9.8 17.2 9.8C19.6 9.8 20.5 11.4 20.5 13.9V17H18V14.2C18 13.1 17.6 12.3 16.5 12.3C15.4 12.3 14.8 13.1 14.8 14.2V17H12V10Z" fill="currentColor"/>
                </svg>
                <span>LinkedIn</span>
              </a>
              <a class="footer-social-link" href="https://api.whatsapp.com/send?phone=628113451550" target="_blank" rel="noopener noreferrer" aria-label="Hexavara WhatsApp">
                <svg class="footer-social-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M17.6 14.3C17.3 14.1 16 13.5 15.6 13.3C15.2 13.2 14.9 13.1 14.6 13.5C14.3 13.8 13.6 14.6 13.3 14.9C13.1 15.2 12.8 15.2 12.5 15C11.9 14.7 10.6 14.2 9.5 13.2C8.6 12.4 8 11.4 7.7 11.1C7.5 10.8 7.6 10.5 7.8 10.3C8 10.1 8.2 9.8 8.4 9.5C8.6 9.2 8.7 9 8.8 8.7C9 8.3 8.9 8 8.8 7.8C8.7 7.6 8.1 6.3 7.7 5.5C7.3 4.7 6.9 4.8 6.6 4.8C6.4 4.8 6.1 4.8 5.8 4.8C5.5 4.8 5 4.9 4.6 5.3C4.2 5.7 3.2 6.7 3.2 8C3.2 9.3 4.7 10.6 4.9 10.9C5.1 11.2 7.8 15.5 11.6 17C12.5 17.3 13.2 17.6 13.8 17.8C14.7 18.1 15.5 18.1 16.2 18C16.9 18 18.4 17.2 18.8 16.3C19.2 15.4 19.2 14.6 19.1 14.5C19.1 14.3 18.8 14.4 17.6 14.3Z" fill="currentColor"/>
                  <rect x="1" y="1" width="22" height="22" rx="5" stroke="currentColor" stroke-width="1.5" fill="none"/>
                </svg>
                <span>WhatsApp</span>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-bottom-bar">
        <div class="footer-copyright">&copy; {{ date('Y') }} Hexavara Tech. All rights reserved.</div>
        <div class="footer-policy-links"></div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
var pageTranslations = {
    en: {
        nav_about: 'About Us', nav_services: 'Services', nav_solutions: 'Solutions', nav_works: 'Works',
        hero_line1: 'Transforming<br />Ideas into', hero_line2: 'Digital<br />Excellence',
        hero_desc: 'Enhance your business capabilities to innovate and compete in today\'s dynamic market by harnessing the power of data.<br />',
        collab_before: 'We have collaborated with ', collab_highlight: '50+ client partners',
        collab_after: ' from<br />Big Company and foundation all over Indonesia.',
        stat_clients: 'Happy Clients', stat_projects: 'Projects Delivered', stat_retention: 'Client Retention',
        product1_desc: 'The unified operating system for modern enterprises, bridging the gap between operations and finance.',
        label_products: 'Products', label_services: 'Services', label_clients: 'Clients', label_testimonials: 'Testimonials',
        clients_title: 'Our Trusted Partners',
        products_desc: 'A showcase of our recent high-impact digital products.',
        services_desc: 'Together with our clients, we build the future.<br />Developing software solutions that tackle your industry\'s biggest challenges.',
        svc_softdev: 'Software Development', svc_startup: 'Startup & Incubator', svc_managed: 'Managed Services',
        svc_softdev_title: 'Software<br />Development',
        svc_softdev_desc: 'Elevate your digital presence with our software development services. We specialize in crafting bespoke solutions to your business needs, ensuring seamless functionality and user-centric experiences. Our expert team employs the latest technologies to deliver scalable, high-performance software that propels your business forward.',
        svc_startup_title: 'Startup &<br />Incubator',
        svc_startup_desc: 'Navigate the complexities of startup success with our expert consultancy services. From ideation to execution, we offer strategic guidance to optimize your business model. With bunch of investor partner behind us we will help to accelerate growth of your startup. Make a collaboration with us to turn your entrepreneurial vision into reality.',
        svc_managed_title: 'Managed<br />Services',
        svc_managed_desc: 'Optimize your IT infrastructure with our comprehensive managed services. We provide comprehensive solutions, including proactive system monitoring, and strategic IT planning. Trust us to optimize your technology segment, ensuring most effective operations and allowing you to stay ahead in the digital landscape.',
        testimonials_title: 'Hear From Our Clients', testimonials_subtitle: 'Trust from industry leaders across the globe.',
        cta_badge: 'Ready to Get Started?',
        cta_heading: 'Get the Right IT Solutions from the<br/><span class="cta-blue">Best IT Vendor</span> \u2014 Consult with Us Today!',
        cta_desc: 'Discuss your IT challenges, and our team of experienced experts will provide tailored solutions to drive your business growth and success.',
        cta_btn: 'Consult Now',
        projects_title: 'Our Projects',
        projects_subtitle: 'We deliver our best performance in every project to ensure our customers are satisfied with the product.',
        why_title: 'Why Choose Hexavara',
        why_subtitle: 'Excellence in Project Execution, Strategic Oversight, Trusted Technology Partner.',
        why_value: 'Our Value',
        why_roadmap: 'Roadmap for Timeline', why_maxservice: 'Maximum Service', why_sprint: 'Weekly Sprint Monitoring', why_monitor: 'Monitor Team Performance',
        why_roadmap_desc: 'Our roadmap contains a detailed list of tasks and project timelines that you can monitor at any time. Each roadmap is created based on mutual agreement.',
        why_maxservice_desc: 'We guarantee maximum service with bug fixes and improvements handled within 48 hours. This feature allows<br />you to easily track your requests.',
        why_sprint_desc: 'This feature helps control sprints, ensuring our programmers work according to the time you\'ve purchased. It also<br />guarantees that your project is success.',
        why_monitor_desc: 'Each of our talents has daily and monthly targets aligned<br />with the time you\'ve purchased. They compete to deliver<br />their best performance.',
        btn_startproject: 'Start a Project?', btn_consult: 'Consult Now', btn_viewall: 'View All', btn_viewallservices: 'View All Services', btn_viewmore: 'View More',
        footer_brand_tag: 'Software Development and IT Consulting',
        footer_company: 'Company', footer_works: 'Works', footer_about: 'About Us', footer_services: 'Services', footer_solutions: 'Solutions',
        footer_contact: 'Contact Us', footer_follow: 'Follow Us'
    },
    id: {
        nav_about: 'Tentang Kami', nav_services: 'Layanan', nav_solutions: 'Solusi', nav_works: 'Karya',
        hero_line1: 'Mengubah<br />Ide Menjadi', hero_line2: 'Keunggulan<br />Digital',
        hero_desc: 'Tingkatkan kemampuan bisnis Anda untuk berinovasi dan bersaing di pasar yang dinamis saat ini dengan memanfaatkan kekuatan data.<br />',
        collab_before: 'Kami telah berkolaborasi dengan ', collab_highlight: '50+ mitra klien',
        collab_after: ' dari<br />Perusahaan Besar dan yayasan di seluruh Indonesia.',
        stat_clients: 'Klien Puas', stat_projects: 'Proyek Terselesaikan', stat_retention: 'Retensi Klien',
        product1_desc: 'Sistem operasi terpadu untuk perusahaan modern, menjembatani kesenjangan antara operasional dan keuangan.',
        label_products: 'Produk', label_services: 'Layanan', label_clients: 'Klien', label_testimonials: 'Testimoni',
        clients_title: 'Mitra Terpercaya Kami',
        products_desc: 'Pameran produk digital berdampak tinggi terbaru kami.',
        services_desc: 'Bersama klien kami, kami membangun masa depan.<br />Mengembangkan solusi perangkat lunak yang mengatasi tantangan terbesar industri Anda.',
        svc_softdev: 'Pengembangan Software', svc_startup: 'Startup & Inkubator', svc_managed: 'Layanan Terkelola',
        svc_softdev_title: 'Pengembangan<br />Software',
        svc_softdev_desc: 'Tingkatkan kehadiran digital Anda dengan layanan pengembangan software kami. Kami berspesialisasi dalam menciptakan solusi yang disesuaikan dengan kebutuhan bisnis Anda, memastikan fungsionalitas yang mulus dan pengalaman yang berpusat pada pengguna. Tim ahli kami menggunakan teknologi terbaru untuk menghadirkan software yang skalabel dan berkinerja tinggi.',
        svc_startup_title: 'Startup &<br />Inkubator',
        svc_startup_desc: 'Navigasi kompleksitas kesuksesan startup dengan layanan konsultasi ahli kami. Dari ide hingga eksekusi, kami menawarkan panduan strategis untuk mengoptimalkan model bisnis Anda. Dengan mitra investor di belakang kami, kami akan membantu mempercepat pertumbuhan startup Anda.',
        svc_managed_title: 'Layanan<br />Terkelola',
        svc_managed_desc: 'Optimalkan infrastruktur TI Anda dengan layanan terkelola komprehensif kami. Kami menyediakan solusi lengkap, termasuk pemantauan sistem proaktif dan perencanaan TI strategis. Percayakan kepada kami untuk mengoptimalkan segmen teknologi Anda.',
        testimonials_title: 'Dengarkan dari Klien Kami', testimonials_subtitle: 'Dipercaya oleh pemimpin industri di seluruh dunia.',
        cta_badge: 'Siap untuk Memulai?',
        cta_heading: 'Dapatkan Solusi IT yang Tepat dari<br/><span class="cta-blue">Vendor IT Terbaik</span> \u2014 Konsultasi dengan Kami Sekarang!',
        cta_desc: 'Diskusikan tantangan IT Anda, dan tim ahli berpengalaman kami akan memberikan solusi yang disesuaikan untuk mendorong pertumbuhan bisnis Anda.',
        cta_btn: 'Konsultasi Sekarang',
        projects_title: 'Proyek Kami',
        projects_subtitle: 'Kami memberikan performa terbaik di setiap proyek untuk memastikan pelanggan kami puas dengan produknya.',
        why_title: 'Mengapa Memilih Hexavara',
        why_subtitle: 'Keunggulan dalam Eksekusi Proyek, Pengawasan Strategis, Mitra Teknologi Terpercaya.',
        why_value: 'Nilai Kami',
        why_roadmap: 'Roadmap Timeline', why_maxservice: 'Layanan Maksimal', why_sprint: 'Monitoring Sprint Mingguan', why_monitor: 'Monitor Performa Tim',
        why_roadmap_desc: 'Roadmap kami berisi daftar tugas dan jadwal proyek yang dapat Anda pantau kapan saja. Setiap roadmap dibuat berdasarkan kesepakatan bersama.',
        why_maxservice_desc: 'Kami menjamin layanan maksimal dengan perbaikan bug dan peningkatan ditangani dalam 48 jam. Fitur ini memungkinkan<br />Anda melacak permintaan dengan mudah.',
        why_sprint_desc: 'Fitur ini membantu mengontrol sprint, memastikan programmer kami bekerja sesuai waktu yang Anda beli. Ini juga<br />menjamin bahwa proyek Anda sukses.',
        why_monitor_desc: 'Setiap talenta kami memiliki target harian dan bulanan sesuai<br />waktu yang Anda beli. Mereka berkompetisi untuk memberikan<br />performa terbaik mereka.',
        btn_startproject: 'Mulai Proyek?', btn_consult: 'Konsultasi Sekarang', btn_viewall: 'Lihat Semua', btn_viewallservices: 'Lihat Semua Layanan', btn_viewmore: 'Lihat Lainnya',
        footer_brand_tag: 'Pengembangan Software dan Konsultan IT',
        footer_company: 'Perusahaan', footer_works: 'Karya', footer_about: 'Tentang Kami', footer_services: 'Layanan', footer_solutions: 'Solusi',
        footer_contact: 'Hubungi Kami', footer_follow: 'Ikuti Kami'
    }
};
</script>
<script>
(function () {
  var filterBtns = document.querySelectorAll('.btn-filter');
  var projectCards = document.querySelectorAll('.project-card');
  var viewMoreBtn = document.querySelector('.projects-view-more');
  var INITIAL_SHOW = 6;
  var expanded = false;
  var currentFilter = 'all';

  function applyFilter() {
    var visibleCount = 0;
    projectCards.forEach(function (card) {
      var cats = card.getAttribute('data-filter').split(' ');
      var matchesFilter = currentFilter === 'all' || cats.indexOf(currentFilter) !== -1;
      if (!matchesFilter) {
        card.style.display = 'none';
        return;
      }
      visibleCount++;
      if (currentFilter === 'all' && !expanded && visibleCount > INITIAL_SHOW) {
        card.style.display = 'none';
      } else {
        card.style.display = '';
      }
    });

    // Show/hide View More button
    if (currentFilter !== 'all') {
      viewMoreBtn.style.display = 'none';
    } else {
      var totalAll = projectCards.length;
      viewMoreBtn.style.display = (!expanded && totalAll > INITIAL_SHOW) ? '' : 'none';
    }
  }

  filterBtns.forEach(function (btn) {
    btn.addEventListener('click', function () {
      var selected = this.getAttribute('data-filter');
      filterBtns.forEach(function (b) { b.classList.remove('active-filter'); });
      this.classList.add('active-filter');
      currentFilter = selected;
      if (selected !== 'all') expanded = false;
      applyFilter();
    });
  });

  if (viewMoreBtn) {
    viewMoreBtn.addEventListener('click', function () {
      expanded = true;
      applyFilter();
    });
  }

  applyFilter();
})();

(function () {
  var trackItems = document.querySelectorAll('[data-product-card]');
  var prevBtn = document.getElementById('products-prev');
  var nextBtn = document.getElementById('products-next');
  var SLOT_WIDTH = 523;
  var totalCards = 3;
  var windowStart = 0;
  var maxStart = totalCards - 2;
  if (!trackItems.length || !prevBtn || !nextBtn) return;
  function renderCarousel() {
    trackItems.forEach(function (item) {
      var card = parseInt(item.getAttribute('data-product-card'), 10);
      var baseSlot = parseInt(item.getAttribute('data-base-slot'), 10);
      var targetSlot = card - windowStart;
      var isVisible = targetSlot === 0 || targetSlot === 1;
      var offset = (targetSlot - baseSlot) * SLOT_WIDTH;
      item.style.transform = 'translateX(' + offset + 'px)';
      item.style.opacity = isVisible ? '1' : '0';
      item.style.pointerEvents = isVisible ? 'auto' : 'none';
    });
    prevBtn.classList.toggle('is-disabled', windowStart === 0);
    nextBtn.classList.toggle('is-disabled', windowStart === maxStart);
  }
  function move(delta) {
    var next = windowStart + delta;
    if (next < 0) next = 0;
    if (next > maxStart) next = maxStart;
    if (next === windowStart) return;
    windowStart = next;
    renderCarousel();
  }
  prevBtn.addEventListener('click', function () { move(-1); });
  nextBtn.addEventListener('click', function () { move(1); });
  renderCarousel();
})();
</script>
@endpush
