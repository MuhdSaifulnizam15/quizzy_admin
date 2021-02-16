<?php

use Illuminate\Database\Seeder;
use App\Motivation;

class MotivationQuoteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $motivations = [
            [
                'quote'=>'The secret of getting ahead is getting started.',
                'author'=>'Mark Twain',
            ],
            [
                'quote'=>'Don’t limit yourself. Many people limit themselves to what they think they can do. You can go as far as your mind lets you. What you believe, remember, you can achieve.',
                'author'=>'Mary Kay Ash',
            ],
            [
                'quote'=>'It’s hard to beat a person who never gives up.',
                'author'=>'Babe Ruth',
            ],
            [
                'quote'=>'If people are doubting how far you can go, go so far that you can’t hear them anymore.',
                'author'=>'Michele Ruiz',
            ],
            [
                'quote'=>'Whatever you are, be a good one.',
                'author'=>'Abraham Lincoln',
            ],
            [
                'quote'=>'It’s no use going back to yesterday, because I was a different person then.',
                'author'=>'Lewis Carroll',
            ],
            [
                'quote'=>'You can either experience the pain of discipline or the pain of regret. The choice is yours.',
                'author'=>'Unknown',
            ],
            [
                'quote'=>'Impossible is just an opinion.',
                'author'=>'Paulo Coelho',
            ],
            [
                'quote'=>'Hold the vision, trust the process.',
                'author'=>'Unknown',
            ],
            [
                'quote'=>'Magic is believing in yourself. If you can make that happen, you can make anything happen.',
                'author'=>'Johann Wolfgang Von Goethe',
            ],
            [
                'quote'=>'One day or day one. You decide.',
                'author'=>'Unknown',
            ],
            [
                'quote'=>'Without hustle, talent will only carry you so far.',
                'author'=>'Gary Vaynerchuk',
            ],
        ];

        foreach($motivations as $key => $value) {
            $motivations = Motivation::create($value);
        }
    }
}
