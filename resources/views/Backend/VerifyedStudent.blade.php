
@extends('Backend.master')
@section('bodyContent')
<div class="section-body">
  <div class="row">
      <div class="col-12 col-md-12 col-lg-12">
          <div class="card">
              <div class="card-header">
                  <div class="card-body">
                      <h4>Student OTP Verified Details</h4>
                  </div>
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
                                  <th>Class</th>
                                  <th>Section</th>
                                  <th>Purpose</th>
                                  <th>Image</th>
                                  <th>View</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach ($StudentOTPVerified as $index => $item)
                              <tr>
                                  <td>{{ $index + 1 }}</td>
                                  <td>{{ $item->name }}</td>
                                  <td>{{ $item->Father }}</td>
                                  <td>{{ $item->Mobile }}</td>
                                  <td>{{ $item->class }}</td>
                                  <td>{{ $item->section }}</td>
                                  <td>{{ $item->meeting }}</td>
                                  <td><img src="{{ asset($item->image) }}" class="rounded-circle" width="32" alt="not found"></td>
                                  <td>
                                      <button class="view-details-btn btn btn-danger btn-sm"
                                          data-name="{{ $item->name }}"
                                          data-father="{{ $item->Father }}"
                                          data-mobile="{{ $item->Mobile }}"
                                          data-class="{{ $item->class }}"
                                          data-section="{{ $item->section }}"
                                          data-meeting="{{ $item->meeting }}"
                                          data-otp="{{ $item->OTP }}"
                                          data-image="{{ asset($item->image) }}"
                                          data-created-at="{{ $item->created_at->format('d-m-Y h:i:s') }}" data-toggle="modal"
                                          data-target="#verifyOTPDetails">
                                          View
                                      </button>
                                  </td>
                              </tr>
                              @endforeach
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
      </div>

      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script>
          $(document).ready(function () {
              $('.view-details-btn').on('click', function () {
                  var name = $(this).data('name');
                  var father = $(this).data('father');
                  var mobile = $(this).data('mobile');
                  var class_ = $(this).data('class');
                  var section = $(this).data('section');
                  var meeting = $(this).data('meeting');
                  var otp = $(this).data('otp');
                  var image = $(this).data('image');
                  var createdAt = $(this).data('created-at');

                  $('#detailsName').val(name);
                  $('#detailsFather').val(father);
                  $('#detailsMobile').val(mobile);
                  $('#detailsClass').val(class_);
                  $('#detailsSection').val(section);
                  $('#detailsMeeting').val(meeting);
                  $('#detailsOTP').val(otp);
                  $('#detailsImage').attr('src', image);
                  $('#detailsCreatedAt').val(createdAt);

                  $('#verifyOTPDetails').modal('show');
              });
          });

      </script>

      <div class="modal fade" id="verifyOTPDetails" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="registerModalLabel">Details</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <div class="form-group text-center">
                          <label for="detailsImage">Image</label>
                          <div>
                              <img id="detailsImage" class="img-fluid mx-auto d-block" src="" style="width: 200px"
                                  alt="User Image">
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="detailsName">Name</label>
                          <input id="detailsName" class="form-control" readonly>
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
                          <label for="detailsDate">Date</label>
                          <input type="text" id="detailsDate" class="form-control" readonly>
                      </div>

                      <div class="form-group">
                          <label for="detailsTime">Time</label>
                          <input type="text" id="detailsTime" class="form-control" readonly>
                      </div>

                      <div class="form-group">
                          <label for="detailsClass">Class</label>
                          <input type="text" id="detailsClass" class="form-control" readonly>
                      </div>

                      <div class="form-group">
                          <label for="detailsSection">Section</label>
                          <input type="text" id="detailsSection" class="form-control" readonly>
                      </div>

                      <div class="form-group">
                          <label for="detailsOTP">OTP</label>
                          <input type="text" id="detailsOTP" class="form-control" readonly>
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>

  @endsection