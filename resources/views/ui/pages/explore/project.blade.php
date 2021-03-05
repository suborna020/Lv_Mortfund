@extends('ui.layout.app')

@section('content')
   
    </section>

    <section class="breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h4>New Campaigns</h4>
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <i class="fa fa-home fa-2x home-icon" aria-hidden="true"></i>
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li><i class="fa fa-angle-right fa-1x angle" aria-hidden="true"></i></li>
                        <li class="breadcrumb-item active" aria-current="page">Explore</li>
                        <li><i class="fa fa-angle-right fa-1x angle" aria-hidden="true"></i></li>
                        <li class="breadcrumb-item active" aria-current="page">Project</li>
                    </ol>
                </nav>

            </div>
        </div>
    </section> 

     <!-- campaign section Started -->
    
    <div class="featured">
        <div class="container adjust-container">
            <div class="row no-gutters">
                <div class="col-md-12">
                    <h3>New Campaigns</h3>
                    <hr>
                    <h6>Recent Campaigns</h6>
                    <div class="row">
                        <div class="col-md-6 col-xl-3">
                            <div class="card">
                                <img src="images/featured1.svg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <ul>
                                        <li><i class="fa fa-graduation-cap" aria-hidden="true"></i></i> Education</li>
                                    </ul>
                                    <h5 class="card-title">Elementary School Fund</h5>
                                    <p class="card-text">Lorem ipsum dolor sit amet consectetur Veniam inventore fugit ex
                                        veritatis molestiae.</p>
                                    <div class="progress" style="height:8px;">
                                        <div class="progress-bar bg-success role=" progressbar" style="width: 25%;"
                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><span
                                                class="precentage-lebel">25%</span></div>
                                    </div>
                                    <p class="custom-card-text"><span class="text-muted">$55,000</span> rised of $100,000
                                    </p>
                                    <div class="row border-top">
                                        <div class="col-8 col-md-8 col-gap">
                                            <div class="media">
                                                <img src="images/user1.svg" class="mr-2 user-img" alt="...">
                                                <div class="media-body">
                                                    <p class="name-text">By Ophiluous Kenth</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 col-md-4 col-gap">
                                            <div class="calender">
                                                <ul>
                                                    <li><i class="fa fa-calendar" aria-hidden="true"></i> No Deadline</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="card">
                                <img src="images/featured2.svg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <ul>
                                        <li><i class="fa fa-medkit" aria-hidden="true"></i></i> Medical</li>
                                    </ul>
                                    <h5 class="card-title">Save 3 year old Kevin</h5>
                                    <p class="card-text">Lorem ipsum dolor sit amet consectetur Veniam inventore fugit ex
                                        veritatis molestiae.
                                    </p>
                                    <div class="progress" style="height:8px;">
                                        <div class="progress-bar bg-success role=" progressbar" style="width: 25%;"
                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><span
                                                class="precentage-lebel">25%</span></div>
                                    </div>
                                    <p class="custom-card-text"><span class="text-muted">$55,000</span> rised of $100,000
                                    </p>
                                    <div class="row border-top">
                                        <div class="col-8 col-md-8 col-gap">
                                            <div class="media">
                                                <img src="images/user2.svg" class="mr-2 user-img" alt="...">
                                                <div class="media-body">
                                                    <p class="name-text">By Gavin Degenres</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 col-md-4 col-gap">
                                            <div class="calender">
                                                <ul>
                                                    <li><i class="fa fa-calendar" aria-hidden="true"></i> 1 Jan, 2021</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="card">
                                <img src="images/featured3.svg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <ul>
                                        <li><i class="fa fa-graduation-cap" aria-hidden="true"></i></i> Education</li>
                                    </ul>
                                    <h5 class="card-title">Elementary School Fund</h5>
                                    <p class="card-text">Lorem ipsum dolor sit amet consectetur Veniam inventore fugit ex
                                        veritatis molestiae.
                                    </p>
                                    <div class="progress" style="height:8px;">
                                        <div class="progress-bar bg-success role=" progressbar" style="width: 25%;"
                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><span
                                                class="precentage-lebel">25%</span></div>
                                    </div>
                                    <p class="custom-card-text"><span class="text-muted">$55,000</span> rised of $100,000
                                    </p>
                                    <div class="row border-top">
                                        <div class="col-8 col-md-8 col-gap">
                                            <div class="media">
                                                <img src="images/user3.svg" class="mr-2 user-img" alt="...">
                                                <div class="media-body">
                                                    <p class="name-text">By Ophiluous Kenth</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 col-md-4 col-gap">
                                            <div class="calender">
                                                <ul>
                                                    <li><i class="fa fa-calendar" aria-hidden="true"></i> No Deadline</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="card">
                                <img src="images/featured4.svg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <ul>
                                        <li><i class="fa fa-graduation-cap" aria-hidden="true"></i></i> Education</li>
                                    </ul>
                                    <h5 class="card-title">Elementary School Fund</h5>
                                    <p class="card-text">Lorem ipsum dolor sit amet consectetur Veniam inventore fugit ex
                                        veritatis molestiae.
                                    </p>
                                    <div class="progress" style="height:8px;">
                                        <div class="progress-bar bg-success role=" progressbar" style="width: 25%;"
                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><span
                                                class="precentage-lebel">25%</span></div>
                                    </div>
                                    <p class="custom-card-text"><span class="text-muted">$55,000</span> rised of $100,000
                                    </p>
                                    <div class="row border-top">
                                        <div class="col-8 col-md-8 col-gap">
                                            <div class="media">
                                                <img src="images/user4.svg" class="mr-2 user-img" alt="...">
                                                <div class="media-body">
                                                    <p class="name-text">By Ophiluous Kenth</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 col-md-4 col-gap">
                                            <div class="calender">
                                                <ul>
                                                    <li><i class="fa fa-calendar" aria-hidden="true"></i> No Deadline</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="card">
                                <img src="images/featured1.svg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <ul>
                                        <li><i class="fa fa-graduation-cap" aria-hidden="true"></i></i> Education</li>
                                    </ul>
                                    <h5 class="card-title">Elementary School Fund</h5>
                                    <p class="card-text">Lorem ipsum dolor sit amet consectetur Veniam inventore fugit ex
                                        veritatis molestiae.</p>
                                    <div class="progress" style="height:8px;">
                                        <div class="progress-bar bg-success role=" progressbar" style="width: 25%;"
                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><span
                                                class="precentage-lebel">25%</span></div>
                                    </div>
                                    <p class="custom-card-text"><span class="text-muted">$55,000</span> rised of $100,000
                                    </p>
                                    <div class="row border-top">
                                        <div class="col-8 col-md-8 col-gap">
                                            <div class="media">
                                                <img src="images/user1.svg" class="mr-2 user-img" alt="...">
                                                <div class="media-body">
                                                    <p class="name-text">By Ophiluous Kenth</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 col-md-4 col-gap">
                                            <div class="calender">
                                                <ul>
                                                    <li><i class="fa fa-calendar" aria-hidden="true"></i> No Deadline</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="card">
                                <img src="images/featured2.svg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <ul>
                                        <li><i class="fa fa-medkit" aria-hidden="true"></i></i> Medical</li>
                                    </ul>
                                    <h5 class="card-title">Save 3 year old Kevin</h5>
                                    <p class="card-text">Lorem ipsum dolor sit amet consectetur Veniam inventore fugit ex
                                        veritatis molestiae.
                                    </p>
                                    <div class="progress" style="height:8px;">
                                        <div class="progress-bar bg-success role=" progressbar" style="width: 25%;"
                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><span
                                                class="precentage-lebel">25%</span></div>
                                    </div>
                                    <p class="custom-card-text"><span class="text-muted">$55,000</span> rised of $100,000
                                    </p>
                                    <div class="row border-top">
                                        <div class="col-8 col-md-8 col-gap">
                                            <div class="media">
                                                <img src="images/user2.svg" class="mr-2 user-img" alt="...">
                                                <div class="media-body">
                                                    <p class="name-text">By Gavin Degenres</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 col-md-4 col-gap">
                                            <div class="calender">
                                                <ul>
                                                    <li><i class="fa fa-calendar" aria-hidden="true"></i> 1 Jan, 2021</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="card">
                                <img src="images/featured3.svg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <ul>
                                        <li><i class="fa fa-graduation-cap" aria-hidden="true"></i></i> Education</li>
                                    </ul>
                                    <h5 class="card-title">Elementary School Fund</h5>
                                    <p class="card-text">Lorem ipsum dolor sit amet consectetur Veniam inventore fugit ex
                                        veritatis molestiae.
                                    </p>
                                    <div class="progress" style="height:8px;">
                                        <div class="progress-bar bg-success role=" progressbar" style="width: 25%;"
                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><span
                                                class="precentage-lebel">25%</span></div>
                                    </div>
                                    <p class="custom-card-text"><span class="text-muted">$55,000</span> rised of $100,000
                                    </p>
                                    <div class="row border-top">
                                        <div class="col-8 col-md-8 col-gap">
                                            <div class="media">
                                                <img src="images/user3.svg" class="mr-2 user-img" alt="...">
                                                <div class="media-body">
                                                    <p class="name-text">By Ophiluous Kenth</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 col-md-4 col-gap">
                                            <div class="calender">
                                                <ul>
                                                    <li><i class="fa fa-calendar" aria-hidden="true"></i> No Deadline</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="card">
                                <img src="images/featured4.svg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <ul>
                                        <li><i class="fa fa-graduation-cap" aria-hidden="true"></i></i> Education</li>
                                    </ul>
                                    <h5 class="card-title">Elementary School Fund</h5>
                                    <p class="card-text">Lorem ipsum dolor sit amet consectetur Veniam inventore fugit ex
                                        veritatis molestiae.
                                    </p>
                                    <div class="progress" style="height:8px;">
                                        <div class="progress-bar bg-success role=" progressbar" style="width: 25%;"
                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><span
                                                class="precentage-lebel">25%</span></div>
                                    </div>
                                    <p class="custom-card-text"><span class="text-muted">$55,000</span> rised of $100,000
                                    </p>
                                    <div class="row border-top">
                                        <div class="col-8 col-md-8 col-gap">
                                            <div class="media">
                                                <img src="images/user4.svg" class="mr-2 user-img" alt="...">
                                                <div class="media-body">
                                                    <p class="name-text">By Ophiluous Kenth</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 col-md-4 col-gap">
                                            <div class="calender">
                                                <ul>
                                                    <li><i class="fa fa-calendar" aria-hidden="true"></i> No Deadline</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <!-- Pagination Started -->
    
                    <nav aria-label="Page navigation example" class="page-div">
                        <ul class="pagination justify-content-center">
                            <li class="page-item page-number">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <li class="page-item page-number active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item page-number"><a class="page-link" href="#">2</a></li>
                            <li class="page-item page-number"><a class="page-link" href="#">3</a></li>
                            <li class="page-item page-number"><a class="page-link" href="#">4</a></li>
                            <li class="page-item page-number"><a class="page-link" href="#">...</a></li>
                            <li class="page-item page-number">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
    
                    <!-- Pagination End -->
    
                </div>
            </div>
        </div>
    </div>
    
    <!-- Campaign section End -->


    <!-- Medical Fundraisers Started -->
    
    <section class="featured donor">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12">
                    <h3>Medical Fundraisers</h3>
                    <hr>
                    <br>
                    <div class="owl-carousel owl-theme newCampaign">
                        <div class="item">
                            <div class="card">
                                <img src="images/featured6.svg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <ul>
                                    <li><i class="fa fa-medkit" aria-hidden="true"></i></i> Medical</li>
                                    </ul>
                                    <h5 class="card-title">Save Jenne From Cancer</h5>
                                    <p class="card-text">Lorem ipsum dolor sit amet consectetur Veniam inventore fugit ex
                                        veritatis molestiae.</p>
                                    <div class="progress" style="height:8px;">
                                        <div class="progress-bar bg-success role=" progressbar" style="width: 25%;" aria-valuenow="25"
                                            aria-valuemin="0" aria-valuemax="100"><span class="precentage-lebel">25%</span></div>
                                    </div>
                                    <p class="custom-card-text"><span class="text-muted">$55,000</span> rised of $100,000
                                    </p>
                                    <div class="row border-top">
                                        <div class="col-8 col-md-8 col-gap">
                                            <div class="media">
                                                <img src="images/user1.svg" class="mr-2 user-img" alt="...">
                                                <div class="media-body">
                                                    <p class="name-text">By Ophiluous Kenth</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 col-md-4 col-gap">
                                            <div class="calender">
                                                <ul>
                                                    <li><i class="fa fa-calendar" aria-hidden="true"></i> No Deadline</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card">
                                <img src="images/featured2.svg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <ul>
                                        <li><i class="fa fa-medkit" aria-hidden="true"></i></i> Medical</li>
                                    </ul>
                                    <h5 class="card-title">Save 3 year old Kevin</h5>
                                    <p class="card-text">Lorem ipsum dolor sit amet consectetur Veniam inventore fugit ex veritatis molestiae.
                                    </p>
                                    <div class="progress" style="height:8px;">
                                        <div class="progress-bar bg-success role=" progressbar" style="width: 25%;" aria-valuenow="25"
                                            aria-valuemin="0" aria-valuemax="100"><span class="precentage-lebel">25%</span></div>
                                    </div>
                                    <p class="custom-card-text"><span class="text-muted">$55,000</span> rised of $100,000</p>
                                    <div class="row border-top">
                                        <div class="col-8 col-md-8 col-gap">
                                            <div class="media">
                                                <img src="images/user2.svg" class="mr-2 user-img" alt="...">
                                                <div class="media-body">
                                                    <p class="name-text">By Gavin Degenres</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 col-md-4 col-gap">
                                            <div class="calender">
                                                <ul>
                                                    <li><i class="fa fa-calendar" aria-hidden="true"></i> 1 Jan, 2021</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card">
                                <img src="images/featured9.svg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <ul>
                                        <li><i class="fa fa-medkit" aria-hidden="true"></i></i> Medical</li>
                                    </ul>
                                    <h5 class="card-title">Lack Of Medical Equipments</h5>
                                    <p class="card-text">Lorem ipsum dolor sit amet consectetur Veniam inventore fugit ex veritatis molestiae.
                                    </p>
                                    <div class="progress" style="height:8px;">
                                        <div class="progress-bar bg-success role=" progressbar" style="width: 25%;" aria-valuenow="25"
                                            aria-valuemin="0" aria-valuemax="100"><span class="precentage-lebel">25%</span></div>
                                    </div>
                                    <p class="custom-card-text"><span class="text-muted">$55,000</span> rised of $100,000</p>
                                    <div class="row border-top">
                                        <div class="col-8 col-md-8 col-gap">
                                            <div class="media">
                                                <img src="images/user3.svg" class="mr-2 user-img" alt="...">
                                                <div class="media-body">
                                                    <p class="name-text">By Ophiluous Kenth</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 col-md-4 col-gap">
                                            <div class="calender">
                                                <ul>
                                                    <li><i class="fa fa-calendar" aria-hidden="true"></i> No Deadline</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card">
                                <img src="images/featured4.svg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <ul>
                                        <li><i class="fa fa-medkit" aria-hidden="true"></i></i> Medical</li>
                                    </ul>
                                    <h5 class="card-title">Las Vogas Shooting Victims</h5>
                                    <p class="card-text">Lorem ipsum dolor sit amet consectetur Veniam inventore fugit ex veritatis molestiae.
                                    </p>
                                    <div class="progress" style="height:8px;">
                                        <div class="progress-bar bg-success role=" progressbar" style="width: 25%;" aria-valuenow="25"
                                            aria-valuemin="0" aria-valuemax="100"><span class="precentage-lebel">25%</span></div>
                                    </div>
                                    <p class="custom-card-text"><span class="text-muted">$55,000</span> rised of $100,000</p>
                                    <div class="row border-top">
                                        <div class="col-8 col-md-8 col-gap">
                                            <div class="media">
                                                <img src="images/user4.svg" class="mr-2 user-img" alt="...">
                                                <div class="media-body">
                                                    <p class="name-text">By Ophiluous Kenth</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 col-md-4 col-gap">
                                            <div class="calender">
                                                <ul>
                                                    <li><i class="fa fa-calendar" aria-hidden="true"></i> No Deadline</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                        <div class="card">
                            <img src="images/featured2.svg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <ul>
                                    <li><i class="fa fa-medkit" aria-hidden="true"></i></i> Medical</li>
                                </ul>
                                <h5 class="card-title">Save 3 year old Kevin</h5>
                                <p class="card-text">Lorem ipsum dolor sit amet consectetur Veniam inventore fugit ex veritatis molestiae.
                                </p>
                                <div class="progress" style="height:8px;">
                                    <div class="progress-bar bg-success role=" progressbar" style="width: 25%;" aria-valuenow="25"
                                        aria-valuemin="0" aria-valuemax="100"><span class="precentage-lebel">25%</span></div>
                                </div>
                                <p class="custom-card-text"><span class="text-muted">$55,000</span> rised of $100,000</p>
                                <div class="row border-top">
                                    <div class="col-8 col-md-8 col-gap">
                                        <div class="media">
                                            <img src="images/user2.svg" class="mr-2 user-img" alt="...">
                                            <div class="media-body">
                                                <p class="name-text">By Gavin Degenres</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4 col-md-4 col-gap">
                                        <div class="calender">
                                            <ul>
                                                <li><i class="fa fa-calendar" aria-hidden="true"></i> 1 Jan, 2021</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="item">
                        <div class="card">
                            <img src="images/featured2.svg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <ul>
                                    <li><i class="fa fa-medkit" aria-hidden="true"></i></i> Medical</li>
                                </ul>
                                <h5 class="card-title">Save The koalas</h5>
                                <p class="card-text">Lorem ipsum dolor sit amet consectetur Veniam inventore fugit ex veritatis molestiae.
                                </p>
                                <div class="progress" style="height:8px;">
                                    <div class="progress-bar bg-success role=" progressbar" style="width: 25%;" aria-valuenow="25"
                                        aria-valuemin="0" aria-valuemax="100"><span class="precentage-lebel">25%</span></div>
                                </div>
                                <p class="custom-card-text"><span class="text-muted">$55,000</span> rised of $100,000</p>
                                <div class="row border-top">
                                    <div class="col-8 col-md-8 col-gap">
                                        <div class="media">
                                            <img src="images/user3.svg" class="mr-2 user-img" alt="...">
                                            <div class="media-body">
                                                <p class="name-text">By Ophiluous Kenth</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4 col-md-4 col-gap">
                                        <div class="calender">
                                            <ul>
                                                <li><i class="fa fa-calendar" aria-hidden="true"></i> No Deadline</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    
    <!-- Medical Fundraisers Section End -->


    <!-- Emergency Fundraisers Started -->
    
    <section class="featured donor">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12">
                    <h3>Emergency Fundraisers</h3>
                    <hr>
                    <br>
                    <div class="owl-carousel owl-theme newCampaign">
                        <div class="item">
                            <div class="card">
                                <img src="images/featured10.svg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <ul>
                                        <li><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Emergency</li>
                                    </ul>
                                    <h5 class="card-title">Help Risk Save His House</h5>
                                    <p class="card-text">Lorem ipsum dolor sit amet consectetur Veniam inventore fugit ex
                                        veritatis molestiae.</p>
                                    <div class="progress" style="height:8px;">
                                        <div class="progress-bar bg-success role=" progressbar" style="width: 25%;"
                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><span
                                                class="precentage-lebel">25%</span></div>
                                    </div>
                                    <p class="custom-card-text"><span class="text-muted">$55,000</span> rised of $100,000
                                    </p>
                                    <div class="row border-top">
                                        <div class="col-8 col-md-8 col-gap">
                                            <div class="media">
                                                <img src="images/user1.svg" class="mr-2 user-img" alt="...">
                                                <div class="media-body">
                                                    <p class="name-text">By Ophiluous Kenth</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 col-md-4 col-gap">
                                            <div class="calender">
                                                <ul>
                                                    <li><i class="fa fa-calendar" aria-hidden="true"></i> No Deadline</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card">
                                <img src="images/featured11.svg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <ul>
                                        <li><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Emergency</li>
                                    </ul>
                                    <h5 class="card-title">Flood In Zurich</h5>
                                    <p class="card-text">Lorem ipsum dolor sit amet consectetur Veniam inventore fugit ex
                                        veritatis molestiae.
                                    </p>
                                    <div class="progress" style="height:8px;">
                                        <div class="progress-bar bg-success role=" progressbar" style="width: 25%;"
                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><span
                                                class="precentage-lebel">25%</span></div>
                                    </div>
                                    <p class="custom-card-text"><span class="text-muted">$55,000</span> rised of $100,000
                                    </p>
                                    <div class="row border-top">
                                        <div class="col-8 col-md-8 col-gap">
                                            <div class="media">
                                                <img src="images/user2.svg" class="mr-2 user-img" alt="...">
                                                <div class="media-body">
                                                    <p class="name-text">By Gavin Degenres</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 col-md-4 col-gap">
                                            <div class="calender">
                                                <ul>
                                                    <li><i class="fa fa-calendar" aria-hidden="true"></i> 1 Jan, 2021</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card">
                                <img src="images/featured10.svg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <ul>
                                        <li><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Emergency</li>
                                    </ul>
                                    <h5 class="card-title">Help The Wildlife</h5>
                                    <p class="card-text">Lorem ipsum dolor sit amet consectetur Veniam inventore fugit ex
                                        veritatis molestiae.
                                    </p>
                                    <div class="progress" style="height:8px;">
                                        <div class="progress-bar bg-success role=" progressbar" style="width: 25%;"
                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><span
                                                class="precentage-lebel">25%</span></div>
                                    </div>
                                    <p class="custom-card-text"><span class="text-muted">$55,000</span> rised of $100,000
                                    </p>
                                    <div class="row border-top">
                                        <div class="col-8 col-md-8 col-gap">
                                            <div class="media">
                                                <img src="images/user3.svg" class="mr-2 user-img" alt="...">
                                                <div class="media-body">
                                                    <p class="name-text">By Ophiluous Kenth</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 col-md-4 col-gap">
                                            <div class="calender">
                                                <ul>
                                                    <li><i class="fa fa-calendar" aria-hidden="true"></i> No Deadline</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card">
                                <img src="images/featured4.svg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <ul>
                                        <li><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Emergency</li>
                                    </ul>
                                    <h5 class="card-title">Help The Syrian Refugees</h5>
                                    <p class="card-text">Lorem ipsum dolor sit amet consectetur Veniam inventore fugit ex
                                        veritatis molestiae.
                                    </p>
                                    <div class="progress" style="height:8px;">
                                        <div class="progress-bar bg-success role=" progressbar" style="width: 25%;"
                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><span
                                                class="precentage-lebel">25%</span></div>
                                    </div>
                                    <p class="custom-card-text"><span class="text-muted">$55,000</span> rised of $100,000
                                    </p>
                                    <div class="row border-top">
                                        <div class="col-8 col-md-8 col-gap">
                                            <div class="media">
                                                <img src="images/user4.svg" class="mr-2 user-img" alt="...">
                                                <div class="media-body">
                                                    <p class="name-text">By Ophiluous Kenth</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 col-md-4 col-gap">
                                            <div class="calender">
                                                <ul>
                                                    <li><i class="fa fa-calendar" aria-hidden="true"></i> No Deadline</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card">
                                <img src="images/featured2.svg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <ul>
                                        <li><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Emergency</li>
                                    </ul>
                                    <h5 class="card-title">Help The African People</h5>
                                    <p class="card-text">Lorem ipsum dolor sit amet consectetur Veniam inventore fugit ex
                                        veritatis molestiae.
                                    </p>
                                    <div class="progress" style="height:8px;">
                                        <div class="progress-bar bg-success role=" progressbar" style="width: 25%;"
                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><span
                                                class="precentage-lebel">25%</span></div>
                                    </div>
                                    <p class="custom-card-text"><span class="text-muted">$55,000</span> rised of $100,000
                                    </p>
                                    <div class="row border-top">
                                        <div class="col-8 col-md-8 col-gap">
                                            <div class="media">
                                                <img src="images/user2.svg" class="mr-2 user-img" alt="...">
                                                <div class="media-body">
                                                    <p class="name-text">By Gavin Degenres</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 col-md-4 col-gap">
                                            <div class="calender">
                                                <ul>
                                                    <li><i class="fa fa-calendar" aria-hidden="true"></i> 1 Jan, 2021</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    
    <!-- Emergency Fundraisers Section End -->


    <!-- Education Fundraisers Started -->
    
    <section class="featured donor">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12">
                    <h3>Education Fundraisers</h3>
                    <hr>
                    <br>
                    <div class="owl-carousel owl-theme newCampaign">
                        <div class="item">
                            <div class="card">
                                <img src="images/featured1.svg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <ul>
                                        <li><i class="fa fa-graduation-cap" aria-hidden="true"></i></i> Education</li>
                                    </ul>
                                    <h5 class="card-title">Elementary School Fund</h5>
                                    <p class="card-text">Lorem ipsum dolor sit amet consectetur Veniam inventore fugit ex
                                        veritatis molestiae.</p>
                                    <div class="progress" style="height:8px;">
                                        <div class="progress-bar bg-success role=" progressbar" style="width: 25%;"
                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><span
                                                class="precentage-lebel">25%</span></div>
                                    </div>
                                    <p class="custom-card-text"><span class="text-muted">$55,000</span> rised of $100,000
                                    </p>
                                    <div class="row border-top">
                                        <div class="col-8 col-md-8 col-gap">
                                            <div class="media">
                                                <img src="images/user1.svg" class="mr-2 user-img" alt="...">
                                                <div class="media-body">
                                                    <p class="name-text">By Ophiluous Kenth</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 col-md-4 col-gap">
                                            <div class="calender">
                                                <ul>
                                                    <li><i class="fa fa-calendar" aria-hidden="true"></i> No Deadline</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card">
                                <img src="images/featured7.svg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <ul>
                                        <li><i class="fa fa-graduation-cap" aria-hidden="true"></i></i> Education</li>
                                    </ul>
                                    <h5 class="card-title">High School Projects</h5>
                                    <p class="card-text">Lorem ipsum dolor sit amet consectetur Veniam inventore fugit ex
                                        veritatis molestiae.
                                    </p>
                                    <div class="progress" style="height:8px;">
                                        <div class="progress-bar bg-success role=" progressbar" style="width: 25%;"
                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><span
                                                class="precentage-lebel">25%</span></div>
                                    </div>
                                    <p class="custom-card-text"><span class="text-muted">$55,000</span> rised of $100,000
                                    </p>
                                    <div class="row border-top">
                                        <div class="col-8 col-md-8 col-gap">
                                            <div class="media">
                                                <img src="images/user2.svg" class="mr-2 user-img" alt="...">
                                                <div class="media-body">
                                                    <p class="name-text">By Gavin Degenres</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 col-md-4 col-gap">
                                            <div class="calender">
                                                <ul>
                                                    <li><i class="fa fa-calendar" aria-hidden="true"></i> 1 Jan, 2021</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card">
                                <img src="images/featured13.svg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <ul>
                                        <li><i class="fa fa-graduation-cap" aria-hidden="true"></i></i> Education</li>
                                    </ul>
                                    <h5 class="card-title">Machine Learning Projects</h5>
                                    <p class="card-text">Lorem ipsum dolor sit amet consectetur Veniam inventore fugit ex
                                        veritatis molestiae.
                                    </p>
                                    <div class="progress" style="height:8px;">
                                        <div class="progress-bar bg-success role=" progressbar" style="width: 25%;"
                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><span
                                                class="precentage-lebel">25%</span></div>
                                    </div>
                                    <p class="custom-card-text"><span class="text-muted">$55,000</span> rised of $100,000
                                    </p>
                                    <div class="row border-top">
                                        <div class="col-8 col-md-8 col-gap">
                                            <div class="media">
                                                <img src="images/user3.svg" class="mr-2 user-img" alt="...">
                                                <div class="media-body">
                                                    <p class="name-text">By Ophiluous Kenth</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 col-md-4 col-gap">
                                            <div class="calender">
                                                <ul>
                                                    <li><i class="fa fa-calendar" aria-hidden="true"></i> No Deadline</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card">
                                <img src="images/featured14.svg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <ul>
                                    <li><i class="fa fa-graduation-cap" aria-hidden="true"></i></i> Education</li>
                                    </ul>
                                    <h5 class="card-title">Covid-19 Research</h5>
                                    <p class="card-text">Lorem ipsum dolor sit amet consectetur Veniam inventore fugit ex
                                        veritatis molestiae.
                                    </p>
                                    <div class="progress" style="height:8px;">
                                        <div class="progress-bar bg-success role=" progressbar" style="width: 25%;"
                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><span
                                                class="precentage-lebel">25%</span></div>
                                    </div>
                                    <p class="custom-card-text"><span class="text-muted">$55,000</span> rised of $100,000
                                    </p>
                                    <div class="row border-top">
                                        <div class="col-8 col-md-8 col-gap">
                                            <div class="media">
                                                <img src="images/user4.svg" class="mr-2 user-img" alt="...">
                                                <div class="media-body">
                                                    <p class="name-text">By Ophiluous Kenth</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 col-md-4 col-gap">
                                            <div class="calender">
                                                <ul>
                                                    <li><i class="fa fa-calendar" aria-hidden="true"></i> No Deadline</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card">
                                <img src="images/featured15.svg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <ul>
                                        <li><i class="fa fa-graduation-cap" aria-hidden="true"></i></i> Education</li>
                                    </ul>
                                    <h5 class="card-title">Nasa Fellowships</h5>
                                    <p class="card-text">Lorem ipsum dolor sit amet consectetur Veniam inventore fugit ex
                                        veritatis molestiae.
                                    </p>
                                    <div class="progress" style="height:8px;">
                                        <div class="progress-bar bg-success role=" progressbar" style="width: 25%;"
                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><span
                                                class="precentage-lebel">25%</span></div>
                                    </div>
                                    <p class="custom-card-text"><span class="text-muted">$55,000</span> rised of $100,000
                                    </p>
                                    <div class="row border-top">
                                        <div class="col-8 col-md-8 col-gap">
                                            <div class="media">
                                                <img src="images/user2.svg" class="mr-2 user-img" alt="...">
                                                <div class="media-body">
                                                    <p class="name-text">By Gavin Degenres</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 col-md-4 col-gap">
                                            <div class="calender">
                                                <ul>
                                                    <li><i class="fa fa-calendar" aria-hidden="true"></i> 1 Jan, 2021</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    
    <!-- Education Fundraisers Section End -->



    <section class="category">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12">
                    <h3>Browse By Categories</h3>
                    <hr>
                    <h6>Find the course you are looking for by categories</h6>
                    <div class="row">
                        @foreach($categories as $category)
                        <div class="col-md-6 col-lg-3">
                            <a href="{{$category->slug}}">
                            <div class="box mb-4">
                                <img src="{{asset($category->background_image)}}" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-md-block adjust-caption">
                                    <i class="{{$category->icon}}" aria-hidden="true"></i>
    
                                    <h5>{{$category->category_name}}</h5>
                                </div>
                            </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
    </section>

    

@endsection