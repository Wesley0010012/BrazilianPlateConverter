<?php

namespace Wesley0010012\BrazilianPlateConverter\Utils;

use DomainException;

abstract class ConvertEnvTextBooleanToBoolean
{
    public const TRUE = 'TRUE';
    public const FALSE = 'FALSE';

    public static function convert(string $text, string $envVariable, ?bool $default = null): bool
    {
        return match (strtoupper($text)) {
            self::TRUE => true,
            self::FALSE => false,
            default => (function () use ($default, $envVariable) {
                if (is_bool($default)) {
                    return $default;
                }

                throw new DomainException("Invalid environment variable $envVariable");
            })()
        };
    }
}
