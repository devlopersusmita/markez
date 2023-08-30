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
         Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('payment_id')->nullable();
            $table->bigInteger('order_id')->unsigned()->nullable();
            $table->string('status')->nullable();
            $table->integer('amount')->unsigned()->nullable();
            $table->integer('fee')->unsigned()->nullable();
            $table->string('currency')->nullable();
            $table->string('refunded_at')->nullable();
            $table->integer('captured')->unsigned()->nullable();
            $table->string('captured_at')->nullable();
            $table->string('voided_at')->nullable();
            $table->string('description')->nullable();
            $table->string('amount_format')->nullable();
            $table->string('fee_format')->nullable();
            $table->string('refunded_format')->nullable();
            $table->string('captured_format')->nullable();
            $table->string('ip')->nullable();
            $table->string('created_at')->nullable();
            $table->string('updated_at')->nullable();             
            $table->bigInteger('user_id')->unsigned()->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('payments', function (Blueprint $table) {
            //
        });
    }
};
