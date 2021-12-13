<?php

namespace App\Http\Controllers;
use Auth;
use App\Admin;
use App\House;
use App\Vacancy;
use App\Tenant;
use Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



class VacancyController extends Controller
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
    public function newvacancyform()
    {
     $houses = House::select('id','name')->get();
     return view('/admin/newvacancy')->with('houses',$houses); 

 }


 public function registervacancy()
 {
    //get all the data from the form.
     $data = Input::all();

     //set rules 
     $rules = array(
        'vacancyname' => 'required',
        'house_id' => 'required',
        'amount' => 'required','numeric',

    );

     //use the validator and the datas

     $validated = Validator::make($data,$rules);


     if ($validated->fails()) {
        return Redirect::back()->withErrors($validated)->withInput();
    }else{

        $others = House::select('name','country','state','town','address')
        ->where('id',Input::get('house_id'))->get();
        $admin = Session('username');
        $status = 'Empty';

  // check if the vacancy is not existing.......

        $vacname = trim(Input::get('vacancyname'));
        $vachouse = $others[0]['name'];
        $hid = Input::get('house_id');

  // now time to save to the database . .. ... .... .....

            $vacancy = new Vacancy;
            $vacancy->house_id = $hid;
            $vacancy->name = $vacname;
            $vacancy->house = $vachouse;
            $vacancy->amount= trim(Input::get('amount'));
            $vacancy->country=  $others[0]['country'];
            $vacancy->state=  $others[0]['state'];
            $vacancy->town=  $others[0]['town'];
            $vacancy->address=  $others[0]['address'];
            $vacancy->status = $status;
            $vacancy->admin = $admin;
            $vacancy->save();
            return Redirect::back()->with('success','New Vacancy record is added successfully');

        }
     
}

public function allvacancies()
{
    
  $vacancy = Vacancy::select('id','name','house','amount','country','state','town','status')->get();
  return view('/admin/allvacancies')->with('allvacancies',$vacancy);
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

public function editvacancy($vacancyid)
{

   $vacancies = Vacancy::select()->where('id',$vacancyid)->get();
   return view('admin.editvacancy')->with('vacancy',$vacancies);

}



public function updatevacancy()
{

    $vid =  Input::get('vid');
    $vacancies = Vacancy::find($vid);
    $vacancies->amount = trim(Input::get('amount'));
    $vacancies->status = Input::get('status');
    $vacancies->save();
    return $this->allvacancies();

    
}

}