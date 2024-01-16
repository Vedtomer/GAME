@extends('admin.layout.main')
@section('title', 'Admin change Password')
@section('section')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="container">
  <div class="col-lg-7">
    <div class="main-card mb-3 card">
    <div class="card-body">
  <div class="row">
      <div class="col-12">
            
        <form action="{{ route('adminchange.password') }}" method="post">

          @csrf
          <div class="mb-3">
              
            {{-- <div class="d-flex justify-content-center">
                  <!-- Centered button -->
            
              </div> --}}
              <br>
              {{-- <input type="password" name="" > --}}

              <input type="password" class="form-control" name="password" placeholder="Password" required>
          </div>
          <br>
          <div class="mb-3">

              <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" required>
          </div>
          <br>
         
        
          <br>
          <div class="d-flex justify-content-center">
              <!-- Centered button -->
              <button type="submit" class="btn btn-primary mr-2">submit</button>
              <a href="{{ route('admin.user') }}" class="btn btn-info">Back</a>
          </div>

          {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
      </form>
      </div>
  </div>
</div>
</div>
</div>
</div>
        @endsection
