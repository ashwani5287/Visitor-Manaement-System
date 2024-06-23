@extends('Frontend.master')
@section('title','Online Visitor System')
@section('BodyContent')

    

<div class="container">



    
    {{-- <div class="login">
        @if (session::has('id'))
        
        <a href="{{ route('school.logout') }}" class="btn btn-outline-danger btn-sm">Logout</a>
        @else
        <a href="{{ route('school.loginForm') }}" class="btn btn-outline-danger btn-sm">Login</a>
        
        @endif
    
</div> --}}
    <style>
        .login
        {
           
            float: right;
            font-weight: bold;
            text-decoration: none;
            
        }
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
        height: 30vh;
        /* height: %; */
        width: 30%;
        background-color: rgb(188, 186, 186);
        opacity: 0.8;
        
       
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


<body>


    <div class="containers">
        <div class="firstMethod">
            <form action="{{ route('front.Checkexistingregister') }}" method="post"  id="checkForm" class="text-center">
                @csrf
                <h5>Enter Mobile Number</h5>
                <div class="input-group">
                    <label for="mobileNumber" class="visually-hidden">Mobile Number</label>
                    <input type="text" id="mobileNumber" name="Mobile"  autocomplete="off" class="form-control form-control outline-dark rounded" placeholder="Mobile Number" aria-label="Mobile Number" aria-describedby="button-addon2">
                </div>
                <button class="btn btn-danger" type="submit" name="checkForm1"  id="button-addon2">Submit</button>
            </form>
        </div>
    </div>
    <script>
       $(document).ready(function () {
        $("#checkForm").submit(function (e) { 
          var mobile = $("#mobileNumber").val();
          if (mobile === "" || isNaN(mobile) || mobile.length !== 10) {
            alert("Please enter a valid 10-digit mobile number.");
            e.preventDefault();
          } else {
            // If the number is valid, proceed with the form submission
            $("#mobileNumber").val(mobile); 
          }
        });
       });
    </script>
    

    
@endsection