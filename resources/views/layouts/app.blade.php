<!doctype html>
<html class="no-js" lang="zxx">
<!-- index-231:32-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    @stack('title')


    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('public/frontend') }}/images/favicon.png">
    <!-- Material Design Iconic Font-V2.2.0 -->
    <link rel="stylesheet" href="{{ asset('public/frontend') }}/css/material-design-iconic-font.min.css">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/f206eb07b5.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('public/frontend') }}/css/font-awesome.min.css">
    <!-- Font Awesome Stars-->
    <link rel="stylesheet" href="{{ asset('public/frontend') }}/css/fontawesome-stars.css">
    <!-- Meanmenu CSS -->
    <link rel="stylesheet" href="{{ asset('public/frontend') }}/css/meanmenu.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="{{ asset('public/frontend') }}/css/owl.carousel.min.css">
    <!-- Slick Carousel CSS -->
    <link rel="stylesheet" href="{{ asset('public/frontend') }}/css/slick.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('public/frontend') }}/css/animate.css">
    <!-- Jquery-ui CSS -->
    <link rel="stylesheet" href="{{ asset('public/frontend') }}/css/jquery-ui.min.css">
    <!-- Venobox CSS -->
    <link rel="stylesheet" href="{{ asset('public/frontend') }}/css/venobox.css">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="{{ asset('public/frontend') }}/css/nice-select.css">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="{{ asset('public/frontend') }}/css/magnific-popup.css">
    <!-- Bootstrap V4.1.3 Fremwork CSS -->
    <link rel="stylesheet" href="{{ asset('public/frontend') }}/css/bootstrap.min.css">
    <!-- Helper CSS -->
    <link rel="stylesheet" href="{{ asset('public/frontend') }}/css/helper.css">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ asset('public/frontend') }}/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('public/frontend') }}/css/responsive.css">
    <!-- toastr cdn css----->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-------toastr.css------->
   <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/toastr/toastr.min.css">
    <!-- sweetalert2 cdn css -------->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.10.7/sweetalert2.min.css"
        integrity="sha512-OWGg8FcHstyYFwtjfkiCoYHW2hG3PDWwdtczPAPUcETobBJOVCouKig8rqED0NMLcT9GtE4jw6IT1CSrwY87uw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-------sweetalert2.css------->
   <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/sweetalert2/sweetalert2.min.css">
    <!-- Modernizr js -->
    <script src="{{ asset('public/frontend') }}/js/vendor/modernizr-2.8.3.min.js"></script>
    @stack('css')
</head>

<body>
    <!--[if lt IE 8]>
  <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
 <![endif]-->
    <!-- Begin Body Wrapper -->
    <div class="body-wrapper">
        <!----------topbar------------>
        @include('layouts.front-partial.topbar')
        <!----------navbar------------>
        @guest
        @else
            @include('layouts.front-partial.navbar')
        @endguest

        <!----------slider------------>
        {{-- -   @include('layouts.front-partial.slider')  --}}

        @yield('content')

        <!-----------footer-------------->
        @guest
        @else
            @include('layouts.front-partial.footer')
        @endguest



    </div>
    <!-- Body Wrapper End Here -->
    <!-- jQuery-V1.12.4 -->
    <script src="{{ asset('public/frontend') }}/js/vendor/jquery-1.12.4.min.js"></script>
    <!-- Popper js -->
    <script src="{{ asset('public/frontend') }}/js/vendor/popper.min.js"></script>
    <!-- Bootstrap V4.1.3 Fremwork js -->
    <script src="{{ asset('public/frontend') }}/js/bootstrap.min.js"></script>
    <!-- Ajax Mail js -->
    <script src="{{ asset('public/frontend') }}/js/ajax-mail.js"></script>
    <!-- Meanmenu js -->
    <script src="{{ asset('public/frontend') }}/js/jquery.meanmenu.min.js"></script>
    <!-- Wow.min js -->
    <script src="{{ asset('public/frontend') }}/js/wow.min.js"></script>
    <!-- Slick Carousel js -->
    <script src="{{ asset('public/frontend') }}/js/slick.min.js"></script>
    <!-- Owl Carousel-2 js -->
    <script src="{{ asset('public/frontend') }}/js/owl.carousel.min.js"></script>
    <!-- Magnific popup js -->
    <script src="{{ asset('public/frontend') }}/js/jquery.magnific-popup.min.js"></script>
    <!-- Isotope js -->
    <script src="{{ asset('public/frontend') }}/js/isotope.pkgd.min.js"></script>
    <!-- Imagesloaded js -->
    <script src="{{ asset('public/frontend') }}/js/imagesloaded.pkgd.min.js"></script>
    <!-- Mixitup js -->
    <script src="{{ asset('public/frontend') }}/js/jquery.mixitup.min.js"></script>
    <!-- Countdown -->
    <script src="{{ asset('public/frontend') }}/js/jquery.countdown.min.js"></script>
    <!-- Counterup -->
    <script src="{{ asset('public/frontend') }}/js/jquery.counterup.min.js"></script>
    <!-- Waypoints -->
    <script src="{{ asset('public/frontend') }}/js/waypoints.min.js"></script>
    <!-- Barrating -->
    <script src="{{ asset('public/frontend') }}/js/jquery.barrating.min.js"></script>
    <!-- Jquery-ui -->
    <script src="{{ asset('public/frontend') }}/js/jquery-ui.min.js"></script>
    <!-- Venobox -->
    <script src="{{ asset('public/frontend') }}/js/venobox.min.js"></script>
    <!-- Nice Select js -->
    <script src="{{ asset('public/frontend') }}/js/jquery.nice-select.min.js"></script>
    <!-- ScrollUp js -->
    <script src="{{ asset('public/frontend') }}/js/scrollUp.min.js"></script>
    <!-- Main/Activator js -->
    <script src="{{ asset('public/frontend') }}/js/main.js"></script>
    <!-- toastr cdn js -------->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <!-------toaster.js------->
