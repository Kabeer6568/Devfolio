@extends('layouts.app')

@section('content')

    <main class="main-content">

      <div class="page-header">
        <div>
          <h1 class="page-header__title">Skills</h1>
          <p class="page-header__sub">Add technologies and proficiency levels to your portfolio.</p>
        </div>
        <button class="btn btn--primary" id="add-skill-btn">+ Add skill</button>
      </div>

      <!-- Skills list -->
      <div class="card">
        <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:1.25rem; flex-wrap:wrap; gap:0.5rem;">
          <h3 style="font-size:0.9375rem;">All Skills</h3>
          <div style="display:flex; gap:0.5rem;">
            <button class="btn btn--ghost btn--sm" onclick="filterSkills('all')" id="filter-all" style="color:var(--text);">All</button>
            <button class="btn btn--ghost btn--sm" onclick="filterSkills('Frontend')">Frontend</button>
            <button class="btn btn--ghost btn--sm" onclick="filterSkills('Backend')">Backend</button>
            <button class="btn btn--ghost btn--sm" onclick="filterSkills('DevOps')">DevOps</button>
          </div>
        </div>

        <div id="skills-list">
          <div class="skill-item" data-category="Frontend">
            <span class="skill-item__name">React</span>
            <div class="skill-item__bar"><div class="skill-item__fill" data-width="90%" style="width:0%"></div></div>
            <span class="skill-item__pct">90%</span>
            <span class="tag">Frontend</span>
            <button class="btn btn--ghost btn--sm delete-skill" title="Remove">✕</button>
          </div>
          <div class="skill-item" data-category="Frontend">
            <span class="skill-item__name">TypeScript</span>
            <div class="skill-item__bar"><div class="skill-item__fill" data-width="85%" style="width:0%"></div></div>
            <span class="skill-item__pct">85%</span>
            <span class="tag">Frontend</span>
            <button class="btn btn--ghost btn--sm delete-skill" title="Remove">✕</button>
          </div>
          <div class="skill-item" data-category="Frontend">
            <span class="skill-item__name">CSS / Tailwind</span>
            <div class="skill-item__bar"><div class="skill-item__fill" data-width="80%" style="width:0%"></div></div>
            <span class="skill-item__pct">80%</span>
            <span class="tag">Frontend</span>
            <button class="btn btn--ghost btn--sm delete-skill" title="Remove">✕</button>
          </div>
          <div class="skill-item" data-category="Backend">
            <span class="skill-item__name">Node.js</span>
            <div class="skill-item__bar"><div class="skill-item__fill" data-width="88%" style="width:0%"></div></div>
            <span class="skill-item__pct">88%</span>
            <span class="tag">Backend</span>
            <button class="btn btn--ghost btn--sm delete-skill" title="Remove">✕</button>
          </div>
          <div class="skill-item" data-category="Backend">
            <span class="skill-item__name">PostgreSQL</span>
            <div class="skill-item__bar"><div class="skill-item__fill" data-width="70%" style="width:0%"></div></div>
            <span class="skill-item__pct">70%</span>
            <span class="tag">Backend</span>
            <button class="btn btn--ghost btn--sm delete-skill" title="Remove">✕</button>
          </div>
          <div class="skill-item" data-category="Backend">
            <span class="skill-item__name">Python</span>
            <div class="skill-item__bar"><div class="skill-item__fill" data-width="60%" style="width:0%"></div></div>
            <span class="skill-item__pct">60%</span>
            <span class="tag">Backend</span>
            <button class="btn btn--ghost btn--sm delete-skill" title="Remove">✕</button>
          </div>
          <div class="skill-item" data-category="DevOps">
            <span class="skill-item__name">Docker</span>
            <div class="skill-item__bar"><div class="skill-item__fill" data-width="65%" style="width:0%"></div></div>
            <span class="skill-item__pct">65%</span>
            <span class="tag">DevOps</span>
            <button class="btn btn--ghost btn--sm delete-skill" title="Remove">✕</button>
          </div>
          <div class="skill-item" data-category="DevOps">
            <span class="skill-item__name">GitHub Actions</span>
            <div class="skill-item__bar"><div class="skill-item__fill" data-width="72%" style="width:0%"></div></div>
            <span class="skill-item__pct">72%</span>
            <span class="tag">DevOps</span>
            <button class="btn btn--ghost btn--sm delete-skill" title="Remove">✕</button>
          </div>
        </div>

      </div>

    </main>
  </div>

  <!-- Add Skill Modal -->
  <div class="modal-overlay" id="skill-modal">
    <div class="modal">
      <div class="modal__header">
        <h2 class="modal__title">Add skill</h2>
        <button class="btn btn--ghost btn--sm" data-close-modal="skill-modal">✕</button>
      </div>

      <form id="skill-form" action="{{ route('user.skillsAdded') }}" method="POST">
        @csrf
        <div class="form-group">
          <label class="form-label" for="skill-name" >Skill name *</label>
          <input class="form-input" type="text" name="name" id="skill-name" placeholder="e.g. React, Python, Docker" />
        </div>

        <div class="form-group">
          <label class="form-label" for="skill-category">Category</label>
          <!-- <select class="form-select" id="skill-category">
            <option value="Frontend">Frontend</option>
            <option value="Backend">Backend</option>
            <option value="DevOps">DevOps</option>
            <option value="Design">Design</option>
            <option value="Other">Other</option>
          </select> -->
          <input class="form-select" name="category" id="skill-category" list="category-options" placeholder="e.g. Frontend" />
            <datalist id="category-options">
                <option value="Frontend">
                <option value="Backend">
                <option value="DevOps">
                <option value="Design">
                <option value="Database">
            </datalist>
        </div>

        <div class="form-group">
          <label class="form-label" style="display:flex; justify-content:space-between;">
            <span>Proficiency level</span>
            <span id="skill-level-val" class="text-mono">50%</span>
          </label>
          <input
            type="range"
            id="skill-level"
            min="10" max="100" value="50" name="level" step="5"
            style="width:100%; accent-color:var(--text); cursor:pointer;"
          />
          <div style="display:flex; justify-content:space-between; margin-top:0.25rem;">
            <span class="text-xs text-faint">Beginner</span>
            <span class="text-xs text-faint">Expert</span>
          </div>
        </div>

        <div style="display:flex; justify-content:flex-end; gap:0.75rem; margin-top:0.5rem;">
          <button type="button" class="btn btn--outline" data-close-modal="skill-modal">Cancel</button>
          <button type="submit" class="btn btn--primary">Add skill</button>
        </div>
      </form>
    </div>
  </div>

  
  <script>
    // Filter function (inline since it's page-specific UI)
    function filterSkills(category) {
      const items = document.querySelectorAll('.skill-item[data-category]');
      items.forEach(item => {
        item.style.display = (category === 'all' || item.dataset.category === category) ? 'flex' : 'none';
      });
    }
  </script>



@endsection