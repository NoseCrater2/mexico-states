<?php

namespace App\Services;
use Closure;
use Illuminate\Support\Facades\Cache;

class CacheService {
     public function remember(
        string $key,
        Closure $callback,
    ): mixed {
        return Cache::remember(
            $key,
            now()->addDays(30),
            $callback
        );
    }

    public function forget(string $key): bool
    {
        return Cache::forget($key);
    }

    public function flush(): bool
    {
        return Cache::flush();
    }
}
