<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Answer
 *
 * @property int $id
 * @property string $uuid
 * @property int $question_id
 * @property string $answer
 * @property int $correct
 * @property string|null $explanation_correct
 * @property string|null $explanation_incorrect
 * @property string|null $deleted_at
 * @method static \Database\Factories\AnswerFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Answer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Answer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Answer query()
 * @method static \Illuminate\Database\Eloquent\Builder|Answer whereAnswer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Answer whereCorrect($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Answer whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Answer whereExplanationCorrect($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Answer whereExplanationIncorrect($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Answer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Answer whereQuestionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Answer whereUuid($value)
 * @mixin \Eloquent
 */
	class IdeHelperAnswer {}
}

namespace App\Models{
/**
 * App\Models\Question
 *
 * @property int $id
 * @property string $uuid
 * @property int $questionnaire_id
 * @property string $question
 * @property string $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Answer> $answers
 * @property-read int|null $answers_count
 * @method static \Database\Factories\QuestionFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Question newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Question newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Question query()
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereQuestion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereQuestionnaireId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereUuid($value)
 * @mixin \Eloquent
 */
	class IdeHelperQuestion {}
}

namespace App\Models{
/**
 * App\Models\Questionnaire
 *
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property string $min_percentage
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\QuestionnaireResult> $questionnaireResults
 * @property-read int|null $questionnaire_results_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Question> $questions
 * @property-read int|null $questions_count
 * @method static \Database\Factories\QuestionnaireFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Questionnaire newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Questionnaire newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Questionnaire query()
 * @method static \Illuminate\Database\Eloquent\Builder|Questionnaire whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Questionnaire whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Questionnaire whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Questionnaire whereMinPercentage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Questionnaire whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Questionnaire whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Questionnaire whereUuid($value)
 * @mixin \Eloquent
 */
	class IdeHelperQuestionnaire {}
}

namespace App\Models{
/**
 * App\Models\QuestionnaireResult
 *
 * @property int $id
 * @property string $uuid
 * @property int $questionnaire_id
 * @property int $passed
 * @property float $grade
 * @property mixed $submission
 * @property \Illuminate\Support\Carbon $created_at
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionnaireResult newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionnaireResult newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionnaireResult query()
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionnaireResult whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionnaireResult whereGrade($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionnaireResult whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionnaireResult wherePassed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionnaireResult whereQuestionnaireId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionnaireResult whereSubmission($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionnaireResult whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionnaireResult whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionnaireResult whereUuid($value)
 * @mixin \Eloquent
 */
	class IdeHelperQuestionnaireResult {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperUser {}
}

