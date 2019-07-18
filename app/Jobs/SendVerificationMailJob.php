<?php

namespace App\Jobs;

use App\Mail\LostPasswordMail;
use App\Mail\VerifyMail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailer;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendVerificationMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data;

    /**
     * Create a new job instance.
     *
     * @param $data
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @param Mailer $mail
     * @return void
     */
    public function handle(Mailer $mail)
    {
        $mail->to($this->data['email'])->send(new VerifyMail($this->data));
    }
}
