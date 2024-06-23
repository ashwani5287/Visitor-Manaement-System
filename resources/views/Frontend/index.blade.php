@extends('Frontend.master')
@section('title','Online Visitor System')
@section('BodyContent')
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

 
<style>
    .login {
        float: right;
        font-weight: bold;
        text-decoration: none;
    }

    .containers {
        
        /* margin-top: 200px; */
        position: relative;
        top: 100px;
        /* display: flex; */
        justify-content: center;
        align-items: center;
        background-size: cover;
        background-position: center;
    }


    .input-group {
        margin-bottom: 15px;
        max-width: 300px;
        width: 100%;
    }

    .btn-primary:hover {
        background-color: rgb(0, 0, 0);
    }

    .form-control {
        border: 1px solid rgb(41, 40, 40);
        width: 100%;
        box-sizing: border-box;
        border-radius: 2px;
    }
   



    @media only screen and (max-width: 1024px) {
        .containers .row {
                position: relative;
                top: 200px;
                display: flex;
                flex-direction: column;
                align-items: center;
          
        }
    }

    /* Media query for mobile devices (portrait and landscape) */
    @media only screen and (max-width: 768px) {
        #backgroundimage {

        }}

    </style>




<div class="containers">
    
<div class="row w-100 mt-5 text-center">
    <div class=" col-md-12 col-sm-12  text-center mb-5">
        <button type="button" class="btn btn-3d btncolorred" data-toggle="modal" data-target="#registerModal">Visitor</button>
        {{-- <button type="button" class="btn btn-primary btn-3d" data-toggle="modal" data-target="#PreregisterModalLabel">Pre Visitor</button> --}}

    </div>
    
    <div class=" col-md-12 col-sm-12  text-center mb-5">
        <button type="button" class="btn  btn-3d btncolorblue "data-toggle="modal" data-target="#OtpModal">Parents Login</button>
    </div>
       
        <div class=" col-md-12 col-sm-12  text-center mb-5">
        {{-- <span class="mt-4"> --}}
        <button type="button" class="btn  btn-3d btncolorred "  data-toggle="modal" data-target="#OtpModalDriver">Driver Login</button>
        {{-- </span> --}}
        </div>
    </div>
    
</div>

<style>
    .btncolorred{
        background-color:#b8596b;
        color: white;
    }

    .btncolorblue{
       background-color: #63b3f8;
       color: white;
}
</style>

<style>
   /* Add 3D effect to the button */
.btn-3d {
    position: relative;
    padding: 12px 24px;
    font-size: 30px;
    font-weight: bold;
    color: rgb(255, 255, 255);
    width: 250px;
    border: none;
    border-radius: 4px;
    box-shadow: 0 4px #999;
    transition: all 0.1s ease-in-out;
}

/* Add a deeper shadow and move the button slightly up on hover */
.btn-3d:hover {
    box-shadow: 0 2px #666;
    top: 2px;
}

/* Simulate the button being pressed */
.btn-3d:active {
    box-shadow: 0 0 #666;
    top: 4px;
}

</style>



<!-- Driver OTP Verification -->

<div class="modal fade bd-example-modal-sm fade" id="OtpModalDriver" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">

        {{-- <div class="modal-dialog modal-lg"> --}}
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="registerModalLabel">Driver OTP Verification</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('Driver.DriverOtpVerification') }}" method="post" id="checkFormOTP">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="MobileOTP">Enter 4 Digit OTP</label>
                        <input type="number" maxlength="4" id="MobileOTP" name="MobileOTP" autocomplete="off" class="form-control form-control-lg" placeholder="Ex 1234" required placeholder="Ex 1234"  maxlength="4" minlength="4" pattern="\d{4}" title="Please enter exactly 4 digits">
                        <div class="p-3">
                        <button type="submit" class="btn btncolorred   btn-lg float-right">Verify</button>
                    </div>
                    </div>
                </div>
                {{-- <div class="modal-footer">
                    <button type="submit" class="btn btn-danger btn-sm">Verify</button>
                </div> --}}
            </form>
        </div>
    
</div>
</div>

<!-- Driver OTP Verification auto foucs -->
<script>
    $('#OtpModalDriver').on('shown.bs.modal', function () {
         $('#MobileOTP').trigger('focus')
        })
</script>
<!-- END Driver OTP Verification auto foucs -->

<!-- Modal For OTP Verfication -->
{{-- <div class="modal fade" id="myModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"> --}}

