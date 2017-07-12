<?php

namespace App\Jobs;

use Mail;
use App\User;
use Illuminate\Bus\Queueable;
use App\Mail\EmailVerification;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ProcessRegistration implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Create an instance of the verification email template.
        $email = new EmailVerification($this->user);

        // Send the email.
        Mail::to($this->user->email)->send($email);
    }
}
