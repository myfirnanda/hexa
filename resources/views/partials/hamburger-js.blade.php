<script>
(function() {
    // Homepage hamburger
    var hpBtn = document.getElementById('hp-hamburger');
    var hpNav = document.getElementById('hp-nav-links');
    if (hpBtn && hpNav) {
        var hpActions = document.querySelector('.hp-nav-actions');
        hpBtn.addEventListener('click', function() {
            var open = hpBtn.classList.toggle('is-open');
            hpBtn.setAttribute('aria-expanded', open);
            hpNav.classList.toggle('is-open', open);
            if (hpActions) hpActions.classList.toggle('is-open', open);
        });
        hpNav.querySelectorAll('a').forEach(function(link) {
            link.addEventListener('click', function() {
                hpBtn.classList.remove('is-open');
                hpBtn.setAttribute('aria-expanded', 'false');
                hpNav.classList.remove('is-open');
                if (hpActions) hpActions.classList.remove('is-open');
            });
        });
    }

    // Inner page hamburger
    var siteBtn = document.getElementById('site-hamburger');
    var siteNav = document.getElementById('site-nav');
    if (siteBtn && siteNav) {
        var siteActions = document.querySelector('.header-actions');
        siteBtn.addEventListener('click', function() {
            var open = siteBtn.classList.toggle('is-open');
            siteBtn.setAttribute('aria-expanded', open);
            siteNav.classList.toggle('is-open', open);
            if (siteActions) siteActions.classList.toggle('is-open', open);
        });
        siteNav.querySelectorAll('a').forEach(function(link) {
            link.addEventListener('click', function() {
                siteBtn.classList.remove('is-open');
                siteBtn.setAttribute('aria-expanded', 'false');
                siteNav.classList.remove('is-open');
                if (siteActions) siteActions.classList.remove('is-open');
            });
        });
    }
})();
</script>
