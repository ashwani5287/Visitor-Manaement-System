{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script> --}}
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" /> --}}

@extends('Frontend.master')
@section('title',' Visitor Registration')

@section('BodyContent')

<style type="text/css">
    /* #results { padding:20px;  border:1px solid; background:#ccc; } */
    #my_camera{
        width: 50px;
        height: 50px;
    }
    .outline-dark {
        border: 1px solid #343a40; /* Dark border color */
        color: #343a40; /* Dark text color */
    }
</style>
<br><br>

<style>
     .registerform {
        /* margin-top: 40px;
        border: 1px solid rgb(0, 0, 0);
        border-radius: 8px;
        box-shadow: 3px 4px 8px rgba(48, 47, 47, 0.3); 
        height: 70vh;
        /* height: %; */
        /* background-color: rgb(231, 219, 219);
        opacity: 0.9;
        
       
        padding: 20px;  */ */
    }

    #main
    {
        margin-top:105px;

    }
    .registerform
    {
        margin-top: 10px;
        border: 2px solid rgb(244, 123, 123);
        border-radius: 5px;
        width: 450px;
        height: 320px;
        /* margin-left: -90px; */
        background-color: rgb(188, 186, 186);
        opacity: 0.9;
    }

#takeSnapshot
{
    margin-left: 300px;
    margin-top:-50px;

}
</style>

<div class="container" id="main">
{{-- <h1 class="text-center">Online Visitor System</h1> --}}
<form method="POST" id="visitorForm" action="{{ route('front.Register') }}">
    @csrf
    <div class="row ">
        {{-- <div class="col-3">
            <div class="border" style="height: 100%; ">
                <div style=" text-align:center;">
                <button style="background-color: red; padding: 5px; text-align:center; width:auto; border: none;">
                    <span style="color: white; font-weight: bold;">Online Visitor System</span>
                </button>
            </div>
                
                <ul>
                    <li>Enter Your Name</li>
                    <li>Enter Your Mobile Number</li>
                    <li>Select Meeting Purpose</li>
                    <li>Take Your Image </li>
                    <li>Click On submit button and save your record</li>
                </ul>
            </div>
        </div> --}}
       
        <div class="col-md-6 " id="">
            <div id="hideRetakeImage">
            <div id="results" > </div>
        </div>
            <input type="button" value="Re-Take" onClick="take_snapshot()" id="showCameraRetake" style="display: none">
         <div  id="imageCaptureButtonHide" >
            <div id="my_camera"></div>

           
       
            <br/>
           
            <input type="button" class="btn btn-danger btn-sm" value="Take Image" onClick="take_snapshot()" id="takeSnapshot">
        
            <input type="hidden" name="image" class="image-tag" id="cameraImage" required>
        </div>
        </div>


        
        
        {{-- <div class="col-md-3 border"> --}}
            {{-- <div id="results" width=>Your captured image </div>
            <input type="button" value="Re-Take" onClick="take_snapshot()" id="showCameraRetake" style="display: none"> --}}
        {{-- </div> --}}

      
     

        @if ($getExistingRecord)
      
        <div class="col-md-4 registerform">
            <label for="name">Name</label>
            <input type="text" name="name" id="Visitorname" value="{{ $getExistingRecord->name }}" class="form-control outline-dark" placeholder="Enter your name" readonly>
            <label for="email">Mobile Number</label>
            <input type="text" id="MobileNumber" value="{{ $getExistingRecord->Mobile }}"  onkeypress='return event.charCode >= 48 && event.charCode <= 57' name="Mobile" autofocus maxlength="10" minlength="10" autocomplete="off" class="form-control form-control outline-dark rounded" readonly>

            {{-- <input type="number" name="Mobile" id="Mobile" value="{{ $getExistingRecord->Mobile }}" class="form-control outline-dark" placeholder="Enter your Mobile Number" required minlength="10"> --}}
            <label for="message">Meeting with</label>
            <select name="message" id="message" class="form-control outline-dark" required>
            
                   
                @if ($getExistingRecord->meeting)
                <option value="{{ $getExistingRecord->meeting }}">{{ $getExistingRecord->meeting }}</option> 
                 @endif

            @foreach ($getMeetingCategory as $item)
                    <option value="{{ $item->message }}">{{ $item->message }}</option>
                @endforeach

            <option value="" id="otherMessageShow">Other</option>
            
            </select>
            
            <div id="otherMessage" style="display: none">
                <br>
                <textarea name="Othermessage" id="otherMessageInput" cols="30" rows="3" class="form-control" placeholder="Write Your message..."></textarea>
            </div>
            <br>
            {{-- <button class="btn btn-success" onclick="take_snapshot()">Submit</button> --}}
            <button class="btn btn-success">Submit</button>

            {{-- <div id="results" width=>Your captured image </div> --}}
        </div>
        @else
        
        <div class="col-md-4 registerform">
            <label for="name">Name</label>
            <input type="text" name="name" id="name"  class="form-control outline-dark" placeholder="Enter your name" required>
            <label for="email">Mobile Number</label>
            <input type="number" name="Mobile" id="Mobile" value="{{   $DirectMobile }}"  class="form-control outline-dark" placeholder="Enter your Mobile Number" readonly maxlength="10">
            <label for="message">Meeting with</label>
            <select name="message" id="message" class="form-control outline-dark" required>
               
                   
                  

               
                    <option value="">Select</option>
                    @foreach ($getMeetingCategory as $item)
                    <option value="Meeting with teacher">{{ $item->message }}</option>
                    @endforeach

               
                <option value="" id="otherMessageShow">Other</option>
            </select>
            
            <div id="otherMessage" style="display: none">
                <br>
                <textarea name="Othermessage" id="otherMessageInput" cols="30" rows="3" class="form-control" placeholder="Write Your message..."></textarea>
            </div>
            <br>
            {{-- <button class="btn btn-success" onclick="take_snapshot()">Submit</button> --}}
            <button class="btn btn-success">Submit</button>

            {{-- <div id="results" width=>Your captured image </div> --}}
        </div>
        @endif
        
        <div class="col-md-2">
        </div>
        
       
    </div>
