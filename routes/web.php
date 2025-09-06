<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowerController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});


Route::post('userlogin',[UserController::class,'login'])->name('userlogin');

Route::get('/mydashboard', function () {
    return view('dashboard');
}); 

Route::resource('books', BookController::class);
Route::resource('borrowers', BorrowerController::class);
Route::resource('students', StudentController::class);
Route::resource('users', UserController::class);

Route::post('logout', [UserController::class,'logout'])->name('logout');
Route::post('login', [StudentController::class,'login'])->name('login');

 



