<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Super Admin Registration Page</title>

  <!-- Bootstrap Core CSS -->
  <link rel="stylesheet" href="css/w3.css">
  <link rel="stylesheet" href="css/mystyle.css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <script src="vendor/jquery/jquery.min.js"></script>
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="myasset2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Custom Fonts -->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
  <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="css/stylish-portfolio.min.css" rel="stylesheet">

</head>

<body id="page-top">
  <!-- Navigation -->
  <a class="menu-toggle rounded" href="#">
    <i class="fa fa-bars"></i>
  </a>
  <nav id="sidebar-wrapper">
    <ul class="sidebar-nav">
      <li class="sidebar-brand">
        <a class="js-scroll-trigger" href="#page-top">Menu</a>
      </li>
      <li class="sidebar-nav-item">
        <a class="js-scroll-trigger" href="/">Home</a>
      </li>
      <li class="sidebar-nav-item">
        <a class="js-scroll-trigger" href="/adminlogin">Admin</a>
      </li>
      <li class="sidebar-nav-item">
        <a class="js-scroll-trigger" href="/login">Super Admin</a>
      </li>
      <li class="sidebar-nav-item">
        <a class="js-scroll-trigger" href="#portfolio">Help</a>
      </li>
      <li class="sidebar-nav-item">
        <a class="js-scroll-trigger" href="#contact">About</a>
      </li>
    </ul>
  </nav>

  <!-- Header -->

  <section class="content-section bg-primary text-white text-center" id="services">
    <div class="container">
     <div class="row">
      <div class="col-lg-4 col-md-6  "> </div>
      <div class="col-lg-4 col-md-6  ">
        <a href="/" style="text-decoration:none"><h3 class="text-secondary w3-text-blue w3-hover-blue"> Cas Habitat</h3></a>
        
      </div>
      
      <div class="col-lg-4 col-md-6  "></div>
    </div>

    <div class="row">
      <div class=" col-md-1 col-lg-1"></div>
      <div class="col-sm-12 col-md-10 col-lg-10">
       <div class="card text-center w3-text-blue">
        <div class="card-body w3-text-blue">
          <h4 class="card-title">Super Administrator Registration Form</h4> 
        </div>
        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
          {{ csrf_field() }}
          <br>
          <div class="row">
            <div class="col-sm-6 col-md-6 col-md-6">
              <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                <input id="firstname" type="text" style=" font-size:13pt;" class="form-control text-center" placeholder="First Name" name="firstname" value="{{ old('firstname') }}" required >

                @if ($errors->has('firstname'))
                <span class="help-block">
                  <strong>{{ $errors->first('firstname') }}</strong>
                </span>
                @endif            
              </div>
            </div>

            <div class="col-sm-6 col-md-6 col-md-6">
              <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
               <input id="lastname" type="text" style=" font-size:13pt;"class="form-control text-center" placeholder="Last Name" name="lastname" value="{{ old('lastname') }}" required>
               @if ($errors->has('lastname'))
               <span class="help-block">
                 <strong>{{ $errors->first('lastname') }}</strong>
               </span>
               @endif
             </div>
           </div>



         </div>
         <br>
         <div class="row">
          <div class="col-sm-6 col-md-6 col-md-6">
            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
              <input id="username" type="text" style=" font-size:13pt;" class="form-control text-center" placeholder="Username" name="username" value="{{ old('username') }}" required >

              @if ($errors->has('username'))
              <span class="help-block">
                <strong>{{ $errors->first('username') }}</strong>
              </span>
              @endif            
            </div>
          </div>

          <div class="col-sm-6 col-md-6 col-md-6">
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
             <input id="email" type="email" style=" font-size:13pt;" class="form-control text-center" placeholder="Email Address" name="email" value="{{ old('email') }}" required>
             @if ($errors->has('email'))
             <span class="help-block">
               <strong>{{ $errors->first('email') }}</strong>
             </span>
             @endif
           </div>
         </div>



       </div>

       <br>
       <div class="row">
        <div class="col-sm-6 col-md-6 col-md-6">
          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <input id="password" type="password" style=" font-size:13pt;" class="form-control text-center" placeholder="Password" name="password" value="{{ old('password') }}" required >

            @if ($errors->has('password'))
            <span class="help-block">
              <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif            
          </div>
        </div>

        <div class="col-sm-6 col-md-6 col-md-6">
          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
           <input id="password-confirm" type="password" style=" font-size:13pt;" class="form-control text-center" placeholder="Confirm Password" name="password_confirmation" value="{{ old('email') }}" required> 
         </div>
       </div>



     </div>
     <br>
     <div class="row">
      <div class="col-sm-4 col-md-4 col-md-4"></div>
      <div class="col-sm-4 col-md-4 col-md-4">
        <button type="submit" class="btn btn-lg btn-success">
          Register
        </button>
        <br>
        <br>
      </div>
      <div class="col-sm-4 col-md-4 col-md-4"></div>

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
</div>

</section>



<!-- Footer -->
<footer class="footer text-center">
  <div class="container">
    <ul class="list-inline mb-5">
      <li class="list-inline-item">
        <a class="social-link rounded-circle text-white mr-3" href="#">
          <i class="icon-social-facebook"></i>
        </a>
      </li>
      <li class="list-inline-item">
        <a class="social-link rounded-circle text-white mr-3" href="#">
          <i class="icon-social-twitter"></i>
        </a>
      </li>
      <li class="list-inline-item">
        <a class="social-link rounded-circle text-white" href="#">
          <i class="icon-social-github"></i>
        </a>
      </li>
    </ul>
    <p class="text-muted small mb-0">Copyright &copy; Usability Consulting Limited 2018</p>
  </div>
</footer>

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded js-scroll-trigger" href="#page-top">
  <i class="fa fa-angle-up"></i>
</a>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for this template -->
<script src="js/stylish-portfolio.min.js"></script>

</body>

</html>
