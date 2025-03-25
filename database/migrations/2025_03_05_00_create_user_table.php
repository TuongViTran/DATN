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
        Schema::create('users', function (Blueprint $table) { // Đổi từ 'user' -> 'users'
            $table->id(); // => bigint unsigned
            $table->string('full_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone', 15)->nullable();

            // $table->string('avatar_url')->nullable(); 
            // $table->string('account_type'); 

            $table->string('avatar_url')->nullable(); // Thêm cột avatar_url
            $table->enum('account_type', ['user','owner', 'admin'])->default('user');
            $table->rememberToken();
            $table->timestamps();
           

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users'); // Đổi từ 'user' -> 'users'
    }
};

