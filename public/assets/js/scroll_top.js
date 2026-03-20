(function () {
  var toTopBtn = document.querySelector('.global-scroll-top-btn');

  if (!toTopBtn) {
    return;
  }

  function isNearBottom() {
    var scrollTop = window.pageYOffset || document.documentElement.scrollTop || 0;
    var viewportHeight = window.innerHeight || document.documentElement.clientHeight || 0;
    var pageHeight = Math.max(document.body.scrollHeight, document.documentElement.scrollHeight);
    var remaining = pageHeight - (scrollTop + viewportHeight);
    return remaining <= 220;
  }

  function updateButtonVisibility() {
    var viewportHeight = window.innerHeight || document.documentElement.clientHeight || 0;
    var pageHeight = Math.max(document.body.scrollHeight, document.documentElement.scrollHeight);
    var pageCanScroll = pageHeight > viewportHeight + 220;
    toTopBtn.classList.toggle('is-visible', pageCanScroll && isNearBottom());
  }

  toTopBtn.addEventListener('click', function (event) {
    event.preventDefault();
    window.scrollTo({ top: 0, behavior: 'smooth' });
  });

  window.addEventListener('scroll', updateButtonVisibility, { passive: true });
  window.addEventListener('resize', updateButtonVisibility);

  updateButtonVisibility();
})();
