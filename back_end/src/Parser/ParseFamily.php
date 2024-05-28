<?php

namespace App\Parser;

use App\Entity\TopLevelDataTypes\Family;
use App\Entity\TopLevelDataTypes\Individual;

class ParseFamily
{
    public function parse(ParseGedcomToModel $parser)
    {        
        $currentFamily = new Family();
        $currentRecord = $parser->explodeCurrentLine();
        $currentFamily->setId($parser->CurrentFamilyId++);
        // COMPONENT_LEVEL loop
        while ($parser->getNextLineFromRecord() != false) {
            $currentRecord = $parser->explodeCurrentLine();
            $componentTag = trim($currentRecord[1]);
            if(($componentDepth = (int) $currentRecord[0]) == $parser::TOP_LEVEL){
                $parser->back();
                break;
            }
            $currentIndividual = new Individual();
            $CurrentIndividualId = array_search(
                $parser->normalizeIdentifier(
                    $currentRecord[2]), 
                    $parser->idToXRefsArray
                );           
            if (isset($currentRecord[2])) $currentIndividual = $currentIndividual->findIndividualById(
                $parser->gedcom, 
                $CurrentIndividualId
            );
            if($parser->validTag($componentTag)) {
                switch ($componentTag) {
                    case 'HUSB':
                        $currentFamily->setPerson1($currentIndividual);
                        break;
                    case 'WIFE':
                        $currentFamily->setPerson2($currentIndividual);
                        break;
                    case 'CHIL':
                        $currentFamily->addChild($currentIndividual);
                        break;
                }
            }
        }
        $this->setFamilyToHusband($parser, $currentFamily);
        $this->setFamilyToWife($parser, $currentFamily);
        $this->setFamilyToChilds($parser, $currentFamily);
        return $currentFamily;
    }


    private function setFamilyToHusband($parser, &$currentFamily){
        $husband = Individual::findIndividualById($parser->gedcom, $currentFamily->getPerson1()->getId());
        $husband->addSpouseToFamily1($currentFamily);
    }


    private function setFamilyToWife($parser, &$currentFamily){
        $wife = Individual::findIndividualById($parser->gedcom, $currentFamily->getPerson2()->getId());
        $wife->addSpouseToFamily2($currentFamily);
   }
    
    
    private function setFamilyToChilds($parser, &$currentFamily){
        foreach ($currentFamily->getChilds() as $currentChild) {
            $child = Individual::findIndividualById($parser->gedcom, $currentChild->getId());
            $child->setChildToFamily($currentFamily);
        } 
    }
    
}