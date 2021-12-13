<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Property Manager Login</title>

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
        <div class="col-lg-4 col-md-6  ">

        </div>
        <div class="col-lg-4 col-md-6 ">
         
          <div class="card text-center">
  <div class="card-body w3-text-blue">
    <h4 class="card-title">Property Manager Login</h4>

    </div>
    <h5 class="card-subtitle  text-muted">Username</h5>
  
  <form class="form" method="POST" action="/adminhome"> 
          <div class="form-group">
            <div class="form-row">
     @if(Session::has('error'))
     <div class="col-sm-12 col-md-12 col-lg-12 ">
     <h6 class="w3-text-red">{{Session::get('error')}} </h6>
     </div>
     @endif
              <div class="col-sm-12 col-md-12 col-lg-12">
                <input class="form-control text-center" style=" font-size:13pt;" name="username" type="text" aria-describedby="textHelp" value="" placeholder="Enter your username" required autofocus>
                <!-- This line is use to check if there is an error n echo the error-->
                @if($errors->has('username'))
                <p class= "w3-text-red">{{$errors->first('username')}}</p> 
                @endif
              </div>
            </div>
          </div>

<h5 class="card-subtitle text-muted">Password</h5>


          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <input class="form-control text-center" name="password" type="password" aria-describedby="textHelp" placeholder="Enter your password" required>
                <!-- This line is use to check if there is an error n echo the error-->
                @if($errors->has('password'))
                <p class= "w3-text-red">{{$errors->first('password')}}</p> 
                @endif
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-4">
                <div class="checkbox w3-text-black">
                  <label>
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me</label>
                  </div>
                </div>
                  <div class="col-md-8">
                </div>
              </div>
            </div>


            <br>






            <div class="form-group">
              <div class="form-row">
                <div class="col-md-12">
                  <button type="submit" class="btn btn-success btn-block" style="font-size : 18px;" name="submit">Log in</button>
                  <br><br>
                </div>
              </div>
            </div>
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

        
          </form>
</div>
        


          </div>
    

        <div class="col-lg-4 col-md-6">
          
        </div>
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
