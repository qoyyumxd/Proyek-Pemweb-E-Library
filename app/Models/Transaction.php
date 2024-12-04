<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\TransactionController;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
    'student_id', 
    'book_id', 
    'borrow_date', 
    'return_date'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}