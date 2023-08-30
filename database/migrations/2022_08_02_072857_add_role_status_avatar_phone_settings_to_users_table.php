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
        Schema::table('users', function (Blueprint $table) {
            $table->enum('status',['active','inactive','suspended'])->default('active');
            $table->enum('role',['1','2','3','4'])->default('1')->comment('1.Student , 2.Teacher, 3.Institution, 4.Admin default 1');
            $table->string('avatar')->default('');
            $table->string('phone')->default('');
            $table->longText('settings')->default('');
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
