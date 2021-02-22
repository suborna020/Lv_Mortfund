<nav class="main-header navbar navbar-expand navbar-white navbar-light  myShadow">
    <!-- Left navbar links -->
    <ul class="navbar-nav m-auto">
        {{-- <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li> --}}
        <li class="nav-item d-none d-sm-inline-block ">
            <a class="d-block nav-link navHead">Admin Dashboard</a>

        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <img src="{{asset("adminAssets/img/logout.svg")}}" alt="icon" class="smallIcon" id="" />

        <a href="{{ url('aLogout')}}" class="orange_text">Logout</a>

    </ul>
</nav>