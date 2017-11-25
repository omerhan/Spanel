<?php

namespace Omerhan\Spanel\database\seeds;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LangsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('langs')->truncate();
        DB::table('langs')->insert([
            [
                'dil' => 'Türkçe',
                'kisaltma' => 'tr',
                'bayrak' => 'assets/spanel/img/tr.png',
                'order' => (1),
                'title' => config('spanel.panelName'),
                'desc' => config('spanel.panelName'),
                'keyw' => config('spanel.panelName'),
            ],
            [
                'dil' => 'Türkçee',
                'kisaltma' => 'trr',
                'bayrak' => 'assets/spanel/img/tr.png',
                'order' => (1),
                'title' => config('spanel.panelName'),
                'desc' => config('spanel.panelName'),
                'keyw' => config('spanel.panelName'),
            ],
            [
                'dil' => 'Türkçeee',
                'kisaltma' => 'trrr',
                'bayrak' => 'assets/spanel/img/tr.png',
                'order' => (1),
                'title' => config('spanel.panelName'),
                'desc' => config('spanel.panelName'),
                'keyw' => config('spanel.panelName'),
            ],
            [
                'dil' => 'Türkçeeee',
                'kisaltma' => 'trrrr',
                'bayrak' => 'assets/spanel/img/tr.png',
                'order' => (1),
                'title' => config('spanel.panelName'),
                'desc' => config('spanel.panelName'),
                'keyw' => config('spanel.panelName'),
            ]
        ]);
    }
}
