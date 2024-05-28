<?php

declare(strict_types=1);

namespace App\Entity\EnumeratedValues;

enum KnownLegalDocumentTypes: string
{
    case CENS = 'Cens';
    case PROB = 'Prob';
    case WILL = 'Will';
}