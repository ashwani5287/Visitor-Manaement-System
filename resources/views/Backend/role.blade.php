
@extends('Backend.master')
@section('bodyContent')
  

<!-- Vertically Center -->
{{-- <div class="col-12 col-sm-6 col-lg-3">
    <div class="card">
      <div class="card-body text-center">
        <div class="mb-2">Success Message</div>
        <button class="btn btn-primary" id="toastr-2">Launch</button>
      </div>
    </div>
  </div> --}}

<div class="section-body">
    <div class="row">
      <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="card-header">
            <div class="card-body">
                <h4>User Role List </h4>
              </div>
              <button type="button" class="btn btn-primary" data-toggle="modal"
                  data-target="#exampleModalCenter">Add</button>
          
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                <thead>
                    <tr>
                        <th>Sr</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Mobile</th>
                       <th>Date</th>
                      <th>Time</th>
                      <th>Edit</th>
                      <th>Delete</th>
  
                    </tr>
                </thead>
                <tbody>
                    @php
                    $sr=1;
                @endphp
                    @foreach ($AllRoleUser as $item)
                      
                    <tr>
                       
                      {{-- <td>{{ $sr }}</td> --}}
                          <td>{{ $sr++ }}</td>
                        
                          <td>{{ $item->name }}</td>
                          <td>{{ $item->email }}</td>
                          <td>{{ $item->role }}</td>
                          <td>{{ $item->mobile }}</td>
                          <td>{{ $item->created_at->format('d-m-Y') }}</td>
                          <td>{{ $item->created_at->format('h:m:s')  }}</td>
                          <td> 
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenterUpdate" 
                            data-id="{{ $item->id }}" 
                            data-name="{{ $item->name }}" 
                            data-email="{{ $item->email }}" 
                            data-role="{{ $item->role }}" 
                            data-mobile="{{ $item->mobile }}">
                            Edit
                          </button>
                          </td>
                          {{-- <td> <a href="{{ route('Role.DeleteUserRole',$item->id) }}" onclick="return confirm('Are you sure to delete this record')" class="btn btn-danger btn-sm">Delete</a></td> --}}

                          <td> <a href="{{ route('Role.DeleteUserRole', ['id' => $item->id]) }}" onclick="return confirm('Are you sure to delete this record')" class="btn btn-danger btn-sm">Delete</a></td>


                      </tr>
                  
                    @endforeach
                    
                  
                </tbody>
            </table>

            </div>
         
          </div>
        </div>
      </div>
      <script>
        $(document).ready(function(){
          $('#exampleModalCenterUpdate').on('show.bs.modal', function (event) {
           
            var button = $(event.relatedTarget); // Button that triggered the modal
            var id = button.data('id');
            var name = button.data('name');
            var email = button.data('email');
            var role = button.data('role');
            var mobile = button.data('mobile');
        
            var modal = $(this);
            modal.find('#userId').val(id);
            modal.find('#userName').val(name);
            modal.find('#userEmail').val(email);
            modal.find('#userRole').val(role);
            modal.find('#userMobile').val(mobile);
             // Set the selected option in the dropdown
    modal.find('#userRole option').each(function(){
      if ($(this).val() == role) {
        $(this).prop('selected', true);
      } else {
        $(this).prop('selected', false);
      }
    });
          });
        });
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
         <input type="hidden" name="RoleId" id="userId">
        <label for="">Name</label>
        <input type="text" name="name" class="form-control" id="userName">
        <label for="">Email</label>
         <input type="text" name="email" id="userEmail" class="form-control" placeholder="" autofocus>
         <label for="">Mobile No</label>
         <input type="text" name="mobile" id="userMobile" class="form-control" placeholder="" autofocus>
        
        
         <label for="">Role</label>
         {{-- <input type="text" readonly id="userRole"> --}}
         <select name="role" id="userRole" class="form-control" required>
          <option value="SuperAdmin">SuperAdmin</option>
          <option value="Admin">Admin</option>
          <option value="User">User</option> 
          <option value="0">Inactive</option> 
      </select>
        
         {{-- <label for="">Password</label>
         <input type="password" name="password" id="RolePassword" class="form-control" placeholder="" autofocus>
         
         <label for="">Confirm Password</label>
         <input type="password" name="confirm_password" id="RolePassword" class="form-control" placeholder="" autofocus>
          --}}

       
        </div>
        <div class="modal-footer bg-whitesmoke br">
          <button type="submit" class="btn btn-primary">Update</button>
          {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
        </div>
    </form>
      </div>
      </div>
      </div>

      <!--add category model form-->
      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
      aria-labelledby="exampleModalCenterTitle" aria-hidden="false" style="" >
      <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Add User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('Role.CreateRoleUser') }}" method="post">
            @csrf
        <div class="modal-body">
            <label for="">Role Type</label>
            <select name="role" id="" class="form-control" required>
              <option value="SuperAdmin">SuperAdmin</option>
              <option value="Admin">Admin</option>
              <option value="User">User</option>
              
                {{-- @foreach ($roleAssign as $item)
                <option value="{{ $item->roleName }}">{{ $item->roleName }}</option>
                @endforeach --}}
                
            </select>
         <label for="">Name</label>
         <input type="text" name="name" class="form-control"  value="{{ old('name') }}" placeholder="" autofocus>
         <label for="">Email</label>
         <input type="" name="email" class="form-control" value="{{ old('email') }}" placeholder="" autofocus>
         <label for="">Mobile No</label>
         <input type="text" name="mobile" value="{{ old('mobile') }}" class="form-control" placeholder="Enter Mobile number" autofocus>
         
         <label for="">Password</label>
         <input type="password" name="password" class="form-control" placeholder="" autofocus>
         <label for="">Confirm Password</label>
         <input type="password" name="password_confirmation" class="form-control" placeholder="" autofocus>
        </div>
        <div class="modal-footer bg-whitesmoke br">
          <button type="submit" class="btn btn-primary">Save</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </form>
      </div>
      </div>
      </div>
     






    </div>
</div>

<script>
  
  // $("#RoleEmail").prop('disabled', true); // Disable the input field
</script>
  @endsection