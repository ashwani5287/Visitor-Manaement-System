<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    
</head>

<body id="backgoundimage">
    
<style>
    #backgoundimage {
        /* background-size:contain;  */
        background-size:cover;
        width: 100%;
        background-repeat:space;
        background-image: url({{ asset('default_image/img7.png') }});

        
    }
    


</style>


{{--     

<nav class="navbar navbar-light  navbar-expand-lg" style="background-color: #e3f2fd;">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <img src="{{ asset('assets/img/banner/3.png')}}" width="50px" alt=""> <h3>Here School Name</h3> 
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            
        
        </ul>
        <span class="navbar-text">
            <a class="nav-link" href="{{ route('login') }}" target="__blank"> Admin Login</a>
        </span>
      </div>
    </div>
  </nav>
 --}}



 

