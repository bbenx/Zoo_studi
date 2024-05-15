<?php

namespace App\Entity;

use App\Repository\ComptesRendusRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ComptesRendusRepository::class)]
class ComptesRendus
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Animaux $animal = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Users $user = null;

    #[ORM\Column(length: 255)]
    private ?string $EtatAnimal = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $detailEtat = null;

    #[ORM\Column(length: 255)]
    private ?string $typeNourriture = null;

    #[ORM\Column]
    private ?int $grammageNourriture = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $datePassage = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $creation_date = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $modification_date = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnimal(): ?Animaux
    {
        return $this->animal;
    }

    public function setAnimal(?Animaux $animal): static
    {
        $this->animal = $animal;

        return $this;
    }

    public function getUser(): ?Users
    {
        return $this->user;
    }

    public function setUser(?Users $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getEtatAnimal(): ?string
    {
        return $this->EtatAnimal;
    }

    public function setEtatAnimal(string $EtatAnimal): static
    {
        $this->EtatAnimal = $EtatAnimal;

        return $this;
    }

    public function getDetailEtat(): ?string
    {
        return $this->detailEtat;
    }

    public function setDetailEtat(string $detailEtat): static
    {
        $this->detailEtat = $detailEtat;

        return $this;
    }

    public function getTypeNourriture(): ?string
    {
        return $this->typeNourriture;
    }

    public function setTypeNourriture(string $typeNourriture): static
    {
        $this->typeNourriture = $typeNourriture;

        return $this;
    }

    public function getGrammageNourriture(): ?int
    {
        return $this->grammageNourriture;
    }

    public function setGrammageNourriture(int $grammageNourriture): static
    {
        $this->grammageNourriture = $grammageNourriture;

        return $this;
    }

    public function getDatePassage(): ?\DateTimeInterface
    {
        return $this->datePassage;
    }

    public function setDatePassage(\DateTimeInterface $datePassage): static
    {
        $this->datePassage = $datePassage;

        return $this;
    }

    public function getCreationDate(): ?\DateTimeInterface
    {
        return $this->creation_date;
    }

    public function setCreationDate(\DateTimeInterface $creation_date): static
    {
        $this->creation_date = $creation_date;

        return $this;
    }

    public function getModificationDate(): ?\DateTimeInterface
    {
        return $this->modification_date;
    }

    public function setModificationDate(\DateTimeInterface $modification_date): static
    {
        $this->modification_date = $modification_date;

        return $this;
    }
}
