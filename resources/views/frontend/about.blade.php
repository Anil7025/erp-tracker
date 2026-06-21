@extends('frontend.layouts.app')

@section('title', 'About')

@section('content')
<main>
  <header class="page-header">
    <div class="container hero-grid">
      <div class="hero-copy">
        <span class="eyebrow">About InvFlow</span>
        <h1>Business software should feel simple.</h1>
        <p class="lead">We are building an affordable operations platform around the real needs of Indian small and medium businesses.</p>
      </div>
      <div class="hero-visual" aria-hidden="true">
        <div class="story-card">
          <i class="fa-solid fa-people-group"></i>
          <strong>Built around daily business work</strong>
          <p>Less duplicate entry, clearer stock, faster billing and better decisions for practical teams.</p>
        </div>
      </div>
    </div>
  </header>

  <section class="section">
    <div class="container">
      <div class="row g-5">
        <div class="col-lg-6">
          <span class="eyebrow">Our mission</span>
          <h2>Remove complexity from everyday operations</h2>
          <p>Growing businesses should not need seven different tools to understand stock, create invoices and serve customers. InvFlow connects these workflows in one clear system.</p>
          <ul class="check-list">
            <li>Designed for GST and Indian business workflows</li>
            <li>Simple pricing with no hidden charges</li>
            <li>Useful automation without unnecessary complexity</li>
            <li>Responsive support in local business hours</li>
          </ul>
        </div>
        <div class="col-lg-6">
          <div class="info-card">
            <span class="eyebrow">Our approach</span>
            <h2 class="h3">Built around customer outcomes</h2>
            <p>We focus on reducing manual work, improving stock visibility and helping teams make faster decisions. Every feature must solve a real operational problem.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section section-soft">
    <div class="container">
      <div class="section-heading"><h2>What we value</h2></div>
      <div class="row g-4">
        <div class="col-md-4"><div class="feature-card"><div class="icon-box"><i class="fa-solid fa-users"></i></div><h3 class="h5">Customer first</h3><p class="mb-0">Real feedback guides the product and our priorities.</p></div></div>
        <div class="col-md-4"><div class="feature-card"><div class="icon-box"><i class="fa-solid fa-shield-halved"></i></div><h3 class="h5">Trust by default</h3><p class="mb-0">Clear pricing, responsible data handling and honest communication.</p></div></div>
        <div class="col-md-4"><div class="feature-card"><div class="icon-box"><i class="fa-solid fa-wand-magic-sparkles"></i></div><h3 class="h5">Keep improving</h3><p class="mb-0">Small, useful improvements shipped consistently.</p></div></div>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="row g-5 align-items-center">
        <div class="col-lg-6">
          <div class="info-card">
            <span class="eyebrow">Why we exist</span>
            <h2 class="h3">Most businesses do not need more complexity</h2>
            <p>They need fewer duplicate entries, fewer missing records and faster answers. InvFlow is built for practical teams that want dependable software without enterprise-level confusion.</p>
            <p class="mb-0">Our goal is to make inventory, billing and customer work feel organized enough for managers and simple enough for everyday staff.</p>
          </div>
        </div>
        <div class="col-lg-6">
          <span class="eyebrow">Our promise</span>
          <h2>Simple setup, useful support and steady improvement</h2>
          <p>We keep onboarding clear, pricing transparent and product updates focused on real operational value. Every improvement should help a business save time, reduce confusion or make a better decision.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="section section-soft">
    <div class="container">
      <div class="section-heading">
        <span class="eyebrow">Built for Indian SMBs</span>
        <h2>Why businesses choose InvFlow for inventory and billing</h2>
        <p>Our product direction is shaped by the needs of growing businesses that want simple inventory management software, GST billing, customer follow-up tools and practical reports without enterprise complexity.</p>
      </div>
      <div class="row g-4">
        <div class="col-md-6 col-lg-3">
          <div class="mini-card"><i class="fa-solid fa-receipt"></i><h3>GST workflow</h3><p>Invoices, taxes, payment status and reports stay connected for cleaner daily billing.</p></div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="mini-card"><i class="fa-solid fa-box-open"></i><h3>Stock clarity</h3><p>Owners can see stock availability, movement, low-stock items and reorder needs faster.</p></div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="mini-card"><i class="fa-solid fa-users-gear"></i><h3>Team access</h3><p>Role-based access helps billing, sales and operations teams work without confusion.</p></div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="mini-card"><i class="fa-solid fa-chart-line"></i><h3>Useful reports</h3><p>Sales, purchase, margin and inventory reports help teams make better decisions.</p></div>
        </div>
      </div>
    </div>
  </section>

  @include('frontend.include.faqs', [
    'eyebrow' => 'About FAQs',
    'title' => 'Questions about InvFlow and our approach',
    'copy' => 'Learn how InvFlow is built for practical inventory, billing and customer workflows for growing businesses.',
    'faqs' => [
      ['Why was InvFlow created?', 'InvFlow was created to simplify inventory, GST billing, customer follow-ups and reports for growing businesses.'],
      ['Who is InvFlow built for?', 'It is built for Indian SMBs, retailers, wholesalers, distributors and service teams that need practical operations software.'],
      ['What makes InvFlow different?', 'InvFlow focuses on connected daily workflows instead of forcing teams to use separate tools and spreadsheets.'],
      ['Is InvFlow simple for staff?', 'Yes. The product is designed so everyday billing, inventory and customer work stays clear for non-technical users.'],
      ['Does InvFlow support Indian business workflows?', 'Yes. GST billing, HSN/SAC details, customer credit, stock movement and reports are part of the product direction.'],
      ['How does InvFlow improve decisions?', 'Owners can see live stock, sales, purchases, margins and customer dues without waiting for manual summaries.'],
      ['Is customer feedback used?', 'Yes. Product priorities are shaped by real operational problems shared by businesses and teams.'],
      ['Does InvFlow avoid hidden complexity?', 'Yes. The goal is to keep onboarding, pricing and workflows clear while still supporting growth.'],
      ['Can small teams use InvFlow?', 'Yes. Small teams can begin with products and invoices, then add more controls as needed.'],
      ['What is the long-term goal?', 'The goal is to make inventory, billing and customer operations easier to trust, manage and improve.'],
    ],
  ])
</main>
@endsection
