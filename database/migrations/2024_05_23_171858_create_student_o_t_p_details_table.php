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
        Schema::create('student_o_t_p_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('register_id'); // Assuming this is the foreign key reference
            $table->string('StudentName')->nullable();
            $table->string('FatherName')->nullable();
            $table->string('FatherMobile')->nullable();
            $table->string('AdmissionNo')->nullable();
            $table->string('StudentSection')->nullable();
            $table->string('StudentClass')->nullable();
            $table->string('StudentOTP')->nullable();
            $table->foreign('register_id')->references('id')->on('add_student_details')->onDelete('cascade');






            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_o_t_p_details');
    }
};
