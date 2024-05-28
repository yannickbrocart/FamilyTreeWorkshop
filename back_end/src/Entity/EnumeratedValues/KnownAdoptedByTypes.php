<?php

declare(strict_types=1);

namespace App\Entity\EnumeratedValues;

enum KnownAdoptedByTypes: string
{
    case HUSB = 'Husb';
    case WIFE = 'Wife';
    case BOTH = 'Both';
}