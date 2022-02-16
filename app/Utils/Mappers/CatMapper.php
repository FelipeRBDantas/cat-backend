<?php

namespace App\Utils\Mappers;

use App\Http\Controllers\Controller;

class CatMapper extends Controller
{
    public static function breeds($data): array
    {
        return [
            'id' => json_decode($data)[0]->id,
            'name' => json_decode($data)[0]->name,
            'temperament' => json_decode($data)[0]->temperament,
            'origin' => json_decode($data)[0]->origin,
            'country_codes' => json_decode($data)[0]->country_codes,
            'country_code' => json_decode($data)[0]->country_code,
            'description' => json_decode($data)[0]->description,
        ];

        return $data;
    }
}
