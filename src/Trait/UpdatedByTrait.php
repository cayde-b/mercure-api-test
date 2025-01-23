<?php

declare(strict_types=1);

namespace App\Trait;

use App\Entity\User;
use Doctrine\ORM\Mapping as ORM;

trait UpdatedByTrait
{
    #[ORM\ManyToOne(targetEntity: User::class)]
    protected ?User $updatedBy = null;

    public function getUpdatedBy(): ?User
    {
        return $this->updatedBy;
    }

    public function setUpdatedBy(?User $updatedBy): self
    {
        $this->updatedBy = $updatedBy;

        return $this;
    }
}
