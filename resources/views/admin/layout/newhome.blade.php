<!doctype html>
<html lang="en">

<head>
    <title>Golden Lucky Draw</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


    <link rel="stylesheet" href="{{ asset('homes.css') }}">
    <script src="{{ asset('homejs.js') }}"></script>
    <script src="{{ asset('home3.js') }}"></script>
    <script src="{{ asset('home4.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('homes2.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            margin: 0;
            /* font-family: Tahoma; */
            background-image: url('{{ asset(' logo12_files/background.png') }}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        .logo {
            background-image: url('{{ asset(' logo12_files/logo12.jpg') }}');
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
            background-image: url('{{ asset(' logo12_files/17.png') }}');
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
            margin-right: 10px;
            margin-top: 10px;


        }

        /* .container1 img {
            width: 100%;
            height: 100%;
        } */

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

        /* Container for main and said divs */
        .container {
            display: flex;
            text-align: left;
        }

        /* Main content div */
        .main {
            flex: 1;
            /* Take remaining space */
            padding: 20px;
            box-sizing: border-box;

        }

        /* Said div */
        .said {
            width: 300px;
            /* Set the width as needed */
            padding: 20px;
            box-sizing: border-box;
            margin-right: 100px;

        }

        /* Default styles for .mains */
        .mains {
            margin-left: 40px;
            margin-top: 100px;
        }
    </style>
</head>

