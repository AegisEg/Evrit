<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Mail\FeedMail;
use Mail;

class SendMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $template, $name, $message, $confirmation_link, $mail, $title;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($template, $mail, $name, $confirmation_link, $message, $title)
    {
        $this->template = $template;
        $this->title = $title;
        $this->mail = $mail;
        $this->confirmation_link = $confirmation_link;
        $this->name = $name;
        $this->message = $message;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if ($this->attempts() < 3) {
            try {
                Mail::to($this->mail)->send(new FeedMail($this->template, $this->name, $this->message, $this->confirmation_link, $this->title, $this->mail));
            } catch (\Exception $e) {
                dump($e);
            }
        }
    }
}
