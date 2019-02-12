<?php

use Illuminate\Database\Seeder;

class JobsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jobs')->delete();
        DB::table('jobs')->insert([
            [
                'category_id'    => 11,
                'type_id'        => 7,
                'company_id'     => 6,
                'location_id'    => 1,
                'title'          => 'Full-Stack Web Developer',
                'description'    => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                'qualifications' => 'يجيد العمل تحت الضغوظ ويجيد العمل بشكل جيد مع الفرق والمطورين الاخرين',
                'expected_salary'=> '$1000 - $3000',
                'apply_email'    => 'emailApply@company.com',
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s')
            ],
            [
                'category_id'    => 11,
                'type_id'        => 9,
                'company_id'     => 3,
                'locatino_id'    => 1,
                'title'          => 'تدريب حول استخدام VB.NET',
                'description'    => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                'qualifications' => 'يجيد العمل تحت الضغوظ ويجيد العمل بشكل جيد مع الفرق والمطورين الاخرين',
                'expected_salary'=> '$1000 - $3000',
                'apply_email'    => 'emailApply@company.com',
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s')
            ],
            [
                'category_id'    => 11,
                'type_id'        => 7,
                'company_id'     => 6,
                'locatino_id'    => 1,
                'title'          => 'Full-Stack Web Developer',
                'description'    => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                'qualifications' => 'يجيد العمل تحت الضغوظ ويجيد العمل بشكل جيد مع الفرق والمطورين الاخرين',
                'expected_salary'=> '$1000 - $3000',
                'apply_email'    => 'emailApply@company.com',
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s')
            ],
            [
                'category_id'    => 11,
                'type_id'        => 9,
                'company_id'     => 3,
                'locatino_id'    => 1,
                'title'          => 'تدريب حول استخدام VB.NET',
                'description'    => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                'qualifications' => 'يجيد العمل تحت الضغوظ ويجيد العمل بشكل جيد مع الفرق والمطورين الاخرين',
                'expected_salary'=> '$1000 - $3000',
                'apply_email'    => 'emailApply@company.com',
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s')
            ],
        ]);
    }
}
