@extends('Backend.master')
{{-- <link rel="stylesheet" href="{{ asset('assets/bundles/datatables/datatables.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}"> --}}
@section('bodyContent')

<div class="section-body">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>School Login Details</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                <thead>
                  <tr>
                    <th>Sr</th>
                    <th>Name</th>
               
                    <th>Email</th>
                    <th>Date </th>
                   
                    <th>Time</th>
                    <th>Day</th>
                   
                  </tr>
                </thead>
                <tbody>
                 
                 @php
                     $sr=1;
                 @endphp
                    @foreach ($loginDetails as $item)
                    <tr>
                        <td>{{ $sr++ }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        
                        <td>{{ $item->created_at->format('d-m-Y') }}</td>
                        <td>{{ $item->created_at->format('h:i:s')  }}</td>




                      
                      <td> {{  $item->created_at->diffForHumans(); }}</td>






                      </tr>
                       
                    @endforeach
                 
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- "id": 2,
        "name": "Amit Mauryaa",
        "email": "phpmail37@gmail.com",
        "role-type": "Admin",
        "status": "1",
        "created_at": "2024-05-11T07:28:56.000000Z",
        "updated_at": "2024-05-11T07:28:56.000000Z" --}}
      
  @endsection
{{--   
   <!-- Page Specific JS File -->
   <script src="{{ asset('assets/bundles/datatables/datatables.min.js') }}"></script>
   <script src="{{ asset('assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
   <script src="{{ asset('assets/bundles/datatables/export-tables/dataTables.buttons.min.js') }}"></script>
   <script src="{{ asset('assets/bundles/datatables/export-tables/buttons.flash.min.js') }}"></script>
   <script src="{{ asset('assets/bundles/datatables/export-tables/jszip.min.js') }}"></script>
   <script src="{{ asset('assets/bundles/datatables/export-tables/pdfmake.min.js') }}"></script>
   <script src="{{ asset('assets/bundles/datatables/export-tables/vfs_fonts.js') }}"></script>
   <script src="{{ asset('assets/bundles/datatables/export-tables/buttons.print.min.js') }}"></script>
   <script src="{{ asset('assets/js/page/datatables.js') }}"></script> --}}