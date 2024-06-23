
@extends('Backend.master')
@section('bodyContent')
  
<div class="section-body">
    <div class="row">
      <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="card-header">
            <div class="card-body">
                <h4>Add Student With Driver </h4>
                <a href="{{ asset('addStudent.xlsx') }}" target="__blank" download="ImportStudentFormatExcel.xlsx">Download Excel Format For Import Student</a>

              </div>
              <button type="button" class="btn btn-primary" data-toggle="modal"
                  data-target="#exampleModalCenterAdd">Add Student</button>
                  <button type="button" class="btn btn-danger" data-toggle="modal"
                  data-target="#exampleModalCenterImport">Import</button>
          </div>

          <div class="card-body">
            <div class="table-responsive">
            <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Driver ID</th>
                        <th>Student Name</th>
                        <th>Father Name</th>
                        <th>FatherMother's Mobile</th>
                        <th>Admission No</th>
                        <th>Class</th>
                        <th>Section</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        
                          {{-- <th>Email</th>
                        <th>Created At</th>
                        <th>Time</th>
                        <th>Edit</th>
                        <th>Delete</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($StudentWithDriver as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->Driver_id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->stuFather }}</td>
                            <td>{{ $item->fatherMobile }}</td>
                            <td>{{ $item->admissionNo }}</td>
                            <td>{{ $item->stusection }}</td>
                            <td>{{ $item->stuclass }}</td>
                            <td>{{ $item->created_at->format('d-m-Y') }}</td>
                            <td>{{ $item->created_at->format('h:i:s') }}</td>
                           
                            {{-- <td> <button type="button" class="btn btn-primary" data-toggle="modal"
                              data-target="#exampleModalCenterUpdate">Edit</button></td>  --}}
                                <td>
                              <button type="button" class="btn btn-primary view-details-btn" data-toggle="modal" data-target="#exampleModalCenterUpdate"
                              data-id="{{ $item->id }}"
                              data-name="{{ $item->name }}"
                              data-stufather="{{ $item->stuFather }}"
                              data-fathermobile="{{ $item->fatherMobile }}"
                              data-admissionno="{{ $item->admissionNo }}"
                              data-stusection="{{ $item->stusection }}"
                              data-stuclass="{{ $item->stuclass }}">
                              Edit
                          </button>
                        </td>
                            {{-- <td><a href=""class="btn btn-danger btn-sm">delete</a></td> --}}
                            <td><a href="{{route('school.StudentDelete',['student_id'=>$item->id])   }}" class="btn btn-danger btn-sm">delete</a></td>



                            
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
      $('.view-details-btn').on('click', function() {
        var id = $(this).data('id');
          var name = $(this).data('name');
          var stufather = $(this).data('stufather');
          var fathermobile = $(this).data('fathermobile');
          var admissionno = $(this).data('admissionno');
          var stuclass = $(this).data('stuclass');
          var stusection = $(this).data('stusection');

        


         
          $('#detailsID').val(id);
          $('#detailsName').val(name);
          $('#detailsFather').val(stufather);
          $('#detailsMobile').val(fathermobile);
          $("#detailsAdmissionNo").val(admissionno);
          $("#detailsClass").val(stuclass);
          $("#detailsSection").val(stusection);
          // $('#detailsSection').attr('src', stusection);
  
          $('#registerModal').modal('show');
      });
  });
     </script>




        <!--import model form-->
      <div class="modal fade" id="exampleModalCenterImport" tabindex="-1" role="dialog"
      aria-labelledby="exampleModalCenterTitle" aria-hidden="false" style="" >
      <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Import Excel file</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('school.importStudent') }}" method="post" enctype="multipart/form-data">
            @csrf
        <div class="modal-body">

            <label for="">Select Excel File</label>
        
            <label for="">Select Driver</label>
            <select name="Driver_id" id="" class="form-control" required>
               <option value="">Select</option>
               @foreach ($DriverDetails as $item)
               <option value="{{ $item->driver_ID }}">{{ $item->name }}</option>
               @endforeach
              
            </select>
        

            {{-- <input type="text" name="student_data" class="form-control form-control-sm" id="RoleName"> --}}
            
            
        <label for="">Select Excel File</label>
        <input type="file" name="student_data" class="form-control" id="RoleName">
        
        
        </div>
        <div class="modal-footer bg-whitesmoke br">
          <button type="submit" class="btn btn-primary">add</button>
        </div>
    </form>
      </div>
      </div>
      </div>



     




      <!--update student model form-->
      <div class="modal fade" id="exampleModalCenterUpdate" tabindex="-1" role="dialog"
      aria-labelledby="exampleModalCenterTitle" aria-hidden="false" style="" >
      <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Edit Student  Details </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('school.updateStudent') }}" method="post">
            @csrf
        <div class="modal-body">
         <input type="hidden" name="detailsID" id="detailsID">
        <label for="">Student's Name</label>
        <input type="text" name="Student_name" class="form-control form-control-sm" id="detailsName">
        <label for="">Father's Name</label>
         <input type="text" name="father_name" id="detailsFather" class="form-control form-control-sm" placeholder="" autofocus>
         
         <label for="">Father's Mobile</label>
         <input type="text" name="father_mobile" id="detailsMobile" class="form-control form-control-sm" placeholder="" autofocus>
         
         <label for="">Admission No</label>
         <input type="text" name="stuAdmission" id="detailsAdmissionNo" class="form-control form-control-sm" placeholder="" autofocus>
         
         <label for="">Class</label>
         <input type="text" name="stuClass" id="detailsClass" class="form-control form-control-sm" placeholder="" autofocus>
         
         <label for="">Section</label>
         <input type="text" name="stuSection" id="detailsSection" class="form-control form-control-sm" placeholder="" autofocus>
        
         {{-- <select name="" id="">
            <option value="">Select Purpose</option>
            <option value="">Receive student from school</option>
            <option value="">other</option>

         </select> --}}
        
        </div>
        <div class="modal-footer bg-whitesmoke br">
          <button type="submit" class="btn btn-primary">Update</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </form>
      </div>
      </div>
      </div>







      
      <!--register student model form-->
      <div class="modal fade" id="exampleModalCenterAdd" tabindex="-1" role="dialog"
      aria-labelledby="exampleModalCenterTitle" aria-hidden="false" style="" >
      <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Add Student Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('school.AddStudentWithDriver') }}" method="post">
            @csrf
        <div class="modal-body">
         {{-- <input type="hidden" name="RoleId" id="RoleId"> --}}

         <label for="">Select Driver</label>
         <select name="Driver_id" id="" class="form-control" required>
            <option value="">Select</option>
            @foreach ($DriverDetails as $item)
            <option value="{{ $item->driver_ID }}">{{ $item->name }}</option>
            @endforeach
           
         </select>
        <label for="">Student's Name</label>
        <input type="text" name="Student_name" class="form-control form-control-sm" id="RoleName">
        <label for="">Father's Name</label>
         <input type="text" name="father_name" id="RoleEmail" class="form-control form-control-sm" placeholder="" autofocus>
         
         <label for="">Father's Mobile</label>
         <input type="text" name="father_mobile" id="RoleEmail" class="form-control form-control-sm" placeholder="" autofocus>
         
         <label for="">Admission No</label>
         <input type="text" name="stuAdmission" id="RoleEmail" class="form-control form-control-sm" placeholder="" autofocus>
         
         <label for="">Class</label>
         <input type="text" name="stuClass" id="RoleEmail" class="form-control form-control-sm" placeholder="" autofocus>
         
         <label for="">Section</label>
         <input type="text" name="stuSection" id="RoleEmail" class="form-control form-control-sm" placeholder="" autofocus>
        
         {{-- <select name="" id="">
            <option value="">Select Purpose</option>
            <option value="">Receive student from school</option>
            <option value="">other</option>

         </select> --}}
        
        </div>
        <div class="modal-footer bg-whitesmoke br">
          <button type="submit" class="btn btn-primary">Update</button>
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