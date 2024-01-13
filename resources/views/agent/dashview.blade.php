@extends('agent.layout.agentmain')
@section('title', 'Purchase Ticket')
@section('section')


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