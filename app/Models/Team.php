<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'tournament_id' => 'integer',
        'archive_team' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function players(): HasMany
    {
        return $this->hasMany(Player::class);
    }

    public function coachingStaffs(): HasMany
    {
        return $this->hasMany(CoachingStaff::class);
    }

    public function tournament(): BelongsTo
    {
        return $this->belongsTo(Tournament::class);
    }
}
