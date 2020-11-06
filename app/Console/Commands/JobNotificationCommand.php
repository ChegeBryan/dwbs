<?php

namespace App\Console\Commands;

use App\CandidateProfile;
use App\Jobs\SendJobMessage;
use App\Post;
use Illuminate\Console\Command;

class JobNotificationCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'posts:send-notifications';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Used to send job notification to users view sms.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $candidates = CandidateProfile::where('status', 0)->get();
        $posts = Post::where('status', 0)->get();
        foreach ($candidates as $candidate) {
            foreach ($posts as $post) {
                // Check if candidate profile matches job
                if (
                    $post->category == $candidate->category &&
                    $post->type == $candidate->type &&
                    $post->salary >= $candidate->salary &&
                    strcasecmp($post->county, $candidate->county) == 0 &&
                    strcasecmp($post->town, $candidate->town) == 0
                ) {
                    SendJobMessage::dispatch($candidate, $post);
                }
            }
        }
    }
}
