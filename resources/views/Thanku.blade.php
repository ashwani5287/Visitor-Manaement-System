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
        background-size:cover; 
        background-repeat: no-repeat;
        background-image: url({{ asset('default_image/img7.png') }});

        
    }
    


</style>

   
  @if (Session::has('message'))
      <div style="font-size: 40px;font-weight-bolder; color:black;text-align:center; margin-top:200px; background-color:red" class="text-info"> {{ session::get('message') }}</div>
     
      <script>
        setTimeout(function(){
            window.location.href="{{ route('front.home') }}"},3000);
       </script>
      @else
      <script>
        setTimeout(function(){
            window.location.href="{{ route('front.home') }}"},3000);
       </script>
      @endif
  
      <footer>
        <div class="copy-right">
          <div class="row">
            <div class="col-md-12 col-sm-12 text-center" style="background-color:black">
              <p></p>
              <p style="color:#fff;">Powered By <a href="https://mdhp.in/" target="_blank" style="color:inherit"><strong>MDHP</strong></a></p>
            </div>
          </div><!--./row-->
        </div>
      </footer>

      
      <style>
        footer {
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  background-color: #333; /* Change this to your desired background color */
  color: white; /* Change this to your desired text color */
  padding: 15px;
  text-align: center;
}

.copy-right {
  position: relative;
  bottom: 0;
}

      </style>
  
  {{-- <div class="copy-right" style="">
      <div class="">
          <div class="row">
              <div class="col-md-12 col-sm-12 text-center" style="background-color:black">
                  <p></p>
                  <p style="color:#fff; ">Powered By <a href="https://mdhp.in/" target="_blank" style="color:inherit"><strong>MDHP</strong>  </a></p>
              </div>
          </div><!--./row-->
      </div><!--./container-->
  </div>
       --}}
       
  </body>
  </html>