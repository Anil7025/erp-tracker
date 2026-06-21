@extends('frontend.layouts.app')

@section('title', 'Home')

@section('content')
<header class="hero text-center">
  <div class="container position-relative hero-grid">
    <div class="hero-copy">
      <span class="eyebrow">Inventory made simple</span>
      <h1>Run your entire business from one clear workspace.</h1>
      <p class="lead">Manage inventory, GST billing, customers and reports without switching between disconnected tools.</p>
      <div class="hero-actions">
        <a href="{{ route('frontend.register') }}" class="btn btn-primary btn-lg">Start Free Trial</a>
        <a href="{{ route('frontend.product') }}" class="btn btn-outline-primary btn-lg">Explore Product</a>
      </div>
      <div class="hero-proof">
        <span><i class="fa-solid fa-circle-check"></i> GST-ready billing</span>
        <span><i class="fa-solid fa-circle-check"></i> Live stock tracking</span>
        <span><i class="fa-solid fa-circle-check"></i> Built for Indian SMBs</span>
      </div>
    </div>
    <div class="hero-visual" aria-hidden="true">
      <div class="dashboard-card">
        <div class="dashboard-top"><span></span><span></span><span></span></div>
        <div class="dashboard-row"><i class="fa-solid fa-boxes-stacked"></i><div><strong>1,248</strong><small>Products tracked</small></div></div>
        <div class="dashboard-row"><i class="fa-solid fa-file-invoice"></i><div><strong>Rs. 4.8L</strong><small>Monthly billing</small></div></div>
        <div class="mini-chart"><span style="height: 42%"></span><span style="height: 68%"></span><span style="height: 54%"></span><span style="height: 82%"></span><span style="height: 63%"></span></div>
      </div>
      <div class="floating-chip chip-one"><i class="fa-solid fa-bell"></i> Low stock alerts</div>
      <div class="floating-chip chip-two"><i class="fa-solid fa-check"></i> GST invoice sent</div>
    </div>
  </div>
</header>

