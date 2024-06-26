<?php

namespace App\Entity;

use App\Repository\HorairesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use DateTimeImmutable;
use DateTimeInterface;

#[ORM\Entity(repositoryClass: HorairesRepository::class)]
#[ORM\HasLifecycleCallbacks]
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

    #[ORM\Column(type: Types::STRING)]
    private ?string $Mardi = null;

    #[ORM\Column(type: Types::STRING)]
    private ?string $Mercredi = null;

    #[ORM\Column(type: Types::STRING)]
    private ?string $Jeudi = null;

    #[ORM\Column(type: Types::STRING)]
    private ?string $Vendredi = null;

    #[ORM\Column(type: Types::STRING)]
    private ?string $Samedi = null;

    #[ORM\Column(type: Types::STRING)]
    private ?string $Dimanche = null;

    #[ORM\Column(type: Types::DATETIME_IMMUTABLE)]
    private ?DateTimeImmutable $creationDate = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?DateTimeInterface $modificationDate = null;

    public function __construct()
    {
        $this->setcreationDate(new \DateTimeImmutable());
        $this->setmodificationDate(new \DateTime());
    }

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

    public function getMardi(): ?string
    {
        return $this->Mardi;
    }

    public function setMardi(string $Mardi): static
    {
        $this->Mardi = $Mardi;

        return $this;
    }

    public function getMercredi(): ?string
    {
        return $this->Mercredi;
    }

    public function setMercredi(string $Mercredi): static
    {
        $this->Mercredi = $Mercredi;

        return $this;
    }

    public function getJeudi(): ?string
    {
        return $this->Jeudi;
    }

    public function setJeudi(string $Jeudi): static
    {
        $this->Jeudi = $Jeudi;

        return $this;
    }

    public function getVendredi(): ?string
    {
        return $this->Vendredi;
    }

    public function setVendredi(string $Vendredi): static
    {
        $this->Vendredi = $Vendredi;

        return $this;
    }

    public function getSamedi(): ?string
    {
        return $this->Samedi;
    }

    public function setSamedi(string $Samedi): static
    {
        $this->Samedi = $Samedi;

        return $this;
    }

    public function getDimanche(): ?string
    {
        return $this->Dimanche;
    }

    public function setDimanche(string $Dimanche): static
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

    #[ORM\PrePersist]
    public function setCreationDateValue(): void
    {
        $this->creationDate = new DateTimeImmutable();
    }

    #[ORM\PreUpdate]
    public function setModificationDateValue(): void
    {
        $this->modificationDate = new \DateTime();
    }
}
