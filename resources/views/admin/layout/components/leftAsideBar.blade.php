<aside class="main-sidebar sidebar-dark-primary ">
    <!-- Brand Logo -->
    <span class="brand-link  d-flex">
        <span id="sidebarCollapse" role="button"><i class="fas fa-bars mx-3"></i></span>
        {{-- <span class="brand-text font-weight-light">AdminLTE 3</span> --}}
        <img src="{{asset("adminAssets/img/dashboardLogo.svg")}}" alt="LOGO" class=" loginLogo" id="" />
    </span>

    <!-- Sidebar -->
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item ">
                    <a href="{{ url('aDashboard')}}" class="nav-link ">

                        <img src="{{asset("adminAssets/img/dashboard.svg")}}" alt="icon" class="asideBarIcon " />
                        <p>
                            Admin Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <img src="{{asset("adminAssets/img/fundraisers.svg")}}" alt="icon" class="asideBarIcon " />
                        <p>
                            Fundraisers
                            <i class="fa fa-caret-right extend_icon"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/charts/chartjs.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ChartJS</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <img src="{{asset("adminAssets/img/withdraw.svg")}}" alt="icon" class="asideBarIcon " />
                        <p>
                            Withdraw System
                            <i class="fa fa-caret-right extend_icon"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/charts/chartjs.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ChartJS</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <img src="{{asset("adminAssets/img/donate.svg")}}" alt="icon" class="asideBarIcon " />
                        <p>
                            Donate
                            <i class="fa fa-caret-right extend_icon"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/charts/chartjs.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ChartJS</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <img src="{{asset("adminAssets/img/successStories.svg")}}" alt="icon" class="asideBarIcon " />
                        <p>
                            Success Stories
                            <i class="fa fa-caret-right extend_icon"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/charts/chartjs.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ChartJS</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <img src="{{asset("adminAssets/img/memberSttings.svg")}}" alt="icon" class="asideBarIcon " />
                        <p>
                            Member Sttings
                            <i class="fa fa-caret-right extend_icon"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/charts/chartjs.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ChartJS</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <img src="{{asset("adminAssets/img/language.svg")}}" alt="icon" class="asideBarIcon " />
                        <p>
                            Language Manager
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <img src="{{asset("adminAssets/img/advertisement.svg")}}" alt="icon" class="asideBarIcon " />
                        <p>
                            Advertisement
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <img src="{{asset("adminAssets/img/frontEndSettings.svg")}}" alt="icon" class="asideBarIcon " />
                        <p>
                            Front End Settings
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <img src="{{asset("adminAssets/img/generalSettings.svg")}}" alt="icon" class="asideBarIcon " />
                        <p>
                            General Settings
                            <i class="fa fa-caret-right extend_icon"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/charts/chartjs.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ChartJS</p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>