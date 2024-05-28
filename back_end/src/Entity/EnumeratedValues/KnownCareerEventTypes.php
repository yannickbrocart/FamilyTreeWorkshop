<?php

declare(strict_types=1);

namespace App\Entity\EnumeratedValues;

enum KnownCareerEventTypes: string
{
    case GRAD = 'Grad';
    case RETI = 'Reti';
}