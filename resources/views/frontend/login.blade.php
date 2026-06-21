@extends('frontend.layouts.app')

@section('title', 'Login')

@section('content')
<main class="auth-page">
  <section class="container auth-shell auth-split">
    <div class="auth-story">
      <span class="eyebrow">Welcome back</span>
      <h1>Sign in to manage inventory, GST billing and reports.</h1>
      <p>Open your InvFlow workspace to review live stock, create invoices, follow customer payments and keep daily operations moving.</p>
      <div class="auth-benefits">
        <div><i class="fa-solid fa-boxes-stacked"></i><span>Live stock visibility</span></div>
        <div><i class="fa-solid fa-file-invoice"></i><span>GST-ready billing</span></div>
        <div><i class="fa-solid fa-chart-line"></i><span>Sales and margin reports</span></div>
      </div>
    </div>

    <div class="form-card auth-card">
      <div class="text-center mb-4">
        <span class="eyebrow">Secure login</span>
        <h2 class="h2">Sign in to InvFlow</h2>
        <p>Access your business dashboard and continue where your team left off.</p>
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

      <form method="post" action="{{ url('/sign-in') }}">
        @csrf
        <div class="mb-3">
          <label class="form-label" for="email">Email</label>
          <input class="form-control @error('email') is-invalid @enderror" id="email" name="email" type="email" value="{{ old('email') }}" autocomplete="username" required autofocus>
          @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
          <label class="form-label" for="password">Password</label>
          <input class="form-control @error('password') is-invalid @enderror" id="password" name="password" type="password" autocomplete="current-password" required>
          @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-check mb-4">
          <input class="form-check-input" id="remember" name="remember" type="checkbox">
          <label class="form-check-label" for="remember">Remember me</label>
        </div>
        <button class="btn btn-primary w-100" type="submit">Sign In</button>
      </form>
      <p class="text-center mt-4 mb-0">New to InvFlow? <a href="{{ route('frontend.register') }}">Create an account</a></p>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="section-heading">
        <span class="eyebrow">After login</span>
        <h2>Everything opens into one business dashboard</h2>
        <p>InvFlow keeps inventory, GST billing, customer dues and reports ready as soon as your team signs in.</p>
      </div>
      <div class="row g-4">
        <div class="col-md-4"><div class="feature-card"><div class="icon-box"><i class="fa-solid fa-warehouse"></i></div><h3 class="h5">Stock overview</h3><p class="mb-0">Check low stock, warehouse movement, product batches and recent updates from one screen.</p></div></div>
        <div class="col-md-4"><div class="feature-card"><div class="icon-box"><i class="fa-solid fa-file-invoice-dollar"></i></div><h3 class="h5">Billing queue</h3><p class="mb-0">Continue pending estimates, GST invoices, payments and credit follow-ups without searching files.</p></div></div>
        <div class="col-md-4"><div class="feature-card"><div class="icon-box"><i class="fa-solid fa-chart-simple"></i></div><h3 class="h5">Daily reports</h3><p class="mb-0">Review sales, margin, stock ageing and customer dues before making the next decision.</p></div></div>
      </div>
    </div>
  </section>

  <section class="section section-soft">
    <div class="container">
      <div class="row g-5 align-items-center">
        <div class="col-lg-6">
          <span class="eyebrow">Secure access</span>
          <h2>Give every team member the right workspace</h2>
          <p>Owners, billing users, inventory staff and sales teams can use InvFlow with role-based access so sensitive reports and settings stay controlled.</p>
        </div>
        <div class="col-lg-6">
          <div class="impact-grid">
            <div><strong>Roles</strong><span>Control billing, purchase and report permissions</span></div>
            <div><strong>History</strong><span>Track important updates and user actions</span></div>
            <div><strong>Exports</strong><span>Download reports when accounts need them</span></div>
            <div><strong>Alerts</strong><span>Catch low stock and pending dues faster</span></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="cta cta-split">
        <div>
          <span class="eyebrow">Need an account?</span>
          <h2>Create your InvFlow workspace and start with inventory, billing and CRM.</h2>
          <p>Set up your business, import products and invite your team in minutes.</p>
        </div>
        <div class="cta-actions">
          <a class="btn btn-light" href="{{ route('frontend.register') }}">Create Account</a>
        </div>
      </div>
    </div>
  </section>

  @include('frontend.include.faqs', [
    'eyebrow' => 'Login FAQs',
    'title' => 'Questions about signing in to InvFlow',
    'copy' => 'Helpful answers for teams accessing their inventory management, GST billing and reporting workspace.',
    'faqs' => [
      ['How do I sign in to InvFlow?', 'Use your registered work email and password on the login page to access your business workspace.'],
      ['Can multiple team members log in?', 'Yes. You can invite team members and manage their access based on roles and responsibilities.'],
      ['What happens after I log in?', 'You can view inventory, create invoices, check customers, track payments and open business reports.'],
      ['Can I restrict report access?', 'Yes. Role-based access helps owners control who can view reports, billing and admin settings.'],
      ['Is login required for billing?', 'Yes. Signing in keeps invoices, payments and stock updates connected to the correct user activity.'],
      ['Can I access InvFlow from another device?', 'Yes. InvFlow is designed as a cloud workspace, so your team can access it from supported browsers.'],
      ['What if I forget my password?', 'Use your recovery process or contact support so your account access can be restored safely.'],
      ['Does login show live stock?', 'Yes. Once signed in, authorized users can review current stock and recent movement.'],
      ['Can sales staff use the same login page?', 'Yes. Sales, billing and inventory teams use the same login page with their own permissions.'],
      ['Is my business data protected after login?', 'InvFlow uses controlled access, user roles and activity visibility to help keep business data organized and protected.'],
    ],
  ])
</main>
@endsection
