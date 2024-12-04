<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;
class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Student::create(['name' => 'Siswa 1', 'nim' => '123456']);
        Student::create(['name' => 'Siswa 2', 'nim' => '654321']);
    }
}
