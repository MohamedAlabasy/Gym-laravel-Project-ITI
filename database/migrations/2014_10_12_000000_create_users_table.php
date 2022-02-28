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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();

            $table->string('email')->unique()->index();
            $table->boolean('is_verifications')->nullable();
            $table->timestamp('email_verified_at')->nullable();

            $table->string('national_id')->unique()->nullable();

            $table->string('password');
            $table->rememberToken();

            $table->enum('gender'.['male','female'])->nullable();
            $table->enum('type',['admin','city_manger','gym_manger','coach','user'])->nullable();
            $table->string('profile_image')->nullable();
            $table->date('birth_date')->nullable();
            
            $table->timestamp('last_login_at')->useCurrent();
            
            $table->boolean('is_band')->nullable();
    
            $table->softDeletes();
            $table->timestamps();

            $table->foreignId('gym_id')->nullable()->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
