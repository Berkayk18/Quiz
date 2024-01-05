<?php
namespace App\Http\Controllers\Questionnaires;

use App\Http\Controllers\Controller;
use App\Services\QuestionnaireService;
use App\Transformers\QuestionnaireResultTransformer;
use App\Transformers\QuestionnaireTransformer;
use Illuminate\Http\Request;

class QuestionnaireController extends Controller
{
    // get request, hit the questionnaires functions for getting specific questionnaire
    public function getQuestionnaires(QuestionnaireService $questionnaireService, $uuid)
    {
        $questionnaire = $questionnaireService->getQuestionnaire($uuid);

        return response()->json(
            QuestionnaireTransformer::transform($questionnaire)
        );
    }

    public function getResults(Request $request, QuestionnaireService $questionnaireService)
    {
        $results = $questionnaireService->getResults($request->user()->id);

        $return = [];
        foreach($results as $result) {
            $return[] = QuestionnaireResultTransformer::transform($result);
        }

        // QuestionnaireResultTransformer::transform($results)


//        dd($results);
        return response()->json(
            $return
        );
    }

    //post request (call), van user naar adress bijbehorende questionnaire uuid
    public function submitQuestionnaires(Request $request, QuestionnaireService $questionnaireService, $uuid)
    {
        $questionnaire = $questionnaireService->getQuestionnaire($uuid);

        $payload = $request->json('payload');

        $user_id = ($request->user()->id);

        $result = $questionnaireService->verifySubmission($payload, $questionnaire);

        $questionnaireService->add($payload, $result['passed'], $result['grade'], $user_id);

        return response()->json($result);
    }
}


