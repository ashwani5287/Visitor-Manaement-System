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
        Schema::create('add_student_details', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('stuFather')->nullable();
            $table->string('fatherMobile')->nullable();
            $table->string('admissionNo')->unique();
            $table->string('stusection')->nullable();

            $table->string('stuclass')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('add_student_details');
    }
};
