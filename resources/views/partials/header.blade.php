<header class="site-header">
    <a class="logo-home-link" href="{{ route('home') }}" aria-label="Go to homepage">
        <img class="site-logo" src="{{ asset('assets/img/ChatGPT Image 26 Feb 2026, 11.24.32.png') }}" alt="Hexavara logo" />
    </a>

    <button class="site-hamburger" id="site-hamburger" type="button" aria-label="Toggle navigation" aria-expanded="false">
        <span></span><span></span><span></span>
    </button>

    <nav class="site-nav" id="site-nav" aria-label="Main navigation">
        <a class="nav-link" href="{{ route('works.index') }}" data-ts="nav_works">Works</a>
        <a class="nav-link" href="{{ route('about') }}" data-ts="nav_about">About Us</a>
        <a class="nav-link" href="{{ route('services.index') }}" data-ts="nav_services">Services</a>
        <button class="nav-link nav-solutions-trigger" id="solutions-trigger" type="button" aria-haspopup="true" aria-expanded="false" aria-controls="solutions-mega-menu" data-ts="nav_solutions">Solutions</button>
    </nav>

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

    <div class="header-actions">
        <div class="language-switch" aria-label="Language switcher">
            <button type="button" class="lang-button active" data-lang="en" aria-pressed="true">EN</button>
            <button type="button" class="lang-button" data-lang="id" aria-pressed="false">ID</button>
        </div>
        <a class="header-cta" href="{{ route('contact') }}" data-ts="header_cta">Start a Project?</a>
    </div>
</header>
