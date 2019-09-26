<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();
        DB::table('categories')->insert([
            ['name' => 'Ruby', 'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')], //1
            ['name' => 'Python', 'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')], //2
            ['name' => 'Java', 'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')], //3
            ['name' => 'C#', 'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')], //4
            ['name' => 'VBA', 'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')], //5
            ['name' => 'Linux', 'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')], //6
            ['name' => 'PHP', 'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')], //7
            ['name' => 'GO', 'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')], //8
            ['name' => 'AWS', 'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')], //9
            ['name' => 'Azure', 'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')] //10
        ]);
    }
}
