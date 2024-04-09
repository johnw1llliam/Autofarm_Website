<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Automafarm - Dashboard</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('Styles/Dashboard.css') }}">
    <link rel="icon" href="Images/Logo.png" type="Image/x-icon">
</head>
<body>
    <div class="container">
        <div class="KotakLuar">
            <div class="KotakTengah">
                <div class="Left">
                    <h4>MY LIVESTOCK
                        <br>
                        <button class="BTNPindah" onclick="prevPoultry()"> &lt; </button> 
                        <div id="kotak" class="kotak">{{ $kandangs[0]->NamaKandang }}</div>
                        <button class="BTNPindah" onclick="nextPoultry()"> &gt; </button>
                    </h4>
                </div>
                <div class="Center">
                    <h3> A U T O M A F A R M <br> ONLINE DASHBOARD VIEW</h3>
                </div>
                <div class="Rights">
                    <div class="Logout">
                        Welcome User! 
                        <form action="/logout" method="post">
                            @csrf
                            <button class="BTNlogout" >Logout</button>
                        </form>
                    </div>
                    <div class="EditProfile">
                        <a style="color: White;" href="/profile"><button class="BTNedit">Edit Profile</button></a>
                    </div>
                </div>
                <div class="KotakDalam">
                    <div class="KotakIsi">
                        <div class="PageJudul">
                            <h3>Poultry Farm Statistic</h3>
                        </div>
                        <div class="PagePoultry">
                            <div class="Page1"><h4>FoodStock</h4> <img src="Images/Daging.png" alt="" class="Icon1"> <span id="foodstock">{{ $kandangs[0]->TotalPakan }}</span> Gram</div>
                            <div class="Page1"><h4>Total Water</h4> <img src="Images/Water.png" alt="" class="Icon1"> <span id="waterstock">{{ $kandangs[0]->TotalAir }}</span> Liter</div>
                        </div>
                    </div>
                    <div class="KotakIsi">
                        <div class="PageJudul">
                            <h3>Activity History</h3>
                        </div>
                        <div class="PageActivityGrid" id="allactivities">
                        @foreach ($aktivitases->where('KandangID', $kandangs[0]->KandangID) as $aktivitas)
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
                                    {{ $aktivitas->JumlahAir }} ml
                                </div>
                            @endif
                            @if ($aktivitas->JumlahVaksin != 0)
                                <div class="PageActivity3">
                                    Vaccinating <br>
                                    {{ DateTime::createFromFormat('Y-m-d H:i:s', $aktivitas->Waktu)->format('H:i') }} <br> <br> <br>
                                    {{ $aktivitas->JumlahVaksin }} ml
                                </div>
                            @endif
                        @endforeach
                        </div>
                    </div>
                    <div class="KotakIsi">
                        <div class="PageJudul">
                            <h3>Vaccine Details</h3>
                        </div>
                        <div class="PageVaccine">
                            <font size="10" style="color: blue;"><span id="vaccinestock">{{ $kandangs[0]->TotalVaksin }}</span> ml</font><p class="PMax" style="color: gray;">of maximum 4L</p>
                        </div>
                        <div class="ButtonPage3">
                            <button class="BTNAdd" onclick="toggleAddVaccine()">Add</button>
                            <button class="BTNSubstract" onclick="toggleSubstractVaccine()">Substract</button>
                        </div>
                    </div>
                    <div class="KotakIsi">
                        <div class="PageJudul">
                            <h3>Food Details</h3>
                            <div class="ButtonPage4">
                                <a style="color: white;" href="https://www.google.com/maps/search/toko+pakan+ternak+terdekat/"><button class="BTNBuy">Buy More</button></a>
                                <button class="BTNAdd" onclick="toggleAddFood()">Add</button>
                                <br>
                                <button class="BTNSubstract" onclick="toggleSubstractFood()">Substract</button>
                            </div>
                        </div>
                        <div class="PageFood">
                            <div class="PageSubFood">
                                FOOD USED
                                @php
                                    $filteredAktivitases = $aktivitases->where('KandangID', $kandangs[0]->KandangID);
                                    $totalJumlahPakan = $filteredAktivitases->sum('JumlahPakan');
                                @endphp
                                <h1 style="color : blue"><span id="totalfood">{{ $totalJumlahPakan }}</span> GRAM</h1>
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
                                    <span id="foodstock2">{{ $kandangs[0]->TotalPakan }}</span> Gram
                                </div>
                                <div class="PageGridInSub">
                                    Food Used
                                </div>
                                <div class="PageGridInSub">
                                    <span id="pct">{{ ($totalJumlahPakan / 2000) * 100 }}</span> %
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="KotakIsi">
                        <div class="PageJudul">
                            <h3>Water Details</h3>
                            <div class="ButtonPage5">
                                <button class="BTNAdd" onclick="toggleAddWater()">Add</button>
                                <button class="BTNSubstract" onclick="toggleSubstractWater()">Substract</button>
                            </div>
                        </div>
                        <div class="PageWater">
                            <div>
                            <?php
                                $latestAktivitasValue = null;

                                foreach ($aktivitases as $aktivitas) {
                                    if ($aktivitas->JumlahAir != 0) {
                                        $aktivitasDateTime = new DateTime($aktivitas->Waktu);
                                        if ($latestAktivitasValue === null || $aktivitasDateTime > $latestAktivitasValue) {
                                            $latestAktivitasValue = $aktivitasDateTime;
                                        }
                                    }
                                }

                                if ($latestAktivitasValue !== null) {
                                    $latestAktivitasValueFormatted = $latestAktivitasValue->format('H:i');
                                } else {
                                    $latestAktivitasValueFormatted = "-";
                                }
                            ?>
                                <p><span class="PageWaterSub"><span id="waterstock2">{{ $kandangs[0]->TotalAir }}</span> ml</span> of maximum 4L</p>
                                <p style="color: gray;"><i class="bi bi-clock"></i>Last Watering <span id="latestAct">{{ $latestAktivitasValueFormatted }}</span></p>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="popup" id="popup-poultry-name">
        <div class="overlay"></div>
        <div class="content">
            <h3>Enter new poultry name</h3>
            <br>
            <form method="post" actions="/dashboard">
                @csrf
                <input type="text" id="myTextBox" name="NamaKandang" placeholder="Poultry 1" class="form-control @error('NamaKandang') is-invalid @enderror" required>
                @error('NamaKandang')
                <script>
                    alert("{{ $message  }}");
                </script>
                @enderror
                <div class="close-btn" onclick="togglePoultryNamePopup()">Close</div>
                <button type="submit" class="btn btn-success">Confirm</button>
            </form>
        </div>
    </div>
    <div class="popup" id="popup-add-food">
        <div class="overlay"></div>
        <div class="content">
            <h3>How much food to add?</h3>
            <br>
            <form name="AddPakanForm" method="post" actions="/add-food">
                @csrf
                <input type="number" name="AddPakan" placeholder="100" required>
                <div class="close-btn" onclick="toggleAddFood()">Close</div>
                <button type="submit" class="btn btn-success">Confirm</button>
            </form>
        </div>
    </div>
    <div class="popup" id="popup-substract-food">
        <div class="overlay"></div>
        <div class="content">
            <h3>How much food to substract?</h3>
            <br>
            <form name="SubstractPakanForm" method="post" actions="/substract-food">
                @csrf
                <input type="number" name="SubstractPakan" placeholder="100" required>
                <div class="close-btn" onclick="toggleSubstractFood()">Close</div>
                <button type="submit" class="btn btn-success">Confirm</button>
            </form>
        </div>
    </div>
    <div class="popup" id="popup-add-water">
        <div class="overlay"></div>
        <div class="content">
            <h3>How much water to add?</h3>
            <br>
            <form name="AddAirForm" method="post" actions="/add-water">
                @csrf
                <input type="number" name="AddAir" placeholder="100" required>
                <div class="close-btn" onclick="toggleAddWater()">Close</div>
                <button type="submit" class="btn btn-success">Confirm</button>
            </form>
        </div>
    </div>
    <div class="popup" id="popup-substract-water">
        <div class="overlay"></div>
        <div class="content">
            <h3>How much water to substract?</h3>
            <br>
            <form name="SubstractAirForm" method="post" actions="/substract-water">
                @csrf
                <input type="number" name="SubstractAir" placeholder="100" required>
                <div class="close-btn" onclick="toggleSubstractWater()">Close</div>
                <button type="submit" class="btn btn-success">Confirm</button>
            </form>
        </div>
    </div>
    <div class="popup" id="popup-add-vaccine">
        <div class="overlay"></div>
        <div class="content">
            <h3>How much vaccine to add?</h3>
            <br>
            <form name="AddVaksinForm" method="post" actions="/add-vaccine">
                @csrf
                <input type="number" name="AddVaksin" placeholder="100" required>
                <div class="close-btn" onclick="toggleAddVaccine()">Close</div>
                <button type="submit" class="btn btn-success">Confirm</button>
            </form>
        </div>
    </div>
    <div class="popup" id="popup-substract-vaccine">
        <div class="overlay"></div>
        <div class="content">
            <h3>How much vaccine to substract?</h3>
            <br>
            <form name="SubstractVaksinForm" method="post" actions="/substract-vaccine">
                @csrf
                <input type="number" name="SubstractVaksin" placeholder="100" required>
                <div class="close-btn" onclick="toggleSubstractVaccine()">Close</div>
                <button type="submit" class="btn btn-success">Confirm</button>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function togglePopup(){
            document.getElementById("popup-1").classList.toggle("active");
        }

        function togglePoultryNamePopup(){
            document.getElementById("popup-poultry-name").classList.toggle("active");
        }

        function toggleAddFood(){
            document.getElementById("popup-add-food").classList.toggle("active");
        }

        function toggleSubstractFood(){
            document.getElementById("popup-substract-food").classList.toggle("active");
        }

        function toggleAddWater(){
            document.getElementById("popup-add-water").classList.toggle("active");
        }

        function toggleSubstractWater(){
            document.getElementById("popup-substract-water").classList.toggle("active");
        }

        function toggleAddVaccine(){
            document.getElementById("popup-add-vaccine").classList.toggle("active");
        }

        function toggleSubstractVaccine(){
            document.getElementById("popup-substract-vaccine").classList.toggle("active");
        }

        var kandangs = <?php echo json_encode($kandangs); ?>; 

        var currentIndex = 0; 
        var foodUsed = 0;
        var foodUsedPct = 0;
        var latestAktivitas = "";

        function prevPoultry() {
            if (currentIndex > 0) {
                currentIndex = currentIndex - 1;
                updateLivestockName();
            }
        }

        function nextPoultry() {
            if (currentIndex < kandangs.length - 1) {
                currentIndex = currentIndex + 1;
                updateLivestockName();
            } else {
                togglePoultryNamePopup();
            }
        }

        function formatDateTime(dateTimeString) {
            var dateTime = new Date(dateTimeString);
            return dateTime.toLocaleTimeString();
        }

        function updateActivityHistory() {
            var allActivitiesDiv = document.getElementById('allactivities');
            allActivitiesDiv.innerHTML = ''; 
            var aktivitases = <?php echo json_encode($aktivitases); ?>;
            
            var latestAktivitasValue = 0;
            foodUsed = 0;
            foodUsedPct = 0;
            latestAktivitas = "-";

            for (i=0;i<aktivitases.length;i++) {
                if (aktivitases[i].KandangID == kandangs[currentIndex].KandangID) {
                    var activityDiv = document.createElement('div');
                    var datetimeString = formatDateTime(aktivitases[i].Waktu);
                    var timeParts = datetimeString.split(':');
                    var hours = timeParts[0];
                    var minutes = timeParts[1];
                    hours = (hours < 10 ? '0' : '') + hours;
                    var formattedTime = hours + ':' + minutes;
                    if (aktivitases[i].JumlahPakan != 0) {
                        activityDiv.className = 'PageActivity1';
                        activityDiv.innerHTML = 'Feeding <br>' +
                            formattedTime + ' <br><br><br>' +
                            aktivitases[i].JumlahPakan + ' Gram';
                    } else if (aktivitases[i].JumlahAir != 0) {
                        activityDiv.className = 'PageActivity2';
                        activityDiv.innerHTML = 'Watering <br>' +
                            formattedTime + ' <br><br><br>' +
                            aktivitases[i].JumlahAir + ' ml';
                        var activityTimestamp = Date.parse(aktivitases[i].Waktu);
                        if (activityTimestamp > latestAktivitasValue) {
                            latestAktivitasValue = activityTimestamp;
                            latestAktivitas = aktivitases[i].Waktu;
                            latestAktivitas = new Date(latestAktivitas);

                            var hours = latestAktivitas.getHours();
                            var minutes = latestAktivitas.getMinutes();

                            hours = ("0" + hours).slice(-2); 
                            minutes = ("0" + minutes).slice(-2); 
                            latestAktivitas = hours + ":" + minutes;
                        }
                    } else if (aktivitases[i].JumlahVaksin != 0) {
                        activityDiv.className = 'PageActivity3';
                        activityDiv.innerHTML = 'Vaccinating <br>' +
                            formattedTime + ' <br><br><br>' +
                            aktivitases[i].JumlahVaksin + ' ml';
                    }
                    allActivitiesDiv.appendChild(activityDiv);
                    foodUsed = foodUsed + aktivitases[i].JumlahPakan;
                }
            }

            foodUsedPct = (foodUsed / 2000) * 100;
        }
        
        function updateLivestockName() {
            document.getElementById('kotak').innerText = kandangs[currentIndex].NamaKandang;
            document.getElementById('foodstock').innerText = kandangs[currentIndex].TotalPakan;
            document.getElementById('foodstock2').innerText = kandangs[currentIndex].TotalPakan;
            document.getElementById('waterstock').innerText = kandangs[currentIndex].TotalAir;
            document.getElementById('waterstock2').innerText = kandangs[currentIndex].TotalAir;
            document.getElementById('vaccinestock').innerText = kandangs[currentIndex].TotalVaksin;
            updateActivityHistory();
            document.getElementById('totalfood').innerText = foodUsed;
            document.getElementById('pct').innerText = foodUsedPct;
            document.getElementById('latestAct').innerText = latestAktivitas;
        }

        var addFoodForms = document.getElementsByName('AddPakanForm');

        addFoodForms.forEach(function(form) {
            form.addEventListener('submit', function(event) {
                event.preventDefault();

                var totalPakan = form.querySelector('[name="AddPakan"]').value;
                var namaKandang = kandangs[currentIndex].NamaKandang;

                $.ajax({
                    url: "/add-food",
                    method: "POST", 
                    data: {
                        NamaKandang: namaKandang,
                        TotalPakan: totalPakan
                    },
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        window.location.href = '/dashboard';
                    },
                });  
            });
        });

        var substractFoodForms = document.getElementsByName('SubstractPakanForm');

        substractFoodForms.forEach(function(form) {
            form.addEventListener('submit', function(event) {
                event.preventDefault();

                var jumlahPakan = form.querySelector('[name="SubstractPakan"]').value;
                var kandangID = kandangs[currentIndex].KandangID;

                $.ajax({
                    url: "/substract-food",
                    method: "POST", 
                    data: {
                        KandangID: kandangID,
                        JumlahPakan: jumlahPakan
                    },
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        window.location.href = '/dashboard';
                    },
                    error: function(response) {
                        console.log("Error: " + error.responseJSON.error);
                    } 
                });  
            });
        });

        var addWaterForms = document.getElementsByName('AddAirForm');

        addWaterForms.forEach(function(form) {
            form.addEventListener('submit', function(event) {
                event.preventDefault();

                var totalAir = form.querySelector('[name="AddAir"]').value;
                var namaKandang = kandangs[currentIndex].NamaKandang;

                $.ajax({
                    url: "/add-water",
                    method: "POST", 
                    data: {
                        NamaKandang: namaKandang,
                        TotalAir: totalAir
                    },
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        window.location.href = '/dashboard';
                    },
                });  
            });
        });

        var substractWaterForms = document.getElementsByName('SubstractAirForm');

        substractWaterForms.forEach(function(form) {
            form.addEventListener('submit', function(event) {
                event.preventDefault();

                var jumlahAir = form.querySelector('[name="SubstractAir"]').value;
                var kandangID = kandangs[currentIndex].KandangID;

                $.ajax({
                    url: "/substract-water",
                    method: "POST", 
                    data: {
                        KandangID: kandangID,
                        JumlahAir: jumlahAir
                    },
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        window.location.href = '/dashboard';
                    },
                    error: function(response) {
                        console.log("Error: " + error.responseJSON.error);
                    } 
                });  
            });
        });

        var addVaccineForms = document.getElementsByName('AddVaksinForm');

        addVaccineForms.forEach(function(form) {
            form.addEventListener('submit', function(event) {
                event.preventDefault();

                var totalVaksin = form.querySelector('[name="AddVaksin"]').value;
                var namaKandang = kandangs[currentIndex].NamaKandang;

                $.ajax({
                    url: "/add-vaccine",
                    method: "POST", 
                    data: {
                        NamaKandang: namaKandang,
                        TotalVaksin: totalVaksin
                    },
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        window.location.href = '/dashboard';
                    },
                });  
            });
        });

        var substractVaccineForms = document.getElementsByName('SubstractVaksinForm');

        substractVaccineForms.forEach(function(form) {
            form.addEventListener('submit', function(event) {
                event.preventDefault();

                var jumlahVaksin = form.querySelector('[name="SubstractVaksin"]').value;
                var kandangID = kandangs[currentIndex].KandangID;

                $.ajax({
                    url: "/substract-vaccine",
                    method: "POST", 
                    data: {
                        KandangID: kandangID,
                        JumlahVaksin: jumlahVaksin
                    },
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        window.location.href = '/dashboard';
                    },
                    error: function(response) {
                        console.log("Error: " + error.responseJSON.error);
                    } 
                });  
            });
        });
    </script>
</body>
</html>

