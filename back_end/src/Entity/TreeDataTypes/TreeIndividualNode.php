<?php

namespace App\Entity\TreeDataTypes;

use DateTime;
use Symfony\Component\Validator\Constraints\Date;

class TreeIndividualNode 
{
    private String $name;
    private String $sex;
    private Date $birth;
    private String $birthPlace;
    private Date $death;
    private String $deathPlace;
    private array $relations;

    function __construct(String $name, String $sex,
                         Date $birth, String $birthPlace, 
                         Date $death, String $deathPlace)
    {
        $this->name = $name;
        $this->sex = $sex;
        $this->birth = $birth;
        $this->birthPlace = $birthPlace;
        $this->death = $death;
        $this->deathPlace = $deathPlace;
        $this->relations = Array();
    }

    public function getSingleRelation(String $type): array
    {
        $relation = $this->relations[$type];
        return empty($relation) ? null : $relation[0];
    }

    public function getMultipleRelations(String $type): array
    {
        if (!isset($this->relations[$type])) {
            return array();
        }
        return $this->relations[$type];
    }

    public function addRelation(String $type, TreeIndividualNode $individual)
    {
        if (!isset($this->relations[$type])) {
            $this->relations[$type] = array();
        }
        $this->relations[$type][] = $individual;
    }
}