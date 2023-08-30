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
        Schema::create('request_details', function (Blueprint $table) {
            $table->id();
            $table->enum('type',['Institution_Teacher','Institution_Student','Teacher_Student'])->nullable();
            $table->enum('sender_type',['Institution','Teacher','Student']);
            $table->bigInteger('sender_id')->unsigned()->default(0); 
            $table->enum('receiver_type',['Institution','Teacher','Student']);
            $table->bigInteger('receiver_id')->unsigned()->default(0); 
            $table->enum('status',['Pending','Approved'])->default('Pending');
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
        Schema::dropIfExists('request_details');
    }
};
