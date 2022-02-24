<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\DB;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::all();
        return view('teams', compact('teams'));
    }
    public function show($id)
    {
        info(' 222...');
        DB::listen(function ($query) {
            info($query->sql);
        });
        $team = Team::with('news')->findOrFail($id);
        $news = $team->news()->paginate(5);

        return view('team', compact('team', 'news'));
    }
}
