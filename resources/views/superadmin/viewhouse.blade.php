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
  <a class="nav-link text-center " href="{{route('superadminallhouses')}}"> <i class="fa fa-search  "></i> <b>All Houses</b></a>
</div>
<div class="row">
  <div class=" col-md-1 col-lg-1"></div>
  <div class="col-sm-12 col-md-10 col-lg-10">
   <div class="card text-center w3-text-blue">
    <div class="card-body w3-text-blue w3-yellow">
      <h4 class="card-title"> <b>House Details</b></h4> 
    </div>
    <form class="form-control" method="POST" action="{{ route('registerhouse') }}" enctype="multipart/form-data">
      {{ csrf_field() }}
      <br>
  <div class="row">
  <div class="col-12">

 
     <!-- Example DataTables Card-->




  <div class="card-body" >
<div class="row">
  <div class="col-md-6">
    <div class="w3-card w3-yellow">
    @foreach($house as $sta)
  <br><h2><b>Name : </b> {{$sta['name']}}</h2><br>
  
 </div> 
<br>
   <div class="w3-card w3-yellow">
    <br><h3><b>Vacancy  </b><h2>{{$sta['rentable']}}</h2></h3>
    <h3>{{$sta['type']}}</h3>
    <br>  
    
   

   </div> 
<br>
<div class="w3-card w3-yellow">
  <br> <h3><b>Country : </b>{{$sta['country']}}</h3>
  <h3><b>State : </b>{{$sta['state']}}</h3><br>
   </div>
 
   <br>
<div class="w3-card w3-yellow">
  <br><h3><b>Town : </b>{{$sta['town']}}</h3>
  <h3><b>Address : </b>{{$sta['address']}}</h3><br>
   </div>


</div>
  <div class="col-md-2">
   

  </div>
  <div class="col-md-4">
    
    <img src="{{asset('/houseimage/').'/'.$sta['imgpath']}}" )}}" class="img-responsive w3-circle w3-animate-zoom w3-hover-opacity" width="250px" height="250px" alt="staffimg"/>
 
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
