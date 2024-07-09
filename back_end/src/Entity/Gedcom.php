<?php

namespace App\Entity;

use App\Entity\TopLevelDataTypes\Family;
use App\Entity\TopLevelDataTypes\Header;
use App\Entity\TopLevelDataTypes\Individual;
use App\Repository\GedcomRepository;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;


#[ORM\Entity(repositoryClass: GedcomRepository::class)]
class Gedcom
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['managegenealogy_to_json'])]
    private ?int $id = null;

    #[ORM\OneToOne(inversedBy: 'gedcom', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['model_to_json'])]
    private ?Header $header = null;

    #[ORM\OneToMany(mappedBy: 'gedcom', targetEntity: Individual::class, orphanRemoval: true)]
    #[Groups(['model_to_json'])]
    private Collection $individuals;
    
    #[ORM\OneToMany(mappedBy: 'gedcom', targetEntity: Family::class, orphanRemoval: true)]
    #[Groups(['model_to_json'])]
    private Collection $families;

    #[ORM\Column(length: 4)]
    private ?string $trailer = null;

    #[ORM\Column(length: 90)]
    #[Groups(['managegenealogy_to_json'])]
    private ?string $name = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    #[Groups(['managegenealogy_to_json'])]
    private ?\DateTimeInterface $creationDate = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    #[Groups(['managegenealogy_to_json'])]
    private ?\DateTimeInterface $lastModifiedDate = null;

    #[ORM\ManyToOne(inversedBy: 'user')]
    private ?User $user = null;

    public function __construct()
    {
        $this->families = new ArrayCollection();
        $this->individuals = new ArrayCollection();
        $this->creationDate = new DateTime();
        $this->lastModifiedDate = new DateTime();
        $this->trailer = 'TRLR';
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHeader(): ?Header
    {
        return $this->header;
    }

    public function setHeader(Header $header): static
    {
        $this->header = $header;
        return $this;
    }

    /**
     * @return Collection<int, Family>
     */
    public function getFamilies(): Collection
    {
        return $this->families;
    }

    public function addFamily(Family $family): static
    {
        if (!$this->families->contains($family)) {
            $this->families->add($family);
            //$family->setGedcom($this);
        }
        return $this;
    }

    public function removeFamily(Family $family): static
    {
        $this->families->removeElement($family);
        /*if ($this->families->removeElement($family)) {
            // set the owning side to null (unless already changed)
            if ($family->getGedcom() === $this) {
                $family->setGedcom(null);
            }
        }*/
        return $this;
    }

    /**
     * @return Collection<int, Individual>
     */
    public function getIndividuals(): Collection
    {
        return $this->individuals;
    }

    public function addIndividual(Individual $individual): static
    {
        if (!$this->individuals->contains($individual)) {
            $this->individuals->add($individual);
            // $individual->setGedcom($this);
        }
        return $this;
    }

    // public function removeIndividual(Individual $individual): static
    // {
    //     if ($this->individuals->removeElement($individual)) {
    //         // set the owning side to null (unless already changed)
    //         if ($individual->getGedcom() === $this) {
    //             $individual->setGedcom(null);
    //         }
    //     }
    //     return $this;
    // }

    public function getTrailer(): ?string
    {
        return $this->trailer;
    }

    public function setTrailer(string $trailer): static
    {
        $this->trailer = $trailer;
        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;
        return $this;
    }

    public function getCreationDate(): ?\DateTimeInterface
    {
        return $this->creationDate;
    }

    public function setCreationDate(\DateTimeInterface $creationDate): static
    {
        $this->creationDate = $creationDate;
        return $this;
    }

    public function getLastModifiedDate(): ?\DateTimeInterface
    {
        return $this->lastModifiedDate;
    }

    public function setLastModifiedDate(\DateTimeInterface $lastModifiedDate): static
    {
        $this->lastModifiedDate = $lastModifiedDate;
        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;
        return $this;
    }
}
