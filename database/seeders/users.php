<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class users extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
            'name' => Str::random(10),
            'phone' => random_int(1000000000, 9999999999),
            'email' =>  Str::random(5).'@gmail.com',
            'password' => Str::random(5)
        ],
        [
            'name' => Str::random(10),
            'phone' => random_int(1000000000, 9999999999),
            'email' =>  Str::random(5).'@gmail.com',
            'password' => Str::random(5)
        ]
        ]);
    }
}
