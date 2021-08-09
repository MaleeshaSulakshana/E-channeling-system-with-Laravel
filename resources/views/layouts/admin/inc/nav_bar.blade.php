<nav class="navbar navbar-expand-lg navbar-dark bg-default fixed-top" id="mainNav">
    <a class="navbar-brand" href="{{ route('admin.dashboard') }}"><img src="{{ asset('admin/img/logo.png') }}" data-retina="true" alt="" width="163" height="36"></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">

        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">

            @if (Auth::user()->role_id == '1')

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link" href="{{ url('admin/dashboard') }}">
                    <i class="fa fa-fw fa-dashboard"></i>
                    <span class="nav-link-text">Admin Dashboard</span>
                </a>
            </li>

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="My profile">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseUser" data-parent="#exampleAccordion">
                    <i class="fa fa-fw fa fa-user"></i>
                    <span class="nav-link-text">User Management</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseUser">
                    <li>
                        <a href="{{ route('admin.user.index') }}">All User</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.user.create') }}">Create User</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="My profile">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseProfile" data-parent="#exampleAccordion">
                    <i class="fa fa-fw fa fa-stethoscope"></i>
                    <span class="nav-link-text">Doctor Management</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseProfile">
                    <li>
                        <a href="{{ route('admin.doctor.index') }}">All Doctors</a>
                    </li>
                </ul>
                   
            </li>

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="My profile">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseDepartment" data-parent="#exampleAccordion">
                    <i class="fa fa-fw fa fa-user"></i>
                    <span class="nav-link-text">Department Management</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseDepartment">
                    <li>
                        <a href="{{ route('admin.department.index') }}">All Departments</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.department.create') }}">Create Department</a>
                    </li>
                </ul>
            </li>

            @elseif(Auth::user()->role_id == '3')

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link" href="{{ url('doctor/dashboard') }}">
                    <i class="fa fa-fw fa-dashboard"></i>
                    <span class="nav-link-text">Doctor Dashboard</span>
                </a>
            </li>

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link" href="{{ url('doctor/my-appoinments') }}">
                    <i class="fa fa-fw fa-calendar"></i>
                    <span class="nav-link-text">My Appointments</span>
                </a>
            </li>

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link" href="{{ url('doctor/appoinment-settings') }}">
                    <i class="fa fa-fw fa-cog"></i>
                    <span class="nav-link-text">Appointment Settings</span>
                </a>
            </li>

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link" href="{{ url('doctor/my-reviews') }}">
                    <i class="fa fa-fw fa-star"></i>
                    <span class="nav-link-text">Reviews</span>
                </a>
            </li>


            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link" href="{{ url('doctor/my-profile') }}">
                    <i class="fa fa-fw fa-user"></i>
                    <span class="nav-link-text">My Profile</span>
                </a>
            </li>


            @elseif(Auth::user()->role_id == '2')

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link" href="{{ url('patient/dashboard') }}">
                    <i class="fa fa-fw fa-dashboard"></i>
                    <span class="nav-link-text">Patient Dashboard</span>
                </a>
            </li>

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link" href="{{ url('patient/all-doctors') }}">
                    <i class="fa fa-fw fa-stethoscope"></i>
                    <span class="nav-link-text">Search your doctor </span>
                </a>
            </li>

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link" href="{{ url('patient/departments') }}">
                    <i class="fa fa-fw fa-home"></i>
                    <span class="nav-link-text">All departments </span>
                </a>
            </li>

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link" href="{{ url('patient/my-appoinments') }}">
                    <i class="fa fa-fw fa-home"></i>
                    <span class="nav-link-text">My appoinments </span>
                </a>
            </li>

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link" href="{{ url('patient/my-profile') }}">
                    <i class="fa fa-fw fa-user"></i>
                    <span class="nav-link-text">My profile </span>
                </a>
            </li>

            @endif

        </ul>

        <ul class="navbar-nav sidenav-toggler">
            <li class="nav-item">
                <a class="nav-link text-center" id="sidenavToggler">
                    <i class="fa fa-fw fa-angle-left"></i>
                </a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a href="{{ url('/logout') }}" class=" nav-link">
                    <i class="fa fa-fw fa-sign-out"></i>Logout
                </a>
            </li>
        </ul>

    </div>
</nav>
