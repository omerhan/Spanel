<?php

namespace Omerhan\Spanel\database\seeds;

use Omerhan\Spanel\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::create( [
            'email' => 'omerhan@outlook.com' ,
            'password' => Hash::make(1),
            'name' => 'Ömer HaN' ,
            'role_id' => '1'
        ]);
    }
}
