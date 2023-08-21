<?php

declare(strict_types=1);

namespace App\Client;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class SparqlClient
{
    public const BASE_URI = 'https://query.wikidata.org/';

    public function request(string $query): array
    {
        $client = new Client([
            'base_uri' => self::BASE_URI,
        ]);

        try {
            $response = $client->get('/sparql?' . http_build_query([
                'query' => preg_replace('/[ \n]{2,}/', ' ', $query),
            ]), [
                'headers' => [
                    'Accept' => 'application/sparql-results+json',
                    'User-Agent' => 'stvk.toolforge.org Guzzle PHP/' . PHP_VERSION,
                ],
            ]);
        } catch (GuzzleException) {
            return [];
        }

        $data = json_decode($response->getBody()->getContents(), true);

        return $data['results']['bindings'] ?? [];
    }

    public function getList(string $query): array
    {
        $data = $this->request($query);
        $list = [];
        foreach ($data as $row) {
            $list[] = array_map(static function (array $value) {
                return $value['value'];
            }, $row);
        }

        return $list;
    }

    public function getOne(string $query): array
    {
        $list = $this->getList($query);
        return $list[0] ?? [];
    }
}