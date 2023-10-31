<?php

use App\Models\Slot;
use App\Models\User;
use App\Models\Clinic;
use App\Models\Treatment;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->foreignId('patient_id')
                ->constrained('patients')
                ->cascadeOnDelete();
            $table->string('status')->default('created');
            $table->date('date')->nullable();
            $table->foreignIdFor(Slot::class);
            $table->foreignIdFor(Clinic::class)->nullable();            
            $table->foreignIdFor(User::class, 'doctor_id')->nullable();            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
