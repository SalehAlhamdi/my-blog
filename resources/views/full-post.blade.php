<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <title>Personal Blog Posts</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="/vendor/bootstrap/css/bootstrap.min.css">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="/assets/css/templatemo-stand-blog.css">
    <link rel="stylesheet" href="/assets/css/owl.css">
    <!--

    TemplateMo 551 Stand Blog

    https://templatemo.com/tm-551-stand-blog

    -->
</head>

<body>

<!-- ***** Preloader Start ***** -->
<div id="preloader">
    <div class="jumper">
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>
<!-- ***** Preloader End ***** -->

<!-- Header -->
<header class="">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{route('dashboard')}}"><h2>سوق<em>.</em>كوم</h2></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('dashboard')}}">الرئيسية
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('add.post')}}">أضافة منشور
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('edit.post')}}">تعديل منشوراتي</a>
                        <span class="sr-only">(current)</span>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('edit.user')}}">تعديل حسابي</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="btn btn-primary" href="{{route('auth.logout')}}">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<!-- Page Content -->
<!-- Banner Starts Here -->
<div class="main-banner header-text">
    <div class="container">
        <div class="owl-banner owl-carousel">
        </div>
    </div>
</div>
<!-- Banner Ends Here -->
<section class="blog-posts">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="all-blog-posts ">
                    <div class="row">
                        <div class="col-lg-12">
                                <div class="blog-post"> {{--                            here you can repeat posts--}}
                                    <div class="blog-thumb">
                                        <img src="{{asset('images')}}/{{$post->imgProfile}}" alt="">
                                    </div>
                                    <div class="down-content">
                                        <span>Title</span>
                                        <h4>{{$post->title}}</h4>
                                        <ul class="post-info">
                                            {{--                                                {{$post[$x]->user_id-1}}  this loop of to access posts there user id of it who create it  --}}
                                            {{--                                                accessing username from posts by user_id--}}
                                            <li>{{$user[$post->user_id]->name}}</li>
                                            <li>{{Str::substr($post->created_at,0,10)}}</li>
                                        </ul>
                                        <hr>
                                        <h2>{{$post->body}}</h2>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="sidebar">
                    <div class="col-lg-12">
                        <div class="sidebar-item recent-posts">
                            <div class="sidebar-heading">
                                <h2>المنشورات الاخيرة</h2>
                                @for($x=0;$x<3;$x++)
                                    <span><a href="/full-post/{{session()->get('lastPosts')[$x]->id}}">{{session()->get('lastPosts')[$x]->title}}</a></span>
                                    <hr>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

<!-- Banner Ends Here -->


<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="social-icons">
                    <li><a href="#">Facebook</a></li>
                    <li><a href="#">Twitter</a></li>
                    <li><a href="#">Behance</a></li>
                    <li><a href="#">Linkedin</a></li>
                    <li><a href="#">Dribbble</a></li>
                </ul>
            </div>
            <div class="col-lg-12">
                <div class="copyright-text">
                    <p>By Saleh alhamdi</p>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap core JavaScript -->
<script src="/vendor/jquery/jquery.min.js"></script>

<!-- Additional Scripts -->
<script src="/assets/js/custom.js"></script>
<script src="/assets/js/owl.js"></script>
</body>
</html>


