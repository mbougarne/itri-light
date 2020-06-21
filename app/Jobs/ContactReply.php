<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactSentReply;

class ContactReply implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Reply message
     *
     * @var array
     */
    protected array $reply;

    /**
     *  Receiver email
     *
     * @var string
     */
    protected string $receiver;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(array $reply, string $to)
    {
        $this->reply = $reply;
        $this->receiver = $to;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->receiver)->send(new ContactSentReply($this->reply));
    }
}
