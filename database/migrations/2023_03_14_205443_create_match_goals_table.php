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

        Schema::create('match_goals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('match_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('player_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('player_name', 255);
            $table->smallInteger('number');
            $table->char('position', 4);
            $table->smallInteger('minute');
            $table->boolean('is_penalty');
            $table->boolean('penalty_shoots');
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
        Schema::dropIfExists('match_goals');
    }
};
