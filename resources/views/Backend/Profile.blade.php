
@extends('Backend.master')
@section('bodyContent')

<div class="row mt-sm-4">
    <div class="col-12 col-md-12 col-lg-4">
      <div class="card author-box">
        <div class="card-body">
          <div class="author-box-center">
            <img alt="image" src="{{ asset('public/Profile_image/'.Auth::user()->profile_photo_path) }}" class="rounded-circle author-box-picture">
            <div class="clearfix"></div>
            <div class="author-box-name">
              <a href="#">{{ Auth::user()->name }}</a>
            </div>
            <button type="button" class="btn btn-primary" data-toggle="modal"
                data-target="#exampleModalCenterUpdate" >Change Image</button> 
          </div>
          <div class="text-center">
            <div class="author-box-description">
                <p class="clearfix">
                    <span class="float-left">
                      Name:
                    </span>
                    <span class="float text-muted">
                      {{ Auth::user()->name }}
                    </span>
                  </p>

                  <p class="clearfix">
                    <span class="float-left">
                      Email:
                    </span>
                    <span class="float text-muted">
                      {{ Auth::user()->email }}
                    </span>
                  </p>

            </div>
            {{-- <div class="mb-2 mt-3">
              <div class="text-small font-weight-bold">Follow Hasan On</div>
            </div> --}}
            <a href="#" class="btn btn-social-icon mr-1 btn-facebook">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="btn btn-social-icon mr-1 btn-twitter">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="btn btn-social-icon mr-1 btn-github">
              <i class="fab fa-github"></i>
            </a>
            <a href="#" class="btn btn-social-icon mr-1 btn-instagram">
              <i class="fab fa-instagram"></i>
            </a>
            <div class="w-100 d-sm-none"></div>
          </div>
        </div>
      </div>
      
      
    </div>
    <div class="col-12 col-md-12 col-lg-8">
      <div class="card">
        <div class="padding-20">
          <ul class="nav nav-tabs" id="myTab2" role="tablist">
           
            <li class="nav-item">
              <a class="nav-link active" id="profile-tab2" data-toggle="tab" href="#settings" role="tab" aria-selected="true">Setting</a>
            </li>
          </ul>
          <div class="tab-content tab-bordered" id="myTab3Content">
            
            <div class="tab-pane fade active show" id="settings" role="tabpanel" aria-labelledby="profile-tab2">
              <form method="post" action="{{route('admin.ProfilePasswordUpdate') }}" class="" enctype="multipart/form-data">
                @csrf
                <div class="card-header">
                  <h4>Edit Profile</h4>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="form-group col-md-12 col-12">
                      <input type="hidden" name="userId" value="{{ Auth::user()->id }}">
                      <label> Name</label>
                      <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}">
                      <div class="invalid-feedback">
                        Please fill in the  name
                      </div>
                    </div>

                    <div class="form-group col-md-12 col-12">
                        <label> Old Password</label>
                        <input type="password" class="form-control" name="oldpassword">
                        <div class="invalid-feedback">
                          Please fill in the old  password
                        </div>
                      </div>

                      <div class="form-group col-md-12 col-12">
                        <label> New Password</label>
                        <input type="password" class="form-control" name="newpassword">
                        <div class="invalid-feedback">
                          Please fill in the new  password
                        </div>
                      </div>

                   
                  </div>
                  
                 
                </div>
                <div class="card-footer text-right">
                  <button class="btn btn-primary">Save Changes</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



  <!--Update Profile Image-->
  


    <div class="modal fade" id="exampleModalCenterUpdate" tabindex="-1" role="dialog"
      aria-labelledby="exampleModalCenterTitle" aria-hidden="false" style="" >
      <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Update  Profile Image</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('admin.ProfileImageUpdate') }}" method="post" enctype="multipart/form-data">
            @csrf
        <div class="modal-body">
         <label for="">Select Image</label>
         <input type="hidden" name="profile_id" value="{{ Auth::user()->id }}">
         <input type="file" name="image" class="form-control" placeholder="" autofocus>
        </div>
        <div class="modal-footer bg-whitesmoke br">
          <button type="submit" class="btn btn-primary">Update</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </form>
      </div>
      </div>
      </div>
 
      
  @endsection