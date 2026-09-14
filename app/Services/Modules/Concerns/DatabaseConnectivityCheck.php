<?php

namespace App\Services\Modules\Concerns;

trait DatabaseConnectivityCheck
{
    /**
     * Fast check if the configured database is reachable to prevent long PDO timeouts when offline.
     */
    protected function isDatabaseConnected(): bool
    {
        $default = config('database.default');
        if ($default === 'sqlite') {
            return true;
        }

        $host = config('database.connections.' . $default . '.host', '127.0.0.1');
        $port = (int) config('database.connections.' . $default . '.port', 3306);
        $socket = @fsockopen($host, $port, $errno, $errstr, 0.2);
        if ($socket) {
            fclose($socket);
            return true;
        }

        return false;
    }
}
