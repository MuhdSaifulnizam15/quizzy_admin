<?php

use Illuminate\Database\Seeder;
use App\Quiz;

class QuizzesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $quizzes = [
            [
                'name'=>'Pop Quiz Chapter 1',
                'subject_id'=>'1',
                'is_active'=>'1',
                'description'=>'Introduction to Chemistry. Consists of 10 question.',
            ],
            [
                'name'=>'Pop Quiz Chapter 1',
                'subject_id'=>'2',
                'is_active'=>'1',
                'description'=>'',
            ],
            [
                'name'=>'Pop Quiz Chapter 1',
                'subject_id'=>'3',
                'is_active'=>'0',
                'description'=>'Introduction to Physics. Consists of 5 question.',
            ],
            [
                'name'=>'Pop Quiz Chapter 1',
                'subject_id'=>'4',
                'is_active'=>'0',
                'description'=>'',
            ],
        ];

        foreach($quizzes as $key => $value) {
            $quizzes = Quiz::create($value);
        }
    }
}
