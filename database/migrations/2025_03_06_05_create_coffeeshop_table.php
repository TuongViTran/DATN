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
        Schema::create('coffeeshop', function (Blueprint $table) {
            $table->id();
            $table->string('shop_name')->nullable();
            $table->string('phone', 15)->nullable();
            $table->foreignId('user_id')->nullable()->constrained('user');
            $table->text('description')->nullable();
            $table->foreignId('address_id')->nullable()->constrained('addresses');
            $table->enum('status', ['open', 'closed'])->default('open');
            $table->time('opening_time')->nullable();
            $table->time('closing_time')->nullable();
            $table->string('parking')->nullable();
            $table->string('wifi_password')->nullable();
            $table->string('hotline', 20)->nullable();
            $table->float('rating')->nullable();
            $table->integer('likes')->default(0);
            $table->decimal('average_price', 10, 2)->nullable();
            $table->foreignId('styles_id')->nullable()->constrained('styles');
            $table->foreignId('social_network_id')->nullable()->constrained('social_network');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coffeeshop');
    }
};
