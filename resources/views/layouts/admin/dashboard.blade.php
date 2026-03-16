@extends('layouts.app')

@section('content')


  <div class="dashboard">

    <!-- Sidebar -->
    <aside class="sidebar">
      <div class="sidebar__section">
        <span class="sidebar__label">Main</span>
        <a href="dashboard.html" class="sidebar__link active">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/></svg>
          Dashboard
        </a>
        <a href="edit-profile.html" class="sidebar__link">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
          Edit Profile
        </a>
        <a href="projects.html" class="sidebar__link">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>
          Projects
        </a>
        <a href="skills.html" class="sidebar__link">
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

    <!-- Main Content -->
    <main class="main-content">

      <div class="page-header">
        <div>
          <h1 class="page-header__title">Dashboard</h1>
          <p class="page-header__sub">Welcome back, {{ $user->name }}. Here's your portfolio overview.</p>
        </div>
        <a href="portfolio.html" class="btn btn--outline btn--sm" target="_blank">Preview portfolio ↗</a>
      </div>

      <!-- Stats -->
      <div class="stats-row">
        <div class="stat-card">
          <div class="stat-card__num" data-count="12">0</div>
          <div class="stat-card__label">Projects</div>
        </div>
        <div class="stat-card">
          <div class="stat-card__num" data-count="8">0</div>
          <div class="stat-card__label">Skills</div>
        </div>
        <div class="stat-card">
          <div class="stat-card__num" data-count="340">0</div>
          <div class="stat-card__label">Profile views</div>
        </div>
        <div class="stat-card">
          <div class="stat-card__num" data-count="4">0</div>
          <div class="stat-card__label">Yrs experience</div>
        </div>
      </div>

      <!-- Portfolio link -->
      <div class="card mb-3">
        <div style="display:flex; align-items:center; justify-content:space-between; gap:1rem; flex-wrap:wrap;">
          <div>
            <p class="text-xs text-faint text-mono" style="text-transform:uppercase; letter-spacing:0.06em; margin-bottom:0.35rem;">Your portfolio URL</p>
            <p class="text-mono" style="font-size:0.9rem;">devfolio.io/u/<strong>{{ $user->username }}</strong></p>
          </div>
          <div style="display:flex; gap:0.5rem;">
            <button class="btn btn--outline btn--sm" id="copy-link" data-url="https://devfolio.io/u/janesmith">Copy link</button>
            <a href="portfolio.html" class="btn btn--primary btn--sm" target="_blank">Open ↗</a>
          </div>
        </div>
      </div>

      <!-- Quick actions -->
      <div style="display:grid; grid-template-columns:1fr 1fr; gap:1rem; margin-bottom:2rem;">
        <a href="{{ route('user.edit') }}" class="card card--hover" style="text-decoration:none; display:block;">
          <p class="text-xs text-faint text-mono" style="text-transform:uppercase; letter-spacing:0.06em; margin-bottom:0.5rem;">Quick action</p>
          <h4 style="font-size:0.9375rem; margin-bottom:0.3rem;">Edit profile →</h4>
          <p class="text-sm text-muted">Update your bio, avatar, and social links.</p>
        </a>
        <a href="projects.html" class="card card--hover" style="text-decoration:none; display:block;">
          <p class="text-xs text-faint text-mono" style="text-transform:uppercase; letter-spacing:0.06em; margin-bottom:0.5rem;">Quick action</p>
          <h4 style="font-size:0.9375rem; margin-bottom:0.3rem;">Add a project →</h4>
          <p class="text-sm text-muted">Showcase new work on your portfolio.</p>
        </a>
      </div>

      <!-- Recent projects -->
      <div class="card">
        <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:1.25rem;">
          <h3 style="font-size:0.9375rem;">Recent Projects</h3>
          <a href="projects.html" class="text-xs text-faint" style="font-family:var(--font-mono); text-decoration:underline; text-underline-offset:3px;">View all</a>
        </div>
        <div class="table-wrap">
          <table>
            <thead>
              <tr>
                <th>Name</th>
                <th>Tags</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="text-mono">TaskFlow</td>
                <td><span class="tag">React</span> <span class="tag">Node.js</span></td>
                <td><span class="tag tag--accent">published</span></td>
              </tr>
              <tr>
                <td class="text-mono">Pricewatch</td>
                <td><span class="tag">Python</span> <span class="tag">Redis</span></td>
                <td><span class="tag tag--accent">published</span></td>
              </tr>
              <tr>
                <td class="text-mono">Logcraft</td>
                <td><span class="tag">TypeScript</span></td>
                <td><span class="tag">draft</span></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

    </main>
  </div>

  
@endsection