<?php

declare(strict_types=1);

namespace App\Entity\EnumeratedValues;

enum KnownReligiousRiteOfPassageTypes: string
{
    case CHRA = 'Chra';
    case CONF = 'Conf';
    case FCOM = 'Fcom';
}