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
        Schema::create('institution_subscription_packages', function (Blueprint $table) {
            $table->id();


            $table->string('title')->default('');
            $table->bigInteger('order_no')->unsigned();
            $table->double('price', 8, 2)->default(0.0);
            $table->bigInteger('days')->unsigned()->default(0);
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
        Schema::dropIfExists('institution_subscription_packages');
    }
};
