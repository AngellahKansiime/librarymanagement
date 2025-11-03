<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowerController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Models\Student;

// Route::get('/', function () {
//     return view('welcome');
// });

// Landing page
Route::get('/', function () {
    return view('firstpage');
})->name('landing');

//
// //// student login
// Route::middleware('auth:student')->group(function () {
//     // Routes accessible only to authenticated admins
// });

Route::get('student/login', [StudentController::class, 'showStudentlogin'])->name('login');
Route::post('/student/login', [StudentController::class, 'login'])->name('student.login.submit');
Route::get('/students/data', [App\Http\Controllers\StudentController::class, 'getData'])->name('students.data');
Route::get('/books/data', [App\Http\Controllers\BookController::class, 'getData'])->name('books.data');

// admin login
Route::get('adminlogin', [UserController::class, 'showLoginForm'])->name('adminlogin');
Route::post('/logout', [App\Http\Controllers\UserController::class, 'logout'])->name('logout');
Route::post('userlogin', [UserController::class, 'login'])->name('userlogin');
Route::post('registeruser', [UserController::class, 'create'])->name('registeruser');

// ======================
// ✅ Admin & Librarian Routes
// ======================
Route::middleware(['auth', 'role:admin,librarian'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('books', BookController::class);
    Route::resource('borrowers', BorrowerController::class);
    Route::resource('students', StudentController::class);
    Route::resource('users', UserController::class);

    Route::post('/borrowers/{id}/return', [BorrowerController::class, 'returnBook'])->name('borrowers.return');
    Route::get('studentlist', [UserController::class, 'studentsIndex'])->name('studentlist');

    // Admin approval routes
    Route::post('/borrowers/{borrower}/approve', [BorrowerController::class, 'approve'])->name('borrowers.approve');
    Route::post('/borrowers/{borrower}/reject', [BorrowerController::class, 'reject'])->name('borrowers.reject');
});

// ======================
// ✅ Student Routes
// ======================
Route::prefix('student')->middleware(['auth', 'role:student'])->group(function () {
    Route::get('/dashboard', [StudentController::class, 'index'])->name('student.dashboard');
    Route::get('/available-books', [StudentController::class, 'availableBooks'])->name('student.availablebooks');
    Route::get('/borrowed-books', [StudentController::class, 'borrowedBooks'])->name('student.borrowedbooks');
    Route::get('/history', [StudentController::class, 'borrowHistory'])->name('student.borrowhistory');

    Route::post('/borrow/{book}', [BorrowerController::class, 'studentBorrow'])->name('student.borrow');
    Route::post('/request/{book}', [BorrowerController::class, 'studentBorrow'])->name('student.borrow');
});

// Show form for topping up stock
Route::get('/topupform',[BookController::class,'showTopUpForm'])->name('showtopupform');
Route::post('/topuplogic',[BookController::class,'topUpLogic'])->name('topuplogic');
//Route::post('/topup', [BookController::class, 'showTopUpForm'])->name('books.topup');


// Handle top-up form submission
Route::post('/books/topup', [BookController::class, 'topUpStock'])->name('books.topup');
















































//
//
//use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\BookController;
//use App\Http\Controllers\BorrowerController;
//use App\Http\Controllers\StudentController;
//use App\Http\Controllers\UserController;
//use App\Http\Controllers\DashboardController;
//use App\Models\Student;
//
//// Route::get('/', function () {
////     return view('welcome');
//// });
//
//
//// Landing page
//Route::get('/', function () {
//    return view('firstpage');
//})->name('landing');
//
////
////// student login
////Route::middleware('auth:student')->group(function () {
////    // Routes accessible only to authenticated admins
////});
//Route::get('student/login', [StudentController::class, 'showStudentlogin'])->name('login');
//Route::post('/student/login', [StudentController::class, 'login'])->name('student.login.submit');
//Route::get('/students/data', [App\Http\Controllers\StudentController::class, 'getData'])->name('students.data');
//Route::get('/books/data', [App\Http\Controllers\BookController::class, 'getData'])->name('books.data');
//
//
//
//// admin login
//Route::get('adminlogin', [UserController::class, 'showLoginForm'])->name('adminlogin');
//Route::post('/logout', [App\Http\Controllers\UserController::class, 'logout'])->name('logout');
//Route::post('userlogin',[UserController::class,'login'])->name('userlogin');
//Route::post('registeruser',[UserController::class,'create'])->name('registeruser');
//Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
//
//
//
//
//Route::resource('books', BookController::class);
//Route::resource('borrowers', BorrowerController::class);
//Route::resource('students', StudentController::class);
//Route::resource('users', UserController::class);
//Route::post('/borrowers/{id}/return', [BorrowerController::class, 'returnBook'])->name('borrowers.return');
//Route::middleware(['auth'])->group(function () {
//    Route::get('/student/dashboard', [StudentController::class, 'index'])->name('student.dashboard');
//});
//Route::post('/student/borrow/{book}', [BorrowerController::class, 'studentBorrow'])->name('student.borrow');
//
//
//Route::prefix('student')->middleware(['auth'])->group(function () {
//
//    Route::get('/available-books', [StudentController::class, 'availableBooks'])->name('student.availablebooks');
//
//    Route::get('/borrowed-books', [StudentController::class, 'borrowedBooks'])->name('student.borrowedbooks');
//
//    Route::get('/history', [StudentController::class, 'borrowHistory'])->name('student.borrowhistory');
//
//});
//
//
//
//
//Route::get('studentlist', [UserController::class, 'studentsIndex'])->name('studentlist');
//
//Route::post('/student/request/{book}', [BorrowerController::class, 'studentBorrow'])
//    ->name('student.borrow')
//    ->middleware('auth');
//
//
//// Admin approval routes
//Route::post('/borrowers/{borrower}/approve', [BorrowerController::class, 'approve'])->name('borrowers.approve');
//Route::post('/borrowers/{borrower}/reject', [BorrowerController::class, 'reject'])->name('borrowers.reject');
//
//
//
//
//
//
//
