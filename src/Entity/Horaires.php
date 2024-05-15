<?php

namespace App\Entity;

use App\Repository\HorairesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HorairesRepository::class)]
class Horaires
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Etablissement $idEtablissement = null;

    #[ORM\Column(type: Types::STRING)]
    private ?string $Lundi = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $Mardi = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $Mercredi = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $Jeudi = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $Vendredi = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $Samedi = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $Dimanche = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $creationDate = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $modificationDate = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdEtablissement(): ?Etablissement
    {
        return $this->idEtablissement;
    }

    public function setIdEtablissement(?Etablissement $idEtablissement): static
    {
        $this->idEtablissement = $idEtablissement;

        return $this;
    }

    public function getLundi(): ?string
    {
        return $this->Lundi;
    }

    public function setLundi(string $Lundi): static
    {
        $this->Lundi = $Lundi;

        return $this;
    }

    public function getMardi(): ?\DateTimeInterface
    {
        return $this->Mardi;
    }

    public function setMardi(\DateTimeInterface $Mardi): static
    {
        $this->Mardi = $Mardi;

        return $this;
    }

    public function getMercredi(): ?\DateTimeInterface
    {
        return $this->Mercredi;
    }

    public function setMercredi(\DateTimeInterface $Mercredi): static
    {
        $this->Mercredi = $Mercredi;

        return $this;
    }

    public function getJeudi(): ?\DateTimeInterface
    {
        return $this->Jeudi;
    }

    public function setJeudi(\DateTimeInterface $Jeudi): static
    {
        $this->Jeudi = $Jeudi;

        return $this;
    }

    public function getVendredi(): ?\DateTimeInterface
    {
        return $this->Vendredi;
    }

    public function setVendredi(\DateTimeInterface $Vendredi): static
    {
        $this->Vendredi = $Vendredi;

        return $this;
    }

    public function getSamedi(): ?\DateTimeInterface
    {
        return $this->Samedi;
    }

    public function setSamedi(\DateTimeInterface $Samedi): static
    {
        $this->Samedi = $Samedi;

        return $this;
    }

    public function getDimanche(): ?\DateTimeInterface
    {
        return $this->Dimanche;
    }

    public function setDimanche(\DateTimeInterface $Dimanche): static
    {
        $this->Dimanche = $Dimanche;

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

    public function getNo(): ?string
    {
        return $this->no;
    }

    public function setNo(string $no): static
    {
        $this->no = $no;

        return $this;
    }
}
