@extends('layouts.app')

@section('content')


  <div class="dashboard">

    <!-- Sidebar -->
    <aside class="sidebar">
      <div class="sidebar__section">
        <span class="sidebar__label">Main</span>
        <a href="dashboard.html" class="sidebar__link">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/></svg>
          Dashboard
        </a>
        <a href="edit-profile.html" class="sidebar__link active">
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
          <h1 class="page-header__title">Edit Profile</h1>
          <p class="page-header__sub">Your profile info appears on your public portfolio.</p>
        </div>
      </div>

      <form id="profile-form">
        <div style="display:grid; grid-template-columns:1fr 2fr; gap:2rem; align-items:start; flex-wrap:wrap;">

          <!-- Avatar column -->
          <div class="card" style="text-align:center;">
            <div style="width:80px; height:80px; border-radius:50%; background:var(--border); margin:0 auto 1rem; overflow:hidden; border:1px solid var(--border);">
              <img id="avatar-preview" src="" onerror="this.style.display='none'" alt="avatar" style="width:100%; height:100%; object-fit:cover; display:none;" />
              <div id="avatar-placeholder" style="width:100%; height:100%; background:linear-gradient(135deg,#D4CFC7,#A8A49C); display:flex; align-items:center; justify-content:center; font-family:var(--font-mono); font-size:2rem; color:#fff;">J</div>
            </div>
            <p class="text-xs text-faint mb-2">JPG or PNG, max 2MB</p>
            <label class="btn btn--outline btn--sm btn--full" style="cursor:pointer;">
              Upload photo
              <input type="file" id="avatar-input" accept="image/*" style="display:none;" />
            </label>
          </div>

          <!-- Info column -->
          <div class="card">
            <div style="display:grid; grid-template-columns:1fr 1fr; gap:1rem;">
              <div class="form-group">
                <label class="form-label" for="prof-firstname">First name</label>
                <input class="form-input" type="text" id="prof-firstname" value="Jane" />
              </div>
              <div class="form-group">
                <label class="form-label" for="prof-lastname">Last name</label>
                <input class="form-input" type="text" id="prof-lastname" value="Smith" />
              </div>
            </div>

            <div class="form-group">
              <label class="form-label" for="prof-title">Professional title</label>
              <input class="form-input" type="text" id="prof-title" value="Full-Stack Developer" placeholder="e.g. Senior Frontend Engineer" />
            </div>

            <div class="form-group">
              <label class="form-label" for="prof-location">Location</label>
              <input class="form-input" type="text" id="prof-location" value="San Francisco, CA" placeholder="City, Country" />
            </div>

            <div class="form-group">
              <label class="form-label" for="prof-email">Contact email</label>
              <input class="form-input" type="email" id="prof-email" value="jane@example.com" />
            </div>

            <div class="form-group">
              <label class="form-label" for="prof-bio">Bio</label>
              <textarea class="form-textarea" id="prof-bio" rows="4" placeholder="Write a short bio about yourself...">I build fast, thoughtful web applications. Currently focused on React, Node.js, and distributed systems. Open to remote opportunities.</textarea>
              <p class="form-hint">Keep it concise — 2-3 sentences works best.</p>
            </div>

            <div class="form-group">
              <label class="form-label" for="prof-experience">Years of experience</label>
              <input class="form-input" type="number" id="prof-experience" value="4" min="0" max="50" style="max-width:100px;" />
            </div>
          </div>

        </div>

        <!-- Social Links -->
        <div class="card mt-3">
          <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:1.25rem;">
            <h3 style="font-size:0.9375rem;">Social Links</h3>
            <button type="button" class="btn btn--outline btn--sm" id="add-social">+ Add link</button>
          </div>

          <div id="social-list">
            <div class="flex gap-1 mb-1">
              <input class="form-input" value="GitHub" style="max-width:140px;" placeholder="Platform" />
              <input class="form-input" value="https://github.com/janesmith" placeholder="URL" style="flex:1;" />
              <button type="button" class="btn btn--ghost btn--sm remove-social" title="Remove">✕</button>
            </div>
            <div class="flex gap-1 mb-1">
              <input class="form-input" value="LinkedIn" style="max-width:140px;" placeholder="Platform" />
              <input class="form-input" value="https://linkedin.com/in/janesmith" placeholder="URL" style="flex:1;" />
              <button type="button" class="btn btn--ghost btn--sm remove-social" title="Remove">✕</button>
            </div>
            <div class="flex gap-1 mb-1">
              <input class="form-input" value="Twitter" style="max-width:140px;" placeholder="Platform" />
              <input class="form-input" value="https://twitter.com/janesmith" placeholder="URL" style="flex:1;" />
              <button type="button" class="btn btn--ghost btn--sm remove-social" title="Remove">✕</button>
            </div>
          </div>
        </div>

        <!-- Resume -->
        <div class="card mt-3">
          <h3 style="font-size:0.9375rem; margin-bottom:1rem;">Resume</h3>
          <div style="display:flex; align-items:center; gap:1rem; flex-wrap:wrap;">
            <div style="flex:1;">
              <p class="text-sm text-muted">Upload a PDF resume to display a download link on your portfolio.</p>
              <p class="text-xs text-faint mt-1">Current: <span class="text-mono">jane_smith_resume.pdf</span></p>
            </div>
            <label class="btn btn--outline btn--sm" style="cursor:pointer;">
              Replace resume
              <input type="file" accept=".pdf" style="display:none;" />
            </label>
          </div>
        </div>

        <!-- Actions -->
        <div style="display:flex; justify-content:flex-end; gap:0.75rem; margin-top:1.5rem;">
          <a href="dashboard.html" class="btn btn--outline">Cancel</a>
          <button type="submit" class="btn btn--primary">Save changes</button>
        </div>

      </form>

    </main>
  </div>
@endsection