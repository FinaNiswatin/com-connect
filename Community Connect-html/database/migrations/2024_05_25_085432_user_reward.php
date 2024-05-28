<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_reward', function (Blueprint $table) {
            $table->unsignedBiginteger('users_id');
            $table->unsignedBiginteger('reward_id');
            


            $table->foreign('users_id')->references('id_users')
                 ->on('users')->onDelete('cascade');
            $table->foreign('reward_id')->references('id_reward')
                ->on('reward')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_reward');
    }
};
