@extends('Frontend.master')
@section('title', 'Visitor Registration')

@section('BodyContent')

{{-- 
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="{{ asset('default_image/MDHP_logo.jpg') }}" alt="Logo" width="50" height="30" class="d-inline-block align-top">
      </a>
      <span class="navbar-text ">
        Visitor Management System
      </span>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      </button>
     
    </div>
  </nav> --}}
<style>
  
    .registerforms {
        margin-top: 10px;
        border: 2px solid rgb(244, 123, 123);
        border-radius: 5px;
        background-color: rgb(188, 186, 186);
        opacity: 0.9;
        /* padding: 20px; */
    }
    .results{
        width: 100px;
    }
   

    .outline-dark {
        border: 1px solid #343a40;
        color: #343a40;
    }

    #takeSnapshot {
    position: relative;
    left: 50%;
    transform: translateX(-50%);
}

#showCameraRetake {
    position: relative;
    left: 50%;
    transform: translateX(-50%);
}

.sumbit-button{
    display: block;
    margin: 0 auto;
    margin-bottom: 10px;
}
  
</style>
<div  style="">
<div class="container" id="main">
    <form method="POST" id="visitorForm" action="{{ route('front.preVisitorStore') }}">
        @csrf
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div id="hideRetakeImage">
                    <div id="results"></div>
                </div>
                <input type="button" value="Re-Take" onClick="take_snapshot()" class="btn btn-success btn-lg" id="showCameraRetake" style="display: none">
                <div id="imageCaptureButtonHide">
                    <div id="my_camera"></div>
                    <br/>
                    <input type="button" class="btn btn-danger btn-lg" value="Take Image" onClick="take_snapshot()" id="takeSnapshot">
                    <input type="hidden" name="image" class="image-tag" id="cameraImage" required>
                </div>
            </div>

            <div class="col-md-6 col-sm-12 registerforms">
                <h4>Submit Your Details</h4>
                <label for="name">Name</label>
                <input type="text" name="name" id="Visitorname" class="form-control form-control-lg outline-dark" placeholder="Enter your name" {{ isset($getExistingRecord) ? 'value='.$getExistingRecord->name.' readonly' : 'required' }}>
                <label for="email">Mobile Number</label>
                <input type="text" id="MobileNumber" value="{{ isset($getExistingRecord) ? $getExistingRecord->Mobile : $DirectMobile }}" onkeypress='return event.charCode >= 48 && event.charCode <= 57' name="Mobile" autofocus maxlength="10" minlength="10" autocomplete="off" class="form-control form-control-lg outline-dark rounded" readonly>
                <label for="message">Meeting with</label>
                <select name="message" id="message" class="form-control form-control-lg outline-dark" required>
                    @if (isset($getExistingRecord))
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
                
                <button class="btn btn-success sumbit-button btn-lg mt-1">Submit</button>
                
            </div>
        </div>
    </form>
</div>


<script>
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
            // $('#hideRetakeImage').show();
            $('#showCameraRetake').show();
        });

        $("#showCameraRetake").click(function (e) {
            $('#imageCaptureButtonHide').show();
            $('#hideRetakeImage').hide();
            
        });
    });

    function take_snapshot() {
        Webcam.snap(function (data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="' + data_uri + '"/>';
            recognizeImage(data_uri);
        });
    }

    function recognizeImage(imageData) {
        var requestData = {
            image: imageData
        };

        $.ajax({
            type: "POST",
            url: "your-server-endpoint-url",
            data: JSON.stringify(requestData),
            contentType: "application/json",
            success: function (response) {
                if (response.success) {
                    console.log("Image recognition successful!");
                    console.log("Recognition result: " + response.result);
                } else {
                    console.error("Image recognition failed: " + response.error);
                }
            },
            error: function (xhr, status, error) {
                console.error("Error occurred during image recognition request: " + error);
            }
        });
    }

    document.getElementById("visitorForm").addEventListener("submit", function(event) {
        var imageInput = document.getElementById("cameraImage");
        if (imageInput.value.trim() === "") { // Check if the value is empty after trimming whitespace
            event.preventDefault(); // Prevent the form from submitting
            alert("Please select an image");
        }
    });

    $('#message').change(function () {
        if ($(this).val() === '') {
            $('#otherMessage').show();
        } else {
            $('#otherMessage').hide();
        }
    });
</script>
</div>
@endsection
