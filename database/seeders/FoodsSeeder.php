<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FoodsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('foods')->insert([
            [
                'name' => 'Морковь'
            ],
            [
                'name' => 'Картофель'
            ],
            [
                'name' => 'Свекла'
            ],
            [
                'name' => 'Лук'
            ],
            [
                'name' => 'Капуста'
            ],
        ]);
    }
}