<body style="background-image: url('{{ asset('logo12_files/background.png') }}');"
    data-new-gr-c-s-check-loaded="14.1147.0" data-gr-ext-installed="">
    <div class="container">
        <div class="said">
            <div class="container" border="0">
                <div>

                    <div class="sidebar">

                        <div>
                            <div
                                style="background-image: url('{{ asset('logo12_files/logo.png') }}');background-repeat:no-repeat;background-position: center top; height: 190px;    margin-bottom: 20px;">
                            </div>
                        </div>
                        <div>
                            <div>
                                <div>
                                    <div
                                        style="background-image:url(desktop/currenttime_.png);background-repeat:no-repeat;background-position: center center; background-color: rgb(39, 146, 133);height:40px; border-radius:30px; white-space: nowrap; overflow: hidden; margin-bottom: 20px;">
                                        <span id="RemainTime"
                                            style="font-size: 12pt; font-weight: bold; display: none; color: Yellow;"></span>
                                        <span style="font-size: 22pt; font-weight: bold; color: Yellow;"
                                            id="NowTime"></span>
                                        <input name="hd_nextime" id="hd_nextime" type="hidden">
                                    </div>

                                </div>
                            </div>
                            <div>
                                <div
                                    style="background-image:url(desktop/date_.png);background-repeat:no-repeat; background-position: center center;  width: 232px; max-height: 48px; background-color:rgb(73, 208, 232); border-radius:30px; margin-bottom: 20px; overflow: hidden;">

                                    <div style="font-size: 22pt; font-weight: bold; color: Yellow;height:40px"
                                        id="TodatyDate">
                                        <span id="NowDate"></span>
                                    </div>
                                </div>
                            </div>


                            <div>
                                <div class="time-slot"
                                    style="height: 38px; background-color:rgb(40, 117, 232); border-radius:30px;    margin-bottom: 20px;">
                                    <div style="font-size: 22pt; font-weight: bold; color: Yellow; " id="NextDrowTime">
                                        <span id="nextDraw"></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div>
                            <div
                                style="background-image: url('{{ asset('logo12_files/bracelet.png') }}');background-repeat:no-repeat;background-size:150px 150px;background-position: center center;   width: 150px; height: 150px;     margin-bottom: 20px;">
                            </div>
                        </div>


                        <div style="margin-bottom: 20px;">
                            <div
                                style="width: 230px; height: 30px; color: Yellow; font-size: 24px; margin-bottom: 20px;">
                                FREE GIFT...FREE GIFT For First 70 Lucky Voucher Winner GIFT
                            </div>
                        </div>

                        <div style="display: flex; flex-direction: column; align-items: center; margin-bottom: 20px;">
                            <div
                                style="background-image: url('{{ asset('logo12_files/ring.png') }}'); background-repeat: no-repeat; background-size: 150px 150px; background-position: center center; width: 150px; height: 380px;">
                            </div>
                        </div>

                        <div style="margin-bottom: 20px;">
                            <div style="width: 230px; height: 30px;color:Yellow;font-size:24px; margin-bottom: 20px; ">

                                FREE GIFT...FREE GIFT For First 60 Lucky Voucher Winner

                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
        <div class="main">

            <div class="container">
                <div class="mains">
                    <div>
                        <div>
                            <div>
                                <div colspan="2">
                                <marquee
                                    style="font-size: xx-large; margin-top: 10px; background-color: white; font-family: Tahoma; font-weight: bold;">
                                    For Lucky Shubhank Contact on <span style="font-weight: bold;"> <i class="fa fa-phone" style="font-size:36px"></i> <a href="tel:02269710251">02269710251</a> , <i class="fa fa-phone" style="font-size:36px"></i>
                                    <a href="tel:08062179850">08062179850</a> , <i class="fa fa-whatsapp" style="font-size:36px"></i>  
                                    <a href="https://wa.me/+919930577999">9930577999</a>
                                             
                                            
                                    </span>, For Trade Enquiry please Contact on  <i class="fa fa-phone" style="font-size:36px"></i> <a href="tel:02269710251">02269710251</a> ,  <i class="fa fa-phone" style="font-size:36px"></i>
                                    <a href="tel:08062179850">08062179850</a> ,  
                                     <i class="fa fa-whatsapp" style="font-size:36px"></i> <a href="https://wa.me/+919930577999">9930577999</a>
                                </marquee>
                                    <div
                                        style="background-image: url('{{ asset('logo12_files/17.png') }}'); background-repeat: no-repeat; background-size: 750px 100px; width: 750px; height: 100px; margin: 0;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div>
                            <div>

                                <div style="overflow:auto;width:750px; height: 224px" id="dispres">
                                    <div class="divTable" style="overflow:auto;">

                                        <div class="divTableRow" style="">
                                            <div class="container1"> <img src="{{ asset('logo12_files/time_1.png') }}"
                                                    style="margin-top: 9px;height:46px; margin-right:10px">
                                                <div class="centered"> </div>
                                            </div>
                                            @foreach ($data as $user)
                                                <div class="divTableCell1">
                                                    <div class="container1">
                                                        <img src="{{ asset($user->id % 2 == 0 ? 'logo12_files/time_1.png' : 'logo12_files/time_2.png') }}"
                                                            style="text-align: center;">
                                                        <div class="centered"
                                                            style="text-align: center; margin-left: 2px; margin-bottom: 2px; margin-top: -6px; font-size: 18px;">
                                                            {{ $user->timesloat }}
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach


                                        </div>
                                        <div class="divTableRow" style="margin-bottom: 15px;margin-top: 10px;">
                                            <div class="divTableCell1"><img src="{{ asset('logo12_files/601.png') }}"
                                                    style="height:50px;width:50px;background-color:transparent"></div>

                                            @foreach ($data as $user)
                                                <div class="divTableCell1">
                                                    <div class="container"> <img
                                                            src="https://www.goldwinrashi.com//desktoppng/rnum.png"
                                                            style="width:60px;height:40px">
                                                        <div class="centered1" style="font-size: 30px; ">
                                                            {{ $user->number_60 }}
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
                                                        <div class="centered1" style="font-size: 30px">
                                                            {{ $user->number_70 }}
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <span id="spredic1" class="blinking" style="font-size:24px;color:Yellow;display:none">
                        Please Enter <br> Lucky No <br> &amp; know Astrological Prediction <br>
                        Lucky Coupon Winner <br> will Get a Pooja Bracelet

                    </span><span id="spredic2" style="font-size:24px;display:none;color:Yellow;">

                    </span>

                    <div>


                        <div>
                            <div>
                                <div>



                                    <span style="font-size:24px; color:Yellow;">Due to Technical issue Live View is Not
                                        Available </span>


                                    <div>
                                        <div style="margin-bottom: 6px">
                                            <div>
                                                <div>
                                                    <span>
                                                        <a type="button"
                                                            style="font-size: 36px; border:1px solid; background: linear-gradient(to right, #ff6347, #4b0082); background-color: rgb(123, 0, 255); border-radius: 30px; text-decoration: none; padding: 0 15px;"
                                                            class="bgtime1" value="Shubhank" id="btnres"
                                                            onclick="Result()"
                                                            href="{{ route('subhank') }}">Shubhank</a>
                                                    </span>


                                                    <span
                                                        style="background-image: url(logo12_files/2.png); display: inline-block; width: 200px; height: 40px; background-repeat: no-repeat;margin-bottom:0px;"></span>
                                                    <span style="color: yellow;">Visitor: <span
                                                            id="visitcount">27869034</span></span>
                                                </div>
                                            </div>




                                        </div>
                                    </div>

                                    {{-- img code start --}}
                                    <div>
                                        <table class="caltable" cellpadding="0" cellspacing="0">
                                            <tbody>
                                                <tr>
                                                    <td colspan="3"
                                                        style="background-image:url(logo12_files/image_1_1.png);background-repeat:no-repeat;background-position: center top;background-size:750px 120px;   width: 750px; height: 120px;">
                                                    </td>


                                                </tr>

                                                <tr>
                                                    <td
                                                        style="background-image:url(logo12_files/image_1_4.png);background-repeat:no-repeat;background-position: center top;background-size:250px 120px;   width: 250px; height: 120px;">
                                                        <br>
                                                        <img src="logo12_files/60small.png"
                                                            style="height:100px;width:100px;margin-left:70PX">
                                                        <br>
                                                        <img src="logo12_files/70gh.png"
                                                            style="height:100px;width:100px;margin-left:70PX">

                                                    </td>

                                                    <td
                                                        style="background-image:url(logo12_files/image_1_4.png);background-repeat:no-repeat;background-position: center top;background-size:250px 120px;   width: 250px; height: 120px;">
                                                        <table>
                                                            <tbody>
                                                                <tr>


                                                                    <td style="text-align:center;">

                                                                        <input type="text"
                                                                            style="width:35px;height:40px; border-color:Blue;text-align:center;font-size:larger;font-weight:bold;margin-left:10px;"
                                                                            id="t_1" maxlength="1">
                                                                        <br><br>
                                                                        <br><br>
                                                                        <input type="text"
                                                                            style="width:35px;height:40px;border-color:Blue;text-align:center;font-size:larger;font-weight:bold;margin-left:10px;"
                                                                            id="Text1" maxlength="1">
                                                                    </td>
                                                                    <td style="text-align:center;">

                                                                        <input type="text"
                                                                            style="width:35px;height:40px;border-color:Blue;text-align:center;font-size:larger;font-weight:bold;margin-left:10px;"
                                                                            id="t_2" maxlength="1">
                                                                        <br><br>
                                                                        <br><br>
                                                                        <input type="text"
                                                                            style="width:35px;height:40px;border-color:Blue;text-align:center;font-size:larger;font-weight:bold;margin-left:10px;"
                                                                            id="Text2" maxlength="1">
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                    <td
                                                        style="background-image:url(logo12_files/image_1_4.png);background-repeat:no-repeat;background-position: center top;background-size:250px 120px;   width: 250px; height: 120px;">

                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td
                                                        style="background-image:url(logo12_files/image_2_0.png);background-repeat:no-repeat;background-position: center top;background-size:100% 100%;   width: 250px; height: 120px;">
                                                    </td>
                                                    <td
                                                        style="background-image:url(logo12_files/image_1_4.png);background-repeat:no-repeat;background-position: center top;background-size:250px 120px;   width: 250px; height: 120px;">
                                                        <span id="tcode">Verify OTP</span>

                                                    </td>
                                                    <td
                                                        style="background-image:url(logo12_files/image_1_4.png);background-repeat:no-repeat;background-position: center top;background-size:250px 120px;   width: 250px; height: 120px;">
                                                        <br><br>
                                                        <input type="text"
                                                            style="width:100px; height:30px; border-color:Blue;margin-left:-50px;font-size:larger;font-weight:bold;"
                                                            id="t_3" maxlength="6">
                                                        <input type="button" class="divCells8"
                                                            style="color:rgb(153, 0, 255);margin-left:10px;font-size:12px;font-weight:bold;background-color:rgb(43, 162, 226); border-radius: 30px"
                                                            onclick="calc()" id="t_4"
                                                            value="Click here for Predication">
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td
                                                        style="background-image:url(logo12_files/image_2_1.png);background-repeat:no-repeat;background-position: center top;background-size:100% 100%;   width: 250px; height: 120px;">
                                                    </td>
                                                    <td
                                                        style="background-image:url(logo12_files/image_1_4.png);background-repeat:no-repeat;background-position: center top;background-size:250px 120px;   width: 250px; height: 120px;">

                                                    </td>

                                                    <td
                                                        style="background-image:url(logo12_files/image_1_4.png);background-repeat:no-repeat;background-position: center top;background-size:250px 120px;   width: 250px; height: 120px;">
                                                    </td>

                                                </tr>
                                            </tbody>
                                        </table>
                                        {{-- img code end --}}
                                        {{-- video code --}}



                                    </div>
                                </div>

                            </div>

                        </div>

                        {{-- <iframe src="https://g2.ipcamlive.com/player/player.php?alias=5e5a05863bb0b" height="550px"

                            autoplay="1" allow="autoplay" frameborder="0"
                            style="width: 788px; margin-top:10px;"></iframe> --}}

                            <div class="banner">
                             <img style="height: 100%; width: 100%;" src="{{ asset('vid.gif') }}" > </img> 
                            </div>
                         
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


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
            var day = now.getDate();
            var month = now.getMonth() + 1; // Months are 0-based
            var year = now.getFullYear();
            var formattedDate = day + '/' + month + '/' + year;
            if (isWithinInterval) {



                document.getElementById('NowDate').innerText = formattedDate;
                document.getElementById('NowTime').innerText = currentTime;
            } else if ((now.getHours() >= 0 && now.getHours() < 8) || (now.getHours() === 8 && minutes < 45)) {
                document.getElementById('NowDate').innerText = formattedDate;
                document.getElementById('NowTime').innerText = "00";
            } else {
                document.getElementById('NowDate').innerText = '';
                document.getElementById('NowTime').innerText = "";
            }

            if (now.getHours() === 8 && minutes === 45 && seconds == 00) {
                location.reload();
            } else if (now.getHours() === 21 && minutes === 30 && seconds == 00) {
                location.reload();
            }
        }

        setInterval(updateCurrentTime, 1000);
        updateCurrentTime();
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

            } else if ((now.getHours() >= 0 && now.getHours() < 8) ||  (now.getHours() === 8 && minutes < 45)) {
                document.getElementById('NextDrowTime').innerText = '00';
            } else {
                document.getElementById('NextDrowTime').innerText = '';
            }


            if (minutes % 15 == 0 && seconds == 00) {
                location.reload();
            }
        }

        setInterval(updateNextDrawTimeAndReload, 1000);
        updateNextDrawTimeAndReload();
    </script>



</body>

</html>
