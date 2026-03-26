@extends('layouts.app')

@section('content')



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
          <div class="stat-card__num" data-count="{{ $user->projects()->count() }}">0</div>
          <div class="stat-card__label">Projects</div>
        </div>
        <div class="stat-card">
          <div class="stat-card__num" data-count="{{ $user->skills()->count() }}">0</div>
          <div class="stat-card__label">Skills</div>
        </div>
        <div class="stat-card">
          <div class="stat-card__num" data-count="340">0</div>
          <div class="stat-card__label">Profile views</div>
        </div>
        <div class="stat-card">
          <div class="stat-card__num" data-count="{{ $user->yoe }}">0</div>
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
        <a href="{{ route('user.project') }}" class="card card--hover" style="text-decoration:none; display:block;">
          <p class="text-xs text-faint text-mono" style="text-transform:uppercase; letter-spacing:0.06em; margin-bottom:0.5rem;">Quick action</p>
          <h4 style="font-size:0.9375rem; margin-bottom:0.3rem;">Add a project →</h4>
          <p class="text-sm text-muted">Showcase new work on your portfolio.</p>
        </a>
      </div>

      <!-- Recent projects -->
      <div class="card">
        <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:1.25rem;">
          <h3 style="font-size:0.9375rem;">Recent Projects</h3>
          <a href="{{ route('user.project') }}" class="text-xs text-faint" style="font-family:var(--font-mono); text-decoration:underline; text-underline-offset:3px;">View all</a>
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
              @foreach($projects as $project)
              <tr>
                <td class="text-mono">{{ $project->title }}</td>
                <td>
                @if($project->tags)
                @foreach(explode(',' , $project->tags) as $tag)
                  <span class="tag">{{ $tag }}</span>
                  @endforeach
                @endif
                </td>
                @if($project->status == 'published')
                <td><span class="tag tag--accent">published</span></td>
                @else
                <td><span class="tag">draft</span></td>
                @endif
              </tr>
              @endforeach
              
            </tbody>
          </table>
        </div>
      </div>

    </main>
  </div>

  
@endsection