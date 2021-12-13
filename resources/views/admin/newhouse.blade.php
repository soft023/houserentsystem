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
      <h4 class="card-title"> <b>New House Registration Form</b></h4> 
    </div>
    <form class="form-control" method="POST" action="{{ route('registerhouse') }}" enctype="multipart/form-data">
      {{ csrf_field() }}
      <br>
      <div class="row">
        <div class="col-sm-6 col-md-6 col-md-6">
          <div class="form-group{{ $errors->has('housename') ? ' has-error' : '' }}">
            <input id="housename" type="text" style="font-size:13pt;" class="form-control text-center" placeholder="House Name" name="housename" value="{{ old('housename') }}" required >

            @if ($errors->has('housename'))
            <span class="help-block">
              <strong>{{ $errors->first('housename') }}</strong>
            </span>
            @endif            
          </div>
        </div>

        <div class="col-sm-6 col-md-6 col-md-6">
          <div class="form-group{{ $errors->has('housetype') ? ' has-error' : '' }}">
           <select class="form-control text-center" style="font-size:13pt;" name="housetype" id="housetype" required>
          <option value="" disabled selected>Select Type of House</option>
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
        <select class="form-control text-center" style="font-size:13pt;" name="country" id="country" required>
          <option value="" disabled selected>Select Country</option>
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
         <input id="state" type="state" style="font-size:13pt;" class="form-control text-center" placeholder="State" name="state" required>
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
        <textarea class="form-control text-center" name="address" rows="3" placeholder="Address" style=" font-size:13pt;" required/></textarea> 
      </div>
       <h5>Picture</h5>

        <input type="file" id="housepicture"  name="housepicture" required/>
        @if($errors->has('housepicture'))
        <p class= "w3-text-red">{{$errors->first('housepicture')}}</p> 
        @endif


    </div>


    <div class="col-sm-6 col-md-6 col-md-6">
      <div class="form-group{{ $errors->has('town') ? ' has-error' : '' }}">
        <input id="town" type="text" style=" font-size:13pt;" class="form-control text-center" placeholder="Town" name="town" required > <br>

         <input id="rentable" type="text" style=" font-size:13pt;" class="form-control text-center" placeholder=" Enter Number Of Rentables" name="rentable" required >

       

        @if ($errors->has('town'))
        <span class="help-block">
          <strong>{{ $errors->first('town') }}</strong>
        </span>
        @endif            
      </div>
      </div>
    </div>

<br><br>
 <button type="submit" class="btn btn-lg btn-success">
        Register
      </button>
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
