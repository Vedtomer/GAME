@extends('agent.layout.agentmain')
@section('title', 'Report')
@section('section')

<style>
    td{
        border: 1px solid;
        width: 400px;
        text-align: center;
    }
</style>
<div class="col-lg-12">
    <div class="main-card mb-3 card">
        <div class="card-body">

            <!-- Date Filter Form -->
            <form action="{{ route('filtereddata' ) }}" method="get">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="start_date">Start Date:</label>
                        <input type="date" class="form-control" id="start_date" name="start_date">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="end_date">End Date:</label>
                        <input type="date" class="form-control" id="end_date" name="end_date">
                    </div>
                    <div class="form-group col-md-3">
                        <label>&nbsp;</label>
                        <button type="submit" class="btn btn-primary">Apply Filter</button>
                    </div>
                </div>
            </form>

            <div class="col-lg-3">
                {{-- <div class="main-card mb-3 card"> --}}
                    {{-- <div class="card-body"> --}}
         <table>
            <thead>

            </thead>
            <tbody>
                @if(count($data ?? []) > 0)
                <tr>
                    <td> <label for="barcode{{ $data[0]->id }}" style="font-size: 18px;"><b>Retailer ID:</b> {{ $data[0]->user_id }}</label></td>
                </tr>
                <tr>
                    <td>
                        <label for="barcode{{ $data[0]->id }}" style="font-size: 18px;">
                            <b>{{ \Carbon\Carbon::now()->format('n/j/Y g:i:s A') }}</b>

                        </label>
                    </td>
                </tr>
                

                <tr>
                    <td>
                        <label for="barcode{{ $data[0]->id }}" style="font-size: 18px;">
                            <b>Date:</b> {{ $start_date->format('m/d/Y') }} - {{ $end_date->format('m/d/Y') }}
                        </label>
                    </td>
                    
                </tr>

                <tr>
                    <td>
                        <label for="qty{{ $data[0]->id }}" style="font-size: 18px;"><b> TicketQty:</b> {{ $sumQty }}</label>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="cancelCount" style="font-size: 18px;"><b>CancelQty:</b> {{ $cancelCount }}</label>
                    </td>
                </tr>


                <tr>
                    <td>
                        <label for="cancelCount" style="font-size: 18px;"><b>NetQty:</b> {{ $netAmt }}</label>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="cancelCount" style="font-size: 18px;"><b>NetPts:</b> {{ $netplus }}</label>
                    </td>
                </tr>

                {{-- <tr>
                    <td>
                        <label for="barcode{{ $data[0]->id }}" style="font-size: 18px;"><b>Netamt:</b> {{$sumpoints }}</label>
                    </td>
                </tr> --}}

                <tr>
                    <td>
                        <label for="barcode{{ $data[0]->id }}" style="font-size: 18px;"><b>Commission:</b>0.00</label> 
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="barcode{{ $data[0]->id }}" style="font-size: 18px;"><b>Claimqty:</b> {{ $sumQtyWinpoints }}</label> 
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="barcode{{ $data[0]->id }}" style="font-size: 18px;"><b>Claim pts:</b> {{ $winpoints }}</label> 
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="barcode{{ $data[0]->id }}" style="font-size: 18px;"><b>Netpay:</b> {{ $Netpay }}</label> 
                    </td>
                </tr>

                {{-- <tr>
                    <td>
                        <label for="barcode{{ $data[0]->id }}" style="font-size: 18px;"><b>status:</b> {{ $data[0]->status }}</label>
                    </td>
                </tr> --}}

                @else
                <p>No data available.</p>
            @endif

            </tbody>
         </table>
                    </div>
                {{-- </div></div> --}}

        </div>
    </div>
</div>

@endsection
