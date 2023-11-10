<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactUsMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = [
            'name' => $data['name'],
            'email' => $data['email'],
            'subject' => $data['subject'],
            'messages' => $data['messages'],
            'website_name' => $data['website_name'],
        ];
    }

    public function build()
    {
        return $this->view('emails.contact_us')
                    ->subject('[De Lavish] from ' . $this->data['name'] . ': ' . $this->data['subject'])
                    ->with([
                        'name' => $this->data['name'],
                        'email' => $this->data['email'],
                        'messages' => $this->data['messages'],
                    ]);
    }
}
