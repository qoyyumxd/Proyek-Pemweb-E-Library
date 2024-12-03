<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::create(['title' => 'Manajemen Proyek Konstruksi', 'author' => 'Hafnidar A. Rani', 'stock' => 10]);
        Book::create(['title' => 'Jenderal Islam Paling Berpengaruh Sepanjang Masa - Al Wafi Publishing', 'author' => 'Nabawiyah Mahmud', 'stock' => 5]);
        Book::create(['title' => 'From Research To Technopreneur Strategi Membangun Usaha Berbasis Teknologi & Inovasi Dengan 0 Rupiah', 'author' => 'Nova Suparmanto', 'stock' => 15]);
        Book::create(['title' => 'Aljabar Matrik (Teori Dan Aplikasinya Dengan Scilab)', 'author' => 'Hendra Kartika', 'stock' => 20]);
        Book::create(['title' => 'Supply Chain Management', 'author' => 'Muhammad Arif', 'stock' => 30]);
    }
}
