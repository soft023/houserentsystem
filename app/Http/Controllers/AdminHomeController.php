<?php

namespace App\Http\Controllers;

use App\Admin;
use Auth;
use App\House;
use App\Tenant;
use App\Vacancy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
class AdminHomeController extends Controller
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
    public function index()
    {
      
        $houses = House::select('id')->get();
        $house = count($houses);

        $tenants = Tenant::select('id')->get();
        $tenant = count($tenants);

        $vacancies = Vacancy::select('id')->get();
        $vacancy = count($vacancies);

        Session::put('numhouse', $house);
        Session::put('numtenant', $tenant);
        Session::put('numvacancy', $vacancy);

        // Session::put('numhouse', $house);
        // Session::put('numtenant', $tenant);
        // Session::put('numvacancy', $vacancy);

        return view('/adminhome');
    }


}
