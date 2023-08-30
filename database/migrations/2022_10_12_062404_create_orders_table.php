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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('course_id')->unsigned()->default(0);    
            $table->bigInteger('user_id')->unsigned()->default(0); 
            $table->enum('status',['Pending','Paid','Processing','Shipped','Completed'])->default('Pending');           
            $table->double('total', 8, 2)->default(0.0);
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
        Schema::table('orders', function (Blueprint $table) {
            //
        });
    }
};
