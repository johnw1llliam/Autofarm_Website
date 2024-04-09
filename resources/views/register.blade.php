<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Register Page</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="{{ asset('Styles/registerstyles.css') }}">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-lg-6 offset-lg-8 col-md-8 offset-md-4">
            <div class="register-container">
                <img src="{{ asset('Images/Logo.png') }}" class="logo"> <br>
                <h8 class="mb-4 teksregister">Register your account</h8> <br>
                <h8 class="mb-4">See what's going on with your bussiness</h8> <br>
                <form method="post" actions="/register">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="Email" id="Email" class="form-control @error('Email') is-invalid @enderror" required value="{{ old('Email') }}">
                        @error('Email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Username</label>
                        <input type="text" name="Username" id="Username" class="form-control @error('Username') is-invalid @enderror" required value="{{ old('Username') }}">
                        @error('Username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="Name" id="Name" class="form-control @error('Name') is-invalid @enderror" required value="{{ old('Name') }}">
                        @error('Name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="Password" id="Pasword" class="form-control @error('Password') is-invalid @enderror" required>
                        @error('Password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="NamaKandang">Poultry Name</label>
                        <input type="text" name="NamaKandang" id="NamaKandang" class="form-control @error('NamaKandang') is-invalid @enderror" required>
                        @error('NameKandang')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary btn-register">Register</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>