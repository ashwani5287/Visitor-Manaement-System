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
        Schema::create('o_t_p_details_driver_with_students', function (Blueprint $table) {
            $table->id();
            $table->string('driver_ID')->nullable();
            $table->string('name')->nullable();;
            $table->string('dob')->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->string('mobile')->nullable();;
            $table->string('alternate_mobile')->nullable();
            $table->string('document_type')->nullable();
            $table->string('document')->nullable(); // This can store the file path or URL
            $table->text('address')->nullable();
            $table->string('pin_code')->nullable();
            $table->string('driver_image')->nullable();; // This can store the file path or URL
            $table->string('driver_vehicle_Number')->nullable(); // This can store the file path or URL
            $table->string('vehicle_Color')->nullable(); // This can store the file path or URL
            $table->string('vehicle_Type')->nullable(); // This can store the file path or URL
            $table->string('OTP')->nullable(); // This can store the file path or URL
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('o_t_p_details_driver_with_students');
    }
};
