<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Player;
use App\Models\PlayerHero;
use App\Models\PlayerSocialNetwork;
use App\Models\SocialNetwork;
use App\Models\Team;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Team $team)
    {
        return view('admin.players.index', compact('team'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Team $team)
    {
        $social_networks = SocialNetwork::all();
        return view('admin.players.create', compact('social_networks', "team"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Team $team, Request $request)
    {


        $player = Player::create($request->all());

        foreach ($request->social_networks as $network_id => $link) {
            if ($link) {
                PlayerSocialNetwork::create([
                    "player_id" => $player->id,
                    "link" => $link,
                    "network_id" => $network_id
                ]);
            }
        }

        foreach ($request->heroes as $hero) {
            PlayerHero::create([
                "player_id" => $player->id,
                "hero_name" => $hero["hero_name"],
                "percentage" => $hero["percentage"]
            ]);
        }


        return redirect()->back()->withSuccess("Player Created");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Player $player)
    {
        $social_networks = SocialNetwork::all();
        return view('admin.players.show', compact('player', 'social_networks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Player $player)
    {
        $player->fill($request->all())->save();
        $player->heroes()->delete();

        if ($request->get('heroes')) {
            foreach ($request->heroes as $hero) {
                PlayerHero::create([
                    "player_id" => $player->id,
                    "hero_name" => $hero["hero_name"],
                    "percentage" => $hero["percentage"]
                ]);
            }
        }

        $player->social_networks()->delete();
        if ($request->get('social_networks')) {
            foreach ($request->social_networks as $network_id => $link) {
                PlayerSocialNetwork::create([
                    "player_id" => $player->id,
                    "link" => $link,
                    "network_id" => $network_id
                ]);
            }
        }

        return back()->withSuccess('Player Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Player $player)
    {
        $player->delete();
        return back()->withSuccess('Player Successfully Deleted');
    }
}
