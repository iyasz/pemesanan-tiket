<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TiketKu | Login - Pemesanan Tiket Pesawat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset("css/style.css")}}">
</head>
<body>
    
    <div class="container auth-login">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-8 col-12">
                <form action="/login" method="get">
                    @csrf
                    <div class="text-center">
                        <h4 class="fw-300 fs-sm mb-3">Admin Kasir Penerbangan</h4>
                    </div>
                    <div class="card border-0 shadow-sm mx-3">
                        <div class="card-body mx-3">
                            @error("allAuth")
                            <div class="alert alert-danger text-center fs-s-sm" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                            <div class="mb-3">
                                <label class="mb-1 fs-s-sm opacity-75">Username</label>
                                <input type="text" name="username" class="form-control fs-s-sm @error("username") is-invalid @enderror">
                                @error("username") <p class="fs-s-sm mb-0 fw-300 text-danger">{{$message}}</p> @enderror
                            </div>
                            <div class="mb-4">
                                <label class="mb-1 fs-s-sm opacity-75">Password</label>
                                <input type="text" name="password" class="form-control fs-s-sm @error("password") is-invalid @enderror">
                                @error("password") <p class="fs-s-sm mb-0 fw-300 text-danger">{{$message}}</p> @enderror
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary w-100 rounded-1 fs-s-sm fw-500 py-2">Sign In</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>