@extends('layouts.app')

@section('content')



    </aside>

    <!-- Main Content -->
    <main class="main-content">

      <!-- <div class="page-header">
        <div>
          <h1 class="page-header__title">Edit Profile</h1>
          <p class="page-header__sub">Your profile info appears on your public portfolio.</p>
        </div>
      </div> -->

      <form id="profile-form" action="{{ route('user.editProfile') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div style="display:grid; grid-template-columns:1fr 2fr; gap:2rem; align-items:start; flex-wrap:wrap;">

          <!-- Avatar column -->
          <div class="card" style="text-align:center;">
            
            <div style="width:80px; height:80px; border-radius:50%; background:var(--border); margin:0 auto 1rem; overflow:hidden; border:1px solid var(--border);">
              @if($user->avatar)
              <img id="avatar-preview" src="{{ asset('storage/' . $user->avatar) }}" onerror="this.style.display='none'" alt="avatar" style="width:100%; height:100%; object-fit:cover; " />
              @else
              <div id="avatar-placeholder" style="width:100%; height:100%; background:linear-gradient(135deg,#D4CFC7,#A8A49C); display:flex; align-items:center; justify-content:center; font-family:var(--font-mono); font-size:2rem; color:#fff;">
                {{ ucFirst(substr($user->name , 0 , 1)) }}
              </div>
              @endif
            </div>
            <p class="text-xs text-faint mb-2">JPG or PNG, max 2MB</p>
            <label class="btn btn--outline btn--sm btn--full" style="cursor:pointer;">
              Upload photo
              <input type="file" name="avatar" id="avatar-input" accept="image/*" style="display:none;" />
            </label>
          </div>

          <!-- Info column -->
          <div class="card">
            <div style="display:grid; grid-template-columns:1fr">
              <div class="form-group">
                <label class="form-label" for="prof-firstname">Full Name</label>
                <input class="form-input" type="text" id="prof-firstname" name="name" value="{{ old('name' , $user->name) }}" />
              </div>
              
            </div>

            <div class="form-group">
              <label class="form-label" for="prof-title">Professional title</label>
              <input class="form-input" type="text" id="prof-title" name="title" value="{{ old('title' , $user->title) }}" placeholder="e.g. Senior Frontend Engineer" />
            </div>

            <div class="form-group">
              <label class="form-label" for="prof-location">Location</label>
              <input class="form-input" type="text" id="prof-location" name="location" value="{{ old('location' , $user->location) }}" placeholder="City, Country" />
            </div>

            <div class="form-group">
              <label class="form-label" for="prof-email">Contact email</label>
              <input class="form-input" type="email" id="prof-email" name="email" value="{{ old('email' , $user->email) }}" />
            </div>

            <div class="form-group">
              <label class="form-label" for="prof-bio">Bio</label>
              <textarea class="form-textarea" id="prof-bio" rows="4" name="bio" placeholder="Write a short bio about yourself...">{{ $user->bio }}</textarea>
              <p class="form-hint">Keep it concise — 2-3 sentences works best.</p>
            </div>

            <div class="form-group">
              <label class="form-label" for="prof-experience">Years of experience</label>
              <input class="form-input" type="number" name="yoe" value="{{ old('yoe' , $user->yoe) }}" id="prof-experience" min="0" max="50" style="max-width:100px;" />
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
            @if($user->social_links)
              @foreach($user->social_links as $index => $link)
            <div class="flex gap-1 mb-1">
              <input class="form-input" name="social_links[{{ $index }}][platform]" value="{{ $link['platform'] ?? '' }}"  style="max-width:140px;" placeholder="Platform" />
              <input class="form-input" name="social_links[{{ $index }}][url]" value="{{ $link['url'] ?? '' }}" placeholder="URL" style="flex:1;" />
              <button type="button" class="btn btn--ghost btn--sm remove-social" title="Remove">✕</button>
            </div>
              @endforeach
            @endif
            
          </div>
        </div>

        <!-- Resume -->
        <div class="card mt-3">
          <h3 style="font-size:0.9375rem; margin-bottom:1rem;">Resume</h3>
          <div style="display:flex; align-items:center; gap:1rem; flex-wrap:wrap;">
            <div style="flex:1;">
              <p class="text-sm text-muted">Upload a PDF resume to display a download link on your portfolio.</p>
              <p class="text-xs text-faint mt-1">Example: <span class="text-mono">jane_smith_resume.pdf</span></p>
            </div>
            <label class="btn btn--outline btn--sm" style="cursor:pointer;">
              {{ $user->upload_cv ? 'Replace resume' : 'Upload resume' }}
              <input type="file" name="upload_cv" accept=".pdf" style="display:none;" />
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