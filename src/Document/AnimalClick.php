<?php

namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

#[MongoDB\Document]
class AnimalClick
{
    #[MongoDB\Id]
    private $id;

    #[MongoDB\Field(type: "int")]
    private $animalId;

    #[MongoDB\Field(type: "int")]
    private $clicks = 0;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getAnimalId(): int
    {
        return $this->animalId;
    }

    public function setAnimalId(int $animalId): self
    {
        $this->animalId = $animalId;
        return $this;
    }

    public function getClicks(): int
    {
        return $this->clicks;
    }

    public function incrementClicks(): self
{
    $this->clicks++;
    error_log('incrementClicks called, current clicks: ' . $this->clicks); // Ajout de journal
    return $this;
}

}
