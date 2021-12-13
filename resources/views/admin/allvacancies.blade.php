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
      <h4><b>All Rentables</b></h4>
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
            <th>HOUSE</th>
            <th>VACANCY</th>
            <th>AMOUNT</th>
            <th>COUNTRY</th>
            <th>STATE</th>
            <th>TOWN</th>
            <th>STATUS</th>
            <!-- <th>ADDRESS</th>-->
            <th>ACTION</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>ID</th>
            <th>HOUSE</th>
            <th>VACANCY</th>
            <th>AMOUNT</th>
            <th>COUNTRY</th>
            <th>STATE</th>
            <th>TOWN</th>
            <th>STATUS</th>
            <!-- <th>ADDRESS</th>-->
            <th>ACTION</th>
          </tr>
        </tfoot>
        <tbody>
          <?php   $i = 1; ?>
          @foreach( $allvacancies as $ad)
          
          <tr>
           

            <form class="form" method="POST" action=""> 
              <input type="hidden" id= "token" name="_token" value="<?php echo csrf_token(); ?>">
              <td>{{$i}}</td>
              <td>{{ $ad['house']}}</td>
              <td>{{ $ad['name']}}</td>
              <td>{{ $ad['amount']}}</td>
              <td>{{ $ad['country']}}</td>
              <td>{{ $ad['state']}}</td>
              <td>{{ $ad['town']}}</td>
              <td>{{ $ad['status']}}</td>
              <td> <a class="btn btn-success " href="/admin/editvacancy/{{ $ad['id']}}" ><i class="fa fa-edit"></i><b>Edit</b></a></td>
            </form>                

          </tr>
          <?php   $i++; ?>
          
          @endforeach
        </tbody>
      </tbody>
    </table>
    
  </div>
</div>
<div class="card-footer small text-muted ">Record of all vacancies</div>
</div>
</div>
</div>
@endsection
