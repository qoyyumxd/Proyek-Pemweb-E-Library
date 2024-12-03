<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Book;
use App\Models\Student;
use Illuminate\Http\Request;

class HeadController extends Controller
{
    public function index()
{
    $totalBooks = Book::count();
    $totalStudents = Student::count();
    $borrowedBooks = Transaction::whereNull('return_date')->count();

    return view('head.dashboard', compact('totalBooks', 'totalStudents', 'borrowedBooks'));
}

}
