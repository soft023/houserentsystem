@extends ('layouts.mastermenu2')
@section('title', 'Admin Dashboard')
@section('maincontent')

<div class="row">
 <div class="col-md-12 text-center">
  <div class="card-header w3-hover-red">
    <a class="nav-link text-center " href="{{route('alltenant')}}"> <i class="fa fa-search  "></i> <b>All Tenants</b></a>
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
    <div class="card-body text-center w3-text-blue w3-yellow">
      <h4 class="card-title"> <b>Update Tenant Information</b></h4> 
    </div>
    <form class="form-control" method="POST" action="{{ route('updatetenantinfo') }}" >
      {{ csrf_field() }}
      <br>


      <div class="row">
       <div class="col-sm-6 col-md-6 col-lg-6">
         <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
           <b>Tenant Name</b>
           @foreach( $tenant as $ad)
           <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

            <input id="tid" type="text" style="font-size:13pt;" class="form-control"  name="tid" value="{{ $ad['id'] }}" hidden >

            <input id="vacancy_id" type="text" style="font-size:13pt;" class="form-control"  name="vacancy_id" value="{{ $ad['vacancy_id'] }}" hidden >

            <input id="name" type="text" style="font-size:13pt;" class="form-control text-center"  name="name" value="{{ $ad['name'] }}" required >

            @if ($errors->has('name'))
            <span class="help-block">
              <strong>{{ $errors->first('name') }}</strong>
            </span>
            @endif            
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-md-6 col-lg-6">
        <b>Tenant Phone Number</b>
        <div class="form-group{{ $errors->has('telephone') ? ' has-error' : '' }}">
          <input id="telephone" type="text" style="font-size:13pt;" class="form-control text-center" 
          name="telephone" value="{{ $ad['telephone'] }}" required >

          @if ($errors->has('telephone'))
          <span class="help-block">
            <strong>{{ $errors->first('telephone') }}</strong>
          </span>
          @endif            
        </div>
      </div>


    </div>
    <br>






    
    <div class="row">
      <div class="col-sm-6 col-md-6 col-md-6">
        <div class="form-group{{ $errors->has('sex') ? ' has-error' : '' }}">
         <b>Sex</b>
         <select class="form-control text-center" style="font-size:13pt;" name="sex" id="sex" required>
          <option value="{{$ad['sex']}}" selected>{{$ad['sex']}}</option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
        </select>

        @if ($errors->has('sex'))
        <span class="help-block">
         <strong>{{ $errors->first('sex') }}</strong>
       </span>
       @endif
     </div>
   </div>


   <div class="col-sm-6 col-md-6 col-md-6">
     <div class="form-group{{ $errors->has('religion') ? ' has-error' : '' }}">
      <b>Religion</b>
      <select class="form-control text-center" style="font-size:13pt;" name="religion" id="religion" required>
        <option value="{{$ad['religion']}}" selected>{{$ad['religion']}}</option>
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


</div>
<br>


<div class="row">
  <div class="col-sm-6 col-md-6 col-md-6">
    <b>Tenant Town</b>
    <div class="form-group{{ $errors->has('town') ? ' has-error' : '' }}">
      <input id="town" type="text" style="font-size:13pt;" class="form-control text-center" name="town" value="{{ $ad['town'] }}" required >

      @if ($errors->has('town'))
      <span class="help-block">
        <strong>{{ $errors->first('town') }}</strong>
      </span>
      @endif            
    </div>
  </div>
  <div class="col-sm-6 col-md-6 col-md-6">
    <b>Tenant State</b>
    <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
      <input id="state" type="text" style="font-size:13pt;" class="form-control text-center" name="state" value="{{ $ad['state'] }}" required >

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
    <b>Tenant Country</b>
    <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
      <input id="country" type="text" style="font-size:13pt;" class="form-control text-center" name="country" value="{{ $ad['country'] }}" required >

      @if ($errors->has('country'))
      <span class="help-block">
        <strong>{{ $errors->first('country') }}</strong>
      </span>
      @endif            
    </div>
  </div>
  <div class="col-sm-6 col-md-6 col-md-6">
   <b>Guarantor Name</b>
   <div class="form-group{{ $errors->has('gname') ? ' has-error' : '' }}">
    <input id="gname" type="text" style="font-size:13pt;" class="form-control text-center" name="gname" value="{{ $ad['gname'] }}" required >
    @if ($errors->has('gname'))
    <span class="help-block">
      <strong>{{ $errors->first('gname') }}</strong>
    </span>
    @endif            
  </div>
