<?php

namespace App\Entity;

use App\Repository\HabitatsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use DateTimeImmutable;
use DateTimeInterface;

#[ORM\Entity(repositoryClass: HabitatsRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Habitats
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Etablissement $Etablissement = null;

    #[ORM\Column(length: 255)]
    private ?string $Nom = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Description = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\Column(type: Types::DATETIME_IMMUTABLE)]
    private ?DateTimeImmutable $creationDate = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?DateTimeInterface $modificationDate = null;

    public function __construct()
    {
        $this->setCreationDate(new \DateTimeImmutable());
        $this->setModificationDate(new \DateTime());
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEtablissement(): ?Etablissement
    {
        return $this->Etablissement;
    }

    public function setEtablissement(?Etablissement $Etablissement): static
    {
        $this->Etablissement = $Etablissement;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): static
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): static
    {
        $this->Description = $Description;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getCreationDate(): ?\DateTimeImmutable
    {
        return $this->creationDate;
    }

    public function setCreationDate(\DateTimeImmutable $creationDate): static
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    public function getModificationDate(): ?\DateTimeInterface
    {
        return $this->modificationDate;
    }

    public function setModificationDate(\DateTimeInterface $modificationDate): static
    {
        $this->modificationDate = $modificationDate;

        return $this;
    }

    #[ORM\PrePersist]
    public function setCreationDateValue(): void
    {
        if ($this->creationDate === null) {
            $this->creationDate = new DateTimeImmutable();
        }
    }

    #[ORM\PrePersist]
    #[ORM\PreUpdate]
    public function setModificationDateValue(): void
    {
        $this->modificationDate = new \DateTime();
    }
}
