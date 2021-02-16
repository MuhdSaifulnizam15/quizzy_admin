<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superadmin = [
            [
                'name'=>'Administrator',
                'email'=>'admin@quizzy.com',
                'password' => bcrypt('Asd1234'),
            ],
        ];

        foreach($superadmin as $key => $value) {
            $superadmin = User::create($value);
            $superadmin->assignRole('superadmin');
        }

        $tutor = [
            [
                'name' => 'Mdm Chia',
                'email' => 'chia@quizzy.com',
                'password' => bcrypt('Asd1234'),
            ],
            [
                'name' => 'Mdm Raja',
                'email' => 'raja@quizzy.com',
                'password' => bcrypt('Asd1234'),
            ],
            [
                'name' => 'Mdm Shahida',
                'email' => 'shahida@quizzy.com',
                'password' => bcrypt('Asd1234'),
            ],
            [
                'name' => 'Mdm Dalila',
                'email' => 'dalila@quizzy.com',
                'password' => bcrypt('Asd1234'),
            ],
        ];

        foreach($tutor as $key => $value) {
            $tutor = User::create($value);
            $tutor->assignRole('tutor');
        }

        $student = [
            [
                'name' => 'Muhd Saiful',
                'email' => 'saiful@quizzy.com',
                'password' => bcrypt('Asd1234'),
            ],
            [
                'name' => 'Haziq hafiez',
                'email' => 'haziq@quizzy.com',
                'password' => bcrypt('Asd1234'),
            ],
            [
                'name' => 'Nur Syafiqah',
                'email' => 'syafiqah@quizzy.com',
                'password' => bcrypt('Asd1234'),
            ],
            [
                'name' => 'Safwan Ahmad',
                'email' => 'safwan@quizzy.com',
                'password' => bcrypt('Asd1234'),
            ],
        ];

        foreach($student as $key => $value) {
            $student = User::create($value);
            $student->assignRole('student');
        }

        $admin = [
            [
                'name' => 'Muhd Farhan',
                'email' => 'hr.farhan@quizzy.com',
                'password' => bcrypt('Asd1234'),
            ],
            [
                'name' => 'Chemistry Department',
                'email' => 'chem.department@quizzy.com',
                'password' => bcrypt('Asd1234'),
            ],
            [
                'name' => 'Physics Department',
                'email' => 'phys.department@quizzy.com',
                'password' => bcrypt('Asd1234'),
            ],
            [
                'name' => 'Biology',
                'email' => 'bio.department@quizzy.com',
                'password' => bcrypt('Asd1234'),
            ],
        ];

        foreach($admin as $key => $value) {
            $admin = User::create($value);
            $admin->assignRole('admin');
        }
    }
}
