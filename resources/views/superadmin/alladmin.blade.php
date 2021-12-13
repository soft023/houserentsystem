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

   <div class="row">
  <div class="col-12">

 
     <!-- Example DataTables Card-->
<div class="card mb-3" id="datatable">
<div class="card-header w3-yellow w3-text-blue text-center">
<h4><b>All Administrator</b></h4>
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
            <th>FIRST NAME</th>
            <th style="display:none"></th>
            <th>LAST NAME</th>
            <th>USERNAME</th>
            <th>DELETE</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
          <th>ID</th>
          <th>FIRST NAME</th>
          <th style="display:none"></th>
          <th>LAST NAME</th>
          <th>USERNAME</th>
          <th>DELETE</th>
          </tr>
        </tfoot>
        <tbody>
        <?php   $i = 1; ?>
     @foreach( $admins as $ad)
    
  
          <tr>
         

            <form class="form" method="POST" action=""> 
            <input type="hidden" id= "token" name="_token" value="<?php echo csrf_token(); ?>">
            <td>{{$i}}</td>
            <td> {{ $ad['firstname']}}</td>
            <td style="display:none">{{ $ad['id']}}</td>
            <td>{{ $ad['lastname']}}</td>
            <td>{{ $ad['username']}}</td>
            <td><button type="button" name="delete" class="btn btn-danger delete">Delete</button></td>
            </form>                
        
          </tr>
            <?php   $i++; ?>
        
          @endforeach
        </tbody>
      </table>
     
    </div>
  </div>
  <div class="card-footer small text-muted ">Record of All Administrator</div>
</div>
  </div>
</div>
@endsection
