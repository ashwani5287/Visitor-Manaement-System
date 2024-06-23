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

                <li><a class="nav-link" href="{{ route('Role.CreateRole') }}">Create Role </a></li>
              </ul>
            </li>
            <li class="menu-header">Time System</li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="image"></i><span>Time Duration</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('admin.timeSystem') }}">Set TIme Open or Close </a></li>
              </ul>
            </li>
            <li class="menu-header">IP Section</li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="image"></i><span>Internet IP</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('admin.IPmanage') }}">Manage </a></li>
              </ul>
            </li>
            <li class="menu-header">Login  Details</li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="image"></i><span>Login  Details</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('user.LoginDetails') }}">View </a></li>

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
    
                    <li><a class="nav-link" href="{{ route('Role.CreateRole') }}">Create Role </a></li>
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