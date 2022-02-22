<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store($team_id, StoreCommentRequest $request)
    {
        $data = $request->validated();
        $user_id = auth()->user()->id;
        $test = array_merge($data, ['user_id' => $user_id, 'team_id' => $team_id]);
        $content = $test['content'];
        if (str_contains($content, 'hate') || str_contains($content, 'stupid') || str_contains($content, 'idiot')) {
            return view('forbidden-comment');
        } else {
            $comment = Comment::create($test);
            return back();
        }
        // info($test);
    }
}
