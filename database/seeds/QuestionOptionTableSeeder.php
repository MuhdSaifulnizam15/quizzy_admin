<?php

use Illuminate\Database\Seeder;
use App\QuestionOption;

class QuestionOptionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $options = [
            [
                'title'=>'basic magnesium carbonate',
                'is_correct'=>'0',
                'question_id'=>'1',
                'description'=>'False. The answer is basic magnesium oxide. Here sodium (Na) displaces to form sodium hydroxide.',
            ],
            [
                'title'=>'basic magnesium oxide',
                'is_correct'=>'1',
                'question_id'=>'1',
                'description'=>'True. Here sodium (Na) displaces to form sodium hydroxide.',
            ],
            [
                'title'=>'basic magnesium sulphide',
                'is_correct'=>'0',
                'question_id'=>'1',
                'description'=>'False. The answer is basic magnesium oxide. Here sodium (Na) displaces to form sodium hydroxide.',
            ],
            [
                'title'=>'basic magnesium chloride',
                'is_correct'=>'0',
                'question_id'=>'1',
                'description'=>'False. The answer is basic magnesium oxide. Here sodium (Na) displaces to form sodium hydroxide.',
            ],

            [
                'title'=>'addition of oxygen',
                'is_correct'=>'1',
                'question_id'=>'2',
                'description'=>'True. In both the cases, heat energy is evolved',
            ],
            [
                'title'=>'addition of hydrogen',
                'is_correct'=>'1',
                'question_id'=>'2',
                'description'=>'False. The answer is addition of oxygen. In both the cases, heat energy is evolved',
            ],
            [
                'title'=>'removal of oxygen',
                'is_correct'=>'0',
                'question_id'=>'2',
                'description'=>'False. The answer is addition of oxygen. In both the cases, heat energy is evolved',
            ],
            [
                'title'=>'removal of hydrogen',
                'is_correct'=>'0',
                'question_id'=>'2',
                'description'=>'False. The answer is addition of oxygen. In both the cases, heat energy is evolved',
            ],

            [
                'title'=>'Oxidant',
                'is_correct'=>'0',
                'question_id'=>'4',
                'description'=>'',
            ],
        ];

        foreach($options as $key => $value) {
            $options = QuestionOption::create($value);
        }
    }
}
