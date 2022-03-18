<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">
    <title>Personal Blog Posts</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/templatemo-stand-blog.css">
    <link rel="stylesheet" href="assets/css/owl.css">
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
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('add.post')}}">أضافة منشور
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('edit.post')}}">تعديل منشوراتي</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('edit.user')}}">تعديل حسابي</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="btn btn-primary" href="{{route('auth.logout')}}">تسجيل الخروج</a>
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
            <div class="card-body">
            </div>
        </div>
        <form action="{{route('add-post.submit')}}" method="post" enctype="multipart/form-data">
            @csrf
            @if(session()->has('success-post'))
                <div class="alert alert-success">
                    {{session()->get('success-post')}}
                </div>
            @endif
            <div class="form-group">
                <label for="exampleFormControlInput1">العنوان</label>
                <input type="title" class="form-control" id="title" name="title" placeholder="Title Name">
                @error('title')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">الوصف</label>
                <textarea class="form-control" id="subject" placeholder="Subject body" name="subject" rows="5"></textarea>
                @error('subject')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <label for="exampleFormControlTextarea1">ارفق صورة</label>

            <div class="form-group">
                <img id="previewImg" style="max-width: 500px">
                <input  type="file" class="form-control" id="file" name="file" onchange="previewFile(this)">
                @error('file')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">نشر</button>
        </form>
    </div>
</div>

<!-- Banner Ends Here -->


<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="social-icons">
                    <li><a href="#">Facebook</a></li>
                    <li><a href="#">Twitter</a></li>
                    <li><a href="#">Linkedin</a></li>
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
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Additional Scripts -->
<script src="assets/js/custom.js"></script>
<script src="assets/js/owl.js"></script>
<script>
    function previewFile(input){
        var file=$('input[type=file]').get(0).files[0];
        if(file){
            var reader= new FileReader();
            reader.onload=function (){
                $('#previewImg').attr('src',reader.result);
            }
            reader.readAsDataURL(file);
        }
    }
</script>
</body>
</html>