<main>
  <section class="section">
    <div class="container">
      <div class="section-heading">
        <span class="eyebrow">One connected platform</span>
        <h2>Everything you need to stay in control</h2>
        <p>Simple tools for day-to-day operations, designed around the way Indian businesses work.</p>
      </div>
      <div class="row g-4">
        @php
          $features = [
            ['fa-boxes-stacked', 'Real-time inventory', 'Track stock across locations, transfers, batches and low-stock alerts.'],
            ['fa-file-invoice', 'GST-ready billing', 'Create professional invoices with HSN/SAC codes and clear tax calculations.'],
            ['fa-comments', 'Customer communication', 'Share invoices, reminders and order updates through WhatsApp and email.'],
            ['fa-chart-line', 'Useful reports', 'Understand sales, margins, stock movement and purchasing from one dashboard.'],
            ['fa-users', 'Built-in CRM', 'Keep customer, supplier and follow-up information connected to every transaction.'],
            ['fa-shield-halved', 'Secure access', 'Give each team member the right role and maintain a complete activity trail.'],
          ];
        @endphp
        @foreach ($features as [$icon, $title, $copy])
          <div class="col-md-6 col-lg-4">
            <article class="feature-card">
              <div class="icon-box"><i class="fa-solid {{ $icon }}"></i></div>
              <h3 class="h5">{{ $title }}</h3>
              <p class="mb-0">{{ $copy }}</p>
            </article>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  <section class="section section-soft">
    <div class="container">
      <div class="section-heading">
        <span class="eyebrow">Why teams switch</span>
        <h2>Fewer gaps between stock, sales and accounts</h2>
        <p>Most teams start with spreadsheets because they are familiar. As orders grow, the same sheets become slow, duplicated and difficult to audit. InvFlow gives each team member a clear place to work while keeping owners in control.</p>
      </div>
      <div class="row g-4">
        <div class="col-md-6 col-lg-3"><div class="mini-card"><i class="fa-solid fa-table-cells-large"></i><h3>No scattered sheets</h3><p>Product, customer and invoice records stay connected instead of being copied across files.</p></div></div>
        <div class="col-md-6 col-lg-3"><div class="mini-card"><i class="fa-solid fa-triangle-exclamation"></i><h3>Fewer stock errors</h3><p>Low-stock alerts and live movement history help teams catch issues before customers are affected.</p></div></div>
        <div class="col-md-6 col-lg-3"><div class="mini-card"><i class="fa-solid fa-indian-rupee-sign"></i><h3>Clear collections</h3><p>Payment status, reminders and customer credit are visible without calling every salesperson.</p></div></div>
        <div class="col-md-6 col-lg-3"><div class="mini-card"><i class="fa-solid fa-chart-simple"></i><h3>Better decisions</h3><p>Owners can see profitable items, slow movers and buying trends before placing the next order.</p></div></div>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="row g-5 align-items-center">
        <div class="col-lg-6">
          <span class="eyebrow">Daily workflow</span>
          <h2>From purchase to payment, every step stays connected</h2>
          <p>InvFlow helps your team receive stock, update inventory, raise GST invoices, follow up with customers and review business performance from one place. It reduces repeated entry and gives owners a dependable view of what is happening today.</p>
          <ul class="check-list split-list">
            <li>Receive purchase orders and update batches instantly</li>
            <li>Convert estimates into invoices without retyping details</li>
            <li>Send payment reminders through WhatsApp or email</li>
            <li>Review stock ageing, sales trends and reorder needs</li>
          </ul>
        </div>
        <div class="col-lg-6">
          <div class="workflow-panel">
            <div><span>01</span><strong>Receive</strong><p>Log new products, supplier bills and warehouse movements.</p></div>
            <div><span>02</span><strong>Sell</strong><p>Create GST invoices and share branded PDFs with customers.</p></div>
            <div><span>03</span><strong>Collect</strong><p>Track dues, payments, credit notes and follow-ups.</p></div>
            <div><span>04</span><strong>Improve</strong><p>Use reports to reduce stockouts, dead stock and manual work.</p></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section section-soft">
    <div class="container">
      <div class="section-heading">
        <span class="eyebrow">Measurable impact</span>
        <h2>Less manual work, better decisions</h2>
      </div>
      <div class="row g-4">
        <div class="col-6 col-lg-3"><div class="stat-card"><span class="stat-number">40%</span><span>less dead stock</span></div></div>
        <div class="col-6 col-lg-3"><div class="stat-card"><span class="stat-number">2x</span><span>faster collections</span></div></div>
        <div class="col-6 col-lg-3"><div class="stat-card"><span class="stat-number">24/7</span><span>stock visibility</span></div></div>
        <div class="col-6 col-lg-3"><div class="stat-card"><span class="stat-number">5 min</span><span>to get started</span></div></div>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="section-heading">
        <span class="eyebrow">Who it helps</span>
        <h2>Made for teams that move stock every day</h2>
        <p>Whether you run a retail shop, distribution business or service operation, InvFlow keeps your stock, invoices and customer records easy to trust.</p>
      </div>
      <div class="row g-4">
        <div class="col-md-4"><article class="info-card"><h3 class="h5">Retail and stores</h3><p class="mb-0">Maintain shelf stock, handle fast billing, watch low-stock items and understand which products actually bring profit.</p></article></div>
        <div class="col-md-4"><article class="info-card"><h3 class="h5">Wholesalers</h3><p class="mb-0">Manage bulk orders, customer credit, warehouse movement and GST paperwork without losing control of inventory.</p></article></div>
        <div class="col-md-4"><article class="info-card"><h3 class="h5">Service businesses</h3><p class="mb-0">Track parts, supplies, customer jobs, documents and payments in the same workspace your team already uses.</p></article></div>
      </div>
    </div>
  </section>

  <section class="section section-soft">
    <div class="container">
      <div class="section-heading">
        <span class="eyebrow">SEO-focused business workflows</span>
        <h2>Inventory management software for growing Indian businesses</h2>
        <p>InvFlow supports retail inventory management, GST billing software, warehouse stock control, CRM, purchase tracking and business reports in one practical dashboard.</p>
      </div>
      <div class="row g-4">
        <div class="col-md-6 col-lg-4">
          <article class="seo-card">
            <i class="fa-solid fa-store"></i>
            <h3 class="h5">Retail inventory software</h3>
            <p>Manage product stock, barcode billing, fast-moving items, expiry dates and customer sales from a simple retail inventory system.</p>
          </article>
        </div>
        <div class="col-md-6 col-lg-4">
          <article class="seo-card">
            <i class="fa-solid fa-truck-ramp-box"></i>
            <h3 class="h5">Wholesale stock management</h3>
            <p>Track bulk orders, credit limits, warehouse transfers, supplier purchases and GST invoices without depending on scattered spreadsheets.</p>
          </article>
        </div>
        <div class="col-md-6 col-lg-4">
          <article class="seo-card">
            <i class="fa-solid fa-file-circle-check"></i>
            <h3 class="h5">GST billing and reports</h3>
            <p>Create GST-ready invoices with HSN/SAC codes, payment tracking, tax summaries and exportable sales reports for accountants.</p>
          </article>
        </div>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="row g-5 align-items-center">
        <div class="col-lg-6">
          <span class="eyebrow">Implementation support</span>
          <h2>Move from Excel to cloud inventory management with confidence</h2>
          <p>For many Indian SMBs, inventory starts in Excel and then becomes difficult to maintain as branches, orders and team members increase. InvFlow keeps the familiar structure of products, customers and invoices while adding live stock updates, user roles, reminders and reporting.</p>
          <ul class="check-list split-list">
            <li>Import products, customers and opening stock</li>
            <li>Set GST, HSN/SAC and invoice formats</li>
            <li>Create warehouse, branch and team access rules</li>
            <li>Start with billing first, then add advanced reports</li>
          </ul>
        </div>
        <div class="col-lg-6">
          <div class="impact-grid">
            <div><strong>Day 1</strong><span>Import master data</span></div>
            <div><strong>Week 1</strong><span>Use GST billing and stock updates</span></div>
            <div><strong>Month 1</strong><span>Review sales, stock and collections</span></div>
            <div><strong>Always</strong><span>Keep every team member aligned</span></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  @include('frontend.include.faqs', [
    'eyebrow' => 'FAQs',
    'title' => 'Questions about inventory, GST billing and setup',
    'copy' => 'Clear answers for owners comparing inventory management software for their business.',
    'faqs' => [
      ['What is InvFlow used for?', 'InvFlow is inventory management software for tracking stock, GST billing, customers, suppliers, payments and business reports in one connected workspace.'],
      ['Is InvFlow suitable for small businesses in India?', 'Yes. InvFlow is built for Indian retailers, wholesalers, distributors and service teams that need simple stock control, GST invoices and daily visibility.'],
      ['Can I create GST invoices with HSN or SAC codes?', 'Yes. You can create GST-ready invoices with product tax details, HSN/SAC codes, payment status and branded PDF sharing.'],
      ['Can I manage multiple warehouses or branches?', 'Yes. InvFlow supports stock visibility across stores, warehouses and transfer workflows so your team can see where inventory is available.'],
      ['Can I move my Excel inventory data into InvFlow?', 'Yes. You can import product lists, customers, suppliers and opening stock so your business can shift from spreadsheets to cloud inventory management.'],
      ['Does InvFlow help with low-stock alerts?', 'Yes. Reorder levels, stock movement history and alerts help teams reduce stockouts, over-purchasing and dead stock.'],
      ['Can my sales team share invoices on WhatsApp?', 'Yes. Teams can share invoices, reminders and order updates through WhatsApp and email to speed up customer communication.'],
      ['Is customer and supplier information included?', 'Yes. InvFlow includes CRM-style records for customers, suppliers, follow-ups, payments and communication history.'],
      ['Do I need technical knowledge to start?', 'No. The setup is designed for business users. You can start with products and billing, then add roles, reports and advanced controls later.'],
      ['Is there a free trial?', 'Yes. You can start a 14-day free trial without a credit card and explore inventory, billing, CRM and reporting features.'],
    ],
  ])

  <section class="section cta-section">
    <div class="container">
      <div class="cta cta-split">
        <div>
          <span class="eyebrow">Start free today</span>
          <h2>Bring inventory, GST billing and customer follow-ups into one system.</h2>
          <p>Start your 14-day free trial and see how InvFlow can reduce manual work for your shop, warehouse or service team.</p>
        </div>
        <div class="cta-actions">
          <a href="{{ route('frontend.register') }}" class="btn btn-light">Create Free Account</a>
          <a href="{{ route('frontend.contact') }}" class="btn btn-outline-light">Book a Demo</a>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection
