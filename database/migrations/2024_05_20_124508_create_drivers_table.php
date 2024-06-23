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
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
         
            $table->string('driver_ID')->unique();
            $table->string('name');
            $table->string('dob');
            $table->enum('gender', ['male', 'female', 'other']);
            $table->string('mobile');
            $table->string('alternate_mobile')->nullable();
            $table->string('document_type');
            $table->string('document'); // This can store the file path or URL
            $table->text('address');
            $table->string('pin_code');
            $table->string('driver_image'); // This can store the file path or URL
            $table->string('driver_vehicle_Number'); // This can store the file path or URL
            $table->string('vehicle_Color')->nullable(); // This can store the file path or URL
            $table->string('vehicle_Type')->nullable(); // This can store the file path or URL

            $table->string('Driver_email')->unique()->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drivers');
    }
};
