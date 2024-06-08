<?php
namespace App\Entity;

use App\Repository\UsersRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use DateTimeImmutable;
use DateTimeInterface;
use DateTime;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: UsersRepository::class)]
#[ORM\HasLifecycleCallbacks]
#[ORM\UniqueConstraint(name: 'UNIQ_IDENTIFIER_EMAIL', fields: ['email'])]
#[ORM\EntityListeners(['App\EntityListener\UsersListener'])]
class Users implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Etablissement $Etablissement = null;

    #[ORM\Column]
    private array $roles = [];

    #[ORM\Column(length: 255)]
    #[Assert\Email()]
    private ?string $email = null;

    private ?string $plainPassword = null;

    #[ORM\Column(length: 255)]
    private ?string $password = 'password';

    #[ORM\Column(type: Types::DATETIME_IMMUTABLE)]
    private ?DateTimeImmutable $creationDate = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?DateTimeInterface $modificationDate = null;

    public function __construct()
    {
        $this->setCreationDate(new DateTimeImmutable());
        $this->setModificationDate(new DateTime());
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

    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    public function getRoles(): array
    {
        $roles = $this->roles;
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getPlainPassword(): ?string
    {
        return $this->plainPassword;
    }

    public function setPlainPassword(?string $plainPassword): static
    {
        $this->plainPassword = $plainPassword;

        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    public function getCreationDate(): ?DateTimeImmutable
    {
        return $this->creationDate;
    }

    public function setCreationDate(DateTimeImmutable $creationDate): static
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    public function getModificationDate(): ?DateTimeInterface
    {
        return $this->modificationDate;
    }

    public function setModificationDate(DateTimeInterface $modificationDate): static
    {
        $this->modificationDate = $modificationDate;

        return $this;
    }

    public function eraseCredentials(): void
    {
    }

    #[ORM\PrePersist]
    public function setCreationDateValue(): void
    {
        $this->creationDate = new DateTimeImmutable();
    }

    #[ORM\PrePersist]
    #[ORM\PreUpdate]
    public function setModificationDateValue(): void
    {
        $this->modificationDate = new DateTime();
    }
}
