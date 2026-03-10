@extends('layouts.app')

@section('content')

  <!-- Hero -->
  <section class="home-hero">
    <div class="container">
      <p class="home-hero__eyebrow">// your work, beautifully presented</p>
      <h1 class="home-hero__title">
        Build your<br>
        developer <em>portfolio</em><br>
        in minutes.
      </h1>
      <p class="home-hero__sub">
        Sign up, fill in your details, and get a clean, shareable portfolio page — no design skills needed.
      </p>
      <div class="home-hero__cta">
        <a href="register.html" class="btn btn--primary">Create your portfolio →</a>
        <a href="portfolio.html" class="btn btn--outline">See an example</a>
      </div>
    </div>
  </section>

  <!-- Features -->
  <section id="features" style="padding: 4rem 0; border-top: 1px solid var(--border);">
    <div class="container">
      <p class="section-label">// what you get</p>
      <div class="features-grid">
        <div class="feature-item">
          <div class="feature-item__num">01</div>
          <h3 class="feature-item__title">Auto-generated page</h3>
          <p class="feature-item__desc">Fill in your info once. We build a live, public portfolio URL you can share anywhere.</p>
        </div>
        <div class="feature-item">
          <div class="feature-item__num">02</div>
          <h3 class="feature-item__title">Project showcase</h3>
          <p class="feature-item__desc">Add projects with descriptions, tags, and links. Keep them updated any time.</p>
        </div>
        <div class="feature-item">
          <div class="feature-item__num">03</div>
          <h3 class="feature-item__title">Skills & proficiency</h3>
          <p class="feature-item__desc">Display your tech stack with skill levels. Grouped by category for clarity.</p>
        </div>
        <div class="feature-item">
          <div class="feature-item__num">04</div>
          <h3 class="feature-item__title">Your own URL</h3>
          <p class="feature-item__desc">Share devfolio.io/u/yourname — a permanent link that's always up to date.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- How it works -->
  <section id="how" style="padding: 4rem 0; border-top: 1px solid var(--border);">
    <div class="container">
      <p class="section-label">// how it works</p>
      <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 2rem; max-width: 800px;">
        <div>
          <div style="font-family: var(--font-mono); font-size: 2rem; font-weight: 300; color: var(--border-dark); margin-bottom: 0.75rem;">1</div>
          <h4 style="font-size: 0.9375rem; margin-bottom: 0.5rem;">Create account</h4>
          <p class="text-sm text-muted">Register with your email in under 30 seconds.</p>
        </div>
        <div>
          <div style="font-family: var(--font-mono); font-size: 2rem; font-weight: 300; color: var(--border-dark); margin-bottom: 0.75rem;">2</div>
          <h4 style="font-size: 0.9375rem; margin-bottom: 0.5rem;">Fill in your profile</h4>
          <p class="text-sm text-muted">Add bio, skills, and projects from your dashboard.</p>
        </div>
        <div>
          <div style="font-family: var(--font-mono); font-size: 2rem; font-weight: 300; color: var(--border-dark); margin-bottom: 0.75rem;">3</div>
          <h4 style="font-size: 0.9375rem; margin-bottom: 0.5rem;">Share your link</h4>
          <p class="text-sm text-muted">Your portfolio is live. Share the link on LinkedIn, GitHub, or resumes.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA Banner -->
  <section style="padding: 4rem 0; border-top: 1px solid var(--border); background: var(--text);">
    <div class="container" style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 2rem;">
      <div>
        <h2 style="font-size: 1.5rem; color: #fff; margin-bottom: 0.5rem;">Ready to build yours?</h2>
        <p style="color: rgba(255,255,255,0.5); font-size: 0.9rem;">It's free to start. No credit card needed.</p>
      </div>
      <a href="register.html" class="btn" style="background: #fff; color: var(--text); border-color: #fff; font-size: 0.875rem; padding: 0.7rem 1.5rem;">
        Get started for free →
      </a>
    </div>
  </section>

  
@endsection