<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CommentReceived extends Mailable
{
    use Queueable, SerializesModels;
    private $comment;
    private $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $comment)
    {
        $this->user = $user;
        $this->comment = $comment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.comment-received')->with([
            'userName' => $this->user->name,
            'teamName' => $this->comment->team->name,
            'commentContent' => $this->comment->content,
        ]);
    }
}
