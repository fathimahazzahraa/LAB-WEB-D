<?php
// database/migrations/xxxx_xx_xx_add_user_id_to_rentals.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToRentals extends Migration
{
    public function up()
    {
        Schema::table('rentals', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained(); // Jika menggunakan Laravel 7 atau versi lebih baru
            // $table->unsignedBigInteger('user_id'); // Jika menggunakan Laravel versi sebelumnya
            // $table->foreign('user_id')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::table('rentals', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });
    }
}
