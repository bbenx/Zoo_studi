<?php

namespace App\Entity;

use App\Repository\ComptesRendusRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use DateTimeImmutable;
use DateTimeInterface;

#[ORM\Entity(repositoryClass: ComptesRendusRepository::class)]
#[ORM\HasLifecycleCallbacks]
class ComptesRendus
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(cascade: ['persist'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Animaux $Animal = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Users $User = null;

    #[ORM\Column(length: 255)]
    private ?string $EtatAnimal = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $DetailEtat = null;

    #[ORM\Column(length: 255)]
    private ?string $TypeNourriture = null;

    #[ORM\Column]
    private ?int $GrammageNourriture = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $DatePassage = null;

    #[ORM\Column(type: Types::DATETIME_IMMUTABLE)]
    private ?DateTimeImmutable $creationDate = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?DateTimeInterface $modificationDate = null;

    public function __construct()
    {
        $this->DatePassage = new \DateTime();
        $this->setcreationDate(new \DateTimeImmutable());
        $this->setmodificationDate(new \DateTime());
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnimal(): ?Animaux
    {
        return $this->Animal;
    }

    public function setAnimal(Animaux $Animal): static
    {
        $this->Animal = $Animal;

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
        return $this->DetailEtat;
    }

    public function setDetailEtat(string $DetailEtat): static
    {
        $this->DetailEtat = $DetailEtat;

        return $this;
    }

    public function getTypeNourriture(): ?string
    {
        return $this->TypeNourriture;
    }

    public function setTypeNourriture(string $TypeNourriture): static
    {
        $this->TypeNourriture = $TypeNourriture;

        return $this;
    }

    public function getGrammageNourriture(): ?int
    {
        return $this->GrammageNourriture;
    }

    public function setGrammageNourriture(int $GrammageNourriture): static
    {
        $this->GrammageNourriture = $GrammageNourriture;

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
