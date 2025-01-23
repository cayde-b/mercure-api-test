<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Trait\IdTrait;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Entity;

#[ApiResource(mercure: true)]
#[Entity]
class Book
{
    use IdTrait;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $name = null;

    #[ORM\Column]
    public ?string $status = '';

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }
}
