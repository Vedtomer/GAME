@extends('admin.layout.main')
@section('title', 'User Add')
@section('section')

{{-- @if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif --}}

<div class="container">
  <div class="col-lg-7">
    <div class="main-card mb-3 card">
    <div class="card-body">
  <div class="row">
      <div class="col-12">
            
        <form action="{{ route('user.save') }}" method="post">

            @csrf
            <br>
            <div class="mb-3">
             

                <input type="text" class="form-control" name="name" placeholder="Enter Name" value="{{ old('name') }}">
            </div>
            <br>
            <div class="mb-3">

                <input type="text" class="form-control" name="email"  value="{{ old('email') }}" placeholder="Enter Username" required>
            </div>
            <br>
            <div class="mb-3">

                <input type="password" class="form-control" name="password"  value="{{ old('password') }}" placeholder="Enter password"
                    required>
            </div>
            <br>
            <div class="mb-3">

                <input type="password" class="form-control" name="confirm_password" value="{{ old('confirm_password') }}"
                    placeholder="Enter Confirm password" required>
            </div>
<br>
            <div class="d-flex justify-content-center">
              <!-- Centered button -->
              <button type="submit" class="btn btn-primary mr-2">Submit</button>
              <a href="{{ route('user') }}" class="btn btn-info">Back</a>
          </div>
        </form>
      </div>
  </div>
</div>
</div>
</div>
</div>
        @endsection
