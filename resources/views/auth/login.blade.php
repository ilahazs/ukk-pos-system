<!DOCTYPE html>
<html lang="en">

<head>
   <title>{{ "$title | " . config('app.name') }}</title>
   <meta name="google-site-verification" content="kCT200-J0rfczENRkJQdYCqsDKkUo3Hvr3KZic_otwU">
   <!--[if lt IE 11]>
   <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
   <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
   <![endif]-->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="description" content="DashboardKit is made using Bootstrap 5 design framework. Download the free admin template & use it for your project.">
   <meta name="keywords" content="DashboardKit, Dashboard Kit, Dashboard UI Kit, Bootstrap 5, Admin Template, Admin Dashboard, CRM, CMS, Free Bootstrap Admin Template">
   <meta name="author" content="DashboardKit ">
   <link rel="icon" href="{{ asset('img/icons/icon-48x48.png') }}" type="image/x-icon">
   <link rel="stylesheet" href="{{ asset('dashboard-kit-login/fonts/feather.css') }}">
   <link rel="stylesheet" href="{{ asset('dashboard-kit-login/fonts/fontawesome.css') }}">
   <link rel="stylesheet" href="{{ asset('dashboard-kit-login/fonts/material.css') }}">
   <link rel="stylesheet" href="{{ asset('dashboard-kit-login/css/style.css') }}" id="main-style-link">
   <style>
      body {
         font-family: "SF PRO TEXT";
      }

   </style>
</head>

<body class>
   <div class="auth-wrapper">
      <div class="auth-content">
         <div class="card">
            <div class="row align-items-center text-center">
               <div class="col-lg-12">
                  <div class="card-body">
                     <h3 class="mb-2">{{ __('RESTO') }}</h3>
                     @if (session('fails'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                           {!! session('fails') !!}
                           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                     @endif

                     @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                           {!! session('status') !!}
                           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                     @endif

                     {{-- <h4 class="mb-3 f-w-400">Sign IN</h4> --}}
                     <p> Default Login: <strong>username / email</strong> </p>
                     <form role="form" method="post" action="{{ route('login') }}">
                        @csrf
                        <div class="input-group mb-3">
                           <span class="input-group-text">
                              <i data-feather="user"></i>
                           </span>
                           <input class="form-control @error('email') is-invalid @enderror" id="username_login" name="email" placeholder="Username" required type="text" value="{{ old('email') }}">
                           @error('email')
                              <div class="invalid-feedback">
                                 <span>{{ $message }}!</span>
                              </div>
                           @enderror
                        </div>
                        <div class="input-group mb-4">
                           <span class="input-group-text">
                              <i data-feather="lock"></i>
                           </span>
                           <input class="form-control @error('password') is-invalid @enderror" id="pwd_login" name="password" placeholder="Password" required type="password">
                           @error('password')
                              <div class="invalid-feedback">
                                 <span>{{ $message }}!</span>
                              </div>
                           @enderror
                        </div>
                        {{-- <div class="form-group text-start mt-2">
                           <div class="form-check"> <input class="form-check-input" type="checkbox" value id="flexCheckChecked" checked> <label class="form-check-label" for="flexCheckChecked">
                                 Save credentials </label> </div>
                        </div> <br> --}}
                        <button type="submit" name="login" class="btn btn-primary mb-4 px-5">SIGN IN</button>
                     </form>
                     <p class="mb-0 text-muted">Don’t have an account? <a href="/register" class="f-w-400">SIGN UP</a> </p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <script src="{{ asset('dashboard-kit-login/js/vendor-all.js') }}"></script>
   <script src="{{ asset('dashboard-kit-login/js/bootstrap.min.js') }}"></script>
   <script src="{{ asset('dashboard-kit-login/js/feather.min.js') }}"></script>
   <script src="{{ asset('dashboard-kit-login/js/pcoded.js') }}"></script>

</body>

</html>
