<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUsersSeeder extends Seeder
{
    public function run(): void
    {
        $userData = [
            [
                'name'=>'Agent Siswa',
                'email'=>'siswa1@gmail.com',
                'role'=>'siswa',
                'password'=>bcrypt('general1')
            ],
            [
                'name'=>'Master Perpustakaan',
                'email'=>'kepperpus1@gmail.com',
                'role'=>'kepala_perpustakaan',
                'password'=>bcrypt('heropro1')
            ],
        ];

        foreach($userData as $key => $val){
            User::create($val);
        }
    }
}