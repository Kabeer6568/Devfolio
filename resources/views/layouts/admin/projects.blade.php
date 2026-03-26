

@extends('layouts.app')

@section('content')

    <main class="main-content">

      <div class="page-header">
        <div>
          <h1 class="page-header__title">Projects</h1>
          <p class="page-header__sub">Manage the projects displayed on your public portfolio.</p>
        </div>
        <button class="btn btn--primary" id="add-project-btn">+ Add project</button>
      </div>

      <div class="card">
        <div class="table-wrap">
          <table>
            <thead>
              <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Tags</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody id="projects-tbody">
              @foreach($userProjects as $userProject)
              <tr>
                <td class="text-mono">{{ $userProject->title }}</td>
                <td class="text-muted text-sm">{{ $userProject->description }}</td>

                
                <td>
                  @if($userProject->tags)
                @foreach(explode(',' , $userProject->tags) as $tag)
                <span class="tag">{{ $tag }}</span> 
              @endforeach
                @endif
              </td>
                
                <td>
                  <div class="flex gap-1">
                    <button class="btn btn--outline btn--sm">edit</button>
                    <button class="btn btn--danger btn--sm delete-project">delete</button>
                  </div>
                </td>
              </tr>
              @endforeach
              <tr>
                <td class="text-mono">Pricewatch</td>
                <td class="text-muted text-sm">E-commerce price tracker</td>
                <td><span class="tag">Python</span> <span class="tag">Playwright</span> <span class="tag">Redis</span></td>
                <td>
                  <div class="flex gap-1">
                    <button class="btn btn--outline btn--sm">edit</button>
                    <button class="btn btn--danger btn--sm delete-project">delete</button>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="text-mono">Logcraft</td>
                <td class="text-muted text-sm">Node.js logging library</td>
                <td><span class="tag">TypeScript</span> <span class="tag">npm</span></td>
                <td>
                  <div class="flex gap-1">
                    <button class="btn btn--outline btn--sm">edit</button>
                    <button class="btn btn--danger btn--sm delete-project">delete</button>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="text-mono">DevDash</td>
                <td class="text-muted text-sm">Developer productivity dashboard</td>
                <td><span class="tag">Next.js</span> <span class="tag">OAuth</span></td>
                <td>
                  <div class="flex gap-1">
                    <button class="btn btn--outline btn--sm">edit</button>
                    <button class="btn btn--danger btn--sm delete-project">delete</button>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

    </main>
  </div>

  <!-- Add Project Modal -->
  <div class="modal-overlay" id="project-modal">
    <div class="modal">
      <div class="modal__header">
        <h2 class="modal__title">Add project</h2>
        <button class="btn btn--ghost btn--sm" data-close-modal="project-modal">✕</button>
      </div>

      <form id="project-form" action="{{ route('user.project') }}" method="POST">
        @csrf
        <div class="form-group">
          <label class="form-label" for="proj-title">Project name *</label>
          <input class="form-input" name="title" type="text" id="proj-title" placeholder="My awesome project" />
        </div>

        <div class="form-group">
          <label class="form-label" for="proj-desc">Description</label>
          <textarea class="form-textarea" name="description" id="proj-desc" rows="3" placeholder="What does this project do?"></textarea>
        </div>

        <div style="display:grid; grid-template-columns:1fr 1fr; gap:1rem;">
          <div class="form-group">
            <label class="form-label" for="proj-live">Live URL</label>
            <input class="form-input" name="live_link" type="url" id="proj-live" placeholder="https://..." />
          </div>
          <div class="form-group">
            <label class="form-label" for="proj-github">GitHub URL</label>
            <input class="form-input" name="github_link" type="url" id="proj-github" placeholder="https://github.com/..." />
          </div>
        </div>

        <div class="form-group">
          <label class="form-label" for="proj-tags">Tags</label>
          <input class="form-input" type="text"  name="tags" id="proj-tags" placeholder="React, TypeScript, Node.js" />
          <p class="form-hint">Comma-separated list of technologies used.</p>
        </div>

        <div class="form-group">
          <label class="form-label" for="proj-status">Status</label>
          <select class="form-select" name="status" id="proj-status">
            <option value="published">Published</option>
            <option value="draft">Draft</option>
          </select>
        </div>

        <div style="display:flex; justify-content:flex-end; gap:0.75rem; margin-top:0.5rem;">
          <button type="button" class="btn btn--outline" data-close-modal="project-modal">Cancel</button>
          <button type="submit" class="btn btn--primary">Add project</button>
        </div>
      </form>
    </div>
  </div>

 @endsection