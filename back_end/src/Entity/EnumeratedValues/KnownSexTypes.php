<?php

declare(strict_types=1);

namespace App\Entity\EnumeratedValues;

enum KnownSexTypes: string
{
    /**
     * Male
     */
    case M = 'Male';

    /**
     * Female
     */
    case F = 'Female';

    /**
     * Unknown (not found yet)
     */
    case U = 'Unknown';

    /**
     * Intersex (assignment at birth)
     */
    case X = 'Intersex';

    /**
     * Not recorded
     */
    case N = 'Not recorded';
}