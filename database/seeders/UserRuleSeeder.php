<?php

namespace Database\Seeders;

use App\Models\UserRule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_rules')->truncate();
        UserRule::insert([
            [
                'user_id' => 1,
                'rule_id' => 1,
                'created_at' => '2022-10-07 20:26:13',
                'updated_at' => '2022-10-07 20:26:13'
            ],
            [
                'user_id' => 2,
                'rule_id' => 2,
                'created_at' => '2022-10-07 20:26:13',
                'updated_at' => '2022-10-07 20:26:13'
            ]
        ]);
    }
}