<div class="modal fade" id="OtpModal" tabindex="-1"  data-backdrop="static" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
    {{-- <div class="modal-dialog" role="document"> --}}
        <div class="modal-dialog modal-dialog-centered model-md" role="document">

        {{-- <div class="modal-dialog modal-md"> --}}
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title " id="registerModalLabel"><strong> Parents OTP Verification</strong></div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('verification.OTPVerifcation') }}" method="post" id="checkFormOTP" autocomplete="off">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="mobileNumber">Enter 4 Digit OTP</label>
                        <input type="number" id="MobileOTP"  name="MobileOTP" autocomplete="off" class="form-control parentsOTP form-control-lg " placeholder="Ex 1234" required maxlength="4" minlength="4" pattern="\d{4}" title="Please enter exactly 4 digits">

                        {{-- <input type="text" id="MobileOTP" name="MobileOTP" autocomplete="off" class="form-control" placeholder="Ex 1234" required maxlength="4" minlength="4"> --}}
                        {{-- <div class="error-message" id="otpError">Invalid OTP. Please try again.</div> --}}
                        <div class="p-3">
                            <button type="submit" class="btn btn-lg   btncolorblue float-right">Verify</button>
                        </div>
                    </div>
                </div>
               
            </form>
        </div>
        {{-- </div> --}}
    </div>
    </div>

    
<!-- Parents OTP Verification auto foucs -->
<script>
    $('#OtpModal').on('shown.bs.modal', function () {
         $('.parentsOTP').trigger('focus')
        })
</script>
<!-- END Parents OTP Verification auto foucs -->

    
<!-- Modal For New Registration -->
<div class="modal fade" id="registerModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
    {{-- <div class="modal-dialog" role="document"> --}}
        <div class="modal-dialog modal-dialog-centered model-lg" role="document">

        {{-- <div class="modal-dialog modal-lg"> --}}
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title " id="registerModalLabel"> Visitor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form  method="post" id="verifyOTPForm"  >
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="mobileNumber">Enter Mobile Number</label>
                        <input type="number" id="mobileNumber"  name="Mobile" required autocomplete="off" class="form-control  form-control-lg" placeholder="Mobile Number">
                        <span class="text-danger" id="otpstatus"></span>

                       

                    </div>
                    <!-- Display OTP input field with countdown timer -->
                    <div id="otpField" style="display: none;">
                        <label for="otp">Enter OTP</label>
                        <input type="number" id="otp" name="OTP" class="form-control" placeholder="OTP">
                        <div class="text-danger text-small" id="OtpStatus"></div>
                        <p id="countdown"></p>
                    </div>
                </div>
                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}


                    <button type="button" id="sendOTP" class="btn  btn-lg btncolorred">Submit</button>
                    <button type="submit" id="verifyOTPBtn" class="btn btn-lg btncolorred" style="display: none;">Verify OTP</button>
                </div>
            </form>
        </div>
        {{-- </div> --}}
    </div>
</div>

<!--auto foucs visitor input mobile number-->
<script>
    $('#registerModal').on('shown.bs.modal', function () {
         $('#mobileNumber').trigger('focus')
        });

        $("#sendOTP").click(function () { 
           
            // $('#registerModalLabel').on('shown.bs.modal', function () {
         $('#otp').trigger('focus')
        // });  
        });
      
        
</script>




<script>


    $(document).ready(function () {


// Assuming there's an input field with id 'otpInput' for the user to enter the OTP
$('#verifyOTPBtn').click(function (e) { 
    e.preventDefault();

    var mobileNo = $("#mobileNumber").val();
    

if (mobileNo === '' || mobileNo.length !== 10 || !/^\d{10}$/.test(mobileNo)) {
    return false;
}


    // Capture the OTP entered by the user
    var otp = $('#otp').val();
    let otpStatus = document.getElementById('OtpStatus');

    // Check if OTP is entered
    // if (otp.length === '4') {
    //     alert("Please enter the OTP.");
    //     return;
    // }

    // Make AJAX request to verify OTP
    $.ajax({
        type: "post",
        url: "{{ route('visitor.verifyOtp') }}",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: { otp: otp }, // Send OTP as data
        dataType: "json",
        success: function (response) {


            if (response.status==true) {
                window.location.href = response.redirect_url;

            // Redirect to the URL provided in the response
        } else {
            // Handle the error message
            // otpStatus.innerHTML = response.message;
            otpStatus.innerHTML = "Wrong OTP Please Check";

        }
            // alert(response);
            // return  redirect()->route('Frontend.VisitorRegister');
        
           
            // if (response.success) {
            //     alert(response.success);
            //     // OTP is correct
            //     otpStatus.innerHTML = "OTP is invalid. It should not be more than 4 digits.";  

            //     // You can redirect the user or take any other action here
            // } else {
            //     // OTP is incorrect
            //     otpStatus.innerHTML = "OTP is invalid.";  
            // }
        },
        error: function (xhr, status, error) {
            // Handle any errors from the server or network issues
            console.error("Error verifying OTP:", error);
            alert("An error occurred while verifying the OTP. Please try again later.");
        }
    });
});





//for sendng otp function
       
        $("#sendOTP").click(function (e) { 
           
            // e.preventDefault();
            var mobileNo=$("#mobileNumber").val(); 
           
        

        // Assuming you're intending to use AJAX when the user sends OTP, here's the corrected AJAX call
            // e.preventDefault();
            var mobileOTP = $("#otp").val(); // Assuming OTP input field id is "otp"
            $.ajax({
                type: "POST", // Corrected method to POST
                url: "{{ route('visitor.sendOTP') }}", // Corrected route syntax
                headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
                data: { mobile: mobileNo }, // Corrected data syntax
                dataType: "json",
                success: function (response) {

                    if (response.status=='0') {
                        document.getElementById("otpField").style.display = "none";
                    document.getElementById("verifyOTPBtn").style.display = "none";
                    document.getElementById("otpstatus").innerHTML = "Mobile number length is not valid ";
                    }

                    if (response.status=='1') {
                       
                        document.getElementById("otpField").style.display = "none";
                    document.getElementById("verifyOTPBtn").style.display = "none";
                    // window.location.href = "{{ route('front.preVisitor') }}";
                    window.location.href = response.redirect_url;



                    // document.getElementById("otpstatus").innerHTML = "You Are Already Register Please Click on Pre-Visitor";

                    
                        // alert('You Are Already Register Please Click on pre-register')
                    }
                        if (response.status=='2') {
                        document.getElementById("otpField").style.display = "none";
                    document.getElementById("verifyOTPBtn").style.display = "none";
                    document.getElementById("otpstatus").innerHTML = "Someting went wrong";

                       
                        }

                        if (response.status=='3') {
                       
                            document.getElementById("otpstatus").innerHTML = "<span style='color: green;'>OTP Send successfully on your mobile</span>";

                        // document.getElementById("otpstatus").innerHTML = "OTP Send successfully on your mobile ";

                        document.getElementById("sendOTP").style.display = "none";
                    document.getElementById("otpField").style.display = "block";
                    document.getElementById("verifyOTPBtn").style.display = "block";
                        }

                   
                                    },
                error: function(xhr, status, error) {
                    // Handle error response here
                }
            });
        });
    });



