<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>vister Entry</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .containers {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
           
            background-size: cover;
        
            background-position: center;
           
      
        }
        .input-group {
            max-width: 300px;

        }
    </style>

<style>
    .firstMethod {
        border: 1px solid rgb(0, 0, 0);
        border-radius: 8px;
        box-shadow: 3px 4px 8px rgba(48, 47, 47, 0.3); 
        height: 70vh;
        width: 30%;
       
        padding: 20px; 
    }

    .input-group {
        margin-bottom: 15px; 
    }

  
    .btn-primary:hover {
        background-color: rgb(0, 0, 0);
    }
    .form-control {
            border: 1px solid rgb(41, 40, 40);
          
            padding: 8px; 
            width: 100%; 
            box-sizing: border-box; 
            border-radius: 2px;

        }
    </style>
</style>




<nav class="navbar navbar-light  navbar-expand-lg" style="background-color: #e3f2fd;">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <img src="{{ asset('assets/img/banner/3.png')}}" width="50px" alt=""> <h3>Here School Name</h3> 
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            
          {{-- <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('front.home') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Status</a>
          </li> --}}
          {{-- <li class="nav-item">
            <a class="nav-link" href="#">Pricing</a>
          </li> --}}
        </ul>
        <span class="navbar-text">
            <a class="nav-link" href="{{ route('login') }}" target="__blank"> Admin Login</a>
        </span>
      </div>
    </div>
  </nav>


</head>
<body style="background-image: url({{ asset('default_image/img2.jpg') }})">

    <div class="containers">
    <div class="firstMethod">
        <form action="{{ route('front.Checkexistingregister') }}" method="post" class="text-center">
            @csrf
            <h5>Enter Mobile Number</h5>
            <div class="input-group">
                <label for="mobileNumber" class="visually-hidden">Mobile Number</label>
                <input type="text" id="mobileNumber" name="Mobile" autofocus maxlength="10" autocomplete="off" class="form-control form-control outline-dark rounded" required placeholder="Mobile Number" aria-label="Mobile Number" aria-describedby="button-addon2">
            </div>
            <button class="btn btn-danger" type="submit" id="button-addon2">Submit</button>
        </form>
    </div>
</div>

    {{-- <div class="firstMethod">
        <form action="{{ route('front.Checkexistingregister') }}" method="post" class="text-center">
            @csrf
            <h5>Using Qr Code</h5>
            <div class="input-group">
                <label for="mobileNumber" class="visually-hidden">Mobile Number</label>
                <input type="text" id="mobileNumber" name="Mobile" class="form-control form-control outline-dark" required placeholder="Mobile Number" aria-label="Mobile Number" aria-describedby="button-addon2">
            </div>
            <button class="btn btn-primary" type="submit"  id="button-addon2">Submit</button>

        </form>
    </div> --}}

    {{-- <div class="firstMethod">
        <form action="{{ route('front.Checkexistingregister') }}" method="post" class="text-center">
            @csrf
            <h5>Using Mobile Otp</h5>
            <div class="input-group">
                <label for="mobileNumber" class="visually-hidden">Mobile Number</label>
                <input type="text" id="mobileNumber" name="Mobile" class="form-control form-control outline-dark" required placeholder="Mobile Number" aria-label="Mobile Number" aria-describedby="button-addon2">
            </div>
            <button class="btn btn-primary" type="submit" id="button-addon2">Submit</button>
        </form>
    </div> --}}






    
</body>
</html>
