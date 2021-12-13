@extends ('layouts.mastermenu')
@section('title', 'Super Admin Dashboard')
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
  <a class="nav-link text-center " href="{{route('superadminalltenants')}}"> <i class="fa fa-search  "></i> <b>All Tenants</b></a>
</div>
<div class="row">
  <div class=" col-md-1 col-lg-1"></div>
  <div class="col-sm-12 col-md-10 col-lg-10">
   <div class="card text-center w3-text-blue">
    <div class="card-body w3-text-blue w3-yellow">
      <h4 class="card-title"> <b>Tenant Details</b></h4> 
    </div>
    <form class="form-control" method="POST" action="" enctype="multipart/form-data">
      {{ csrf_field() }}
      <br>
  <div class="row">
  <div class="col-12">

 
     <!-- Example DataTables Card-->




  <div class="card-body" >
<div class="row">
  <div class="col-md-12">
    <div class="w3-card w3-yellow">
    @foreach($tenant as $sta)
  <br><h3><b>Name : </b> {{$sta['name']}}</h3>
  <h3><b>Address : </b> {{$sta['address']}}</h3>
  <h3><b>Telephone : </b> {{$sta['telephone']}}</h3>
  <h3><b>Sex : </b> {{$sta['sex']}}</h3>
  <h3><b>Religion : </b> {{$sta['religion']}}</h3><br>
  
 </div> 
<br>
   <div class="w3-card w3-yellow">
    <br><h3><b>Guarantor</b><h3>{{$sta['gname']}}</h3></h3>
    <h3><b>Address</b><h3>{{$sta['gaddress']}}</h3></h3>
    <h3><b>Telephone</b><h3>{{$sta['gtelephone']}}</h3></h3>
    <h3><b>Relationship</b><h3>{{$sta['relationship']}}</h3></h3>
    
    <br>  
    
   </div> 
<br>
<div class="w3-card w3-yellow">
  <br> <h3><b>Property Name : </b>{{$property[0]['house'].', '.$property[0]['name']}}</h3>
  <h3><b>Property Address : </b>{{$property[0]['address']}}</h3>
  <h3><b>Rent Amount : </b>{{$sta['amount']}}</h3>
  <h3><b>Amount Paid : </b>{{$sta['amountpaid']}}</h3>
  <h3><b>Balance : </b>{{$sta['balance']}}</h3>
  <h3><b>Expiry Date : </b>{{$sta['expires']}}</h3><br>
   </div>
 
   <br>



</div>
 
  @endforeach
</div>







  </div>
  <div class="card-footer small text-muted "></div>
</div>
 </div>
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
