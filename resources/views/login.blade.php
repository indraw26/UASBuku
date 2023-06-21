<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('login.css') }}">
    <link rel="stylesheet" href="{{ asset('cdn.jsdelivr.net_npm_bootstrap@5.3.0_dist_css_bootstrap.min.css') }}">
</head>


<body>
    <div class="container w-25 rounded-4">
        <div class="containter mx-auto custom">
            <h1>Login</h1>
            <br>
            @if (Session::has('registerSuccess'))
                <div class="alert alert-success">
                    <p>{{ Session::get('registerSuccess') }}</p>
                </div>
            @endif

            @if (Session::has('loginError'))
                <div class="alert alert-danger h-10">
                    <p>{{ Session::get('loginError') }}</p>
                </div>
            @endif

            <form action="/login" method="post">
                @csrf
                <label for="username" class="usn">Email</label>
                <input type="email" name="email" id="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror">
                @error('email')
                    <div class="invalid-feedback">
                        <small>Email yang dimasukkan salah!</small>
                    </div>
                @enderror
                <br>
                <label for="password" class="usn">Password</label>
                <input type="password" name="password" id="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror">
                @error('password')
                    <div class="invalid-feedback">
                        <small>Masukkan password</small>
                    </div>
                @enderror
                <br>
                <button type="submit">Login</button>
                <a href="recoveryPassword">Lupa Password</a>
                <p>Belum Punya Akun? <a href="sign-up">Daftar</a></p>
            </form>
        </div>
    </div>
    <script src="{{ asset("cdn.jsdelivr.net_npm_bootstrap@5.3.0_dist_js_bootstrap.bundle.min.js") }}"></script>
</body>
</html>
