@extends('layouts.app')

@section('content')



    <div class="auth-body">
      <div class="auth-box">

        <div class="auth-box__header">
          <h1 class="auth-box__title">Welcome back</h1>
          <p class="auth-box__sub">
            New here? <a href="register.html">Create an account</a>
          </p>
        </div>

        <div class="card">
          <form id="login-form" action="{{ route('user.login') }}"  method="POST">
            @csrf
            <div class="form-group">
              <label class="form-label" for="login-email">Email Or Name</label>
              <input
                class="form-input"
                type="text"
                name="login" 
                id="login-email"
                placeholder="you@example.com OR Kabeer"
                
              />
            </div>

            <div class="form-group">
              <label class="form-label" for="login-pass" style="display:flex; justify-content:space-between;">
                <span>Password</span>
                <a href="#" style="font-size:0.7rem; color:var(--text-3); font-weight:400; text-transform:none; letter-spacing:0;" id="toggle-pass">show</a>
              </label>
              <input
                class="form-input"
                type="password"
                name="password"
                id="login-pass"
                placeholder="••••••••"
                autocomplete="current-password"
              />
            </div>

            <div style="display:flex; justify-content:flex-end; margin-top:-0.75rem; margin-bottom:1.25rem;">
              <a href="#" class="text-xs text-faint" style="text-decoration:underline; text-underline-offset:3px;">Forgot password?</a>
            </div>

            <button type="submit" class="btn btn--primary btn--full">Sign in</button>

          </form>

          <div class="auth-divider">or</div>

          <button class="btn btn--outline btn--full" style="gap:0.5rem;">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 8v4l3 3"/></svg>
            Continue with GitHub
          </button>
        </div>

      </div>
    </div>

  </div>
@endsection