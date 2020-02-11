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

Auth::routes(['register'=>false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>['auth','admin']],function(){
    Route::get('/admin', function () {
        return view('admin.dashboard');
    });
    Route::get('/companies', 'CompanyController@index')->name('companies');
    Route::post('/companies/store', 'CompanyController@store')->name('companiesStore');
    Route::post('/companies/edit', 'CompanyController@update')->name('companiesEdit');
    Route::get('/companies/delete/{id}', 'CompanyController@destroy');
    
    Route::post('/employee/store', 'EmployeeController@store')->name('employeeStore');
    Route::post('/employee/edit', 'EmployeeController@update')->name('employeeEdit');
    Route::get('/employee/delete/{id}', 'EmployeeController@destroy');
});

