<?php

declare(strict_types=1);

namespace App\Entity;

enum NaturalObjectKind: string
{
    case BotanicalObject = 'gpo_bot';
    case GeologicalObject = 'gpo_geo';
    case GeomorphologicalObject = 'gpo_gmo';
    case HydrogeologicalObject = 'gpo_hge';
    case HydrographicalObject = 'gpo_hgr';
    case ZoologicalObject = 'gpo_zoo';

    case Park = 'par';
    case LandscapeReserve = 'dra';
    case StrictReserve = 'rez';
    case FunctionalPriorityZone = 'fpz';

    // Natura2000
    case BirdsProtectionArea = 'past';
    case HabitatsProtectionArea = 'bast';

    /** @var array<string, string> */
    private const EMOJIS = [
        self::BotanicalObject->value => '🌳',
        self::GeologicalObject->value => '🪨',
        self::GeomorphologicalObject->value => '⛰️',
        self::HydrogeologicalObject->value => '💧',
        self::HydrographicalObject->value => '🌊',
        self::ZoologicalObject->value => '🐾',

        self::Park->value => '🏞️',
        self::LandscapeReserve->value => '🏞️',
        self::StrictReserve->value => '🏞️',
        self::FunctionalPriorityZone->value => '🪧',

        self::BirdsProtectionArea->value => '🦆',
        self::HabitatsProtectionArea->value => '🐾',
    ];

    /** @var array<string, int[]> */
    private const LAYERS = [
        self::BotanicalObject->value => [42, 49],
        self::GeologicalObject->value => [43],
        self::GeomorphologicalObject->value => [44],
        self::HydrogeologicalObject->value => [46],
        self::HydrographicalObject->value => [45],
        self::ZoologicalObject->value => [47],

        self::Park->value => [24, 38],
        self::LandscapeReserve->value => [48, 52],
        self::StrictReserve->value => [41],
        self::FunctionalPriorityZone->value => [16, 17, 18, 19, 20, 21, 22, 23, 25, 26, 29, 30, 31, 32, 33, 34, 35, 36, 37, 39, 40],

        self::BirdsProtectionArea->value => [28],
        self::HabitatsProtectionArea->value => [1],
    ];

    public function toEmoji(): string
    {
        return self::EMOJIS[$this->value];
    }

    /**
     * @return int[]
     */
    public function toLayer(): array
    {
        return self::LAYERS[$this->value];
    }
}
