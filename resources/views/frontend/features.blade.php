@extends('frontend.layouts.app')

@section('title', 'Features')

@section('content')
<main>
  <header class="page-header">
    <div class="container hero-grid">
      <div class="hero-copy">
        <span class="eyebrow">Features</span>
        <h1>Practical tools for every part of your operation.</h1>
        <p class="lead">From receiving stock to collecting payments, InvFlow keeps daily work simple and visible.</p>
        <div class="hero-proof">
          <span><i class="fa-solid fa-circle-check"></i> Inventory</span>
          <span><i class="fa-solid fa-circle-check"></i> Billing</span>
          <span><i class="fa-solid fa-circle-check"></i> Reports</span>
        </div>
      </div>
      <div class="hero-visual" aria-hidden="true">
        <div class="feature-stack">
          <div><i class="fa-solid fa-barcode"></i><strong>Barcode stock</strong><span>Scan and update items faster</span></div>
          <div><i class="fa-solid fa-message"></i><strong>WhatsApp updates</strong><span>Share invoices and reminders</span></div>
          <div><i class="fa-solid fa-chart-column"></i><strong>Business reports</strong><span>Sales, margin and stock trends</span></div>
        </div>
      </div>
    </div>
  </header>

  <section class="section">
    <div class="container">
      <div class="section-heading">
        <span class="eyebrow">Complete feature set</span>
        <h2>Powerful inventory, billing and CRM features in one place</h2>
        <p>Use these tools to reduce manual work, improve stock accuracy, speed up GST billing and keep every customer follow-up visible to your team.</p>
      </div>
      <div class="row g-4">
        @php
          $features = [
            ['fa-boxes-stacked', 'Inventory management', ['Products, categories and SKU management', 'Multiple warehouses and stock transfers', 'Batch, serial and expiry tracking', 'Barcode and QR code workflows']],
            ['fa-file-invoice-dollar', 'GST billing', ['HSN/SAC compliant invoices', 'Automatic tax calculations', 'Branded PDF invoices', 'GSTR-friendly exports']],
            ['fa-message', 'Communication', ['WhatsApp invoice delivery', 'Payment and low-stock reminders', 'Email templates and SMTP support', 'Order status notifications']],
            ['fa-brain', 'Smart insights', ['Demand forecasting', 'Fast and slow mover analysis', 'Reorder recommendations', 'Sales and margin trends']],
            ['fa-users', 'CRM and support', ['Customer and supplier profiles', 'Lead and follow-up tracking', 'Support ticket management', 'Complete communication history']],
            ['fa-chart-column', 'Reports and control', ['Inventory valuation and ageing', 'Sales and purchase reports', 'Role-based team access', 'CSV and PDF export']],
          ];
        @endphp
        @foreach ($features as [$icon, $title, $items])
          <div class="col-md-6">
            <article class="feature-card feature-highlight">
              <div class="icon-box"><i class="fa-solid {{ $icon }}"></i></div>
              <h2 class="h4">{{ $title }}</h2>
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
        <span class="eyebrow">Controls</span>
        <h2>Built for accuracy, access and follow-through</h2>
        <p>Good software does more than store records. It helps teams follow the right process, catch mistakes early and keep owners informed.</p>
      </div>
      <div class="row g-4">
        <div class="col-md-6 col-lg-3"><div class="mini-card"><i class="fa-solid fa-user-lock"></i><h3>Roles</h3><p>Limit billing, purchase, report and admin access by responsibility.</p></div></div>
        <div class="col-md-6 col-lg-3"><div class="mini-card"><i class="fa-solid fa-clock-rotate-left"></i><h3>History</h3><p>Track edits, payments, stock updates and important account activity.</p></div></div>
        <div class="col-md-6 col-lg-3"><div class="mini-card"><i class="fa-solid fa-bell"></i><h3>Alerts</h3><p>Get reminders for low stock, overdue invoices and pending follow-ups.</p></div></div>
        <div class="col-md-6 col-lg-3"><div class="mini-card"><i class="fa-solid fa-file-export"></i><h3>Exports</h3><p>Download useful CSV and PDF files whenever your accountant needs them.</p></div></div>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="row g-5 align-items-center">
        <div class="col-lg-5">
          <span class="eyebrow">Real use cases</span>
          <h2>Designed for the messy middle of daily operations</h2>
          <p>Inventory work rarely happens in a perfect sequence. A customer asks for stock while purchase goods are still being received. A salesperson needs an invoice while accounts is checking credit. A manager wants reports before the day closes.</p>
          <p>InvFlow keeps those moving parts visible, so each team can do its work without waiting for someone to reconcile a spreadsheet manually.</p>
        </div>
        <div class="col-lg-7">
          <div class="row g-4">
            <div class="col-md-6"><div class="info-card"><h3 class="h5">Low-stock planning</h3><p class="mb-0">Set reorder levels, watch fast-moving items and reduce emergency purchases caused by late stock checks.</p></div></div>
            <div class="col-md-6"><div class="info-card"><h3 class="h5">Credit follow-up</h3><p class="mb-0">Keep customer dues connected to invoices, reminders and communication history for cleaner collections.</p></div></div>
            <div class="col-md-6"><div class="info-card"><h3 class="h5">Purchase clarity</h3><p class="mb-0">Compare suppliers, track received quantity and understand which items are tying up working capital.</p></div></div>
            <div class="col-md-6"><div class="info-card"><h3 class="h5">Team accountability</h3><p class="mb-0">Use activity history and role access so updates are traceable without slowing down normal work.</p></div></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="cta">
        <h2>See how InvFlow fits your business</h2>
        <p>Talk to our team or explore the plans available for your company.</p>
        <a href="{{ route('frontend.pricing') }}" class="btn btn-light">View Pricing</a>
      </div>
    </div>
  </section>

  @include('frontend.include.faqs', [
    'eyebrow' => 'Feature FAQs',
    'title' => 'Questions about InvFlow features',
    'copy' => 'Answers about inventory management, GST billing, CRM, reports and controls inside InvFlow.',
    'faqs' => [
      ['Which inventory features are included?', 'InvFlow includes product records, categories, stock movement, warehouse tracking, batches, low-stock alerts and barcode workflows.'],
      ['Does InvFlow support GST billing?', 'Yes. You can create GST-ready invoices with HSN/SAC details, tax calculations, payment status and PDF sharing.'],
      ['Can I manage multiple warehouses?', 'Yes. Multiple warehouse and branch stock workflows help teams track availability and transfers.'],
      ['Are customer records included?', 'Yes. Customer and supplier records stay connected with invoices, follow-ups and communication history.'],
      ['Can I send invoices on WhatsApp?', 'Yes. InvFlow supports WhatsApp and email sharing workflows for invoices and reminders.'],
      ['Does the software show business reports?', 'Yes. Reports cover sales, purchases, margins, inventory valuation, stock ageing and movement.'],
      ['Can I control user permissions?', 'Yes. Role-based access helps owners manage billing, inventory, purchase, report and admin access.'],
      ['Are low-stock alerts available?', 'Yes. You can use reorder levels and alerts to catch stock issues before sales are affected.'],
      ['Can I export data?', 'Yes. CSV and PDF exports are available for accounting, review and operational reporting.'],
      ['Are these features useful for small businesses?', 'Yes. InvFlow is designed for small and growing teams that need simple inventory, billing and reporting control.'],
    ],
  ])
</main>
@endsection
