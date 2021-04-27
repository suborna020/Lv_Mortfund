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
            @foreach($supports as $support)
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
                          {{$support->question}}<i class="fas fa-plus mx-3" style="color: #fff"></i>
                        </h6>
                        
                      </div>
                    </button>

                    <div
                      id="collapseOne"
                      class="collapse"
                      aria-labelledby="headingOne"
                      data-parent="#accordion"
                      style="background-color: #fff6ee"
                    >
                      <div class="card-body">
                        <p class="font-weight-bold">
                          {{$support->answer}}
                        </p>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </section>
    </div>

</section>

<script>
    document.querySelectorAll('button').forEach((elem) => {
      elem.addEventListener('click', function () {
        const icon = this.querySelector('i');
        const text = this.querySelector('span');
        if (icon.classList.contains('fa-plus')) {
          icon.classList.remove('fa-plus');
          icon.classList.add('fa-minus');
        } else {
          icon.classList.remove('fa-minus');
          icon.classList.add('fa-plus');
        }
      });
    })
  </script>
@endsection