@extends('ui.layout.app')

@section('content')
   
 <section class="breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h4>How Mortfund Works</h4>
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <i class="fa fa-home fa-2x home-icon" aria-hidden="true"></i>
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li><i class="fa fa-angle-right fa-1x angle" aria-hidden="true"></i></li>
                        <li class="breadcrumb-item active" aria-current="page">How It Works</li>
                    </ol>
                </nav>

            </div>
        </div>
    </section>


    <section class="category how-works">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12">
                    <h3>How Mortfund Works</h3>
                    <hr>
                    <h6>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas, maiores? Sit atque molestias similique illum iusto libero neque voluptate suscipit incidunt ea, velit, alias impedit iusto libero neque voluptate aliquam officiis a nulla nam?</h6>

                    <div class="row">
                        <div class="col-md-4 col-12">
                        <div class="col-bg">
                            <div class="direction-icon">
                                <li><i class="fa fa-arrow-circle-up fa-3x" aria-hidden="true"></i></li>
                            </div>
                            <div class="box">
                                <li><i class="fa fa-envelope fa-3x" aria-hidden="true"></i></li>
                                <h4>Start Your Campaign</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Perferendis minima inventore dolore quis velit autem
                                    doloribus voluptates minus aperiam vitae.</p>
                            </div>
                        </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="col-bg">
                                <div class="direction-icon">
                                    <li><i class="fa fa-arrow-circle-up fa-3x" aria-hidden="true"></i></li>
                                </div>
                                <div class="box">
                                    <li><i class="fa fa-share-alt fa-3x" aria-hidden="true"></i></li>
                                    <h4>Share With Friends</h4>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Perferendis minima inventore dolore quis velit autem
                                        doloribus voluptates minus aperiam vitae.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="col-bg">
                                <div class="direction-icon">
                                    <li><i class="fa fa-arrow-circle-up fa-3x" aria-hidden="true"></i></li>
                                </div>
                                <div class="box">
                                    <li><i class="fa fa-cogs fa-3x" aria-hidden="true"></i></li>
                                    <h4>Manage Donations</h4>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Perferendis minima inventore dolore quis velit autem
                                        doloribus voluptates minus aperiam vitae.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

        <section class="category donor">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12">
                    <h3>What Our Donor Say</h3>
                    <hr>

                    <!-- Slider Section Started -->
                    
                    <div id="carouselExampleIndicators" class="carousel slide testimonial-slide" data-ride="carousel">
                        <ol class="carousel-indicators testimonial-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="img-box">
                                    <img src="images/user1.svg" class="d-block m-auto testimonial-img" alt="...">
                                    <i class="fa fa-quote-left quote-icon" aria-hidden="true"></i>
                                </div>
                                <div class="testimonial">
                                    <p>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci aliquam nostrum quam vel in, perspiciatis et id dolor quas? Porro, atque optio beatae quam explicabo voluptate iste velit obcaecati delectus?Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti impedit deserunt autem quia, dolorum sunt
                                        voluptates dolore nihil quidem incidunt temporibus nobis perferendis recusandae doloremque, tenetur inventore hic
                                        laborum vel"</p>
                                    <h5>Steve McCallister</h5>
                                    <h6>Professor - Lorem Ipsum University</h6>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="img-box">
                                    <img src="images/user2.svg" class="d-block m-auto testimonial-img" alt="...">
                                    <i class="fa fa-quote-left quote-icon" aria-hidden="true"></i>
                                </div>
                                <div class="testimonial">
                                    <p>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci aliquam nostrum quam vel in, perspiciatis
                                        et id dolor quas? Porro, atque optio beatae quam explicabo voluptate iste velit obcaecati delectus?Lorem
                                        ipsum dolor sit amet consectetur adipisicing elit. Deleniti impedit deserunt autem quia, dolorum sunt
                                        voluptates dolore nihil quidem incidunt temporibus nobis perferendis recusandae doloremque, tenetur
                                        inventore hic
                                        laborum vel"</p>
                                    <h5>Austine Wade</h5>
                                    <h6>Professor - Lorem Ipsum University</h6>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="img-box">
                                    <img src="images/user3.svg" class="d-block m-auto testimonial-img" alt="...">
                                    <i class="fa fa-quote-left quote-icon" aria-hidden="true"></i>
                                </div>
                                <div class="testimonial">
                                    <p>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci aliquam nostrum quam vel in, perspiciatis
                                        et id dolor quas? Porro, atque optio beatae quam explicabo voluptate iste velit obcaecati delectus?Lorem
                                        ipsum dolor sit amet consectetur adipisicing elit. Deleniti impedit deserunt autem quia, dolorum sunt
                                        voluptates dolore nihil quidem incidunt temporibus nobis perferendis recusandae doloremque, tenetur
                                        inventore hic
                                        laborum vel"</p>
                                    <h5>Steve McCallister</h5>
                                    <h6>Professor - Lorem Ipsum University</h6>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            
                        </a>
                    </div>
                    
                    <!-- Slider Section End -->
                    
                </div>
            </div>
        </div>
    </section>

        <!-- Success Stories Started -->

    <section class="category story">
        <div class="container-fluid">
            <div class="row no-gutters">
                <div class="col-12">
                    <h3>Success Stories</h3>
                    <hr>
                    <br>
                    <br>

                    <div class="owl-carousel owl-theme howitworks">
                        <div class="item">
                            <div class="card mb-3 hw-card">
                                <div class="row no-gutters">
                                    <div class="col-md-4 stories1-bg">
                                        <!-- <img src="images/stories1.svg" alt="..." class="img-fluid"> -->
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <div class="calender">
                                                <ul>
                                                    <li><i class="fa fa-calendar" aria-hidden="true"></i> 1 Jan, 2021</li>
                                                </ul>
                                            </div>
                                            <h5 class="card-title">Lorem ipsum dolor sit amet consectetur</h5>
                                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional
                                                content. This content is a wider card with supporting text below as a natural little bit longer.</p>
                                            <div class="media">
                                                <img src="images/user4.svg" class="mr-2 user-img" alt="...">
                                                <div class="media-body">
                                                    <p class="name-text">By Gavin Degenres</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card mb-3 hw-card" style="max-width: 540px;">
                                <div class="row no-gutters">
                                    <div class="col-md-4 stories2-bg">
                                        <!-- <img src="images/pexels-tima-miroshnichenko-5453805 (1).jpg"> -->
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <div class="calender">
                                                <ul>
                                                    <li><i class="fa fa-calendar" aria-hidden="true"></i> 1 Jan, 2021</li>
                                                </ul>
                                            </div>
                                            <h5 class="card-title">Lorem ipsum dolor sit amet consectetur</h5>
                                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                                                additional
                                                content. This content is a wider card with supporting text below as a natural little bit longer.
                                            </p>
                                            <div class="media">
                                                <img src="images/user2.svg" class="mr-2 user-img" alt="...">
                                                <div class="media-body">
                                                    <p class="name-text">By Gavin Degenres</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card mb-3 hw-card" style="max-width: 540px;">
                                <div class="row no-gutters">
                                    <div class="col-md-4 stories3-bg">
                                        <!-- <img src="images/stories4.svg" alt="..."> -->
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <div class="calender">
                                                <ul>
                                                    <li><i class="fa fa-calendar" aria-hidden="true"></i> 1 Jan, 2021</li>
                                                </ul>
                                            </div>
                                            <h5 class="card-title">Lorem ipsum dolor sit amet consectetur</h5>
                                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                                                additional
                                                content. This content is a wider card with supporting text below as a natural little bit longer.
                                            </p>
                                            <div class="media">
                                                <img src="images/user2.svg" class="mr-2 user-img" alt="...">
                                                <div class="media-body">
                                                    <p class="name-text">By Gavin Degenres</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card mb-3 hw-card" style="max-width: 540px;">
                                <div class="row no-gutters">
                                    <div class="col-md-4 stories4-bg">
                                        <!-- <img src="images/stories5.svg" alt="..."> -->
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <div class="calender">
                                                <ul>
                                                    <li><i class="fa fa-calendar" aria-hidden="true"></i> 1 Jan, 2021</li>
                                                </ul>
                                            </div>
                                            <h5 class="card-title">Lorem ipsum dolor sit amet consectetur</h5>
                                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                                                additional
                                                content. This content is a wider card with supporting text below as a natural little bit longer.
                                            </p>
                                            <div class="media">
                                                <img src="images/user2.svg" class="mr-2 user-img" alt="...">
                                                <div class="media-body">
                                                    <p class="name-text">By Gavin Degenres</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="owl-carousel owl-theme howitworks">
                        <div class="item">
                            <div class="card mb-3 hw-card">
                                <div class="row no-gutters">
                                    <div class="col-md-4 stories5-bg">
                                        <!-- <img src="images/stories1.svg" alt="..." class="img-fluid"> -->
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <div class="calender">
                                                <ul>
                                                    <li><i class="fa fa-calendar" aria-hidden="true"></i> 1 Jan, 2021</li>
                                                </ul>
                                            </div>
                                            <h5 class="card-title">Lorem ipsum dolor sit amet consectetur</h5>
                                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                                                additional
                                                content. This content is a wider card with supporting text below as a natural little bit
                                                longer.</p>
                                            <div class="media">
                                                <img src="images/user4.svg" class="mr-2 user-img" alt="...">
                                                <div class="media-body">
                                                    <p class="name-text">By Gavin Degenres</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card mb-3 hw-card" style="max-width: 540px;">
                                <div class="row no-gutters">
                                    <div class="col-md-4 stories6-bg">
                                        <!-- <img src="images/pexels-tima-miroshnichenko-5453805 (1).jpg"> -->
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <div class="calender">
                                                <ul>
                                                    <li><i class="fa fa-calendar" aria-hidden="true"></i> 1 Jan, 2021</li>
                                                </ul>
                                            </div>
                                            <h5 class="card-title">Lorem ipsum dolor sit amet consectetur</h5>
                                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                                                additional
                                                content. This content is a wider card with supporting text below as a natural little bit
                                                longer.
                                            </p>
                                            <div class="media">
                                                <img src="images/user2.svg" class="mr-2 user-img" alt="...">
                                                <div class="media-body">
                                                    <p class="name-text">By Gavin Degenres</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card mb-3 hw-card" style="max-width: 540px;">
                                <div class="row no-gutters">
                                    <div class="col-md-4 stories7-bg">
                                        <!-- <img src="images/stories4.svg" alt="..."> -->
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <div class="calender">
                                                <ul>
                                                    <li><i class="fa fa-calendar" aria-hidden="true"></i> 1 Jan, 2021</li>
                                                </ul>
                                            </div>
                                            <h5 class="card-title">Lorem ipsum dolor sit amet consectetur</h5>
                                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                                                additional
                                                content. This content is a wider card with supporting text below as a natural little bit
                                                longer.
                                            </p>
                                            <div class="media">
                                                <img src="images/user2.svg" class="mr-2 user-img" alt="...">
                                                <div class="media-body">
                                                    <p class="name-text">By Gavin Degenres</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card mb-3 hw-card" style="max-width: 540px;">
                                <div class="row no-gutters">
                                    <div class="col-md-4 stories8-bg">
                                        <!-- <img src="images/stories5.svg" alt="..."> -->
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <div class="calender">
                                                <ul>
                                                    <li><i class="fa fa-calendar" aria-hidden="true"></i> 1 Jan, 2021</li>
                                                </ul>
                                            </div>
                                            <h5 class="card-title">Lorem ipsum dolor sit amet consectetur</h5>
                                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                                                additional
                                                content. This content is a wider card with supporting text below as a natural little bit
                                                longer.
                                            </p>
                                            <div class="media">
                                                <img src="images/user2.svg" class="mr-2 user-img" alt="...">
                                                <div class="media-body">
                                                    <p class="name-text">By Gavin Degenres</p>
                                                </div>
                                            </div>
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

    <!-- Success Stories End -->


@endsection