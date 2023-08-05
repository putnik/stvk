<?php

declare(strict_types=1);

namespace App\Entity;

use proj4php\Point;
use proj4php\Proj;
use proj4php\Proj4php;

class Coordinates
{
    private float $latitude;
    private float $longitude;
    private float $zoom;

    public function __construct(float $latitude, float $longitude, float $zoom)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->zoom = $zoom;
    }

    public static function createFromEPSG3857(float $xMin, float $xMax, float $yMin, float $yMax): self
    {
        $proj4 = new Proj4php();
        $epsg3857 = new Proj('EPSG:3857', $proj4);
        $wgs84 = new Proj('EPSG:4326', $proj4);

        $x = ($xMin + $xMax) / 2;
        $y = ($yMin + $yMax) / 2;
        $pointSrc = new Point($x, $y, $epsg3857);
        $pointDest = $proj4->transform($wgs84, $pointSrc);
        [$latitude, $longitude,] = $pointDest->toArray();

        $zoom = 21 - log(max($xMax - $xMin, $yMax - $yMin));

        return new self($latitude, $longitude, $zoom);
    }

    public function getLatitude(): float
    {
        return $this->latitude;
    }

    public function getLongitude(): float
    {
        return $this->longitude;
    }

    public function getZoom(): float
    {
        return $this->zoom;
    }
}
