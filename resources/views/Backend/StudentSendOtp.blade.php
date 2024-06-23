
@extends('Backend.master')
@section('bodyContent')
  
<div class="section-body">
    <div class="row">
      <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="card-header">
            <div class="card-body">
                <h4>Student Send OTP Details </h4>
              </div>
              {{-- <button type="button" class="btn btn-primary" data-toggle="modal"
                  data-target="#exampleModal">Add</button> --}}
          
          </div>

          <div class="card-body">
            <div class="table-responsive">
            <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                <thead>
                    <tr>
                        <th>id</th>
                        {{-- <th>Registerd_id</th> --}}
                        <th>Student Name</th>
                        <th>Father Name</th>
                        <th>Father Mobile</th>
                        <th>Admission No</th>
                        <th>Class</th>
                        <th>Section</th>
                        <th>OTP</th>
                        <th>Date</th>
                        <th>Time</th>
                        
                        





                    </tr>
                </thead>
                <tbody>
                    @foreach ($StudentOTPDetails as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            {{-- <td class="RoleId">{{ $item->id }}</td> --}}
                            {{-- <td>{{ $item->register_id }}</td> --}}
                            <td>{{ $item->StudentName }}</td>
                            <td>{{ $item->FatherName }}</td>
                            <td>{{ $item->FatherMobile }}</td>

                            
                            <td>{{ $item->AdmissionNo }}</td>
                            <td>{{ $item->StudentSection }}</td>
                            <td>{{ $item->StudentClass }}</td>
                            <td>{{ $item->StudentOTP }}</td>
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

     





    </div>
</div>

<script>
  
  // $("#RoleEmail").prop('disabled', true); // Disable the input field
</script>
  @endsection