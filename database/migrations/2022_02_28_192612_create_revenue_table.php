<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRevenueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('revenue', function (Blueprint $table) {
            $table->id();
            $table->double('price');
            $table->integer('payment_id');
            $table->enum('statuses',['paid','pend','refund'])->default('pend');
            $table->integer('visa_number');
            $table->string('payment_method');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('revenue');
    }
}
