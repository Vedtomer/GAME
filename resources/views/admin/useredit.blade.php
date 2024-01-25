@extends('admin.layout.main')
@section('title', 'User Edit')
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
                  
        <form method="post" action="{{route('userupdate' , $data->id)}}" enctype="multipart/form-data">
            @csrf
            {{-- <h1>form data</h1> --}}

            <div class="mb-8">
                <label >name</label>
                <input type="text" class="form-control" name="name" value="{{$data->name}}" >
              </div>
              <br>

            {{-- <div class="mb-8">
              <label >username</label>
              <input type="text" class="form-control" name="email" value="{{$data->email}}" >
            </div>
            <br> --}}

       

            
            <div class="d-flex justify-content-center">
              <!-- Centered button -->
              <button type="submit" class="btn btn-primary mr-2">Update</button>
              <a href="{{ route('user') }}" class="btn btn-info">Back</a>
          </div>
            {{-- <a class="btn btn-primary" href=" {{route('user') }} ">show all data</a> --}}
          </form>
            </div>
        </div>
      </div>
    </div> 
  </div>
      </div>
   

@endsection