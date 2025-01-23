<?php

declare(strict_types=1);

namespace App\Trait;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

trait ArchiveTrait
{
    #[ORM\Column(type: Types::BOOLEAN)]
    protected ?bool $archived = false;

    public function isArchived(): ?bool
    {
        return $this->archived;
    }

    public function setArchived(bool $archived): self
    {
        $this->archived = $archived;

        return $this;
    }
}
