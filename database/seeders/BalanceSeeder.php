<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BalanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('balance')->insert([
            [
                'id_storages'   => 1,
                'loaded'        => 2
            ],
            [
                'id_storages'   => 2,
                'loaded'        => 1
            ],
            [
                'id_storages'   => 3,
                'loaded'        => 7
            ],
            [
                'id_storages'   => 4,
                'loaded'        => 20
            ],
            [
                'id_storages'   => 5,
                'loaded'        => 2
            ],
            [
                'id_storages'   => 6,
                'loaded'        => 4
            ],
            [
                'id_storages'   => 7,
                'loaded'        => 1
            ],
            [
                'id_storages'   => 8,
                'loaded'        => 4
            ],
            [
                'id_storages'   => 9,
                'loaded'        => 15
            ],
            [
                'id_storages'   => 10,
                'loaded'        => 19
            ],
        ]);
    }
}
