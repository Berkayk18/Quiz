<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @mixin IdeHelperQuestionnaire
 */
class Questionnaire extends Model
{
    use HasFactory;
    // connect database tables with each other


    public function questions(): HasMany
    {
        return $this->hasMany(Question::class);
    }

    public function questionnaireResults()
    {
        return $this->hasMany(QuestionnaireResult::class);
    }
}
