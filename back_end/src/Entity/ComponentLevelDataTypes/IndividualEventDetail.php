<?php

namespace App\Entity\ComponentLevelDataTypes;

use App\Repository\ComponentLevelDataTypes\IndividualEventDetailRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;


#[ORM\Entity(repositoryClass: IndividualEventDetailRepository::class)]
class IndividualEventDetail
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(targetEntity: EventDetail::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['model_to_json'])]
    private ?EventDetail $eventDetail = null;

    #[ORM\Column(length: 13, nullable: true)]
    #[Groups(['model_to_json'])]
    private ?string $ageAtEvent = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEventDetail(): ?EventDetail
    {
        return $this->eventDetail;
    }

    public function setEventDetail(EventDetail $eventDetail): static
    {
        $this->eventDetail = $eventDetail;
        return $this;
    }

    public function getAgeAtEvent(): ?string
    {
        return $this->ageAtEvent;
    }

    public function setAgeAtEvent(?string $ageAtEvent): static
    {
        $this->ageAtEvent = $ageAtEvent;
        return $this;
    }


}
