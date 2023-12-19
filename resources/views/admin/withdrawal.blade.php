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
                  
        <form method="POST" action="{{ route('withdrawal', $id) }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-8">
                <input type="hidden" class="form-control" name="user_id" value="" >
              </div>
              <br>

            <div class="mb-8">
              <input type="hidden" class="form-control" name="withdrawal" value="withdrawal">
            </div>
            <br>
            <div class="mb-8">
            
                <input type="text" class="form-control" name="amount" placeholder="withdrawal" >
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



      </div>
   

@endsection