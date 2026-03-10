<!DOCTYPE html>
<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
<head>
  <meta charset="utf-8" />
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no"
  />

  <title>Forgot Password</title>

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap"
    rel="stylesheet"
  />

  <!-- Icons -->
  <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

  <!-- Page CSS -->
  <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css') }}" />
</head>

<body>
<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner py-4">

      <div class="card">
        <div class="card-body">

          <div class="app-brand justify-content-center mb-4">
            <span class="app-brand-text fw-bolder">Sneat</span>
          </div>

          <h4 class="mb-2">Forgot Password? 🔒</h4>
          <p class="mb-4">
            Enter your email and we’ll send you a password reset link.
          </p>

          {{-- STATUS SUKSES --}}
          @if (session('status'))
            <div class="alert alert-success">
              {{ session('status') }}
            </div>
          @endif

          {{-- FORM RESET PASSWORD --}}
          <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input
                type="email"
                class="form-control @error('email') is-invalid @enderror"
                id="email"
                name="email"
                value="{{ old('email') }}"
                placeholder="Enter your email"
                required
                autofocus
              />

              @error('email')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>

            <button class="btn btn-primary d-grid w-100" type="submit">
              Send Reset Link
            </button>
          </form>

          <div class="text-center mt-3">
            <a href="{{ route('login') }}">
              ← Back to login
            </a>
          </div>

        </div>
      </div>

    </div>
  </div>
</div>

<!-- Core JS -->
<script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>

</body>
</html>
