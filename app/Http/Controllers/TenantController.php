<?php

namespace App\Http\Controllers;
use Auth;
use App\Admin;
use App\Tenant;
use App\House;
use App\Guarantor;
use App\Rent;
use App\Vacancy;
use App\Allpayment;
use Redirect;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



class TenantController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin')->except('logout');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */


    //function to calculate expiry date of rent
    public function getExpirydate() 
    {
      $expires = Carbon::now();
      $expires->addYears(1);
      return $expires;
  }




  public function newtenantform()
  {
    $status ="Empty";
    $vacancy = Vacancy::select('id','house','name','town','state','country','amount')->where('status',$status)->get();
    return view('/admin/newtenant')->with('vacancy',$vacancy);
}


public function registertenant()
{
    //get all the data from the form.
 $data = Input::all();

     //set rules 
 $rules = array(
    'fname' => 'required',
    'mname' => 'required',
    'lname' => 'required',
    'country' => 'required',
    'state' => 'required',
    'town' => 'required',
    'address' => 'required',
    'phonenumber' => 'required',
    'religion' => 'required',
    'sex' => 'required',


    'gfname' => 'required',
    'gmname' => 'required',
    'glname' => 'required',
    'gaddress' => 'required',
    'relationship' => 'required',
    'gphonenumber' => 'required',



    'house' => 'required',
    'amountpaid' => 'required',
   

);

     //use the validator and the datas

 $validated = Validator::make($data,$rules);


 if ($validated->fails()) {
    return Redirect::back()->withErrors($validated)->withInput();
}else{
        //now time to save to the database
   $gname = Input::get('gfname') .' '. Input::get('gmname') .' '.Input::get('glname');

   $tenantname =  Input::get('fname') .' '. Input::get('mname') .' '.Input::get('lname');

   $status;

  

   $paid = Input::get('amountpaid');

   $duration = 1;
   $vid = Input::get('house');
   $vac = Vacancy::select('amount')->where('id',$vid)->get();
   $amount = $vac[0]['amount'];
   $balance = $amount - $paid;

   if( $amount == $paid){

       $status = "Completed";

   }else{

       $status = "Incomplete";

   }



   $tenant = Tenant::create([
       'vacancy_id' => Input::get('house'),
       'name' => $tenantname,
       'address' => Input::get('address'),
       'telephone' => Input::get('phonenumber'),
       'sex' => Input::get('sex'),
       'religion' => Input::get('religion'),
       'country' => Input::get('country'),
       'state' => Input::get('state'),
       'town' => Input::get('town'),
       'gname' => $gname,
       'gaddress' => Input::get('gaddress'),
       'relationship' => Input::get('relationship'),
       'gtelephone' => Input::get('gphonenumber'),
       'duration' => $duration,
       'amount' => $amount,
       'amountpaid' => $paid,
       'balance' => $balance,
       'paymentstatus' => $status,
       'rentstatus' => 'Running',
       'admin' => Session('username'),
       'expires' => $this->getExpirydate()

   ]);
   $tt = Vacancy::find(Input::get('house'));
   $tt->status = "Occupied";
   $tt->save();
    


  // Now it's time to save into the all payment table 

   $allpayment = Allpayment::create([

    'name' => $tenantname,
    'vacancy_id' => Input::get('house'),
    'amountpaid' => $paid

   ]);




   return Redirect::back()->with('success','New tenant record is added successfully');

}
// return ('123');
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


return view('/admin/alltenants')->with('alltenants',$tenant)->with('property',$property);
}



public function updatetenant($id)
{ 
   $tenant = Tenant::select()->where('id',$id)->get();
   return view('admin.edittenant')->with('tenant',$tenant);

   
//Updating the paymentstatus

}

public function updatetenantinfo()
{ 
   $tid = Input::get('tid');
   
//Updating the paymentstatus
   $tenant = Tenant::select('amount','amountpaid')->where('id',$tid)->get();
   $actualamount= $tenant[0]['amount'];
   $prevamount = $tenant[0]['amountpaid'];
   $amt = Input::get('amountpaid');
   $balance = $actualamount - $amt;
   $newpayment = $amt - $prevamount;
    
   $status;
   if( $actualamount == $amt){

       $status = "Completed";

   }else if ($actualamount > $amt){

      $status = "Incomplete";

      $tenantname = Input::get('name');
      $vacancy_id = Input::get('vacancy_id');

 //Inserting into all payment table incase the amount paid is updated.
    $allpayment = Allpayment::create([
    'name' => $tenantname,
    'vacancy_id' => $vacancy_id,
    'amountpaid' => $newpayment

   ]);


   }else{

     $Status = "Complicated";
   
   }

  
  
    
   $tenant = Tenant::find($tid);
   $tenant->paymentstatus = $status;
   $tenant->name = Input::get('name');
   $tenant->telephone = Input::get('telephone');
   $tenant->sex = Input::get('sex');
   $tenant->religion = Input::get('religion');
   $tenant->state = Input::get('state');
   $tenant->town = Input::get('town');
   $tenant->country = Input::get('country');
   $tenant->gname = Input::get('gname');
   $tenant->gaddress = Input::get('gaddress');
   $tenant->gtelephone = Input::get('gtelephone');
   $tenant->relationship = Input::get('relationship');
   $tenant->amountpaid = $amt;
   $tenant->balance = $balance;
   $tenant->save();


  

   return Redirect::back()->with('success','Tenant record is updated successfully');

}

public function viewtenant($id)
{

   $tenant = Tenant::select()->where('id',$id)->get();
   $property = Vacancy::select('name','house','address')->where('id',$id)->get();
   return view('admin.viewtenant')->with('tenant',$tenant)->with('property',$property);

}

public function renew($id)
{
   $tenant = Tenant::select()->where('id',$id)->get();
   $property = Vacancy::select('name','house','address')->where('id',$tenant[0]['vacancy_id'])->get();
   return view('admin.renewtenant')->with('tenant',$tenant)->with('property',$property);
}


public function renewrent()
{

   $tid = Input::get('tid');
   $status = Input::get('paymentstatus');
   $amountpaid = Input::get('amountpaid');
   $balance = Input::get('balance');
   $amount = Input::get('amount');
   $balance =  $amount - $amountpaid ;
   $amt = $balance + $amountpaid;
   $sta;

   if ($status=="Completed"){
      if( $amountpaid == $amount){
       $sta = "Completed";
   }else{

       $sta = "Incomplete";

   }
   $tenant = Tenant::find($tid);
   $tenant->amountpaid = $amountpaid;
   $tenant->balance = $balance;
   $tenant->paymentstatus = $sta;
   $tenant->expires = $this->getExpirydate();
   $tenant->save();

   //This is to insert the new payment from renewer to the all payment table 

    $allpayment = Allpayment::create([

    'name' => $tenantname,
    'vacancy_id' => Input::get('house'),
    'amountpaid' => $amountpaid,

   ]);



  return Redirect::back()->with('success','Tenant rent is renewed successfully');


}else{
  return Redirect::back()->with('failure','Tenant previous payment not completed !'); 
}
}





}