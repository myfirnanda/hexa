/**
 * Hexavara Language Switcher
 * -------------------------------------------------------
 * Uses data-i18n attribute to mark translatable elements.
 * Each translatable element has data-en and data-id attributes.
 * Works with textContent by default; use data-i18n="html" for innerHTML.
 */
(function () {
    function applyLanguage(lang) {
        localStorage.setItem('hex-lang', lang);
        document.documentElement.lang = lang === 'id' ? 'id' : 'en';

        // Swap text content
        document.querySelectorAll('[data-i18n]').forEach(function (el) {
            var text = el.getAttribute('data-' + lang);
            if (!text) return;
            if (el.getAttribute('data-i18n') === 'html') {
                el.innerHTML = text;
            } else {
                el.textContent = text;
            }

            // Also check for data-i18n-placeholder
            if (el.hasAttribute('data-i18n-placeholder')) {
                var placeholder = el.getAttribute('data-placeholder-' + lang) || el.getAttribute('data-' + lang);
                if (placeholder) {
                    el.setAttribute('placeholder', placeholder);
                }
            }
        });

        // Special check for inputs with data-i18n-placeholder that might not have data-i18n
        document.querySelectorAll('[data-i18n-placeholder]').forEach(function (el) {
            var placeholder = el.getAttribute('data-' + lang);
            if (placeholder) {
                el.setAttribute('placeholder', placeholder);
            }
        });

        // Update switcher button states for all language switchers (desktop & mobile)
        document.querySelectorAll('[data-lang]').forEach(function (btn) {
            if (btn.dataset.lang === lang) {
                btn.classList.add('active', 'bg-white', 'shadow-sm');
                btn.classList.remove('text-gray-500');
            } else {
                btn.classList.remove('active', 'bg-white', 'shadow-sm');
                btn.classList.add('text-gray-500');
            }
        });

        // Trigger a custom event for other scripts to listen to
        window.dispatchEvent(new CustomEvent('languageChanged', { detail: { lang: lang } }));
    }

    // Expose globally
    window.hexLanguage = {
        apply: applyLanguage,
        get: function() { return localStorage.getItem('hex-lang') || 'en'; }
    };

    // Bind click events to all language switchers
    document.querySelectorAll('[data-lang]').forEach(function (btn) {
        btn.onclick = function() {
            applyLanguage(btn.dataset.lang);
        };
    });

    // Init on load
    var saved = localStorage.getItem('hex-lang') || 'en';
    applyLanguage(saved);
})();
