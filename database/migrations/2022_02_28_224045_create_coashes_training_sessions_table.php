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
        Schema::create('coaches_training_sessions', function (Blueprint $table) {
            $table->unsignedBigInteger('coach_id');
            $table->foreign('coach_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('training_session_id');
            $table->foreign('training_session_id')->references('id')->on('training_sessions')->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['coach_id', 'training_session_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coaches_training_sessions');
    }
};
