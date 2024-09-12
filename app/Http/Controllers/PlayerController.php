<?php
namespace App\Http\Controllers;

use App\Models\Player;
use Inertia\Inertia;

class PlayerController extends Controller
{
    public function index()
    {
        $players = Player::all()->pluck('name');
        return Inertia::render('Players', [
            'players' => $players,
        ]);
    }
}
