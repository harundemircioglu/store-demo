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
        Schema::create('store_features', function (Blueprint $table) {
            $table->id();
            $table->foreignId('store_id')
                ->nullable()
                ->constrained('stores')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('customizable_store_features_id')
                ->nullable()
                ->constrained('customizable_store_features')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('value')->nullable();
            $table->tinyInteger('status')->default(1)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('store_features');
    }
};
