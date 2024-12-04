<?php

use Illuminate\Support\Facades\Route;
use App\Models\Book;

public function boot()
{
    parent::boot();

    Route::model('book', Book::class);
}