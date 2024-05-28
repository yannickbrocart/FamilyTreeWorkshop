<?php

namespace App\Entity\ComponentLevelDataTypes;

use App\Entity\EnumeratedValues\KnownNameTypes;
use App\Entity\TopLevelDataTypes\Individual;
use App\Repository\ComponentLevelDataTypes\NameRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;


#[ORM\Entity(repositoryClass: NameRepository::class)]
class Name
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: 'string', enumType: KnownNameTypes::class, nullable: true)]
    #[Groups(['model_to_json'])]
    private ?KnownNameTypes $type = null;

    #[ORM\OneToMany(targetEntity: NamePiece::class, mappedBy: 'name', cascade: ['persist', 'remove'])]
    #[Groups(['model_to_json'])]
    private Collection $namePieces;

    #[ORM\ManyToOne(targetEntity: Individual::class, inversedBy: 'names')]
    #[Groups(['model_to_json'])]
    private Individual $individual;


    public function __construct()
    {
        $this->namePieces = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?KnownNameTypes
    {
        return $this->type;
    }

    public function setType(?KnownNameTypes $type): static
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return Collection<int, NamePiece>
     */
    public function getNamePieces(): Collection
    {
        return $this->namePieces;
    }

    public function addNamePiece(NamePiece $namePiece): static
    {
        if (!$this->namePieces->contains($namePiece)) {
            $this->namePieces->add($namePiece);
        }
        return $this;
    }
    
    public function getIndividual()
    {
        return $this->individual;
    }

    public function setIndividual($individual)
    {
        $this->individual = $individual;
        return $this;
    }
}
