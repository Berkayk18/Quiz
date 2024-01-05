<?php

namespace Database\Factories;
use App\Models\Question;
use App\Models\Questionnaire;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Questionnaire>
 */
class QuestionnaireFactory extends Factory
{

    protected $model = Questionnaire::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'uuid' => $this->faker->uuid(),
            'name' => $this->faker->name(),
            'min_percentage' => 55
        ];
    }


}
