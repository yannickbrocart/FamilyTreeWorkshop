<?php

namespace App\Parser;

use App\Entity\EnumeratedValues\KnownCharacterSetTypes;
use App\Entity\TopLevelDataTypes\Header;

class ParseHeader
{

    public function parse(ParseGedcomToModel $parser)
    {
        $header = new Header;
        $parseCommon = new ParseCommon;
        $currentRecord = $parser->explodeCurrentLine();
        $componentDepth = $parser::COMPONENT_LEVEL;
        // COMPONENT_LEVEL loop
        while ($parser->getNextLineFromRecord()) {
            $currentRecord = $parser->explodeCurrentLine();
            $componentTag = trim($currentRecord[1]);
            if(($componentDepth = (int) $currentRecord[0]) == $parser::TOP_LEVEL){
                $parser->back();
                break;
            }
            if (isset($currentRecord[2])) $value = trim($currentRecord[2]);
            if ($parser->validTag($componentTag)) {
                switch ($componentTag) {
                    case 'GEDC':
                        $header = $this->handleHeaderGedcParser($parser, $header);
                        break;
                    case 'CHAR':
                        $charactereSet = $this->handleCharacterSetParser($value);
                        $header->setCharactereSet($charactereSet);
                        break;
                    case 'DEST':
                        $header->setReceivingSystemName($value);
                        break;
                    case 'SOUR':  
                        $header = $this->handleSystemIdParser($parser, $header);
                        break;
                    case 'DATE':
                        $dateTime = $parseCommon->handleDateTimeParser($parser, $value);
                        $header->setFileCreationDate($dateTime);
                        break;
                    case 'LANG':
                        $header->setLanguage($value);
                        break;
                    case 'SUBM':
                        break;
                    case 'FILE':
                        $header->setFileName($value);
                        break;
                    case 'COPR':
                        $header->setCopyright($value);
                        break;
                    case 'NOTE':
                        $header->setNote($value);
                        break;
                }
            }
        }
        return $header;
    }


    private function handleHeaderGedcParser($parser, $header): Header {
        $currentRecord = $parser->explodeCurrentLine();
        $componentDepth = $parser::LEVEL_2;
        // LEVEL_2 loop
        while($componentDepth == $parser::LEVEL_2) {
            $parser->getNextLineFromRecord();
            $currentRecord = $parser->explodeCurrentLine();
            $componentDepth = (int) $currentRecord[0];
            $componentTag = trim($currentRecord[1]);
            if(isset($currentRecord[2])) {
                $value = $currentRecord[2];
                if($parser->validTag($componentTag)) {
                    switch (trim($currentRecord[1])) {
                        case 'VERS':
                            $header->setVersionNumber($value);
                            break;
                        case 'FORM':
                            $header->setVersionForm($value);
                            break;
                    }
                }
            }
        }
        return $header;
    }


    private function handleCharacterSetParser($characterSet): KnownCharacterSetTypes {
        switch ($characterSet) {
            case 'ANSEL':
                return KnownCharacterSetTypes::ANSEL;
            case 'ASCII':
                return KnownCharacterSetTypes::ASCII;
            case 'UNICODE':
               return KnownCharacterSetTypes::UNICODE;
            case 'UTF-8':
                return KnownCharacterSetTypes::UTF_8;
        }
    }


    private function handleSystemIdParser($parser, $header): Header {
        $parseCommon = new ParseCommon;
        $componentDepth = $parser::LEVEL_2;
        // LEVEL_2 loop
        while ($componentDepth == $parser::LEVEL_2) {
            $parser->getNextLineFromRecord();
            $currentRecord = $parser->explodeCurrentLine();
            $componentDepth = (int) $currentRecord[0];
            $componentTag = trim($currentRecord[1]);
            if (isset($currentRecord[2])) {
                $value = $currentRecord[2];
                if ($parser->validTag($componentTag)) {
                    switch ($componentTag) {
                        case 'VERS':
                            $header->setSourceVersionNumber($value);
                            break;
                        case 'NAME':
                            $header->setSourceName($value);
                            break;
                        case 'CORP':
                            $header->setSourceBusiness($value);
                            // + address
                            // + www
                            break;
                        case 'DATA':
                            $header->setSourceNameData($value);
                            $componentDepth = $parser::LEVEL_3;
                            // LEVEL_3 loop
                            while ($parser->getNextLineFromRecord()) {
                                $currentRecord = $parser->explodeCurrentLine();
                                if((int) $currentRecord[0] < $parser::LEVEL_2) break;
                                $componentTag = trim($currentRecord[1]);
                                if (isset($currentRecord[2])) {
                                    $value = $currentRecord[2];
                                    if ($parser->validTag($componentTag)) {
                                        switch ($componentTag) {
                                            case 'DATE':
                                                $dateTime = $parseCommon->handleDateTimeParser($parser, $value);
                                                $header->setSourceNameDataDate($dateTime);
                                                break;
                                            case 'COPR':
                                                $header->setSourceNameDataCopyright($value);
                                                break;
                                    }
                                }
                            }
                        }
                        break;
                    }
                }
            }
        }
        $parser->back();
        return $header;
    }
}