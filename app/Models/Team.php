<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Team extends Model implements HasMedia
{
    protected $fillable = ["team_name", "logo", "slug"];
    use HasFactory;
    use InteractsWithMedia;

    public function players()
    {
        return $this->hasMany(Player::class);
    }
}
