<?php

use Illuminate\Database\Seeder;
use App\QuestionType;

class QuestionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questionType = [
            [
                'name'=>'Multiple Choice Question (MCQ)',
            ],
            [
                'name'=>'Fill in the Blank',
            ],
            [
                'name'=>'True or False',
            ],
        ];

        foreach($questionType as $key => $value) {
            $questionType = QuestionType::create($value);
        }
    }
}
