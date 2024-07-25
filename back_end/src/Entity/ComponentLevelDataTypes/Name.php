<?php

namespace App\Entity\ComponentLevelDataTypes;

use App\Entity\TopLevelDataTypes\Individual;
use App\Repository\ComponentLevelDataTypes\NameRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\EnumeratedValues\KnownNameTypes;
use app\Entity\ComponentLevelDataTypes\NamePiece;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: NameRepository::class)]
class Name
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['model_to_json'])]
    private ?int $id = null;

    #[ORM\Column(type: 'string', enumType: KnownNameTypes::class, nullable: true)]
    #[Groups(['model_to_json'])]
    private ?KnownNameTypes $type = null;

    #[ORM\OneToMany(targetEntity: 'App\Entity\ComponentLevelDataTypes\NamePiece', 
    mappedBy: 'name', cascade: ['persist', 'remove'])]
    #[Groups(['model_to_json'])]
    private Collection $namePieces;

    #[ORM\ManyToOne(targetEntity: Individual::class, inversedBy: 'names')]
    private ?Individual $individual = null;

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
            $namePiece->setName($this);
        }

        return $this;
    }

    public function removeNamePiece(NamePiece $namePiece): static
    {
        if ($this->namePieces->removeElement($namePiece)) {
            // set the owning side to null (unless already changed)
            if ($namePiece->getName() === $this) {
                $namePiece->setName(null);
            }
        }

        return $this;
    }

    public function getIndividual(): ?Individual
    {
        return $this->individual;
    }

    public function setIndividual(?Individual $individual): static
    {
        $this->individual = $individual;
        return $this;
    }
}
