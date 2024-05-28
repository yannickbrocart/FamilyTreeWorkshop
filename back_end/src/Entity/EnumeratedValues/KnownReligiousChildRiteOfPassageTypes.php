<?php

declare(strict_types=1);

namespace App\Entity\EnumeratedValues;

enum KnownReligiousChildRiteOfPassageTypes: string
{
    case BAPM = 'Bapm';
    case BARM = 'Barm';
    case BASM = 'Basm';
}