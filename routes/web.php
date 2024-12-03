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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('auth.login-register');
})->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/register', function () {
    return view('auth.login-register');
})->name('register');

Route::post('/register', [AuthController::class, 'register'])->name('login.post');

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

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('books', BookController::class); // CRUD Buku
    Route::resource('students', StudentController::class); // CRUD Siswa
    Route::resource('transactions', TransactionController::class); // Kelola Transaksi
});

Route::get('/api/dashboard-stats', [DashboardController::class, 'getStats'])->name('api.dashboard.stats');

Route::get('/borrow', [BorrowController::class, 'index'])->name('borrow.index');
Route::post('/borrow', [BorrowController::class, 'store'])->name('borrow.store');

Route::get('/admin/transactions', [TransactionController::class, 'index'])->name('admin.transactions.index');

Route::resource('/admin/books', BookController::class);
Route::get('/admin/books', [BookController::class, 'adminIndex'])->name('books.index');

Route::resource('/admin/students', StudentController::class);

Route::patch('/admin/transactions/{id}/return', [TransactionController::class, 'returnBook'])->name('admin.transactions.return');

Route::get('/head/dashboard', [HeadController::class, 'index'])->name('head.dashboard');

Route::get('/admin/reports', [TransactionController::class, 'report'])->name('admin.reports.index');

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
