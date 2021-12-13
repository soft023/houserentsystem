@extends ('layouts.mastermenu')
@section('title', 'Super Admin Dashboard')
@section('menu')
 <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="/home">
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
              <a href="/newadmin" class="w3-hover-red">New </a>
            </li>

            <li>
              <a href="/alladmin" class="w3-hover-red">All Admin</a>
            </li>

                        
          </ul>
        </li>
  


 <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
         <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMultix" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-link"></i>
            <span class="nav-link-text w3-hover-red" class="w3-hover-red">Report Management</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseMultix">
            <li>
              <a href="/dashboard/payroll" class="w3-hover-red">Payment</a>
            </li>
      <li>
              <a href="/dashboard/payslip" class="w3-hover-red">Houses</a>
            </li>
      
            <li>
              <a href="/dashboard/paymenthistory" class="w3-hover-red">Tenant</a>
            </li>
          </ul>
        </li>

      </ul>
      <ul class="navbar-nav ml-auto">
@endsection
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
          <h4 class="card-title"> <b>Administrator Registration Form</b></h4> 
        </div>
        <form class="form-control" method="POST" action="{{ route('adminregister') }}">
          {{ csrf_field() }}
          <br>
          <div class="row">
            <div class="col-sm-6 col-md-6 col-md-6">
              <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                <input id="firstname" type="text" style=" font-size:13pt; " class="form-control text-center" placeholder="First Name" name="firstname" value="{{ old('firstname') }}" required >

                @if ($errors->has('firstname'))
                <span class="help-block">
                  <strong>{{ $errors->first('firstname') }}</strong>
                </span>
                @endif            
              </div>
            </div>

            <div class="col-sm-6 col-md-6 col-md-6">
              <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
               <input id="lastname" type="text" style=" font-size:13pt;" class="form-control text-center" placeholder="Last Name" name="lastname" value="{{ old('lastname') }}" required>
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
             <input id="email" type="email" style="font-size:13pt;" class="form-control text-center" placeholder="Email Address" name="email" required>
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
            <input id="password" type="password" style=" font-size:13pt;" class="form-control text-center" placeholder="Password" name="password" required >

            @if ($errors->has('password'))
            <span class="help-block">
              <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif            
          </div>
        </div>

        <div class="col-sm-6 col-md-6 col-md-6">
          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
           <input id="password-confirm" type="password" style=" font-size:13pt;" class="form-control text-center" placeholder="Confirm Password" name="password_confirmation"  required> 
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
@endsection
