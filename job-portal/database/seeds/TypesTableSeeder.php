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
            ['name' =>  '週５稼働', 'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')], //1
            ['name' =>  '週３稼働', 'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')],//2
            ['name' =>  '一部リモート', 'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')],//3
            ['name' =>  'フルリモート', 'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')],//4
            ['name' =>  'フレックス', 'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')],//5
            ['name' =>  '機械学習', 'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')]//6
        ]);
    }
}
