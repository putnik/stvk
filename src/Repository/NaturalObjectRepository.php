<?php

declare(strict_types=1);

namespace App\Repository;

use App\Client\StvkClient;
use App\Entity\Coordinates;
use App\Entity\NaturalObject;
use App\Entity\NaturalObjectClass;
use App\Entity\NaturalObjectKind;
use App\Entity\Photo;
use App\Entity\ProtectionLevel;

class NaturalObjectRepository
{
    private StvkClient $stvkClient;

    public function __construct(StvkClient $stvkClient)
    {
        $this->stvkClient = $stvkClient;
    }

    /**
     * @throws \Exception
     */
    public function getById(string $id): ?NaturalObject
    {
        $data = $this->stvkClient->getProtectedArea($id);
        if ($data === null) {
            return null;
        }

        return new NaturalObject(
            $data['id'],
            NaturalObjectClass::from((int)$data['tipas']),
            NaturalObjectKind::from((string)$data['kind']),
            ProtectionLevel::from((string)$data['eng_reiksme']),
            $data['steigejas'],
            Coordinates::createFromEPSG3857($data['x_min'], $data['x_max'], $data['y_min'], $data['y_max']),
            $data['pavadinimas'],
            $data['eng_pavadinimas'],
            $data['porusis'],
            $data['eng_porusis'],
            $data['priklauso'],
            $data['plotas'] ? $data['plotas'] * 10000 : null,
            $data['aukstis'] ?: null,
            $data['ilgis'] ?: null,
            $data['perimet'] ?: null,
            $data['apimtis'] ?: null,
            $data['vieta'],
            $data['kult_paveld_kodas'] ?: null,
            (bool)$data['ar_gamt_paminkl'],
            $data['steig_tikslas'],
            $data['steig_ta'],
            $data['steig_ta_galiojantis'],
            $this->getDate($data['steig_data']),
            $this->getDate($data['steig_data_galiojantis']),
            $this->getDate($data['reg_data']),
            $this->getDate($data['kor_data'])
        );
    }

    /**
     * @param string $id
     * @return Photo[]
     */
    public function getPhotosById(string $id): array
    {
        $data = $this->stvkClient->getAreaPhotos($id) ?? [];
        $photos = [];

        foreach ($data as $photoData) {
            if (empty($photoData['file_base64'])) {
                continue;
            }

            $url = sprintf(
                'data:image/%s;base64,%s',
                str_replace($photoData['file_ext'], '.', ''),
                $photoData['file_base64']
            );

            $photos[] = new Photo(
                $photoData['id'],
                $photoData['object_id'],
                $photoData['name'],
                $url
            );
        }

        return $photos;
    }

    /**
     * @throws \Exception
     */
    private function getDate(?int $timestamp): ?\DateTimeImmutable
    {
        if ($timestamp === null) {
            return null;
        }

        $timestamp /= 1000;

        return new \DateTimeImmutable('@' . $timestamp);
    }
}
