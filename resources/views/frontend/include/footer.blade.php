<footer class="site-footer">
  <div class="container">
    <div class="row g-4 footer-main">
      <div class="col-lg-5">
        <a class="footer-brand" href="{{ route('frontend.home') }}">
          <i class="fa-solid fa-layer-group"></i> InvFlow
        </a>
        <p class="footer-copy">Inventory, GST billing, CRM and reports in one simple workspace for growing Indian businesses.</p>
      </div>
      <div class="col-6 col-lg-2">
        <h2 class="footer-title">Product</h2>
        <a href="{{ route('frontend.product') }}">Overview</a>
        <a href="{{ route('frontend.features') }}">Features</a>
        <a href="{{ route('frontend.pricing') }}">Pricing</a>
      </div>
      <div class="col-6 col-lg-2">
        <h2 class="footer-title">Company</h2>
        <a href="{{ route('frontend.about') }}">About</a>
        <a href="{{ route('frontend.contact') }}">Contact</a>
        <a href="{{ route('frontend.login') }}">Login</a>
      </div>
      <div class="col-lg-3">
        <h2 class="footer-title">Ready to begin?</h2>
        <p class="footer-copy">Start a 14-day free trial. No credit card required.</p>
        <a class="btn btn-light btn-sm" href="{{ route('frontend.register') }}">Create Account</a>
      </div>
    </div>
    <div class="footer-bottom">
      <span>&copy; {{ date('Y') }} InvFlow. All rights reserved.</span>
      <span>Built for businesses in India.</span>
    </div>
  </div>
</footer>