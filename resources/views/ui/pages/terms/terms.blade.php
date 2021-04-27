@extends('ui.layout.app')

@section('content')
 <section class="breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h4>Terms</h4>
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <i class="fa fa-home fa-2x home-icon" aria-hidden="true"></i>
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li><i class="fa fa-angle-right fa-1x angle" aria-hidden="true"></i></li>
                        <li class="breadcrumb-item active" aria-current="page">Terms</li>
                    </ol>
                </nav>

            </div>
        </div>
    </section>
     <section class="category how-works">
<div class="container">
	<div class="row">
        <div class="col-12 col-md-12">
        	<h3>{{$terms->title}}</h3>
        	<hr>
        <div class="card p-5 m-5" style="width: 90%;">
        	
            {!! $terms->text !!}
        </div>
    </div>
</div>
    </div>
</section>

@endsection