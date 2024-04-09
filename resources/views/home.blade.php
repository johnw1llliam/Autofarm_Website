<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Automafarm - Home</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="{{ asset('Styles/index.css') }}">
<link rel="icon" href="{{ asset('Images/Logo.png') }}" type="Image/x-icon">
</head>
<body>
<header>
        <div>
            <a style="color: white;" href="/home">A U T O M A F A R M</a>
        </div>
        <nav>
            <a style="color: black;" href="/home">Home</a>
            <a style="color: white;" href="/about" >About</a>
        </nav>
        <a href="/login"><button>Login/Register</button></a>
</header>
<div class="container2">
    <div class="gambar">
    <img src="{{ asset('Images/Halaman.png') }}" class="GambarAyam">
        <div class="Content">
            <div class="Center">
                <img src="{{ asset('Images/Logo.png') }}" class="GambarJudul">
            </div>
            <h2 class="Judul">- MANAGEMENT MADE EASY -
                <div class="container3">
                    <div>
                        <img src="{{ asset('Images/Content1.png') }}" class="Gambarkonten1">
                    </div>
                    <div>
                        <img src="{{ asset('Images/Content2.png') }}" class="Gambarkonten2">
                    </div>
                </div>
            </h2>
            <h2 class="Judul2"> GET THE APP ON :</h2>
            <div class="container4">
                <img src="{{ asset('Images/DownloadGoogle.png') }}" class="GambarGoogle">
                <img src="{{ asset('Images/DownloadAppStore.png') }}" class="GambarApple">
            </div>
            <div class="Dashboard">
                <br>
                <a style="color : black" href="Dashboard.html">or use online Dashboard</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
