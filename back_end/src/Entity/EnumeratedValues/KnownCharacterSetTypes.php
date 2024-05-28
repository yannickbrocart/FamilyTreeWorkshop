<?php

declare(strict_types=1);

namespace App\Entity\EnumeratedValues;

enum KnownCharacterSetTypes: string
{
    /**
     * UTF-8
     */
    case UTF_8 = 'UTF-8';

    /**
     * UTF-16
     */
    case UNICODE = 'UNICODE';

    /**
     * ANSEL
     */
    case ANSEL = 'ANSEL';

    /**
     * ASCII
     */
    case ASCII = 'ASCII';
}