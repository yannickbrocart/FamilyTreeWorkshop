<?php

namespace App\Parser;

use App\Entity\ComponentLevelDataTypes\IndividualEvents;
use App\Entity\ComponentLevelDataTypes\EventDetail;
use App\Entity\ComponentLevelDataTypes\IndividualEventDetail;
use App\Entity\ComponentLevelDataTypes\Name;
use App\Entity\ComponentLevelDataTypes\NamePiece;
use App\Entity\EnumeratedValues\KnownNameTypes;
use App\Entity\EnumeratedValues\KnownSexTypes;
use App\Entity\TopLevelDataTypes\Individual;

class ParseIndividual
{

    public function parse(ParseGedcomToModel $parser)
    {
        $currentIndividual = new Individual();
        $currentRecord = $parser->explodeCurrentLine();
        $componentDepth = $parser::COMPONENT_LEVEL;
        $parser->idToXRefsArray[$parser->CurrentIndividualId] = $parser->normalizeIdentifier($currentRecord[1]);
        $currentIndividual->setId($parser->CurrentIndividualId++);
        $parser->back();
        if($parser->getNextLineFromRecord() != false) {
            // COMPONENT_LEVEL loop
            while ($parser->getNextLineFromRecord() != false) {
                $currentRecord = $parser->explodeCurrentLine();
                $componentTag = trim($currentRecord[1]);
                if(($componentDepth = (int) $currentRecord[0]) == $parser::TOP_LEVEL){
                    $parser->back();
                    break;
                }
                if($parser->validTag($componentTag)) {
                    if (isset($currentRecord[2])) {
                        $value = trim($currentRecord[2]);
                        switch ($componentTag) {
                            case 'NAME':
                                $name = $this->handleNameParser($parser);
                                $currentIndividual->addName($name);
                                break;
                            case 'SEX':
                                $sex = $this->handleSexParser($value);
                                $currentIndividual->setSex($sex);
                                break;
                            }
                    } else switch ($componentTag) {
                        case 'BIRT':                            
                            if ($currentIndividual->getIndividualEvents()) $individualEvents = $currentIndividual->getIndividualEvents();
                            else $individualEvents = new IndividualEvents();
                            $individualEventDetail = $this->handleIndividualEventParser($parser, $componentTag);
                            $currentIndividual->setIndividualEvents($individualEvents->setBirthDetail($individualEventDetail));
                            break;
                        case 'DEAT':
                            if ($currentIndividual->getIndividualEvents()) $individualEvents = $currentIndividual->getIndividualEvents();
                            else $individualEvents = new IndividualEvents();
                            $individualEventDetail = $this->handleIndividualEventParser($parser, $componentTag);
                            $currentIndividual->setIndividualEvents($individualEvents->setDeathDetail($individualEventDetail));
                            break;
                    }                    
                }
            }
        } 
        return $currentIndividual;
    }
    
    
    private function handleNameParser($parser): Name {
        $currentName = new Name();
        $currentRecord = $parser->explodeCurrentLine();
        $componentDepth = $parser::LEVEL_2;
        $namePiece = new NamePiece();
        // LEVEL_2 loop
        while($componentDepth == $parser::LEVEL_2) {
            $parser->getNextLineFromRecord();
            $currentRecord = $parser->explodeCurrentLine();
            $componentDepth = (int) $currentRecord[0];
            $componentTag = trim($currentRecord[1]);            
            if(isset($currentRecord[2])) {
                $value = $currentRecord[2];
                if($parser->validTag($componentTag)) {
                    switch ($componentTag) {
                        case 'TYPE':
                            $nameType = $this->handleNameTypeParser($value);
                            $currentName->setType($nameType);
                            break;
                        case 'NPFX':                            
                            $namePiece->setPrefix($value);
                            $currentName->addNamePiece($namePiece);
                            break;
                        case 'GIVN':
                            $namePiece->setGiven($value);
                            $currentName->addNamePiece($namePiece);
                            break;
                        case 'NICK':
                            $namePiece->setNickname($value);
                            $currentName->addNamePiece($namePiece);
                            break;
                        case 'SPFX':
                            $namePiece->setSurnamePrefix($value);
                            $currentName->addNamePiece($namePiece);
                            break;
                        case 'SURN':
                            $namePiece->setSurname($value);
                            $currentName->addNamePiece($namePiece);
                            break;
                        case 'NSFX':
                            $namePiece->setSuffix($value);
                            $currentName->addNamePiece($namePiece);
                            break;
                    }
                }
            }
        }
        $parser->back();
        return $currentName;
    }
    
    
    private function handleSexParser($sex): KnownSexTypes {
        switch ($sex) {
            case 'M':
                return KnownSexTypes::M;
                break;
            case 'F':
                return KnownSexTypes::F;
                break;
            case 'X':
                return KnownSexTypes::X;
                break;
        }
        return KnownSexTypes::U;
    }


    private function handleNameTypeParser($nameType): KnownNameTypes {
        switch ($nameType) {
            case 'aka':
                return KnownNameTypes::Aka;
                break;
            case 'birth':
                return KnownNameTypes::Birth;
                break;
            case 'immigrant':
                return KnownNameTypes::Immigrant;
                break;
            case 'maiden':
                return KnownNameTypes::Maiden;
                break;            
            case 'married':
                return KnownNameTypes::Married;
                break;
            default:
                return KnownNameTypes::User_defined;
                break;
        }
        
    }


    private function handleIndividualEventParser($parser, $componentTag): IndividualEventDetail {
        $individualEventDetail = new IndividualEventDetail;
        $eventDetail = new EventDetail;
        $parseCommon = new ParseCommon;
        switch ($componentTag) {
            case 'BIRT':
                $eventDetail = $parseCommon->handleEventDetailParser($parser, $eventDetail);
                $individualEventDetail->setEventDetail($eventDetail);
                break;
            case 'DEAT':
                $eventDetail = $parseCommon->handleEventDetailParser($parser, $eventDetail);
                $individualEventDetail->setEventDetail($eventDetail);
                break;
        }
        return $individualEventDetail;
    }

}