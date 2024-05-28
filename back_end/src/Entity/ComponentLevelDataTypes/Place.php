<?php

namespace App\Entity\ComponentLevelDataTypes;

use App\Repository\ComponentLevelDataTypes\PlaceRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;


#[ORM\Entity(repositoryClass: PlaceRepository::class)]
class Place
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 120)]
    #[Groups(['model_to_json'])]
    private ?string $name = null;

    #[ORM\Column(length: 10, nullable: true)]
    #[Groups(['model_to_json'])]
    private ?string $lattitude = null;

    #[ORM\Column(length: 11, nullable: true)]
    #[Groups(['model_to_json'])]
    private ?string $longitude = null;

    
    public function getId(): ?int
    {
        return $this->id;
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

    public function getLattitude(): ?string
    {
        return $this->lattitude;
    }

    public function setLattitude(?string $lattitude): static
    {
        $this->lattitude = $lattitude;
        return $this;
    }

    public function getLongitude(): ?string
    {
        return $this->longitude;
    }

    public function setLongitude(?string $longitude): static
    {
        $this->longitude = $longitude;
        return $this;
    }

}
