<?php

namespace App\Enums;

use Spatie\Enum\Laravel\Enum;

/**
 * @method static self INACTIVE()
 * @method static self ACTIVE()
 */
final class Status extends Enum
{
    protected static function values(): array
    {
        return [
            'INACTIVE' => 0,
            'ACTIVE' => 1,
        ];
    }

    protected static function labels(): \Closure
    {

        return function (string $name) {
            return strtolower($name);
        };
    }
}
