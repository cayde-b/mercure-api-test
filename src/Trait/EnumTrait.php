<?php

declare(strict_types=1);

namespace App\Trait;

trait EnumTrait
{
    public static function getNames(): array
    {
        return array_column(self::cases(), 'name');
    }

    public static function getValues(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function getRandomValue(): self
    {
        $values = self::cases();
        
        return $values[array_rand($values)];
    }
}
