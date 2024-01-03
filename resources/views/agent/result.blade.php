@extends('agent.layout.agentmain')
@section('title', 'Result')
@section('section')

<style>
    /* body {
        font-family: Arial, sans-serif;
    }

    .login-container {
        min-width: 500px;
        padding: 40px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    /* Styles for the modal container */
    /* .modal-container {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        justify-content: center;
        align-items: center;
    } */

    /* Styles for the modal content */
    /* .modal-content {
        background: #fff;
        padding: 20px;
        border-radius: 5px;
        width: 300px;
        text-align: center;
    } */

    /* Styles for the form inside the modal */
    /* form {
        display: flex;
        flex-direction: column;
    } */

    /* Style for the close button */
    /* .close-btn {
        cursor: pointer;
        position: absolute;
        top: 10px;
        right: 10px;
        font-size: 18px;
    } */



    /* .w3-container.w3-teal h1 {
        display: block;
    }

    .card-body {
        height: 200px;
        width: 400px;
    }

    .btns {
        float: right;
        margin-bottom: 8px;
    }

    .btn {
        border-radius: 0px;
    } */
</style> 



<div class="errors">
    @if ($errors->any())
    @foreach ($errors->all() as $error )
    <div class="alert alert-danger">
        {{$error}}
    </div>
    @endforeach
    @endif
</div>
<div class="col-lg-12">
    <div class="main-card mb-3 card">
        <div class="card-body">




    <div class="add" style="display: flex; align-items: center;">
        <h5 class="card-title">Show Result</h5>
        <div class="btns" style="margin-left: auto;">
            {{-- <button id="openModalBtn" class="btn btn-secondary">Add Result</button> --}}
        </div>
    </div>
    {{-- <div class="btns" style="margin-left: auto;">


    </div> --}}

    {{-- <h5 class="card-title">Table responsive</h5> --}}
    {{-- <!-- Modal container -->
    <div class="modal-container" id="myModal">

        <!-- Modal content -->
        <div class="modal-content">
            <!-- Close button -->
            <span class="close-btn " onclick="closeModal()">&times;</span>
         --}}

            <!-- Form inside the modal -->

            {{-- <div class="container"> --}}
              
                {{-- <form action="{{ route('result.save') }}" method="post">

                    @csrf
                    <div class="mb-3">
                        <h3>ADD Result</h3>

                        <input type="text" class="form-control" name="number_70" placeholder="Number 70" required>
                    </div>
                    <div class="mb-3">

                        <input type="text" class="form-control" name="number_60" placeholder="Number 60" required>
                    </div>
                   
                    <div class="form-group">
                        {{-- <label for="exampleDropdown">Select an option:</label> --}}
                        {{-- <select class="form-control" id="exampleDropdown" name="timesloat">
                            <option value="" selected>Select timesloat</option>
                          <option value="9:00" >9:00</option>
                          <option value="9:15">9:15</option>
                          <option value="9:30">9:30</option>
                          <option value="9:45">9:45</option>
                          <option value="10:00">10:00</option>
                          <option value="10:15">10:15</option>
                          <option value="10:30">10:30</option>
                          <option value="10:45">10:45</option>
                          <option value="11:00">11:00</option>
                          <option value="11:15">11:15</option>
                          <option value="11:30">11:30</option>
                          <option value="11:45">11:45</option>
                          <option value="12:00">12:00</option>
                          <option value="12:15">12:15</option>
                          <option value="12:30">12:30</option>
                          <option value="12:45">12:45</option>
                          <option value="13:00">13:00</option>
                          <option value="13:15">13:15</option>
                          <option value="13:30">13:30</option>
                          <option value="13:45">13:45</option>
                          <option value="14:00">14:00</option>
                          <option value="14:15">14:15</option>
                          <option value="14:30">14:30</option>
                          <option value="14:45">14:45</option>
                          <option value="15:00">15:00</option>
                          <option value="15:15">15:15</option>
                          <option value="15:30">15:30</option>
                          <option value="15:45">15:45</option>
                          <option value="16:00">16:00</option>
                          <option value="16:15">16:15</option>
                          <option value="16:30">16:30</option>
                          <option value="16:45">16:45</option>
                          <option value="17:00">17:00</option>
                          <option value="17:15">17:15</option>
                          <option value="17:30">17:30</option>
                          <option value="17:45">17:45</option>
                        </select>
                      </div>
                      
                    

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div> --}}
        {{-- </div>



    </div> --}}

    {{-- @php
    print_r($userdata);
    @endphp
    {{-- --}}
    {{-- @if(count($data) > 0) --}}
    <div>
        <input type="date" id="dateFilter" onchange="fetchData()">
    </div>
    <div class="table-responsive">
       
        
        {{-- <h2>User List</h2> --}}
       @if(isset($data) && count($data) > 0)
            <table class="mb-0 table table-striped table-bordered">
                <thead>
                    <tr>
                        <th style="width: 5%" scope="col">S No</th>
                        <th style="width: 20%" scope="col">Number 70</th>
                        <th style="width: 20%" scope="col">Number 60</th>
                        <th style="width: 20%" scope="col">Time</th>
                        <th style="width: 20%" scope="col">Date</th>
                     
                        {{-- <th style="width: 10%" scope="col">View</th> --}}
                        {{-- <th style="width: 15%" scope="col">Action</th> --}}
                        {{-- <th style="width: 15%" scope="col">Delete</th> --}}
                        <!-- Adjust the widths as needed -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $user)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $user->number_70 }}</td>
                            <td>{{ $user->number_60 }}</td>
                            <td>{{ $user->timesloat }}</td>
                            <td>{{ $user->created_at->format('d-m-Y') }}</td>

                            {{-- <td><a class="btn btn-success" href="{{route('resultedit',$user->id)}}">Update</a></td> --}}
                            {{-- <td><a class="btn btn-danger" href="{{route('resultdelete',$user->id)}}">Delete</a></td> --}}
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
</div>
    
    
                    {{-- <th>{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>

                    <td><a class="btn btn-primary" href="{{route('newview',$user->id)}}">View</a></td>
                    <td><a class="btn btn-success" href="{{route('newedit',$user->id)}}">Update</a></td>
                    <td><a class="btn btn-danger" href="{{route('delete',$user->id)}}">Delete</a></td> --}}
               
                {{-- @endforeach --}}
            {{-- </tbody>
        </table> --}}
        {{-- @else --}}
        {{-- <p>No user data available.</p> --}}
        {{-- @endif --}}
  

 

    <script>
        // Function to open the modal
    function openModal() {
        document.getElementById("myModal").style.display = "flex";
    }

    // Function to close the modal
    function closeModal() {
        document.getElementById("myModal").style.display = "none";
    }

    // Event listener for the open modal button
    document.getElementById("openModalBtn").addEventListener("click", openModal);
    </script>
<script>
    function fetchData() {
        var selectedDate = document.getElementById('dateFilter').value;
        if (!selectedDate) {
            alert('select date');
            return;
        }
    
        $.ajax({
            url: '/get-filtered-data',

            type: 'POST',
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
            tableBody.innerHTML = '<tr><td colspan="5">not data found</td></tr>';
            return;
        }
    
        data.forEach(function(item, index) {
            var row = `<tr>
                <td>${index + 1}</td>
                <td>${item.number_70}</td>
                <td>${item.number_60}</td>
                <td>${item.timesloat}</td>
                <td>${new Date(item.created_at).toLocaleDateString('en-IN')}</td>
            </tr>`;
            tableBody.innerHTML += row;
        });
    }
    </script>
    
    @endsection