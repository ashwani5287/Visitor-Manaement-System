


<!DOCTYPE html>
<html lang="en">


<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Admin-Login</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <link rel="stylesheet" href="assets/bundles/bootstrap-social/bootstrap-social.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/css/custom.css">
  {{-- <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' /> --}}

  {{-- <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' /> --}}
</head>

<body id="backgroundimage">
    
  <style>
      #backgroundimage {
        margin-top:150px;
          background-image: url({{ asset('default_image/img7.png') }});
          background-size:cover;
          background-repeat: no-repeat;
          width: 100%;
          
         
      }
  
      /* Media query for tablets (portrait and landscape) */
      @media only screen and (max-width: 1024px) {
          #backgroundimage {
              background-size: contain;
               width: 100%;
            
          }
      }
  
      /* Media query for mobile devices (portrait and landscape) */
      @media only screen and (max-width: 768px) {
          #backgroundimage {
               background-size:auto;
              background-size:100%;
                width: 100%;
             
          }
      }
  </style>
  
  
  
  <div class="loader"></div>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
           
           
           
            <div class="card card-primary">
              <div class="card-header">
                <h4>Login</h4>
               
              </div>
              <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" tabindex="1" required autofocus>
                    @error('email')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <div class="d-block">
                      <label for="password" class="control-label">Password</label>
                      <div class="float-right">
                        @if (Route::has('password.request'))
                        <a href="{{route('password.request') }}" class="text-small">
                          Forgot Password?
                        </a>
                        @endif
                      </div>
                    </div>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" tabindex="2" required>
                    @error('password')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                      <label class="custom-control-label" for="remember-me">Remember Me</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <div class="mt-5 text-muted text-center">
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
 



























  
  <!-- General JS Scripts -->
  <script src="assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
</body>


<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->
</html>