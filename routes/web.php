<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Jobs\SendEmailJob;
use Carbon\Carbon;

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

Route::resource('students', StudentController::class);

Route::get('login',[UserAuthController::class,'login']);

Route::get('register',[UserAuthController::class,'register']);

Route::post('create',[UserAuthController::class,'create'])->name('auth.create');  

Route::post('check',[UserAuthController::class,'check'])->name('auth.check');  

Route::get('post',[UserAuthController::class,'post']);

Route::get('customer',[CustomerController::class,'index']);

Route::get('view',[HomeController::class,'view']);

Route::post('import',[HomeController::class,'import']);

Route::get('export',[HomeController::class,'export']);