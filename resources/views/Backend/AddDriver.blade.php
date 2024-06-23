
@extends('Backend.master')
@section('bodyContent')
  
<div class="section-body">
    <div class="row">
      <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="card-header">
            <div class="card-body">
                <h4>Add Driver Details </h4>
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
                        <th>Driver ID</th>
                        <th>Name</th>
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
                            <td class="RoleId">{{ $item->id }}</td>
                            <td>{{ $item->driver_ID }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->dob }}</td>
                            <td>{{ $item->gender }}</td>
                            <td>{{ $item->mobile }}</td>
                            <td>{{ $item->alternate_mobile }}</td>
                            <td>{{ $item->document_type }}</td>
                            <td>{{ $item->document }}</td>
                            <td>{{ $item->address }}</td>
                            <td>{{ $item->pin_code }}</td>
                            <td>{{ $item->driver_image }}</td>
                            <td>{{ $item->driver_vehicle_Number }}</td>
                            <td>{{ $item->vehicle_Color }}</td>
                            <td>{{ $item->vehicle_Type }}</td>
                            <td>{{ $item->created_at->format('d-m-Y') }}</td>
                            <td>{{ $item->created_at->format('h:i:s') }}</td>
                            {{-- <td>{{ $item->Driver_email }}</td>
                            <td>{{ $item->created_at->format('d-m-Y') }}</td>
                            <td>{{ $item->created_at->format('H:i:s') }}</td>
                            <td class="getId">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenterUpdate">Edit</button>
                            </td>
                            <td>
                                <a href="{{ route('Role.DeleteUserRole', ['id' => $item->id]) }}" onclick="return confirm('Are you sure to delete this record')" class="btn btn-danger btn-sm">Delete</a>
                            </td> --}}
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
      
        
        // $('.getId').click(function (e) { 
          $('#mytable tr').click(function() {
    
         var RoleId = $(this).find(".RoleId").html();
         var RoleName = $(this).find(".RoleName").html();
         var RoleEmail = $(this).find(".RoleEmail").html();
        //  var Role = $(this).find(".Role").html();
         
        //  alert(RoleId);
         //update
         $('#RoleName').val(RoleName);
         $('#RoleEmail').val(RoleEmail);
         $('#RoleId').val(RoleId);
    
    
 });
          
        // });
  
     </script>


      
      <!--update category model form-->
      <div class="modal fade" id="exampleModalCenterUpdate" tabindex="-1" role="dialog"
      aria-labelledby="exampleModalCenterTitle" aria-hidden="false" style="" >
      <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Edit User Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('Role.UpdateUserRole') }}" method="post">
            @csrf
        <div class="modal-body">
         <input type="hidden" name="RoleId" id="RoleId">
        <label for="">Name</label>
        <input type="text" name="name" class="form-control" id="RoleName">
        <label for="">Email</label>
        {{-- <div id="RoleEmail">email</div> --}}
         <input type="text" name="email" id="RoleEmail" class="form-control" placeholder="" autofocus>
         <label for="">Password</label>
         <input type="password" name="password" id="RolePassword" class="form-control" placeholder="" autofocus>
         
         <label for="">Confirm Password</label>
         <input type="password" name="confirm_password" id="RolePassword" class="form-control" placeholder="" autofocus>
         

         <label for="">Role</label>
         <select name="role" id="" class="form-control" required>
         
          
      </select>
        </div>
        <div class="modal-footer bg-whitesmoke br">
          <button type="submit" class="btn btn-primary">Update</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </form>
      </div>
      </div>
      </div>

      <!--add category model form-->
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
                        <input type="text" class="form-control" name="dob" required>
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
                        <input type="tel" class="form-control" placeholder="Alternate Mobile Number" name="alternate-mobile">
                    </div>
                    <div class="form-group">
                        <label>Document Type <span class="text-danger">*</span></label>
                        <select class="form-control" name="document-type" required>
                            <option value="passport">Passport</option>
                            <option value="driver-license">Driver's License</option>
                            <option value="id-card">ID Card</option>
                            <option value="Aadhar">Aadhar Card</option>
                        </select>
                    </div>
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
                        <input type="file" class="form-control" name="driver-image" required>
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