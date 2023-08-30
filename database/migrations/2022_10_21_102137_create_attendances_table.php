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
        Schema::create('attendances', function (Blueprint $table) {
             $table->id();
             $table->bigInteger('online_class_id')->unsigned()->nullable();
             $table->bigInteger('user_id')->unsigned()->nullable();
             $table->bigInteger('created_by')->unsigned()->nullable();
             $table->enum('created_by_type',['Student','Teacher','Institution','Admin'])->default('Teacher');           
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
        Schema::table('attendances', function (Blueprint $table) {
            //
        });
    }
};
