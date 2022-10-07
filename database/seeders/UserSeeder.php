<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        User::insert([[
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'created_at' => '2022-10-07 20:26:13',
            'updated_at' => '2022-10-07 20:26:13'
        ],[
            'username' => 'user',
            'password' => bcrypt('user'),
            'created_at' => '2022-10-07 20:26:13',
            'updated_at' => '2022-10-07 20:26:13'
        ]]);
    }
}
