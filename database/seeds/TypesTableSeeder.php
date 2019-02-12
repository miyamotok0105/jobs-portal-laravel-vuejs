<?php

use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->delete();
        DB::table('types')->insert([
            ['name' =>  'وقت كامل', 'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')], //1
            ['name' =>  'وقت جزئي', 'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')],//2
            ['name' =>  'فتره تدريب', 'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')],//3
            ['name' =>  'عقد مؤقت', 'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')],//4
            ['name' =>  'عقد', 'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')],//5
            ['name' =>  'اجور يوميه', 'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')]//6
        ]);
    }
}
