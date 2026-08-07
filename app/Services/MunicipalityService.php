<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class MunicipalityService {

    public function __invoke($id, $cache)
    {

        return $cache->remember("municipios_$id", function() use ($id) {
            $endpoint = env('INEGI_API_MUNICIPIOS');
            $url = "${endpoint}${id}";
            $response = Http::get($url);
            if($response->successful()){
                return collect($response->json('datos'));
            }
            return collect([]);

        });
    }
}
