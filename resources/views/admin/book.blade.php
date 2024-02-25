@extends('admin.layout.main')
@section('title', 'Book')
@section('section')


<div class="col-lg-12">
    <div class="main-card mb-3 card">
        <div class="card-body">
    <div class="table-responsive">
       
       @if(isset($data) && count($data) > 0)
       <div style="display: flex; justify-content: space-around;">

        {{-- Table for 6000-6099 --}}
        <table class="mb-0 table table-striped table-bordered">
            <thead>
                <tr>
                    <th style="width: 5%" scope="col">S No</th>
                    <th style="width: 20%" scope="col">Number </th>
                    <th style="width: 20%" scope="col">QTY </th>
                    {{-- Add other columns if needed --}}
                </tr>
            </thead>
            <tbody>
                {{-- Display grouped data for 6000-6099 --}}
                @php
                    $prevTicketRange = '';
                @endphp
        
                @foreach($data as $group)
                    @php
                        $ticketNumber = $group['ticket_number'];
                        $ticketRange = '';
        
                        if ($ticketNumber >= 6000 && $ticketNumber <= 6099) {
                            $ticketRange = '6000-6099';
                        }
                    @endphp
        
                    @if ($ticketRange == '6000-6099')
                        @if ($loop->first || $ticketRange != $prevTicketRange)
                            <tr>
                                {{-- <th colspan="5" class="text-center">{{ $ticketRange }}</th> --}}
                            </tr>
                        @endif
        <?php  
        //    $currenttime = now()->format('H:i');
        //   if('drawtime' <= $currenttime){

         
        ?>
                        <tr>
                            <td>{{$loop->index + 1 }}</td>
                            <td>{{ $group['ticket_number'] }}</td>
                            <td>{{ $group['qty'] }}</td>
                            {{-- Add other columns if needed --}}
                        </tr>
                        <?php
                        //  } 
                        ?>
                    @endif
        
                    @php
                        $prevTicketRange = $ticketRange;
                    @endphp
                @endforeach
            </tbody>
        </table>
        
    
        {{-- Table for 7000-7099 --}}
        <table class="mb-0 table table-striped table-bordered">
            <thead>
                <tr>
                    <th style="width: 5%" scope="col">S No</th>
                    <th style="width: 20%" scope="col">Number </th>
                    <th style="width: 20%" scope="col">QTY </th>
                </tr>
            </thead>
            <tbody>
                @php
                    $prevTicketRange = '';
                @endphp
        
                @foreach($data as $group)
                    @php
                        $ticketNumber = $group['ticket_number'];
                        $ticketRange = '';
        
                        if ($ticketNumber >= 7000 && $ticketNumber <= 7099) {
                            $ticketRange = '7000-7099';
                        }
                    @endphp
        
                    @if ($ticketRange == '7000-7099')
                        @if ($loop->first || $ticketRange != $prevTicketRange)
                            <tr>
                                {{-- <th colspan="5" class="text-center">{{ $ticketRange }}</th> --}}
                            </tr>
                        @endif
        
                        <tr>
                            <td>{{$loop->index + 1 }}</td>
                            <td>{{ $group['ticket_number'] }}</td>
                            <td>{{ $group['qty'] }}</td>
                        </tr>
                    @endif
        
                    @php
                        $prevTicketRange = $ticketRange;
                    @endphp
                @endforeach
            </tbody>
        </table>
    </div>
    
    </table>
    
        @else
            <p>No Booking found.</p>
        @endif
    </div>
        </div>
    </div>
</div>

@endsection