<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use GuzzleHttp;
use Psr\Http\Message\StreamInterface;

class Client extends Controller
{
    public static function client($verb, $url): StreamInterface
    {
        $client = new GuzzleHttp\Client();
        $res = $client->request($verb, $url, []);

        return $res->getBody();
    }
}
