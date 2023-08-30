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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->longText('question_text')->default('');
            $table->longText('option_a')->default('');
            $table->longText('option_b')->default('');
            $table->longText('option_c')->default('');
            $table->longText('option_d')->default('');
            $table->enum('answer',['a','b','c','d'])->nullable();
            $table->enum('status',['active','inactive'])->default('active');
            $table->bigInteger('created_by')->unsigned(); 



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
        Schema::dropIfExists('questions');
    }
};
