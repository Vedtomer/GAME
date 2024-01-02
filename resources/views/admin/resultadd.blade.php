@extends('admin.layout.main')
@section('title', 'Result Add')
@section('section')



<div class="container">
  <div class="col-lg-7">
    <div class="main-card mb-3 card">
    <div class="card-body">
      @error('number_70')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

@error('number_60')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
  <div class="row">
      <div class="col-12">
            
        <form action="{{ route('admin.result.save') }}" method="post">

            @csrf
            <div class="mb-3">
                {{-- <h3>ADD Result</h3> --}}

                <label for=""><b>Number 70</b></label>
               
                {{-- <input type="text" class="form-control" name="number_70" placeholder="Enter Number" required onkeypress="allowOnlyNumbers(event)"> --}}
                <input type="text" class="form-control" name="number_70" placeholder="Enter Number" required onkeypress="allowOnlyNumbers(event)" maxlength="2">


            </div>
            
            <div class="mb-3">

              <label for=""><b>Number 60</b></label>
                <input type="text" class="form-control" name="number_60" placeholder="Enter Number" required onkeypress="allowOnlyNumbers(event)" maxlength="2">
            </div>
         
            <div class="form-group">
 
                <label for=""><b>Select Times</b></label>
                <select class="form-control" id="exampleDropdown" name="timesloat" required>
                    <option value="" selected>Select times</option>
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
              
            

              <div class="d-flex justify-content-center">
        
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <a href="{{ route('admin.result') }}" class="btn btn-info">Back</a>
            </div>
        </form>
      </div>
  </div>
</div>
</div>
</div>
</div>

<script>

function allowOnlyNumbers(event) {
  const charCode = (event.which) ? event.which : event.keyCode;
  if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode !== 37 && charCode !== 39) {
      event.preventDefault();
  }
 
}
</script>



      <script>
   
          var currentTime = new Date();
          var currentHour = currentTime.getHours();
          var currentMinute = currentTime.getMinutes();

     
          var formattedCurrentTime = currentHour * 60 + currentMinute;

   
          var dropdown = document.getElementById('exampleDropdown');
          var options = dropdown.options;
          var lastPastTimeIndex = -1;

          for (var i = options.length - 1; i >= 0; i--) {
              var optionValue = options[i].value;
              var optionTime = parseInt(optionValue.split(':')[0]) * 60 + parseInt(optionValue.split(':')[1]);

              if (optionValue !== "" && optionTime < formattedCurrentTime) {
                  if (lastPastTimeIndex === -1) {
                      lastPastTimeIndex = i;
                  } else {
                      dropdown.remove(i);
                  }
              }
          }
      </script>



        @endsection
