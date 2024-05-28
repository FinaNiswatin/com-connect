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
        Schema::create('user_kegiatan', function (Blueprint $table) {
            $table->unsignedBiginteger('users_id');
            $table->unsignedBiginteger('kegiatan_id');
            $table->boolean('claim')->default(0);


            $table->foreign('users_id')->references('id_users')
                 ->on('users')->onDelete('cascade');
            $table->foreign('kegiatan_id')->references('id_kegiatan')
                ->on('kegiatan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_kegiatan');
    }
};
