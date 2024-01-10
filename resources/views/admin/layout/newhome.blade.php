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
            margin-right: 10px;
            margin-top: 10px;
             
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
                <td style="width:12%; height:98%; margin-top:0%;margin-bottom:0%;padding:0%">
                    <h1>dfgrd</h1>
                    <table>
                        <tbody>
                            <tr>
                                <td
                                    style="background-image: url('{{ asset('logo12_files/logo.png') }}');background-repeat:no-repeat;background-position: center top; height: 190px;">
                                </td>
                            </tr>
                            <div>
                                <div>
                                    <tr>
                                        <td style="background-image:url(desktop/currenttime_.png);background-repeat:no-repeat;background-position: center center; background-color: rgb(39, 146, 133); border-radius:30px; white-space: nowrap; overflow: hidden;">
                                            <span id="RemainTime" style="font-size: 12pt; font-weight: bold; display: none; color: Yellow;">00:14:34</span>
                                            <span style="font-size: 22pt; font-weight: bold; color: Yellow;" id="NowTime">
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
                    style="background-image:url('{{ asset('logo12_files/ring.png') }}');background-repeat:no-repeat;background-size:150px 150px;background-position: center center;   width: 150px; height: 150px;">
                </td>
            </tr>
            <tr>
                <td style="width: 230px; height: 30px;color:Yellow;font-size:24px">
                    FREE GIFT...FREE GIFT For First 70 Lucky Voucher Winner
                    GIFT

                </td>
            </tr>
            
 </td>
        </tbody>
    </table>

   
    <td style="width:79%; ">
    <div style="margin-left: 100px; margin-top:100px;">
        <table style="">
            <tbody>
                <tr>
                    <td colspan="2">
                        <marquee style="font-size: xx-large; margin-top: 10px; background-color: white; font-family: Tahoma; font-weight: bold;">
                            For Lucky Shubhank Contact on <span style="font-weight: bold;">022.0000000 " 0000000000,0000000,000000000"</span>, For Trade Enquiry please Contact on 000000000
                        </marquee>
                        <div style="background-image: url('{{ asset('logo12_files/17.png') }}'); background-repeat: no-repeat; background-size: 750px 100px; width: 750px; height: 100px; margin: 0;"></div>
                    </td>
                </tr>
            </tbody>
        </table>
        <table>
            <tbody>
                <tr>
                    
                        <div style="overflow:auto;width:750px; height: 224px" id="dispres">
                            <div class="divTable" style="overflow:auto;">

                                <div class="divTableRow" style="">
                                    <div class="container1"> <img src="{{ asset('logo12_files/time_1.png') }}"
                                            style="margin-top: 9px;height:46px; margin-right:10px">
                                        <div class="centered"> </div>
                                    </div>
                                    @foreach ($data as $user)
                                        <div class="divTableCell1">
                                            <div class="container1"> <img
                                                    src="{{ asset($user->id % 2 == 0 ? 'logo12_files/time_1.png' : 'logo12_files/time_2.png') }}"
                                                    style="text-align: center">
                                                <div class="centered" style="text-align: center;margin-left: 10px;font-size: 15px;" > {{ $user->timesloat }}
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
                                                <div class="centered1" style="font-size: 30px; ">{{ $user->number_60 }}
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
                                                <div class="centered1" style="font-size: 30px">{{ $user->number_70 }}
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
                    <td>



                        <span style="font-size:24px; color:Yellow;">Due to Technical issue Live View is Not
                            Available </span>


                            <table>
                                <tbody>
                                    <tr>
                                        <td>
                                            <span>
                                                <a type="button" style="font-size: 36px; color: yellow; background-color: rgb(123, 0, 255); border-radius: 30px; text-decoration: none; padding: 0 15px;" class="bgtime1" value="Shubhank" id="btnres" onclick="Result()" href="{{ route('subhank') }}">Shubhank</a>
                                            </span>
                                            <span style="background-image: url(logo12_files/2.png); display: inline-block; width: 200px; height: 40px; background-repeat: no-repeat;margin-bottom:0px;"></span>
                                            <span style="color: yellow;">Visitor: <span id="visitcount">27869034</span></span>
                                        </td>
                                    </tr>
                                    
                                    
                                    
                                
                                </tbody>
                            </table>

                             {{-- img code start --}}
                             <table class="caltable" cellpadding="0" cellspacing="0" style="width: 750px">
                                <tbody><tr>
                                <td colspan="3" style="background-image:url(logo12_files/image_1_1.png);background-repeat:no-repeat;background-position: center top;background-size:750px 120px;   width: 750px; height: 120px;"></td>
                                </tr>
                                 <tr>
                                <td style="background-image:url(logo12_files/image_1_4.png);background-repeat:no-repeat;background-position: center top;background-size:250px 120px;   width: 250px; height: 120px;">
                                <br>
                                <img src="logo12_files/601.png" style="height:100px;width:100px;margin-left:70PX">
                                <br>
                                     <img src="logo12_files/70gh.png" style="height:100px;width:100px;margin-left:70PX">
                                </td>
                                
                                <td style="background-image:url(logo12_files/image_1_4.png);background-repeat:no-repeat;background-position: center top;background-size:250px 120px;   width: 250px; height: 120px;">
                                <table>
                                <tbody><tr>
                            
                            
                                <td style="text-align:center;">
                            
                                <input type="text" style="width:35px;height:40px; border-color:Blue;text-align:center;font-size:larger;font-weight:bold;margin-left:10px;" id="t_1" maxlength="1">
                                 <br><br>
                                    <br><br>
                                <input type="text" style="width:35px;height:40px;border-color:Blue;text-align:center;font-size:larger;font-weight:bold;margin-left:10px;" id="Text1" maxlength="1">
                                </td>
                                <td style="text-align:center;">
                            
                                <input type="text" style="width:35px;height:40px;border-color:Blue;text-align:center;font-size:larger;font-weight:bold;margin-left:10px;" id="t_2" maxlength="1">
                                 <br><br>
                                    <br><br>
                                <input type="text" style="width:35px;height:40px;border-color:Blue;text-align:center;font-size:larger;font-weight:bold;margin-left:10px;" id="Text2" maxlength="1">
                                </td>
                                </tr>
                                </tbody></table>
                                </td>
                                <td style="background-image:url(logo12_files/image_1_4.png);background-repeat:no-repeat;background-position: center top;background-size:250px 120px;   width: 250px; height: 120px;">
                            
                                </td>
                            
                                </tr>
                                 <tr>
                                <td style="background-image:url(logo12_files/image_2_0.png);background-repeat:no-repeat;background-position: center top;background-size:100% 100%;   width: 250px; height: 120px;"></td>
                                <td style="background-image:url(desktop/image_1_4.png);background-repeat:no-repeat;background-position: center top;background-size:250px 120px;   width: 250px; height: 120px;">
                                 <span id="tcode">Verify OTP</span>
                            
                                </td>
                                <td style="background-image:url(logo12_files/image_1_4.png);background-repeat:no-repeat;background-position: center top;background-size:250px 120px;   width: 250px; height: 120px;">
                                <br><br>
                                <input type="text" style="width:100px; height:30px; border-color:Blue;margin-left:-50px;font-size:larger;font-weight:bold;" id="t_3" maxlength="6">
                                    <input type="button" class="divCells8" style="color:rgb(0, 255, 4);margin-left:10px;font-size:12px;font-weight:bold;background-color:blueviolet;border-radius:30px;" onclick="calc()" id="t_4" value="Click here for Predication">
                                </td>
                            
                                </tr>
                                 <tr>
                                <td style="background-image:url(logo12_files/image_2_1.png);background-repeat:no-repeat;background-position: center top;background-size:100% 100%;   width: 250px; height: 120px;"></td>
                                <td style="background-image:url(logo12_files/image_1_4.png);background-repeat:no-repeat;background-position: center top;background-size:250px 120px;   width: 250px; height: 120px;">
                            
                                </td>
                            
                                <td style="background-image:url(logo12_files/image_1_4.png);background-repeat:no-repeat;background-position: center top;background-size:250px 120px;   width: 250px; height: 120px;"></td>
                            
                                </tr>
                                </tbody>
                            {{-- img code end --}}
                            {{-- video code --}}



                    </td>
                </tr>

            </tbody>
            
        </table>

        <iframe src="https://g2.ipcamlive.com/player/player.php?alias=5e5a05863bb0b" height="550px"
        autoplay="1" allow="autoplay" frameborder="0" style="width: 788px"></iframe>
        
    </div>
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


</table>
</html>
