<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>@yield('title')</title>
  <!-- Bootstrap core CSS-->
  <script language="JavaScript"  src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>

  <link href="../../myassetx/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="../../myassetx/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="../../myassetx/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="../../myassetx/css/sb-admin.css" rel="stylesheet">
  <link rel="stylesheet" href="../../css/w3.css">
  <link rel="stylesheet" href="../../css/mystyle.css">
</head>

<body class="fixed-nav sticky-footer bg-primary " id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="/"><strong class="w3-text-yellow  w3-hover-opacity">Cas Habitat </strong></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
   
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
              <a href="/dashboard/superadmin/newadmin" class="w3-hover-red">New </a>
            </li>

            <li>
              <a href="/dashboard/superadmin/alladmin" class="w3-hover-red">All Admin</a>
            </li>
          </ul>
                
  


<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
 <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMultx" data-parent="#exampleAccordion">
  <i class="fa fa-fw fa-link"></i>
  <span class="nav-link-text w3-hover-red" class="w3-hover-red">Report Management</span>
</a>
<ul class="sidenav-second-level collapse" id="collapseMultx">
  <li>
    <a href="/dashboard/superadmin/allhouses" class="w3-hover-red">All Houses</a>
  </li>
  <li>
    <a href="/dashboard/superadmin/allvacancies" class="w3-hover-red">All Vacancies</a>
  </li>
  <li>
    <a href="/dashboard/superadmin/alltenants" class="w3-hover-red">All Tenants</a>
  </li>
  <li>
    <a href="/dashboard/superadmin/alldebtors" class="w3-hover-red">All Debtors</a>
  </li>
  <li>
    <a href="/dashboard/superadmin/allpayment" class="w3-hover-red">All Payment</a>
  </li>
 
</ul>
</li>

      </ul>
      <ul class="navbar-nav ml-auto">

        <li class="nav-item">
        
             <a href="/logout" class="nav-link w3-text-white w3-hover-red" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
             <b>Hi
              {{ Auth::user()->firstname }},
              <i class="fa fa-fw fa-sign-out"></i><em>Logout</em</b></a> 
              
        </li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
        </form>
      </ul>
    </em></b>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid ">
      <!-- content goes here -->
      
      @yield('maincontent')
    
      
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->

    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center w3-text-white">

          <h6>Usability Consulting Limited © 2018</h6>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
   
  
    
   
    <!-- Bootstrap core JavaScript-->
  
    <script type="text/javascript" src="../../myassetx/vendor/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="../../myassetx/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="../../myassetx/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="../../myassetx/vendor/chart.js/Chart.min.js"></script>
    <script src="../../myassetx/vendor/datatables/jquery.dataTables.js"></script>
    <script src="../../myassetx/vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="../../myassetx/js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="../../myassetx/js/sb-admin-datatables.min.js"></script>
    <script src="../../myassetx/js/sb-admin-charts.min.js"></script>
    
<script type="text/javascript" src="../../myassetx/vendor/jquery/myjs.js"></script>

  </div>
</body>

</html>
