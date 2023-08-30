<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('quiz_response_details', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('course_content_quiz_id')->references('id')->on('quizes');
            $table->foreign('quiz_response_id')->references('id')->on('quiz_responses');
            $table->foreign('question_id')->references('id')->on('questions');

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('quiz_response_details', function (Blueprint $table) {
            //
        });
    }
};
