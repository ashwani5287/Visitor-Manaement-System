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
        Schema::dropIfExists('student_o_t_p_verifications');
        Schema::create('student_o_t_p_verifications', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('register_id'); // Assuming this is the foreign key reference

            $table->string('studnet_id')->nullable();
            $table->string('name')->nullable();
            $table->string('Mobile')->nullable();
            $table->string('Father')->nullable();
            $table->string('image')->nullable();
            $table->text('meeting')->nullable();
            $table->string('class')->nullable();
            $table->string('section')->nullable();
            $table->string('OTP')->nullable();

            $table->timestamps();
            
            // $table->foreign('register_id')->references('id')->on('registers')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_o_t_p_verifications');
    }
};
