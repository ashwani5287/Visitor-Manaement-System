
@extends('Backend.master')
@section('bodyContent')
  
<div class="section-body">
    <div class="row">
      <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="card-header">
            <div class="card-body">
                <h4>Student Details </h4>
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
                        <th>Student Name</th>
                        <th>Father Name</th>
                        <th>Father Mobile</th>
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
                    @foreach ($StudentDetails as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->stuFather }}</td>
                            <td>{{ $item->fatherMobile }}</td>
                            <td>{{ $item->admissionNo }}</td>
                            <td>{{ $item->stusection }}</td>
                            <td>{{ $item->stuclass }}</td>
                            <td>{{ $item->created_at->format('d-m-Y') }}</td>
                            <td>{{ $item->created_at->format('h:i:s') }}</td>

                          

                        <td><a href="{{ route('student.deleteStudents',['id'=>$item->id]) }}" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Delete</a></td>
                            {{-- <td>Edit</td> --}}
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
                          </button></td>
                              
                            {{-- <td><a href="" class="btn btn-danger btn-sm">delete</a></td> --}}
                            


                            
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
        <form action="{{ route('student.import') }}" method="post" enctype="multipart/form-data">
            @csrf
        <div class="modal-body">
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
          <h5 class="modal-title" id="exampleModalCenterTitle">Edit Student Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('student.UpdateStudent')}}" method="post">
            @csrf
        <div class="modal-body">
         <input type="hidden" name="id" id="detailsID">
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
      aria-labelledby="exampleModalCenterTitle" aria-hidden="false"  data-backdrop="static" data-keyboard="false">
      <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Add Student Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('student.StudentAdmission') }}" method="post">
          @csrf
          <div class="modal-body">
              
              <label for="Student_name">Student's Name</label>
              <input type="text" name="Student_name" class="form-control form-control-sm" id="Student_name" value="{{ old('Student_name') }}">
              @error('Student_name')
                  <span class="text-danger">{{ $message }}</span>
              @enderror <br>
              
              <label for="father_name">Father's Name</label>
              <input type="text" name="father_name" class="form-control form-control-sm" id="father_name" value="{{ old('father_name') }}">
              @error('father_name')
                  <span class="text-danger">{{ $message }}</span>
              @enderror  <br>
              
              <label for="father_mobile">Father's Mobile</label>
              <input type="text" name="father_mobile" class="form-control form-control-sm" id="father_mobile" value="{{ old('father_mobile') }}">
              @error('father_mobile')
                  <span class="text-danger">{{ $message }}</span>
              @enderror  <br>
              
              <label for="stuAdmission">Admission No</label>
              <input type="text" name="stuAdmission" class="form-control form-control-sm" id="stuAdmission" value="{{ old('stuAdmission') }}">
              @error('stuAdmission')
                  <span class="text-danger">{{ $message }}</span>
              @enderror  <br>
              
              <label for="stuClass">Class</label>
              <input type="text" name="stuClass" class="form-control form-control-sm" id="stuClass" value="{{ old('stuClass') }}">
              @error('stuClass')
                  <span class="text-danger">{{ $message }}</span>
              @enderror  <br>
              
              <label for="stuSection">Section</label>
              <input type="text" name="stuSection" class="form-control form-control-sm" id="stuSection" value="{{ old('stuSection') }}">
              @error('stuSection')
                  <span class="text-danger">{{ $message }}</span>
              @enderror  <br>
          </div>
          <div class="modal-footer bg-whitesmoke br">
              <button type="submit" class="btn btn-primary">Add</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
      </form>
      
      </div>
      </div>
      </div>

     





    </div>
</div>


  @endsection