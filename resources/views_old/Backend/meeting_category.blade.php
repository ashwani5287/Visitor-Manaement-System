
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
                <h4>Manage Category List </h4>
              </div>
              <button type="button" class="btn btn-primary" data-toggle="modal"
                  data-target="#exampleModalCenter">Add</button>
          
          </div>
          <div class="card-body">
            <table class="table" id="mytable">
                <thead>
                    <tr>
                        <th>Sr</th>
                        <th>Message</th>
                      
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $sr=1;
                @endphp
                    @foreach ($category as $item)
                      
                    <tr>
                        <td scope="row">{{ $sr++ }}</td>
                      
                          <td class="categoryId" style="display: none">{{ $item->id }}</td>
                       
                        <td class="meetingMsg">{{ $item->message }}</td>
                        <td class="getId"> <button type="button" class="btn btn-primary" data-toggle="modal"
                          data-target="#exampleModalCenterUpdate" >Edit</button> </td>
                        <td> <a href="{{ route('admin.MeetingDelete',$item->id) }}" onclick="return confirm('Are you sure to delete this record')" class="btn btn-danger btn-sm">Delete</a></td>
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
    var Message = $(this).find(".meetingMsg").html();   
         var CategoryId = $(this).find(".categoryId").html();   

    $('#putmeeting').val(Message);
    $('#Categoryid').val(CategoryId);
    
 });
          
        // });
  
     </script>


      
      <!--update category model form-->
      <div class="modal fade" id="exampleModalCenterUpdate" tabindex="-1" role="dialog"
      aria-labelledby="exampleModalCenterTitle" aria-hidden="false" style="" >
      <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Update Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('admin.MeetingUpdate') }}" method="post">
            @csrf
        <div class="modal-body">
         <label for="">Edit Category</label>
         <input type="hidden" name="Categoryid" id="Categoryid">
         <input type="text" name="category" id="putmeeting" class="form-control" placeholder="" autofocus>
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
          <h5 class="modal-title" id="exampleModalCenterTitle">Add Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('admin.MeetingStore') }}" method="post">
            @csrf
        <div class="modal-body">
         <label for="">Category</label>
         <input type="text" name="category" class="form-control" placeholder="" autofocus>
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

  @endsection