<div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="" >
            <a href="{{ route('admin.Dashboard') }}"> <img alt="image" src="{{ asset('default_image/MDHP_logo.jpg')}}" style="width: 200px;padding:10px" class="header-logo" /> <span
                class="logo-name"></span>
            </a>
          </div>

          
          <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown {{ Request::RouteIs('admin.Dashboard') ? 'active' : '' }} ">
              <a href="{{ route('admin.Dashboard') }}" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
          @role('SuperAdmin')
          {{-- <li class="menu-header">Student  Section</li> --}}



          {{-- <li class="menu-header">Visitor</li> --}}
          <li class="dropdown">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="user"></i><span>Visitor</span></a>
            <ul class="dropdown-menu">
              {{-- <li ><a class="nav-link" href="{{ route('admin.Meeting') }}">Manage </a></li> --}}
              <li class=" {{ Request::RouteIs('admin.NewRegister') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.NewRegister') }}"><i data-feather="users"></i><span>New Visitor</span></a></li>
              <li class=" {{ Request::RouteIs('admin.PreRegister') ? 'active' : '' }}"><a class="nav-link active" href="{{ route('admin.PreRegister') }}"><i data-feather="users"></i><span>Pre-Visitor</span></a></li>

            </ul>
          </li>


          
          <li class="menu-header">Student  Section</li>
          <li class="dropdown  {{ Request::RouteIs('student.StudentDetails') ? 'active' : '' }}">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="users"></i><span>Manage Student</span></a>
            <ul class="dropdown-menu">
              <li ><a class="nav-link" href="{{ route('student.StudentDetails') }}">Add Student </a></li>
              <li class=" {{ Request::RouteIs('verification.SendOTPAllStudent') ? 'active' : '' }}"><a class="nav-link text-danger" href="{{ route('verification.SendOTPAllStudent') }}" onclick="return confirm('Please Confirm OTP SEND Yes/No')"><i data-feather="file"></i><span>Send All Student OTP</span></a></li>

              <li class=" {{ Request::RouteIs('verification.StudentSendOtpDetails') ? 'active' : '' }}"><a class="nav-link" href="{{ route('verification.StudentSendOtpDetails') }}"><i data-feather="file"></i><span>Student OTP Details</span></a></li>
              <li class=" {{ Request::RouteIs('verification.StudentSendOtpVerifyed') ? 'active' : '' }}"><a class="nav-link" href="{{ route('verification.StudentSendOtpVerifyed') }}"><i data-feather="file"></i><span>Verify OTP Details</span></a></li>

             
            </ul>
          </li>


          {{-- <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="image"></i><span>Visitor</span></a>
          <li class="dropdown">

          <ul class="dropdown-menu">
            <li class=" {{ Request::RouteIs('admin.NewRegister') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.NewRegister') }}"><i data-feather="file"></i><span>New Visitor</span></a></li>
            <li class=" {{ Request::RouteIs('admin.PreRegister') ? 'active' : '' }}"><a class="nav-link active" href="{{ route('admin.PreRegister') }}"><i data-feather="file"></i><span>Pre-Visitor</span></a></li>
          </li>
          </ul> --}}


           <li class="menu-header"> Driver  Section</li>
           <li class="dropdown  {{ Request::RouteIs('school.driver') ? 'active' : '' }}">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="truck"></i><span>Driver And Student </span></a>
            <ul class="dropdown-menu">
              <li ><a  href="{{ route('Driver.SendOTP') }}" class="nav-link text-danger" onclick="return confirm('Please Confirm OTP SEND Yes/No')" href="{{ route('school.SendOTPAllDriver') }}">Send OTP All Driver </a></li>

              <li ><a class="nav-link" href="{{ route('school.driver') }}">Add Driver </a></li>
              <li ><a class="nav-link" href="{{ route('school.student') }}">Add Student </a></li>
              <li ><a  href="{{ route('Driver.SendOTPDetails') }}" class="nav-link "  href="{{ route('Driver.SendOTPDetails') }}">Sent OTP Details</a></li>
              <li ><a  href="{{ route('Driver.SendOTPVerifiy') }}" class="nav-link "  href="{{ route('Driver.SendOTPVerifiy') }}">OTP verifying Details</a></li>

              {{-- <li ><a class="nav-link" href="{{ route('school.student') }}">Add Student </a></li> --}}

              {{-- <li class=" {{ Request::RouteIs('verification.SendOTPAllStudent') ? 'active' : '' }}"><a class="nav-link" href="{{ route('verification.SendOTPAllStudent') }}"><i data-feather="file"></i><span>Send All Student OTP</span></a></li>

              <li class=" {{ Request::RouteIs('verification.StudentSendOtpDetails') ? 'active' : '' }}"><a class="nav-link" href="{{ route('verification.StudentSendOtpDetails') }}"><i data-feather="file"></i><span>Student OTP Details</span></a></li>
              <li class=" {{ Request::RouteIs('verification.StudentSendOtpVerifyed') ? 'active' : '' }}"><a class="nav-link" href="{{ route('verification.StudentSendOtpVerifyed') }}"><i data-feather="file"></i><span>Verify OTP Details</span></a></li> --}}

             
            </ul>
          </li>
           
           
            <li class="menu-header ">Category Master</li>
            <li class="dropdown  {{ Request::RouteIs('admin.Meeting') ? 'active' : '' }}">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="users"></i><span>Meeting Category</span></a>
              <ul class="dropdown-menu">
                <li ><a class="nav-link" href="{{ route('admin.Meeting') }}">Manage </a></li>
              </ul>
            </li>
         



               








