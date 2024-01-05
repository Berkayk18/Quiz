<?php

namespace App\Transformers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Questionnaire;
use App\Models\QuestionnaireResult;
use App\Models\User;

class QuestionnaireResultTransformer
{
    public static function transform(QuestionnaireResult $QuestionnaireResult)
    {
        return [
            'id' => $QuestionnaireResult->id,
            'uuid' => $QuestionnaireResult->uuid, // @phpstan-ignore-line
            'user_id' => $QuestionnaireResult->user_id,
//            'questionnaire_id' => $QuestionnaireResult->questionnaire_id,
//            'passed' => $QuestionnaireResult->passed,
//            'grade' => $QuestionnaireResult->grade,
            'submission' => $QuestionnaireResult->submission,
//            'created_at' => $QuestionnaireResult->created_at
        ];

    }
}