</form>
</div>

<script>
    //mobile number validate
   
    //    $(document).ready(function () {
    //     $("#MobileNumber").prop('disabled', true); // Disable the input field
    //     $("#Mobile").prop('disabled', true); // Disable the input field
    //     $("#Visitorname").prop('disabled', true); // Disable the input field

        
    //    });
    
</script>

<script>
$(document).ready(function () {
    $('#message').change(function () {
        if ($(this).val() === '') {
            $('#otherMessage').show();
        } else {
            $('#otherMessage').hide();
        }
    });
});
</script>

<script>
document.getElementById("visitorForm").addEventListener("submit", function(event) {
    var imageInput = document.getElementById("cameraImage");
    if (imageInput.value.trim() === "") { // Check if the value is empty after trimming whitespace
        event.preventDefault(); // Prevent the form from submitting
        alert("Please select an image");
    }
});
</script>



<script language="JavaScript">
Webcam.set({
    width: 450,
    height: 350,
    image_format: 'jpeg',
    jpeg_quality: 90
});

Webcam.attach('#my_camera');



$(document).ready(function () {
$('#takeSnapshot').click(function (e) { 
          
          
            $('#showCameraRetake').show();
            $('#imageCaptureButtonHide').hide();
            $('#hideRetakeImage').show();
            
         }); 


         $("#showCameraRetake").click(function (e) { 
            
            // imageCaptureButtonHide
          
            $('#imageCaptureButtonHide').show();
              $('#hideRetakeImage').hide();
              
         });
});


function take_snapshot() {
    Webcam.snap( function(data_uri) {
        $(".image-tag").val(data_uri);
        document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
        
        // Send the image data to your backend for image recognition
        recognizeImage(data_uri);
        // $('#showCameraRetake').show();
        
        

       
    });
}

function recognizeImage(imageData) {
// Prepare the data to be sent to the server
var requestData = {
    image: imageData // Pass the captured image data
};

// Send the image data to the server for processing
$.ajax({
    type: "POST",
    url: "your-server-endpoint-url",
    data: JSON.stringify(requestData),
    contentType: "application/json",
    success: function(response) {
        // Handle the response from the server
        if (response.success) {
            // If recognition was successful, update the UI or take further actions
            console.log("Image recognition successful!");
            console.log("Recognition result: " + response.result);
            // Example: Update UI with recognition result
            $('#recognitionResult').text(response.result);
        } else {
            // If recognition failed, handle the error
            console.error("Image recognition failed: " + response.error);
        }
    },
    error: function(xhr, status, error) {
        // Handle errors that occurred during the AJAX request
        console.error("Error occurred during image recognition request: " + error);
    }
});
}

</script>
@endsection