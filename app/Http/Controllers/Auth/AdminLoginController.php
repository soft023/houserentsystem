<?php

namespace App\Http\Controllers\Auth;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Validator;
use Session;


class AdminLoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/adminhome';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }

      public function showloginForm()
    {
        return view('auth.adminlogin');
    }



       //logout function
    public function logout(){
        Auth::guard('admin')->logout();      
       return Redirect('/adminlogin');
   }


    //THIS IS THE LOGIN PROCESSING FUNCTION
    public function login()
    {
       
        $data = Input::all();
        $rule = array(     
              'username' => 'required',
              'password' => 'required|min:6'     
            );
            
        $validator = Validator::make($data,$rule);
        if ($validator->fails()){

            return Redirect::to('adminlogin')->withErrors($validator);
        }else{
       
        if (Auth::guard('admin')->attempt(['username' =>Input::get('username'),'password' =>Input::get('password')],Input::get('remember'))){  
        $fname= Admin::select('firstname')->where('username',Input::get('username'))->get();
        return view('adminhome')->with(session([
          'user'=> $fname[0]['firstname'],
          'username'=> Input::get('username')
      ])); 
        
        }

        $input = Input::except('password');
        return redirect()
        ->back()
        ->withInput($input)
        ->with('error','These credentials do not match our records.');
    }

    }








}
