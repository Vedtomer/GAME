@extends('admin.layout.main')
@section('title', 'Ticket')
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
            <td>
               <span id="exampleSpan">
                @if(count($data[0]->ticketPurchases) > 0)
            @endif
               </span>
            </td>
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
                    <div class="btns" style="margin-left: auto;">
                    </div>
                </div>
                <div class="table-responsive">
                 <div class="mb-2">
                    <input type="date" id="dateFilter" onchange="fetchData()">
                 </div>
                    @if (isset($data) && count($data) > 0)
                        <table class="mb-0 table">
                            <thead>
                                <tr>
                                    <th>User Name</th>
                                    {{-- <th>Email</th> --}}
                                    <th>Draw Time</th>
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
                                        {{-- <td><b>{{ $user->user->name }}</b></td> --}}
                                        <td><b>{{ $user->user->email }}</b></td>
                                        <td><b>{{ $user->drawtime }}</b></td>
                                        <td><b>{{ $user->qty }}</b></td>
                                        <td><b>{{ $user->points }}</b></td>
                                        <td><b>{{ $user->winpoints }}</b></td>
                                        <td><b>{{ $user->requestid }}</b></td>
                                        <td><b>{{ $user->barcode }}</b></td>
                                        <td><b>{{ $user->status }}</b></td>
                                        <td><b>{{ $user->created_at->format('d-m-Y H:i') }}</b></td>
                                        <td>
                                            <button class="btn btn-info" onclick="toggleData('{{ json_encode($user) }}')">View</button>
                                        </td>
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
        function toggleData(data) {
            var table = document.querySelector('table');
        var exampleSpan = document.getElementById('exampleSpan');

        var user = JSON.parse(data);

        if (table.style.display === 'none' || table.style.display === '') {
            table.style.display = '';

         let    ticketPurchases=user.ticket_purchases;

var ticketNumberQtyString = ticketPurchases.map(ticketPurchase => `${ticketPurchase.ticket_number}*${ticketPurchase.qty}`).join(', ');


            exampleSpan.innerHTML = `
        
            <p><b>D.D.:</b> ${new Date(user.created_at).toLocaleDateString('en-GB')}</p>
            <p><b>D.T.:</b> ${user.drawtime}</p>
            <p><b>C.T.</b> ${new Date(user.created_at).toLocaleTimeString('en-GB', { hour12: false })}</p>
            <p><b>Retailer Code. </b> ${user.user_id}</p>
           
            <p> ${ticketNumberQtyString} </p>
            <p><b>QTY. </b> ${user.qty} <b>Total Pt. </b> ${user.points}</p>
            <p><b>G.id :-</b> ${user.requestid}</p>
            <p> 
  <img src="{{ asset('logo12_files/barcode19.png') }}" alt="Barcode Image" height="50px" width="200">
</p>
            <p> ${user.barcode}</p>
              
             
            `;
        } else {
            table.style.display = 'none';
        }
        console.log
        }
        function fetchData() {
        var selectedDate = document.getElementById('dateFilter').value;
        window.location.href = "{{ route('ticket') }}" + "?date=" + selectedDate;
    }
    </script>



  

 


@endsection
