<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Mail\CommentReceived;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
{
    public function store($team_id, StoreCommentRequest $request)
    {
        $data = $request->validated();
        $user = auth()->user();
        $user_id = $user->id;
        $test = array_merge($data, ['user_id' => $user_id, 'team_id' => $team_id]);
        $content = $test['content'];


        if (str_contains($content, 'hate') || str_contains($content, 'stupid') || str_contains($content, 'idiot')) {
            return view('forbidden-comment');
        } else {
            $comment = Comment::create($test);
            Mail::to($comment->team->email)->send(new CommentReceived($user, $comment));
            return back();
        }
    }
}
