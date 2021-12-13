<?php

namespace App\Http\Controllers;


use Auth;
use App\Admin;
use App\Allpayment;
use App\Tenant;
use App\House;
use App\Guarantor;
use App\Rent;
use App\Vacancy;
use Redirect;
use Carbon\Carbon;
use Session;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;




class HomeController extends Controller
{


    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/superadmin/home';


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
      
    {

        $admins= Admin::select('id')->get();
        $admin = count($admins);

        $houses = House::select('id')->get();
        $house = count($houses);

        $tenants = Tenant::select('id')->get();
        $tenant = count($tenants);

        $vacancies = Vacancy::select('id')->get();
        $vacancy = count($vacancies);

        Session::put('numhouse', $house);
        Session::put('numtenant', $tenant);
        Session::put('numvacancy', $vacancy);
        Session::put('numadmin', $admin);

      return  view('superadmin.home');
    

    }


    public function alladmin()
    {

    $admins =  Admin::select('id','firstname','lastname','username')->get() ;
    return view('superadmin.alladmin')->with('admins',$admins);

    }

public function delete(request $request)
{
    $id = $request->id;
    Admin::find($id)->delete();
    return 'Admin has been deleted sucessfully';
}

  public function showRegistrationForm()
    {
        return view('superadmin.newadmin');
    }



    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

       // $this->guard('admin')->login($user);

         return back()->with('success','Your new Administrator registration is successful');
       
    }



    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return Admin::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }


    protected function guard()
    {
        return Auth::guard('admin');
    }


    public function redirectPath()
    {
        if (method_exists($this, 'redirectTo')) {
            return $this->redirectTo();
        }

        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/';
    }



 public function allpayment()
{
  $tenantid = Tenant::select('id')->get();
  $tid = count($tenantid);
  $tenantex = Tenant::select('expires')->get();
  $now = Carbon::now();

  for ($i=0; $i < $tid; $i++) { 
      if ( $tenantex[$i]['expires']  > $now ) {

       $tt = Tenant::find($i + 1 );
       $tt->rentstatus = "Running";
       $tt->save();

   }else{

       $tt = Tenant::find($i + 1);
       $tt->rentstatus = "Expired";
       $tt->save();
   }

}

$payment = Allpayment::select('id','vacancy_id','name','amountpaid','created_at')->get();

return view('/superadmin/allpayment')->with('allpayment',$payment);
}







public function incomplete()
{
  $tenantid = Tenant::select('id')->get();
  $tid = count($tenantid);
  $tenantex = Tenant::select('expires')->get();
  $now = Carbon::now();

  for ($i=0; $i < $tid; $i++) { 
      if ( $tenantex[$i]['expires']  > $now ) {

       $tt = Tenant::find($i + 1 );
       $tt->rentstatus = "Running";
       $tt->save();

   }else{

       $tt = Tenant::find($i + 1);
       $tt->rentstatus = "Expired";
       $tt->save();
   }

}

$tenant = Tenant::select('id','vacancy_id','name','amount','amountpaid','balance','rentstatus')
 ->where('paymentstatus',"Incomplete")->get();
$property = Vacancy::select('name','house')->get();

return view('/superadmin/alldebtors')->with('allpayment',$tenant)->with('property',$property);


}




public function alltenants()
{
  $tenantid = Tenant::select('id')->get();
  $tid = count($tenantid);
  $tenantex = Tenant::select('expires')->get();
  $now = Carbon::now();

  for ($i=0; $i < $tid; $i++) { 
      if ( $tenantex[$i]['expires']  > $now ) {

       $tt = Tenant::find($i + 1 );
       $tt->rentstatus = "Running";
       $tt->save();

   }else{

       $tt = Tenant::find($i + 1);
       $tt->rentstatus = "Expired";
       $tt->save();
   }

}

$tenant = Tenant::select('id','vacancy_id','name','telephone','paymentstatus','rentstatus','expires')->get();
$property = Vacancy::select('name','house')->get();


return view('/superadmin/alltenants')->with('alltenants',$tenant)->with('property',$property);
}






public function allvacancies()
{
    
  $vacancy = Vacancy::select('id','name','house','amount','country','state','town','status')->get();
  return view('/superadmin/allvacancies')->with('allvacancies',$vacancy);
}



public function allhouses()
{
  $houses = House::select('id','name','country','type','state','town','rentable','status','admin')->get();
  return view('/superadmin/allhouses')->with('houses',$houses);
}


public function deletehouse(request $request)
{
    $id = $request->id;
    House::find($id)->delete();
    return Redirect::back()->with('message1','Deleted successfully');

}

public function deletevacancy(request $request)
{
    $id = $request->vid;
    Vacancy::find($id)->delete();
    return Redirect::back()->with('message1','Deleted successfully');

}


public function viewhousedetails($houseid)
{
 
 $house = House::select()->where('id',$houseid)->get();
 return view('superadmin.viewhouse')->with('house',$house);

 
}
   

   public function viewtenant($id)
{

   $tenant = Tenant::select()->where('id',$id)->get();
   $property = Vacancy::select('name','house','address')->where('id',$id)->get();
   return view('superadmin.viewtenant')->with('tenant',$tenant)->with('property',$property);

}

   public function viewdebtor($id)
{

   $tenant = Tenant::select()->where('id',$id)->get();
   $property = Vacancy::select('name','house','address')->where('id',$id)->get();
   return view('superadmin.viewdebtor')->with('tenant',$tenant)->with('property',$property);

}

}
