<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Match extends Model
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
        'referee_id' => 'integer',
        'home_team_id' => 'integer',
        'away_team_id' => 'integer',
    ];

    public function matchGols(): HasMany
    {
        return $this->hasMany(MatchGol::class);
    }

    public function tournament(): BelongsTo
    {
        return $this->belongsTo(Tournament::class);
    }

    public function referee(): BelongsTo
    {
        return $this->belongsTo(Referee::class);
    }

    public function homeTeam(): BelongsTo
    {
        return $this->belongsTo(HomeTeam::class);
    }

    public function awayTeam(): BelongsTo
    {
        return $this->belongsTo(AwayTeam::class);
    }
}
