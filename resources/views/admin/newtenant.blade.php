@extends  ( 'layouts.mastermenu2')
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
      <h4 class="card-title"> <b>New Tenant Registration Form</b></h4> 
    </div>
    <form class="form-control" method="POST" action="{{ route('registertenant') }}" enctype="multipart/form-data">
      {{ csrf_field() }} 
      
      <div class="row">
        
       <div class="col-sm-12 col-md-12 col-lg-12 text-center">
        <h3>Tenant Personal Information</h3>
        <hr class="separator">
      </div>

    </div>

    <br>
    <div class="row">
      <div class="col-sm-4 col-md-4 col-lg-4">
        <div class="form-group{{ $errors->has('fname') ? ' has-error' : '' }}">
          <input id="fname" type="text" style="font-size:13pt;" class="form-control text-center" placeholder="First Name" name="fname" value="{{ old('fname') }}" required >

          @if ($errors->has('fname'))
          <span class="help-block">
            <strong>{{ $errors->first('fname') }}</strong>
          </span>
          @endif            
        </div>
      </div>

      <div class="col-sm-4 col-md-4 col-lg-4">
        <div class="form-group{{ $errors->has('mname') ? ' has-error' : '' }}">
          <input id="mname" type="text" style="font-size:13pt;" class="form-control text-center" placeholder="Middle Name" name="mname" value="{{ old('mname') }}" required >

          @if ($errors->has('mname'))
          <span class="help-block">
            <strong>{{ $errors->first('mname') }}</strong>
          </span>
          @endif            
        </div>
      </div>

      <div class="col-sm-4 col-md-4 col-lg-4">
        <div class="form-group{{ $errors->has('lname') ? ' has-error' : '' }}">
          <input id="lname" type="text" style="font-size:13pt;" class="form-control text-center" placeholder="Last Name" name="lname" value="{{ old('lname') }}" required >

          @if ($errors->has('lname'))
          <span class="help-block">
            <strong>{{ $errors->first('lname') }}</strong>
          </span>
          @endif            
        </div>
      </div>


      
    </div>


    <br>
    <div class="row">
      <div class="col-sm-4 col-md-4 col-lg-4">
        <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
          <input id="country" type="text" style="font-size:13pt;" class="form-control text-center" placeholder="Current Country" name="country" value="{{ old('country') }}" required >

          @if ($errors->has('country'))
          <span class="help-block">
            <strong>{{ $errors->first('country') }}</strong>
          </span>
          @endif            
        </div>
      </div>  

      <div class="col-sm-4 col-md-4 col-lg-4">
        <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
          <input id="state" type="text" style="font-size:13pt;" class="form-control text-center" placeholder="Current State" name="state" value="{{ old('state') }}" required >

          @if ($errors->has('state'))
          <span class="help-block">
            <strong>{{ $errors->first('state') }}</strong>
          </span>
          @endif            
        </div>
      </div>

      <div class="col-sm-4 col-md-4 col-lg-4">
        <div class="form-group{{ $errors->has('town') ? ' has-error' : '' }}">
          <input id="town" type="text" style="font-size:13pt;" class="form-control text-center" placeholder="Current Town" name="town" value="{{ old('town') }}" required >

          @if ($errors->has('town'))
          <span class="help-block">
            <strong>{{ $errors->first('town') }}</strong>
          </span>
          @endif            
        </div>
      </div>


      
    </div>
    <br>
    <div class="row">
      <div class="col-sm-4 col-md-4 col-lg-4">
        <div class="form-group{{ $errors->has('phonenumber') ? ' has-error' : '' }}">
          <input id="phonenumber" type="text" style="font-size:13pt;" class="form-control text-center" placeholder="Phone Number" name="phonenumber" value="{{ old('phonenumber') }}" required >

          @if ($errors->has('phonenumber'))
          <span class="help-block">
            <strong>{{ $errors->first('phonenumber') }}</strong>
          </span>
          @endif            
        </div>
      </div>

      <div class="col-sm-4 col-md-4 col-lg-4">
        <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
          <select class="form-control text-center" style="font-size:13pt;" name="religion" id="religion" required>
            <option value="" disabled selected>Select Religion</option>
            <option value="Islam">Islam</option>
            <option value="Christianity">Christianity</option>
          </select>

          @if ($errors->has('religion'))
          <span class="help-block">
            <strong>{{ $errors->first('religion') }}</strong>
          </span>
          @endif            
        </div>
      </div>

      <div class="col-sm-4 col-md-4 col-lg-4">
        <div class="form-group{{ $errors->has('sex') ? ' has-error' : '' }}">
         <select class="form-control text-center" style="font-size:13pt;" name="sex" id="sex" required>
          <option value="" disabled selected>Select Sex</option>
          <option value="Female">Female</option>
          <option value="Male">Male</option>
        </select>

        @if ($errors->has('sex'))
        <span class="help-block">
          <strong>{{ $errors->first('sex') }}</strong>
        </span>
        @endif            
      </div>
    </div>



  </div>
  <br>
  <div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12">
      <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
        <textarea class="form-control text-center" name="address" rows="1" placeholder="Input Full Current Address" style=" font-size:13pt;" required/></textarea> 
      </div>



    </div>
  </div>

  <div class="row">

   <div class="col-sm-12 col-md-12 col-lg-12 text-center">
    <h3>Guarantor's Information</h3>
    <hr class="separator">
  </div>
