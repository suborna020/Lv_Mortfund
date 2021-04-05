@extends('ui.layout.app')

@section('content')
 <section class="breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h4>FAQ</h4>
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <i class="fa fa-home fa-2x home-icon" aria-hidden="true"></i>
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li><i class="fa fa-angle-right fa-1x angle" aria-hidden="true"></i></li>
                        <li class="breadcrumb-item active" aria-current="page">FAQS</li>
                    </ol>
                </nav>

            </div>
        </div>
    </section>
    

<section class="category how-works">
    	
    <div class="container">

      <section class="support ">
        <div class="card m-2 p-xl-5 p-lg-5 p-md-5 p-xs-0 p-sm-0 text-center">
          <div class="container">
            <!-- HEADER -->
            <div class="row">
              <div class="col-12 col-md-12">
                <h3 class="text-capitalize">
                  Frequently asked questions (FAQ)
                </h3>
                <hr />
                <h6>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas,
                  maiores? Sit atque molestias similique illum iusto libero
                  neque voluptate suscipit incidunt ea, velit, alias impedit
                  iusto libero neque voluptate aliquam officiis a nulla nam?
                </h6>
              </div>
            </div>
            <br />
            <br />
            <!-- COLLAPSE -->
            <div class="row">
              <div class="col-12 col-md-12">
                <div id="accordion">
                  <div class="card m-2">
                    <button
                      class="btn w-100"
                      data-toggle="collapse"
                      data-target="#collapseOne"
                      aria-expanded="true"
                      aria-controls="collapseOne"
                      style="background-color: #f8800b"
                    >
                      <div
                        class="p-1 text-center d-flex justify-content-center align-items-center"
                        id="headingOne"
                      >
                        <h6 class="mb-0" style="color: #fff">
                          Collapsible Group Itemsdfsdf Lorem ipsum dolor,
                          sitlorem5 Lorem ipsum dolor sit amet<i class="fas fa-plus mx-3" style="color: #fff"></i>
                        </h6>
                        
                      </div>
                    </button>

                    <div
                      id="collapseOne"
                      class="collapse show"
                      aria-labelledby="headingOne"
                      data-parent="#accordion"
                      style="background-color: #fff6ee"
                    >
                      <div class="card-body">
                        <p class="font-weight-bold">
                          Anim pariatur cliche reprehenderit, enim eiusmod high
                          life accusamus terry richardson ad squid. 3 wolf moon
                          officia aute, non cupidatat skateboard dolor brunch.
                          Food truck quinoa nesciunt laborum eiusmod. Brunch 3
                          wolf moon tempor, sunt aliqua put a bird on it squid
                          single-origin coffee nulla assumenda shoreditch et.
                          Nihil anim keffiyeh helvetica, craft beer labore wes
                          anderson cred nesciunt sapiente ea proident. Ad vegan
                          excepteur butcher vice lomo. Leggings occaecat craft
                          beer farm-to-table, raw denim aesthetic synth nesciunt
                          you probably haven't heard of them accusamus labore
                          sustainable VHS.
                        </p>
                      </div>
                    </div>
                  </div>
                  <!-- CARD2 -->
                  <div class="card m-2">
                    <button
                      class="btn w-100"
                      data-toggle="collapse"
                      data-target="#collapseTwo"
                      aria-expanded="false"
                      aria-controls="collapseTwo"
                      style="background-color: #f8800b"
                    >
                      <div
                        class="p-1 text-center d-flex justify-content-center align-items-center"
                        id="headingTwo"
                      >
                        <h6 class="mb-0" style="color: #fff">
                          Collapsible Group Itemsdfsdf Lorem ipsum dolor,
                          sitlorem5 Lorem ipsum dolor sit amet
                        </h6>
                        <i class="fas fa-plus mx-3" style="color: #fff"></i>
                      </div>
                    </button>

                    <div
                      id="collapseTwo"
                      class="collapse"
                      aria-labelledby="headingTwo"
                      data-parent="#accordion"
                      style="background-color: #fff6ee"
                    >
                      <div class="card-body">
                        <p class="font-weight-bold">
                          Anim pariatur cliche reprehenderit, enim eiusmod high
                          life accusamus terry richardson ad squid. 3 wolf moon
                          officia aute, non cupidatat skateboard dolor brunch.
                          Food truck quinoa nesciunt laborum eiusmod. Brunch 3
                          wolf moon tempor, sunt aliqua put a bird on it squid
                          single-origin coffee nulla assumenda shoreditch et.
                          Nihil anim keffiyeh helvetica, craft beer labore wes
                          anderson cred nesciunt sapiente ea proident. Ad vegan
                          excepteur butcher vice lomo. Leggings occaecat craft
                          beer farm-to-table, raw denim aesthetic synth nesciunt
                          you probably haven't heard of them accusamus labore
                          sustainable VHS.
                        </p>
                      </div>
                    </div>
                  </div>
                  <!-- CARD3 -->
                  <div class="card m-2">
                    <button
                      class="btn w-100"
                      data-toggle="collapse"
                      data-target="#collapseThree"
                      aria-expanded="false"
                      aria-controls="collapseThree"
                      style="background-color: #f8800b"
                    >
                      <div
                        class="p-1 text-center d-flex justify-content-center align-items-center"
                        id="headingThree"
                      >
                        <h6 class="mb-0" style="color: #fff">
                          Collapsible Group Itemsdfsdf Lorem ipsum dolor,
                          sitlorem5 Lorem ipsum dolor sit amet
                        </h6>
                        <i class="fas fa-plus mx-3" style="color: #fff"></i>
                      </div>
                    </button>

                    <div
                      id="collapseThree"
                      class="collapse"
                      aria-labelledby="headingThree"
                      data-parent="#accordion"
                      style="background-color: #fff6ee"
                    >
                      <div class="card-body">
                        <p class="font-weight-bold">
                          Anim pariatur cliche reprehenderit, enim eiusmod high
                          life accusamus terry richardson ad squid. 3 wolf moon
                          officia aute, non cupidatat skateboard dolor brunch.
                          Food truck quinoa nesciunt laborum eiusmod. Brunch 3
                          wolf moon tempor, sunt aliqua put a bird on it squid
                          single-origin coffee nulla assumenda shoreditch et.
                          Nihil anim keffiyeh helvetica, craft beer labore wes
                          anderson cred nesciunt sapiente ea proident. Ad vegan
                          excepteur butcher vice lomo. Leggings occaecat craft
                          beer farm-to-table, raw denim aesthetic synth nesciunt
                          you probably haven't heard of them accusamus labore
                          sustainable VHS.
                        </p>
                      </div>
                    </div>
                  </div>
                  <!-- CARD4 -->
                  <div class="card m-2">
                    <button
                      class="btn w-100"
                      data-toggle="collapse"
                      data-target="#collapseFour"
                      aria-expanded="false"
                      aria-controls="collapseFour"
                      style="background-color: #f8800b"
                    >
                      <div
                        class="p-1 text-center d-flex justify-content-center align-items-center"
                        id="headingFour"
                      >
                        <h6 class="mb-0" style="color: #fff">
                          Collapsible Group Itemsdfsdf Lorem ipsum dolor,
                          sitlorem5 Lorem ipsum dolor sit amet
                        </h6>
                        <i class="fas fa-plus mx-3" style="color: #fff"></i>
                      </div>
                    </button>

                    <div
                      id="collapseFour"
                      class="collapse"
                      aria-labelledby="headingFour"
                      data-parent="#accordion"
                      style="background-color: #fff6ee"
                    >
                      <div class="card-body">
                        <p class="font-weight-bold">
                          Anim pariatur cliche reprehenderit, enim eiusmod high
                          life accusamus terry richardson ad squid. 3 wolf moon
                          officia aute, non cupidatat skateboard dolor brunch.
                          Food truck quinoa nesciunt laborum eiusmod. Brunch 3
                          wolf moon tempor, sunt aliqua put a bird on it squid
                          single-origin coffee nulla assumenda shoreditch et.
                          Nihil anim keffiyeh helvetica, craft beer labore wes
                          anderson cred nesciunt sapiente ea proident. Ad vegan
                          excepteur butcher vice lomo. Leggings occaecat craft
                          beer farm-to-table, raw denim aesthetic synth nesciunt
                          you probably haven't heard of them accusamus labore
                          sustainable VHS.
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>

</section>
@endsection