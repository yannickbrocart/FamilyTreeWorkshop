<?php

namespace App\Parser;

use App\Entity\ComponentLevelDataTypes\EventDetail;
use App\Entity\ComponentLevelDataTypes\Place;
use DateTime;
use DateTimeZone;
use SebastianBergmann\Environment\Console;

class ParseCommon
{
    public function handleDateTimeParser($parser, $date): DateTime
    {
        $parser->getNextLineFromRecord();
        $currentRecord = $parser->explodeCurrentLine();
        $time = $currentRecord[2];
        if ($currentRecord[1] == 'TIME') {
            $datetime = new DateTime((trim($date) . ' ' . trim($time)), new DateTimeZone('Europe/Paris'));
            return $datetime;
        } else return $datetime = new DateTime($date, new DateTimeZone('Europe/Paris'));
    }

    public function handleEventDetailParser($parser, $eventDetail): EventDetail {
        $componentDepth = $parser::LEVEL_2;
        // LEVEL_2 loop
        while ($componentDepth >= $parser::LEVEL_2) {
            $parser->getNextLineFromRecord();
            $currentRecord = $parser->explodeCurrentLine();
            $componentDepth = (int) $currentRecord[0];
            $componentTag = trim($currentRecord[1]);
            if (isset($currentRecord[2])) {
                $value = $currentRecord[2];
                if ($parser->validTag($componentTag)) {
                    switch ($componentTag) {
                        case 'DATE':
                            $dateTime = ParseCommon::handleDateTimeParser($parser, $value);
                            $eventDetail->setDate($dateTime);
                            break;
                        case 'PLAC':
                            $place = ParseCommon::handlePlaceParser($parser, $value);
                            $eventDetail->setPlace($place);
                            break;
                        case 'AGNC':
                            $eventDetail->setResponsibleAgency($value);
                            break;
                        case 'RELI':
                            $eventDetail->setReligiousAffiliation($value);
                            break;
                        case 'CAUS':
                            $eventDetail->setCause($value);
                            break;
                    }
                }
            }
        }       
        $parser->back(); 
        return $eventDetail;
    }


    public function handlePlaceParser($parser, $value): Place
    {
        $place = new Place;
        $place->setName($value);

        $parser->getNextLineFromRecord();
        $currentRecord = $parser->explodeCurrentLine();
        $componentDepth = (int) $currentRecord[0];
        $componentTag = trim($currentRecord[1]);
        if ($parser->validTag($componentTag)) {
            if ($componentTag == 'MAP') {
                while ($componentDepth >= $parser::LEVEL_3) {
                    $parser->getNextLineFromRecord();
                    $currentRecord = $parser->explodeCurrentLine();
                    $componentDepth = (int) $currentRecord[0];
                    $componentTag = trim($currentRecord[1]);
                    if (isset($currentRecord[2])) {
                        $value = $currentRecord[2];
                        if ($parser->validTag($componentTag)) {
                            switch ($componentTag) {
                                case 'LATI':
                                    $place->setLatitude($value);
                                    break;
                                case 'LONG':
                                    $place->setLongitude($value);
                                    break;
                            }
                        }
                    }
                }
            }
        }
        $parser->back(); 
        return $place;
    }
}
