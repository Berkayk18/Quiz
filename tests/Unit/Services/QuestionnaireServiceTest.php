<?php
use App\Models\Answer;
use App\Models\Question;
use App\Models\Questionnaire;
use App\Services\QuestionnaireService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

test('Test that all correct answers returns correct', function () {
    //prepare, make fake questionnaire from model layer, use it for testing its from factories
    $questionnaire = Questionnaire::factory()
        ->create();
    $question = Question::factory([
        'uuid' => 'eerste-question-uuid',
        'questionnaire_id' => $questionnaire->id,
    ])->create();
    $answer = Answer::factory([
        'uuid' => 123,
        'question_id' => $question->id,
        'correct' => true,
        'answer' => 'x'
    ])->create();
    // act
    $var = app(QuestionnaireService::class);
    $data = $var->verifySubmission(
        [
            [
                'questionUuid' => $question->uuid,
                'answers' => [
                    $answer->uuid,
                ],
            ]
        ],
        $questionnaire
    );
    // assert
    expect($data['correct'])->toBeTrue();
});



test('Test that providing an invalid answer returns false', function () {
    // prepare
    $questionnaire = Questionnaire::factory()
        ->create();

    $question = Question::factory([
        'uuid' => 'eerste-question-uuid',
        'questionnaire_id' => $questionnaire->id,
    ])->create();

    $answer = Answer::factory([
        'uuid' => 123,
        'question_id' => $question->id,
        'correct' => true,
        'answer' => 'x',
        'explanation_correct' => 'expl_correct',
    ])->create();


    // act
    $var = app(QuestionnaireService::class);
    $data = $var->verifySubmission(
        [
            [
                'questionUuid' => $question->uuid,
                'answers' => [
                    $answer->uuid,
                ],
            ]
        ],
        $questionnaire
    );

    // assert
    expect($data['questions'][0]['answers'][0]['explanation'])->toBe('expl_correct');
});



test('Test that number checks for the grade', function () {
    // prepare
    $questionnaire = Questionnaire::factory()
        ->create();

    $question = Question::factory([
        'uuid' => 'eerste-question-uuid',
        'questionnaire_id' => $questionnaire->id,
//        'grade' => 0
    ])->create();

    $answer = Answer::factory([
        'uuid' => 123,
        'question_id' => $question->id,
        'correct' => true,
        'answer' => 'x',
        'explanation_correct' => 'expl_correct',
    ])->create();

    // act
    $var = app(QuestionnaireService::class);
    $data = $var->verifySubmission(
        [
            [
                'questionUuid' => $question->uuid,
                'answers' => [
                    $answer->uuid,
                ],
            ]
        ],
        $questionnaire
    );

    // assert
    expect($data['grade'])->toBe(10.0);
});



test('Test that number checks for passed', function () {
    // prepare
    $questionnaire = Questionnaire::factory()
        ->create();

    $question = Question::factory([
        'uuid' => 'eerste-question-uuid',
        'questionnaire_id' => $questionnaire->id,
    ])->create();

    $answer = Answer::factory([
        'uuid' => 123,
        'question_id' => $question->id,
        'correct' => true,
        'answer' => 'x',
    ])->create();

    // act
    $var = app(QuestionnaireService::class);
    $data = $var->verifySubmission(
        [
            [
                'questionUuid' => $question->uuid,
                'answers' => [
                    $answer->uuid,
                ],
            ]
        ],
        $questionnaire
    );

    // assert
    expect($data['passed'])->toBeTrue();
});