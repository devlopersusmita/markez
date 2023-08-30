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
        Schema::create('quiz_response_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('quiz_response_id')->unsigned()->nullable();
             $table->bigInteger('course_content_quiz_id')->unsigned()->nullable();
             $table->bigInteger('user_id')->unsigned()->nullable();
             $table->bigInteger('question_id')->unsigned()->nullable();
             $table->string('correct_option')->nullable();
             $table->string('user_response')->nullable();
             $table->double('score', 8, 4)->default(0.0);
             $table->timestamps();
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
