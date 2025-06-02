<?php

namespace App\Jobs;

use App\Mail\ContactMail;
use App\Models\Contact;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Mail;

class SendContactMailJob implements ShouldQueue
{
    use Queueable;
    protected Contact $contact;

    /**
     * Create a new job instance.
     */
    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->contact->email)->send(new ContactMail($this->contact));
    }
}
