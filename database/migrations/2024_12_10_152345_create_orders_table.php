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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            
            // Use createForeignId method with exists check
            $table->unsignedBigInteger('user_id');
            if (Schema::hasTable('users')) {
                $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');
            }

            $table->unsignedBigInteger('cleaner_id')->nullable();
            if (Schema::hasTable('cleaners')) {
                $table->foreign('cleaner_id')
                    ->references('id')
                    ->on('cleaners')
                    ->onDelete('set null');
            }

            $table->unsignedBigInteger('service_id');
            if (Schema::hasTable('services')) {
                $table->foreign('service_id')
                    ->references('id')
                    ->on('services')
                    ->onDelete('cascade');
            }

            $table->enum('status', ['pending', 'in_progress', 'completed', 'cancelled'])->default('pending');
            $table->timestamp('order_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};