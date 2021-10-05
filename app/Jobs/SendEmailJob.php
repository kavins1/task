<?php

namespace App\Jobs;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmailMailable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $user;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user)
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
        $user = $this->user;
        $details =[ 
            'name' => $user->name,
            'email' =>$user->email,
            'password'=>$user->password,
        ];

        Mail::to($this->user->email)->send(new SendEmailMailable($user));
    }
}
