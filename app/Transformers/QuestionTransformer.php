<?php

namespace App\Transformers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Questionnaire;

class QuestionTransformer
{
    public static function transform(Question $question)
    {
        return [
            'uuid' => $question->uuid,  // @phpstan-ignore-line
            'question' => $question->question,
            'type' => $question->type,
            'answers' => $question->answers->map(function(Answer $answer) {
                return AnswerTransformer::transform($answer);
            }),
        ];

    }
}