{{-- 
            <li class="menu-header">Driver And Student</li>
              <a href="{{ route('school.driver') }}" class="menu-toggle nav-link has-dropdown"><i data-feather="image"></i><span>Manage Driver</span></a>
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="image"></i><span>Manage Student</span></a>

              --}}

            <li class="menu-header">Role Master</li>
            <li class="dropdown ">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="edit"></i><span>Role and Permission</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('Role.AssignRole') }}">Assign Role </a></li>

                {{-- <li><a class="nav-link" href="{{ route('Role.CreateRole') }}">Create Role </a></li> --}}
              </ul>
            </li>
            <li class="menu-header">Time System</li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="image"></i><span>Manage School Time</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('admin.timeSystem') }}">Set Time Open or Close </a></li>
              </ul>
            </li>
            <li class="menu-header">IP Section</li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="image"></i><span>Internet IP</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('admin.IPmanage') }}">Manage </a></li>
              </ul>
            </li>
            {{-- <li class="menu-header">Login  Details</li> --}}
            <li class="dropdown">
              {{-- <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="image"></i><span>Login  Details</span></a> --}}
              <ul class="dropdown-menu">
                {{-- <li><a class="nav-link" href="{{ route('user.LoginDetails') }}">View </a></li> --}}

                @endrole


                @role('Admin')
                <li class=" {{ Request::RouteIs('admin.NewRegister') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.NewRegister') }}"><i data-feather="file"></i><span>New Registration</span></a></li>
                <li class=" {{ Request::RouteIs('admin.PreRegister') ? 'active' : '' }}"><a class="nav-link active" href="{{ route('admin.PreRegister') }}"><i data-feather="file"></i><span>Pre-Registration</span></a></li>
                <li class="menu-header">Category Master</li>
                <li class="dropdown  {{ Request::RouteIs('admin.Meeting') ? 'active' : '' }}">
                  <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="image"></i><span>Meeting Category</span></a>
                  <ul class="dropdown-menu">
                    <li ><a class="nav-link" href="{{ route('admin.Meeting') }}">Manage </a></li>
                  </ul>
                </li>


                


                <li class="menu-header">Role Master</li>
                <li class="dropdown ">
                  <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="image"></i><span>Role and Permission</span></a>
                  <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('Role.AssignRole') }}">Assign Role </a></li>
    
                    {{-- <li><a class="nav-link" href="{{ route('Role.CreateRole') }}">Create Role </a></li> --}}
                  </ul>
                </li>


                @endrole

                @role('User')
                <li class=" {{ Request::RouteIs('admin.NewRegister') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.NewRegister') }}"><i data-feather="file"></i><span>New Registration</span></a></li>
                <li class=" {{ Request::RouteIs('admin.PreRegister') ? 'active' : '' }}"><a class="nav-link active" href="{{ route('admin.PreRegister') }}"><i data-feather="file"></i><span>Pre-Registration</span></a></li>
              
               


                @endrole



              </ul>
            </li>

           
          </ul>


        


         
          


        </aside>
      </div>