</script>


<script>
    // Function to start countdown timer
   
    // });

    // // Function to show verify OTP button after OTP is entered
    // document.getElementById("otp").addEventListener("input", function () {
    //     if (this.value.length === 6) {
            // document.getElementById("verifyOTPBtn").style.display = "block";
    //     } else {
    //         document.getElementById("verifyOTPBtn").style.display = "none";
    //     }
    // });

    // // Submit OTP verification form
    // document.getElementById("verifyOTPBtn").addEventListener("click", function () {
    //     document.getElementById("verifyOTPForm").submit();
    // });
</script>




{{-- 
<!-- Modal For New Registration -->
<div class="modal fade" id="registerModal"  data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="registerModalLabel">New Register</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="{{ route('front.Checkexistingregister') }}" method="post" id="checkForm">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="mobileNumber">Enter Mobile Number</label>
                    <input type="text" id="mobileNumber" name="Mobile" autocomplete="off" class="form-control" placeholder="Mobile Number">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Submit</button>
            </div>
        </form>
    </div>
</div>
</div> --}}

<script>
    //for mobile 
$(document).ready(function () {
    $("#checkForm").submit(function (e) {
        var mobile = $("#mobileNumber").val();
        if (mobile === "" || isNaN(mobile) || mobile.length !== 10) {
            alert("Please enter a valid 10-digit mobile number.");
            e.preventDefault();
        } else {
            $("#mobileNumber").val(mobile);
        }
    });
});

  //for otp 
  $(document).ready(function () {
    $("#checkFormOTP").submit(function (e) {
        var mobileOTP = $("#MobileOTP").val();
       
        if (mobileOTP === "" || isNaN(mobileOTP) || mobileOTP.length !== 4) {
            alert("Please enter a valid 4-digit OTP.");
            e.preventDefault();

        } else {
            $("#checkFormOTP").val(mobileOTP);

                //custome code

                

        }
    });
});
</script>

<script>
    $(document).ready(function () {
        
        $("ValidateMobile").submit(function (e) {
        var mobile = $("#mobileNumber").val();
        if (mobile === "" || isNaN(mobile) || mobile.length !== 10) {
            alert("Please enter a valid 10-digit mobile number.");
            e.preventDefault();
        } else {
            $("#mobileNumber").val(mobile);
        }
    });
        
    });
</script>



{{-- 
<script>
    $(document).ready(function () {
        $("#checkFormOTP").submit(function (e) {
            e.preventDefault();
            var mobileOTP = $("#MobileOTP").val();
            
            // Validate OTP
            if (mobileOTP === "" || isNaN(mobileOTP) || mobileOTP.length !== 4) {
                alert("Please enter a valid 4-digit OTP.");
                return;
            }
          


       
            // AJAX call to verify OTP
            $.ajax({
                url: "{{ route('verification.OTPVerifcation') }}",  // Adjust this URL as needed
                type: "get",
                data: {
                    _token: "{{ csrf_token() }}",
                    mobileOTP: mobileOTP,
                    dataType: 'json',
                },
                success: function(response) {
                    if (response) {
                        // OTP is correct
                        // $('#OtpModal').modal('hide');
                        alert(response);
                    } else {
                        // OTP is incorrect
                        $("#otpError").text(response);
                        alert(response);
                    }
                },
                error: function() {
                    // Handle server error
                    $("#otpError").text("An error occurred. Please try again.").show();
                }
            });
        });
    });
</script> --}}


{{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

 {{-- toastr js --}}

   
@endsection