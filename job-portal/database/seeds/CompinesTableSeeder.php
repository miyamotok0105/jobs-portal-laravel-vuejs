<?php

use Illuminate\Database\Seeder;

class CompinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->delete();
        DB::table('companies')->insert([
            ['name' => 'GIBJapan', 'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')], //1
            ['name' => 'Weeyble', 'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')], //2
            ['name' => 'Sample1', 'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')], //3
            ['name' => 'Sample2', 'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')], //4
            ['name' => 'Sample3', 'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')], //5
            ['name' => 'Sample4', 'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')] //6
        ]);
    }
}
