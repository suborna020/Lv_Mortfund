@extends('ui.layout.app')

@section('head-script')
    <link href="{{asset('css/new/privacy.css')}}" rel="stylesheet">
@endsection

@section('content')

 <section class="breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h4>Privacy</h4>
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <i class="fa fa-home fa-2x home-icon" aria-hidden="true"></i>
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li><i class="fa fa-angle-right fa-1x angle" aria-hidden="true"></i></li>
                        <li class="breadcrumb-item active" aria-current="page">Privacy</li>
                    </ol>
                </nav>

            </div>
        </div>
    </section>
 
   <div class="privacy container">
    <div class="card p-5 m-5" style="width: 90%; height: 100%">

      {!! $privacy->text !!}
      {{--<p class="font-weight-bold">
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea voluptate
        dolor deserunt autem, libero delectus iusto incidunt officia minus
        fugiat ex numquam in magni voluptatum, doloremque et nostrum,atque
        placeat.Lorem ipsum dolor sit amet consectetur adipisicing elit.
        <br />
        <br />
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea voluptate
        dolor deserunt autem, libero delectus iusto incidunt officia minus
        fugiat ex numquam in magni voluptatum, doloremque et nostrum, atque
        placeat.Lorem ipsum dolor sit amet consectetur adipisicing elit.
        Perferendis blanditiis velit laudantium laboriosam modi ullam?
        Possimus aliquid cupiditate voluptas, libero excepturi ut, sunt
        adipisci incidunt praesentium blanditiis perspiciatis quaerat
        delectus?
      </p>
      <h3 class="text-normal mb-4 font-weight-bold">
        Interpretaion and Defination
      </h3>
      <h4 class="text-capitalize mb-4 font-weight-bold">Interpretaion</h4>
      <p class="font-weight-bold">
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea voluptate
        dolor deserunt autem, libero delectus iusto incidunt officia minus
        fugiat ex numquam in magni voluptatum, doloremque et nostrum,atque
        placeat.Lorem ipsum dolor sit amet consectetur adipisicing elit.
        Perferendis blanditiis velit laudantium laboriosam modi ullam?
        Possimus aliquid cupiditate voluptas, libero excepturi ut, sunt
        adipisci incidunt praesentium blanditiis perspiciatis quaerat
        delectus?
        <br />
        <br />
      </p>
      <h4 class="text-capitalize mb-4 font-weight-bold">Defination</h4>

      <ul class="font-weight-bold" style="padding: 0; list-style-position: inside">
        For the purpose of this privacy policy:
        <li class="font-weight-bold">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi,
          maxime.lorem10 Lorem ipsum dolor sit, amet consectetur adipisicing
          elit. Labore, esse!
        </li>
        <li class="font-weight-bold">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi,
          maxime.lorem10 Lorem ipsum dolor sit, amet consectetur adipisicing
          elit. Labore, esse!
        </li>
        <li class="font-weight-bold">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi,
          maxime.
        </li>
        <li class="font-weight-bold">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi,
          maxime.lorem10 Lorem ipsum dolor sit, amet consectetur adipisicing
          elit. Labore, esse!
        </li>
        <li class="font-weight-bold">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi,
          maxime.lorem10 Lorem ipsum dolor sit, amet consectetur adipisicing
          elit. Labore, esse!
        </li>
        <li class="font-weight-bold">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi,
          maxime.
        </li>
      </ul>
      <br />
      <h3 class="text-capitalize mb-4 font-weight-bold">
        Collecting and using your personal data
      </h3>
      <h4 class="text-capitalize mb-4 font-weight-bold">
        types of data collected
      </h4>
      <h5 class="text-capitalize mb-4 font-weight-bold">personal data</h5>
      <p class="font-weight-bold">
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea voluptate
        dolor deserunt autem, libero delectus iusto incidunt officia minus
        fugiat ex numquam in magni voluptatum, doloremque et nostrum,atque
        placeat.Lorem ipsum dolor sit amet consectetur adipisicing elit.
        Perferendis blanditiis velit laudantium laboriosam modi ullam?
        Possimus aliquid cupiditate voluptas, libero excepturi ut, sunt
        adipisci incidunt praesentium blanditiis perspiciatis quaerat
        delectus?
      </p>

      <ul style="padding: 0; list-style-position: inside">
        <li class="font-weight-bold">Lorem ipsum dolor sit amet</li>
        <li class="font-weight-bold">Lorem ipsum dolor sit amet</li>
        <li class="font-weight-bold">Lorem ipsum dolor sit amet</li>
        <li class="font-weight-bold">Lorem ipsum dolor sit amet</li>
        <li class="font-weight-bold">Lorem ipsum dolor sit amet</li>
      </ul>
      <br />
      <h3 class="text-capitalize mb-4 font-weight-bold">
        Change to this privacy policy
      </h3>
      <p class="font-weight-bold">
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea voluptate
        dolor deserunt autem, libero delectus iusto incidunt officia minus
        <br />
        <br />
        fugiat ex numquam in magni voluptatum, doloremque et nostrum,atque
        placeat.Lorem ipsum dolor sit amet consectetur adipisicing elit.
        <br /><br />
        Perferendis blanditiis velit laudantium laboriosam modi ullam?
        Possimus aliquid cupiditate voluptas, libero excepturi ut, sunt
        adipisci incidunt praesentium blanditiis perspiciatis quaerat
        delectus?
      </p>
      <h3 class="text-capitalize mb-4 font-weight-bold">Contact us</h3>
      <p class="font-weight-bold">
        If you have any questions about this privacy policy, you can contact
        us: <br />
        <br />
        By email: office@mortfund.com
      </p> --}}
    </div>
  </div>
@endsection