<?php

namespace App\Jobs;

use App\CandidateProfile;
use App\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Twilio\Rest\Client;

class SendJobMessage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $candidate;
    private $post;
    private $twilioClient;

    /**
     * Create a new job instance.
     * @param User $user: A single user instance.
     * @throws ConfigurationException
     * @return void
     */
    public function __construct(CandidateProfile $candidate, Post $post)
    {
        $this->candidate = $candidate;
        $this->post = $post;
        $sid = config('services.twilio.account_sid');
        $token = config('services.twilio.auth_token');
        $this->twilioClient = new Client($sid, $token);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $smsTemplate = "Found a job match: Job title: %s, Job Id: %s. Login to your account to apply.";
        $body = sprintf($smsTemplate, $this->post->title, $this->post->id);
        $this->twilioClient->messages->create(
            $this->candidate->user->mobile,
            [
                'from' => config('services.twilio.phone_number'),
                'body' => $body
            ]
        );
    }
}
