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
        Schema::table('training_sessions', function (Blueprint $table) {
              // $table->foreignId('attendance_id')->nullable()->constrained();
        
            $table->unsignedBigInteger('attendance_id');
            $table->foreign('attendance_id')->references('id')->on('attendance')->onUpdate('cascade')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('training_session', function (Blueprint $table) {
            //
        });
    }
};
