<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="InvFlow is a simple inventory, GST billing, CRM and reporting platform for Indian businesses.">
  <title>@yield('title', 'Inventory Management Made Simple') | InvFlow</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}?v={{ filemtime(public_path('frontend/css/style.css')) }}">
</head>
<body>
  @include('frontend.include.header')

  @yield('content')

  @include('frontend.include.footer')
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const animatedItems = document.querySelectorAll([
        '.section-heading',
        '.feature-card',
        '.mini-card',
        '.info-card',
        '.seo-card',
        '.stat-card',
        '.workflow-panel > div',
        '.impact-grid > div',
        '.pricing-card',
        '.story-card',
        '.form-card',
        '.cta'
      ].join(','));

      animatedItems.forEach((item, index) => {
        item.classList.add('reveal-on-scroll');
        item.style.setProperty('--reveal-delay', `${Math.min(index % 6, 5) * 70}ms`);
      });

      if (!('IntersectionObserver' in window)) {
        animatedItems.forEach(item => item.classList.add('is-visible'));
        return;
      }

      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.classList.add('is-visible');
            observer.unobserve(entry.target);
          }
        });
      }, { threshold: 0.12, rootMargin: '0px 0px -60px 0px' });

      animatedItems.forEach(item => observer.observe(item));
    });
  </script>
</body>
</html>