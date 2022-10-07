<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OauthClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('oauth_clients')->truncate();
        $array = array(
            [
                'user_id' => null,
                'name' => 'Laravel Personal Access Client',
                'secret' => 'lO38DC22CgNUT7OxApYtGNBjS2zRFH6s6slk2Cki',
                'provider' => null,
                'redirect' => 'http://localhost',
                'personal_access_client' => 1,
                'password_client' => 0,
                'revoked' => 0,
                'created_at' => '2022-10-07 20:26:13',
                'updated_at' => '2022-10-07 20:26:13',
            ],
            [
                'user_id' => null,
                'name' => 'Laravel Password Grant Client',
                'secret' => 'DwCBkPambiXxhvuag9k5fuhsI6r9OVwwDqy1HopW',
                'provider' => 'users',
                'redirect' => 'http://localhost',
                'personal_access_client' => 0,
                'password_client' => 1,
                'revoked' => 0,
                'created_at' => '2022-10-07 20:26:13',
                'updated_at' => '2022-10-07 20:26:13',
            ]

        );
        DB::table('oauth_clients')->insert($array);
    }
}
