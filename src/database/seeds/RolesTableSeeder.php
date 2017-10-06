<?php


namespace Omerhan\Spanel\database\seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('roles')->truncate();
        DB::table('roles')->insert([
            [
                'name' => ('Developer'),
                'description' => ('Developer')
            ],[
                'name' => ('WebMaster'),
                'description' => ('WebMaster')
            ],[
                'name' => ('Admin'),
                'description' => ('Admin')
            ],
            [
                'name' => ('User'),
                'description' => ('User')
            ],[
                'name' => ('Demo'),
                'description' => ('Demo')
            ]
        ]);
    }
}
