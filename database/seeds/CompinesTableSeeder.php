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
            ['name' => 'وزاره الاتصالات', 'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')], //1
            ['name' => 'وزاره الكهرباء', 'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')], //2
            ['name' => 'الشركه العامه للنقل', 'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')], //3
            ['name' => 'ايرثلنك للاتصالات', 'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')], //4
            ['name' => 'شركه نفط الجنوب', 'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')], //5
            ['name' => 'الشركه العامه للسيارات', 'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')] //6
        ]);
    }
}
