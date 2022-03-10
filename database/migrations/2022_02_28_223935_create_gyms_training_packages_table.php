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
        Schema::create('gyms_training_packages', function (Blueprint $table) {
            $table->unsignedBigInteger('gym_id');
            $table->foreign('gym_id')->references('id')->on('gyms')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('training_package_id');
            $table->foreign('training_package_id')->references('id')->on('training_packages')->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['gym_id', 'training_package_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_gyms_training_packages');
    }
};
