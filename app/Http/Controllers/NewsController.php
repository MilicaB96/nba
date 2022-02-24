<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\SUpport\Facades\DB;

class NewsController extends Controller
{
    protected $model = News::class;
    public function index()
    {
        DB::listen(function ($query) {
            info($query->sql);
        });

        $news = News::with('user')->paginate(5); //eager loading
        return view('news.news', compact('news'));
    }
    public function show($id)
    {
        $news = News::findOrFail($id);
        return view('news.article', compact('news'));
    }
}
