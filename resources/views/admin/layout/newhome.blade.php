<!doctype html>
<html lang="en">

<head>
    <title>Golden Lucky Draw</title>
    <link rel="stylesheet" href="{{ asset('homes.css') }}">
    <script src="{{ asset('homejs.js') }}"></script>
    <script src="{{ asset('home3.js') }}"></script>
    <script src="{{ asset('home4.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('homes2.css') }}">

    <style>
        body {
            margin: 0;
            /* font-family: Tahoma; */
            background-image: url('{{ asset('logo12_files/background.png') }}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        table {
            width: 100%;
            border-spacing: 10px;
        }

        td {
            /* padding: 10px; */
            border-radius: 10px;
        }

        .logo {
            background-image: url('{{ asset('logo12_files/logo12.jpg') }}');
            background-repeat: no-repeat;
            background-position: center top;
            background-size: cover;
            width: 200px;
            height: 250px;
        }

        .current-time {
            background-image: url(desktop/currenttime_.png);
            background-repeat: no-repeat;
            background-size: 200px 40px;
            background-position: center center;
            width: 200px;
            height: 50px;
            background-color: rgb(39, 146, 133);
            border-radius: 30px;
            margin-top: 10px;
        }

        #NowTime {
            font-size: 18pt;
            font-weight: bold;
            color: yellow;
            margin-top: 10px;
            display: block;
        }

        #TodatyDate {
            font-size: 24pt;
            font-weight: bold;
            color: yellow;
        }

        #NextDrowTime {
            font-size: 19pt;
            font-weight: bold;
            color: yellow;
            margin-top: 10px;
        }

        .marquee-container {
            width: 100%;
            overflow: hidden;
        }

        .marquee {
            font-size: xx-large;
            margin-top: 10px;
            background-color: white;
            font-family: Tahoma;
            white-space: nowrap;
            animation: marquee 20s linear infinite;
        }

        @keyframes marquee {
            0% {
                transform: translateX(100%);
            }

            100% {
                transform: translateX(-100%);
            }
        }

        .image-container {
            background-image: url('{{ asset('logo12_files/17.png') }}');
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            width: 100%;
            height: 100px;
            margin-top: 10px;
        }

        .divTable {
            width: 100%;
            overflow: auto;
        }

        .divTableRow {
            display: flex;
            flex-wrap: nowrap;
        }

        .divTableCell1 {
            flex: 0 0 auto;
            width: 60px;
            height: 40px;
        }

        .container1 img {
            width: 100%;
            height: 100%;
        }

        .divTableCell1 img {
            width: 100%;
            height: 100%;
        }

        .centered {
            text-align: center;
            font-size: 16px;
            margin-top: 5px;
        }

        .divTableCell1 .centered {
            font-size: 16px;
        }

        .centered1 {
            font-size: 25px;
        }

        @media only screen and (max-width: 768px) {

            .logo,
            .image-container,
            .current-time,
            #NowTime,
            #TodatyDate,
            #NextDrowTime {
                width: 100%;
                text-align: center;
                margin: 0 auto;
            }

            .divTableRow {
                flex-wrap: wrap;
            }

            .divTableCell1 {
                width: 50%;
            }
        }
    </style>
</head>

