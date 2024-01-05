<?php

namespace Database\Factories;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Answer>
 */
class AnswerFactory extends Factory
{

    protected $model = Answer::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'uuid' => $this->faker->uuid(),
            'answer' => $this->faker->word(),
            'correct' => $this->faker->boolean(),
            'explanation_correct' => $this->faker->word(),
            'explanation_incorrect' => $this->faker->word()
        ];
    }
}