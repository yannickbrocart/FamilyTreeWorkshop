<?php

namespace App\Serializer;

use App\Entity\Gedcom;
use Symfony\Component\Serializer\SerializerInterface;

class SerializeModel
{
    private $serializer;

    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    public function serializeToView(Gedcom $gedcom)
    {
        return $this->serializer->serialize($gedcom, 'json', ['groups' => 'model_to_json']);
    }

    public function serializeAllToManageGenealogy(array $gedcomList)
    {
        return $this->serializer->serialize($gedcomList, 'json', ['groups' => 'managegenealogy_to_json']);
    }

    public function serializeOneToManageGenealogy(Gedcom $gedcom)
    {
        return $this->serializer->serialize($gedcom, 'json', ['groups' => 'model_to_json']);
    }
    
}
