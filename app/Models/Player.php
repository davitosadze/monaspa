<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;
    protected $fillable = ["first_name", "last_name", "username", "birth_date", "role", "biography", "country", "team_id"];


    public function heroes()
    {
        return $this->hasMany(PlayerHero::class);
    }

    public function social_networks()
    {
        return $this->hasMany(PlayerSocialNetwork::class);
    }

    public function hasSocial($network_id)
    {
        foreach ($this->social_networks as $network) {
            if ($network_id == $network->network_id) {
                return 1;
            }
        }
        return 0;
    }

    public function getSocialLink($network_id)
    {
        return $this->social_networks()->where('network_id', $network_id)->first()->link;
    }
}
