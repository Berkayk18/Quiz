<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('questionnaires', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid();
            $table->string('name');
            $table->decimal('min_percentage');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('questionnaire_results', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid();
            $table->unsignedInteger('questionnaire_id');
            $table->boolean('passed');
            $table->float('grade');
            $table->json('submission');
            $table->timestamp('created_at');

            $table->foreign('questionnaire_id', 'ref_questionnaire_results_to_questionnaire')
                ->references('id')
                ->on('questionnaires')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid();
            $table->unsignedInteger('questionnaire_id');
            $table->string('question');
            $table->enum('type', [
                'MULTIPLE_CHOICE_SINGLE',
                'MULTIPLE_CHOICE_MULTIPLE',
                'OPEN',
                'DROPDOWN',
            ]);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('questionnaire_id', 'ref_question_to_questionnaire')
                ->references('id')
                ->on('questionnaires')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        Schema::create('answers', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid();
            $table->unsignedInteger('question_id');
            $table->string('answer');
            $table->boolean('correct');
            $table->string('explanation_correct')->nullable();
            $table->string('explanation_incorrect')->nullable();
            $table->softDeletes();

            $table->foreign('question_id', 'ref_answer_to_question')
                ->references('id')
                ->on('questions')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('answers');
        Schema::drop('questions');
        Schema::drop('questionnaire_results');
        Schema::drop('questionnaires');
    }
};
