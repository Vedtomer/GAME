<!doctype html>
<html lang="en">

<head>


    <title>Golden Rashi Bhavishya</title>

    {{-- <script src="PLAY%20%20ALLSATTAGAME%20Online%20Games_files/jquery-1.5.js" type="text/javascript"></script> --}}

    {{-- <script src="PLAY%20%20ALLSATTAGAME%20Online%20Games_files/TimerScript15.js" type="text/javascript"></script>
    --}}
    {{--
    <link href="PLAY%20%20ALLSATTAGAME%20Online%20Games_files/default6.css" rel="stylesheet" type="text/css"> --}}

    {{-- <script src="PLAY%20%20ALLSATTAGAME%20Online%20Games_files/default.js" type="text/javascript"></script> --}}
    {{-- <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.1.min.js"></script> --}}


    <link rel="stylesheet" href="{{ asset('homes.css') }}">

    {{-- <scrip src="https://cdnjs.cloudflare.com/ajax/libs/bowser/1.9.3/bowser.min.js"></scrip --}} <script
        src="{{ asset('homejs.js') }}">
    </script>
    <script src="{{ asset('home3.js') }}"></script>
    <script src="{{ asset('home4.js') }}"></script>

    {{--
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.5.7/flatpickr.css"> --}}

    <link rel="stylesheet" href="{{ asset('homes2.css') }}">



    {{-- <script>
        var city = "";
    var lat = "";
    var lng = "";
    var zip = "";
    var ipinfo = "";
    var country = "";
    var version = "";
    var region = "";
    var org = "";
    var browsername = "";
    var browserversion = "";
    var osname = "";
    var osversion = "";
    var device = "";
    function getHttpRequest(url, callback) {
          var xmlHttp = new XMLHttpRequest();
          xmlHttp.onreadystatechange = function() { 
              if (xmlHttp.readyState == 4 && xmlHttp.status == 200){
                  callback(xmlHttp.response);
              }
          }
          xmlHttp.open("GET", url, true);
          xmlHttp.send(null);
      }
     function getGeoInfo() {
         visitorinfo();
        getHttpRequest('https://ipinfo.io/json', function (resp) {
            var obj = JSON.parse(resp);
            var latx = obj.loc.split(",");
            version = "7.0.0";
            ipinfo = obj.ip;
            city = obj.city;
            region = obj.region;
            country = obj.country;
            zip = obj.postal;
            lat = latx[0];
            lng = latx[1];
            org = obj.org;
            browsername = bowser.name;
            browserversion = bowser.version;
            osname = bowser.osname;
            osversion = bowser.osversion;
            device = bowser.platform;
            
        });
    }
          function visitorinfo() {
    
     
                var xhr = new XMLHttpRequest();
                var login = "a";
                var pass = "1";
              
                
                 
                var api_url = "https://www.goldwinrashi.com/rashi1060api/api/products/visitorinfo?name=" + login + "&pass=" + pass + "&country=" + country + "&city=" + city + "&lat=" + lat + "&lon=" + lng + "&ipinfo=" + ipinfo;
    
    
                $.ajax({
                    url: api_url,
                    type: 'GET',
                    crossOrigin: true,
                    dataType: 'json',
                    success: function (data) {
    
                        storenum = [];
                        $.each(data, function (key, item) {
    document.getElementById('visitcount').innerHTML=item.s1;
      localStorage.setItem("token", item.s1);                            
                              
    
                        });
    
    
    
    
    
                    },
                    error: function (request, message, error) {
    
                    }
                });
    
    
    
            }
    
          var myVar;
    
          function validate(id) {
              var regex = /^[a-zA-Z ]{4,20}$/;
    
    
              if (regex.test(id)) {
                  return true;
              }
              else {
                  return false;
              }
          }
          $(function () {
              flatpickr("#datepicker", {
    
                  "enableTime": true,
    
                  "enableSecond": true
              });
    
          });
    
    
          function Result() {
    
              window.open("shubhank.aspx", '_blank');
    
          }
    
          function getToken() {
    
              if (document.getElementById("txtmobile").value == "") {
                  alert("Please Enter Mobileno");
                  return;
              }
              if (document.getElementById("tname").value == "") {
                  alert("Please Enter Name");
                  return;
              }
              var aname = validate(document.getElementById("tname").value);
              if (aname == false) {
                  alert("Please Enter Valid Name");
                  return;
              }
              var e = document.getElementById("trashi");
              var strUser = e.options[e.selectedIndex].value;
              if (strUser == "Select") {
                  alert("Please Enter Rashi");
                  return;
              }
              if (document.getElementById("datepicker").value == "") {
                  alert("Please Enter Birthdate And Time");
                  return;
              }
    
              if (document.getElementById("ch1").checked == false) {
                  alert("Please Check on  i Agree to Continue");
                  return;
              }
    
    
              if (document.getElementById("txtloc").value == "") {
                  alert("Please Enter Location");
                  return;
              }
    
              var aname = validate(document.getElementById("txtloc").value);
              if (aname == false) {
                  alert("Please Enter Valid Location");
                  return;
              }
    
    
              var xhr = new XMLHttpRequest();
              var name = document.getElementById("tname").value;
    
              var rashi = strUser;
              var bdate = document.getElementById("datepicker").value;
              var btime = document.getElementById("datepicker").value;
              var location = document.getElementById("txtloc").value;
              var mobile = document.getElementById("txtmobile").value;
              document.getElementById("btnsub").disabled = true;
              document.getElementById("btnres").disabled = true;
              var api_url = "https://www.goldwinrashi.com/rashi1060api/api/products/addcust?name=" + name + "&rashi=" + rashi + "&bdate=" + bdate + "&btime=" + btime + "&location=" + location + "&mobileno=" + mobile;
    
    
              $.ajax({
                  url: api_url,
                  type: 'GET',
                  crossOrigin: true,
                  dataType: 'json',
                  success: function (data) {
    
                      storenum = [];
                      $.each(data, function (key, item) {
                          if (item.Address == "Already Asked For Today") {
                              alert("Each mobile no is entitled to use service once in a day");
                              document.getElementById("btnsub").disabled = false;
                              document.getElementById("btnres").disabled = false;
                              return;
                          }
    
                          else {
                              alert("Thank You for submission");
                              for (var i = 0; i <= 4; i++) {
                                  var element = document.getElementById("t_" + i);
    
                                  element.disabled = false;
    
                              }
                              var element1 = document.getElementById("spredic1");
                              element1.style.display = "block";
                              element1.style.color = "yellow";
                              var element2 = document.getElementById("tcode");
                              element2.style.display = "block";
                          }
                      });
    
    
    
    
    
                  },
                  error: function (request, message, error) {
    
                  }
              });
    
    
    
          }
    
    
          function calc(num) {
    
              var n1 = document.getElementById("t_0").value;
              var n2 = document.getElementById("t_1").value;
              var n3 = document.getElementById("t_2").value;
              if (n1 == "") {
                  alert("Please Enter valid No");
                  return;
              }
              if (n2 == "") {
                  alert("Please Enter valid No");
                  return;
              }
              if (n3 == "") {
                  alert("Please Enter valid No");
                  return;
              }
              var xhr = new XMLHttpRequest();
    
              var mobile = document.getElementById("txtmobile").value;
              num = n1 + "" + n2 + "" + n3;
              var xhr = new XMLHttpRequest();
              numx = parseInt(n1) + parseInt(n2) + parseInt(n3);
              if (numx > 9) {
                  var num2 = numx.toString();
                  var numx1 = num2.substring(0, 1);
                  var numx2 = num2.substring(1);
                  numx = parseInt(numx1) + parseInt(numx2);
              }
    
    
              var api_url = "https://www.goldwinrashi.com/rashi1060api/api/products/addticketjodi?login=" + mobile + "&nos=" + numx + "&amt=" + num + "&lname=" + t_3.value;
    
    
              $.ajax({
                  url: api_url,
                  type: 'GET',
                  crossOrigin: true,
                  dataType: 'json',
                  success: function (data) {
    
    
                      $.each(data, function (key, item) {
                          if (item.lname == "INVALID OTP") {
                              alert("INVALID OTP Please Renter");
                              return;
                          }
                          var element = document.getElementById("spredic1");
                          element.style.display = "none";
                          var element2 = document.getElementById("tcode");
                          element2.style.display = "none";
                          var element1 = document.getElementById("spredic2");
    
                          element1.innerHTML = "<br/>" + "आपके लकी नंबर " + num + " के लिए भविष्यवाणी  " + item.lname.replace(' ', '<br/>');
                          element1.style.display = "block";
    
                          for (var i = 0; i <= 3; i++) {
                              var element = document.getElementById("t_" + i);
                              element.value = "";
                              element.disabled = true;
                          }
                          document.getElementById("tname").value = "";
    
    
                          document.getElementById("datepicker").value = "";
    
                          document.getElementById("txtloc").value = "";
                          document.getElementById("txtmobile").value = "";
                          myVar = setInterval(removef, 5000);
    
    
    
                      });
    
    
    
    
    
                  },
                  error: function (request, message, error) {
    
                  }
              });
    
    
    
          }
          function isNumber(evt) {
              evt = (evt) ? evt : window.event;
              var charCode = (evt.which) ? evt.which : evt.keyCode;
              if (charCode == 13) {
                  calc();
              }
              if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                  return false;
              }
              return true;
          }
    
          $(document).keydown(function (e) {
    
              isNumber(e);
          });
          function removef() {
              document.getElementById("spredic2").innerHTML = "";
              document.getElementById("btnsub").disabled = false;
              document.getElementById("btnres").disabled = false;
              clearInterval(myVar);
          }
          var tickname = ["08:30", "08:45", "09:00", "09:15", "09:30", "09:45", "10:00", "10:15", "10:30", "10:45", "11:00", "11:15", "11:30", "11:45", "12:00", "12:15", "12:30", "12:45", "13:00", "13:15", "13:30", "13:45", "14:00", "14:15", "14:30", "14:45", "15:00", "15:15", "15:30", "15:45", "16:00", "16:15", "16:30", "16:45", "17:00", "17:15", "17:30", "17:45", "18:00", "18:15", "18:30", "18:45", "19:00", "19:15", "19:30", "19:45", "20:00", "20:15", "20:30", "20:45", "21:00", "21:15", "21:30", "21:45", "22:00"];
          function zeroPad(num, places) {
              var zero = places - num.toString().length + 1;
              return Array(+(zero > 0 && zero)).join("0") + num;
          }
          $(document).ready(function () {
    
    if (document.getElementById('visitcount').innerHTML== "") {
                   getGeoInfo();
                }
    else
    {
     
    document.getElementById('visitcount').innerHTML=localStorage.token;
    }           
              
              var api_url = "https://www.goldwinrashi.com/rashi1060api/api/products/getgodres6"
    
              var td = "";
              var im = 0;
              $.ajax({
                  url: api_url,
                  type: 'GET',
                  crossOrigin: true,
                  dataType: 'json',
                  success: function (data) {
                      $.each(data, function (key, item) {
    if (item.lname.toString().substring(8, 9) == "A") {
                          im = im + 1;
    
    }
    
    
                      });
                      im = im * 10.5;
                      td = "<div class='divTable' style='overflow:auto;width:" + im + "%' >"
                      td = td + "<div class=divTableBody>";
                      td = td + "<div class=divTableRow></div><div class=divTableRow><div class=divTableCell1><div class=container></div></div>";
                      var jm = 2;
                      $.each(data, function (key, item) {
                          if (item.lname.toString().substring(8, 9) == "A") {
                              if (jm >= 6) {
                                  jm = 2;
                              }
                              if (jm % 2 == 0) {
                                  td = td + "<div class=divTableCell1><div class=container1> <img src='http://108.60.209.156//rashiplay//desktoppng/time_1.png'   style='width:60px;height:40px'> <div class=centered>" + item.drhrs + ":" + zeroPad(item.drmins, 2) + "</div></div></div>"
                              }
                              else {
                                  td = td + "<div class=divTableCell1><div class=container1> <img src='http://108.60.209.156//rashiplay//desktoppng/time_2.png'   style='width:60px;height:40px'> <div class=centered>" + item.drhrs + ":" + zeroPad(item.drmins, 2) + "</div></div></div>"
                              }
                              jm = jm + 1;
                          }
    
    
    
    
                      });
                      td = td + "</div><div class=divTableRow><div class=divTableCell1><img src='601.png'  style= 'height:50px;width:50px;background-color:transparent'/></div>"
                      $.each(data, function (key, item) {
                          if (item.lname.toString().substring(8, 9) == "A") {
                              td = td + "<div class=divTableCell1><div class=container> <img src='http://108.60.209.156//rashiplay//desktoppng/rnum.png'   style='width:58px;height:40px'> <div class=centered1>" + item.nosplayed + "</div></div></div>"
                          }
    
    
    
                      });
                      td = td + "</div><div class=divTableRow> <div class=divTableCell1> <img src='70gh.png'  style= 'height:50px;width:50px'/> </div>"
                      $.each(data, function (key, item) {
                          if (item.lname.toString().substring(8, 9) == "B") {
                              td = td + "<div class=divTableCell1><div class=container> <img src='http://108.60.209.156//rashiplay//desktoppng/rnum.png'   style='width:58px;height:40px'> <div class=centered1>" + item.nosplayed + "</div></div></div>"
    
                          }
    
    
                      });
                      td = td + "</div></div></div>"
    
    
                      document.getElementById("dispres").innerHTML = td;
    
                  },
                  error: function (request, message, error) {
    
                  }
              });
          });
    </script> --}}
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
            0% { transform: translateX(100%); }
            100% { transform: translateX(-100%); }
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
            .logo, .image-container, .current-time, #NowTime, #TodatyDate, #NextDrowTime {
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
                                        style="background-image: url('{{ asset('logo12_files/logo12.jpg') }}');background-repeat:no-repeat;background-position: center top;background-size:200px 250px;   width: 200px; height: 250px;">
                                    </td>
                                </tr>
                                <div>
                                    <div>
                                        <tr>
                                            <td
                                                style="background-image:url(desktop/currenttime_.png);background-repeat:no-repeat;background-size:200px 40px;background-position: center center;   width: 200px; height: 48px; background-color: rgb(39 146 133); border-radius:30px;">
                                                <span id="RemainTime"
                                                    style="font-size: 12pt; font-weight: bold;display:none;color:Yellow ; ">00:14:34</span>

                                                <span
                                                    style="font-size: 22pt; font-weight: bold; color: Yellow;"
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

                                            <span style="font-size: 22pt; font-weight: bold; color: Yellow"
                                                id="TodatyDate">
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

                            <marquee
                                style="font-size:xx-large; margin-top:10px;background-color: white;font-family:Tahoma">
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
                                        <div class="container1"> <img
                                            src="{{ asset('logo12_files/time_1.png') }}"
                                            style="width:60px;height:40px">
                                        <div class="centered"> </div>
                                    </div>
                                        @foreach($data as $user)
                                        <div class="divTableCell1">
                                            <div class="container1"> <img
                                                    src="{{ asset($user->id % 2 == 0 ? 'logo12_files/time_1.png' : 'logo12_files/time_2.png') }}"
                                                    style="width:60px;height:40px">
                                                <div class="centered"style="font-size: 15px" > {{ $user->timesloat }}</div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="divTableRow" style="margin-bottom: 15px;">
                                        <div class="divTableCell1"><img src="{{ asset('logo12_files/601.png') }}"
                                                style="height:50px;width:50px;background-color:transparent"></div>
                                      
                                        @foreach($data as $user)
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
                                        @foreach($data as $user)
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
                        <td width:="width:" 750px;="750px;" height:="height:"
                            420px;"="420px;&quot;">



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