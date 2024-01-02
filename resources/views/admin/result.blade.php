@extends('admin.layout.main')
@section('title', 'Result')
@section('section')
{{-- <div class="col-lg-12"> --}}
    <div class="main-card card">
        {{-- <div class="card-body"> --}}


            <div class="add" style="display: flex; align-items: center;margin-bottom:8px;">
                {{-- <h5 class="card-title">Show Result</h5> --}}
                <div class="btns" style="margin-left: auto;">
                    <a href="{{ route('admin.resultadd') }}" id="openModalBtn" class="btn btn-secondary">Add Result</a>
                </div>
            </div>
            {{-- <div class="btns" style="margin-left: auto;">
        
        
            </div> --}}
        
            {{-- <h5 class="card-title">Table responsive</h5> --}}
            <!-- Modal container -->
            <div class="modal-container" id="myModal">
        
                <!-- Modal content -->
                {{-- <div class="modal-content"> --}}
                    <!-- Close button -->
                    {{-- <span class="close-btn " onclick="closeModal()">&times;</span> --}}
                    <!-- Form inside the modal -->
             {{-- <div class="container">
              
                <form action="{{ route('admin.result.save') }}" method="post">

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
                          <option value="18:00">18:00</option>
                          <option value="18:15">18:15</option>
                          <option value="18:30">18:30</option>
                          <option value="18:45">18:45</option>
                          <option value="19:00">19:00</option>
                          <option value="19:15">19:15</option>
                          <option value="19:30">19:30</option>
                          <option value="19:45">19:45</option>
                          <option value="20:00">20:00</option>
                          <option value="20:15">20:15</option>
                          <option value="20:30">20:30</option>
                          <option value="20:45">20:45</option>
                          <option value="21:00">21:00</option>
                          <option value="21:15">21:15</option>
                          <option value="21:30">21:30</option>
                         
                        </select>
                      </div>
                      
                    

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>  --}}
        {{-- </div> --}}


        {{-- @php
        print_r($userdata);
        @endphp
        {{-- --}}
        {{-- @if(count($data) > 0) --}}
    
        <div class="table-responsive">
            {{-- <h2>User List</h2> --}}
           @if(isset($data) && count($data) > 0)
                <table class="mb-0 table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 5% " scope="col">S No</th>
                            <th style="width: 20%" scope="col">Number 70</th>
                            <th style="width: 20%" scope="col">Number 60</th>
                            <th style="width: 20%" scope="col">Time</th>
                         
                            {{-- <th style="width: 10%" scope="col">View</th> --}}
                            <th style="width: 15%" scope="col">Action</th>
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

               {{-- <script>
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
    </script> --}}
        </div>
    </div>
{{-- </div> --}}
    @endsection