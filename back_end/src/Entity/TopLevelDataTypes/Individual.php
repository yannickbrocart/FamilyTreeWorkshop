<?php

namespace App\Entity\TopLevelDataTypes;

use App\Repository\TopLevelDataTypes\IndividualRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Entity\Gedcom;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\EnumeratedValues\KnownSexTypes;
use app\Entity\ComponentLevelDataTypes\IndividualEvents;
use app\Entity\ComponentLevelDataTypes\Name;
use Symfony\Component\Serializer\Annotation\Groups;


#[ORM\Entity(repositoryClass: IndividualRepository::class)]
class Individual
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'NONE')]
    #[ORM\Column]
    #[Groups(['model_to_json'])]
    private ?int $id = null;

    #[ORM\Column(type: 'string', enumType: KnownSexTypes::class, nullable: true)]
    #[Groups(['model_to_json'])]
    private ?KnownSexTypes $sex = null;

    #[ORM\OneToMany(targetEntity: Name::class, mappedBy: 'individual')]
    #[Groups(['model_to_json'])]
    private Collection $names;

    #[ORM\OneToMany(targetEntity: IndividualEvents::class, mappedBy: 'individual')]
    #[Groups(['model_to_json'])]
    private Collection $individualEvents;

    #[ORM\OneToMany(targetEntity: Family::class, mappedBy: 'person1')]
    #[Groups(['model_to_json'])]
    private Collection $spouseToFamily1;

    #[ORM\OneToMany(targetEntity: Family::class, mappedBy: 'person2')]
    #[Groups(['model_to_json'])]
    private Collection $spouseToFamily2;

    #[ORM\ManyToOne(inversedBy: 'childToFamily')]
    #[Groups(['model_to_json'])]
    private ?Family $childToFamily = null;

    public function __construct()
    {
        $this->names = new ArrayCollection();
        $this->individualEvents = new ArrayCollection();
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

    public function getSex(): ?KnownSexTypes
    {
        return $this->sex;
    }

    public function setSex(?KnownSexTypes $sex): static
    {
        $this->sex = $sex;
        return $this;
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
            $name->setIndividual($this);
        }
        return $this;
    }

    public function removeName(Name $name): static
    {
        if ($this->names->removeElement($name)) {
            // set the owning side to null (unless already changed)
            if ($name->getIndividual() === $this) {
                $name->setIndividual(null);
            }
        }
        return $this;
    }

    /**
     * @return Collection<int, IndividualEvents>
     */
    public function getIndividualEvents(): Collection
    {
        return $this->individualEvents;
    }

    public function addIndividualEvent(IndividualEvents $individualEvent): static
    {
        if (!$this->individualEvents->contains($individualEvent)) {
            $this->individualEvents->add($individualEvent);
            $individualEvent->setIndividual($this);
        }
        return $this;
    }

    public function removeIndividualEvent(IndividualEvents $individualEvent): static
    {
        if ($this->individualEvents->removeElement($individualEvent)) {
            // set the owning side to null (unless already changed)
            if ($individualEvent->getIndividual() === $this) {
                $individualEvent->setIndividual(null);
            }
        }
        return $this;
    }

    /**
     * @return Collection<int, Family>
     */
    public function getSpouseToFamily1(): Collection
    {
        return $this->spouseToFamily1;
    }

    public function addSpouseToFamily1(Family $spouseToFamily1): static
    {
        if (!$this->spouseToFamily1->contains($spouseToFamily1)) {
            $this->spouseToFamily1->add($spouseToFamily1);
            $spouseToFamily1->setPerson1($this);
        }
        return $this;
    }

    public function removeSpouseToFamily1(Family $spouseToFamily1): static
    {
        if ($this->spouseToFamily1->removeElement($spouseToFamily1)) {
            // set the owning side to null (unless already changed)
            if ($spouseToFamily1->getPerson1() === $this) {
                $spouseToFamily1->setPerson1(null);
            }
        }
        return $this;
    }

    /**
     * @return Collection<int, Family>
     */
    public function getSpouseToFamily2(): Collection
    {
        return $this->spouseToFamily2;
    }

    public function addSpouseToFamily2(Family $spouseToFamily2): static
    {
        if (!$this->spouseToFamily2->contains($spouseToFamily2)) {
            $this->spouseToFamily2->add($spouseToFamily2);
            $spouseToFamily2->setPerson2($this);
        }
        return $this;
    }

    public function removeSpouseToFamily2(Family $spouseToFamily2): static
    {
        if ($this->spouseToFamily2->removeElement($spouseToFamily2)) {
            // set the owning side to null (unless already changed)
            if ($spouseToFamily2->getPerson2() === $this) {
                $spouseToFamily2->setPerson2(null);
            }
        }
        return $this;
    }

    public function getChildToFamily(): ?Family
    {
        return $this->childToFamily;
    }

    public function setChildToFamily(?Family $childToFamily): static
    {
        $this->childToFamily = $childToFamily;
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

}
