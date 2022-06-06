<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{config('app.name')}} @yield('title')</title>

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/unicons.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">

    <!-- MAIN STYLE -->
    <link rel="stylesheet" href="{{asset('css/tooplate-style.css')}}">
    @yield('header')
<!--

Tooplate 2115 Marvel

https://www.tooplate.com/view/2115-marvel

-->
  </head>
  <body>
    <!-- MENU -->
    <nav class="navbar navbar-expand-sm navbar-light">
        <div class="container">
            <a class="navbar-brand" href="index.html"><i class='uil uil-user'></i> Catesol</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a href="{{route('project.index')}}" class="nav-link"><span data-hover="Projects">Projects</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('school.index')}}" class="nav-link"><span data-hover="School">School</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link"><span data-hover="Contact">Contract</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('logout')}}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();" class="nav-link"><span data-hover="Logout">Logout</span></a>
                    </li>
                    <form id="logout-form" method="POST" action="{{ route('logout') }}">
                        @csrf
                    </form>
                </ul>
                <ul class="navbar-nav ml-lg-auto">
                    <div class="ml-lg-4">
                      <div class="color-mode d-lg-flex justify-content-center align-items-center">
                        <i class="color-mode-icon"></i>
                        Color mode
                      </div>
                    </div>
                </ul>
            </div>
        </div>
    </nav>

    @yield('breadcrumb')
    <section class="about full-screen d-lg-flex justify-content-center align-items-center" id="about">
        <div class="container">
            @include('sweetalert::alert')
            @yield('content')
        </div>
    </section>
    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/Headroom.js')}}"></script>
    <script src="{{asset('js/jQuery.headroom.js')}}"></script>
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/smoothscroll.js')}}"></script>
    <script src="{{asset('js/custom.js')}}"></script>
    <script src="{{asset('js/Ajax/programmeSchedule.js')}}"></script>
    <script src="{{asset('js/Ajax/address.js')}}"></script>
    <script src="{{asset('js/Ajax/sectionPin.js')}}"></script>
    <script>
        function printContent(el){
        var restorepage = $('body').html();
        var printcontent = $('#' + el).clone();
        $('body').empty().html(printcontent);
        window.print();
        $('body').html(restorepage);
        }
    </script>

    <script>
        $(document).ready(function (e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#picture').change(function(){
                let reader = new FileReader();
                reader.onload = (e) => { 
                    $('#picture_preview_container').attr('src', e.target.result); 
                }
                reader.readAsDataURL(this.files[0]); 
            });
        });
    </script>
    @yield('footer')
    </body>
</html>