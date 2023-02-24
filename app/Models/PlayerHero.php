<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayerHero extends Model
{
    use HasFactory;
    protected $fillable = ["player_id", "hero_name", "percentage"];
}
