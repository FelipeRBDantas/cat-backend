<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Client;
use App\Utils\Mappers\CatMapper;
use Illuminate\Support\Facades\Cache;

class CatController extends Controller
{
    public function findByName($name)
    {
        $dayInSeconds = '86400';

        $catByName = Cache::remember('catByName' . $name, $dayInSeconds, function () use ($name) {
            $client = Client::client('GET', getenv('APP_URL_BASE_CAT_API') . 'breeds/search?q=' . $name);

            return CatMapper::breeds($client);
        });

        return response()->json($catByName);
    }
}
