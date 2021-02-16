<?php

use Illuminate\Database\Seeder;
use App\Question;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questions = [
            [
                'title'=>'Magnesium ribbon is rubbed before burning because it has a coating of',
                'description'=>'',
                'duration'=>'10',
                'quiz_id'=>'1',
                'question_type_id'=>'1',
                'is_true'=>'0',
            ],
            [
                'title'=>'Oxidation is a process which involves',
                'description'=>'',
                'duration'=>'10',
                'quiz_id'=>'1',
                'question_type_id'=>'1',
                'is_true'=>'0',
            ],
            [
                'title'=>'The process of reduction involves addition of oxygen',
                'description'=>'',
                'duration'=>'10',
                'quiz_id'=>'1',
                'question_type_id'=>'3',
                'is_true'=>'1',
            ],
            [
                'title'=>'A substance added to food containing fats and oils is called',
                'description'=>'',
                'duration'=>'15',
                'quiz_id'=>'1',
                'question_type_id'=>'2',
                'is_true'=>'0',
            ],
        ];

        foreach($questions as $key => $value) {
            $questions = Question::create($value);
        }
    }
}
