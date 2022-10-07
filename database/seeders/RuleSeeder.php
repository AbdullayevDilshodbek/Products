<?php

namespace Database\Seeders;

use App\Models\Rule;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rules')->truncate();
        Rule::insert([
            [
                'title' => 'admin',
                'created_at' => '2022-10-07 20:26:13',
                'updated_at' => '2022-10-07 20:26:13'
            ],
            [
                'title' => 'user',
                'created_at' => '2022-10-07 20:26:13',
                'updated_at' => '2022-10-07 20:26:13'
            ]
        ]);
    }
}
