<script>
(function () {
    var trigger = document.getElementById('solutions-trigger');
    var menu = document.getElementById('solutions-mega-menu');
    var closeTimer = null;

    if (!trigger || !menu) return;

    function isOpen() { return menu.classList.contains('is-open'); }

    function openMenu() {
        if (closeTimer) { clearTimeout(closeTimer); closeTimer = null; }
        menu.classList.add('is-open');
        trigger.classList.add('is-open');
        trigger.setAttribute('aria-expanded', 'true');
        menu.setAttribute('aria-hidden', 'false');
    }

    function closeMenu() {
        menu.classList.remove('is-open');
        trigger.classList.remove('is-open');
        trigger.setAttribute('aria-expanded', 'false');
        menu.setAttribute('aria-hidden', 'true');
    }

    function scheduleClose() {
        if (closeTimer) clearTimeout(closeTimer);
        closeTimer = setTimeout(closeMenu, 120);
    }

    trigger.addEventListener('click', function (e) { e.stopPropagation(); isOpen() ? closeMenu() : openMenu(); });
    trigger.addEventListener('mouseenter', openMenu);
    trigger.addEventListener('mouseleave', scheduleClose);
    menu.addEventListener('mouseenter', openMenu);
    menu.addEventListener('mouseleave', scheduleClose);

    trigger.addEventListener('keydown', function (e) {
        if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); isOpen() ? closeMenu() : openMenu(); }
        if (e.key === 'Escape') { closeMenu(); trigger.blur(); }
    });

    document.addEventListener('click', function (e) { if (!menu.contains(e.target) && !trigger.contains(e.target)) closeMenu(); });
    document.addEventListener('keydown', function (e) { if (e.key === 'Escape' && isOpen()) closeMenu(); });
})();
</script>
