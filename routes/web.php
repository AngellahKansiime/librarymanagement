<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowerController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use App\Models\Student;

// Route::get('/', function () {
//     return view('welcome');
// });


// Landing page
Route::get('/', function () {
    return view('firstpage');
})->name('landing');

// student login
Route::get('student/login', [StudentController::class, 'showlogin'])->name('login');
Route::post('st/studentlogin', [StudentController::class,'login'])->name('studentlogin');
Route::post('admin/logout', [StudentController::class, 'logout'])->name('admin.logout');

// admin login
Route::get('welcome', [UserController::class, 'showLoginForm'])->name('adminlogin');
Route::get('firstpage', [UserController::class,'logout'])->name('logout');
Route::post('userlogin',[UserController::class,'login'])->name('userlogin');

Route::get('/mydashboard', function () {
    return view('dashboard');
});

Route::resource('books', BookController::class);
Route::resource('borrowers', BorrowerController::class);
Route::resource('students', StudentController::class);
Route::resource('users', UserController::class);













