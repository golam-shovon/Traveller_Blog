<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="/images/icons/favicon.ico"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/vendor/animate/animate.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/vendor/select2/select2.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/css/util.css">
    <link rel="stylesheet" type="text/css" href="/css/maintablev2.css">
<!--===============================================================================================-->  
    <meta name="_token" content="{{ csrf_token() }}">
    <!-- Favicon -->
    <link rel="icon" href="/img/core-img/favicon.ico">

    <!-- Core Stylesheet -->
    <link href="/style.css" rel="stylesheet">

    <!-- Responsive CSS -->
    <link href="/css/responsive/responsive.css" rel="stylesheet">		
	<title>Reportes Articles</title>
</head>
<body>
    <!-- ***** Header Area Start ***** -->
    <header class="header_area" id="header">
        <div class="container-fluid h-100">
            <div class="row h-100">
                <div class="col-12 h-100">
                    <nav class="h-100 navbar navbar-expand-lg">
                        <a class="navbar-brand" href="{{route('home.index')}}"><img src="/img/core-img/logo.png" alt=""></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#dorneNav" aria-controls="dorneNav" aria-expanded="false" aria-label="Toggle navigation"><span class="fa fa-bars"></span></button>
                        <!-- Nav -->
                        <div class="collapse navbar-collapse" id="dorneNav">
                            <ul class="navbar-nav mr-auto" id="dorneMenu">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('home.index')}}">HOME <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('tourLocationUser.index')}}">TOUR LOCATIONS <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('article.index')}}">ARTICLES <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="contact.html">CONTACT</a>
                                </li>
                            </ul>

                            @if(session()->has('user_id'))
                                <!-- Signin btn -->
                                <div class="dorne-signin-btn">
                                    <a href="{{route('logout.index')}}">SIGN OUT</a>
                                </div>
                            @else
                                <!-- Signin btn -->
                                <div class="dorne-signin-btn">
                                    <a href="{{route('login.index')}}">SIGN IN OR REGISTER</a>
                                </div>
                            @endif
                            @if(session()->has('user_id'))
                            <!-- Add listings btn -->
                            <div class="dorne-add-listings-btn">
                                <a href="{{route('user.showprofile', [session()->get('user_id')])}}" class="btn dorne-btn">{{$username}}</a>
                            </div>
                            @endif
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Breadcumb Area Start ***** -->
    <div class="breadcumb-area height-400 bg-img bg-overlay" style="background-image: url(/img/bg-img/sajek.jpg)">
    </div>
    <!-- ***** Breadcumb Area End ***** -->
    
		<h2>Reported Posts </h2>


    <div class="limiter">
        <div class="container-table100">
            <div class="wrap-table100">
                    <div class="table">
                        <div class="row header">
                            <div class="cell">
                                Article
                            </div>

                            <div class="cell">
                                Report
                            </div>

                            <div class="cell">
                                Do Not Show Post
                            </div> 

                            <div class="cell">
                                Wrong Report
                            </div>   
                                                                            
                        </div>
                        @foreach($post_reports as $post_report)     


                        <div class="row">

                            <div class="cell" data-title="Article">
                                {{$post_report->article}}
                                <br>
                                @foreach($article_images as $img)
                                    @if($img->article_id==$post_report->article_id)
                                        <img src="{{asset('upload/'.$img->image)}}" width="100px" height="100px" />
                                    @endif
                                @endforeach
                            </div>
                            
                            <div class="cell" data-title="Report">
                                {{$post_report->report}}
                            </div>

                            <div class="cell" data-title="Do Not Show Post">
                                <form method="post">
                                     @csrf
                                        <input type="checkbox" name="statusyes[]" value={{$post_report->report_id }} >do not show post 
                            </div>

                            <div class="cell" data-title=" Wrong Report">
                                 <input type="checkbox" name="statusno[]" value={{$post_report->report_id}} >wrong report   
                            </div>

                        </div> 
                        @endforeach 

                        <div class="row">
                                <div class="cell" data-title="Article">
                                    <input type="submit" name="submit" value="Submit" />
                                </div>
                       </div>                                                                          
                    </div>

                </div>
            </div>
        </div>
    </div>    


        <!-- ****** Footer Area Start ****** -->
        <footer class="dorne-footer-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 d-md-flex align-items-center justify-content-between">
                    <div class="footer-text">
                        <p>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                    <div class="footer-social-btns">
                        <a href="#"><i class="fa fa-linkedin" aria-haspopup="true"></i></a>
                        <a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-twitter" aria-haspopup="true"></i></a>
                        <a href="#"><i class="fa fa-facebook" aria-haspopup="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ****** Footer Area End ****** -->
<!--===============================================================================================-->  
    <script src="/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
    <script src="/vendor/bootstrap/js/popper.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
    <script src="/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
    <script src="/js/main.js"></script>
    <script src="/js/main.js"></script>
    <!-- jQuery-2.2.4 js -->
    <script src="/js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="/js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap-4 js -->
    <script src="/js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="/js/others/plugins.js"></script>
    <!-- Google Maps js -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDk9KNSL1jTv4MY9Pza6w8DJkpI_nHyCnk"></script>
    <script src="/js/google-map/location-map-active.js"></script>
    <!-- Active JS -->
    <script src="/js/active.js"></script>  
</body>
</html>