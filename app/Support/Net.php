<?php

namespace App\Support;

class Net
{
    public static function online(): bool
    {
        try {
            $host = 'api-mt1.pusher.com';
            $resolved = gethostbyname($host);
            return $resolved !== $host && !empty($resolved);
        } catch (\Throwable $e) {
            return false;
        }
    }
}

