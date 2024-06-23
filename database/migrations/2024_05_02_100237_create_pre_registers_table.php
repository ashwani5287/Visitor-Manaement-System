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
        Schema::create('pre_registers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('Mobile')->nullable();
            $table->string('image')->nullable();
            $table->text('meeting')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pre_registers');
    }
};
