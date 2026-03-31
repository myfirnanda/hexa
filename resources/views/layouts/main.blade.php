<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Hexavara - Digital Excellence Since 2013')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'hex-dark': '#0f172a',
                        'hex-blue': '#2563eb',
                        'hex-blue-light': '#0c5bed',
                        'hex-orange': '#ec5b13',
                        'hex-surface': '#f5f6f8',
                        'hex-slate': '#475569',
                        'hex-slate-light': '#64748b',
                        'hex-muted': '#514f5e',
                        'hex-surface-dark': '#0b1221'
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL,GRAD,opsz@100..700,0,0,20..48" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;400;500;700;800&display=swap" rel="stylesheet">
    <style>
        .hero-title { font-size: 60px; line-height: 1.1; letter-spacing: -1.8px; font-weight: 700; }
        @media (max-width: 768px) { .hero-title { font-size: 34px; letter-spacing: -0.8px; } }

        .solutions-mega-menu { opacity: 0; transform: translateX(-50%) translateY(8px); pointer-events: none; transition: opacity 0.2s ease, transform 0.2s ease; }
        .solutions-mega-menu.is-open { opacity: 1; transform: translateX(-50%) translateY(0); pointer-events: auto; }

        @keyframes marquee { 0% { transform: translateX(0); } 100% { transform: translateX(-50%); } }
        .marquee-container { display: flex; width: max-content; animation: marquee 30s linear infinite; }

        body { font-family: 'Inter', sans-serif; }
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        .active-filter { background-color: #0F172A !important; color: white !important; }
        .is-open { display: block !important; }
        #mobile-menu.is-open { transform: translateX(0); }
    </style>
    @stack('styles')
</head>

<body class="bg-white text-hex-dark antialiased overflow-x-hidden relative">
    @include('partials.header')

    @yield('content')

    @include('partials.footer')

    <!-- Scroll to top button -->
    <button class="fixed right-6 w-12 h-12 bg-blue-600 text-white rounded-full shadow-lg flex items-center justify-center opacity-0 invisible transition-all duration-300 hover:bg-blue-700 z-40"
        style="bottom: 40px;" id="scroll-top-btn">
        <span class="material-symbols-outlined">keyboard_arrow_up</span>
    </button>

    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/lang.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    @stack('scripts')
</body>

</html>
