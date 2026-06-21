@extends('frontend.layouts.app')

@section('title', 'Pricing')

@section('content')
<main>
  <header class="page-header">
    <div class="container hero-grid">
      <div class="hero-copy">
        <span class="eyebrow">Simple pricing</span>
        <h1>Choose a plan that grows with you.</h1>
        <p class="lead">Start free, upgrade anytime and choose clear monthly pricing in dollars for inventory management, GST billing, CRM and reports.</p>
        <div class="hero-proof">
          <span><i class="fa-solid fa-circle-check"></i> 14-day trial</span>
          <span><i class="fa-solid fa-circle-check"></i> No setup fee</span>
          <span><i class="fa-solid fa-circle-check"></i> Cancel anytime</span>
        </div>
      </div>
      <div class="hero-visual hero-visual-soft" aria-hidden="true">
        <div class="price-preview">
          <span>Popular</span>
          <strong>$9<small>/month</small></strong>
          <p>GST billing, inventory and WhatsApp invoices for growing shops.</p>
          <div class="price-line"></div>
          <div class="price-line short"></div>
        </div>
      </div>
    </div>
  </header>

  <section class="section">
    <div class="container">
      <div class="section-heading">
        <span class="eyebrow">Plans and pricing</span>
        <h2>Affordable inventory management software plans</h2>
        <p>Pick the plan that matches your product count, warehouse workflow, billing needs and reporting depth. Every plan is designed to keep stock, invoices and customers connected.</p>
      </div>
      <div class="row g-4 justify-content-center">
        @php
          $plans = [
            ['Free', '$0', 'For new businesses testing stock control', 'Start with essential inventory tracking, basic customer records and simple reports.', ['100 products', '1 warehouse', 'Basic reports', 'Email support'], false],
            ['Starter', '$9', 'For growing shops and small teams', 'Add GST billing, multiple warehouses and faster invoice sharing for everyday operations.', ['Unlimited products', 'Multiple warehouses', 'GST billing', 'WhatsApp invoices'], true],
            ['Business', '$29', 'For established teams and distributors', 'Unlock smarter reports, forecasting, CRM and controls for higher order volume.', ['Everything in Starter', 'AI forecasting', 'CRM and support desk', 'Advanced reports'], false],
            ['Enterprise', 'Custom', 'For complex operations', 'Get dedicated onboarding, API access and priority support for multi-branch workflows.', ['Everything in Business', 'Dedicated onboarding', 'API access', 'Priority support'], false],
          ];
        @endphp
        @foreach ($plans as [$name, $price, $description, $summary, $items, $featured])
          <div class="col-md-6 col-xl-3">
            <article class="pricing-card {{ $featured ? 'featured' : '' }}">
              @if ($featured)<span class="plan-badge">Most Popular</span>@endif
              <h2 class="h4">{{ $name }}</h2>
              <p>{{ $description }}</p>
              <p class="plan-summary">{{ $summary }}</p>
              <div class="price">{{ $price }}@if ($price !== 'Custom')<small>/month</small>@endif</div>
              <a class="btn {{ $featured ? 'btn-primary' : 'btn-outline-primary' }} w-100 mb-4" href="{{ route($name === 'Enterprise' ? 'frontend.contact' : 'frontend.register') }}">
                {{ $name === 'Enterprise' ? 'Contact Sales' : 'Get Started' }}
              </a>
              <ul class="check-list">
                @foreach ($items as $item)<li>{{ $item }}</li>@endforeach
              </ul>
            </article>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  <section class="section section-soft">
    <div class="container">
      <div class="section-heading">
        <h2>Included in every plan</h2>
        <p>Secure access, regular updates, data exports and a 14-day trial are standard.</p>
      </div>
      <div class="row g-4 text-center">
        <div class="col-md-4"><div class="info-card"><h3 class="h5">No setup fee</h3><p class="mb-0">Create your account and begin immediately.</p></div></div>
        <div class="col-md-4"><div class="info-card"><h3 class="h5">Cancel anytime</h3><p class="mb-0">No lock-in period or cancellation penalty.</p></div></div>
        <div class="col-md-4"><div class="info-card"><h3 class="h5">Your data stays yours</h3><p class="mb-0">Export business data whenever you need it.</p></div></div>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="row g-5 align-items-center">
        <div class="col-lg-6">
          <span class="eyebrow">Pricing value</span>
          <h2>Pay for the workflows your business actually uses</h2>
          <p>InvFlow pricing is built around practical inventory management software needs: live stock tracking, GST billing, warehouse transfers, customer follow-ups and reports. You can begin with a smaller plan and upgrade when your team needs more automation.</p>
          <ul class="check-list split-list">
            <li>Clear monthly dollar pricing</li>
            <li>Inventory and billing tools in every paid plan</li>
            <li>Data export support for accounts and audits</li>
            <li>Upgrade when products, users or branches grow</li>
          </ul>
        </div>
        <div class="col-lg-6">
          <div class="impact-grid">
            <div><strong>$0</strong><span>Start with basic inventory software</span></div>
            <div><strong>$9</strong><span>Run billing and multi-warehouse stock</span></div>
            <div><strong>$29</strong><span>Add CRM, forecasting and reports</span></div>
            <div><strong>Custom</strong><span>Scale with onboarding and API access</span></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  @include('frontend.include.faqs', [
    'eyebrow' => 'Pricing FAQs',
    'title' => 'Questions about InvFlow pricing',
    'copy' => 'Clear answers about trial access, dollar pricing, plan upgrades and included inventory management features.',
    'faqs' => [
      ['Can I change plans later?', 'Yes. You can start with a smaller plan and upgrade when your team, product list or reporting needs grow.'],
      ['Do I need a credit card for the trial?', 'No. The trial is designed so you can explore inventory, billing and reports before choosing a paid plan.'],
      ['Are prices shown in dollars?', 'Yes. The pricing page shows monthly plan prices in dollars for easier comparison.'],
      ['What is included in the Free plan?', 'The Free plan includes basic product tracking, one warehouse, simple reports and email support.'],
      ['What makes Starter popular?', 'Starter adds unlimited products, multiple warehouses, GST billing and WhatsApp invoice workflows.'],
      ['Who should choose Business?', 'Business is useful for teams that need forecasting, CRM, support desk features and advanced reports.'],
      ['Is Enterprise custom priced?', 'Yes. Enterprise is custom for complex operations that need onboarding, API access and priority support.'],
      ['Can I cancel anytime?', 'Yes. Plans are designed without long-term lock-in or cancellation penalties.'],
      ['Is onboarding available?', 'Yes. Business and Enterprise customers can get guided setup for products, warehouses, taxes, users and opening stock.'],
      ['Does every paid plan include inventory and billing?', 'Yes. Paid plans are built around connected inventory management, GST billing and reporting workflows.'],
    ],
  ])
</main>
@endsection
