<?php

namespace App\Services;

use App\Models\QuestionnaireResult;
use App\Repositories\QuestionnaireRepository;
use Illuminate\Http\Request;

class QuestionnaireService
{
    //protect QuestionnaireRepository class
    public function __construct(
        protected  QuestionnaireRepository $questionnaireRepository,
    ) {
    }

    //meegeven aan QuestionnaireController
    public function getQuestionnaire(string $uuid)
    {
        return $this->questionnaireRepository->getQuestionnaires($uuid);
    }

    public function getResults($user_id)
    {
        return $this->questionnaireRepository->getResults($user_id);
    }

    //Alle ingevulde data van request versturen en checken naar database
    //Business logica
    public function verifySubmission(array $payload, $questionnaire)
    {
        //Return Response Array for Front-end
        $return = [
            'correct' => true,
            'questions' => [],
            'amountTotalQuestions' => 0,
            'amountCorrectQuestions' => 0,
            'amountIncorrectQuestions' => 0,
        ];


        foreach($payload as $item) {
            //set array for response
            $generatedResponseQuestion = [
                'uuid' => $item['questionUuid'],
                'correct' => true,
                'answers' => [],
            ];

            //rebuild request data into database structure
            $memoryQuestion = $questionnaire->questions
                ->where('uuid', $item['questionUuid'])->first();

            $answersList = $item['answers'];

            foreach ($answersList as $answer) {
                // find answer in questionnaire.questions.answers
                // fill each space of database with request data '$answer'
                // oude code: $answerNew = $memoryQuestion->answers->where('uuid', $answer)->first();
                $answerNew = null;
                if ($memoryQuestion !== null) {
                    $answerNew = $memoryQuestion->answers->where('uuid', $answer)->first();
                }

                //wat klopt er qwa correct waarde
                // oud code: $answeredCorrectly = (bool)$answerNew->correct;
                $answeredCorrectly = false;
                if ($answerNew !== null) {
                    $answeredCorrectly = (bool) $answerNew->correct;
                }

                //check correct value for explanation-correct/incorrect
                // oud code: $explanation = $answeredCorrectly ? $answerNew->explanation_correct : $answerNew->explanation_incorrect;
                $explanation = null;
                if ($answerNew !== null) {
                    $answeredCorrectly = (bool) $answerNew->correct;

                    if ($answeredCorrectly) {
                        $explanation = $answerNew->explanation_correct;
                    } else {
                        $explanation = $answerNew->explanation_incorrect;
                    }
                }

                //Result true or false and count the correct/false
                if ($answeredCorrectly === false) {
                    $generatedResponseQuestion['correct'] = false;
                    $return['correct'] = false;
                        //incorrect
                        $return['amountIncorrectQuestions'] += 1;
                        $return['amountTotalQuestions'] += 1;
                } else {
                    //correct
                    $return['amountCorrectQuestions'] += 1;
                    $return['amountTotalQuestions'] += 1;
                }


                $generatedResponseQuestion['answers'][] =
                    [
                        "uuid" => $item['questionUuid'],
                        "answer" => $answer,
                        "explanation" => $explanation,
                    ];
            }
            $return ['questions'][] = $generatedResponseQuestion;
        }

        // todo: "passed" when min 55% of all answers are true and grade
        $minPercentageCorrect = $questionnaire->min_percentage; // 55int of database

        $total = $return['amountTotalQuestions'];
        $totalCorrects = $return['amountCorrectQuestions'];

        $percentageCorrect = ($totalCorrects / $total) * 100;

        $return['passed'] = $percentageCorrect >= $minPercentageCorrect;
        $return['grade'] = round($percentageCorrect / 10, 1);

        return $return;
    }

    public function add($payload, $passed, $grade, $user_id)
    {
        $pretty = json_encode($payload, JSON_PRETTY_PRINT);

        $this->questionnaireRepository->saveResult($pretty, $passed, $grade, $user_id);
    }
}
