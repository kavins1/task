
<?php


use Illuminate\Support\Facades\Route;
use Sparkout\User\app\Http\Controllers\StudentController;




Route::get('/post', function () {
    return view('welcome');
});


Route::resource('students', StudentController::class);
