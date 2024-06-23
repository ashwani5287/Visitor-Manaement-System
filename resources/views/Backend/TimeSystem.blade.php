
@extends('Backend.master')
@section('bodyContent')
<div class="section-body">
    <div class="row">
      <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="card-header">
            <div class="card-body">
                <h4>Manage School Open Close Time </h4>
              </div>
              {{-- <button type="button" class="btn btn-primary" data-toggle="modal"
                  data-target="#exampleModalCenter">Add</button> --}}
          
          </div>
          <div class="card-body">
            <table class="table" id="mytable">
                <thead>
                    <tr>
                        <th>Sr</th>
                        <th>Open School</th>
                        <th>Close School</th>
                       
                       {{-- <th>Date</th>
                      <th>Time</th> --}}
                      <th>Edit</th>
                      {{-- <th>Delete</th> --}}
  {{--  
                        <th>Edit</th>
                        <th>Delete</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @php
                    $sr=1;
                @endphp
                    
                    @if ($timesystem)
                        
                    
                    <tr>
                       
                      <td>{{ $sr }}</td>
                          <td class="TimeSystemId" style="display: none">{{ $timesystem->id }}</td>
                        
                          <td class="TimeSystemOpen">{{ $timesystem->OpenSchool }}</td>
                          <td class="TimeSystemClose">{{ $timesystem->CloseSchool }}</td>
                          
                          {{-- <td>{{ $timesystem->created_at->format('d-m-Y') }}</td>
                          <td>{{ $timesystem->created_at->format('h:m:s')  }}</td> --}}
                          <td class="getId"> <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#exampleModalCenterUpdate" >Edit</button> </td>



                      
                      </tr>
                  
                      @endif
                    
                  
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
    
         var TimeSystemId = $(this).find(".TimeSystemId").html();
         var TimeSystemOpen = $(this).find(".TimeSystemOpen").html();
         var TimeSystemClose = $(this).find(".TimeSystemClose").html();
        //  var Role = $(this).find(".Role").html();
        //  alert(RoleId);
         //update
         $('#TimeSystemId').val(TimeSystemId);
         $('#TimeSystemOpen').val(TimeSystemOpen);
         $('#TimeSystemClose').val(TimeSystemClose);
    
    
 });
          
        // });
  
     </script>


      
      <!--update category model form-->
      <div class="modal fade" id="exampleModalCenterUpdate" tabindex="-1" role="dialog"
      aria-labelledby="exampleModalCenterTitle" aria-hidden="false" style="" >
      <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Edit School Time</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('admin.UpdateTimeSystem') }}" method="post">
            @csrf
        <div class="modal-body">
         <input type="hidden" name="TimeSystemId" id="TimeSystemId">
        <label for="">Open School Time</label>
        <input type="time" name="TimeSystemOpen" class="form-control" id="TimeSystemOpen">
        <label for="">Close School TIme</label>
        <input type="time" name="TimeSystemClose" class="form-control" id="TimeSystemClose">

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
      {{-- <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
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
      --}}






    </div>
</div>

<script>
  
  // $("#RoleEmail").prop('disabled', true); // Disable the input field
</script>
  @endsection