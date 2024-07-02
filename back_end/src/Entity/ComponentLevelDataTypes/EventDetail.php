<?php

namespace App\Entity\ComponentLevelDataTypes;

use App\Repository\ComponentLevelDataTypes\EventDetailRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;


#[ORM\Entity(repositoryClass: EventDetailRepository::class)]
class EventDetail
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 90, nullable: true)]
    #[Groups(['model_to_json'])]
    private ?string $type = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    #[Groups(['model_to_json'])]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(length: 120, nullable: true)]
    #[Groups(['model_to_json'])]
    private ?string $responsibleAgency = null;

    #[ORM\Column(length: 90, nullable: true)]
    #[Groups(['model_to_json'])]
    private ?string $religiousAffiliation = null;

    #[ORM\Column(length: 90, nullable: true)]
    #[Groups(['model_to_json'])]
    private ?string $cause = null;

    #[ORM\ManyToOne(targetEntity: Place::class, cascade: ['persist', 'remove'])]
    #[Groups(['model_to_json'])]
    private ?Place $place = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): static
    {
        $this->type = $type;
        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): static
    {
        $this->date = $date;
        return $this;
    }

    public function getResponsibleAgency(): ?string
    {
        return $this->responsibleAgency;
    }

    public function setResponsibleAgency(?string $responsibleAgency): static
    {
        $this->responsibleAgency = $responsibleAgency;
        return $this;
    }

    public function getReligiousAffiliation(): ?string
    {
        return $this->religiousAffiliation;
    }

    public function setReligiousAffiliation(?string $religiousAffiliation): static
    {
        $this->religiousAffiliation = $religiousAffiliation;
        return $this;
    }

    public function getCause(): ?string
    {
        return $this->cause;
    }

    public function setCause(?string $cause): static
    {
        $this->cause = $cause;
        return $this;
    }

    public function getPlace(): ?Place
    {
        return $this->place;
    }

    public function setPlace(?Place $place): static
    {
        $this->place = $place;
        return $this;
    }

}
