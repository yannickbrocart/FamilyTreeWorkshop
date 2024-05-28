<?php

namespace App\Entity\TopLevelDataTypes;

use App\Entity\ComponentLevelDataTypes\IndividualEvents;
use App\Entity\ComponentLevelDataTypes\Name;
use App\Entity\EnumeratedValues\KnownSexTypes;
use App\Entity\Gedcom;
use App\Repository\TopLevelDataTypes\IndividualRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;


#[ORM\Entity(repositoryClass: IndividualRepository::class)]
class Individual
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'NONE')]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToMany(targetEntity: Name::class, mappedBy: 'individual', cascade: ['persist', 'remove'])]
    #[Groups(['model_to_json'])]
    private Collection $names;

    #[ORM\Column(type: 'string', enumType: KnownSexTypes::class)]
    #[Groups(['model_to_json'])]
    private ?KnownSexTypes $sex = null;

    #[ORM\OneToOne(targetEntity: IndividualEvents::class, cascade: ['persist', 'remove'])]
    #[Groups(['model_to_json'])]
    private ?IndividualEvents $individualEvents = null;

    #[ORM\ManyToOne(targetEntity: Family::class, inversedBy: 'childs')]
    #[Groups(['model_to_json'])]
    private ?Family $childToFamily = null;

    #[ORM\OneToMany(targetEntity: Family::class, mappedBy: 'person1')]
    #[Groups(['model_to_json'])]
    private Collection $spouseToFamily1;

    #[ORM\OneToMany(targetEntity: Family::class, mappedBy: 'person2')]
    #[Groups(['model_to_json'])]
    private Collection $spouseToFamily2;


    public function __construct()
    {
        $this->names = new ArrayCollection();
        $this->spouseToFamily1 = new ArrayCollection();
        $this->spouseToFamily2 = new ArrayCollection();
    }

    public function setId(int $id): static
    {
        $this->id = $id;
        return $this;
    }
    
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Name>
     */
    public function getNames(): Collection
    {
        return $this->names;
    }

    public function addName(Name $name): static
    {
        if (!$this->names->contains($name)) {
            $this->names->add($name);
        }
        return $this;
    }

    public function getSex(): KnownSexTypes
    {
        return $this->sex;
    }

    public function setSex(KnownSexTypes $sex): static
    {
        $this->sex = $sex;
        return $this;
    }

    public function getChildToFamily(): ?Family
    {
        return $this->childToFamily;
    }

    public function setChildToFamily(?Family &$childToFamily): static
    {
        $this->childToFamily = $childToFamily;
        return $this;
    }

     /**
     * @return Collection<int, Family>
     */
    public function getSpouseToFamily1(): Collection
    {
        return $this->spouseToFamily1;
    }

    public function addSpouseToFamily1(Family $family): static
    {
        if (!$this->spouseToFamily1->contains($family)) {
            $this->spouseToFamily1->add($family);
        }
        return $this;
    }

    public function removeSpouseToFamily1(Family $family): static
    {
        $this->spouseToFamily1->removeElement($family);
        return $this;
    }

     /**
     * @return Collection<int, Family>
     */
    public function getSpouseToFamily2(): Collection
    {
        return $this->spouseToFamily2;
    }

    public function addSpouseToFamily2(Family $family): static
    {
        if (!$this->spouseToFamily2->contains($family)) {
            $this->spouseToFamily2->add($family);
        }
        return $this;
    }

    public function removeSpouseToFamily2(Family $family): static
    {
        $this->spouseToFamily2->removeElement($family);
        return $this;
    }
       

    public static function findIndividualById(Gedcom $gedcom, int $id)
    {
        $individuals = $gedcom->getIndividuals();                
        foreach ($individuals as $individual) {
           if ($individual->getId() == $id) return $individual;
        }
        return null;
    }

    public function getIndividualEvents()
    {
        return $this->individualEvents;
    }

    public function setIndividualEvents($individualEvents)
    {
        $this->individualEvents = $individualEvents;
        return $this;
    }
}