<script src="{{asset('public/backend')}}/plugins/toastr/toastr.min.js"></script>
    <!-- sweetalert2 cdn js -------->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.10.7/sweetalert2.min.js"
        integrity="sha512-csaTzpLFmF+Zl81hRtaZMsMhaeQDHO8E3gBkN3y3sCX9B1QSut68NxqcrxXH60BXPUQ/GB3LZzzIq9ZrxPAMTg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <!-------sweetalert2.js------->
<script src="{{asset('public/backend')}}/plugins/sweetalert2/sweetalert2.min.js"></script>

    {{-- -----toaster alert message showing----- --}}
    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
    
                    toastr.options.timeOut = 10000;
                    toastr.info("{{ Session::get('message') }}");
                    var audio = new Audio('audio.mp3');
                    audio.play();
                    break;
                case 'success':
    
                    toastr.options.timeOut = 10000;
                    toastr.success("{{ Session::get('message') }}");
                    var audio = new Audio('audio.mp3');
                    audio.play();
    
                    break;
                case 'warning':
    
                    toastr.options.timeOut = 10000;
                    toastr.warning("{{ Session::get('message') }}");
                    var audio = new Audio('audio.mp3');
                    audio.play();
    
                    break;
                case 'error':
    
                    toastr.options.timeOut = 10000;
                    toastr.error("{{ Session::get('message') }}");
                    var audio = new Audio('audio.mp3');
                    audio.play();
    
                    break;
            }
        @endif
    </script>
    <!----------getting javascript code from another pages--------->
    @stack('scripts')

<!----------jquery code for product wishlist--------->
    <script  type="text/javascript">
        $(document).ready(function() {
            $('.wishlist_add').click(function(e) {
                e.preventDefault();
                if ($(this).hasClass('wishlist_add')) {
                    let get_attr = $(this).attr('href');
                    $.ajax({
                        url: get_attr,
                        type: 'GET',
                        dataType: 'json',
                        success: function(response) {
                            // $('#wishlist_counter').text(response);
                            if (response == 'This product is already exist to the wishlist!') {
                                toastr.success(response);
                            } else if (response == 'loginForm') {
                                window.location.href = "{{ route('login.showForm') }}";
                            } else if(response != 'This product is already exist to the wishlist!' || response != 'loginForm'){
                                $('#wishlist_counter').text(response);
                            }

                            // Toggle heart icons and classes
                            $(e.currentTarget).find('.fa-heart').removeClass('d-none');
                            $(e.currentTarget).find('.fa-heart-o').addClass('d-none');
                        },
                    });
                }
            });



        });
    </script>
</body>

<!-- index-231:38-->

</html>
