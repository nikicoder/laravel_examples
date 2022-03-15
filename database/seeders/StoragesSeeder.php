<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StoragesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('storages')->insert([
            [
                'id_foods'  =>  1,
                'name'      => 'Мо-1',
                'volume'    => '5',
            ],
            [
                'id_foods'  =>  1,
                'name'      => 'Мо-2',
                'volume'    => '5',
            ],
            [
                'id_foods'  =>  2,
                'name'      => 'Кр-1',
                'volume'    => '15',
            ],
            [
                'id_foods'  =>  2,
                'name'      => 'Кр-2',
                'volume'    => '25',
            ],
            [
                'id_foods'  =>  2,
                'name'      => 'Кр-3',
                'volume'    => '20',
            ],
            [
                'id_foods'  =>  3,
                'name'      => 'Св-1',
                'volume'    => '10',
            ],
            [
                'id_foods'  =>  3,
                'name'      => 'Св-2',
                'volume'    => '10',
            ],
            [
                'id_foods'  =>  4,
                'name'      => 'Лк-1',
                'volume'    => '15',
            ],
            [
                'id_foods'  =>  5,
                'name'      => 'Кп-1',
                'volume'    => '25',
            ],

            [
                'id_foods'  =>  5,
                'name'      => 'Кп-2',
                'volume'    => '20',
            ],
        ]);
    }
}
