<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

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
                    <div class="col-md-8 col-lg-6 col-xl-4 offset-lg-1">
                        <form action="{{ route('daftar') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div
                                class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start mb-1">
                                <p class="lead fw-bold mb-0 me-2 white">Register</p>
                            </div>

                            <div class="form-outline mb-1">
                                <label class="form-label white" for="email">Email</label>
                                <input type="email" id="email" class="form-control form-control-sm"
                                    placeholder="Masukan Email" name="email" required />
                            </div>

                            <div class="form-outline mb-1">
                                <label class="form-label white" for="name">Nama</label>
                                <input type="text" id="name" class="form-control form-control-sm"
                                    placeholder="Masukan Nama" name="name" required />
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-outline mb-1">
                                        <label class="form-label white" for="group">Group</label>
                                        <input type="text" id="group" class="form-control form-control-sm"
                                            placeholder="YumeLive / Re:Memories" name="group" required />
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-outline mb-1">
                                        <label class="form-label white" for="role">Role</label>
                                        <select type="text" class="form-select" id="role" name="role">
                                            <option value="Manager">Manager</option>
                                            <option value="VTuber">VTuber</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-outline mb-1">
                                        <label class="form-label white" for="youtube">Youtube link</label>
                                        <input type="text" id="youtube" class="form-control form-control-sm"
                                            placeholder="https://www.youtube.com/@somebody..." name="youtube_link" />
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-outline mb-1">
                                        <label class="form-label white" for="instagram">Instagram Link</label>
                                        <input type="text" id="instagram" class="form-control form-control-sm"
                                            placeholder="https://www.instagram.com/somebody/?hl=en"
                                            name="instagram_link" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-outline mb-1">
                                <label class="form-label white" for="url_gambar">Profile Picture</label>
                                <input id="url_gambar" type="file" class="form-control form-control-sm"
                                    name="url_gambar" required>
                            </div>

                            <div class="form-outline mb-1">
                                <label class="form-label white" for="password">Password</label>
                                <input type="password" id="password" name="password"
                                    class="form-control form-control-sm" placeholder="Masukan password" />
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

                            <div class="text-center text-lg-start mt-2 pt-2">
                                <button type="submit" class="btn btn-primary btn-sm"
                                    style="padding-left: 2.5rem; padding-right: 2.5rem;">Register</button>
                                <p class="small fw-bold mt-1 pt-1 mb-0 white">Sudah punya akun? <a
                                        href="{{ route('loginPage') }}" class="link-warning">Login</a></p>
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
