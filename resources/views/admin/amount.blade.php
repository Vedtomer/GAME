@extends('admin.layout.main')
@section('title', 'Amount')
@section('section')

@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif
      <div class="container">
        <div class="col-lg-7">
          <div class="main-card mb-3 card">
          <div class="card-body">
        <div class="row">
            <div class="col-12">
                  
        <form method="post" action="{{ route('amount', $id) }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-8">
                <input type="hidden" class="form-control" name="user_id" value="" >
              </div>
              <br>

            <div class="mb-8">
              <input type="hidden" class="form-control" name="add" value="add">
            </div>
            <br>
            <div class="mb-8">
            
                <input type="text" class="form-control" name="amount" placeholder="Enter amount" >
              </div>
              <br>
            <div class="d-flex justify-content-center">
              <button type="submit" class="btn btn-primary mr-2">Submit</button>
              <a href="{{ route('admin.user') }}" class="btn btn-info">Back</a>
          </div>
          </form>
            </div>
        </div>
      </div>
      
    </div> 
  </div>



  {{-- <div class="col-lg-7">
    <div class="main-card mb-3 card">
    <div class="card-body">
  <div class="row">
      <div class="col-12">
            
  <form method="post" action="" enctype="multipart/form-data">
      @csrf
      {{-- <h1>form data</h1> --}}
{{-- 
      <div class="mb-8">
          <label >user id</label>
          <input type="hidden" class="form-control" name="user_id"  >
        </div>
        <br><br>

      <div class="mb-8">
        <label >remove</label>
        <input type="text" class="form-control" name="remove" >
      </div>
      <br>
      <div class="mb-8">
          <label >amount</label>
          <input type="text" class="form-control" name="amount" >
        </div>
        <br>
      <div class="d-flex justify-content-center"> --}}
        <!-- Centered button -->
        {{-- <button type="submit" class="btn btn-primary mr-2">Submit</button>
        <a href="{{ route('admin.user') }}" class="btn btn-info">Back</a>
    </div> --}}
      {{-- <a class="btn btn-primary" href=" {{route('user') }} ">show all data</a> --}}
    {{-- </form>
      </div>
  </div>
</div>

</div> 
</div>  --}}
      </div>
   

@endsection