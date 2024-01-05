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
        Schema::table('questionnaire_results', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');

            $table->foreign('user_id', 'ref_result_to_user')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('questionnaire_results', function (Blueprint $table) {
            $table->dropForeign('ref_result_to_user');
            $table->dropColumn('user_id');
        });
    }



//    public function reference(): void
//    {
//        schema::table('questionnaire_results', function (Blueprint $table)
//        {
//            $table->foreign('user_id', 'ref_result_to_user')
//                ->references('id')
//                ->on('users')
//                ->onDelete('cascade')
//                ->onUpdate('cascade');
//        });
//    }
};
