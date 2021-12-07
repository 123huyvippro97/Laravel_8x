<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'name'              => 'admin',
            'email'             => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password'          => bcrypt('123456'), // password
            'remember_token'    => Str::random(10),
        ];

        DB::table('users')->truncate();
        DB::table('users')->insert($data);
        User::factory(4)->create();
    }
}
