<?php

namespace App\Parser;

use App\Entity\EnumeratedValues\KnownTagTypes;
use App\Entity\Gedcom;

class ParseGedcomToModel
{
    const TOP_LEVEL = 0;
    const COMPONENT_LEVEL = 1;
    const LEVEL_2 = 2;
    const LEVEL_3 = 3;
    
    public Gedcom $gedcom;
    public string $rawLine = '';
    public $currentLine = null;
    public string $returnedLine = '';
    public int $numberLinesParsed = 0;
    public int $CurrentIndividualId = 1;
    public int $CurrentFamilyId = 1;
    public array $idToXRefsArray = [];
    public $gedcomFile;


    public function Parse(Gedcom $gedcom, $gedcomFile): Gedcom
    {   
        $parseHeader = new ParseHeader;
        $parseIndividual = new ParseIndividual;
        $parseFamily = new ParseFamily;     
        $this->gedcom = $gedcom;
        $this->gedcomFile = $gedcomFile;
        // GEDCOM File loop
        while ($this->getNextLineFromRecord() != false) {
            $currentRecord = $this->explodeCurrentLine();
            $depth = (int) $currentRecord[0];
            // TOP_LEVEL loop
            if ($depth === $this::TOP_LEVEL) {
                $identifier = $this->normalizeIdentifier($currentRecord[1]);
                $topLevelTag = trim($currentRecord[1]);
                if ($topLevelTag == 'HEAD') {
                    $gedcom->setHeader($parseHeader->parse($this));
                } elseif (isset($currentRecord[2])) {
                    $identifier = $currentRecord[1];
                    $recordTag = trim($currentRecord[2]);
                    if($this->validTag($recordTag)) {
                        switch ($recordTag) {
                            case 'FAM':
                                $gedcom->addFamily($parseFamily->parse($this));
                                break;
                            case 'INDI':
                                $gedcom->addIndividual($parseIndividual->parse($this));
                                break;
                        }
                    }
                } elseif ($topLevelTag == 'TRLR') {
                    $gedcom->setTrailer('TRLR');
                    break;
                }
            }
        }
        return $gedcom;
    }


    public function explodeCurrentLine($linePiecesLimit = 3)
    {
        if($this->currentLine != null) return $this->currentLine; 
        if($this->rawLine == null) return false;
        $rawLine = trim($this->rawLine);
        $this->currentLine = explode(' ', $rawLine, $linePiecesLimit);
        return $this->currentLine;
    }


    public function normalizeIdentifier($identifier)
    {
        $identifier = trim($identifier);
        return trim($identifier, '@');
    }


    public function validTag(String $tag): bool
    {
        foreach (KnownTagTypes::cases() as $case) {
            if($tag === $case->value) return true;
        }
        return false;
    }


    public function getNextLineFromRecord(): bool
    {
        if (!empty($this->returnedLine)) {
            $this->rawLine = $this->returnedLine;
            $this->returnedLine = '';
            return true;
        } else {
            $this->rawLine = fgets($this->gedcomFile);
            $this->currentLine = null;
            $this->numberLinesParsed++;
            return empty($this->rawLine)? false : true;
        }
    }
    

    public function back()
    {
        $this->returnedLine = $this->rawLine;
    }
}


