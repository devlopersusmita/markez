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
        Schema::create('course_contents', function (Blueprint $table) {
            $table->id();
            $table->string('title')->default('');
            $table->string('slug')->default('');
            $table->enum('status',['active','inactive'])->default('active');
            $table->longText('description')->default('');
            $table->boolean('visibility')->default(1);
            $table->bigInteger('course_id')->unsigned();
            $table->enum('type',['zoom','video','text'])->default('zoom');
            $table->longText('content')->default('');
            $table->string('video_url')->default('');
            $table->string('zoom_url')->default('');
            $table->dateTime('start_date', $precision = 0)->nullable();
            $table->dateTime('end_date', $precision = 0)->nullable();
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
        Schema::dropIfExists('course_contents');
    }
};
