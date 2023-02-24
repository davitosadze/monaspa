<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayerSocialNetwork extends Model
{
    use HasFactory;
    protected $fillable = ["player_id", "network_id", "link"];

    public function network()
    {
        return $this->belongsTo(SocialNetwork::class, 'network_id');
    }
}
