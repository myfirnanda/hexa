/**
 * Hexavara Main JS
 * ------------------------------------------------------------
 * Handles Mega Menu, Mobile Menu Toggle, and Global Scroll Top.
 */

(function() {
    // 1. Mega Menu (Desktop)
    const trigger = document.getElementById('solutions-trigger');
    const menu = document.getElementById('solutions-mega-menu');
    let timer;

    if (trigger && menu) {
        const openMenu = () => {
            clearTimeout(timer);
            menu.classList.add('is-open');
            trigger.classList.add('is-open');
        };
        const closeMenu = () => {
            timer = setTimeout(() => {
                menu.classList.remove('is-open');
                trigger.classList.remove('is-open');
            }, 100);
        };

        trigger.addEventListener('mouseenter', openMenu);
        trigger.addEventListener('mouseleave', closeMenu);
        menu.addEventListener('mouseenter', () => clearTimeout(timer));
        menu.addEventListener('mouseleave', closeMenu);
        
        // Mobile fallback if trigger is clicked
        trigger.addEventListener('click', (e) => {
            if (window.innerWidth < 1024) {
                e.preventDefault();
                menu.classList.toggle('is-open');
            }
        });
    }

    // 2. Mobile Menu Toggle (Sidebar)
    const mobileMenuOpen = document.getElementById('mobile-menu-open');
    const mobileMenuClose = document.getElementById('mobile-menu-close');
    const mobileMenu = document.getElementById('mobile-menu');

    if (mobileMenuOpen && mobileMenu && mobileMenuClose) {
        mobileMenuOpen.addEventListener('click', () => {
            mobileMenu.classList.add('is-open');
            document.body.style.overflow = 'hidden';
        });

        mobileMenuClose.addEventListener('click', () => {
            mobileMenu.classList.remove('is-open');
            document.body.style.overflow = '';
        });

        // Close on link click
        mobileMenu.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.remove('is-open');
                document.body.style.overflow = '';
            });
        });
    }

    // 3. Global Scroll Top
    const scrollTopBtn = document.getElementById('scroll-top-btn');
    if (scrollTopBtn) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 300) {
                scrollTopBtn.classList.remove('opacity-0', 'invisible');
            } else {
                scrollTopBtn.classList.add('opacity-0', 'invisible');
            }
        }, { passive: true });

        scrollTopBtn.addEventListener('click', (e) => {
            e.preventDefault();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }
})();
