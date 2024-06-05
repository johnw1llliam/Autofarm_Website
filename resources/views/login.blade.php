<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Page</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="{{ asset('Styles/loginstyles.css') }}">
</head>
<body background="{{ asset('Images/Halaman.png') }}">
<div class="container">
    <div class="row">
        <div class="col-lg-6 offset-lg-8 col-md-8 offset-md-4">
            <div class="login-container">
                <img src="{{ asset('Images/Logo.png') }}" class="logo"> <br>
                @if(session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                @if(session()->has('loginError'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('loginError') }}
                    </div>
                @endif
                <h8 class="mb-4 tekslogin">Login to your account</h8> <br>
                <h8 class="mb-4">See what's going on with your business</h8> <br>
                <form class="formlogin" method="post" action="/auth">
                @csrf
                    <div class="form-group">
                        <label for="Email" class="teksusername">E-Mail</label>
                        <input type="text" id="Email" name="Email" class="form-control usr @error('Email') is-invalid @enderror" required autofocus value="{{ old('Email') }}">
                        @error('Email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="Password">Password</label>
                        <input type="password" id="Password" name="Password" class="form-control pwd" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-login btnsubmit">Login</button>
                </form>
                <a href="register">
                    <button class="btn btn-primary btn-login btnsubmit">Register</button>
                </a>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
