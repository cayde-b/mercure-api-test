<?php

declare(strict_types=1);

namespace App\Trait;

use App\Entity\User;
use Doctrine\ORM\Mapping as ORM;

trait CreatedByTrait
{
    #[ORM\ManyToOne(targetEntity: User::class)]
    protected ?User $createdBy = null;

    public function getCreatedBy(): ?User
    {
        return $this->createdBy;
    }

    public function setCreatedBy(?User $createdBy): self
    {
        $this->createdBy = $createdBy;

        return $this;
    }
}
