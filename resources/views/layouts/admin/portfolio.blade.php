
@extends('layouts.app')

@section('content')

  <!-- Hero -->
  <section class="portfolio-hero" id="about">
    <div class="container--narrow">
      <div style="display:flex; align-items:flex-start; gap:2rem; flex-wrap:wrap;">
        <!-- Avatar -->
        <div style="width:72px; height:72px; border-radius:50%; background:var(--border); overflow:hidden; flex-shrink:0; border:1px solid var(--border);">
          <div style="width:100%; height:100%; background: linear-gradient(135deg, #D4CFC7, #A8A49C); display:flex; align-items:center; justify-content:center; font-family:var(--font-mono); font-size:1.5rem; color:#fff;">{{ ucFirst(substr($user->name, 0 ,1)) }}</div>
        </div>
        <div style="flex:1;">
          <p class="section-label" style="margin-bottom:0.5rem;">// {{ $user->title }}</p>
          <h1 style="font-size: clamp(1.8rem, 4vw, 2.8rem); margin-bottom:1rem; font-weight:400;">{{ $user->name }}</h1>
          <p style="font-size:1rem; color:var(--text-2); line-height:1.75; max-width:520px; margin-bottom:1.5rem;">
            {{ $user->bio }}
          </p>
          <div style="display:flex; gap:0.75rem; flex-wrap:wrap; align-items:center;">
            <a href="mailto:{{ $user->email }}" class="btn btn--primary">Get in touch</a>
            @if($user->social_links)
            @foreach($user->social_links as $link => $value)
            <a href="{{ $value['url'] }}" target="_blank" class="btn btn--outline">{{ $value['platform'] }} ↗</a>
            @endforeach
            @endif
            
            <a href="{{ $user->upload_cv }}" download class="btn btn--ghost" style="font-family:var(--font-mono); font-size:0.75rem;">Resume ↓</a>
          </div>
        </div>
      </div>

      <!-- Quick stats -->
      <div style="display:flex; gap:2rem; margin-top:3rem; flex-wrap:wrap; padding-top:2rem; border-top:1px solid var(--border);">
        <div>
          <div style="font-family:var(--font-mono); font-size:1.5rem; font-weight:300;">{{ $user->yoe }}+</div>
          <div class="text-xs text-faint text-mono" style="text-transform:uppercase; letter-spacing:0.06em; margin-top:0.2rem;">Years exp.</div>
        </div>
        <div>
          <div style="font-family:var(--font-mono); font-size:1.5rem; font-weight:300;">{{ $user->projects()->count() }}</div>
          <div class="text-xs text-faint text-mono" style="text-transform:uppercase; letter-spacing:0.06em; margin-top:0.2rem;">Projects</div>
        </div>
        <div>
          <div style="font-family:var(--font-mono); font-size:1.5rem; font-weight:300;">{{ $user->skills()->count() }}</div>
          <div class="text-xs text-faint text-mono" style="text-transform:uppercase; letter-spacing:0.06em; margin-top:0.2rem;">Skills</div>
        </div>
        <div>
          <div style="font-family:var(--font-mono); font-size:1.5rem; font-weight:300;">{{ $user->location }}</div>
          <div class="text-xs text-faint text-mono" style="text-transform:uppercase; letter-spacing:0.06em; margin-top:0.2rem;">Location</div>
        </div>
      </div>
    </div>
  </section>

  <!-- Projects -->
  <section class="portfolio-section" id="projects">
    <div class="container--narrow">
      <p class="section-label">// featured projects</p>
      <div class="project-grid">
        @foreach($projects as $project)
        <div class="project-card">
          <h3 class="project-card__title">{{ $project->title }}</h3>
          <p class="project-card__desc">{{ $project->description }}</p>
          <div style="display:flex; gap:0.4rem; flex-wrap:wrap; margin-bottom:1rem;">
            @if($project->tags)
            @foreach(explode(',' , $project->tags) as $tag)
            <span class="tag">{{ $tag }}</span>
            @endforeach
            @endif
          </div>
          <div class="project-card__links">
            <a href="{{ $project->live_link }}" class="project-card__link">Live demo ↗</a>
            <a href="{{ $project->github_link }}" class="project-card__link">GitHub ↗</a>
          </div>
        </div>
        @endforeach

        
      </div>
    </div>
  </section>

  <!-- Skills -->
  <section class="portfolio-section" id="skills">
    <div class="container--narrow">
      <p class="section-label">// skills & technologies</p>
      <div style="display:grid; grid-template-columns:1fr 1fr; gap:3rem; flex-wrap:wrap;">

        <!-- Frontend -->
        
        
        <div>
          <h4 style="font-size:0.75rem; text-transform:uppercase; letter-spacing:0.08em; color:var(--text-3); font-family:var(--font-mono); margin-bottom:1rem;">Frontend</h4>
          @foreach($skills->where('category' , 'Frontend') as $skill)
          <div class="skill-item">
            <span class="skill-item__name">{{ $skill->name }}</span>
            <div class="skill-item__bar"><div class="skill-item__fill" data-width="{{ $skill->level }}%" style="width:0%"></div></div>
            <span class="skill-item__pct">{{ $skill->level }}%</span>
          </div>
          @endforeach
          
        </div>

        <!-- Backend -->
        
        <div>
          <h4 style="font-size:0.75rem; text-transform:uppercase; letter-spacing:0.08em; color:var(--text-3); font-family:var(--font-mono); margin-bottom:1rem;">Backend & Tools</h4>
          @foreach($skills->where('category' , '!=' , 'Frontend') as $skill)
          <div class="skill-item">
            <span class="skill-item__name">{{ $skill->name }}</span>
            <div class="skill-item__bar"><div class="skill-item__fill" data-width="{{ $skill->level }}%" style="width:0%"></div></div>
            <span class="skill-item__pct">{{ $skill->level }}%</span>
          </div>
          @endforeach
        </div>
        
        
      </div>
    </div>
  </section>

  <!-- Contact -->
  <section class="portfolio-section" id="contact">
    <div class="container--narrow">
      <p class="section-label">// get in touch</p>
      <div style="max-width:440px;">
        <h2 style="font-size:1.5rem; font-weight:400; margin-bottom:0.75rem;">Open to opportunities</h2>
        <p class="text-muted" style="margin-bottom:1.5rem; line-height:1.7;">
          {{ $user->bio }}
        </p>
        <div style="display:flex; gap:0.75rem; flex-wrap:wrap;">
          <a href="mailto:{{ $user->email }}" class="btn btn--primary">Send an email</a>
          <a href="https://linkedin.com" target="_blank" class="btn btn--outline">Connect on LinkedIn</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer style="border-top: 1px solid var(--border); padding: 1.5rem 0;">
    <div class="container--narrow" style="display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:1rem;">
      <span class="text-mono text-faint" style="font-size:0.75rem;">{{ $user->name }} — made with <a href="{{ route('main.index') }}" style="color:var(--text-3); text-decoration:underline;">devfolio</a></span>
      <a href="{{ route('main.index') }}" class="btn btn--outline btn--sm">Build your portfolio →</a>
    </div>
  </footer>

  <script src="main.js"></script>
</body>
</html>
@endsection