<?php

declare(strict_types=1);

namespace App\Entity;

enum NaturalObjectClass: int
{
    case StrictReserve = 1;
    case LandscapeReserve = 2;
    case NaturalHeritageObject = 3;
    case Park = 6;
    case HabitatProtectionArea = 102;
}
