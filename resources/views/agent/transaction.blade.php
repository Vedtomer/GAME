@extends('agent.layout.agentmain')
@section('title', 'Transaction')
@section('section')
<style>
    .btns {
        float: right;
        margin-bottom: 8px;
    }
    .btn {
        border-radius: 0px;
    }
</style>
<div class="col-lg-12">
    <div class="main-card mb-3 card">
        <div class="card-body">

{{-- <div>
    <input type="date" id="dateFilter" onchange="fetchData()">
</div> --}}
            <div class="add" style="display: flex; align-items: center;">
                {{-- <h5 class="card-title">TRANSACTION</h5> --}}
                <div class="btns" style="margin-left: auto;">
                </div>
            </div>
            <div class="table-responsive">
                <table class="mb-0 table">
                    <thead>
                        <tr>
                            <th>S No</th>
                            {{-- <th>Username</th> --}}
                            <th>Action</th>
                            <th>Amount</th>
                            <th>Balance</th>
                            <th>Date</th>
                            <th>Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $user)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                {{-- <td>{{ $user->user->name }}</td> --}}
                                <td>
                                    <span class="{{ in_array($user->action, ['win', 'add' ,'cancel']) ? 'badge badge-success ml-2' : 'badge badge-danger ml-2' }}">
                                        {{ $user->action }}
                                    </span>
                                </td>
                                <td>{{ $user->amount }}</td>
                                <td>{{ $user->balance }}</td>
                                <td>{{ $user->created_at->format('d-m-Y') }}</td>
                                <td>{{ $user->created_at->format('H:i A') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
{{-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        fetchData(new Date().toISOString().split('T')[0]);
    });

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
                updateTable(response.dataTransaction);
            },
            error: function() {
                alert('Error fetching data');
            }
        });
    }

    function updateTable(data, dataTransaction) {
        var tableBody = document.querySelector('.table-responsive tbody');
        tableBody.innerHTML = '';

        if (data.length === 0 && dataTransaction.length === 0) {
            tableBody.innerHTML = '<tr><td colspan="6">Data not found</td></tr>';
            return;
        }

        data.forEach(function(item, index) {
            var row = `<tr>
                <td>${index + 1}</td>
                <td>${item.user.email}</td>
                <td>
                    <span class="${inArray(item.action, ['win', 'add']) ? 'badge ml-2' : 'badge badge-danger ml-2'}">
                        ${item.action}
                    </span>
                </td>
                <td>${item.amount}</td>
                <td>${item.balance}</td>
                <td>${new Date(item.created_at).toLocaleDateString('en-IN')}</td>
            </tr>`;
            tableBody.innerHTML += row;
        });
    }
</script> --}}
    @endsection