<body style="background-image: url('{{ asset('logo12_files/background.png') }}');"
    data-new-gr-c-s-check-loaded="14.1147.0" data-gr-ext-installed="">
    <table width="99%" border="0">
        <tbody>
            <tr>
                <td style="width:16%">
                    <table>
                        <tbody>
                            <tr>
                                <td
                                    style="background-image: url('{{ asset('logo12_files/logo.png') }}');background-repeat:no-repeat;background-position: center top;background-size:200px 250px;   width: 200px; height: 250px;">
                                </td>
                            </tr>
                            <div>
                                <div>
                                    <tr>
                                        <td
                                            style="background-image:url(desktop/currenttime_.png);background-repeat:no-repeat;background-size:200px 40px;background-position: center center;   width: 200px; height: 48px; background-color: rgb(39 146 133); border-radius:30px;">
                                            <span id="RemainTime"
                                                style="font-size: 12pt; font-weight: bold;display:none;color:Yellow ; ">00:14:34</span>

                                            <span style="font-size: 22pt; font-weight: bold; color: Yellow;"
                                                id="NowTime">
                                                <?php echo date('h:i:s A'); ?>
                                            </span>

                                            <input name="hd_nextime" id="hd_nextime" type="hidden">
                                        </td>
                                    </tr>
                                </div>
                                <tr>

                                    <td
                                        style="background-image:url(desktop/date_.png);background-repeat:no-repeat;background-size:200px 40px; background-position: center center;  width: 200px; height: 48px; background-color:rgb(73, 208, 232); border-radius:30px">
                                        <?php
                                        
                                        $currentDate = date('d/m/Y');
                                        ?>

                                        <span style="font-size: 22pt; font-weight: bold; color: Yellow" id="TodatyDate">
                                            <?= $currentDate ?>
                                        </span>

                                    </td>
                                </tr>

                                <tr>
                                <tr>
                                    <td class="time-slot"
                                        style="height: 48px; background-color:rgb(40, 117, 232); border-radius:30px;">
                                        <span
                                            style="font-size: 22pt; font-weight: bold; color: Yellow; margin-top: 60px"
                                            id="NextDrowTime"></span>
                                    </td>
                                </tr>
            </tr>
            </div>
            <tr>
                <td
                    style="background-image: url('{{ asset('logo12_files/bracelet.png') }}');background-repeat:no-repeat;background-size:150px 150px;background-position: center center;   width: 150px; height: 150px;">
                </td>
            </tr>
            <tr>
                <td style="width: 230px; height: 30px;color:Yellow;font-size:24px ">

                    FREE GIFT...FREE GIFT For First 60 Lucky Voucher Winner

                </td>
            </tr>
            <tr>
                <td
                    style="background-image:url(ring.png);background-repeat:no-repeat;background-size:150px 150px;background-position: center center;   width: 150px; height: 150px;">
                </td>
            </tr>
            <tr>
                <td style="width: 230px; height: 30px;color:Yellow;font-size:24px">
                    FREE GIFT...FREE GIFT For First 70 Lucky Voucher Winner
                    GIFT

                </td>
            </tr>

        </tbody>
    </table>

    </td>
    <td style="width:79%;">
        <table>
            <tbody>
                <tr>
                    <td>

                        <marquee style="font-size:xx-large; margin-top:10px;background-color: white;font-family:Tahoma">
                            <span style="font-weight:bold"> For Lucky Shubhank Contact on <span
                                    style="font-weight:bold"> 022.0000000 " 0000000000,0000000,000000000", For Trade
                                    Enquiry please Contact on 000000000 </span></span>
                        </marquee>
                    </td>

                </tr>
            </tbody>
        </table>

        <table>
            <tbody>
                <tr>
                    <td
                        style="background-image: url('{{ asset('logo12_files/17.png') }}'); background-repeat: no-repeat;  background-size: 750px 100px; width: 750px; height: 100px;">
                    </td>
                </tr>
            </tbody>
        </table>
        <table>
            <tbody>
                <tr>
                    <td>
                        <div style="overflow:auto;width:750px; height: 170px" id="dispres">
                            <div class="divTable" style="overflow:auto;">

                                <div class="divTableRow" style="">
                                    <div class="container1"> <img src="{{ asset('logo12_files/time_1.png') }}"
                                            style="width:60px;height:40px">
                                        <div class="centered"> </div>
                                    </div>
                                    @foreach ($data as $user)
                                        <div class="divTableCell1">
                                            <div class="container1"> <img
                                                    src="{{ asset($user->id % 2 == 0 ? 'logo12_files/time_1.png' : 'logo12_files/time_2.png') }}"
                                                    style="width:60px;height:40px">
                                                <div class="centered"style="font-size: 15px"> {{ $user->timesloat }}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="divTableRow" style="margin-bottom: 15px;">
                                    <div class="divTableCell1"><img src="{{ asset('logo12_files/601.png') }}"
                                            style="height:50px;width:50px;background-color:transparent"></div>

                                    @foreach ($data as $user)
                                        <div class="divTableCell1">
                                            <div class="container"> <img
                                                    src="https://www.goldwinrashi.com//desktoppng/rnum.png"
                                                    style="width:60px;height:40px">
                                                <div class="centered1" style="font-size: 25px">{{ $user->number_60 }}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                                <div class="divTableRow">
                                    <div class="divTableCell1"> <img src="{{ asset('logo12_files/70gh.png') }}"
                                            style="height:50px;width:50px"> </div>
                                    @foreach ($data as $user)
                                        <div class="divTableCell1">
                                            <div class="container"> <img
                                                    src="https://www.goldwinrashi.com//desktoppng/rnum.png"
                                                    style="width:60px;height:40px">
                                                <div class="centered1" style="font-size: 25px">{{ $user->number_70 }}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                        </div>
                    </td>



                </tr>
            </tbody>
        </table>

        <span id="spredic1" class="blinking" style="font-size:24px;color:Yellow;display:none">
            Please Enter <br> Lucky No <br> &amp; know Astrological Prediction <br>
            Lucky Coupon Winner <br> will Get a Pooja Bracelet

        </span><span id="spredic2" style="font-size:24px;display:none;color:Yellow;">

        </span>
        <table>


            <tbody>
                <tr>
                    <td width:="width:" 750px;="750px;" height:="height:" 420px;"="420px;&quot;">



                        <span style="font-size:24px; color:Yellow;">Due to Technical issue Live View is Not
                            Available </span>
                        <iframe src="https://g2.ipcamlive.com/player/player.php?alias=5e5a05863bb0b" height="550px"
                            autoplay="1" allow="autoplay" frameborder="0" style="width: 788px"></iframe>


                    </td>
                </tr>
            </tbody>
        </table>

    </td>
    </tr>
    </tbody>
    </table>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>
