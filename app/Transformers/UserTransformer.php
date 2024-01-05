<?php

namespace App\Transformers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Questionnaire;
use App\Models\QuestionnaireResult;
use App\Models\User;

class UserTransformer
{
    public static function transform(User $user)
    {

//        return [
//            'id' => $user->id,
//        ];


//        return [
//            'user_id' => $user->user_id->map(function(QuestionnaireResult $questionnaireResult) {
//                return QuestionnaireResultTransformer::transform($questionnaireResult);
//            })
//        ];

    }
}
