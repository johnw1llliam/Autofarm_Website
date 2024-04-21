<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('Styles/Profile.css') }}">
    <link rel="icon" href="{{ asset('Images/Logo.png') }}" type="Image/x-icon">
    <title>Automafarm - Profile</title>
</head>
<body>        
    <div class="container">
        <div class="KotakLuar">
            <div class="KotakTengah">
                <div class="left-box">
                    <div class="welcome-user">Welcome {{ $user[0]->Name }}</div>
                    <div class="line"></div>
                    <div class="biodata">{{ $user[0]->Biodata }}</div>
                    <div class="line"></div>
                    <div class="teks-farm">A U T O M A F A R M</div>
                </div>
                <div class="right-box">
                    <form method="post" actions="/profile">
                        @csrf
                        <div class="name-biodata2">NAME</div>
                        <div class="input-name">
                            <input type="text" class="inputnama form-control @error('Name') is-invalid @enderror" required value="{{ old('Name') }}" name="Name">
                            @error('Name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="name-biodata2">BIODATA</div>
                        <div class="input-name">
                            <textarea name="Biodata" class="form-control @error('Biodata') is-invalid @enderror" value="{{ old('Biodata') }}" id="inputbio" cols="54" rows="5"></textarea>
                            @error('Biodata')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="button-container">
                            <a href="/dashboard" class="btn-cancel">Cancel</a>
                            <button class="btn-save" type="submit">Save Changes</button>
                        </div>
                    </form>
                </div>                  
            </div>
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>