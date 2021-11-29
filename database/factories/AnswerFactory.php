<?php

namespace Database\Factories;

use App\Models\Answer;
use Illuminate\Database\Eloquent\Factories\Factory;

class AnswerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Answer::class;

    public function definition()
    {
        return [
            'user_id'=>rand(1,5),
            'question_id'=>rand(1,50),
            'answer'=>'answer'.rand(1,4)
        ];
    }
}
