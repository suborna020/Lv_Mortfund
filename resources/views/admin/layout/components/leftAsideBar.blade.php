<aside class="main-sidebar sidebar-dark-primary  ">

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
                                <img src="{{asset("adminAssets/img/categories.svg")}}" alt="icon" class="treeviewAsideBarIcon " />
                                <p>Categories</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/charts/chartjs.html" class="nav-link">
                                <img src="{{asset("adminAssets/img/recent.svg")}}" alt="icon" class="treeviewAsideBarIcon " />
                                <p>Recent</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/charts/chartjs.html" class="nav-link">
                                <img src="{{asset("adminAssets/img/pendingFunraiser.svg")}}" alt="icon" class="treeviewAsideBarIcon " />
                                <p>Pending</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/charts/chartjs.html" class="nav-link">
                                <img src="{{asset("adminAssets/img/onProgressFundraiser.svg")}}" alt="icon" class="treeviewAsideBarIcon " />
                                <p>On-Progress</p>
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
                                <img src="{{asset("adminAssets/img/withdrawMethods.svg")}}" alt="icon" class="treeviewAsideBarIcon " />
                                <p>Withdraw Methods</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/charts/chartjs.html" class="nav-link">
                                <img src="{{asset("adminAssets/img/withdrawRequests.svg")}}" alt="icon" class="treeviewAsideBarIcon " />
                                <p>Withdraw Requests</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/charts/chartjs.html" class="nav-link">
                                <img src="{{asset("adminAssets/img/withdrowLog.svg")}}" alt="icon" class="treeviewAsideBarIcon " />
                                <p>Withdrow Log</p>
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
                                <img src="{{asset("adminAssets/img/paymentGateways.svg")}}" alt="icon" class="treeviewAsideBarIcon " />
                                <p>Payment Gateways</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/charts/chartjs.html" class="nav-link">
                                <img src="{{asset("adminAssets/img/donateHistory.svg")}}" alt="icon" class="treeviewAsideBarIcon " />
                                <p>Donate History</p>
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
                                <img src="{{asset("adminAssets/img/categories.svg")}}" alt="icon" class="treeviewAsideBarIcon " />
                                <p>Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/charts/chartjs.html" class="nav-link">
                                <img src="{{asset("adminAssets/img/stories.svg")}}" alt="icon" class="treeviewAsideBarIcon " />
                                <p>stories</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <img src="{{asset("adminAssets/img/memberSettings.svg")}}" alt="icon" class="asideBarIcon " />
                        <p>
                            Member Sttings
                            <i class="fa fa-caret-right extend_icon"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/charts/chartjs.html" class="nav-link">
                                <img src="{{asset("adminAssets/img/allMembers.svg")}}" alt="icon" class="treeviewAsideBarIcon " />
                                <p>All Members</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/charts/chartjs.html" class="nav-link">
                                <img src="{{asset("adminAssets/img/reportedMembers.svg")}}" alt="icon" class="treeviewAsideBarIcon " />
                                <p>Reported Members</p>
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
                <li class="nav-item" id="frontEndSettings">
                    <a href="#" class="nav-link">
                        <img src="{{asset("adminAssets/img/frontEndSettings.svg")}}" alt="icon" class="asideBarIcon " />
                        <p>
                            Front End Settings
                            <i class="fa fa-caret-right "></i>
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
                                <img src="{{asset("adminAssets/img/basicSettings.svg")}}" alt="icon" class="treeviewAsideBarIcon " />
                                <p>Basic Settings</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/charts/chartjs.html" class="nav-link">
                                <img src="{{asset("adminAssets/img/emailSettings.svg")}}" alt="icon" class="treeviewAsideBarIcon " />
                                <p>Email Settings</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/charts/chartjs.html" class="nav-link">
                                <img src="{{asset("adminAssets/img/smsSettings.svg")}}" alt="icon" class="treeviewAsideBarIcon " />
                                <p>SMS Settings</p>
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
