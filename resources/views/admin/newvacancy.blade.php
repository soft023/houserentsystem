@extends ('layouts.mastermenu2')
@section('title', 'Admin Dashboard')
@section('maincontent')
<div class="row">
  <div class="col-lg-4 col-md-6  "> </div>
  <div class="col-lg-4 col-md-6  ">
    <a href="/" style="text-decoration:none"><h3 class="text-secondary w3-text-blue w3-hover-blue"></h3></a>

  </div>

  <div class="col-lg-4 col-md-6  "></div>
</div>

<div class="row">
 <div class="col-md-12 text-center">
  <div class ="alert alert-danger">
     <h4>{{Session::get('failure')}} </h4>
   </div>

   <div class ="alert alert-success">
     <h4>{{Session::get('success')}} </h4>
   </div>
 </div>
</div>
<div class="row">
  <div class=" col-md-1 col-lg-1"></div>
  <div class="col-sm-12 col-md-10 col-lg-10">
   <div class="card text-center w3-text-blue">
    <div class="card-body w3-text-blue w3-yellow">
      <h4 class="card-title"> <b>Vacancy Registration Form</b></h4> 
    </div>
    <form class="form-control" method="POST" action="{{ route('registervacancy') }}" >
      {{ csrf_field() }}
      <br>
      <div class="row">
       <div class="col-sm-3 col-md-3 col-md-3"></div>
        <div class="col-sm-6 col-md-6 col-md-6">
        
        <div class="form-group{{ $errors->has('house') ? ' has-error' : '' }}">
         <select class="form-control text-center" style="font-size:13pt;" name="house_id" id="house_id" required>
          <option value="" disabled selected>Select House</option>
          @foreach( $houses as $ad)
          <option value="{{$ad['id']}}">{{$ad['name']}}</option>
          @endforeach

        </select>
        
        @if ($errors->has('house_id'))
        <span class="help-block">
         <strong>{{ $errors->first('house_id') }}</strong>
       </span>
       @endif
     </div>
   </div> 
      

      <div class="col-sm-3 col-md-3 col-md-3"></div>

    </div>


    <br>
    <div class="row">
      <div class="col-sm-3 col-md-3 col-md-3"></div>
     <div class="col-sm-6 col-md-6 col-md-6">
        <div class="form-group{{ $errors->has('vacancyname') ? ' has-error' : '' }}">
          <input id="vacancyname" type="text" style="font-size:13pt;" class="form-control text-center" placeholder="Name" name="vacancyname" value="{{ old('vacancyname') }}" required >

          @if ($errors->has('vacancyname'))
          <span class="help-block">
            <strong>{{ $errors->first('vacancyname') }}</strong>
          </span>
          @endif            
        </div>
      </div>

   <div class="col-sm-3 col-md-3 col-md-3"> </div>    
 </div>
 <br>

 <div class="row">
   <div class="col-sm-3 col-md-3 col-md-3"></div>
   <div class="col-sm-6 col-md-6 col-md-6">
    <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
      <input id="amount" type="text" style="font-size:13pt;" class="form-control text-center" placeholder="Amount" name="amount" value="{{ old('amount') }}" required >

      @if ($errors->has('amount'))
      <span class="help-block">
        <strong>{{ $errors->first('amount') }}</strong>
      </span>
      @endif       
    </div>
  </div>


  <div class="col-sm-3 col-md-3 col-md-3"></div>
</div>






<div class="row">
 <div class="col-sm-3 col-md-3 col-md-3"></div>
 <div class="col-sm-6 col-md-6 col-md-6">
  <br><br>
  <button type="submit" class="btn btn-lg btn-success">
    Register
  </button>
  <br>
  <br><br>
</div>


<div class="col-sm-3 col-md-3 col-md-3"></div>
</div>


</div>
<br>



</div>
</div>
</div>


</div>                    
</form>

</div>
</div>
<div class=" col-md-1 col-lg-1"></div>

</div>

@endsection
