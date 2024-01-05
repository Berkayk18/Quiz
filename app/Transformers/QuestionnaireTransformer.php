<?php

namespace App\Transformers;

use App\Models\Question;
use App\Models\Questionnaire;

class   QuestionnaireTransformer
{
    //creer wat er wordt laten zien, in de juiste structuur
    public static function transform(Questionnaire $questionnaire)
    {
        return [
            'uuid' => $questionnaire->uuid, // @phpstan-ignore-line
            'name' => $questionnaire->name,
            'questions' => $questionnaire->questions->map(function(Question $question) {
                    return(
                        QuestionTransformer::transform($question));
                }),
        ];
    }
}
