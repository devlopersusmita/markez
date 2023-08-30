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
        Schema::table('payments', function (Blueprint $table) {
            $table->string('type')->nullable();
            $table->string('company')->nullable();
            $table->string('name')->nullable();
            $table->string('number')->nullable();
            $table->string('gateway_id')->nullable();
            $table->string('reference_number')->nullable();
            $table->string('token')->nullable();
            $table->string('transaction_url')->nullable();
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
