@extends ('layouts.mastermenu')
@section('title', 'Super Admin Dashboard')
@section('menu')
 <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="/superadmin/home">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text w3-hover-red">Dashboard</span>
          </a>
        </li>
       
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text w3-hover-red">Admin Management</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            
            <li>
              <a href="/dashboard/newadmin" class="w3-hover-red">New </a>
            </li>

            <li>
              <a href="/dashboard/alladmin" class="w3-hover-red">All Admin</a>
            </li>
          </ul>
                
  


<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
 <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMultx" data-parent="#exampleAccordion">
  <i class="fa fa-fw fa-link"></i>
  <span class="nav-link-text w3-hover-red" class="w3-hover-red">Report Management</span>
</a>
<ul class="sidenav-second-level collapse" id="collapseMultx">
  <li>
    <a href="/dashboard/allhouses" class="w3-hover-red">All Houses</a>
  </li>
  <li>
    <a href="/dashboard/allvacancies" class="w3-hover-red">All Vacancies</a>
  </li>
  <li>
    <a href="/dashboard/alltenants" class="w3-hover-red">All Tenants</a>
  </li>
  <li>
    <a href="/dashboard/alldebtors" class="w3-hover-red">All Debtors</a>
  </li>
  <li>
    <a href="/dashboard/allpayment" class="w3-hover-red">All Payment</a>
  </li>
 
</ul>
</li>

      </ul>
      <ul class="navbar-nav ml-auto">
@endsection
@section('maincontent')
 <div class="row">

  <div class="col-xl-3 col-sm-6 mb-3">
    <div class="card text-white bg-danger o-hidden h-100">
      <div class="card-body">
        <div class="card-body-icon">
          <i class="fa fa-fw fa-support"></i>
        </div>
        <div class="mr-5">Total Number Of Houses - {{session('numhouse')}} </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6 mb-3">
    <div class="card text-white bg-success o-hidden h-100">
      <div class="card-body">
        <div class="card-body-icon">
          <i class="fa fa-fw fa-shopping-cart"></i>
        </div>
       
        <div class="mr-5">Total Number Of Vacancy - {{session('numvacancy')}}</div>
       
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6 mb-3">
    <div class="card text-white bg-primary o-hidden h-100">
      <div class="card-body">
        <div class="card-body-icon">
          <i class="fa fa-fw fa-comments"></i>
        </div>
        <div class="mr-5">Total Number of Tenant - {{session('numtenant')}} </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6 mb-3">
    <div class="card text-white bg-warning o-hidden h-100">
      <div class="card-body">
        <div class="card-body-icon">
          <i class="fa fa-fw fa-list"></i>
        </div>
        <div class="mr-5">Total Number Of Admin -  {{session('numadmin')}}</div>
      </div>
    </div>
  </div>

</div>
@endsection
