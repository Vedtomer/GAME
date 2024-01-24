@extends('agent.layout.agentmain')
@section('title', 'Purchase Ticket')
@section('section')

<script
  src="https://code.jquery.com/jquery-3.7.1.slim.min.js"
  integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8="
  crossorigin="anonymous"></script>

<style>

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
<table class="table  table-striped">
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
                {{-- <span id="" class="value pr-2 mr-4">{{ Auth::guard('agent')->user()->balance ?? 00 }}</span> --}}
                <div class="dropdown">
                    <div class="dropdown" data-control="checkbox-dropdown" id="exampleDropdown">
                        <label class="dropdown-label">Select</label>
                        
                        <div class="dropdown-list" id="timeDropdownList">
                          <a href="#" data-toggle="check-all" class="dropdown-option">
                            Check All  
                          </a>
                          
                          <label class="dropdown-option" >
                            <input type="checkbox" name="dropdown-group" value="9:00"> 9:00
                           
                          </label>
                          
                          <label class="dropdown-option">
                            <input type="checkbox" name="dropdown-group" value="9:15">9:15
                          </label>
                          
                          <label class="dropdown-option">
                            <input type="checkbox" name="dropdown-group" value="9:30">9:30
                          </label>
                          
                          <label class="dropdown-option">
                            <input type="checkbox" name="dropdown-group" value="9:45">9:45
                          </label>
                          
                          <label class="dropdown-option">
                            <input type="checkbox" name="dropdown-group" value="10:00">10:00
                          </label>
                          
                          <label class="dropdown-option">
                            <input type="checkbox" name="dropdown-group" value="10:15">10:15
                          </label>
                          
                          <label class="dropdown-option">
                            <input type="checkbox" name="dropdown-group" value="10:30">10:30
                          </label>
                          
                          <label class="dropdown-option">
                            <input type="checkbox" name="dropdown-group" value="10:45">10:45
                          </label>  

                          <label class="dropdown-option">
                            <input type="checkbox" name="dropdown-group" value="11:00">11:00
                          </label>
                          
                          <label class="dropdown-option">
                            <input type="checkbox" name="dropdown-group" value="11:15">11:15
                          </label>
                          
                          <label class="dropdown-option">
                            <input type="checkbox" name="dropdown-group" value="11:30">11:30
                          </label>  

                          <label class="dropdown-option">
                            <input type="checkbox" name="dropdown-group" value="11:45">11:45
                          </label>
                          
                          <label class="dropdown-option">
                            <input type="checkbox" name="dropdown-group" value="12:00">12:00
                          </label>
                          
                          <label class="dropdown-option">
                            <input type="checkbox" name="dropdown-group" value="12:15">12:15
                          </label>  

                          <label class="dropdown-option">
                            <input type="checkbox" name="dropdown-group" value="12:30">12:30
                          </label>
                          
                          <label class="dropdown-option">
                            <input type="checkbox" name="dropdown-group" value="12:45">12:45
                          </label>
                          
                          <label class="dropdown-option">
                            <input type="checkbox" name="dropdown-group" value="13:00">13:00
                          </label>  

                          <label class="dropdown-option">
                            <input type="checkbox" name="dropdown-group" value="13:15">13:15
                          </label>
                          
                          <label class="dropdown-option">
                            <input type="checkbox" name="dropdown-group" value="13:30">13:30
                          </label>
                          
                          <label class="dropdown-option">
                            <input type="checkbox" name="dropdown-group" value="13:45">13:45
                          </label>  

                          <label class="dropdown-option">
                            <input type="checkbox" name="dropdown-group" value="14:00">14:00
                          </label>
                          
                          <label class="dropdown-option">
                            <input type="checkbox" name="dropdown-group" value="14:15">14:15
                          </label>
                          
                          <label class="dropdown-option">
                            <input type="checkbox" name="dropdown-group" value="14:30">14:30
                          </label>  

                          <label class="dropdown-option">
                            <input type="checkbox" name="dropdown-group" value="14:45">14:45
                          </label>
                          
                          <label class="dropdown-option">
                            <input type="checkbox" name="dropdown-group" value="15:00">15:00
                          </label>
                          
                          <label class="dropdown-option">
                            <input type="checkbox" name="dropdown-group" value="15:15">15:15
                          </label>  

                          <label class="dropdown-option">
                            <input type="checkbox" name="dropdown-group" value="15:30">15:30
                          </label>
                          
                          <label class="dropdown-option">
                            <input type="checkbox" name="dropdown-group" value="15:45">15:45
                          </label>
                          
                          <label class="dropdown-option">
                            <input type="checkbox" name="dropdown-group" value="16:00">16:00
                          </label>  

                          <label class="dropdown-option">
                            <input type="checkbox" name="dropdown-group" value="16:15">16:15
                          </label>
                          
                          <label class="dropdown-option">
                            <input type="checkbox" name="dropdown-group" value="16:30">16:30
                          </label>
                          
                          <label class="dropdown-option">
                            <input type="checkbox" name="dropdown-group" value="16:45">16:45
                          </label>
                          
                          <label class="dropdown-option">
                            <input type="checkbox" name="dropdown-group" value="17:00">17:00
                          </label>  

                          <label class="dropdown-option">
                            <input type="checkbox" name="dropdown-group" value="17:15">17:15
                          </label>  

                          <label class="dropdown-option">
                            <input type="checkbox" name="dropdown-group" value="17:30">17:30
                          </label>  

                          <label class="dropdown-option">
                            <input type="checkbox" name="dropdown-group" value="17:45">17:45
                          </label>  

                          <label class="dropdown-option">
                            <input type="checkbox" name="dropdown-group" value="18:00">18:00
                          </label>  

                          <label class="dropdown-option">
                            <input type="checkbox" name="dropdown-group" value="18:15">18:15
                          </label>  

                          <label class="dropdown-option">
                            <input type="checkbox" name="dropdown-group" value="18:30">18:30
                          </label>  

                          <label class="dropdown-option">
                            <input type="checkbox" name="dropdown-group" value="18:45">18:45
                          </label>  

                          <label class="dropdown-option">
                            <input type="checkbox" name="dropdown-group" value="19:00">19:00
                          </label>  

                          <label class="dropdown-option">
                            <input type="checkbox" name="dropdown-group" value="19:15">19:15
                          </label>  

                          <label class="dropdown-option">
                            <input type="checkbox" name="dropdown-group" value="19:30">19:30
                          </label>  

                          <label class="dropdown-option">
                            <input type="checkbox" name="dropdown-group" value="19:45">19:45
                          </label>  

                          <label class="dropdown-option">
                            <input type="checkbox" name="dropdown-group" value="20:00">20:00
                          </label>  

                          <label class="dropdown-option">
                            <input type="checkbox" name="dropdown-group" value="20:15">20:15
                          </label>  

                          <label class="dropdown-option">
                            <input type="checkbox" name="dropdown-group" value="20:30">20:30
                          </label> 
                          
                          <label class="dropdown-option">
                            <input type="checkbox" name="dropdown-group" value="20:45">20:45
                          </label>  

                          <label class="dropdown-option">
                            <input type="checkbox" name="dropdown-group" value="21:00">21:00
                          </label>  

                          <label class="dropdown-option">
                            <input type="checkbox" name="dropdown-group" value="21:15">21:15
                          </label>  

                          <label class="dropdown-option">
                            <input type="checkbox" name="dropdown-group" value="21:30">21:30
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
        document.addEventListener('DOMContentLoaded', function () {
            // Get the current time
            var currentTime = new Date();
            var currentHours = currentTime.getHours();
            var currentMinutes = currentTime.getMinutes();
    
            // Convert current time to a numerical value (e.g., 0945)
            var currentTimeValue = currentHours * 100 + currentMinutes;
    
            // Get all checkbox elements
            var checkboxes = document.querySelectorAll('#timeDropdownList input[type="checkbox"]');
    
            // Loop through checkboxes and remove past times
            checkboxes.forEach(function (checkbox) {
                var checkboxValue = parseInt(checkbox.value.replace(':', ''), 10);
                if (checkboxValue < currentTimeValue) {
                    checkbox.parentElement.remove();
                }
            });
        });
    </script>
    
    
    
    
    
