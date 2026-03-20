<script>
(function() {
    var sharedTranslations = {
        en: {
            nav_works: 'Works',
            nav_about: 'About Us',
            nav_services: 'Services',
            nav_solutions: 'Solutions',
            header_cta: 'Start a Project?',
            cta_badge: 'Ready to Get Started?',
            cta_heading: 'Get the Right IT Solutions from the',
            cta_heading_accent: 'Best IT Vendor',
            cta_heading_end: '- Consult with Us Today!',
            cta_desc: 'Discuss your IT challenges, and our team of experienced experts will provide tailored solutions to drive your business growth and success.',
            cta_btn: 'Consult Now',
            footer_company: 'Company',
            footer_works: 'Works',
            footer_about: 'About Us',
            footer_services: 'Services',
            footer_solutions: 'Solutions',
            footer_contact: 'Contact Us',
            footer_follow: 'Follow Us',
            footer_brand_tag: 'Software Development and IT Consulting'
        },
        id: {
            nav_works: 'Portofolio',
            nav_about: 'Tentang Kami',
            nav_services: 'Layanan',
            nav_solutions: 'Solusi',
            header_cta: 'Mulai Proyek?',
            cta_badge: 'Siap Untuk Memulai?',
            cta_heading: 'Dapatkan Solusi IT yang Tepat dari',
            cta_heading_accent: 'Vendor IT Terbaik',
            cta_heading_end: '- Konsultasi dengan Kami Hari Ini!',
            cta_desc: 'Diskusikan tantangan IT Anda, dan tim ahli berpengalaman kami akan memberikan solusi yang disesuaikan untuk mendorong pertumbuhan dan kesuksesan bisnis Anda.',
            cta_btn: 'Konsultasi Sekarang',
            footer_company: 'Perusahaan',
            footer_works: 'Portofolio',
            footer_about: 'Tentang Kami',
            footer_services: 'Layanan',
            footer_solutions: 'Solusi',
            footer_contact: 'Hubungi Kami',
            footer_follow: 'Ikuti Kami',
            footer_brand_tag: 'Pengembangan Software dan Konsultasi IT'
        }
    };

    function applyTranslations(lang) {
        if (typeof pageTranslations !== 'undefined') {
            var pt = pageTranslations[lang] || pageTranslations.en;
            if (pt) {
                document.querySelectorAll('[data-t]').forEach(function(el) {
                    var key = el.getAttribute('data-t');
                    if (pt[key] !== undefined) {
                        if (el.hasAttribute('data-t-html')) {
                            el.innerHTML = pt[key];
                        } else {
                            el.textContent = pt[key];
                        }
                    }
                });
            }
        }

        var shared = sharedTranslations[lang] || sharedTranslations.en;
        document.querySelectorAll('[data-ts]').forEach(function(el) {
            var key = el.getAttribute('data-ts');
            if (shared[key] !== undefined) {
                if (el.hasAttribute('data-t-html')) {
                    el.innerHTML = shared[key];
                } else {
                    el.textContent = shared[key];
                }
            }
        });

        document.querySelectorAll('[data-lang]').forEach(function(btn) {
            var btnLang = btn.getAttribute('data-lang');
            var isActive = btnLang === lang;
            btn.classList.toggle('active', isActive);
            btn.classList.toggle('lang-btn-active', isActive);
            btn.classList.toggle('is-active', isActive);
            btn.classList.toggle('is-inactive', !isActive);
            btn.setAttribute('aria-pressed', isActive ? 'true' : 'false');
        });

        document.documentElement.setAttribute('lang', lang);
        localStorage.setItem('hexavara-lang', lang);
        window._currentLang = lang;
    }

    document.addEventListener('click', function(e) {
        var btn = e.target.closest('[data-lang]');
        if (btn) {
            e.preventDefault();
            applyTranslations(btn.getAttribute('data-lang'));
        }
    });

    var storedLang = localStorage.getItem('hexavara-lang') || 'en';
    applyTranslations(storedLang);
})();
</script>
