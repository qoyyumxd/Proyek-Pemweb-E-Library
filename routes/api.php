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

Route::get('/dashboard/stats', [DashboardController::class, 'getStats'])->name('api.dashboard.stats');
