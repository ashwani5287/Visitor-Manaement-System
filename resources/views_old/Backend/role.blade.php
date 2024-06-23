
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
            <table class="table" id="mytable">
                <thead>
                    <tr>
                        <th>Sr</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                       <th>Date</th>
                      <th>Time</th>
                      <th>Edit</th>
                      <th>Delete</th>
  {{--  
                        <th>Edit</th>
                        <th>Delete</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @php
                    $sr=1;
                @endphp
                    @foreach ($AllRoleUser as $item)
                      
                    <tr>
                       
                      <td>{{ $sr }}</td>
                          <td class="RoleId" style="display: none">{{ $item->id }}</td>
                        
                          <td class="RoleName">{{ $item->Name }}</td>
                          <td class="RoleEmail">{{ $item->Email }}</td>
                          <td class="Role">{{ $item->role }}</td>
                          <td>{{ $item->created_at->format('d-m-Y') }}</td>
                          <td>{{ $item->created_at->format('h:m:s')  }}</td>
                          <td class="getId"> <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#exampleModalCenterUpdate" >Edit</button> </td>
                          {{-- <td> <a href="{{ route('Role.DeleteUserRole',$item->id) }}" onclick="return confirm('Are you sure to delete this record')" class="btn btn-danger btn-sm">Delete</a></td> --}}

                          <td> <a href="{{ route('Role.DeleteUserRole', ['id' => $item->id]) }}" onclick="return confirm('Are you sure to delete this record')" class="btn btn-danger btn-sm">Delete</a></td>


                          {{-- "id":2,"role":"SuperAdmin","Name":"ashwani","Email":"ashwani@gmail.com","Password":"$2y$12$5f2vpIap7pUHmrpEbEkCfO2LgalfRTRyGGSoTng4oU4vjgwI4q9.O","status":"1","created_at":"2024-05-11T08:11:55.000000Z","updated_at":"2024-05-11T08:11:55.000000Z"} --}}

                        {{-- <td class="meetingMsg">{{ $item->message }}</td>
                        <td class="getId"> <button type="button" class="btn btn-primary" data-toggle="modal"
                          data-target="#exampleModalCenterUpdate" >Edit</button> </td>
                        <td> <a href="{{ route('admin.MeetingDelete',$item->id) }}" onclick="return confirm('Are you sure to delete this record')" class="btn btn-danger btn-sm">Delete</a></td>
                    --}}
                   
                      </tr>
                  
                    @endforeach
                    
                  
                </tbody>
            </table>

            
         
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
          @foreach ($roleAssign as $item)
          <option value="{{ $item->roleName }}">{{ $item->roleName }}</option>
          @endforeach
          
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
                @foreach ($roleAssign as $item)
                <option value="{{ $item->roleName }}">{{ $item->roleName }}</option>
                @endforeach
                
            </select>
         <label for="">Name</label>
         <input type="text" name="name" class="form-control" placeholder="" autofocus>
         <label for="">Email</label>
         <input type="" name="email" class="form-control" placeholder="" autofocus>
         <label for="">password</label>
         <input type="password" name="password" class="form-control" placeholder="" autofocus>
         <label for="">Confirm Password</label>
         <input type="password" name="confirm_password" class="form-control" placeholder="" autofocus>
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