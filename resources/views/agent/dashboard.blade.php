<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title> @yield('title', 'Agent Dashboard')</title>

    {{-- <link rel="stylesheet" href="{{ asset('main.css') }}"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


</head>

<body>

    <style>
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
                font-size: 12px;
                /* Adjust as needed */
            }

            .label {
                font-size: 10px;
                font-weight: bolder
            }

            .info-box {

                padding: 0px;
            }

        }


* {
  box-sizing: border-box;
}

a {
  text-decoration: none;
  color: #379937;
}

body {
  /* margin: 40px; */
}

.dropdown {
  position: relative;
  font-size: 14px;
  color: #333;

  .dropdown-list {
    /* padding: 12px; */
    background: #fff;
    position: absolute;
    top: 30px;
    left: 1px;
    right: 1px;
    box-shadow: 0 1px 2px 1px rgba(0, 0, 0, .15);
    transform-origin: 50% 0;
    transform: scale(1, 0);
    transition: transform .15s ease-in-out .15s;
    max-height: 66vh;
    overflow-y: scroll;
  }
  
  .dropdown-option {
    display: block;
    padding: 0px 4px;
    opacity: 0;
    transition: opacity .15s ease-in-out;
    font-size: 16px;
  }
  
  .dropdown-label {
    display: block;
    height: 30px;
    background: #fff;
    border: 1px solid #ccc;
    padding: 6px 12px;
    line-height: 1;
    cursor: pointer;
    width: 120px;
    
    &:before {
      content: '▼';
      float: right;
    }
  }
  
  &.on {
   .dropdown-list {
      transform: scale(1, 1);
      transition-delay: 0s;
      
      .dropdown-option {
        opacity: 1;
        transition-delay: .2s;
      }
    }
    
    .dropdown-label:before {
      content: '▲';
    }
  }
  
  [type="checkbox"] {
    position: relative;
    top: -1px;
    margin-right: 4px;
  }
}



    @media (max-width: 767px) {


        .app-page-title {
            padding: 15px;
            margin: -15px 0px 15px;
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

    th.result {
        background-color: lemonchiffon;
        font-weight: 900;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        border: 2px solid;
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
        padding: 0;
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
        background: <?php echo $number ==7000 ? 'rgb(243, 180, 185)': 'rgb(237, 227, 166)';
        ?>;
    }

    input {

        border: 1px solid <?php echo $number ==7000 ? 'rgb(243, 180, 185)': 'rgb(237, 227, 166)';
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

        tr {
            border-bottom: 8px solid black;
        }
    }
    /* Add your styles here */
.dropdown {
  position: relative;
  display: inline-block;
  z-index: 1;
}

.dropbtn {
  padding: 10px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  padding: 12px 16px;
  z-index: 1;
}

.dropdown-content label {
  display: block;
  margin-bottom: 8px;
}

.dropdown-content input {
  margin-right: 8px;
}

.dropdown-content input, .dropbtn {
  cursor: pointer;
}

.dropdown:hover .dropdown-content {
  display: block;
}

</style>

<form action="{{ route('savedashboard') }}" method="post">

<div>
    <div class="main-card  card">
        <div class="card-body">
          <table class="table mb-0 table-striped">
            <thead>
                <tr>
                    <td scope="col" style=" font-size:18px;border-top: 1px solid black;"><b style="color: blue;">Date</b></td>
                    <td scope="col" style="font-size:18px;border-top: 1px solid black;"><b style="color: blue;">CURRENT TIME</b>
                    </td>
                    <td scope="col" style=" font-size:18px;border-top: 1px solid black;"><b style="color: blue;">REMAINING
                            TIME</b></td>
                    <td scope="col" style="font-size:18px;border-top: 1px solid black;"><b style="color: blue;">DRAW TIME</b>
                    </td>
                    {{-- <td style="color: blue; font-size:18px">User Name</td> --}}
                    <td style="border-top: 1px solid black;"><span id="" class="value">{{ Auth::guard('agent')->user()->email
                            }}</span></td>
                    {{-- <td style="color: blue; font-size:18px">Balance</td> --}}
                    <td style="width: 160px; border-top: 1px solid black;"><b><span id="" class="value pr-2 mr-4">{{ Auth::guard('agent')->user()->balance ?? 00 }}</span></b></td>
                    <td style="border-top: 1px solid black;"><button style="height: 34px"> <a style="padding: 0px;"
                                href="{{ URL::to('logout') }}" class="dropdown-item">Logout</a></button></td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td> <span id="NowDate" class="value"></span></td>
                    <td><span id="NowTime" class="value"></span></td>
                    <td><span id="RemainingTime" class="value"></span></td>
                    <td><span id="NextDrowTime" class="value"></span></td>
                    <td>
                  
                        <div class="dropdown">
                            <div class="dropdown" data-control="checkbox-dropdown" id="exampleDropdown">
                                <label class="dropdown-label">Select</label>
                                
                                <div class="dropdown-list" id="timeDropdownList">
                                  <a href="#" data-toggle="check-all" class="dropdown-option">
                                    Check All  
                                  </a>
                                  
                                  <label class="dropdown-option" >
                                    <input type="checkbox" name="timeslots[]" value="9:00"> 9:00
                                   
                                  </label>
                                  
                                  <label class="dropdown-option">
                                    <input type="checkbox" name="timeslots[]" value="9:15">9:15
                                  </label>
                                  
                                  <label class="dropdown-option">
                                    <input type="checkbox" name="timeslots[]" value="9:30">9:30
                                  </label>
                                  
                                  <label class="dropdown-option">
                                    <input type="checkbox" name="timeslots[]" value="9:45">9:45
                                  </label>
                                  
                                  <label class="dropdown-option">
                                    <input type="checkbox" name="timeslots[]" value="10:00">10:00
                                  </label>
                                  
                                  <label class="dropdown-option">
                                    <input type="checkbox" name="timeslots[]" value="10:15">10:15
                                  </label>
                                  
                                  <label class="dropdown-option">
                                    <input type="checkbox" name="timeslots[]" value="10:30">10:30
                                  </label>
                                  
                                  <label class="dropdown-option">
                                    <input type="checkbox" name="timeslots[]" value="10:45">10:45
                                  </label>  
        
                                  <label class="dropdown-option">
                                    <input type="checkbox" name="timeslots[]" value="11:00">11:00
                                  </label>
                                  
                                  <label class="dropdown-option">
                                    <input type="checkbox" name="timeslots[]" value="11:15">11:15
                                  </label>
                                  
                                  <label class="dropdown-option">
                                    <input type="checkbox" name="timeslots[]" value="11:30">11:30
                                  </label>  
        
                                  <label class="dropdown-option">
                                    <input type="checkbox" name="timeslots[]" value="11:45">11:45
                                  </label>
                                  
                                  <label class="dropdown-option">
                                    <input type="checkbox" name="timeslots[]" value="12:00">12:00
                                  </label>
                                  
                                  <label class="dropdown-option">
                                    <input type="checkbox" name="timeslots[]" value="12:15">12:15
                                  </label>  
        
                                  <label class="dropdown-option">
                                    <input type="checkbox" name="timeslots[]" value="12:30">12:30
                                  </label>
                                  
                                  <label class="dropdown-option">
                                    <input type="checkbox" name="timeslots[]" value="12:45">12:45
                                  </label>
                                  
                                  <label class="dropdown-option">
                                    <input type="checkbox" name="timeslots[]" value="13:00">13:00
                                  </label>  
        
                                  <label class="dropdown-option">
                                    <input type="checkbox" name="timeslots[]" value="13:15">13:15
                                  </label>
                                  
                                  <label class="dropdown-option">
                                    <input type="checkbox" name="timeslots[]" value="13:30">13:30
                                  </label>
                                  
                                  <label class="dropdown-option">
                                    <input type="checkbox" name="timeslots[]" value="13:45">13:45
                                  </label>  
        
                                  <label class="dropdown-option">
                                    <input type="checkbox" name="timeslots[]" value="14:00">14:00
                                  </label>
                                  
                                  <label class="dropdown-option">
                                    <input type="checkbox" name="timeslots[]" value="14:15">14:15
                                  </label>
                                  
                                  <label class="dropdown-option">
                                    <input type="checkbox" name="timeslots[]" value="14:30">14:30
                                  </label>  
        
                                  <label class="dropdown-option">
                                    <input type="checkbox" name="timeslots[]" value="14:45">14:45
                                  </label>
                                  
                                  <label class="dropdown-option">
                                    <input type="checkbox" name="timeslots[]" value="15:00">15:00
                                  </label>
                                  
                                  <label class="dropdown-option">
                                    <input type="checkbox" name="timeslots[]" value="15:15">15:15
                                  </label>  
        
                                  <label class="dropdown-option">
                                    <input type="checkbox" name="timeslots[]" value="15:30">15:30
                                  </label>
                                  
                                  <label class="dropdown-option">
                                    <input type="checkbox" name="timeslots[]" value="15:45">15:45
                                  </label>
                                  
                                  <label class="dropdown-option">
                                    <input type="checkbox" name="timeslots[]" value="16:00">16:00
                                  </label>  
        
                                  <label class="dropdown-option">
                                    <input type="checkbox" name="timeslots[]" value="16:15">16:15
                                  </label>
                                  
                                  <label class="dropdown-option">
                                    <input type="checkbox" name="timeslots[]" value="16:30">16:30
                                  </label>
                                  
                                  <label class="dropdown-option">
                                    <input type="checkbox" name="timeslots[]" value="16:45">16:45
                                  </label>
                                  
                                  <label class="dropdown-option">
                                    <input type="checkbox" name="timeslots[]" value="17:00">17:00
                                  </label>  
        
                                  <label class="dropdown-option">
                                    <input type="checkbox" name="timeslots[]" value="17:15">17:15
                                  </label>  
        
                                  <label class="dropdown-option">
                                    <input type="checkbox" name="timeslots[]" value="17:30">17:30
                                  </label>  
        
                                  <label class="dropdown-option">
                                    <input type="checkbox" name="timeslots[]" value="17:45">17:45
                                  </label>  
        
                                  <label class="dropdown-option">
                                    <input type="checkbox" name="timeslots[]" value="18:00">18:00
                                  </label>  
        
                                  <label class="dropdown-option">
                                    <input type="checkbox" name="timeslots[]" value="18:15">18:15
                                  </label>  
        
                                  <label class="dropdown-option">
                                    <input type="checkbox" name="timeslots[]" value="18:30">18:30
                                  </label>  
        
                                  <label class="dropdown-option">
                                    <input type="checkbox" name="timeslots[]" value="18:45">18:45
                                  </label>  
        
                                  <label class="dropdown-option">
                                    <input type="checkbox" name="timeslots[]" value="19:00">19:00
                                  </label>  
        
                                  <label class="dropdown-option">
                                    <input type="checkbox" name="timeslots[]" value="19:15">19:15
                                  </label>  
        
                                  <label class="dropdown-option">
                                    <input type="checkbox" name="timeslots[]" value="19:30">19:30
                                  </label>  
        
                                  <label class="dropdown-option">
                                    <input type="checkbox" name="timeslots[]" value="19:45">19:45
                                  </label>  
        
                                  <label class="dropdown-option">
                                    <input type="checkbox" name="timeslots[]" value="20:00">20:00
                                  </label>  
        
                                  <label class="dropdown-option">
                                    <input type="checkbox" name="timeslots[]" value="20:15">20:15
                                  </label>  
        
                                  <label class="dropdown-option">
                                    <input type="checkbox" name="timeslots[]" value="20:30">20:30
                                  </label> 
                                  
                                  <label class="dropdown-option">
                                    <input type="checkbox" name="timeslots[]" value="20:45">20:45
                                  </label>  
        
                                  <label class="dropdown-option">
                                    <input type="checkbox" name="timeslots[]" value="21:00">21:00
                                  </label>  
        
                                  <label class="dropdown-option">
                                    <input type="checkbox" name="timeslots[]" value="21:15">21:15
                                  </label>  
        
                                  <label class="dropdown-option">
                                    <input type="checkbox" name="timeslots[]" value="21:30">21:30
                                  </label>  
                                </div>
                              </div>
                            {{-- </div> --}}
                   
                            
                          </div>
                    </td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
            <div class="add" style="display: flex; align-items: center;">
                <div class="btns" style="margin-left: auto;">
                </div>
            </div>
            <div class="">
                    @csrf
                    <table>
                        <tr>
                            <?php
                                for ($i = -1; $i < 10; $i++) {
                                    if ($i == -1) {
                                        echo '<td></td><td></td>';
                                    } else {
                                        echo "<th class=yellow><span for='input_top_{$i}'>B </span><br><input type='tel' maxlength='4' id='input_top_{$i}' name='input_top_{$i}' onkeypress='allowOnlyNumbers(event)' oninput='updateInputs{$i}()' class='input-box'></th>";
                                    }
                                
                                    if ($i == 9) {
                                        echo "<th class=gradient-container><span for='input_top'>QTY.</span></th><th class=gradient-container><span for='input_top'>PTS.</span></th>
                                                                        
                                       <th class=result><span for='input_top'>Time</span></th>
                                       <th class=result><span for='input_top'>60</span></th>
                                       <th class=result><span for='input_top'>70</span></th>
                                                                        
                                                                        ";
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
                                            echo "<th class=gradient-container><span for='radio60'>60</span><input type='radio' maxlength='4' name='radioNumber' value='60' id='radio60' class='' onclick='redirectToDashboard(6000)' " . ($number == 6000 ? 'checked' : '') . '></th>';
                                        } elseif ($i == 10) {
                                            echo "<th class=gradient-container><span for='radio70'>70</span><input type='radio' maxlength='4' name='radioNumber' value='70' id='radio70' class='' onclick='redirectToDashboard(7000)' " . ($number == 7000 ? 'checked' : '') . '></th>';
                                        } else {
                                            echo '<th class=gradient-container></th>';
                                        }
                                
                                        echo "<th class=yellow><span for='A{$i}'> A</span><br><input type='tel' id='A{$i}' maxlength='4' name='A{$i}' onkeypress='allowOnlyNumbers(event)' oninput='updateInputA{$i}()' class='input-box'></th>";
                                    }
                                
                                    $defaultspan = $j;
                                    $defaultName = $j;
                                
                                    echo "<th class=main-input><span for='{$defaultName}'>{$defaultspan}</span><br><input type='tel' maxlength='4' id='input{$i}' name='{$defaultName}' onkeypress='allowOnlyNumbers(event)' oninput='updateQty()' class='input-box'></th>";
                                    $lastSetIndex = $i % 10;
                                    if (($i + 1) % 10 === 0) {
                                        $lastSetIndex = $i % 9;
                                        if ($i == 99) {
                                            $lastSetIndex = 9;
                                        }
                                        echo "<th class=gradient-container ><span  id='qty{$i}' name='qty{$i}'>0</span></th>";
                                        echo "<th class=gradient-container><span  id='pts{$i}' name='pts{$i}'>0.00</span></th>";
                                        echo "<th class='result'><span style='color: red;'>" . ($data[$lastSetIndex]['timesloat'] ?? '--') . '</span></th>';
echo "<th class='result'><span style='color: red;'>" . "60".($data[$lastSetIndex]['number_60'] ?? '--') . '</span></th>';
echo "<th class='result'><span style='color: red;'>" . "70".($data[$lastSetIndex]['number_70'] ?? '--') . '</span></th>';
                                
                                        echo '</tr><tr>';
                                    }
                                
                                    if ($i == 99) {
                                        echo "<tr>
                                                                                                                               <th colspan=11><div class=submit><button type=submit id='submitButton' onclick='validateForm()' class='mb-2 mr-2 btn-hover-shine btn-square btn btn-primary' id='submitButton'> <b>Submit</b> </button> 
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
    <script type="text/javascript" src="{{ asset('asset/js/purchase.js') }}"></script>

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
   
   @include('agent.layout.agentfooter')
  </body>
  
  </html>