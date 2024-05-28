<?php

declare(strict_types=1);

namespace App\Entity\EnumeratedValues;

enum KnownNameTypes: string
{

    /**
     * Also known as, alias, etc.
     */
    case Aka = 'Aka';
     
    /**
     * Name given on birth certificate
     */
    case Birth = 'Birth';
    
    /**
     * Name assumed at the time of immigration
     */
    case Immigrant = 'Immigrant';
    
    /**
     * Maiden name, name before first marriage
     */
    case Maiden = 'Maiden';
    
    /**
     * Other text name that defines the name type
     */
    case User_defined = 'User defined';
    
    /**
    * Name was person\'s previous married name
    */
   case Married = 'Married';

}