<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});
	

Auth::routes();
Route::get('/superadmin/home', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/adminhome', 'AdminHomeController@index')->name('adminhome');
//===================================================================================


Route::get('/adminlogin', 'Auth\AdminLoginController@showloginform')->name('adminlogin');
Route::post('/adminhome', 'Auth\AdminLoginController@login');
Route::post('/logout2', 'Auth\AdminLoginController@logout')->name('logout2');
//-------------------------------------------------------------------------------
Route::get('/newhouse', 'AdminController@newhouseform')->name('newhouse');
Route::get('/admin/viewhouse/{houseid}', 'AdminController@viewhousedetails')->name('viewhouse');
Route::get('/admin/edithouse/{houseid}', 'AdminController@edithouse')->name('edithouse');
Route::get('/allhouses', 'AdminController@allhouses')->name('allhouses');
Route::post('/registerhouse', 'AdminController@registerhouse')->name('registerhouse');
Route::post('/updatehouse', 'AdminController@updatehouse')->name('updatehouse');
//-----------------------------------------------------------------------------------------
Route::get('/admin/newvacancy', 'VacancyController@newvacancyform')->name('newvacancy');
Route::post('/registervacancy', 'VacancyController@registervacancy')->name('registervacancy');
Route::get('/admin/allvacancies', 'VacancyController@allvacancies')->name('allvacancies');
Route::get('/admin/editvacancy/{vacancyid}', 'VacancyController@editvacancy')->name('editvacancy');
Route::post('/updatevacancy', 'VacancyController@updatevacancy')->name('updatevacancy');

//======================================================================================
Route::get('/admin/newtenant', 'TenantController@newtenantform')->name('newtenant');
Route::post('/registertenant', 'TenantController@registertenant')->name('registertenant');
Route::get('/admin/alltenant', 'TenantController@alltenants')->name('alltenant');
Route::get('/admin/edittenant/{id}', 'TenantController@updatetenant')->name('updatetenant');
Route::get('/admin/viewtenant/{id}', 'TenantController@viewtenant')->name('viewtenant');
Route::get('/admin/renewtenant/{id}', 'TenantController@renew')->name('renewtenant');
Route::post('/updatetenant', 'TenantController@updatetenantinfo')->name('updatetenantinfo');
Route::post('/renewrent', 'TenantController@renewrent')->name('renewrent');

//=======================================================================================

Route::get('/admin/allpayment', 'PaymentController@allpayment')->name('allpayment');
Route::get('/admin/incomplete', 'PaymentController@incomplete')->name('incomplete');
Route::get('/admin/complete', 'PaymentController@complete')->name('complete');
Route::get('/admin/running', 'PaymentController@running')->name('running');
Route::get('/admin/expired', 'PaymentController@expired')->name('expired');
//Route::get('/admin/viewtenant/{id}', 'TenantController@viewtenant')->name('viewtenant');



//============SUPER ADMIN==============================================================================
Route::get('/dashboard/superadmin/alladmin', 'HomeController@alladmin')->name('alladmin');
Route::get('/dashboard/superadmin/newadmin', 'HomeController@showRegistrationForm')->name('adminregisterform');
Route::get('/dashboard/superadmin/allhouses', 'HomeController@allhouses')->name('superadminallhouses');
Route::get('/dashboard/superadmin/allvacancies', 'HomeController@allvacancies')->name('superadminallvacancies');
Route::get('/dashboard/superadmin/alltenants', 'HomeController@alltenants')->name('superadminalltenants');
Route::get('/dashboard/superadmin/alldebtors', 'HomeController@incomplete')->name('superadminincomplete');
Route::get('/dashboard/superadmin/allpayment', 'HomeController@allpayment')->name('superadminallpayment');




Route::post('/deleteadmin', 'HomeController@delete')->name('delete');
Route::post('/adminregister', 'HomeController@register')->name('adminregister');
Route::post('/superadmin/deletehouse', 'HomeController@deletehouse')->name('superdeletehouse');
Route::post('/superadmin/deletevacancy', 'HomeController@deletevacancy')->name('superdeletevacancy');



Route::get('/superadmin/viewhouse/{houseid}', 'HomeController@viewhousedetails')->name('superviewhouse');
Route::get('/superadmin/viewtenant/{id}', 'HomeController@viewtenant')->name('superviewtenant');
Route::get('/superadmin/viewdebtor/{id}', 'HomeController@viewdebtor')->name('superviewdebtor');
