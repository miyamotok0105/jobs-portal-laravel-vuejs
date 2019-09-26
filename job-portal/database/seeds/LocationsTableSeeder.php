<?php

use Illuminate\Database\Seeder;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('locations')->delete();
        DB::table('locations')->insert([
            ['name' => '東京/田町', 'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')], //1
            ['name' => '東京/丸の内', 'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')], //2
            ['name' => '東京/新宿', 'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')], //3
            ['name' => '東京/渋谷', 'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')], //4
            ['name' => '東京/上野', 'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')], //5
            ['name' => '東京/京橋', 'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')], //6
            ['name' => '東京/池袋', 'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')] //7
        ]);
    }
}
