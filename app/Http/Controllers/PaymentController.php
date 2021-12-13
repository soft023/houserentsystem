<?php

namespace App\Http\Controllers;

use Auth;
use App\Admin;
use App\Tenant;
use App\House;
use App\Guarantor;
use App\Rent;
use App\Vacancy;
use Redirect;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

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

$payment = Tenant::select('id','vacancy_id','name','amount','amountpaid','balance','rentstatus')->get();

return view('/admin/allpayment')->with('allpayment',$payment);
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

return view('/admin/incompletepayment')->with('allpayment',$tenant)->with('property',$property);


}



public function complete()
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
 ->where('paymentstatus',"completed")->get();
$property = Vacancy::select('name','house')->get();

return view('/admin/incompletepayment')->with('allpayment',$tenant)->with('property',$property);
}




////////////////////////////////////////////////////////////////////////////////////////////////


public function running()
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

$tenant = Tenant::select('id','vacancy_id','name','paymentstatus','expires')
 ->where('rentstatus',"Running")->get();
$property = Vacancy::select('name','house')->get();

return view('/admin/runningrent')->with('allpayment',$tenant)->with('property',$property);


}





public function expired()
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

$tenant = Tenant::select('id','vacancy_id','name','paymentstatus','expires')
 ->where('rentstatus',"Expired")->get();
$property = Vacancy::select('name','house')->get();

return view('/admin/expiredrent')->with('allpayment',$tenant)->with('property',$property);


}




public function allvacancies()
{
    
  $vacancy = Vacancy::select('id','name','house','amount','country','state','town','status')->get();
  return view('/admin/allvacancies')->with('allvacancies',$vacancy);
}





    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
