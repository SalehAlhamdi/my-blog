<html lang="en">
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="/assets/css/templatemo-stand-blog.css">
    <link rel="stylesheet" href="/vendor/bootstrap/css/bootstrap.min.css">
</head>
<body style="background-color: #c9d4ff">
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="{{route('dashboard')}}"><h2>Personal Blog<em>.</em></h2></a>
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
                    Login
                </div>
                <div class="card-body" style="color: white">

                    <form action="{{route('auth.check')}}" method="post">
                        <div class="card-body">
                        @if(session()->get('fail'))
                                <div class="alert alert-danger">
                                    {{session()->get('fail')}}
                                </div>
                        @endif
                        </div>
                        @csrf
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
                            @error('subject')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="text-center">
                            <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary" style="margin-top:10%;font-size: large">Login</button>
                        </div>
                        </div>

                        <span class=" fs-6">Dont Have Account?,</span><a href="{{route('register')}}" class="text-decoration-none">Create Account</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
