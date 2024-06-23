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
        Schema::create('student_with_drivers', function (Blueprint $table) {
            $table->id();
            $table->string('Driver_id');
            $table->string('name')->nullable();
            $table->string('stuFather')->nullable();
            $table->string('fatherMobile')->nullable();
            $table->string('admissionNo')->unique();
            $table->string('stusection')->nullable();
            $table->string('stuclass')->nullable();
            $table->string('image')->nullable();

            $table->foreign('Driver_id')->references('driver_ID')->on('drivers')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_with_drivers');
    }
};
