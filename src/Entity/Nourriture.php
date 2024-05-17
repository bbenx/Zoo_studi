<?php

namespace App\Entity;

use App\Repository\NourritureRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use DateTimeImmutable;
use DateTimeInterface;

#[ORM\Entity(repositoryClass: NourritureRepository::class)]
class Nourriture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @var Collection<int, Animaux>
     */
    #[ORM\ManyToMany(targetEntity: Animaux::class)]
    private Collection $Animal;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Users $User = null;

    #[ORM\Column(length: 255)]
    private ?string $Type = null;

    #[ORM\Column]
    private ?int $Quantite = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $DatePassage = null;

    #[ORM\Column(type: Types::DATETIME_IMMUTABLE)]
    private ?DateTimeImmutable $creationDate = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?DateTimeInterface $modificationDate = null;

    public function __construct()
    {
        $this->Animal = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Animaux>
     */
    public function getAnimal(): Collection
    {
        return $this->Animal;
    }

    public function addAnimal(Animaux $animal): static
    {
        if (!$this->Animal->contains($animal)) {
            $this->Animal->add($animal);
        }

        return $this;
    }

    public function removeAnimal(Animaux $animal): static
    {
        $this->Animal->removeElement($animal);

        return $this;
    }

    public function getUser(): ?Users
    {
        return $this->User;
    }

    public function setUser(?Users $User): static
    {
        $this->User = $User;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->Type;
    }

    public function setType(string $Type): static
    {
        $this->Type = $Type;

        return $this;
    }

    public function getQuantite(): ?int
    {
        return $this->Quantite;
    }

    public function setQuantite(int $Quantite): static
    {
        $this->Quantite = $Quantite;

        return $this;
    }

    public function getDatePassage(): ?\DateTimeInterface
    {
        return $this->DatePassage;
    }

    public function setDatePassage(\DateTimeInterface $DatePassage): static
    {
        $this->DatePassage = $DatePassage;

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
