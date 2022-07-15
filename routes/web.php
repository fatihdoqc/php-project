<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/users', [UserController::class, 'userList']);
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');


Route::get('/add-company' , [CompanyController::class , 'addCompany'])->name('company.add');
Route::get('list' , [CompanyController::class , 'list'])->name('list');
Route::get('/edit-company/{id}' , [CompanyController::class , 'editCompany'])->name('company.edit');
Route::get('/delete-company/{id}' , [CompanyController::class , 'deleteCompany'])->name('company.delete');

Route::get('/save-company' , [CompanyController::class , 'saveCompany'])->name('company.save');
Route::put('update-company/{id}' , [CompanyController::class , 'updateCompany'])->name('company.update');

Route::get('/add-employee' , [EmployeeController::class , 'addEmployee'])->name('employee.add');
Route::put('save-employee' , [EmployeeController::class , 'saveEmployee'])->name('employee.update');

Route::get('/edit-employee/{id}' , [EmployeeController::class , 'editEmployee'])->name('employee.edit');
Route::put('update-employee/{id}' , [EmployeeController::class , 'updateEmployee'])->name('employee.update');

Route::get('/delete-employee/{id}' , [EmployeeController::class , 'deleteEmployee'])->name('employee.delete');