</div> 
</div>




<br>
<div class="row">
  <div class="col-sm-6 col-md-6 col-md-6">
   <b>Guarantor Address </b>
   <div class="form-group{{ $errors->has('gaddress') ? ' has-error' : '' }}">
    <input id="gaddress" type="text" style="font-size:13pt;" class="form-control text-center" name="gaddress" value="{{ $ad['gaddress'] }}" required >
    @if ($errors->has('gaddress'))
    <span class="help-block">
      <strong>{{ $errors->first('gaddress') }}</strong>
    </span>
    @endif            
  </div>
</div>
<div class="col-sm-6 col-md-6 col-md-6">
  <b>Guarantor Number</b>
  <div class="form-group{{ $errors->has('gtelephone') ? ' has-error' : '' }}">
    <input id="gtelephone" type="text" style="font-size:13pt;" class="form-control text-center" name="gtelephone" value="{{ $ad['gtelephone'] }}" required >

    @if ($errors->has('gtelephone'))
    <span class="help-block">
      <strong>{{ $errors->first('gtelephone') }}</strong>
    </span>
    @endif            
  </div>
</div> 
</div>
<br>






<div class="row">
  <div class="col-sm-6 col-md-6 col-md-6">
    <b>Relationship</b>
    <div class="form-group{{ $errors->has('relationship') ? ' has-error' : '' }}">
      <input id="relationship" type="text" style="font-size:13pt;" class="form-control text-center" name="relationship" value="{{ $ad['relationship'] }}" required >

      @if ($errors->has('relationship'))
      <span class="help-block">
        <strong>{{ $errors->first('relationship') }}</strong>
      </span>
      @endif            
    </div>
  </div>
  <div class="col-sm-6 col-md-6 col-md-6">
    <b>Amount Paid</b>
    <div class="form-group{{ $errors->has('amountpaid') ? ' has-error' : '' }}">
      <input id="amountpaid" type="text" style="font-size:13pt;" class="form-control text-center" name="amountpaid" value="{{ $ad['amountpaid'] }}" required >

      @if ($errors->has('amountpaid'))
      <span class="help-block">
        <strong>{{ $errors->first('amountpaid') }}</strong>
      </span>
      @endif            
    </div>
  </div> 
</div>



<br>
<div class="row">
  <div class="col-sm-3 col-md-3 col-md-3"></div>
  <div class="col-sm-6 col-md-6 col-md-6">
   <b>Balance</b>
   <div class="form-group{{ $errors->has('balance') ? ' has-error' : '' }}">
    <input id="balance" type="text" style="font-size:13pt;" class="form-control text-center" name="balance" value="{{ $ad['balance'] }}" required >

    @if ($errors->has('balance'))
    <span class="help-block">
      <strong>{{ $errors->first('balance') }}</strong>
    </span>
    @endif            
  </div>
</div>
<div class="col-sm-3 col-md-3 col-md-3"> </div>    
</div>
@endforeach



<div class="row">
 <div class="col-sm-3 col-md-3 col-md-3"></div>
 <div class="col-sm-6 col-md-6 col-md-6">
  <br><br>
  <button type="submit" class="btn btn-lg btn-success">
    Update
  </button>
  <br><br><br><br>

</div>



<div class="col-sm-3 col-md-3 col-md-3"></div>
</div>
</form></div></div>


<div class=" col-md-1 col-lg-1"></div>

</div>
@endsection
