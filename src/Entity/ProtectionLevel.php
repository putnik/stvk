<?php

declare(strict_types=1);

namespace App\Entity;

enum ProtectionLevel: string
{
    case StrictReserve = 'Conservational functional priority zone – Strict Reserve';
    case StrictNatureReserve = "General ecological protection zone";
    case Municipal = 'Municipal';
    case State = 'State';
    case Unesco = 'Unesco';
}
