@extends('admin.layout.main')
@section('title', 'change Password')
@section('section')


<div class="container">
  <div class="col-lg-7">
    <div class="main-card mb-3 card">
    <div class="card-body">
  <div class="row">
      <div class="col-12">
            
        <form action="{{ route('change.password' , $data->id) }}" method="post">

          @csrf
          <div class="mb-3">
              
            {{-- <div class="d-flex justify-content-center">
                  <!-- Centered button -->
            
              </div> --}}
              <br>
              <input type="hidden" name="user_id" value="{{ $data->id }}">

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
              <a href="{{ route('user') }}" class="btn btn-info">Back</a>
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
