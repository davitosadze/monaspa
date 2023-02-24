<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\GameResource;
use App\Models\Game;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index($filter)
    {
        $games = Game::with('media', 'team');

        if ($filter == "future") {
            $games->whereDate('game_date', '>', Carbon::now());
        } elseif ($filter == "past") {
            $games->whereDate('game_date', '<', Carbon::now());
        }
        return $games->get();

        return GameResource::collection($games->get());
    }

    public function details($id)
    {
        $game = Game::where('id', $id)
            ->with('media', 'team')
            ->first();

        return new GameResource($game);
    }
}
