@extends('agent.layout.agentmain')
@section('title', 'Report')
@section('section')

    <style>
        td {
            border: 1px solid;
            width: 400px;
            text-align: center;
        }
        th{
            border: 1px solid;
        }
    </style>
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <div class="btns mb-2" style="margin-right: auto;">
                    <a href="{{ route('dashboard') }}" class="btn btn-info">Back</a>
                </div>
                <table class="table">
                    <thead>
                      <tr>
                        <th style="text-align: center;">Created Date</th>
                        <th style="text-align: center;">Time</th>
                        <th style="text-align: center;">Contact</th>
                        <th style="text-align: center;">Balance</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                      <tr>
                        @if(Auth::guard('agent')->check())
                        <td scope="row">{{ Auth::guard('agent')->user()->created_at->format('Y-m-d') }}</td>
                        <td>{{ Auth::guard('agent')->user()->created_at->format('H:i A') }}</td>
                        <td>{{ Auth::guard('agent')->user()->email }}</td>
                        <td>{{ Auth::guard('agent')->user()->balance }}</td>
                        @else
                        <p>Agent not authenticated.</p>
                    @endif
                      </tr>
                   
                    </tbody>
                  </table>

                {{-- @if(Auth::guard('agent')->check())
                <div class="container">
                    <div class="info-box">
                        <div class="label">Created Date</div>
                        <span id="NowDate" class="value">{{ Auth::guard('agent')->user()->created_at->format('Y-m-d') }}</span>
                    </div>
            
                    <div class="info-box">
                        <div class="label">Time</div>
                        <span id="NowTime" class="value">{{ Auth::guard('agent')->user()->created_at->format('H:i A') }}</span>
                    </div>
            
                    <div class="info-box">
                        <div class="label">Contact</div>
                        <span id="RemainingTime" class="value">{{ Auth::guard('agent')->user()->email }}</span>
                    </div>
            
                    <div class="info-box">
                        <div class="label">Balance</div>
                        <span id="NextDrowTime" class="value">{{ Auth::guard('agent')->user()->balance }}</span>
                    </div>
                </div>
            @else
                <p>Agent not authenticated.</p>
            @endif --}}


                <form action="{{ route('filtereddata') }}" method="get">
                    @csrf
                    <div class="form-row align-items-end">
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
                

                <div class="col-lg-6">
                    <table>
                        <thead>
                        </thead>
                        <tbody>
                            @if (count($data ?? []) > 0)
                                <tr>
                                    <td> <label for="barcode{{ $data[0]->id }}" style="font-size: 18px;"><b>Retailer
                                                ID:</b> {{ $data[0]->user_id }}</label></td>
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
                                            <b>Date:</b> {{ $start_date->format('m/d/Y') }} -
                                            {{ $end_date->format('m/d/Y') }}
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="qty{{ $data[0]->id }}" style="font-size: 18px;"><b> Ticket Qty:</b>
                                            {{ $sumQty }}</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="cancelCount" style="font-size: 18px;"><b>Cancel Qty:</b>
                                            {{ $cancelCount }}</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="cancelCount" style="font-size: 18px;"><b>Net Qty:</b>
                                            {{ $netAmt }}</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="cancelCount" style="font-size: 18px;"><b>Net Pts:</b>
                                            {{ $netplus }}</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="barcode{{ $data[0]->id }}"
                                            style="font-size: 18px;"><b>Commission:</b>0.00</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="barcode{{ $data[0]->id }}" style="font-size: 18px;"><b>Claim Qty:</b>
                                            {{ $sumQtyWinpoints }}</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="barcode{{ $data[0]->id }}" style="font-size: 18px;"><b>Claim Pts:</b>
                                            {{ $winpoints }}</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="barcode{{ $data[0]->id }}" style="font-size: 18px;"><b>Net Pay:</b>
                                            {{ $Netpay }}</label>
                                    </td>
                                </tr>
                            @else
                                <p>No data available.</p>
                            @endif

                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    </div>

@endsection
