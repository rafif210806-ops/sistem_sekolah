<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - SMA Namira</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background: linear-gradient(135deg, #0d6efd, #0a58ca);
            min-height: 100vh;
        }

        .login-card{
            border: none;
            border-radius: 20px;
        }

        .logo{
            width: 80px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center align-items-center min-vh-100">

        <div class="col-md-5">

            <div class="card shadow-lg login-card">
                <div class="card-body p-5">

                    <div class="text-center mb-4">
                        <h2 class="fw-bold">SMA Namira</h2>
                        <p class="text-muted">Login Administrator</p>
                    </div>

                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form action="/login" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text"
                                   name="username"
                                   class="form-control"
                                   required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Password</label>
                            <input type="password"
                                   name="password"
                                   class="form-control"
                                   required>
                        </div>

                        <button type="submit"
                                class="btn btn-primary w-100">
                            Login
                        </button>

                        <div class="text-center mt-3">
                            <a href="/register">
                                Belum punya akun? Daftar
                            </a>
                        </div>

                    </form>

                </div>
            </div>

        </div>

    </div>
</div>

</body>
</html>