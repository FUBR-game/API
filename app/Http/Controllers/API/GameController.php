<?php

namespace App\Http\Controllers\API;

use App\Game;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;


class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return response()->json(Game::paginate(500));
    }

    /**
     * Display the specified resource.
     *
     * @param Game $game
     * @return Response
     */
    public function show(Game $game)
    {
        $game->load('players');
        return response()->json($game);
    }

    public function logs(Game $game)
    {
        return response()->json($game->game_logs);
    }
}
