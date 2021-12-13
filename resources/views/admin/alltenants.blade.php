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
  <div class="col-12">
   <!-- Example DataTables Card-->
   <div class="card mb-3" id="datatable">
    <div class="card-header w3-yellow w3-text-blue text-center">
      <h4><b>All Tenants</b></h4>
      @if (session('message1'))
      <div class="alert alert-danger">
       {{ session('message1') }}
     </div>
     @endif

     @if (session('message'))
     <div class="alert alert-success">
       {{ session('message') }}
     </div>
     @endif

     
   </div>


   <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ID</th>
            <th>PROPERTY</th>
            <th>OCCUPANT</th>
            <th>TELEPHONE</th>
            <th>STATUS</th>
            <th>PAYMENT</th>
            <th>ACTION</th>
            <th>ACTION</th>
            <th>ACTION</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
           <th>ID</th>
           <th>PROPERTY</th>
            <th>OCCUPANT</th>
            <th>TELEPHONE</th>
            <th>STATUS</th>
            <th>PAYMENT</th>
            <th>ACTION</th>
            <th>ACTION</th>
            <th>ACTION</th>
          </tr>
        </tfoot>
        <tbody>
          <?php   
          $i = 1;
          ?>
          @foreach( $alltenants as $ad)
          
          <tr>
           

            <form class="form" method="POST" action=""> 
              <input type="hidden" id= "token" name="_token" value="<?php echo csrf_token(); ?>">
              <td>{{$i}}</td>
              <td>{{ $property[$ad['vacancy_id'] - 1]['house'] }}, {{ $property[$ad['vacancy_id'] - 1]['name'] }}</td>
              <td>{{ $ad['name']}}</td>
              <td>{{ $ad['telephone']}}</td>
              <td>{{ $ad['rentstatus']}}</td>
              <td>{{ $ad['paymentstatus']}}</td>
              <td> <a class="btn btn-danger " href="/admin/edittenant/{{ $ad['id']}}" ><i class="fa fa-edit"></i><b>Update</b></a></td>
              <td> <a class="btn btn-primary " href="/admin/viewtenant/{{ $ad['id']}}" ><i class="fa fa-search"></i><b>View</b></a></td>
              <td> <a class="btn btn-success " href="/admin/renewtenant/{{ $ad['id']}}" ><i class="fa fa-edit"></i><b>Renew</b></a></td>
            </form>                

          </tr>
          <?php   
          $i++; 
          ?>
          
          @endforeach
        </tbody>
      </tbody>
    </table>
    
  </div>
</div>
<div class="card-footer small text-muted ">Record of all tenants</div>
</div>
</div>
</div>
@endsection
