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
        Schema::create('institution_subscriptions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('institution_subcription_package_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('created_by')->unsigned();
            $table->bigInteger('days')->unsigned()->default(0);
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
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
        Schema::dropIfExists('institution_subscriptions');
    }
};
