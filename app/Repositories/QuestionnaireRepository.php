<?php

namespace App\Repositories;

use App\Models\Questionnaire;
use App\Models\QuestionnaireResult;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\Mixed_;

class QuestionnaireRepository
{

    //haal de uuid's op van questions table en answers table, uit database
    public function getQuestionnaires(string $uuid): ?Questionnaire
    {
        return Questionnaire::with(["questions.answers"])
            ->where('uuid', $uuid)
            ->first();
    }

    public function getResults($user_id)
    {
        return QuestionnaireResult::where('user_id', $user_id)->get();
    }


    //Alle data opslaan in db result
    public function saveResult($pretty, $passed, $grade, $user_id)
    {
        $result = new QuestionnaireResult();
        $result->uuid = Str::uuid(); // @phpstan-ignore-line
        $result->questionnaire_id = 1;
        $result->user_id = $user_id;
        $result->passed = $passed;
        $result->grade = $grade;
        $result->submission = $pretty;
        $result->save();
        return $result;
    }


}
