<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::view('/', 'auth.login');

Auth::routes([
    'register' => false,
]);



Route::middleware('auth')->group(function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::middleware('admin')->group(function () {
        Route::resource('companies', CompanyController::class)->parameters([
            'companies' => 'company:slug',
        ]);
        Route::resource('employees', EmployeeController::class)->except(['show']);
        Route::get('employees/{company:slug}', [EmployeeController::class, 'show'])->name('employees.show');
    });
});
