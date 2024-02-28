@extends('admin.layout.main')
@section('title', 'Result')
@section('section')
{{-- <div class="col-lg-12"> --}}
    <div class="main-card card">
            <div class="add" style="display: flex; align-items: center;margin-bottom:8px;">
                <div>
                    <input type="date" id="dateFilter" onchange="fetchData()">
                </div>
                <div class="btns" style="margin-left: auto;">
                    {{-- <a href="{{ route('admin.resultadd') }}" id="openModalBtn" class="btn btn-secondary">Add Result</a> --}}
                </div>
            </div>
            <div class="modal-container" id="myModal">
        <div class="table-responsive">
           @if(isset($data) && count($data) > 0)
                <table class="mb-0 table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 5% " scope="col">S No</th>
                            <th style="width: 20%" scope="col">Number 70</th>
                            <th style="width: 20%" scope="col">Number 60</th>
                            <th style="width: 20%" scope="col">Time</th>
                            {{-- <th style="width: 10%" scope="col">View</th> --}}
                            <th style="width: 15%" scope="col">Date</th>
                               <th style="width: 15%" scope="col">Action</th>
                            {{-- <th style="width: 15%" scope="col">Delete</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $user)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $user->number_70 }}</td>
                                <td>{{ $user->number_60 }}</td>
                                <td>{{ $user->timesloat }}</td>
                                <td>{{ Carbon\Carbon::parse($user->created_at)->format('Y-m-d') }}</td>
                                <td><a class="btn " href="{{route('admin.resultedit',$user->id)}}"><i class="fa fa-edit" style="font-size:24px"></i></a></td>
                                {{-- <td><a class="btn btn-danger" href="{{route('admin.resultdelete',$user->id)}}">Delete</a></td> --}}
                                <!-- Add more columns as needed -->
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>No users found.</p>
            @endif
        </div>
        </div>
    </div>
{{-- </div> --}}
<script>
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
            url: '/admin/get-filtered-data', 
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
        var tableBody = document.querySelector('.table-responsive tbody');
        tableBody.innerHTML = ''; 

        if (data.length === 0) {
            tableBody.innerHTML = '<tr><td colspan="5">Data not found</td></tr>';
            return;
        }

        data.forEach(function (item, index) {
    var row = `<tr>
        <td>${index + 1}</td>
        <td>${item.number_70}</td>
        <td>${item.number_60}</td>
        <td>${item.timesloat}</td>
        <td>${new Date(item.created_at).toLocaleDateString('en-IN')}</td>
        <td><a class="btn" href="/admin/resultedit/${item.id}"><i class="fa fa-edit" style="font-size:24px"></i></a></td>
    </tr>`;
    tableBody.innerHTML += row;
});

    }
</script>

    @endsection