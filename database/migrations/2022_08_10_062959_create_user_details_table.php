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
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->enum('user_type',['Student','Teacher','Institution','Admin'])->default('Student');
            $table->string('address')->default('');
            $table->text('description')->nullable();
            $table->bigInteger('country_id')->unsigned()->default(0); 
            $table->bigInteger('city_id')->unsigned()->default(0); 
            $table->dateTime('subscription_start_date')->nullable();
            $table->dateTime('subscription_end_date')->nullable();
            $table->bigInteger('user_id')->unsigned()->default(0); 
            $table->bigInteger('created_by')->unsigned()->default(0);
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
        Schema::dropIfExists('user_details');
    }
};
