@extends('admin.layout.app')
@section('content')
<div class="wrapper">

    <!-- Navbar -->
    @include('admin.layout.components.aHeader')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('admin.layout.components.leftAsideBar')
    @include('admin.layout.components.frontEndSettingsSideBar')

    <!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid mt-4 adminDashboardContainer rightContainer" style="position: relative">
                {{-- position relative needed for cursour position  --}}
                <!-- Small boxes (Stat box) -->
                <i class="fas fa-angle-right carouselIcon " style="display: none"></i>

                <div class="row  adminDashboard" id="adminDashboard">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="pipeLine"></div>
                        <div class="small-box">
                            <div class="inner">
                                <div class=" smallBoxSpace">
                                    <img src="{{asset("adminAssets/img/fundraiserCategory.svg")}}" alt="icon" class=" smallBoxIcon" />
                                </div>
                                <p>Fundraiser Category</p>
                                <h3>{{(count($CategoriesBox))?? '0' }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="pipeLine"></div>
                        <div class="small-box">
                            <div class="inner">
                                <div class=" smallBoxSpace">
                                    <img src="{{asset("adminAssets/img/pendingFunraiser.svg")}}" alt="icon" class=" smallBoxIcon" style="width: 32px;" />
                                </div>
                                <p>Pending Funraiser</p>
                                <h3>
                                    {{ count($FundraisersBox->where('status', 0))?? '0'}}

                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="pipeLine"></div>
                        <div class="small-box">
                            <div class="inner">
                                <div class=" smallBoxSpace">
                                    <img src="{{asset("adminAssets/img/onProgressFundraiser.svg")}}" alt="icon" class=" smallBoxIcon" />
                                </div>
                                <p>On-Progress Fundraiser</p>
                                <h3>00</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="pipeLine"></div>
                        <div class="small-box">
                            <div class="inner">
                                <div class=" smallBoxSpace">
                                    <img src="{{asset("adminAssets/img/completedFundraiser.svg")}}" alt="icon" class=" smallBoxIcon" />
                                </div>
                                <p>Completed Fundraiser</p>
                                <h3>{{(count($completedFundraiser))?? '0' }}</h3>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="pipeLine"></div>
                        <div class="small-box">
                            <div class="inner">
                                <div class=" smallBoxSpace">
                                    <img src="{{asset("adminAssets/img/withdrowRequest.svg")}}" alt="icon" class=" smallBoxIcon" />
                                </div>
                                <p>Withdrow Request</p>
                                <h3>{{(count($WithdrawRequestsBox))?? '0' }} </h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="pipeLine"></div>
                        <div class="small-box">
                            <div class="inner">
                                <div class=" smallBoxSpace">
                                    <img src="{{asset("adminAssets/img/withdrowLog.svg")}}" alt="icon" class=" smallBoxIcon" />
                                </div>
                                <p>Withdrow Log</p>
                                <h3>00</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="pipeLine"></div>
                        <div class="small-box">
                            <div class="inner">
                                <div class=" smallBoxSpace">
                                    <img src="{{asset("adminAssets/img/successStoriesBigIcon.svg")}}" alt="icon" class=" smallBoxIcon" style="width: 32px;" />
                                </div>
                                <p>Success Stories </p>
                                <h3>{{count($successStoriesBox)?? '0' }}</h3>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- /.row -->
                <!-- Main row -->
                <div class="row my-1">
                    <!-- Left col -->
                    <section class="col-md-12 my-0">
                        <!-- Custom tabs (Charts with tabs)-->
                        <div class="card card-info my-0">
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="lineChart" style="min-height: 50px;  max-width: 100%;"></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <br>admin session no :{{($admin_sessionData)?? '0' }}

                        user name :  {{($userInfoBox->admin_name)?? '0' }}
                        <br>
                        test:
                        @foreach($completedFundraiser as $completedFundraiser)

                        {{-- {{ ($FundraisersBox->status)==1}} --}}
                        {{-- {{$FundraisersBox}}<br> --}}
                        @endforeach

                        <!-- /.card -->
                    </section>
                    <br>
                    <br>

                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>

@endsection
