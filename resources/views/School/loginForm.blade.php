



<!DOCTYPE html>
<html lang="en">


<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit" name="viewport">
  <title>School-Login</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/bundles/bootstrap-social/bootstrap-social.css') }}">
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
  {{-- <link rel="stylesheet" href="{{ asset('assets/bundles/izitoast/css/iziToast.min.css') }}"> --}}
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet">

  <script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>

</head>

<body id="backgoundimage">
        <style>
    #backgoundimage {
        background-size:cover;
        background-repeat: no-repeat;
        background-image: url('{{ asset('default_image/img7.png') }}');
    
        /* @media only screen and (max-width: 768px) {
            background-size: cover; /* corrected 'widows' to 'cover' */
        }
    
        /* @media only screen and (min-width: 768px) and (max-width: 1024px) {
            background-size: contain; 
        }
    
        @media only screen and (min-width: 1024px) {
            background-size: cover;
        }  */
    
    #app {
        /* background-color: rgb(188, 186, 186); */
        opacity: 0.9;
    }
    
</style>





  <div class="loader"></div>
  <div id="app">
    <section class="section">
      <div class="container " style="margin-top:160px">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="card card-primary">
              <div class="card-header">
                <h4>School Login</h4> <br> 
                <div>
                  @if (Session::has('success'))
                  <div class=" text-danger" id="toastr-1" role="alert">
                    {{ Session::get('success') }}
                  </div>
                     
                  @endif
                </div>
              
               
              </div>
              <div class="card-body">
                <form method="POST" action="{{ route('school.login') }}" class="needs-validation" novalidate="">
                    @csrf
                    @error('email')
                   <span class="text-danger font-weight-bold">{{ $message }}</span> 
                @enderror

                <div class="form-group">
                    <label for="email">User Type</label>
                    <select name="role" id="" required class="form-control">
                        <option value="">Select</option>
                        @foreach ($role as $item)
                        <option value="{{ $item->roleName }}">{{ $item->roleName }}</option>
                        @endforeach
                       

                    </select>
                    {{-- <input id="email" type="role" class="form-control" name="role" tabindex="1" required autofocus> --}}
                    
                    <div class="invalid-feedback">
                        
                      Please fill in your email
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                    
                    <div class="invalid-feedback">
                        
                      Please fill in your email
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="d-block">
                      <label for="password" class="control-label">Password</label>
                      <div class="float-right">
                        {{-- <a href="auth-forgot-password.html" class="text-small">
                          Forgot Password?
                        </a> --}}
                      </div>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    <div class="invalid-feedback">
                      please fill in your password
                    </div>
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
            {{-- <div class="mt-5 text-muted text-center">
              Don't have an account? <a href="auth-register.html">Create One</a>
            </div> --}}
          </div>
        </div>
      </div>
    </section>
  </div>
  



  {{-- <script src="{{ asset('assets/bundles/izitoast/js/iziToast.min.js') }}"></script> --}}

  <!-- Page Specific JS File -->
  {{-- <script src="{{ asset('assets/js/page/toastr.js') }}"></script> --}}

  <!-- General JS Scripts -->
  <script src="{{ asset('assets/js/app.min.js') }}"></script>
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <!-- Template JS File -->
  <script src="{{ asset('assets/js/scripts.js') }}"></script>
  <!-- Custom JS File -->
  <script src="{{ asset('assets/js/custom.js') }}"></script>







  <script>
    @if(Session::has('message'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.success("{{ session('message') }}");
    @endif
   
    @if(Session::has('error'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.error("{{ session('error') }}");
    @endif
   
    @if(Session::has('info'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.info("{{ session('info') }}");
    @endif
   
    @if(Session::has('warning'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.warning("{{ session('warning') }}");
    @endif
   </script>




</body>

{{-- 
  <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':

                    toastr.options.timeOut = 10000;
                    toastr.info("{{ Session::get('message') }}");
                    var audio = new Audio('audio.mp3');
                    audio.play();
                    break;
                case 'success':

                    toastr.options.timeOut = 10000;
                    toastr.success("{{ Session::get('message') }}");
                    var audio = new Audio('audio.mp3');
                    audio.play();

                    break;
                case 'warning':

                    toastr.options.timeOut = 10000;
                    toastr.warning("{{ Session::get('message') }}");
                    var audio = new Audio('audio.mp3');
                    audio.play();

                    break;
                case 'error':

                    toastr.options.timeOut = 10000;
                    toastr.error("{{ Session::get('message') }}");
                    var audio = new Audio('audio.mp3');
                    audio.play();

                    break;
            }
        @endif
    </script> --}}


<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->
</html>