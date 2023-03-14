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

        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tournament_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('name', 255)->unique();
            $table->string('public_name', 255);
            $table->char('short_code', 4);
            $table->string('logo', 255);
            $table->string('owner', 255)->nullable();
            $table->string('owner_email', 100)->nullable();
            $table->string('owner_phone', 100)->nullable();
            $table->text('about');
            $table->boolean('archive_team');
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
        Schema::dropIfExists('teams');
    }
};