<script>
    // Update the time every second
    setInterval(function() {
        var now = new Date();
        var hours = now.getHours();
        var minutes = now.getMinutes();
        var seconds = now.getSeconds();
        var ampm = hours >= 12 ? 'P.M.' : 'A.M.';

        // Format single digits with leading zero
        hours = hours % 12 || 12;
        minutes = minutes < 10 ? '0' + minutes : minutes;
        seconds = seconds < 10 ? '0' + seconds : seconds;

        var currentTime = hours + ':' + minutes + ':' + seconds + ' ' + ampm;

        // Update the content of the element with id "NowTime"
        document.getElementById('NowTime').innerText = currentTime;
    }, 1000); // Update every 1000 milliseconds (1 second)
</script>

<script>
    function updateNextDrawTime() {
        var now = new Date();
        var minutes = now.getMinutes();
        var remainingMinutes = 15 - (minutes % 15);

        // Calculate the next draw time
        var nextDrawTime = new Date(now.getTime() + remainingMinutes * 60000); // 60000 milliseconds in a minute

        // Format the time
        var hours = nextDrawTime.getHours();
        var minutes = nextDrawTime.getMinutes();
        var seconds = nextDrawTime.getSeconds();
        var ampm = hours >= 12 ? 'P.M.' : 'A.M.';

        // Format single digits with leading zero
        hours = hours % 12 || 12;
        minutes = minutes < 10 ? '0' + minutes : minutes;
        seconds = seconds < 10 ? '0' + seconds : seconds;

        var nextDrawTimeString = hours + ':' + minutes + ':' + seconds + ' ' + ampm;

        // Update the content of the element with id "NextDrowTime"
        document.getElementById('NextDrowTime').innerText = nextDrawTimeString;
    }

    // Update the time initially
    updateNextDrawTime();

    // Update the time every 15 minutes (900,000 milliseconds)
    setInterval(updateNextDrawTime, 900000);
</script>

</html>