</div>
<br>
<div class="row">
  <div class="col-sm-4 col-md-4 col-lg-4">
    <div class="form-group{{ $errors->has('gfname') ? ' has-error' : '' }}">
      <input id="gfname" type="text" style="font-size:13pt;" class="form-control text-center" placeholder="First Name" name="gfname" value="{{ old('gfname') }}" required >

      @if ($errors->has('gfname'))
      <span class="help-block">
        <strong>{{ $errors->first('gfname') }}</strong>
      </span>
      @endif            
    </div>
  </div>

  <div class="col-sm-4 col-md-4 col-lg-4">
    <div class="form-group{{ $errors->has('gmname') ? ' has-error' : '' }}">
      <input id="gmname" type="text" style="font-size:13pt;" class="form-control text-center" placeholder="Middle Name" name="gmname" value="{{ old('gmname') }}" required >

      @if ($errors->has('gmname'))
      <span class="help-block">
        <strong>{{ $errors->first('gmname') }}</strong>
      </span>
      @endif            
    </div>
  </div>

  <div class="col-sm-4 col-md-4 col-lg-4">
    <div class="form-group{{ $errors->has('glname') ? ' has-error' : '' }}">
      <input id="glname" type="text" style="font-size:13pt;" class="form-control text-center" placeholder="Last Name" name="glname" value="{{ old('glname') }}" required >

      @if ($errors->has('glname'))
      <span class="help-block">
        <strong>{{ $errors->first('glname') }}</strong>
      </span>
      @endif            
    </div>
  </div>
</div>
<br>

<div class="row">
  <div class="col-sm-12 col-md-8 col-lg-8">

   <div class="form-group{{ $errors->has('gaddress') ? ' has-error' : '' }}">
    <textarea class="form-control text-center" name="gaddress" rows="3" placeholder="Input  Address" style=" font-size:13pt;" required/></textarea> 
  </div>

</div>
<div class="col-sm-12 col-md-4 col-lg-4">

  <div class="form-group{{ $errors->has('relationship') ? ' has-error' : '' }}">
    <input id="relationship" type="text" style="font-size:13pt;" class="form-control text-center" placeholder="Relationship" name="relationship" value="{{ old('relationship') }}" required >

    @if ($errors->has('relationship'))
    <span class="help-block">
      <strong>{{ $errors->first('relationship') }}</strong>
    </span>
    @endif            
  </div>
<br>

  <div class="form-group{{ $errors->has('gphonenumber') ? ' has-error' : '' }}">
    <input id="phonenumber" type="text" style="font-size:13pt;" class="form-control text-center" placeholder="Phone Number" name="gphonenumber" value="{{ old('gphonenumber') }}" required >

    @if ($errors->has('gphonenumber'))
    <span class="help-block">
      <strong>{{ $errors->first('gphonenumber') }}</strong>
    </span>
    @endif            
  </div>

</div>
</div>






<div class="row">
 <div class="col-sm-12 col-md-12 col-lg-12 text-center">
  <h3>Payment Information</h3>
  <hr class="separator">
</div>
</div>
<br>

<div class="row">
  <div class="col-sm-12 col-md-12 col-lg-12">
    <div class="form-group{{ $errors->has('house') ? ' has-error' : '' }}">

     <select class="form-control text-center" style="font-size:13pt;" name="house" id="house" required>

      <option value="" disabled selected>Select House</option>
      @foreach( $vacancy as $vac)
      <option value={{ $vac['id']}}>{{ $vac['id']}}. {{ $vac['house']}} : {{ $vac['name']}} - 
      {{ $vac['town']}} {{ $vac['state']}} {{ $vac['country']}} : N{{ $vac['amount']}}</option>
      @endforeach 

    </select>


    @if ($errors->has('house'))
    <span class="help-block">
      <strong>{{ $errors->first('house') }}</strong>
    </span>
    @endif            
  </div>
</div>
</div>

<br>
<div class="row">

 <div class="col-sm-2 col-md-2 col-lg-2">
</div>

<div class="col-sm-8 col-md-8 col-lg-8">
  <div class="form-group{{ $errors->has('amountpaid') ? ' has-error' : '' }}">
    <input id="amountpaid" type="text" style="font-size:13pt;" class="form-control text-center" placeholder="Enter Amount Paid (Naira)" name="amountpaid" value="{{ old('amountpaid') }}" required >

    @if ($errors->has('amountpaid'))
    <span class="help-block">
      <strong>{{ $errors->first('amountpaid') }}</strong>
    </span>
    @endif            
  </div>
</div>



<div class="col-sm-2 col-md-2 col-lg-2">  </div>


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
