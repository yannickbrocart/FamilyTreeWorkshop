<?php

namespace App\Entity\TopLevelDataTypes;

use App\Entity\EnumeratedValues\KnownCharacterSetTypes;
use App\Entity\Gedcom;
use App\Repository\TopLevelDataTypes\HeaderRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: HeaderRepository::class)]
class Header
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['model_to_json'])]
    private ?int $id = null;

    #[ORM\Column(length: 11)]
    #[Groups(['model_to_json'])]
    private ?string $versionNumber = null;

    #[ORM\Column(length: 20)]
    #[Groups(['model_to_json'])]
    private ?string $versionForm = null;

    #[ORM\Column(type: 'string', enumType: KnownCharacterSetTypes::class)]
    #[Groups(['model_to_json'])]
    private ?KnownCharacterSetTypes $charactereSet = null;

    #[ORM\Column(length: 20, nullable: true)]
    #[Groups(['model_to_json'])]
    private ?string $receivingSystemName = null;

    #[ORM\Column(length: 15, nullable: true)]
    #[Groups(['model_to_json'])]
    private ?string $sourceVersionNumber = null;

    #[ORM\Column(length: 90, nullable: true)]
    #[Groups(['model_to_json'])]
    private ?string $sourceName = null;

    #[ORM\Column(length: 90, nullable: true)]
    #[Groups(['model_to_json'])]
    private ?string $sourceBusiness = null;

    #[ORM\Column(length: 90, nullable: true)]
    #[Groups(['model_to_json'])]
    private ?string $sourceNameData = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    #[Groups(['model_to_json'])]
    private ?\DateTimeInterface $sourceNameDataDate = null;

    #[ORM\Column(length: 248, nullable: true)]
    #[Groups(['model_to_json'])]
    private ?string $sourceNameDataCopyright = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    #[Groups(['model_to_json'])]
    private ?\DateTimeInterface $fileCreationDate = null;

    #[ORM\Column(length: 15, nullable: true)]
    #[Groups(['model_to_json'])]
    private ?string $language = null;

    #[ORM\Column(length: 248, nullable: true)]
    #[Groups(['model_to_json'])]
    private ?string $fileName = null;

    #[ORM\Column(length: 248, nullable: true)]
    #[Groups(['model_to_json'])]
    private ?string $copyright = null;

    #[ORM\Column(length: 248, nullable: true)]
    #[Groups(['model_to_json'])]
    private ?string $note = null;

    #[ORM\OneToOne(mappedBy: 'header', cascade: ['persist', 'remove'])]
    private ?Gedcom $gedcom = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVersionNumber(): ?string
    {
        return $this->versionNumber;
    }

    public function setVersionNumber(string $versionNumber): static
    {
        $this->versionNumber = $versionNumber;

        return $this;
    }

    public function getVersionForm(): ?string
    {
        return $this->versionForm;
    }

    public function setVersionForm(string $versionForm): static
    {
        $this->versionForm = $versionForm;

        return $this;
    }

    public function getCharactereSet(): ?KnownCharacterSetTypes
    {
        return $this->charactereSet;
    }

    public function setCharactereSet(KnownCharacterSetTypes $charactereSet): static
    {
        $this->charactereSet = $charactereSet;

        return $this;
    }

    public function getReceivingSystemName(): ?string
    {
        return $this->receivingSystemName;
    }

    public function setReceivingSystemName(?string $receivingSystemName): static
    {
        $this->receivingSystemName = $receivingSystemName;

        return $this;
    }

    public function getSourceVersionNumber(): ?string
    {
        return $this->sourceVersionNumber;
    }

    public function setSourceVersionNumber(?string $sourceVersionNumber): static
    {
        $this->sourceVersionNumber = $sourceVersionNumber;

        return $this;
    }

    public function getSourceName(): ?string
    {
        return $this->sourceName;
    }

    public function setSourceName(?string $sourceName): static
    {
        $this->sourceName = $sourceName;

        return $this;
    }

    public function getSourceBusiness(): ?string
    {
        return $this->sourceBusiness;
    }

    public function setSourceBusiness(?string $sourceBusiness): static
    {
        $this->sourceBusiness = $sourceBusiness;

        return $this;
    }

    public function getSourceNameData(): ?string
    {
        return $this->sourceNameData;
    }

    public function setSourceNameData(?string $sourceNameData): static
    {
        $this->sourceNameData = $sourceNameData;

        return $this;
    }

    public function getSourceNameDataDate(): ?\DateTimeInterface
    {
        return $this->sourceNameDataDate;
    }

    public function setSourceNameDataDate(?\DateTimeInterface $sourceNameDataDate): static
    {
        $this->sourceNameDataDate = $sourceNameDataDate;

        return $this;
    }

    public function getSourceNameDataCopyright(): ?string
    {
        return $this->sourceNameDataCopyright;
    }

    public function setSourceNameDataCopyright(?string $sourceNameDataCopyright): static
    {
        $this->sourceNameDataCopyright = $sourceNameDataCopyright;

        return $this;
    }

    public function getFileCreationDate(): ?\DateTimeInterface
    {
        return $this->fileCreationDate;
    }

    public function setFileCreationDate(?\DateTimeInterface $fileCreationDate): static
    {
        $this->fileCreationDate = $fileCreationDate;

        return $this;
    }

    public function getLanguage(): ?string
    {
        return $this->language;
    }

    public function setLanguage(?string $language): static
    {
        $this->language = $language;

        return $this;
    }

    public function getFileName(): ?string
    {
        return $this->fileName;
    }

    public function setFileName(?string $fileName): static
    {
        $this->fileName = $fileName;

        return $this;
    }

    public function getCopyright(): ?string
    {
        return $this->copyright;
    }

    public function setCopyright(?string $copyright): static
    {
        $this->copyright = $copyright;

        return $this;
    }

    public function getNote(): ?string
    {
        return $this->note;
    }

    public function setNote(?string $note): static
    {
        $this->note = $note;

        return $this;
    }

    public function getGedcom(): ?Gedcom
    {
        return $this->gedcom;
    }

    public function setGedcom(?Gedcom $gedcom): static
    {
        // unset the owning side of the relation if necessary
        if ($gedcom === null && $this->gedcom !== null) {
            $this->gedcom->setHeader(null);
        }

        // set the owning side of the relation if necessary
        if ($gedcom !== null && $gedcom->getHeader() !== $this) {
            $gedcom->setHeader($this);
        }

        $this->gedcom = $gedcom;

        return $this;
    }
}
