@php $page = request()->route()->getName();  @endphp


<!-- Dashboard Header  -->

@if(auth()->check() && $page === 'user.dashboard' )

  <body data-page="dashboard">

  <!-- Top Navbar -->
  <nav class="navbar">
    <div class="navbar__inner">
      <a href="{{ route('main.index') }}" class="navbar__logo">dev<span>folio</span></a>
      <ul class="navbar__links">
        <li><a href="portfolio.html" class="btn btn--outline btn--sm">View portfolio ↗</a></li>
        <li>
          <div style="width:28px; height:28px; border-radius:50%; background:var(--text); display:flex; align-items:center; justify-content:center; color:#fff; font-family:var(--font-mono); font-size:0.7rem; cursor:pointer;">{{ ucfirst(substr($user->username , 0 ,1)) }}</div>
        </li>
      </ul>
    </div>
  </nav>


  <!-- Skills -->

  @elseif(auth()->check() && $page === 'user.skills' )

  <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Manage Skills — DevFolio</title>
  <link rel="stylesheet" href="styles.css" />
</head>
<body data-page="skills">

  <nav class="navbar">
    <div class="navbar__inner">
      <a href="index.html" class="navbar__logo">dev<span>folio</span></a>
      <ul class="navbar__links">
        <li><a href="portfolio.html" class="btn btn--outline btn--sm">View portfolio ↗</a></li>
        <li>
          <div style="width:28px; height:28px; border-radius:50%; background:var(--text); display:flex; align-items:center; justify-content:center; color:#fff; font-family:var(--font-mono); font-size:0.7rem; cursor:pointer;">{{ ucfirst(substr(auth()->user()->username, 0, 1)) }}</div>
        </li>
      </ul>
    </div>
  </nav>



@elseif($page === 'user.register' && request('type') === 'register')
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


@elseif($page === 'user.login' && request('type') === 'login')
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


@elseif(auth()->check() && $page === 'user.edit' )
  
  <body data-page="edit-profile">

  <nav class="navbar">
    <div class="navbar__inner">
      <a href="index.html" class="navbar__logo">dev<span>folio</span></a>
      <ul class="navbar__links">
        <li><a href="portfolio.html" class="btn btn--outline btn--sm">View portfolio ↗</a></li>
        <li>
          <div style="width:28px; height:28px; border-radius:50%; background:var(--text); display:flex; align-items:center; justify-content:center; color:#fff; font-family:var(--font-mono); font-size:0.7rem; cursor:pointer;">{{ ucfirst(substr(auth()->user()->username, 0, 1)) }}</div>
        </li>
      </ul>
    </div>
  </nav>


  <!-- Project page  -->

  @elseif(auth()->check() && $page === 'user.project' )

  <body data-page="projects">

  <nav class="navbar">
    <div class="navbar__inner">
      <a href="index.html" class="navbar__logo">dev<span>folio</span></a>
      <ul class="navbar__links">
        <li><a href="portfolio.html" class="btn btn--outline btn--sm">View portfolio ↗</a></li>
        <li>
          <div style="width:28px; height:28px; border-radius:50%; background:var(--text); display:flex; align-items:center; justify-content:center; color:#fff; font-family:var(--font-mono); font-size:0.7rem; cursor:pointer;">{{ ucfirst(substr(auth()->user()->username, 0, 1)) }}</div>
        </li>
      </ul>
    </div>
  </nav>


  <!-- Portfolio page  -->

@elseif($page === 'user.protfolio' )



  <body data-page="portfolio">

  <!-- Minimal portfolio navbar -->
  <nav class="navbar">
    <div class="navbar__inner">
      <span class="navbar__logo">dev<span>folio</span></span>
      <ul class="navbar__links">
        <li><a href="#projects">Projects</a></li>
        <li><a href="#skills">Skills</a></li>
        <li><a href="#contact">Contact</a></li>
        <li><a href="register.html" class="btn btn--outline btn--sm">Build yours</a></li>
      </ul>
    </div>
  </nav>



@else($page === 'main.index' )

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
  @endif



<!-- Sidebar -->

@if(auth()->check() && in_array($page, ['user.dashboard', 'user.edit', 'user.skills', 'user.project']))

  <div class="dashboard">

    <!-- Sidebar -->
    <aside class="sidebar">
      <div class="sidebar__section">
        <span class="sidebar__label">Main</span>
        <a href="{{ route('user.dashboard') }}" class="sidebar__link">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/></svg>
          Dashboard
        </a>
        <a href="{{ route('user.edit') }}" class="sidebar__link">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
          Edit Profile
        </a>
        <a href="{{ route('user.project') }}" class="sidebar__link">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>
          Projects
        </a>
        <a href="{{ route('user.skills') }}" class="sidebar__link">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
          Skills
        </a>
      </div>

      <div class="sidebar__section" style="margin-top:1rem;">
        <span class="sidebar__label">Account</span>
        <a href="#" class="sidebar__link">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"/><path d="M19.07 4.93a10 10 0 0 1 0 14.14"/><path d="M4.93 4.93a10 10 0 0 0 0 14.14"/></svg>
          Settings
        </a>
        <a href="login.html" class="sidebar__link">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
          Log out
        </a>
      </div>
    </aside>

@endif