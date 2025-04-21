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
        Schema::create('customizable_store_features', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique()->nullable();
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->enum('type', [1, 2, 3, 4, 5, 6, 7, 8, 9])->nullable();
            $table->enum('store_type', [1, 2, 3])->default(3)->nullable();
            $table->boolean('is_required')->default(false)->nullable();
            $table->tinyInteger('status')->default(1)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customizable_store_features');
    }
};
