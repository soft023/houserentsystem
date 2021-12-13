<?php

namespace App\Http\Controllers;
use Auth;
use App\Admin;
use App\House;
use Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



class AdminController extends Controller
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
    public function newhouseform()
    {
        return view('/admin/newhouse');
    }


    public function registerhouse()
    {
    //get all the data from the form.
       $data = Input::all();
       
     //set rules 
       $rules = array(
        'housename' => 'required',
        'housetype' => 'required',
        'country' => 'required',
        'state' => 'required',
        'address' => 'required',
        'town' => 'required'
    );

     //use the validator and the datas

       $validated = Validator::make($data,$rules);


       if ($validated->fails()) {
        return Redirect::back()->withErrors($validated)->withInput();
    }else{

     $tit1 = date("H");
     $tit2 = date("i");
     $tit3 = date("s");
     $timm = $tit1.$tit2.$tit3;
     $filenam = Input::file('housepicture')->getClientOriginalName();

     $filename = $timm.$filenam;
     $admin = Session('username');
     $status = 'Active';

        //now time to save to the database

     $house = new House;
     $house->name = Input::get('housename');
     $house->type = Input::get('housetype');
     $house->country = Input::get('country');
     $house->state = Input::get('state');
     $house->town = Input::get('town');
     $house->address = Input::get('address');
     $house->rentable = Input::get('rentable');
     $house->imgpath = $filename;
     $house->status = $status;
     $house->admin = $admin;
     $house->save();
     Input::file('housepicture')->move(public_path('houseimage'),$filename);
     return Redirect::back()->with('success','New house record is added successfully');

 }

}

public function allhouses()
{
  $houses = House::select('id','name','country','type','state','town','rentable','status','admin')->get();
  return view('/admin/allhouses')->with('houses',$houses);
}


public function edithouse($houseid)
{ 
 
 $house = House::select()->where('id',$houseid)->get();
 return view('admin.edithouse')->with('house',$house);

}

public function viewhousedetails($houseid)
{
 
 $house = House::select()->where('id',$houseid)->get();
 return view('admin.viewhouse')->with('house',$house);
 
}

public function updatehouse()
{

    $houseid = Input::get('houseid');
    House::find($houseid)->update(Input::all());

    $filenam = Input::file('housepicture');
    if ($filenam != ""){
     $filenam = Input::file('housepicture')->getClientOriginalName();
     $tit1 = date("H");
     $tit2 = date("i");
     $tit3 = date("s");
     $timm = $tit1.$tit2.$tit3;
     $filename = $timm.$filenam;
     


     
     $house = House::find($houseid);
     $house->imgpath = $filename;
     $house->save();
     Input::file('housepicture')->move(public_path('houseimage'),$filename);
 }

 return $this->allhouses();

}


}