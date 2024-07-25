<?php

namespace App\Entity\ComponentLevelDataTypes;

use App\Repository\ComponentLevelDataTypes\NamePieceRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: NamePieceRepository::class)]
class NamePiece
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['model_to_json'])]
    private ?int $id = null;

    #[ORM\Column(length: 30, nullable: true)]
    #[Groups(['model_to_json'])]
    private ?string $prefix = null;

    #[ORM\Column(length: 120, nullable: true)]
    #[Groups(['model_to_json'])]
    private ?string $given = null;

    #[ORM\Column(length: 30, nullable: true)]
    #[Groups(['model_to_json'])]
    private ?string $nickname = null;

    #[ORM\Column(length: 30, nullable: true)]
    #[Groups(['model_to_json'])]
    private ?string $surnamePrefix = null;

    #[ORM\Column(length: 120, nullable: true)]
    #[Groups(['model_to_json'])]
    private ?string $surname = null;

    #[ORM\Column(length: 30, nullable: true)]
    #[Groups(['model_to_json'])]
    private ?string $suffix = null;

    #[ORM\ManyToOne(inversedBy: 'NamePieces')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Name $name = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrefix(): ?string
    {
        return $this->prefix;
    }

    public function setPrefix(?string $prefix): static
    {
        $this->prefix = $prefix;
        return $this;
    }

    public function getGiven(): ?string
    {
        return $this->given;
    }

    public function setGiven(?string $given): static
    {
        $this->given = $given;
        return $this;
    }

    public function getNickname(): ?string
    {
        return $this->nickname;
    }

    public function setNickname(?string $nickname): static
    {
        $this->nickname = $nickname;
        return $this;
    }

    public function getSurnamePrefix(): ?string
    {
        return $this->surnamePrefix;
    }

    public function setSurnamePrefix(?string $surnamePrefix): static
    {
        $this->surnamePrefix = $surnamePrefix;
        return $this;
    }

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(?string $surname): static
    {
        $this->surname = $surname;
        return $this;
    }

    public function getSuffix(): ?string
    {
        return $this->suffix;
    }

    public function setSuffix(?string $suffix): static
    {
        $this->suffix = $suffix;
        return $this;
    }

    public function getName(): ?Name
    {
        return $this->name;
    }

    public function setName(?Name $name): static
    {
        $this->name = $name;
        return $this;
    }
}
