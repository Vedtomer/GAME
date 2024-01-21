<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('main.css') }}">
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    
    <style>
         th{
            /* border: 1px solid gray; */
            font-weight: bold;
        }
        tr{
            border: 1px solid gray;
            font-weight: bold;
            font-size: 18px;
    
        }
        td{
            border: 1px solid gray;
            font-weight: bold;
        }
        .manage tbody tr td {
    text-align: center;
}

@media (max-width: 767px) {
       th{
        width: 80px;
        font-size: 14px;
        
       }
       img{
        width: 40px;
        height: 4px;
       }
    }

    </style>
  </head>
  <body>


<form method="post" action="{{ route('subhank') }}" id="form1">
    @csrf
  
    <div id="Panel2" class="rounded_corners" border="0" style="overflow:auto;">
    <div id="div1" class="tableDiv">
    <selectedrowstyle backcolor="ActiveCaption">
        <div class="manage">

           
            <table class="table responsive" cellspacing="0" id="grda" style="width:100%;border-collapse:collapse;">
                <thead>
                    <tr>
                        <th style="width: 10% ;text-align: center;" scope="col">                   
                             <input type="date" id="dateFilter" onchange="fetchData()" style="flex: 0 0 auto;  "></th>
                        <th style="width: 10%;text-align: center;" scope="col"> <img src="{{ asset('logo12_files/601.png') }}" style="height:50px;"></th>
                        <th style="width: 10%;text-align: center;" scope="col"> <img src="{{ asset('logo12_files/70gh.png') }}" style="height:50px;  flex: 0 0 auto; margin-left: 10px;"></th>
                    </tr>
                    <tr>
                        <th style="width: 10% ;text-align: center;" scope="col">ShubhankTime</th>
                        <th style="width: 10%;text-align: center;" scope="col">60Shubhank</th>
                        <th style="width: 10%;text-align: center;" scope="col">70Shubhank</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($data) && count($data) > 0)

                 @foreach($data as $user)
                            <tr> 
                                <td style="text-align: center;">{{ $user->timesloat }}</td>
                                <td style="text-align: center;">{{ $user->number_60 }}</td>
                                <td style="text-align: center;">{{ $user->number_70 }}</td>
                            </tr>
                        @endforeach

                        @else
                        <tr> 
                           
                            <td style="text-align: center;" colspan="3">No Data Found</td>
                        </tr>
                    @endif
            </tbody>
        </table>
       
        </div>
     </selectedrowstyle></div>                                             
    </div>
        </div>
        </form>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script type="text/javascript" src="https://demo.dashboardpack.com/architectui-html-free/assets/scripts/main.js">
</script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script>
          
        
            function fetchData(date) {
                var selectedDate = date || document.getElementById('dateFilter').value;
                if (!selectedDate) {
                    alert('Select Date');
                    return;
                }
        
                $.ajax({
                    url: '/get-filtered-data', 
                    type: 'GET',
                    data: { date: selectedDate },
                    success: function(response) {
                        updateTable(response.data);
                    },
                    error: function() {
                        alert('error');
                    }
                });
            }
        
            function updateTable(data) {
                var tableBody = document.querySelector('.manage tbody');
                tableBody.innerHTML = ''; 
        
                if (data.length === 0) {
                    tableBody.innerHTML = '<tr><td colspan="5">Data not found</td></tr>';
                    return;
                }
        
                data.forEach(function(item, index) {
                    var row = `<tr>
                        <td>${item.timesloat}</td>
                        <td>${item.number_60}</td>
                        <td>${item.number_70}</td>
                    
                 
                   
                    </tr>`;
                    tableBody.innerHTML += row;
                });
            }
        
        
        </script>


        {{-- <script src="{{ asset('script.js') }}"></script> --}}
        <script>
            @if(session('error'))
                toastr.error("{{ session('error') }}");
            @endif
        
            // New code for success message
            @if(session('success'))
                toastr.success("{{ session('success') }}");
            @endif
        
            // Initialize Toastr
            $(document).ready(function() {
                toastr.options = {
                    "positionClass": "toast-top-right",
                    "closeButton": true,
                    "progressBar": true
                };
            });
        
        </script>
    </body>
  </html>
     