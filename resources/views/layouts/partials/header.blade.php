<!-- Navbar -->
 <body data-page="home">
  <nav class="navbar">
    <div class="navbar__inner">
      <a href="{{ route('main.index') }}" class="navbar__logo">dev<span>folio</span></a>
      <ul class="navbar__links">
        <li class="nav-hide"><a href="#features">Features</a></li>
        <li class="nav-hide"><a href="#how">How it works</a></li>
        <li><a href="{{ route('user.create' , ['type' => 'login']) }}">Log in</a></li>
        <li><a href="{{ route('user.create' , ['type' => 'register']) }}" class="btn btn--primary">Get started</a></li>
      </ul>
    </div>
  </nav>


<!-- Register Page Header -->

  <body data-page="register">

  <div class="auth-wrapper">

    <nav class="navbar">
      <div class="navbar__inner">
        <a href="{{ route('main.index') }}" class="navbar__logo">dev<span>folio</span></a>
        <ul class="navbar__links">
          <li><a href="{{ route('user.create' , ['type' => 'login']) }}">Already have an account? <strong>Log in</strong></a></li>
        </ul>
      </div>
    </nav>

<!-- Login Page Header -->


  <body data-page="login">

  <div class="auth-wrapper">

    <!-- Minimal top bar -->
    <nav class="navbar">
      <div class="navbar__inner">
        <a href="{{ route('main.index') }}" class="navbar__logo">dev<span>folio</span></a>
        <ul class="navbar__links">
          <li><a href="{{ route('user.create' , ['type' => 'register']) }}">Don't have an account? <strong>Sign up</strong></a></li>
        </ul>
      </div>
    </nav>


<!-- Dashboard Header  -->

  <body data-page="dashboard">

  <!-- Top Navbar -->
  <nav class="navbar">
    <div class="navbar__inner">
      <a href="{{ route('main.index') }}" class="navbar__logo">dev<span>folio</span></a>
      <ul class="navbar__links">
        <li><a href="portfolio.html" class="btn btn--outline btn--sm">View portfolio ↗</a></li>
        <li>
          <div style="width:28px; height:28px; border-radius:50%; background:var(--text); display:flex; align-items:center; justify-content:center; color:#fff; font-family:var(--font-mono); font-size:0.7rem; cursor:pointer;">J</div>
        </li>
      </ul>
    </div>
  </nav>