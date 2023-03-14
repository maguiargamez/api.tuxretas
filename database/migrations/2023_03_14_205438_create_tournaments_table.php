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

        Schema::create('tournaments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('league_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('name', 255)->unique();
            $table->string('public_name', 255);
            $table->char('short_code', 4);
            $table->integer('sequence');
            $table->smallInteger('promotion_zone');
            $table->smallInteger('relegation_zone');
            $table->boolean('featured_position');
            $table->boolean('hide_ranking');
            $table->boolean('hide_players');
            $table->boolean('hide_field');
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
        Schema::dropIfExists('tournaments');
    }
};
