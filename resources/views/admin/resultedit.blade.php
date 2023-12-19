@extends('admin.layout.main')
@section('section')



@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif
      <div class="container">
        <div class="row">
            <div class="col-6">
                  
        <form method="post" action="{{route('admin.resultupdate' , $data->id)}}" enctype="multipart/form-data">
            @csrf
            <h1>form data</h1>

            <div class="mb-3">
                <label >Number 70</label>
                <input type="text" class="form-control" name="number_70" value="{{$data->number_70}}" >
              </div>
              <br><br>

            <div class="mb-3">
              <label >Number 60</label>
              <input type="text" class="form-control" name="number_60" value="{{$data->number_60}}" >
            </div>
            <br><br>
            <div class="form-group mb-3">
                <label for="exampleDropdown">Select a time slot:</label>
                <select class="form-control" id="exampleDropdown" name="timesloat">
                    <option value="" {{ $data->timesloat == '' ? 'selected' : '' }}></option>
                    <option value="9:00" {{ $data->timesloat == '9:00' ? 'selected' : '' }}>9:00</option>
                  <option value="9:15"{{ $data->timesloat == '9:15' ? 'selected' : '' }}>9:15</option>
                  <option value="9:30"{{ $data->timesloat == '9:30' ? 'selected' : '' }}>9:30</option>
                  <option value="9:45"{{ $data->timesloat == '9:45' ? 'selected' : '' }}>9:45</option>
                  <option value="10:00"{{ $data->timesloat == '10:00' ? 'selected' : '' }}>10:00</option>
                  <option value="10:15"{{ $data->timesloat == '10:15' ? 'selected' : '' }}>10:15</option>
                  <option value="10:30"{{ $data->timesloat == '10:30' ? 'selected' : '' }}>10:30</option>
                  <option value="10:45"{{ $data->timesloat == '10:45' ? 'selected' : '' }}>10:45</option>
                  <option value="11:00"{{ $data->timesloat == '11:00' ? 'selected' : '' }}>11:00</option>
                  <option value="11:15"{{ $data->timesloat == '11:15' ? 'selected' : '' }}>11:15</option>
                  <option value="11:30"{{ $data->timesloat == '11:30' ? 'selected' : '' }}>11:30</option>
                  <option value="11:45"{{ $data->timesloat == '11:45' ? 'selected' : '' }}>11:45</option>
                  <option value="12:00"{{ $data->timesloat == '12:00' ? 'selected' : '' }}>12:00</option>
                  <option value="12:15"{{ $data->timesloat == '12:15' ? 'selected' : '' }}>12:15</option>
                  <option value="12:30"{{ $data->timesloat == '12:30' ? 'selected' : '' }}>12:30</option>
                  <option value="12:45"{{ $data->timesloat == '12:45' ? 'selected' : '' }}>12:45</option>
                  <option value="13:00"{{ $data->timesloat == '13:00' ? 'selected' : '' }}>13:00</option>
                  <option value="13:15"{{ $data->timesloat == '13:15' ? 'selected' : '' }}>13:15</option>
                  <option value="13:30"{{ $data->timesloat == '13:30' ? 'selected' : '' }}>13:30</option>
                  <option value="13:45"{{ $data->timesloat == '13:45' ? 'selected' : '' }}>13:45</option>
                  <option value="14:00"{{ $data->timesloat == '14:00' ? 'selected' : '' }}>14:00</option>
                  <option value="14:15"{{ $data->timesloat == '14:15' ? 'selected' : '' }}>14:15</option>
                  <option value="14:30"{{ $data->timesloat == '14:30' ? 'selected' : '' }}>14:30</option>
                  <option value="14:45"{{ $data->timesloat == '14:45' ? 'selected' : '' }}>14:45</option>
                  <option value="15:00"{{ $data->timesloat == '15:00' ? 'selected' : '' }}>15:00</option>
                  <option value="15:15"{{ $data->timesloat == '15:15' ? 'selected' : '' }}>15:15</option>
                  <option value="15:30"{{ $data->timesloat == '15:30' ? 'selected' : '' }}>15:30</option>
                  <option value="15:45"{{ $data->timesloat == '15:45' ? 'selected' : '' }}>15:45</option>
                  <option value="16:00"{{ $data->timesloat == '16:00' ? 'selected' : '' }}>16:00</option>
                  <option value="16:15"{{ $data->timesloat == '16:15' ? 'selected' : '' }}>16:15</option>
                  <option value="16:30"{{ $data->timesloat == '16:30' ? 'selected' : '' }}>16:30</option>
                  <option value="16:45"{{ $data->timesloat == '16:45' ? 'selected' : '' }}>16:45</option>
                  <option value="17:00"{{ $data->timesloat == '17:00' ? 'selected' : '' }}>17:00</option>
                  <option value="17:15"{{ $data->timesloat == '17:15' ? 'selected' : '' }}>17:15</option>
                  <option value="17:30"{{ $data->timesloat == '17:30' ? 'selected' : '' }}>17:30</option>
                  <option value="17:45" {{ $data->timesloat == '17:45' ? 'selected' : '' }}>17:45</option>
                </select>
                </select>
              </div>

       

            
            <button type="submit" class="btn btn-primary">update</button>
            {{-- <a class="btn btn-primary" href=" {{route('user') }} ">show all data</a> --}}
          </form>
            </div>
        </div>
      </div>
   

@endsection