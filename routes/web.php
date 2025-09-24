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

Route::get('student/login', [StudentController::class, 'showlogin'])->name('login');
// student login
Route::middleware('auth:student')->group(function () {
    // Routes accessible only to authenticated admins

Route::post('student/studentl', [StudentController::class,'login']);
Route::get('student/mystudents',[StudentController::class,'mystudents'])->name('mystudents');

});

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













