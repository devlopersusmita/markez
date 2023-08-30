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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('sender_id')->unsigned();           
            $table->enum('sender_type',['Student','Teacher','Institution'])->nullable();
            $table->bigInteger('receiver_id')->unsigned();           
            $table->enum('receiver_type',['Student','Teacher','Institution'])->nullable();
            $table->longText('contents')->default('');
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
        Schema::dropIfExists('messages');
    }
};
