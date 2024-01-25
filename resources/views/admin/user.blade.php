@extends('admin.layout.main')
@section('title', 'Users List')
@section('section')


<style>
     @media screen and (max-width: 767px) {
        .btn {
            font-size: 15px; /* Font size for screens less than or equal to 767px */
        }
    .btn {
        font-size: 10px;
        /*  Default font size */
    }

   
    }
</style>

    <div class="errors">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">
                    {{ $error }}
                </div>
            @endforeach
        @endif
    </div>
    <div class="col-lg-12 p-1">
        <div class="main-card mb-3 card">
            <div class="card-body">




        <div class="add" style="display: flex; align-items: center; margin-bottom:8px;">

            <div class="btns" style="margin-left: auto;">
                <a href="{{ route('admin.useradd') }}" id="openModalBtn" class="btn btn-secondary">Add User</a>
            </div>
        </div>
        {{-- <div class="btns" style="margin-left: auto;">


    </div> --}}

        {{-- <h5 class="card-title">Table responsive</h5> --}}
        <!-- Modal container -->
        {{-- <div class="modal-container" id="myModal"> --}}

            <!-- Modal content -->
            {{-- <div class="modal-content">
                <!-- Close button -->
                <span class="close-btn " onclick="closeModal()">&times;</span> --}}


                <!-- Form inside the modal -->

                {{-- <div class="container">

                    <form action="{{ route('user.save') }}" method="post">

                        @csrf
                        <div class="mb-3">
                            <h3>ADD USER</h3>

                            <input type="text" class="form-control" name="name" placeholder="Enter Name">
                        </div>
                        <div class="mb-3">

                            <input type="text" class="form-control" name="email" placeholder="Enter Username" required>
                        </div>
                        <div class="mb-3">

                            <input type="password" class="form-control" name="password" placeholder="Enter password"
                                required>
                        </div>
                        <div class="mb-3">

                            <input type="password" class="form-control" name="Confirm Password"
                                placeholder="Enter Confirm password" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>


            <h2>user data</h2> --}}

        {{-- </div> --}}

        {{-- @php
    print_r($userdata);
    @endphp
    {{-- --}}
        {{-- @if (count($data) > 0) --}}

        <div class="table-responsive">

            @if (isset($data) && count($data) > 0)
                <table class="mb-0 table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 5%" scope="col">Sr.No.</th>
                            {{-- <th style="width: 20%" scope="col">Name</th> --}}
                            <th style="width: 20%" scope="col">Username</th>
                            <th style="width: 20%" scope="col">Balance</th>

                            {{-- <th style="width: 10%" scope="col">View</th> --}}
                            <th style="width: 15% " scope="col">Amount</th>
                            <th style="width: 15% " scope="col">Action</th>

                            {{-- <th style="width: 15%" scope="col">Change Password</th> --}}
                            {{-- <th style="width: 15%" scope="col">Delete</th> --}}
                            <!-- Adjust the widths as needed -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $user)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                {{-- <td>{{ $user->name }}</td> --}}
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->balance }}</td>
                                <td class="d-flex "><a class="btn btn-primary mr-2" href="{{ route('amount', $user->id) }}">Add</a>
                                    {{-- <td><a class="btn btn-danger" href="{{route('userdelete',$user->id)}}">Delete</a></td> --}}
                                    <a class="btn btn-info mr-2" href="{{ route('withdrawal', $user->id) }}">withdrawal</a>
                                    <a class="btn btn-success mr-2" href="{{ route('transaction', $user->id) }}">Transaction</a>
                                </td>

                                <td>
                                    {{-- <a class="btn " href="{{ route('useredit', $user->id) }}"><i class="fa fa-edit"
                                            style="font-size:24px"></i></a> --}}
                                    {{-- <td><a class="btn btn-danger" href="{{route('userdelete',$user->id)}}">Delete</a></td> --}}
                                    <a class="btn " href="{{ route('change-password', $user->id) }}"><i
                                            class='fas fa-lock' style='font-size:24px'></i></a>
                                </td>
                                <!-- Add more columns as needed -->
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




        {{-- 
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
        </script> --}}

    @endsection
