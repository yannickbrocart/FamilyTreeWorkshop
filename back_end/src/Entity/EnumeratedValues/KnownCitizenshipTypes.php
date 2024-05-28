<?php

declare(strict_types=1);

namespace App\Entity\EnumeratedValues;

enum KnownCitizenshipTypes: string
{
    case NATU = 'Natu';
    case EMIG = 'Emig';
    case IMMI = 'Immi';
}