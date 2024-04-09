<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="Styles/Dashboard.css">
    <link rel="icon" href="Images/Logo.png" type="Image/x-icon">
</head>
<body>
    <div class="container">
        <div class="KotakLuar">
            <div class="KotakTengah">
                <div class="Left">
                    @foreach ($kandangs as $kandang)
                        <h4> MY LIVESTOCK<br> < {{ $kandang->NamaKandang }} ></Poultry></h4>
                    @endforeach
                </div>
                <div class="Center">
                    <h3> A U T O M A F A R M <br> ONLINE DASHBOARD VIEW</h3>
                </div>
                <div class="Rights">
                    <div class="Logout">
                        <form action="/logout" method="post">
                            @csrf
                            Welcome User! <button>Logout</button>
                        </form>
                    </div>
                </div>
                <div class="KotakDalam">
                    <div class="KotakIsi">
                        <div class="PageJudul">
                            <h3>Poultry Farm Statistic</h3>
                        </div>
                        <div class="PagePoultry">
                            @foreach ($kandangs as $kandang)
                                <div class="Page1"><h4>FoodStock</h4> <img src="Images/Daging.png" alt="" class="Icon1"> {{ $kandang->TotalPakan }} Gram</div>
                                <div class="Page1"><h4>Total Water</h4> <img src="Images/Water.png" alt="" class="Icon1"> {{ $kandang->TotalAir }} Liter</div>
                            @endforeach
                        </div>
                    </div>
                    <div class="KotakIsi">
                        <div class="PageJudul">
                            <h3>Activity History</h3>
                        </div>
                        <div class="PageActivityGrid">
                            @foreach ($aktivitases as $aktivitas)
                                @if ($aktivitas->JumlahPakan != 0)
                                    <div class="PageActivity1">
                                        Feeding <br>
                                        {{ DateTime::createFromFormat('Y-m-d H:i:s', $aktivitas->Waktu)->format('H:i') }} <br> <br> <br>
                                        {{ $aktivitas->JumlahPakan }} Gram
                                    </div>
                                @endif
                                @if ($aktivitas->JumlahAir != 0)
                                    <div class="PageActivity2">
                                        Watering <br>
                                        {{ DateTime::createFromFormat('Y-m-d H:i:s', $aktivitas->Waktu)->format('H:i') }} <br> <br> <br>
                                        {{ $aktivitas->JumlahAir }} liter
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="KotakIsi">
                        <div class="PageJudul">
                            <h3>Food Details</h3>
                        </div>
                        <div class="PageFood">
                            <div class="PageSubFood">
                                FOOD USED
                                @php
                                    $totalJumlahPakan = $aktivitases->sum('JumlahPakan');
                                @endphp
                                <h1 style="color : blue">{{ $totalJumlahPakan }} GRAM</h1>
                            </div>
                            <div class="PageGridSub">
                                <div class="PageGridInSub">
                                    Max Food
                                </div>
                                <div class="PageGridInSub">
                                    2000 Gram
                                </div>
                                <div class="PageGridInSub">
                                    Food Left
                                </div>
                                <div class="PageGridInSub">
                                    @foreach ($kandangs as $kandang)
                                        {{ $kandang->TotalPakan }} Gram
                                    @endforeach
                                </div>
                                <div class="PageGridInSub">
                                    Food Used
                                </div>
                                <div class="PageGridInSub">
                                    26%
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="KotakIsi">
                        <div class="PageJudul">
                            <h3>Water Details</h3>
                        </div>
                        <div class="PageWater">
                            <div>
                                <p><span class="PageWaterSub">1225 ml</span> of maximum 4L</p>
                                <p style="color: gray;"><i class="bi bi-clock"></i>Last Watering 08.26 AM</p>
                                <br>
                                <p style="color: red;">Your Water is Empty, Refill it!</p>
                            </div>
                            <div class="RightBar2">
                                <div class="PageSubWaterBar">
                                    <div class="PageSubWaterBarOuter">
                                        <div class="PageSubWarBarInner">
                                            <div Id="PercentWater">
                                                Water
                                            </div>
                                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="160px" height="160px">
                                                <defs>
                                                    <linearGradient id="GradientColor">
                                                        <stop offset="0%" stop-color="blue" />
                                                        <stop offset="100%" stop-color="darkcyan" />
                                                    </linearGradient>
                                                </defs>
                                                <circle cx="80" cy="80" r="70" stroke-linecap="round" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
let number = document.getElementById("Percent");
let counter = 0;
setInterval(() => {
    if(counter == 40) {
        clearInterval();
    } else {
        counter += 1;
        number.innerHTML = counter + "% Livestock";
    }
}, 45);

let number2 = document.getElementById("PercentWater");
let counter2 = 0;
setInterval(() => {
    if(counter2 == 40) {
        clearInterval();
    } else {
        counter2 += 1;
        number2.innerHTML = counter2 + "% Water";
    }
}, 45);
</script>
</body>
</html>