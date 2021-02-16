<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleTableSeeder::class);
        $this->call(SubjectTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ClassroomsTableSeeder::class);
        $this->call(QuizzesTableSeeder::class);
        $this->call(QuestionTypeSeeder::class);
        $this->call(QuestionsTableSeeder::class);
        $this->call(QuestionOptionTableSeeder::class);
        $this->call(MotivationQuoteTableSeeder::class);
    }
}
