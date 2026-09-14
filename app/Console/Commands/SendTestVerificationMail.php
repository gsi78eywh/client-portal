<?php

namespace App\Console\Commands;

use App\Services\Contact\EmailVerificationServiceInterface;
use Illuminate\Console\Command;

class SendTestVerificationMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send-mail {recipient? : Recipient email address}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a test ORDO verification email via the configured Email Verification service';

    /**
     * Execute the console command.
     */
    public function handle(EmailVerificationServiceInterface $emailService): int
    {
        $recipient = $this->argument('recipient');

        if (empty($recipient)) {
            $recipient = $this->ask('Enter recipient email address');
        }

        if (!filter_var($recipient, FILTER_VALIDATE_EMAIL)) {
            $this->error('Invalid email address provided.');
            return self::FAILURE;
        }

        $otp = sprintf('%06d', random_int(100000, 999999));
        $mailer = config('mail.default', 'brevo');

        $this->info("Initiating test verification email dispatch...");
        $this->line("Recipient: {$recipient}");
        $this->line("Configured Mailer: {$mailer}");

        $success = $emailService->sendVerificationEmail($recipient, $otp, 'ORDO Tester');

        if ($success) {
            $this->info('Verification email dispatched successfully.');
            return self::SUCCESS;
        }

        $this->error('Failed to dispatch verification email. Please check your storage/logs/laravel.log for details.');
        return self::FAILURE;
    }
}
