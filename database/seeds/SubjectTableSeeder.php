<?php

use Illuminate\Database\Seeder;
use App\Subject;

class SubjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subject = [
            [
                'name'=>'Kimia',
                'code'=>'SK026',
            ],
            [
                'name'=>'Biologi',
                'code'=>'SB025',
            ],
            [
                'name'=>'Fizik',
                'code'=>'SF027',
            ],
            [
                'name'=>'Matematik',
                'code'=>'QS025',
            ],
            [
                'name'=>'English',
                'code'=>'WB023',
            ],
        ];

        foreach($subject as $key => $value) {
            $subject = Subject::create($value);
        }
    }
}
