<?php

namespace App\Mail;

use App\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Report extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $day = date('j');
        $dayAndMonth = $day.'/'.date('m').'/'.date('Y');
        $posts = Post::where('status', 'publish', 'and')
                            ->whereDay('created_at', '=', $day)
                            ->latest()
                            ->get();

        return $this->subject('Resumen '.$dayAndMonth)
                    ->view('emails.report')
                    ->with([
                        'dayAndMonth' => $dayAndMonth,
                        'posts' => $posts,
                    ]);
    }
}
