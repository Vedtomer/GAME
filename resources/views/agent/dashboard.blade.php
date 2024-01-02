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
            background: <?php echo $number == 7000 ? 'rgb(243, 180, 185)' : 'rgb(237, 227, 166)'; ?>;
        }

        input {

            border: 1px solid <?php echo $number == 7000 ? 'rgb(243, 180, 185)' : 'rgb(237, 227, 166)'; ?>;

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
        .custom-span{
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
        .cust-span{
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
    </style>
<div style="display: flex; justify-content: space-between; align-items: center; overflow-x: auto; padding: 10px;">

    <div>
        <td class="custom-td" style="">
            <span id="RemainTime" class="custom-span" style="display: none; ">00:14:34</span>
            <span id="NowTime" class="custom-span"><?php echo date('h:i:s A'); ?></span>
            <input name="hd_nextime" id="hd_nextime" type="hidden">
        </td>
    </div>

    <div>
        
        <td class="time-slot custom-td" style="">
           <div class="display:flex">
            <span  class="cust-span" style="color: rgb(16, 16, 16); ">Next Draw :</span>
            <span id="NextDrowTime" class="custom-span" style="margin-top: 60px; "></span>
           </div>
        </td>
    </div>

</div>



    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <div class="add" style="display: flex; align-items: center;">
                    {{-- <h5 class="card-title">TRANSACTION</h5> --}}
                    <div class="btns" style="margin-left: auto;">
                        {{-- <button type="button" class="btn btn-secondary">Transaction</button> --}}
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
                                                                                                                                                                                                                                                                                                                                                                        <th colspan=11><div class=submit><button type=submit class='mb-2 mr-2 btn-hover-shine btn-square btn btn-primary'>Submit </button><button class='mb-2 mr-2 btn-hover-shine btn-square btn btn-warning' id=reloadBtn>Clear </button></div></th>
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

        <div class="col-lg-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <div class="add" style="display: flex; align-items: center;">
                        {{-- <h5 class="card-title">TRANSACTION</h5> --}}
                        <div class="btns" style="margin-left: auto;">
                        </div>
                    </div>
                    <div class="table-responsive">
                        @if(isset($data) && count($data) > 0)
                        <h1 style="text-align: center" class="Purchase">Ticket Purchase</h1>
                        <table class="mb-0 table">
                            <thead>
                                <tr>
                                    <th>S No</th>
                                    {{-- <th>Username</th> --}}
                                    <th>Ticket Number</th>
                                    <th>QTY</th>
                                    <th>Points</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $user)
                                <tr>
                                        <td><b>{{ $loop->index + 1 }}</b></td>
                                        {{-- <td>{{ $user->user->name }}</td> --}}
                                        {{-- <td>
                                            <span
                                                class=" {{ $user->action === 'add' ? 'badge badge-success ml-2' : 'badge badge-danger ml-2' }}">{{ $user->action }}</span>
                                        </td> --}}
                                        <td > <span style="background-color: rgb(255, 247, 0); border-radius: 30px;width: 50px; height: 1px; padding:6px;"><b>{{ $user->ticket_number }}</b></span></td>
                                        <td><b>{{ $user->qty }}</b></td>
                                        <td><b>{{ $user->points }}</b></td>
                                        {{-- <td><b>{{ $user->result }}</b></td> --}}
                                        <td><b>{{ $user->created_at->format('d-m-Y') }}</b></td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                       {{-- <div class="pag mt-4" style="float: right">
                        {{ $data->links() }}
                       </div> --}}
                        @else
                        <p>No Ticket Purchase</p>
                    @endif
                    </div>
                </div>
            </div>
        </div>

        <script>
            function redirectToDashboard(number) {
                // Assuming you're using Laravel's named route 'dashboard'
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
           
            setInterval(function() {
                var now = new Date();
                var hours = now.getHours();
                var minutes = now.getMinutes();
                var seconds = now.getSeconds();
                var ampm = hours >= 12 ? 'P.M.' : 'A.M.';
        
          
                hours = hours % 12 || 12;
                minutes = minutes < 10 ? '0' + minutes : minutes;
                seconds = seconds < 10 ? '0' + seconds : seconds;
        
                var currentTime = hours + ':' + minutes + ':' + seconds + ' ' + ampm;
        
          
                document.getElementById('NowTime').innerText = currentTime;
            }, 1000); 
        </script>
        
        <script>
            function updateNextDrawTime() {
                var now = new Date();
                var minutes = now.getMinutes();
                var remainingMinutes = 15 - (minutes % 15);
        
                var nextDrawTime = new Date(now.getTime() + remainingMinutes * 60000);
        
                var hours = nextDrawTime.getHours();
                var minutes = nextDrawTime.getMinutes();
                var seconds = nextDrawTime.getSeconds();
                var ampm = hours >= 12 ? 'P.M.' : 'A.M.';
        
                hours = hours % 12 || 12;
                minutes = minutes < 10 ? '0' + minutes : minutes;
                seconds = seconds < 10 ? '0' + seconds : seconds;
        
                var nextDrawTimeString = hours + ':' + minutes + ':' + ' ' + ampm;
        
                document.getElementById('NextDrowTime').innerText = nextDrawTimeString;
            }
        
            updateNextDrawTime();
        
            setInterval(updateNextDrawTime, 900000); // Update every 900,000 milliseconds (15 minutes)
        </script>
        
        
    @endsection
