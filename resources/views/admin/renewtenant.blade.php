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
    <a class="nav-link text-center " href="{{route('alltenant')}}"> <i class="fa fa-search  "></i> <b>All Tenants</b></a>
  </div>
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
      <h4 class="card-title"> <b>Renew Rent</b></h4> 
    </div>
    <form class="form-control" method="POST" action="{{ route('renewrent') }}" >
      {{ csrf_field() }}
      <br>
      <div class="row">
       @foreach( $tenant as $ad)
       <div class="col-sm-3 col-md-3 col-md-3"></div>
       <div class="col-sm-6 col-md-6 col-md-6">

        <div class="form-group{{ $errors->has('house') ? ' has-error' : '' }}">
          <input id="tid" type="text" style="font-size:13pt;" class="form-control"  name="tid" value="{{ $ad['id'] }}" hidden >
          <h3>Tenant Name:  <i>{{ $ad['name'] }}</i></h3>
          <h3>Property Occupied:  <i>{{ $property[0]['name'].', '.$property[0]['house'] }}</i></h3>

          @if ($errors->has('house'))
          <span class="help-block">
           <strong>{{ $errors->first('house') }}</strong>
         </span>
         @endif
       </div>
     </div> 


     <div class="col-sm-3 col-md-3 col-md-3"></div>

   </div>



   <div class="row">
    <div class="col-sm-3 col-md-3 col-md-3"></div>
    <div class="col-sm-6 col-md-6 col-md-6">
      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <h3><b>Annual Rent: N{{ $ad['amount'] }}</b></h3>
        <input id="paymentstatus" type="text" style="font-size:13pt;" class="form-control text-center"  name="paymentstatus" value="{{ $ad['paymentstatus'] }}" hidden >

        <input id="amount" type="text" style="font-size:13pt;" class="form-control text-center"  name="amount" value="{{ $ad['amount'] }}" hidden >
        @if ($errors->has('name'))
        <span class="help-block">
          <strong>{{ $errors->first('amount') }}</strong>
        </span>
        @endif            
      </div>
    </div>
    <div class="col-sm-3 col-md-3 col-md-3"> </div>    
  </div>


  <div class="row">
   <div class="col-sm-3 col-md-3 col-md-3"></div>
   <div class="col-sm-6 col-md-6 col-md-6">
    <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
      <h4><b>Amount Paid (N)</b></h4>
      <input id="amountpaid" name="amountpaid" type="text" style="font-size:13pt;" class="form-control text-center" value="" placeholder="Enter new payment" required >       
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
      Renew
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
