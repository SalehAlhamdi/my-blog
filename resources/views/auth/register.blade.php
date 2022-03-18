<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="/assets/css/templatemo-stand-blog.css">
    <link rel="stylesheet" href="/vendor/bootstrap/css/bootstrap.min.css">

</head>
<body style="background-color: #c9d4ff">
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="index.html"><h2>Personal Blog<em>.</em></h2></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>
<div class="container" style="margin-top: 0.5em">
    <div class="row">
        <div class="col-md-6 offset-md-3" >
            <div class="card"  style="background-color: #50576c;height:99%;font-size: larger">
                <div class="card-header" style="background-color: #6b7288;color: white">
                    Register
                </div>
                <div class="card-body" style="color: white">
                    @if(session()->has('success_add_user'))
                        <div class="alert alert-success">
                        {{session()->get('success_add_user')}}
                        </div>
                    @else
                        {{session()->get('fail_add_user')}}
                    @endif
                    <form action="{{route('register.submit')}}" method="post">
                        @csrf
                        <div class="mb-5" style="color: white">
                            <label for="username" class="form-label">Name</label>
                            <input type="text" class="form-control" id="username" name="username">
                            @error('username')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                            <div class="mb-5" style="color: white">
                            <label for="email" class="form-label">Email address</label>
                            <input type="text" class="form-control" id="email" name="email">
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-5" style="color: white">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                            @error('password')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-5" style="color: white">
                            <label for="password_confirmation" class="form-label">Password Confirmation</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                            @error('password_confirmation')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="text-center">
                            <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary" style="margin-top:10%;font-size: large">Register</button>
                        </div>
                            <span class=" fs-6">You  have already Account?,</span><a href="{{route('login')}}" class="text-decoration-none">Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
