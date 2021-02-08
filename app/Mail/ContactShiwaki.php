<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactShiwaki extends Mailable
{
    use Queueable, SerializesModels;

    public $articles;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construc($articles)
    {
        $this->articles = $articles;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.contact-shiwaki', [
            'articles' => $this->articles
        ]);
    }
}
