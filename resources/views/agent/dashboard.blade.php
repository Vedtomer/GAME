@extends('agent.layout.agentmain')
@section('title', 'Purchase Ticket')
@section('section')
    <style>
        @media (max-width: 767px) {


            .app-page-title {
                padding: 15px;
                margin: -15px 0px 15px;
            }

            .app-main .app-main__inner {
                padding: 30px 0px 0;

            }

            .card-body {
                padding: 2px !important;
            }

            th,
            td {
                border: 1px solid;

            }

            .input-box {
                width: 34px !important;
                min-width: 100%;
            }
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid;
            text-align: center;
        }

        .input-box {
            /* height: 100%; */
            width: 100%;
            height: 34px;
            text-align: center;
            font-size: 16px;
            font-weight: bold;
        }

        th {
            background-color: #f2f2f2;
        }

        .gradient-container {
            background: rgb(211, 251, 155);
            border: 1px solid;
            /* // #FFD700, #FFA07A, #87CEFA, #98FB98); */
            /* You can add more colors and adjust the angles as needed */
        }

        .yellow input {
            background: rgb(255, 216, 0);
            ;
        }

        .main-input input {
            background: <?php echo $number == 7000 ? 'rgb(243, 180, 185)' : 'rgb(237, 227, 166)';
            ?>;
        }

        input {

            border: 1px solid <?php echo $number == 7000 ? 'rgb(243, 180, 185)' : 'rgb(237, 227, 166)';
            ?>;

        }

        .submit {
            margin: 10px
        }

        .btn {
            border-radius: 0px !important;
        }

        span {
            font-size: 16px;
            /* font-weight: bold; */
        }

        input:focus {
            outline: none;
            /* Remove outline on focus */
            /* Add additional styles for the focused state if needed */
        }

        .custom-span {
            /* font-size: 2px; !important  */
        }

        @media (min-width: 767px) {
            .custom-td {
                overflow-x: auto;
            }

            .custom-span {
                font-size: 30px;

                color: rgb(16, 16, 16);
            }

            .cust-span {
                font-size: 30px;
            }
        }

        @media (max-width: 767px) {


            .Purchase {
                font-size: 25px;
                /* font-weight: bold; */
                color: rgb(16, 16, 16);
            }
        }


        .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            overflow-x: auto;
            padding: 10px;
        }

        .info-box {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            border: 2px solid;
            padding: 5px;
        }

        .label {
            margin-bottom: 5px;
        }

        .value {
            display: inline-block;
            font-weight: 900;
            font-size: 16px;
        }

        /* Equal height for inner boxes */
        .info-box {
            flex: 1;
        }

        /* Smaller text on mobile */
        @media (max-width: 768px) {
            .value {
                font-size: 14px;
                /* Adjust as needed */
            }
        }
    </style>
    <div class="container">
        <div class="info-box">
            <div class="label">Date</div>
            <span id="NowDate" class="value"></span>
        </div>

        <div class="info-box">
            <div class="label">CURRENT TIME</div>
            <span id="NowTime" class="value"></span>
        </div>

        <div class="info-box">
            <div class="label">REMAINING TIME</div>
            <span id="RemainingTime" class="value"></span>
        </div>

        <div class="info-box">
            <div class="label">DRAW TIME</div>
            <span id="NextDrowTime" class="value"></span>
        </div>
    </div>




    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <div class="add" style="display: flex; align-items: center;">
                    <div class="btns" style="margin-left: auto;">
                    </div>
                </div>


                <div class="table-responsive">

                    <form action="{{ route('savedashboard') }}" method="post">
                        @csrf
                        <table>
                            <tr>
                                <?php
                                for ($i = -1; $i < 10; $i++) {
                                    if ($i == -1) {
                                        echo '<td></td><td></td>';
                                    } else {
                                        echo "<th class=yellow><span for='input_top_{$i}'>B </span><br><input type='tel' id='input_top_{$i}' name='input_top_{$i}' onkeypress='allowOnlyNumbers(event)' oninput='updateInputs{$i}()' class='input-box'></th>";
                                    }
                                
                                    if ($i == 9) {
                                        echo "<th class=gradient-container><span for='input_top'>QTY.</span></th><th class=gradient-container><span for='input_top'>PTS.</span></th>";
                                    }
                                }
                                ?>
                            </tr>

                            <tr>
                                <?php
                                $j = $number;
                                for ($i = 0; $i < 100; $i++) {
                                    if ($i == 0 || $i == 10 || $i == 20 || $i == 30 || $i == 40 || $i == 50 || $i == 60 || $i == 70 || $i == 80 || $i == 90) {
                                        if ($i == 0) {
                                            echo "<th class=gradient-container><span for='radio60'>60</span><input type='radio' name='radioNumber' value='60' id='radio60' class='' onclick='redirectToDashboard(6000)' " . ($number == 6000 ? 'checked' : '') . '></th>';
                                        } elseif ($i == 10) {
                                            echo "<th class=gradient-container><span for='radio70'>70</span><input type='radio' name='radioNumber' value='70' id='radio70' class='' onclick='redirectToDashboard(7000)' " . ($number == 7000 ? 'checked' : '') . '></th>';
                                        } else {
                                            echo '<th class=gradient-container></th>';
                                        }
                                
                                        echo "<th class=yellow><span for='A{$i}'> A</span><br><input type='tel' id='A{$i}' name='A{$i}' onkeypress='allowOnlyNumbers(event)' oninput='updateInputA{$i}()' class='input-box'></th>";
                                    }
                                
                                    $defaultspan = $j;
                                    $defaultName = $j;
                                
                                    echo "<th class=main-input><span for='{$defaultName}'>{$defaultspan}</span><br><input type='tel' id='input{$i}' name='{$defaultName}' onkeypress='allowOnlyNumbers(event)' oninput='updateQty()' class='input-box'></th>";
                                
                                    if (($i + 1) % 10 === 0) {
                                        echo "<th class=gradient-container ><span  id='qty{$i}' name='qty{$i}'>0</span></th>";
                                        echo "<th class=gradient-container><span  id='pts{$i}' name='pts{$i}'>0.00</span></th>";
                                
                                        echo '</tr><tr>';
                                    }
                                
                                    if ($i == 99) {
                                        echo "<tr>
                                                                                                                                                                                                                                                                                                                                                                                                                                            <th colspan=11><div class=submit><button type=submit class='mb-2 mr-2 btn-hover-shine btn-square btn btn-primary' id='submitButton'> <b>Submit</b> </button> 
                                                                                                                                <a class='mb-2 mr-2 btn-hover-shine btn-square btn btn-info' id=reloadBtn> <b>Clear</b> </a>                                                                                                  
                                                                                                                                    <a href='/subhank' class='mb-2 mr-2 btn-hover-shine btn-square btn btn-success' style='text-decoration: none; color: inherit;'> <b>Result</b></a>
                                                                                                                                
                                                                                                                                
                                                                                                                                    <a href='/dashview' class='mb-2 mr-2 btn-hover-shine btn-square btn btn-danger' style='text-decoration: none; color: inherit;'> <b>View</b></a>
                                                                                                                                
                                                                                                                                
                                                                                                                                    <a href='/agentchangepassword' class='mb-2 mr-2 btn-hover-shine btn-square btn btn-info' style='text-decoration: none; color: inherit;'> <b>password</b></a>
                                                                                                                                
                                                                                                                                    <a href='/report' class='mb-2 mr-2 btn-hover-shine btn-square btn btn-info' style='text-decoration: none; color: inherit;'> <b>report</b></a>
                                                                                                                                
                                                                                                                                
                                                                                                                                    <a href='/cancel-ticket' class='mb-2 mr-2 btn-hover-shine btn-square btn btn-warning' style='text-decoration: none; color: inherit;'> <b>Cancel</b></a>
                                                                                                                                
                                                                                                                                
                                                                                                                                 </div></th>
                                                                                                                                                                                                                                    <th><span for='qty{$i}'>Total</span></th>
                                                                                                                                                                                                                                    <th><span  id='tqty' name='tqty'>0</span></th>
                                                                                                                                                                                                                                     <th><span  id='tpts' name='tpts'>0.00</span></th> </tr>";
                                    }
                                    $j++;
                                }
                                ?>
                            </tr>
                        </table>
                    </form>

                </div>
            </div>
        </div>



        <script>
            function redirectToDashboard(number) {
                var url = '{{ route('dashboard', ':number') }}';
                url = url.replace(':number', number);
                window.location.href = url;
            }

            document.getElementById('reloadBtn').addEventListener('click', function() {
                location.reload();
            });
        </script>

        <script type="text/javascript" src="{{ asset('asset/js/purchase.js') }}"></script>







        <script>
            function updateCurrentTime() {
                var now = new Date();
                var hours = now.getHours();
                var minutes = now.getMinutes();
                var seconds = now.getSeconds();
                var ampm = hours >= 12 ? 'PM' : 'AM';
                hours = hours % 12 || 12;
                minutes = minutes < 10 ? '0' + minutes : minutes;
                seconds = seconds < 10 ? '0' + seconds : seconds;
                var currentTime = hours + ':' + minutes + ':' + seconds + ' ' + ampm;


                var isWithinInterval = (now.getHours() === 8 && minutes >= 45) || (now.getHours() > 8 && now.getHours() < 21) ||
                    (now.getHours() === 21 && minutes <= 30);
                if (isWithinInterval) {
                    var day = now.getDate();
                    var month = now.getMonth() + 1; // Months are 0-based
                    var year = now.getFullYear();

                    var formattedDate = day + '/' + month + '/' + year;
                    document.getElementById('NowDate').innerText = formattedDate;
                    document.getElementById('NowTime').innerText = currentTime;
                } else {
                    document.getElementById('NowDate').innerText = '';
                    document.getElementById('NowTime').innerText = "";
                }

                if (now.getHours() === 8 && minutes === 45) {
                    location.reload();
                } else if (now.getHours() === 21 && minutes === 30) {
                    location.reload();
                }
            }
        </script>

        <script>
            function updateNextDrawTimeAndReload() {
                var now = new Date();
                var minutes = now.getMinutes();
                var remainingMinutes = 15 - (minutes % 15);

                var nextDrawTime = new Date(now.getTime() + remainingMinutes * 60000);

                var hours = nextDrawTime.getHours();
                var nextMinutes = nextDrawTime.getMinutes();
                var seconds = nextDrawTime.getSeconds();
                var ampm = hours >= 12 ? 'P.M.' : 'A.M.';

                hours = hours % 12 || 12;
                nextMinutes = nextMinutes < 10 ? '0' + nextMinutes : nextMinutes;
                seconds = seconds < 10 ? '0' + seconds : seconds;

                var nextDrawTimeString = hours + ':' + nextMinutes + ':' + '00' + ' ' + ampm;


                var isWithinInterval = (now.getHours() === 8 && minutes >= 45) || (now.getHours() > 8 && now.getHours() < 21) ||
                    (now.getHours() === 21 && minutes <= 30);
                if (isWithinInterval) {

                    document.getElementById('NextDrowTime').innerText = nextDrawTimeString;

                } else {
                    document.getElementById('NextDrowTime').innerText = '';
                }


                if (minutes % 15 == 0 && seconds == 00) {
                    location.reload();
                }
            }

            function updateRemainingTime() {
                const now = new Date();

                // Calculate the next 15-minute interval
                const next15Minutes = new Date(now.getFullYear(), now.getMonth(), now.getDate(), now.getHours(), now
                .getMinutes() + (15 - (now.getMinutes() % 15)));

                // Get the time difference in seconds
                const remainingTimeInSeconds = Math.max(0, Math.floor((next15Minutes - now) / 1000));

                // Format the remaining time as HH:MM:SS
                const remainingHours = Math.floor(remainingTimeInSeconds / 3600);
                const remainingMinutes = Math.floor((remainingTimeInSeconds % 3600) / 60);
                const remainingSeconds = remainingTimeInSeconds % 60;
                const remainingTimeString =
                    (remainingHours < 10 ? '0' : '') + remainingHours + ':' +
                    (remainingMinutes < 10 ? '0' : '') + remainingMinutes + ':' +
                    (remainingSeconds < 10 ? '0' : '') + remainingSeconds;




                var isWithinInterval = (now.getHours() === 8 && minutes >= 45) || (now.getHours() > 8 && now.getHours() < 21) ||
                    (now.getHours() === 21 && minutes <= 30);
                if (isWithinInterval) {

                    document.getElementById('RemainingTime').innerText = remainingTimeString;

                } else {
                    document.getElementById('RemainingTime').innerText = '';
                }

            }

            // Call updateRemainingTime every second
            setInterval(updateRemainingTime, 1000);

            // Initial update
            updateRemainingTime();



            setInterval(function() {
                updateCurrentTime();
                updateNextDrawTimeAndReload();
            }, 1000);

            // Initial update
            updateCurrentTime();
            updateNextDrawTimeAndReload();
        </script>
    @endsection
