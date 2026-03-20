<script>
(function(){
  var animated = new Set();
  function animateCount(el) {
    var target = parseInt(el.getAttribute('data-count-target'), 10);
    var suffix = el.getAttribute('data-count-suffix') || '';
    var duration = 4000;
    var start = performance.now();
    function step(now) {
      var elapsed = now - start;
      var progress = Math.min(elapsed / duration, 1);
      var eased = 1 - Math.pow(1 - progress, 3);
      var current = Math.round(eased * target);
      el.textContent = current + suffix;
      if (progress < 1) requestAnimationFrame(step);
    }
    requestAnimationFrame(step);
  }
  function checkAndAnimate(sectionEl) {
    var els = sectionEl.querySelectorAll('[data-count-target]');
    els.forEach(function(el) {
      if (!animated.has(el)) { animated.add(el); animateCount(el); }
    });
  }
  var observer = new IntersectionObserver(function(entries) {
    entries.forEach(function(entry) {
      if (entry.isIntersecting) {
        checkAndAnimate(entry.target);
      }
    });
  }, { threshold: 0.1 });
  var sections = new Set();
  document.querySelectorAll('[data-count-target]').forEach(function(el) {
    var section = el.closest('section') || el.closest('.hp-stats') || el.parentElement;
    if (section && !sections.has(section)) {
      sections.add(section);
      observer.observe(section);
    }
  });
})();
</script>
