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
          {{-- <div class="mb-3">
              <label for="name">Name </label>
              <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name (Optional)" value="{{ old('name') }}">
          </div> --}}
          @error('user_name')
              <div class="text-danger"></div>
          @enderror
  
          
          <div class="mb-3">
              <label for="email">Username</label>
              <input type="text" class="form-control" name="email" id="email" value="{{ old('email') }}" placeholder="Enter Username" required>
          </div>
          @error('email')
              <div class="text-danger">{{ $message }}</div>
          @enderror
  
          <br>
          <div class="mb-3">
              <label for="password">Password</label>
              <input type="password" class="form-control" name="password" id="password" placeholder="Enter password" required>
          </div>
          @error('password')
              <div class="text-danger">{{ $message }}</div>
          @enderror
  
          <br>
          <div class="mb-3">
              <label for="confirm_password">Confirm Password</label>
              <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Enter Confirm password" required>
          </div>
          @error('password')
              <div class="text-danger">{{ $message }}</div>
          @enderror
  
          <br>
          <div class="d-flex justify-content-center">

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
