<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class MunicipalityService {

    public function __invoke($id)
    {
        return Cache::remember("municipios_$id", now()->addDays(30), function() use ($id) {
            $endpoint = env('INEGI_API_MUNICIPIOS');
            $url = "${$endpoint}${id}";
            $response = Http::get($url);
            if($response->successful()){
                return collect($response->json('datos'));
            }
            return collect([]);

        });
    }
}
