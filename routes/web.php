<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\HeadController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentDashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('auth.login-register');})
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.post');

Route::get('/register', function () {
    return view('auth.register');})
    ->name('register');

Route::post('/register', [AuthController::class, 'register'])
    ->name('register.post');

Route::middleware(['auth'])->group(function(){
    Route::get('/operator/admin',  [OperatorController::class, 'admin'])
        ->name('admin.dashboard')
        ->middleware(['auth'], 'izinAkses:admin');
    Route::get('/operator/siswa', [OperatorController::class, 'siswa'])
        ->name('siswa.dashboard')
        ->middleware(['auth'], 'izinAkses:siswa');
    Route::get('/operator/kepala_perpustakaan', [OperatorController::class, 'kepala_perpustakaan'])
        ->name('kepala.dashboard')
        ->middleware(['auth'], 'izinAkses:kepala_perpustakaan');

    Route::get('/logout', [AuthController::class, 'logout']);
});

Route::middleware(['auth'])->group(function () {
    Route::resource('books', BookController::class)
        ->middleware(['auth',  'izinAkses:admin']);
    Route::resource('students', StudentController::class)
    ->middleware(['auth',  'izinAkses:admin']);
    Route::resource('transactions', TransactionController::class)
    ->middleware(['auth',  'izinAkses:admin']);
});

Route::get('/api/dashboard-stats', [DashboardController::class, 'getStats'])->name('api.dashboard.stats');

Route::get('/borrow', [BorrowController::class, 'index'])->name('borrow.index');
Route::post('/borrow', [BorrowController::class, 'store'])->name('borrow.store');

Route::get('/admin/transactions', [TransactionController::class, 'index'])->name('admin.transactions.index');

Route::resource('/admin/books', BookController::class);
Route::get('/admin/books', [BookController::class, 'adminIndex'])->name('books.adminIndex');

Route::resource('/admin/students', StudentController::class);

Route::patch('/admin/transactions/{id}/return', [TransactionController::class, 'returnBook'])->name('admin.transactions.return');

Route::get('/head/dashboard', [HeadController::class, 'index'])->name('head.dashboard');

Route::get('/admin/reports', [TransactionController::class, 'report'])->name('admin.reports.index');

Route::get('/admin/dashboard', [DashboardController::class, 'adminIndex'])->name('admin.dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [StudentDashboardController::class, 'index'])
        ->name('siswa.dashboard')
        ->middleware(['auth'], 'izinAkses:siswa');
    Route::get('/history', [TransactionController::class, 'viewHistory'])
        ->name('history')
        ->middleware(['auth'], 'izinAkses:siswa');
});

Route::post('/borrow/{book}', [TransactionController::class, 'borrowBook'])->name('borrow.book');

Route::get('/borrow/{id}', [TransactionController::class, 'create'])->name('borrow.form');
Route::post('/borrow/{id}', [TransactionController::class, 'store'])->name('borrow.submit');

Route::middleware(['auth', 'role:kepala_perpustakaan'])->group(function () {
    Route::get('/kepala/dashboard', [HeadController::class, 'index'])->name('kepala.dashboard');
    Route::get('/kepala/reports', [HeadController::class, 'reports'])->name('kepala.reports');
});