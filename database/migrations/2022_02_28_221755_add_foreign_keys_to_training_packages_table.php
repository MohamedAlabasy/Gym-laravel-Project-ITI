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
        Schema::table('training_packages', function (Blueprint $table) {
              // $table->foreignId('training_session_id')->nullable()->constrained();
            
            $table->unsignedBigInteger('training_session_id');
            $table->foreign('training_session_id')->references('id')->on('training_sessions')->onUpdate('cascade')->onDelete('cascade');
            
            $table->unsignedBigInteger('revenue_id');
            $table->foreign('revenue_id')->references('id')->on('revenues')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('training_package', function (Blueprint $table) {
            //
        });
    }
};
