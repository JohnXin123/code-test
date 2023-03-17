<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/login', 'AuthController@loginPage')->name('login');
Route::post('/authenticate', 'AuthController@authenticate')->name('authenticate');

Route::middleware(['auth'])->group(function () {

    Route::get('/home', function () {
        return view('home');
    });

    Route::get('/logout', 'AuthController@logout')->name('logout');
    
    Route::get('/employee', 'EmployeeController@index')->name('employee.index');
    Route::get('/employee/create', 'EmployeeController@create')->name('employee.create');
    Route::post('/employee/create', 'EmployeeController@store')->name('employee.store');
    Route::get('/employee/{id}/edit', 'EmployeeController@edit')->name('employee.edit');
    Route::put('/employee/{id}/edit', 'EmployeeController@update')->name('employee.update');
    Route::delete('/employee/{id}/delete', 'EmployeeController@destroy')->name('employee.destroy');

    Route::get('/company', 'CompanyController@index')->name('company.index');
    Route::get('/company/create', 'CompanyController@create')->name('company.create');
    Route::post('/company/create', 'CompanyController@store')->name('company.store');
    Route::get('/company/{id}/edit', 'CompanyController@edit')->name('company.edit');
    Route::put('/company/{id}/edit', 'CompanyController@update')->name('company.update');
    Route::delete('/company/{id}/delete', 'CompanyController@destroy')->name('company.destroy');
});

