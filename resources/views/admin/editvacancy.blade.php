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
  <div class="card-header w3-hover-red">
    <a class="nav-link text-center " href="{{route('allvacancies')}}"> <i class="fa fa-search  "></i> <b>All Rentables</b></a>
  </div>
  
 </div>
</div>
<div class="row">
  <div class=" col-md-1 col-lg-1"></div>
  <div class="col-sm-12 col-md-10 col-lg-10">
   <div class="card text-center w3-text-blue">
    <div class="card-body w3-text-blue w3-yellow">
      <h4 class="card-title"> <b>Update Vacancy Information</b></h4> 
    </div>
    <form class="form-control" method="POST" action="{{ route('updatevacancy') }}" >
      {{ csrf_field() }}
      <br>
      <div class="row">
       @foreach( $vacancy as $ad)
       <div class="col-sm-3 col-md-3 col-md-3"></div>
       <div class="col-sm-6 col-md-6 col-md-6">

       
        <input id="vid" type="text" style="font-size:13pt;" class="form-control text-center"  name="vid" value="{{ $ad['id'] }}" hidden >

         <h4><b>House Name: {{$ad['house']}}</b></h4>
     
   </div> 




   <div class="col-sm-3 col-md-3 col-md-3"></div>

 </div>


 
 <div class="row">
  <div class="col-sm-3 col-md-3 col-md-3"></div>
  <div class="col-sm-6 col-md-6 col-md-6">
    <h4><b>Portion Name: {{ $ad['name'] }}</b></h4>
               
 
  </div>
  <div class="col-sm-3 col-md-3 col-md-3"> </div>    
</div>
<br>

<div class="row">
 <div class="col-sm-3 col-md-3 col-md-3"></div>
 <div class="col-sm-6 col-md-6 col-md-6">
  <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
    <b>Amount</b><input name="amount" type="text" style="font-size:13pt;" class="form-control text-center" value="{{ $ad['amount'] }}" required >

    @if ($errors->has('amount'))
    <span class="help-block">
      <strong>{{ $errors->first('amount') }}</strong>
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
   <div class="form-group{{ $errors->has('house') ? ' has-error' : '' }}">
     <b>Status</b></label>
     <select class="form-control text-center" style="font-size:13pt;" name="status" id="status" >
      <option value="{{$ad['status']}}" selected>{{$ad['status']}}</option>
      <option value="Empty">Empty</option>
    </select>

    @if ($errors->has('status'))
    <span class="help-block">
     <strong>{{ $errors->first('status') }}</strong>
   </span>
   @endif
 </div>
</div>


<div class="col-sm-3 col-md-3 col-md-3"></div>
</div>

@endforeach
<div class="row">
 <div class="col-sm-3 col-md-3 col-md-3"></div>
 <div class="col-sm-6 col-md-6 col-md-6">
  <br><br>
  <button type="submit" class="btn btn-lg btn-success">
    Update
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
