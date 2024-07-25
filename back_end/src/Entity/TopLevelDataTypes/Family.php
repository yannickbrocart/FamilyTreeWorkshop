<?php

namespace App\Entity\TopLevelDataTypes;

use App\Repository\TopLevelDataTypes\FamilyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use app\Entity\TopLevelDataTypes\Individual;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Entity\Gedcom;


#[ORM\Entity(repositoryClass: FamilyRepository::class)]
class Family
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'NONE')]
    #[ORM\Column]
    #[Groups(['model_to_json'])]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'spouseToFamily1')]
    #[Groups(['families_to_json'])]
    private ?Individual $person1 = null;

    #[ORM\ManyToOne(inversedBy: 'spouseToFamily')]
    #[Groups(['families_to_json'])]
    private ?Individual $person2 = null;

    #[ORM\OneToMany(targetEntity: Individual::class, mappedBy: 'childToFamily')]
    #[Groups(['families_to_json'])]
    private Collection $childs;

    #[ORM\ManyToOne(inversedBy: 'families')]
    #[ORM\JoinColumn(nullable: true)]
    private ?Gedcom $gedcom = null; 

    public function __construct()
    {
        $this->childs = new ArrayCollection();
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

    public function getPerson1(): ?Individual
    {
        return $this->person1;
    }

    public function setPerson1(?Individual $person1): static
    {
        $this->person1 = $person1;

        return $this;
    }

    public function getPerson2(): ?Individual
    {
        return $this->person2;
    }

    public function setPerson2(?Individual $person2): static
    {
        $this->person2 = $person2;

        return $this;
    }

    /**
     * @return Collection<int, Individual>
     */
    public function getChilds(): Collection
    {
        return $this->childs;
    }

    public function addChild(Individual $child): static
    {
        if (!$this->childs->contains($child)) {
            $this->childs->add($child);
            $child->setChildToFamily($this);
        }

        return $this;
    }

    public function removeChild(Individual $child): static
    {
        if ($this->childs->removeElement($child)) {
            // set the owning side to null (unless already changed)
            if ($child->getChildToFamily() === $this) {
                $child->setChildToFamily(null);
            }
        }

        return $this;
    }

    public function getGedcom(): ?Gedcom
    {
        return $this->gedcom;
    }

    public function setGedcom(?Gedcom $gedcom): static
    {
        $this->gedcom = $gedcom;
        return $this;
    }
    
}
