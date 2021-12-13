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
<div class="card mb-3">
  <div class="card-header w3-hover-red">
  <a class="nav-link text-center " href="{{route('allhouses')}}"> <i class="fa fa-search  "></i> <b>All Houses</b></a>
</div>
<div class="row">
  <div class=" col-md-1 col-lg-1"></div>
  <div class="col-sm-12 col-md-10 col-lg-10">
   <div class="card text-center w3-text-blue">
    <div class="card-body w3-text-blue w3-yellow">
      <h4 class="card-title"> <b>Update House Information</b></h4> 
    </div>

    <form class="form-control" method="POST" action="{{ route('updatehouse') }}" enctype="multipart/form-data">
      {{ csrf_field() }}
      <br>
      @foreach($house as $sta)
      <div class="row">
        <div class="col-sm-6 col-md-6 col-md-6">

         <input type="text" style="font-size:13pt; display:none;" class="form-control text-center" name="houseid" value=" {{$sta['id']}}" required >

         <div class="form-group{{ $errors->has('housename') ? ' has-error' : '' }}">
          <label><b>Name</b></label>
          <input id="housename" type="text" style="font-size:13pt;" class="form-control text-center" placeholder="House Name" name="housename" value=" {{$sta['name']}}" required >

          @if ($errors->has('housename'))
          <span class="help-block">
            <strong>{{ $errors->first('housename') }}</strong>
          </span>
          @endif            
        </div>
      </div>

      <div class="col-sm-6 col-md-6 col-md-6">
        <div class="form-group{{ $errors->has('housetype') ? ' has-error' : '' }}">
         <label><b>Type</b></label>
         <select class="form-control text-center" style="font-size:13pt;" name="type" id="type">
          <option value="{{$sta['type']}}" disabled selected>{{$sta['type']}}</option>
          <option value="Estate">Estate</option>
          <option value="Duplex">Duplex</option>
          <option value="Shop">Shop</option>
          <option value="1Bed Flat">1Bed Flat</option>
          <option value="2Bed Flat">2Bed Flat</option>
          <option value="3Bed Flat">3Bed Flat</option>
        </select>
        @if ($errors->has('housetype'))
        <span class="help-block">
         <strong>{{ $errors->first('housetype') }}</strong>
       </span>
       @endif
     </div>
   </div>
 </div>


 <br>
 <div class="row">
  <div class="col-sm-6 col-md-6 col-md-6">
   <label><b>Country</b></label>
   <select class="form-control text-center" style="font-size:13pt;" name="country" id="country">
    <option value="{{$sta['country']}}" disabled selected>{{$sta['country']}}</option>
    <option value="Nigeria">NIGERIA</option>
    <option value="USA">USA</option>
    <option value="UAE">UAE</option>
    <option value="FRANCE">FRANCE</option>
    <option value="ITALY">ITALY</option>
  </select>


  @if ($errors->has('country'))
  <span class="help-block">
    <strong>{{ $errors->first('country') }}</strong>
  </span>
  @endif            
</div>

<div class="col-sm-6 col-md-6 col-md-6">
  <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
   <label><b>State</b></label>
   <input id="state" type="state" style="font-size:13pt;" class="form-control text-center" value="{{$sta['state']}}" name="state" required>
   @if ($errors->has('state'))
   <span class="help-block">
     <strong>{{ $errors->first('state') }}</strong>
   </span>
   @endif
 </div>



</div>



</div>

<br>
<div class="row">
  <div class="col-sm-6 col-md-6 col-md-6">
    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
     <label><b>Address</b></label>
     <textarea class="form-control text-center" name="address" rows="3"  style=" font-size:13pt;" required/>
     {{$sta['address']}}
   </textarea> 
 </div>
 <h5>Picture</h5>
 <img src="{{asset('/houseimage/').'/'.$sta['imgpath']}}" )}}" class="img-responsive w3-circle w3-animate-zoom w3-hover-opacity" width="150px" height="150px" alt="staffimg"/>



</div>


<div class="col-sm-6 col-md-6 col-md-6">
  <div class="form-group{{ $errors->has('town') ? ' has-error' : '' }}">
    <input id="town" type="text" style=" font-size:13pt;" class="form-control text-center" value="{{$sta['town']}}" name="town" required > <br>

    <label><b>Vacancy</b></label>
    <input id="rentable" type="text" style=" font-size:13pt;" class="form-control text-center" value=" {{$sta['rentable']}}" name="rentable" required >
    <br><br><br><br>
    <input type="file" id="housepicture"  name="housepicture" />
    @if($errors->has('housepicture'))
    <p class= "w3-text-red">{{$errors->first('housepicture')}}</p> 
    @endif


  </div>
</div>


@endforeach
</div>
<br>



<div class="row">
  <div class="col-sm-4 col-md-4 col-md-4"></div>
  <div class="col-sm-4 col-md-4 col-md-4">
    <br><br>
    <button type="submit" class="btn btn-lg btn-success">
      Update
    </button>
    <br>
    <br>
  </div>
  <div class="col-sm-4 col-md-4 col-md-4"></div>

</div>

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
