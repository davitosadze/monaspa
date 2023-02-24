<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Game extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = ["game_date", "opponent_name", "opponent_link", "opponent_point", "our_point", "team_id"];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
