@extends('agent.layout.agentmain')
@section('title', 'Purchase Ticket')
@section('section')
    <style>
        @media (max-width: 767px) {
           

            .card-body {
                padding: 2px !important;
            }

            th,
            td {
                border: 1px solid;

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
            font-weight: bold;
        }

        input:focus {
            outline: none;
            /* Remove outline on focus */
            /* Add additional styles for the focused state if needed */
        }
    </style>

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

                    <form>
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
                                
                                        echo "<th class=yellow><span for='A{$i}'>A</span><br><input type='tel' id='A{$i}' name='A{$i}' onkeypress='allowOnlyNumbers(event)' oninput='updateInputA{$i}()' class='input-box'></th>";
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
                                                                                                                                                                                                                                                                                                                                                                                                                    <th colspan=11><div class=submit><button class='mb-2 mr-2 btn-hover-shine btn-square btn btn-primary'>Submit </button><button class='mb-2 mr-2 btn-hover-shine btn-square btn btn-warning'>Clear </button></div></th>
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
                // Assuming you're using Laravel's named route 'dashboard'
                var url = '{{ route('dashboard', ':number') }}';
                url = url.replace(':number', number);
                window.location.href = url;
            }
        </script>

        <script type="text/javascript" src="{{ asset('asset/js/purchase.js') }}"></script>
    @endsection
