<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- You can also include your custom CSS file here -->
    <style>
        .blue {
            background-color: #0e1d34;
        }

        .white {
            color: #ffffff;
        }
    </style>
</head>

<body>
    <div class="d-flex align-items-center justify-content-center min-vh-100 blue">
        <section class="">
            <div class="container-fluid">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-md-9 col-lg-6 col-xl-5">
                        <img src="assets/img/logo_app.png" class="img-fluid" alt="Sample image">
                    </div>
                    <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-2">
                        <form action="{{ route('masuk') }}" method="POST">
                            @csrf
                            <div
                                class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start mb-3">
                                <p class="lead fw-bold mb-0 me-3 white">Login</p>
                            </div>

                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <label class="form-label white" for="email">Email</label>
                                <input type="email" id="email" class="form-control form-control-lg"
                                    placeholder="Masukan Email" name="email"/>
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-3">
                                <label class="form-label white" for="password">Password</label>
                                <input type="password" id="password" class="form-control form-control-lg"
                                    placeholder="Masukan password" name="password" />
                            </div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="text-center text-lg-start mt-4 pt-2"> 
                                <button type="submit" class="btn btn-primary btn-sm"
                                    style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                                <p class="small fw-bold mt-2 pt-1 mb-0 white">Buat akun disini -> <a
                                        href="{{ route('registerPage') }}" class="link-warning">Register</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script></script>
</body>

</html>
