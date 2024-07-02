<?php

namespace App\Entity\ComponentLevelDataTypes;

use App\Repository\ComponentLevelDataTypes\IndividualEventRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Entity\TopLevelDataTypes\Individual;


#[ORM\Entity(repositoryClass: IndividualEventRepository::class)]
class IndividualEvents
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(targetEntity: IndividualEventDetail::class, cascade: ['persist', 'remove'])]
    #[Groups(['model_to_json'])]
    private ?IndividualEventDetail $birthDetail = null;
    
    #[ORM\OneToOne(targetEntity: IndividualEventDetail::class, cascade: ['persist', 'remove'])]
    #[Groups(['model_to_json'])]
    private ?IndividualEventDetail $deathDetail = null;

    #[ORM\Column(type: 'string')]
    #[Groups(['model_to_json'])]
    private ?String $death = null;

    #[ORM\ManyToOne(inversedBy: 'names')]
    private ?Individual $individual = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBirthDetail(): ?IndividualEventDetail
    {
        return $this->birthDetail;
    }

    public function setBirthDetail(?IndividualEventDetail $birthDetail): static
    {
        $this->birthDetail = $birthDetail;
        return $this;
    }

    public function getDeath(): ?String
    {
        return $this->death;
    }

    public function setDeath(String $death): static
    {
        $this->death = $death;
        return $this;
    }

    public function getDeathDetail(): ?IndividualEventDetail
    {
        return $this->deathDetail;
    }

    public function setDeathDetail(IndividualEventDetail $deathDetail): static
    {
        $this->deathDetail = $deathDetail;
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
