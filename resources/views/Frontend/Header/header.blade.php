<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.css" rel="stylesheet" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>

<body id="backgroundimage">
    

      
<style>
    /* //#backgroundimage */
    #backgroundimage {
      
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
            /* margin-top:190px; */
            
             /*background-size:100% 100vh;*/
             background-size:contain;
                /* background-color: #f0efe2; */

             
           
        }
    }
</style>


    






 

