@extends('frontend.layouts.app')

@section('title', 'Register')

@section('content')
<main class="auth-page">
  <section class="container auth-shell auth-split">
    <div class="auth-story">
      <span class="eyebrow">14-day free trial</span>
      <h1>Start your cloud inventory management workspace today.</h1>
      <p>Create an InvFlow account for GST billing, stock tracking, CRM, purchase control and reports. No credit card required.</p>
      <div class="auth-timeline">
        <div><strong>1</strong><span>Add company and GST details</span></div>
        <div><strong>2</strong><span>Import products and opening stock</span></div>
        <div><strong>3</strong><span>Invite your team and begin billing</span></div>
      </div>
    </div>

    <div class="form-card auth-card">
      <div class="text-center mb-4">
        <span class="eyebrow">Create workspace</span>
        <h2 class="h2">Create your account</h2>
        <p>Set up inventory, GST invoices and business reports in minutes.</p>
      </div>
      @if ($errors->any())
        <div class="alert alert-danger" role="alert">
          <ul class="mb-0 ps-3">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form method="post" action="{{ url('/sign-up') }}">
        @csrf
        <div class="mb-3">
          <label class="form-label" for="name"> Name</label>
          <input class="form-control @error('name') is-invalid @enderror" id="name" name="name" type="text" value="{{ old('name') }}" autocomplete="name" required autofocus>
          @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
          <label class="form-label" for="email">Email</label>
          <input class="form-control @error('email') is-invalid @enderror" id="email" name="email" type="email" value="{{ old('email') }}" autocomplete="username" required>
          @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
          <label class="form-label" for="password">Password</label>
          <input class="form-control @error('password') is-invalid @enderror" id="password" name="password" type="password" minlength="8" autocomplete="new-password" required>
          @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
          <label class="form-label" for="password_confirmation">Confirm Password</label>
          <input class="form-control" id="password_confirmation" name="password_confirmation" type="password" minlength="8" autocomplete="new-password" required>
        </div>
        <div class="form-check mb-4">
          <input class="form-check-input" id="terms" name="terms" type="checkbox" required>
          <label class="form-check-label" for="terms">I agree to the Terms of Service and Privacy Policy.</label>
        </div>
        <button class="btn btn-primary w-100" type="submit">Create Free Account</button>
      </form>
      <div class="auth-note">
        <i class="fa-solid fa-shield-halved"></i>
        <span>Your trial includes inventory, billing, CRM and report access.</span>
      </div>
      <p class="text-center mt-4 mb-0">Already registered? <a href="{{ route('frontend.login') }}">Sign in</a></p>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="section-heading">
        <span class="eyebrow">Trial setup</span>
        <h2>Start with the workflows that matter most</h2>
        <p>Your signup creates a workspace for inventory, GST billing, customer records and reports so your team can begin with real business data.</p>
      </div>
      <div class="row g-4">
        <div class="col-md-4"><div class="feature-card"><div class="icon-box"><i class="fa-solid fa-file-import"></i></div><h3 class="h5">Import products</h3><p class="mb-0">Bring product lists, opening stock, customer records and supplier details into one system.</p></div></div>
        <div class="col-md-4"><div class="feature-card"><div class="icon-box"><i class="fa-solid fa-receipt"></i></div><h3 class="h5">Set GST billing</h3><p class="mb-0">Configure invoice details, tax settings, HSN/SAC fields and branded billing formats.</p></div></div>
        <div class="col-md-4"><div class="feature-card"><div class="icon-box"><i class="fa-solid fa-users-gear"></i></div><h3 class="h5">Invite your team</h3><p class="mb-0">Add billing, inventory, sales and manager users with access that fits their role.</p></div></div>
      </div>
    </div>
  </section>

  <section class="section section-soft">
    <div class="container">
      <div class="row g-5 align-items-center">
        <div class="col-lg-6">
          <span class="eyebrow">Why sign up</span>
          <h2>A practical trial for real inventory management</h2>
          <p>InvFlow lets you test daily workflows instead of only viewing sample screens. Add items, create invoices, track dues and review reports before choosing a paid plan.</p>
          <ul class="check-list split-list">
            <li>No credit card required</li>
            <li>Inventory and billing included</li>
            <li>Useful for retail and wholesale teams</li>
            <li>Upgrade only when your process is ready</li>
          </ul>
        </div>
        <div class="col-lg-6">
          <div class="workflow-panel">
            <div><span>01</span><strong>Create</strong><p>Register your company workspace.</p></div>
            <div><span>02</span><strong>Configure</strong><p>Add products, taxes and users.</p></div>
            <div><span>03</span><strong>Operate</strong><p>Start billing, stock tracking and reports.</p></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="cta cta-split">
        <div>
          <span class="eyebrow">Already joined?</span>
          <h2>Sign in to continue managing stock, invoices and reports.</h2>
          <p>Your workspace stays ready for daily billing, inventory movement and customer follow-up.</p>
        </div>
        <div class="cta-actions">
          <a class="btn btn-light" href="{{ route('frontend.login') }}">Login</a>
        </div>
      </div>
    </div>
  </section>

  @include('frontend.include.faqs', [
    'eyebrow' => 'Signup FAQs',
    'title' => 'Questions about creating an InvFlow account',
    'copy' => 'Everything new users need to know before starting a free inventory management and GST billing trial.',
    'faqs' => [
      ['Do I need a credit card to sign up?', 'No. You can create a trial workspace without adding payment details.'],
      ['What can I test during the trial?', 'You can test inventory tracking, GST billing, customer records, reports and team access workflows.'],
      ['Can I import my existing product list?', 'Yes. You can bring product records, opening stock, customers and suppliers into InvFlow.'],
      ['Is signup suitable for small shops?', 'Yes. The trial is designed for small shops, wholesalers, distributors and service businesses.'],
      ['Can I add multiple users after signup?', 'Yes. You can invite team members and assign roles for billing, inventory, sales or management.'],
      ['Can I create GST invoices in the trial?', 'Yes. GST-ready billing features are available so you can test invoice workflows properly.'],
      ['How long does setup take?', 'Most teams can begin with company details, products and billing settings in a short setup session.'],
      ['Can I upgrade after the trial?', 'Yes. You can choose a plan when your team is ready to continue using InvFlow.'],
      ['Will my trial data remain available?', 'Your workspace data can continue when you move from trial to a paid plan.'],
      ['Can support help with setup?', 'Yes. You can contact the team for help with product imports, tax settings and workflow questions.'],
    ],
  ])
</main>
@endsection
