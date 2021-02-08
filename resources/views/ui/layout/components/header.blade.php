<div class="topbar" style="width: 100%;float: left;border-bottom: 1px solid #eee">
   <div class="clock">
   	   Date and Time
   </div>
   <div class="short-notes">
   	 <span>{{$general->short_note_1}}</span><span>{{$general->short_note_2}}</span>
   </div>
   <div class="topbar-right">
   	  <div class="address">
         {{$general->address}}
   	  </div>
   	  <div class="phone">
   	  	 {{$general->website_phone}}
   	  </div>
   	  <div class="social">
   	  </div>
   	  <div class="language">
   	  </div>
   </div>
</div>

<div class="base_header">
	<div class="logo">
		<img src="{{$general->website_logo}}">
	</div>
	<div class="search">
        <input type="" name="" value="search">
	</div>
	<div class="nav-menu">
		@foreach($navmenu as $menu)
            <a href="">{{$menu->menu_item}}</a>
		@endforeach
		{{-- @foreach($navmenu as $menu)
            <a href="">{{$currency->sign}}</a>
		@endforeach  --}}
	</div>
</div>
