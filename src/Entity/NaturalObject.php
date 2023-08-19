<?php

declare(strict_types=1);

namespace App\Entity;

class NaturalObject
{
    private string $id;
    private NaturalObjectClass $class;
    private NaturalObjectKind $kind;
    private ProtectionLevel $protectionLevel;
    private ?string $protectionLevelName;
    private Coordinates $coordinates;
    private string $ltName;
    private string $enName;
    private ?string $ltDescription;
    private ?string $enDescription;
    private ?string $belongsTo;
    private ?float $area;
    private ?float $height;
    private ?float $length;
    private ?float $perimeter;
    private ?float $volume;
    private ?string $location;
    private ?int $cultureHeritageCode;
    private bool $isMonument;
    private ?string $institution;
    private ?string $institutionUpdated;
    private ?string $institutionObjective;
    private ?\DateTimeInterface $institutionAddedAt;
    private ?\DateTimeInterface $institutionUpdatedAt;
    private ?\DateTimeInterface $cadastreAddedAt;
    private ?\DateTimeInterface $cadastreUpdatedAt;

    public function __construct(
        string $id,
        NaturalObjectClass $class,
        NaturalObjectKind $kind,
        ProtectionLevel $protectionLevel,
        ?string $protectionLevelName,
        Coordinates $coordinates,
        string $ltName,
        string $enName,
        ?string $ltDescription,
        ?string $enDescription,
        ?string $belongsTo,
        ?float $area,
        ?float $height,
        ?float $length,
        ?float $perimeter,
        ?float $volume,
        ?string $location,
        ?int $cultureHeritageCode,
        bool $isMonument,
        ?string $institutionObjective,
        ?string $institution,
        ?string $institutionUpdated,
        ?\DateTimeInterface $institutionAddedAt,
        ?\DateTimeInterface $institutionUpdatedAt,
        ?\DateTimeInterface $cadastreAddedAt,
        ?\DateTimeInterface $cadastreUpdatedAt
    ) {
        $this->id = $id;
        $this->class = $class;
        $this->kind = $kind;
        $this->protectionLevel = $protectionLevel;
        $this->protectionLevelName = $protectionLevelName;
        $this->coordinates = $coordinates;
        $this->ltName = $ltName;
        $this->enName = $enName;
        $this->ltDescription = $ltDescription;
        $this->enDescription = $enDescription;
        $this->belongsTo = $belongsTo;
        $this->area = $area;
        $this->height = $height;
        $this->length = $length;
        $this->perimeter = $perimeter;
        $this->volume = $volume;
        $this->location = $location;
        $this->cultureHeritageCode = $cultureHeritageCode;
        $this->isMonument = $isMonument;
        $this->institution = $institution;
        $this->institutionUpdated = $institutionUpdated;
        $this->institutionObjective = $institutionObjective;
        $this->institutionAddedAt = $institutionAddedAt;
        $this->institutionUpdatedAt = $institutionUpdatedAt;
        $this->cadastreAddedAt = $cadastreAddedAt;
        $this->cadastreUpdatedAt = $cadastreUpdatedAt;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getClass(): NaturalObjectClass
    {
        return $this->class;
    }

    public function getKind(): NaturalObjectKind
    {
        return $this->kind;
    }

    public function getProtectionLevel(): ProtectionLevel
    {
        return $this->protectionLevel;
    }

    public function getProtectionLevelName(): ?string
    {
        return $this->protectionLevelName;
    }

    public function getCoordinates(): Coordinates
    {
        return $this->coordinates;
    }

    public function getLtName(): string
    {
        return $this->ltName;
    }

    public function getEnName(): string
    {
        return $this->enName;
    }

    public function getLtDescription(): ?string
    {
        return $this->ltDescription;
    }

    public function getEnDescription(): ?string
    {
        return $this->enDescription;
    }

    public function getBelongsTo(): ?string
    {
        return $this->belongsTo;
    }

    public function getArea(): ?float
    {
        return $this->area;
    }

    public function getHeight(): ?float
    {
        return $this->height;
    }

    public function getLength(): ?float
    {
        return $this->length;
    }

    public function getPerimeter(): ?float
    {
        return $this->perimeter;
    }

    public function getVolume(): ?float
    {
        return $this->volume;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function getCultureHeritageCode(): ?int
    {
        return $this->cultureHeritageCode;
    }

    public function getIsMonument(): bool
    {
        return $this->isMonument;
    }

    public function getInstitution(): ?string
    {
        return $this->institution;
    }

    public function getInstitutionUpdated(): ?string
    {
        return $this->institutionUpdated;
    }

    public function getInstitutionObjective(): ?string
    {
        return $this->institutionObjective;
    }

    public function getInstitutionAddedAt(): ?\DateTimeInterface
    {
        return $this->institutionAddedAt;
    }

    public function getInstitutionUpdatedAt(): ?\DateTimeInterface
    {
        return $this->institutionUpdatedAt;
    }

    public function getCadastreAddedAt(): ?\DateTimeInterface
    {
        return $this->cadastreAddedAt;
    }

    public function getCadastreUpdatedAt(): ?\DateTimeInterface
    {
        return $this->cadastreUpdatedAt;
    }
}
