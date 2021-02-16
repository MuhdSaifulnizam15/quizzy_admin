<?php

use Illuminate\Database\Seeder;
use App\Classroom;

class ClassroomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $classroom = [
            [
                'name'=>'SM3K3P1',
                'subject_id'=>'1',
                'tutor_id'=>'2',
            ],
            [
                'name'=>'SM3K3P2',
                'subject_id'=>'2',
                'tutor_id'=>'3',
            ],
            [
                'name'=>'SM3K3P3',
                'subject_id'=>'3',
                'tutor_id'=>'4',
            ],
            [
                'name'=>'SM3K3P4',
                'subject_id'=>'4',
                'tutor_id'=>'5',
            ],
            [
                'name'=>'SM3K3P5',
                'subject_id'=>'5',
                'tutor_id'=>'2',
            ],
            [
                'name'=>'SM3K3P6',
                'subject_id'=>'1',
                'tutor_id'=>'3',
            ],
        ];

        foreach($classroom as $key => $value) {
            $classroom = Classroom::create($value);
        }
    }
}
