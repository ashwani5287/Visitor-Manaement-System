@extends('Backend.master')
{{-- <link rel="stylesheet" href="{{ asset('assets/bundles/datatables/datatables.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}"> --}}
@section('bodyContent')

<div class="section-body">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>New Registered </h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                <thead>
                  <tr>
                    <th>Sr</th>
                    <th>Name</th>
                    <th>Mobile No.</th>
                    <th>Meeting purpose</th>
                    <th>Image</th>
                    <th>Date </th>
                   
                    <th>Time</th>
                    <th>Duration</th>
                    <th>Details</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                      $sr=1;
                  @endphp
                  @foreach ($NewRecord as $item)
                  <tr>
                      <td>{{ $sr++ }}</td>
                      <td>{{ $item->name }}</td>
                      <td>{{ $item->Mobile }}</td>
                      <td>{{ $item->meeting }}</td>
                      <td><img src="{{ asset('public/'.$item->image) }}" class="rounded-circle" width="32" alt="not found"></td>
                      <td>{{ $item->created_at->format('d-m-Y') }}</td>
                      <td>{{ $item->created_at->format('h:i:s')  }}</td>
                      <td>{{ $item->created_at->diffForHumans(); }}</td>
                      <td><button class="view-details-btn btn btn-danger btn-sm" data-name="{{ $item->name }}" data-mobile="{{ $item->Mobile }}" data-meeting="{{ $item->meeting }}" data-date="{{ $item->created_at->format('d-m-Y') }}" data-time="{{ $item->created_at->format('h:i:s') }}" data-image="{{ asset('public/'.$item->image) }}">View</button></td>
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

 
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
  $(document).ready(function() {
      $('.view-details-btn').on('click', function() {
          var name = $(this).data('name');
          var mobile = $(this).data('mobile');
          var meeting = $(this).data('meeting');
          var image = $(this).data('image');
          var date=$(this).data('date');
          var time=$(this).data('time');
  
          $('#detailsName').val(name);
          $('#detailsMobile').val(mobile);
          $('#detailsMeeting').val(meeting);
          $("#detailsDate").val(date);
          $("#detailsTime").val(time);
          $('#detailsImage').attr('src', image);
  
          $('#registerModal').modal('show');
      });
  });
  </script>
  

  <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registerModalLabel">Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              {{-- <div class="form-group"> --}}
                {{-- <label for="detailsImage">Image</label> --}}
                <div class="form-group text-center">
                  <label for="detailsImage">Image</label>
                  <div>
                      <img id="detailsImage" class="img-fluid mx-auto d-block" src="" style="width: 200px" alt="User Image">
                  </div>
              </div>
                {{-- <img id="detailsImage" class="img-fluid" src="" width="300px" alt="User Image" style="align-content: :center"> --}}
            {{-- </div> --}}
                <div class="form-group">
                    <label for="detailsName">Name</label>
                    <input type="text" id="detailsName" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="detailsMobile">Mobile Number</label>
                    <input type="text" id="detailsMobile" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="detailsMeeting">Meeting Purpose</label>
                    <input type="text" id="detailsMeeting" class="form-control" readonly>
                </div>
                <div class="form-group">
                  <label for="detailsMeeting">Date</label>
                  <input type="text" id="detailsDate" class="form-control" readonly>
              </div>
              <div class="form-group">
                <label for="detailsMeeting">Time</label>
                <input type="text" id="detailsTime" class="form-control" readonly>
            </div>
                
              
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
  </div>
  


















      
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