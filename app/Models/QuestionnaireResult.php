<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperQuestionnaireResult
 */
class QuestionnaireResult extends Model
{
    use HasFactory;

    public $timestamps = true;
}
