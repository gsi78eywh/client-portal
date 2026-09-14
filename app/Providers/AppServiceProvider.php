<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Services\Sms\SmsServiceInterface::class,
            \App\Services\Sms\BrevoSmsService::class
        );

        $this->app->bind(
            \App\Services\Contact\EmailVerificationServiceInterface::class,
            \App\Services\Contact\BrevoEmailService::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Clean up stale public/hot file if Vite dev server is not active
        if (file_exists(public_path('hot'))) {
            $hotUrl = trim(@file_get_contents(public_path('hot')));
            if ($hotUrl) {
                $port = parse_url($hotUrl, PHP_URL_PORT) ?: 5173;
                $host = parse_url($hotUrl, PHP_URL_HOST) ?: '127.0.0.1';
                $connection = @fsockopen($host, (int)$port, $errno, $errstr, 0.2);
                if (!is_resource($connection)) {
                    @unlink(public_path('hot'));
                } else {
                    fclose($connection);
                }
            }
        }
    }
}
