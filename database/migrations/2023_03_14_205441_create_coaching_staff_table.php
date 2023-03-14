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
        Schema::disableForeignKeyConstraints();

        Schema::create('coaching_staff', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->char('coaching_staff_type', 4);
            $table->string('firstname', 255);
            $table->string('lastname', 255);
            $table->date('date_of_birth');
            $table->boolean('sex');
            $table->string('email', 100)->nullable();
            $table->string('phone', 100)->nullable();
            $table->boolean('is_active');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coaching_staff');
    }
};
