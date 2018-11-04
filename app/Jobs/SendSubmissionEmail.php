<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Mail;
use App\Mail\WebsiteSubmission;

class SendSubmissionEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

	 protected $lead, $recipients;

    public function __construct($lead, $recipients)
    {

        $this->lead = $lead;
		$this->recipients = $recipients;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

		$mail = Mail::to($this->recipients)
		    ->send(new WebsiteSubmission($this->lead));

		if($mail){
			return true;
		}
		return false;

    }
}
