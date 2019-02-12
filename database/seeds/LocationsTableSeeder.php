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
            ['name' => 'العراق - بغداد', 'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')], //1
            ['name' => 'العراق - اربيل', 'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')], //2
            ['name' => 'العراق - البصره', 'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')], //3
            ['name' => 'العراق - كربلاء', 'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')], //4
            ['name' => 'الولايات المتحده الامريكيه', 'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')], //5
            ['name' => 'المملكه المتحده', 'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')], //6
            ['name' => 'تركيا', 'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')] //7
        ]);
    }
}
