<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
class FeedMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $template,$name,$message,$confirmation_link,$mail;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($template,$name,$message,$confirmation_link,$title,$mail)
    {
        $this->template=$template;
        $this->title=$title;
        $this->confirmation_link = $confirmation_link;
        $this->name=$name;
        $this->mail=$mail;
        $this->message=$message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {       
        $info['name']=$this->name;
        $info['text']=$this->message;
        $info['confirmation_link']=$this->confirmation_link;
        $info['mail']=$this->mail;
        return $this
         ->view($this->template,$info)
         ->subject($this->title);
        // return $this->from('rushit94@mail.ru', 'Ваше приложение')
        // ->subject('Ваше напоминание!')
        // ->view('emails.registration');
    }
}
