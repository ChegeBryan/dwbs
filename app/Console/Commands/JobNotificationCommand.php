<?php

namespace App\Console\Commands;

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
        //
    }
}
