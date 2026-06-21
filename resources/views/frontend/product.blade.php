@extends('frontend.layouts.app')

@section('title', 'Product')

@section('content')
<main>
  <header class="page-header">
    <div class="container hero-grid">
      <div class="hero-copy">
        <span class="eyebrow">The InvFlow platform</span>
        <h1>One system for inventory and business operations.</h1>
        <p class="lead">Replace scattered spreadsheets and apps with a workspace that keeps stock, billing, customers and reports connected.</p>
        <div class="hero-actions">
          <a href="{{ route('frontend.register') }}" class="btn btn-primary">Start Free Trial</a>
          <a href="{{ route('frontend.contact') }}" class="btn btn-outline-primary">Book a Demo</a>
        </div>
      </div>
      <div class="hero-visual hero-visual-soft" aria-hidden="true">
        <div class="dashboard-card compact">
          <div class="visual-title"><i class="fa-solid fa-layer-group"></i> Connected modules</div>
          <div class="module-pill">Inventory <span>Live</span></div>
          <div class="module-pill">Billing <span>GST</span></div>
          <div class="module-pill">CRM <span>Follow-ups</span></div>
          <div class="module-pill">Reports <span>Daily</span></div>
        </div>
      </div>
    </div>
  </header>

  <section class="section">
    <div class="container">
      <div class="row g-4 align-items-center">
        <div class="col-lg-6">
          <span class="eyebrow">Why InvFlow</span>
          <h2>A single source of truth for your team</h2>
          <p>Inventory data often lives in one app, invoices in another and customer conversations somewhere else. InvFlow brings them together so your team can work faster with fewer errors.</p>
        </div>
        <div class="col-lg-6">
          <div class="info-card">
            <ul class="check-list">
              <li>Live stock across warehouses and stores</li>
              <li>GST-compliant invoices and tax-ready exports</li>
              <li>Customer and supplier records with activity history</li>
              <li>WhatsApp and email communication</li>
              <li>Sales, purchase, profit and inventory reports</li>
              <li>Role-based access for every team member</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section section-soft">
    <div class="container">
      <div class="section-heading">
        <span class="eyebrow">Core modules</span>
        <h2>Built to support the complete workflow</h2>
      </div>
      <div class="row g-4">
        @php
          $modules = [
            ['fa-warehouse', 'Inventory', 'Products, warehouses, stock transfers, batches, expiry dates and barcode scanning.'],
            ['fa-receipt', 'Billing', 'GST invoices, payments, credit notes, branded PDFs and compliance reports.'],
            ['fa-address-book', 'CRM', 'Customers, suppliers, leads, follow-ups and communication history.'],
            ['fa-headset', 'Support desk', 'Customer tickets, priorities, assignments, status updates and internal notes.'],
            ['fa-folder-open', 'Documents', 'Organized files and attachments connected to products and business contacts.'],
            ['fa-chart-pie', 'Analytics', 'Actionable stock, sales, purchase, margin and forecasting insights.'],
          ];
        @endphp
        @foreach ($modules as [$icon, $title, $copy])
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

  <section class="section">
    <div class="container">
      <div class="section-heading">
        <span class="eyebrow">How teams use it</span>
        <h2>A practical operating system for everyday work</h2>
        <p>InvFlow is designed to support the common decisions owners and managers make every day: what to buy, what to sell, who owes money and where the team needs attention.</p>
      </div>
      <div class="row g-4">
        <div class="col-lg-4">
          <article class="info-card">
            <h3 class="h5">For owners</h3>
            <p>See sales, purchases, payments due, low stock and margin movement without waiting for manual summaries at the end of the week.</p>
          </article>
        </div>
        <div class="col-lg-4">
          <article class="info-card">
            <h3 class="h5">For sales teams</h3>
            <p>Create estimates, confirm available stock, share invoices and follow up with customers while every update stays visible to the office.</p>
          </article>
        </div>
        <div class="col-lg-4">
          <article class="info-card">
            <h3 class="h5">For operations</h3>
            <p>Receive stock, manage transfers, scan barcodes and keep documents attached to the products, suppliers and orders they belong to.</p>
          </article>
        </div>
      </div>
    </div>
  </section>

  <section class="section section-soft">
    <div class="container">
      <div class="row g-5 align-items-center">
        <div class="col-lg-6">
          <span class="eyebrow">Setup and migration</span>
          <h2>Start clean without losing your existing data</h2>
          <p>Bring your product list, opening stock, customer records and supplier details into InvFlow with structured imports. Your team can begin with the essentials first, then add advanced controls like roles, batch tracking and forecasting when the process is ready.</p>
          <p>For growing teams, this keeps onboarding realistic. You do not need to redesign the entire business in one day. Start with the workflows that create the most confusion, measure the improvement and expand from there.</p>
        </div>
        <div class="col-lg-6">
          <div class="workflow-panel">
            <div><span>A</span><strong>Import basics</strong><p>Products, contacts, tax settings and opening balances.</p></div>
            <div><span>B</span><strong>Invite team</strong><p>Give staff access based on billing, inventory or reporting roles.</p></div>
            <div><span>C</span><strong>Go live</strong><p>Start invoicing and stock updates while keeping exports available.</p></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="section-heading">
        <span class="eyebrow">Industry-ready product</span>
        <h2>Inventory management software for retail, wholesale and service teams</h2>
        <p>InvFlow works as a cloud inventory system, GST billing platform, CRM and reporting dashboard for businesses that need accurate stock and faster customer follow-ups.</p>
      </div>
      <div class="row g-4">
        <div class="col-md-6 col-lg-4">
          <article class="seo-card">
            <i class="fa-solid fa-shop"></i>
            <h3 class="h5">Retail inventory management</h3>
            <p>Track SKUs, shelf stock, barcode billing, sales returns and low-stock alerts from one easy product dashboard.</p>
          </article>
        </div>
        <div class="col-md-6 col-lg-4">
          <article class="seo-card">
            <i class="fa-solid fa-warehouse"></i>
            <h3 class="h5">Warehouse stock control</h3>
            <p>Manage warehouse transfers, batches, purchase entries, supplier records and stock movement history with clear visibility.</p>
          </article>
        </div>
        <div class="col-md-6 col-lg-4">
          <article class="seo-card">
            <i class="fa-solid fa-handshake"></i>
            <h3 class="h5">CRM and billing workflow</h3>
            <p>Keep customer records, payment reminders, GST invoices and communication history connected to every order.</p>
          </article>
        </div>
      </div>
    </div>
  </section>

  @include('frontend.include.faqs', [
    'eyebrow' => 'Product FAQs',
    'title' => 'Questions about the InvFlow product',
    'copy' => 'Common answers for teams comparing InvFlow as inventory management software, GST billing software and CRM.',
    'faqs' => [
      ['What is InvFlow?', 'InvFlow is a business operations platform for inventory management, GST billing, CRM, documents and reports.'],
      ['Who should use InvFlow?', 'Retailers, wholesalers, distributors and service businesses can use InvFlow to manage stock, invoices and customer work.'],
      ['Does InvFlow replace spreadsheets?', 'Yes. It helps teams move from scattered Excel files to connected inventory, billing and reporting workflows.'],
      ['Can I track stock across locations?', 'Yes. InvFlow supports multiple warehouses, stores and stock transfer workflows.'],
      ['Is GST billing part of the product?', 'Yes. GST invoices, tax calculations, payments, credit notes and reports are included in the billing workflow.'],
      ['Does InvFlow include CRM?', 'Yes. Customer, supplier, lead, follow-up and communication history can stay connected with transactions.'],
      ['Can I attach documents?', 'Yes. Documents and files can be organized with products, contacts and business records.'],
      ['Is onboarding available?', 'Yes. Teams can start with imports and setup guidance for products, warehouses, users and tax settings.'],
      ['Can managers see reports?', 'Yes. Owners and managers can review inventory, sales, purchase, margin and customer reports.'],
      ['Can InvFlow grow with my business?', 'Yes. You can start with core workflows and add advanced controls as your products, branches and users grow.'],
    ],
  ])
</main>
@endsection
