@extends('frontend.layouts.app')

@section('title', 'Contact')

@section('content')
<main>
  <header class="page-header">
    <div class="container hero-grid">
      <div class="hero-copy">
        <span class="eyebrow">Contact us</span>
        <h1>Tell us what your business needs.</h1>
        <p class="lead">Ask a question, request a demo or discuss the right plan with our team.</p>
      </div>
      <div class="hero-visual hero-visual-soft" aria-hidden="true">
        <div class="contact-preview">
          <div><i class="fa-solid fa-headset"></i><span>Demo request</span><strong>Same day follow-up</strong></div>
          <div><i class="fa-solid fa-file-import"></i><span>Migration help</span><strong>Products and stock</strong></div>
          <div><i class="fa-solid fa-indian-rupee-sign"></i><span>Plan guidance</span><strong>Clear pricing</strong></div>
        </div>
      </div>
    </div>
  </header>

  <section class="section pt-0">
    <div class="container">
      <div class="row g-4 align-items-start">
        <div class="col-lg-5">
          <div class="info-card contact-panel">
            <h2 class="h4">We usually reply within one business day.</h2>
            <p>Share your business type, number of products, warehouse count and the workflow you want to improve. That helps us suggest the right setup quickly.</p>
            <div class="contact-line"><i class="fa-solid fa-envelope"></i><span>support@invflow.example</span></div>
            <div class="contact-line"><i class="fa-solid fa-phone"></i><span>+91 98765 43210</span></div>
            <div class="contact-line"><i class="fa-solid fa-location-dot"></i><span>Serving businesses across India</span></div>
          </div>
        </div>
        <div class="col-lg-7">
          <div class="form-card">
            <form method="post" action="#">
              @csrf
              <div class="row g-3">
                <div class="col-md-6">
                  <label class="form-label" for="name">Name</label>
                  <input class="form-control" id="name" name="name" type="text" autocomplete="name" required>
                </div>
                <div class="col-md-6">
                  <label class="form-label" for="email">Email</label>
                  <input class="form-control" id="email" name="email" type="email" autocomplete="email" required>
                </div>
                <div class="col-md-6">
                  <label class="form-label" for="company">Company</label>
                  <input class="form-control" id="company" name="company" type="text" autocomplete="organization">
                </div>
                <div class="col-md-6">
                  <label class="form-label" for="interest">I want help with</label>
                  <select class="form-control" id="interest" name="interest">
                    <option>Product demo</option>
                    <option>Pricing</option>
                    <option>Migration</option>
                    <option>Support</option>
                  </select>
                </div>
                <div class="col-12">
                  <label class="form-label" for="message">How can we help?</label>
                  <textarea class="form-control" id="message" name="message" required></textarea>
                </div>
                <div class="col-12">
                  <button class="btn btn-primary w-100" type="submit">Send Message</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  @include('frontend.include.faqs', [
    'eyebrow' => 'Contact FAQs',
    'title' => 'Questions before contacting InvFlow',
    'copy' => 'Answers about demos, pricing help, migration support and product guidance for inventory management software.',
    'faqs' => [
      ['How can I contact InvFlow?', 'Use the contact form with your name, email, company and message so the team can respond with the right guidance.'],
      ['Can I request a product demo?', 'Yes. Select product demo or mention your workflow so the team can show the most relevant features.'],
      ['What details should I share?', 'Share your business type, product count, warehouse count and the workflow you want to improve.'],
      ['Can you help with pricing questions?', 'Yes. The team can explain which plan fits your inventory, billing, CRM and reporting needs.'],
      ['Can I ask about data migration?', 'Yes. You can ask about importing products, customers, suppliers and opening stock from existing records.'],
      ['How quickly do you reply?', 'The contact page notes that replies usually happen within one business day.'],
      ['Can support help with GST setup?', 'Yes. You can ask for guidance on GST settings, invoice format and product tax fields.'],
      ['Can I contact you for Enterprise needs?', 'Yes. Complex branch, API, onboarding or priority support requirements can be discussed with the team.'],
      ['Do I need an account before contacting?', 'No. You can contact the team before creating an account or starting a trial.'],
      ['Can I ask about retail or wholesale workflows?', 'Yes. Include your workflow details so the team can suggest inventory and billing setup options.'],
    ],
  ])
</main>
@endsection
