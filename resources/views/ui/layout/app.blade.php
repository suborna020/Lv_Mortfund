<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <!-- Font Awesome Intigration -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"/>

        <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
        <link rel="stylesheet" href="{{asset('css/responsive.css')}}">

        
        <!-- must include  -->
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

        {{-- for sweetalert2   --}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous"></script>
        
        <title>Mortfund</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        
    </head>
    <body>
        @include('ui.layout.components.header')

        @yield('content')

        @include('ui.layout.components.footer')

        
        <script src="{{ url('js/authentication.js') }}"></script>
        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
        
        <script src="{{asset('js/script.js')}}"></script>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>

        

        <script src="{{asset('js/jquery.countup.js')}}"></script>
<script>

/*Ajax Pagination*/


// $(function() {
//     $('body').on('click', '.pagination a', function(e) {
//         e.preventDefault();

//         $('#fundraisers #fundraiser_main').css('background', 'red');
//         $('#fundraisers').append('<img style="position: fixed; left: 30%; top: 20%; z-index: 100000;" src="/images/loading.gif" />');

//         var url = $(this).attr('href');  
//         getFundraisers(url);
//         window.history.pushState("", "", url);
//     });

//     function getFundraisers(url) {
//         $.ajax({
//             url : url  
//         }).done(function (data) {
//             $('body').html(data);  
//             // $('.c').countUp();
//         }).fail(function () {
//             alert('Could not be loaded.');
//         });
//     }
// });

/*Onscroll Counter*/

$(document).ready(function () {
   $('.c').countUp();
});
</script>

<!-- <script type="text/javascript">
        $(document).ready(function(){
            $("#currency_code").on('change', function postinput(){
                var currency_code = $(this).val(); // this.value
                $.ajax({ 
                    url: '/set-currency-code',
                    data: { "_token": "{{ csrf_token() }}", currency_code: currency_code },
                    type: 'post'
                }).done(function(responseData) {
                    console.log('Done: ', responseData);
                    window.location.reload();
                }).fail(function() {
                    console.log('Failed');
                });
            });
        }); 
    </script>  -->    
        
    </body>
</html>
