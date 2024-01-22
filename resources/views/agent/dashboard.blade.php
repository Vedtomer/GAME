@extends('agent.layout.agentmain')
@section('title', 'Purchase Ticket')
@section('section')
    <style>
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
            tr{
                border-bottom: 8px solid black;
            }
          
        }
    </style>
        <table class="table  table-striped">
            <thead>
              <tr>
                <td scope="col" style=" font-size:18px;"><b style="color: blue;">Date</b></td>
                <td scope="col" style="font-size:18px"><b style="color: blue;">CURRENT TIME</b></td>
                <td scope="col" style=" font-size:18px"><b style="color: blue;">REMAINING TIME</b></td>
                <td scope="col" style="font-size:18px"><b style="color: blue;">DRAW TIME</b></td>
                {{-- <td style="color: blue; font-size:18px">User Name</td> --}}
                <td><span id="" class="value">{{ Auth::guard('agent')->user()->email }}</span></td>
                {{-- <td style="color: blue; font-size:18px">Balance</td> --}}
                <td style="width: 160px;"><b>.....</b></td>
                <td><button style="height: 34px"> <a style="padding: 0px;" href="{{ URL::to('logout') }}" class="dropdown-item">Logout</a></button></td>
              </tr>
            </thead>
            <tbody>
              <tr>
                   <td> <span id="NowDate" class="value"></span></td>
                    <td><span id="NowTime" class="value"></span></td>
                    <td><span id="RemainingTime" class="value"></span></td>
                    <td><span id="NextDrowTime" class="value"></span></td>
                    <td><span id="" class="value">{{ Auth::guard('agent')->user()->balance ?? 00 }}</span></td>
                <td></td>
                <td></td>
              </tr>
            </tbody>
          </table>
    <div>
        <div class="main-card mb-3 card">
            <div class="card-body">
                <div class="add" style="display: flex; align-items: center;">
                    <div class="btns" style="margin-left: auto;">
                    </div>
                </div>


                <div class="">

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
                                    $lastSetIndex = $i % 10;
                                    if (($i + 1) % 10 === 0) {
                                        $lastSetIndex = $i % 9;
                                        if ($i == 99) {
                                            $lastSetIndex = 9;
                                        }
                                        echo "<th class=gradient-container ><span  id='qty{$i}' name='qty{$i}'>0</span></th>";
                                        echo "<th class=gradient-container><span  id='pts{$i}' name='pts{$i}'>0.00</span></th>";
                                        echo "<th class='result'><span style='color: red;'>" . ($data[$lastSetIndex]['timesloat'] ?? '--') . '</span></th>';
echo "<th class='result'><span style='color: red;'>" . ($data[$lastSetIndex]['number_60'] ?? '--') . '</span></th>';
echo "<th class='result'><span style='color: red;'>" . ($data[$lastSetIndex]['number_70'] ?? '--') . '</span></th>';
                                
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







        <script></script>
    @endsection
