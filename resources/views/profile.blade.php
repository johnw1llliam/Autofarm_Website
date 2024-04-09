<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('Styles/Profile.css') }}">
    <link rel="icon" href="{{ asset('Images/Logo.png') }}" type="Image/x-icon">
    <title>Automafarm - Profile</title>
</head>
<body>        
    <div class="container">
        <div class="KotakLuar">
            <div class="KotakTengah">
                <div class="left-box">
                    <div class="welcome-user">Welcome (User)</div>
                    <div class="line"></div>
                    <div class="circle">
                        <div class="inner-circle"></div>
                    </div>
                    <div class="welcome-user">User</div>
                    <div class="line"></div>
                    <div class="biodata">isi biodata</div>
                    <div class="line"></div>
                    <div class="teks-farm">A U T O M A F A R M</div>
                </div>
                <div class="right-box">
                    <!-- Content for the right box -->
                    <div class="circle circle right">
                        <div class="inner-circle"></div>
                    </div>
                    <div class="centered-btn">
                        <button class="upload-btn">
                            Upload your avatar
                        </button>
                    </div>
                    <div class="name-biodata2">NAME</div>
                    <div class="input-name">
                        <input type="text" class="inputnama">
                    </div>
                    <div class="name-biodata2">BIODATA</div>
                    <div class="input-name">
                        <textarea name="" id="inputbio" cols="54" rows="5"></textarea>
                    </div>
                </div>
                <div class="buttons-bottom">
                    <div class="dua-buttons">
                        <button class="btn-cancel">Cancel</button>
                        <button class="btn-save" onclick="">Save Changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>