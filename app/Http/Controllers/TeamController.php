<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::all();
        return view('teams', compact('teams'));
    }
    public function show($id)
    {
        $team = Team::findOrFail($id);
        return view('team', compact('team'));
    }
}
