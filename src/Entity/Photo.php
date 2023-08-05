<?php

declare(strict_types=1);

namespace App\Entity;

class Photo
{
    private string $id;
    private string $objectId;
    private string $name;
    private string $url;

    public function __construct(string $id, string $objectId, string $name, string $url)
    {
        $this->id = $id;
        $this->objectId = $objectId;
        $this->name = $name;
        $this->url = $url;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getObjectId(): string
    {
        return $this->objectId;
    }

    public function getName(): string
    {
        return $this->name;
    }


    public function getUrl(): string
    {
        return $this->url;
    }
}
