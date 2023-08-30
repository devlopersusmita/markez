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
        Schema::create('quiz_responses', function (Blueprint $table) {
             $table->id();
             $table->bigInteger('course_content_quiz_id')->unsigned()->nullable();
             $table->bigInteger('user_id')->unsigned()->nullable();
             $table->double('total_score', 8, 4)->default(0.0);
             $table->integer('full_marks')->unsigned()->default(0);
             $table->double('score_percentage', 8, 4)->default(0.0);
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
        Schema::table('quiz_responses', function (Blueprint $table) {
            //
        });
    }
};
