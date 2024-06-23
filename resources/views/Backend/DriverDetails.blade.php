
@extends('Backend.master')
@section('bodyContent')
  
<div class="section-body">
    <div class="row">
      <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="card-header">
            <div class="card-body">
                <h4>Driver Details </h4>
              </div>
              <button type="button" class="btn btn-primary" data-toggle="modal"
                  data-target="#exampleModal">Add</button>
          
          </div>

          <div class="card-body">
            <div class="table-responsive">
            <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                <thead>
                    <tr>
                        <th>id</th>
                        {{-- <th>Driver ID</th> --}}
                        <th>Edit</th>
                        <th>Delete</th>
                        <th>Name</th>
                        <th>Driver ID</th>
                        <th>DOB</th>
                        <th>Gender</th>
                        <th>Mobile</th>
                        <th>Alternate Mobile</th>
                        <th>Document Type</th>
                        <th>Document</th>
                        <th>Address</th>
                        <th>Pin Code</th>
                        <th>Driver Image</th>
                        <th>Vehicle Number</th>
                        <th>Vehicle Color</th>
                      <th>Vehicle Type</th>
                      <th>Date</th>
                      <th>Time</th>
                   
                   
                    
                          {{-- <th>Email</th>
                        <th>Created At</th>
                        <th>Time</th>
                        <th>Edit</th>
                        <th>Delete</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allDriver as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            {{-- <td class="RoleId">{{ $item->id }}</td> --}}
                            {{-- <td>{{ $item->driver_ID }}</td> --}}

                            <td>
                              <button type="button" class="btn btn-danger update-details-btn" data-toggle="modal"
                              data-target="#exampleModalUpdate"
                              data-id="{{ $item->id }}"
                              data-name="{{ $item->name }}"
                              data-dob="{{ $item->dob }}"
                              data-gender="{{ $item->gender }}"
                              data-mobile="{{ $item->mobile }}"
                              data-alternate-mobile="{{ $item->alternate_mobile }}"
                              data-document-type="{{ $item->document_type }}"
                              data-document="{{ $item->document }}"
                              data-address="{{ $item->address }}"
                              data-pin-code="{{ $item->pin_code }}"
                              data-driver-image="{{ $item->driver_image }}"
                              data-driver-vehicle-number="{{ $item->driver_vehicle_Number }}"
                              data-vehicle-color="{{ $item->vehicle_Color }}"
                              data-vehicle-type="{{ $item->vehicle_Type }}"
                              data-meeting="{{ $item->meeting }}"
                              data-date="{{ $item->created_at->format('d-m-Y') }}"
                              data-time="{{ $item->created_at->format('h:i:s') }}"
                              data-image="{{ asset($item->image) }}">
                          Edit
                      </button>
                  </td>
  
                            <td><a href="{{ route('school.DeleteDriver',['id'=>$item->id]) }}" onclick="return confirm('Are you sure you want to delete this record?')" class="btn btn-primary btn-sm">Delete</a></td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->driver_ID }}</td>
                            <td>{{ $item->dob }}</td>
                            <td>{{ $item->gender }}</td>
                            <td>{{ $item->mobile }}</td>
                            <td>{{ $item->alternate_mobile }}</td>
                            <td>{{ $item->document_type }}</td>
                            <td><a href="{{ asset('public/uploads/Driver_documents/Document/'.$item->document) }}" target="__blank"> <img src="{{ asset('public/uploads/Driver_documents/Document/'.$item->document) }}" width="100px" alt="not found"></a></td>

                            {{-- <td>{{ $item->document }}</td> --}}
                            <td>{{ $item->address }}</td>
                            <td>{{ $item->pin_code }}</td>
                            <td><a href="{{ asset('public/uploads/Driver_documents/Image/'.$item->driver_image) }}" target="__blank"> <img src="{{ asset('public/uploads/Driver_documents/Image/'.$item->driver_image) }}" width="100px" alt="not found"></a></td>
                            <td>{{ $item->driver_vehicle_Number }}</td>
                            <td>{{ $item->vehicle_Color }}</td>
                            <td>{{ $item->vehicle_Type }}</td>
                            <td>{{ $item->created_at->format('d-m-Y') }}</td>
                            <td>{{ $item->created_at->format('h:i:s') }}</td>
                            {{-- <td><button class="view-details-btn btn btn-danger btn-sm" data-name="{{ $item->name }}" data-mobile="{{ $item->Mobile }}" data-meeting="{{ $item->meeting }}" data-date="{{ $item->created_at->format('d-m-Y') }}" data-time="{{ $item->created_at->format('h:i:s') }}" data-image="{{ asset($item->image) }}">View</button></td> --}}
                           

                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>

            
         
          </div>
        </div>
      </div>
      <script>
        document.getElementById("hideIdRow").style.display = "none";

      </script>

     <script>
     $(document).ready(function() {
    $('.update-details-btn').on('click', function() {
      var id = $(this).data('id');
        var name = $(this).data('name');
        var dob = $(this).data('dob');
        var gender = $(this).data('gender');
        var mobile = $(this).data('mobile');
        var alternateMobile = $(this).data('alternate-mobile');
        var documentType = $(this).data('document-type');
        var document = $(this).data('document');
        var address = $(this).data('address');
        var pinCode = $(this).data('pin-code');
        var driverImage = $(this).data('driver-image');
        var driverVehicleNumber = $(this).data('driver-vehicle-number');
        var vehicleColor = $(this).data('vehicle-color');
        var vehicleType = $(this).data('vehicle-type');
        var meeting = $(this).data('meeting');
        // var date = $(this).data('date');
        // var time = $(this).data('time');
        var image = $(this).data('image');
      ;
      $('#detailsID').val(id);
        $('#detailsName').val(name);
        $('#detailsDob').val(dob);
        $('#detailsGender').val(gender);
        $('#detailsMobile').val(mobile);
        $('#detailsAlternateMobile').val(alternateMobile);
        $('#detailsDocumentType').val(documentType);
        $('#detailsDocument').val(document);
        $('#detailsAddress').val(address);
        $('#detailsPinCode').val(pinCode);
        $('#detailsDriverImage').val(driverImage);
        $('#detailsDriverVehicleNumber').val(driverVehicleNumber);
        $('#detailsVehicleColor').val(vehicleColor);
        $('#detailsVehicleType').val(vehicleType);
        // $('#detailsMeeting').val(meeting);
        // $('#detailsDate').val(date);
        // $('#detailsTime').val(time);
        // $('#detailsDriverImage').attr('src', driverImage);
        // $('#detailsImage').attr('src', image);

        $('#exampleModalUpdate').modal('show');
    });
});
     </script>



      
      <!--Update Driver Details-->
      <div id="exampleModalUpdate" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Details</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="POST" action="{{ route('school.updateDriver') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="detailsName">Name</label>
                  <input type="hidden" name="id" id="detailsID">
                  <input type="hidden" name="Olddriver_image" id="detailsDriverImage">
                  <input type="hidden" name="Olddriver_document" id="detailsDocument">

                  <input type="text" class="form-control" id="detailsName" name="name" >
                </div>
                <div class="form-group">
                  <label for="detailsDob">Age</label>
                  <input type="text" class="form-control" id="detailsDob" name="age" >
                </div>
                <div class="form-group">
                  <label for="detailsGender">Gender</label>
                  <input type="text" class="form-control" id="detailsGender" name="gender">
                </div>
                <div class="form-group">
                  <label for="detailsMobile">Mobile</label>
                  <input type="text" class="form-control" id="detailsMobile" name="mobile">
                </div>
                <div class="form-group">
                  <label for="detailsAlternateMobile">Alternate Mobile</label>
                  <input type="text" class="form-control" id="detailsAlternateMobile" name="alternateMobile">
                </div>
                <div class="form-group">
                  <label for="detailsDocumentType">Document Type</label>
                  <input type="text" class="form-control" id="detailsDocumentType" name="documentType">
                </div>
                <div class="form-group">
                  <label for="detailsDocument">Document</label>
                  <input type="file" class="form-control" id="detailsDocument" name="Newdoument">
                </div>
                <div class="form-group">
                  <label for="detailsAddress">Address</label>
                  <input type="text" class="form-control" id="detailsAddress" name="address">
                </div>
                <div class="form-group">
                  <label for="detailsPinCode">Pin Code</label>
                  <input type="text" class="form-control" id="detailsPinCode" name="pinCode">
                </div>
                <div class="form-group">
                  <label for="detailsDriverImage">Driver Image</label>
                  <input type="file" class="form-control" name="NewDriver_image">
                </div>
                <div class="form-group">
                  <label for="detailsDriverVehicleNumber">Driver Vehicle Number</label>
                  <input type="text" class="form-control" id="detailsDriverVehicleNumber" name="Driver_VehicleNo">
                </div>
                <div class="form-group">
                  <label for="detailsVehicleColor">Vehicle Color</label>
                  <input type="text" class="form-control" id="detailsVehicleColor" name="color">
                </div>
                <div class="form-group">
                  <label for="detailsVehicleType">Vehicle Type</label>
                  <input type="text" class="form-control" id="detailsVehicleType" name="Vehicle_type" >
                </div>
               
                {{-- <div class="form-group">
                  <label for="detailsImage">Image</label>
                  <img id="detailsDriverImage" class="img-fluid" src="" alt="Image" name="driver_image">
                </div> --}}
                <input type="submit" value="Update" class="btn btn-primary btn-sm">
              </form>
            </div>
          </div>
        </div>
      </div>
     



      
      <!--add Driver Details model form-->
       <!-- Modal with form -->
       <div class="modal fade" id="exampleModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="formModal"
       aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModal">Add Driver Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('school.AddDriver') }}" method="POST" enctype="multipart/form-data" name="driverform">
                    @csrf
                    <div class="form-group">
                        <label>Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" placeholder="Name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label>age <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="age" required>
                    </div>
                    <div class="form-group">
                        <label>Gender<span class="text-danger">*</span></label>
                        <select class="form-control" name="gender" required>
                            <option value="">Select</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Mobile <span class="text-danger">*</span></label>
                        <input type="tel" class="form-control" placeholder="Mobile Number" name="mobile" required>
                    </div>
                    <div class="form-group">
                        <label>Alternate Mobile</label>
                        <input type="tel" class="form-control" placeholder="Alternate Mobile Number" name="alternate_mobile">
                    </div>
                    <div class="form-group">
                        <label>Document Type <span class="text-danger">*</span></label>
                        <select class="form-control" name="document_type" required>
                            <option value="PAN">PAN Card</option>
                            <option value="passport">Passport</option>
                            <option value="driver-license">Driver's License</option>
                            <option value="id-card">ID Card</option>
                            <option value="Aadhar">Aadhar Card</option>
                        </select>
                    </div>
                    {{-- <div class="form-group">
                        <label>ID Number</label>
                        <input type="text" class="form-control" placeholder="Alternate Mobile Number" name="Id_Number">
                    </div> --}}
                    <div class="form-group">
                        <label>Document <span class="text-danger">*</span></label>
                        <input type="file" class="form-control" name="document" required>
                    </div>
                    <div class="form-group">
                        <label>Address <span class="text-danger">*</span></label>
                        <textarea class="form-control" placeholder="Address" name="address" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Pin Code <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" placeholder="Pin Code" name="pin_code" required>
                    </div>
                    <div class="form-group">
                        <label>Driver Image <span class="text-danger">*</span></label>
                        <input type="file" class="form-control" name="driver_image" required>
                    </div>

                    <div class="form-group">
                        <label>Driver's vehicle Number <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="driver_vehicle_Number" required placeholder="ex UP701244">
                    </div>
{{-- 
                    <div class="form-group">
                        <label>vehicle's Color <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="vehicle_Color" required placeholder=" ">
                    </div> --}}

                    <div class="form-group">
                        <label>vehicle's Type <span class="text-danger">*</span></label>
                        <select name="vehicle_Type" id="" class="form-control">
                            <option value="Bus">BUS</option>
                            <option value="Van">Van</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label>vehicle's Color <span class="text-danger">*</span></label>
                        <select name="vehicle_Color" id="" class="form-control">
                            <option value="Yellow">Yellow</option>
                            <option value="Red">Red</option>
                            <option value="Green">Green</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                 
                  
                 
                   
                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">Add</button>
                    {{-- <button type="button" class="btn btn-primary m-t-15 waves-effect">Close</button> --}}
                </form>
            </div>
        </div>
    </div>
</div>

     






    </div>
</div>

<script>
  
  // $("#RoleEmail").prop('disabled', true); // Disable the input field
</script>
  @endsection