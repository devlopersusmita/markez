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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title')->default('');
            $table->string('slug')->default('');
            $table->enum('status',['active','inactive'])->default('active');
            $table->longText('description')->default('');
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->string('preview_image')->default('');
            $table->string('preview_video')->nullable();
            $table->double('price', 8, 2)->default(0.0);
            $table->integer('students_limit')->default(0);
            $table->longText('tags')->default('');
            $table->boolean('visibility')->default(1);
            $table->bigInteger('category_id')->unsigned();
            $table->enum('type',['zoom','video','text'])->default('zoom');
            $table->dateTime('start_date', $precision = 0)->nullable();
            $table->dateTime('end_date', $precision = 0)->nullable();
            $table->double('average_rating', 8, 4)->default(0.0);
            $table->integer('total_comments')->default(0);
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
        Schema::dropIfExists('courses');
    }
};
