<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\OTPVerificationController; // Make sure to import your controller


class SendOtpDaily extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // protected $signature = 'app:send-otp-daily';
    protected $signature = 'send:otp-daily';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send OTP daily at 9:44 AM';

    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $controller = new OTPVerificationController();
        $response = $controller->sendOTP(new \Illuminate\Http\Request());

        // Optionally, you can output the response to the console
        $this->info('OTP sent: ' . $response);

        return 0;
    }
}
