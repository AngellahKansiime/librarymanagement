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
Route::middleware('auth:student')->group(function () {
    // Routes accessible only to authenticated admins
});
Route::get('student/login', [StudentController::class, 'showStudentlogin'])->name('login');
Route::post('/student/login', [StudentController::class, 'login'])->name('student.login.submit');
Route::get('/student/dashboard', [StudentController::class, 'dashboard'])->name('student.dashboard');


// admin login
Route::get('adminlogin', [UserController::class, 'showLoginForm'])->name('adminlogin');
Route::get('firstpage', [UserController::class,'logout'])->name('logout');
Route::post('userlogin',[UserController::class,'login'])->name('userlogin');
Route::get('dashboard', [UserController::class, 'showAdminDashboard'])->name('dashboard');

Route::get('/mydashboard', function () {
    return view('dashboard');
});

Route::resource('books', BookController::class);
Route::resource('borrowers', BorrowerController::class);
Route::resource('students', StudentController::class);
Route::resource('users', UserController::class);













