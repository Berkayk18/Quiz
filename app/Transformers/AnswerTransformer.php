<?php

namespace App\Transformers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Questionnaire;

class AnswerTransformer
{
    public static function transform(Answer $answer)
    {
        return [
            'uuid' => $answer->uuid, // @phpstan-ignore-line
            'answer' => $answer->answer,
            'correct' =>$answer->correct
        ];

    }
}
