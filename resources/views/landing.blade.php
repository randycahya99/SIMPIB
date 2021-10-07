<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <link href="{{ URL::asset('landing/assets/img/logo unsoed.png') }}" rel="shortcut icon" />

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        <style>
            .carousel-item {
                height: 100vh;
                min-height: 350px;
                background: no-repeat center center scroll;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
            }

            section {
                padding-top: 5rem;
                padding-bottom: 5rem;
            }

            .lnr {
                display: inline-block;
                fill: currentColor;
                width: 1em;
                height: 1em;
                vertical-align: -0.05em;
                stroke-width: 1;
            }

            .services-icon {
                margin-bottom: 20px;
                font-size: 30px;
            }

            bgc2, .vLine, .hLine {
                background-color: #0F52BA;
            }

            .quote-icon {
                font-size: 40px;
                margin-bottom: 20px;
            }

            .services-icon {
                font-size: 60px;
                margin-left: 2rem;
            }
        </style>

        <title>Pusat Inkubator Bisnis UNSOED</title>
    </head>
    <body>
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <div class="container">
                <div class="col-md-1">
                    <img src="{{URL::asset('landing/assets/img/logo unsoed.png')}}" alt="" width="40px" height="40px">
                </div>
                <a class="navbar-brand" href="#">Pusat Inkubator Bisnis UNSOED</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="/">Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="/registration">Registrasi</a>
                        </li> --}}
                        <li class="nav-item">
                            <a class="nav-link" href="/login">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <header>
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">

                    <!-- {{$i = 0}} -->

                    @foreach ($foto as $fotos)

                        @if ($i == 0)
                            <!-- {{$aktif = "active"}} -->
                        @else
                            <!-- {{$aktif = ""}} -->
                        @endif

                    <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}" class="{{$aktif}}"></li>

                    <!-- {{$i++}} -->

                    @endforeach
                
                </ol>
                <div class="carousel-inner" role="listbox">

                    <!-- {{$i = 0}} -->

                    @foreach ($foto as $fotos)

                        @if ($i == 0)
                            <!-- {{$aktif = "active"}} -->
                        @else
                            <!-- {{$aktif = ""}} -->
                        @endif

                    <!-- Slide One - Set the background image for this slide in the line below -->
                    <div class="carousel-item {{$aktif}}" style="background-image: url('/landing/{{$fotos->foto}}')">
                        <div class="carousel-caption d-none d-md-block">
                            <h2 class="display-4">{{$fotos->judul}}</h2>
                            <p class="lead">{{$fotos->sub_judul}}</p>
                        </div>
                    </div>

                    <!-- {{$i++}} -->

                    @endforeach

                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </header>

        <!-- Page Content -->
        <section class="py-5 text-center">
            <div class="container"> 
                <h2 class="text-center">Luckmoshy`s Services</h2>
                <p class="text-muted mb-5 text-center">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</p>
                <div class="row">
                    <div class="col-sm-6 col-lg-4 mb-3">
                        <svg class="lnr text-primary services-icon">
                            <use xlink:href="#lnr-magic-wand"></use>
                        </svg>
                        <h6>Ex cupidatat eu</h6>
                        <p class="text-muted">Ex cupidatat eu officia consequat incididunt labore occaecat ut veniam labore et cillum id et.</p>
                    </div>
                    <div class="col-sm-6 col-lg-4 mb-3">
                        <svg class="lnr text-primary services-icon">
                            <use xlink:href="#lnr-heart"></use>
                        </svg>
                        <h6>Tempor aute occaecat</h6>
                        <p class="text-muted">Tempor aute occaecat pariatur esse aute amet.</p>
                    </div>
                    <div class="col-sm-6 col-lg-4 mb-3">
                        <svg class="lnr text-primary services-icon">
                            <use xlink:href="#lnr-rocket"></use>
                        </svg>
                        <h6>Voluptate ex irure</h6>
                        <p class="text-muted">Voluptate ex irure ipsum ipsum ullamco ipsum reprehenderit non ut mollit commodo.</p>
                    </div>
                    <div class="col-sm-6 col-lg-4 mb-3">
                        <svg class="lnr text-primary services-icon">
                            <use xlink:href="#lnr-paperclip"></use>
                        </svg>
                        <h6>Tempor commodo</h6>
                        <p class="text-muted">Tempor commodo nostrud ex Lorem occaecat duis occaecat minim.</p>
                    </div>
                    <div class="col-sm-6 col-lg-4 mb-3">
                        <svg class="lnr text-primary services-icon">
                            <use xlink:href="#lnr-screen"></use>
                        </svg>
                        <h6>Et fugiat sint occaecat</h6>
                        <p class="text-muted">Et fugiat sint occaecat voluptate incididunt anim nostrud ea cillum cillum consequat.</p>
                    </div>
                    <div class="col-sm-6 col-lg-4 mb-3">
                        <svg class="lnr text-primary services-icon">
                            <use xlink:href="#lnr-inbox"></use>
                        </svg>
                        <h6>Et labore tempor et</h6>
                        <p class="text-muted">Et labore tempor et adipisicing dolor.</p>
                    </div>
                </div>
            </div>
        </section>


        <section class="main">
            <div class="container mt-4">
                <h1 class="text-center mb-4 p-4 text-secondary">From The Blog</h1>
                <div class="row">

                    <div class="card-columns">
                        <div class="card shadow border-0">
                            <img class="card-img-top" src="https://4.bp.blogspot.com/-InDD3Hm_bhU/XB4_TK3TT7I/AAAAAAAAAJ4/r5tUeCOqq1MTchFh7D7pWdf582A4qYIIwCEwYBhgL/s1600/Businesswoman-working-at-a-computer-1280x720.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Card title that wraps to a new line</h5>
                                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            </div>
                        </div>
                        <div class="card shadow border-0  p-3">
                            <blockquote class="blockquote mb-0 card-body">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                                <footer class="blockquote-footer">
                                    <small class="text-muted">
                                        Someone famous in <cite title="Source Title">Source Title</cite>
                                    </small>
                                </footer>
                            </blockquote>
                        </div>
                        <div class="card shadow border-0">
                            <img class="card-img-top" src="https://4.bp.blogspot.com/-InDD3Hm_bhU/XB4_TK3TT7I/AAAAAAAAAJ4/r5tUeCOqq1MTchFh7D7pWdf582A4qYIIwCEwYBhgL/s1600/Businesswoman-working-at-a-computer-1280x720.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                        </div>
                        <div class="card shadow border-0 bg-primary text-white text-center p-3">
                            <blockquote class="blockquote mb-0">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat.</p>
                                <footer class="blockquote-footer">
                                    <small>
                                        Someone famous in <cite title="Source Title">Source Title</cite>
                                    </small>
                                </footer>
                            </blockquote>
                        </div>
                        <div class="card shadow border-0 text-center">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This card has a regular title and short paragraphy of text below it.</p>
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                        </div>
                        <div class="card shadow border-0">
                            <img class="card-img" src="https://4.bp.blogspot.com/-InDD3Hm_bhU/XB4_TK3TT7I/AAAAAAAAAJ4/r5tUeCOqq1MTchFh7D7pWdf582A4qYIIwCEwYBhgL/s1600/Businesswoman-working-at-a-computer-1280x720.jpg" alt="Card image">
                        </div>
                        <div class="card shadow border-0 p-3 text-right">
                            <blockquote class="blockquote mb-0">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                                <footer class="blockquote-footer">
                                    <small class="text-muted">
                                        Someone famous in <cite title="Source Title">Source Title</cite>
                                    </small>
                                </footer>
                            </blockquote>
                        </div>
                        <div class="card shadow border-0">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This is another card with title and supporting text below. This card has some additional content to make it slightly taller overall.</p>
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
   
        {{-- <!-- Header -->
        <header class="bg-primary text-center py-5 mb-4">
            <div class="container">
                <h1 class="font-weight-light text-white">Meet the Team</h1>
            </div>
        </header>

        <!-- Page Content -->
        <div class="container">
            <div class="row">
                <!-- Team Member 1 -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-0 shadow">
                        <img src="https://source.unsplash.com/TMgQMXoglsM/500x350" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <h5 class="card-title mb-0">Team Member</h5>
                            <div class="card-text text-black-50">Web Developer</div>
                        </div>
                    </div>
                </div>
                <!-- Team Member 2 -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-0 shadow">
                        <img src="https://source.unsplash.com/9UVmlIb0wJU/500x350" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <h5 class="card-title mb-0">Team Member</h5>
                            <div class="card-text text-black-50">Web Developer</div>
                        </div>
                    </div>
                </div>
                <!-- Team Member 3 -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-0 shadow">
                        <img src="https://source.unsplash.com/sNut2MqSmds/500x350" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <h5 class="card-title mb-0">Team Member</h5>
                            <div class="card-text text-black-50">Web Developer</div>
                        </div>
                    </div>
                </div>
                <!-- Team Member 4 -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-0 shadow">
                        <img src="https://source.unsplash.com/ZI6p3i9SbVU/500x350" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <h5 class="card-title mb-0">Team Member</h5>
                            <div class="card-text text-black-50">Web Developer</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div> --}}

        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <blockquote class="blockquote text-center mb-0">
                        <svg class="lnr text-muted quote-icon pull-left">
                            <use xlink:href="#lnr-heart"></use>                                       
                        </svg>
                        <p class="mb-0">Keep in touch with me for more Theme  right here!</p>
                        <footer class="blockquote-footer">Luckmoshy Designing
                            <cite title="Source Title">Webublog @</cite>
                        </footer>
                    </blockquote>
                </div>
                <div class="col-md-4">
                    <a class="flot-right btn btn-white border-0 rounded shadow post-pager-link p-0 next ml-4" href="">
                        <span class="d-flex h-100">
                            <span class="p-3 d-flex flex-column justify-content-center w-100">
                                <div class="indicator mb-1 text-uppercase text-muted">webublog<i class="fa fa-bars ml-2"></i></div>
                                    <p class="f-13">See next awesome themes</p>
                            </span>
                            <span class="bg-primary p-2 d-flex align-items-center text-white">
                                <i class="fa fa-arrow-circle-right"></i>
                            </span>
                        </span>
                    </a>
                </div>
            </div>
        </div>
        <!-- /.container -->


        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="https://cdn.linearicons.com/free/1.0.0/svgembedder.min.js"></script>

    </body>
</html>


{{-- 
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Inkubator Bisnis UNSOED</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://vapor.laravel.com">Vapor</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
    </body>
</html> --}}
