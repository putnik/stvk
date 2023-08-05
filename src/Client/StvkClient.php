<?php

declare(strict_types=1);

namespace App\Client;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class StvkClient
{
    public const BASE_URI = 'https://stvk.lt/stk-api/rest/public/';

    public function postRequest(string $path, array $params = []): ?array
    {
        $client = new Client([
            'base_uri' => self::BASE_URI,
        ]);

        try {
            $response = $client->post($path, [
                'json' => $params,
            ]);
        } catch (GuzzleException) {
            return null;
        }

        return json_decode($response->getBody()->getContents(), true);
    }

    /**
     * @param string $id
     * @return array<string, mixed>[]
     */
    public function getAreaPhotos(string $id): array
    {
        $response = $this->postRequest('get-area-photos', ['id' => $id]) ?? [];

        return $response['data'] ?? [];
    }

    /**
     * @param string $id
     * @return array<string, mixed>|null
     */
    public function getProtectedArea(string $id): ?array
    {
         return $this->postRequest('get-protected-area', ['id' => $id]);
    }
}