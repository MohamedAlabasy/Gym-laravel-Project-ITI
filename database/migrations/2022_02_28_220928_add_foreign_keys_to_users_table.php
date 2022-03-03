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
            //
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
              // $table->foreignId('training_package_id')->nullable()->constrained();
            
            $table->unsignedBigInteger('training_package_id');
            $table->foreign('training_package_id')->references('id')->on('training_packages')->onUpdate('cascade')->onDelete('cascade');
            
            $table->unsignedBigInteger('attendance_id');
            $table->foreign('attendance_id')->references('id')->on('attendance')->onUpdate('cascade')->onDelete('cascade');
            
            $table->unsignedBigInteger('revenue_id');
            $table->foreign('revenue_id')->references('id')->on('revenues')->onUpdate('cascade')->onDelete('cascade');
        });
    }
};