<script>
 (function($) {
  var CheckboxDropdown = function(el) {
    var _this = this;
    this.isOpen = false;
    this.areAllChecked = false;
    this.$el = $(el);
    this.$label = this.$el.find('.dropdown-label');
    this.$checkAll = this.$el.find('[data-toggle="check-all"]').first();
    this.$inputs = this.$el.find('[type="checkbox"]');
    
    this.onCheckBox();
    
    this.$label.on('click', function(e) {
      e.preventDefault();
      _this.toggleOpen();
    });
    
    this.$checkAll.on('click', function(e) {
      e.preventDefault();
      _this.onCheckAll();
    });
    
    this.$inputs.on('change', function(e) {
      _this.onCheckBox();
    });
  };
  
  CheckboxDropdown.prototype.onCheckBox = function() {
    this.updateStatus();
  };
  
  CheckboxDropdown.prototype.updateStatus = function() {
    var checked = this.$el.find(':checked');
    // console.log(checked.length);
    this.areAllChecked = false;
    this.$checkAll.html('Select All');
    
    if(checked.length <= 0) {
      this.$label.html('Select');
    }
    else if(checked.length === 1) {
      this.$label.html(checked.parent('label').text());
    }
    else if(checked.length === this.$inputs.length) {
      this.$label.html('All Selected');
      this.areAllChecked = true;
      this.$checkAll.html('UnSelectAll');
    }
    else {
      this.$label.html(checked.length + ' Selected');
    }
    updateQty();
  };

  CheckboxDropdown.prototype.onCheckAll = function(checkAll) {
    if(!this.areAllChecked || checkAll) {
      this.areAllChecked = true;
      this.$checkAll.html('Uncheck All');
      this.$inputs.prop('checked', true);
    }
    else {
      this.areAllChecked = false;
      this.$checkAll.html('Check All');
      this.$inputs.prop('checked', false);
    }
    
    this.updateStatus();
  };
  
  CheckboxDropdown.prototype.toggleOpen = function(forceOpen) {
    var _this = this;
    
    if(!this.isOpen || forceOpen) {
       this.isOpen = true;
       this.$el.addClass('on');
      $(document).on('click', function(e) {
        if(!$(e.target).closest('[data-control]').length) {
         _this.toggleOpen();
        }
      });
    }
    else {
      this.isOpen = false;
      this.$el.removeClass('on');
      $(document).off('click');
    }
  };
  
  var checkboxesDropdowns = document.querySelectorAll('[data-control="checkbox-dropdown"]');
  for(var i = 0, length = checkboxesDropdowns.length; i < length; i++) {
    new CheckboxDropdown(checkboxesDropdowns[i]);
  }
})(jQuery);

</script>

    <script>
        function validateForm() {
            
                var inputValue = document.getElementById('inputField').value;

                if (inputValue.trim() === '') {
                    // Display an error message
                    alert('Error: Please enter a value before submitting.');
                    return false; // Prevent form submission
                }
            }
    </script>
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

   



    <script>
   
        var currentTime = new Date();
        var currentHour = currentTime.getHours();
        var currentMinute = currentTime.getMinutes();

   
        var formattedCurrentTime = currentHour * 60 + currentMinute;

 
        var dropdown = document.getElementById('exampleDropdown');
        var options = dropdown.options;
        var lastPastTimeIndex = -1;

        for (var i = options.length - 1; i >= 0; i--) {
            var optionValue = options[i].value;
            var optionTime = parseInt(optionValue.split(':')[0]) * 60 + parseInt(optionValue.split(':')[1]);

            if (optionValue !== "" && optionTime < formattedCurrentTime) {
                if (lastPastTimeIndex === -1) {
                    lastPastTimeIndex = i;
                } else {
                    dropdown.remove(i);
                }
            }
        }
    </script>



    <script></script>
    @endsection