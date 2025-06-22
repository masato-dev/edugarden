<?php

namespace App\Jobs;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class SendEmailVerificationJob implements ShouldQueue
{
    use Queueable;
    private MustVerifyEmail $user;

    /**
     * Create a new job instance.
     */
    public function __construct(MustVerifyEmail $user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->user->sendEmailVerificationNotification();
    }
}
