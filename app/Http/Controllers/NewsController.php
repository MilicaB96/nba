<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNewsRequest;
use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\DB;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;


class NewsController extends Controller
{
    protected $model = News::class;
    public function index()
    {
        DB::listen(function ($query) {
            info($query->sql);
        });

        $news = News::with('user')->orderBy('created_at', 'desc')->paginate(5); //eager loading
        return view('news.news', compact('news'));
    }
    public function show($id)
    {
        $news = News::findOrFail($id);
        return view('news.article', compact('news'));
    }
    public function create()
    {
        $teams = Team::all();
        return view('news.create', compact('teams'));
    }
    public function store(StoreNewsRequest $request)
    {
        $data = $request->validated();
        $news = Auth::user()->news()->create($data);
        $news->teams()->attach($data['teams']);
        $request->session()->flash('flashMessage', 'Thank you for
publishing article on www.nba.com');
        return redirect('/news');
    }
}
