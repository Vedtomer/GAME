@extends('agent.layout.agentmain')
@section('title', 'View Purchase')
@section('section')

<style>
.main{
    border: 1px solid;
    width: 300px;
    text-align: center;
    margin-bottom: 18px;
    border-radius: 30px;
    height: 250px;;
}
td{
    font-weight: bolder;
    color: black;
}
</style>
<div class="table-container" style="overflow: auto; width: 296px; max-height: 240px;">
<table style="display: none;" class="main">
    <thead>
     
    </thead>
    <tbody >
        @if(count($data ?? []) > 0)
        <tr>
            <td colspan="2" style="text-align: center;"><h5><b>For Amusement Only</b></h5></td>
        </tr>
        
       
        <tr>
            <td><b>D.D.</b> {{ $data[0]->created_at->format('d-m-Y') }}</td>
        </tr>

        <tr>
            <td ><b>D.T.:</b> {{ $data[0]->drawtime }}</td>
        </tr>

        <tr>
            <td><b>C.T.</b> {{ $data[0]->created_at->format('H:i:s') }}</td>
        </tr>
        <tr>
            <td><b>Retailer Code.</b> {{ $data[0]->user_id}} </td>
        </tr>
        {{-- {{ $ticketPurchase->ticket_number }} --}}
        <tr>
            <td>
                @if(count($data[0]->ticketPurchases) > 0)
                    @foreach($data[0]->ticketPurchases as $ticketPurchase)
                        {{ $ticketPurchase->ticket_number }} * {{ $ticketPurchase->qty }}
                        @if (!$loop->last)
                            , <!-- Add a comma between ticket numbers, excluding the last one -->
                        @endif
                    @endforeach
                @endif
            </td>
        </tr>
{{--         
        <tr>
            <td><b>Retailer Code.</b> {{ $data[0]->created_at->format('H:i:s') }}</td>
        </tr> --}}
        <tr>
            <td><b>QTY.</b> {{ $data[0]->qty }} Total Pt. {{ $data[0]->points }}</td>
        </tr>
        {{-- <tr>
            <td><b>Total Pt.</b> {{ $data[0]->points }}</td>
        </tr> --}}
        <tr>
            <td><b>G.id :-</b> {{ $data[0]->requestid }}</td>
        </tr>
        @else
        <tr>
            <td colspan="2" style="text-align: center;"><p>No data available.</p></td>
        </tr>
        @endif
    </tbody>
</table>

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
                    @if (isset($data) && count($data) > 0)

                        <table class="mb-0 table">
                            <thead>
                                <tr>
                                    <th>Draw Time</th>
                                    {{-- <th>Username</th> --}}
                                    <th>Qty</th>
                                    <th>Points</th>
                                    <th>WinPoints</th>
                                    <th>Requestid</th>
                                    <th>Barcode</th>

                                    <th>Status</th>
                                    <th>Datetime</th>
                                    <th>View</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $user)
                                    <tr>
                                        <td><b>{{ $user->drawtime }}</b></td>


                                        <td><b>{{ $user->qty }}</b></td>
                                        <td><b>{{ $user->points }}</b></td>
                                        <td><b>{{ $user->winpoints }}</b></td>
                                        <td><b>{{ $user->requestid }}</b></td>
                                        <td><b>{{ $user->barcode }}</b></td>
                                        <td><b>{{ $user->status }}</b></td>
                                        <td><b>{{ $user->created_at->format('d-m-Y H:i') }}</b></td>
                                        {{-- <td><button onclick="generateBarcode({{ json_encode($user) }})">view</button></td> --}}

                                        <td><button class="btn btn-info" onclick="toggleData()">View</button></td>
                                        

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    @else
                        <p>No Ticket Purchase</p>
                    @endif
                </div>
            </div>
        </div>
    </div>


    <div id="barcodeContainer"></div>

   <script>
    function toggleData() {
        var table = document.querySelector('table'); // Assuming there is only one table on the page

        if (table.style.display === 'none' || table.style.display === '') {
            table.style.display = '';
        } else {
            table.style.display = 'none';
        }
    }
</script>
<script>
    function generateBarcode(barcodeValue) {
            var containerElement = document.getElementById('barcodeContainer');

            if (containerElement) {
                // Clear previous barcode
                containerElement.innerHTML = '';

                // Generate new barcode
                JsBarcode("#barcodeContainer", "1235", {
                    format: "auto",
                    displayValue: false
                });
            } else {
                console.error('Target element not found.');
            }
        }
</script>

<script>
    function generateBarcode() {
        // Generate a random barcode value (you can replace this with your logic)
        var barcodeValue = Math.floor(Math.random() * 1000000000).toString();

        // Clear the existing barcode
        document.getElementById('barcode').innerHTML = '';

        // Generate the new barcode
        JsBarcode("#barcode", barcodeValue, {
            format: "CODE128",  // You can use other formats as needed
            displayValue: true
        });
    }
</script>








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

            var nextDrawTimeString = hours + ':' + minutes + ' ' + ampm;

            document.getElementById('NextDrowTime').innerText = nextDrawTimeString;

            // var submitButton = document.getElementById('submitButton');
            // var drawStart = nextDrawTime.getTime() - 4 * 60 * 1000;
            // var drawEnd = nextDrawTime.getTime() + 4 * 60 * 1000;

            // if (now.getTime() >= drawStart && now.getTime() <= drawEnd) {
            //     submitButton.disabled = true;
            // } else {
            //     submitButton.disabled = false;
            // }

            // Reload the page when the next draw is due
            if (now.getTime() >= nextDrawTime.getTime()) {
                location.reload(true);
            }
        }

        updateNextDrawTime();

        setInterval(updateNextDrawTime, 900000); // 15 minutes interval
    </script>


@endsection
