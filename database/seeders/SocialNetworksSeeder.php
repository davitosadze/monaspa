<?php

namespace Database\Seeders;

use App\Models\SocialNetwork;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SocialNetworksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $networks = [
            "Twitter",
            "Twitch",
            "Discord",
            "Youtube",
            "Instagram"
        ];

        foreach ($networks as $network) {
            SocialNetwork::create([
                "network_name" => $network
            ]);
        }
    }
}
