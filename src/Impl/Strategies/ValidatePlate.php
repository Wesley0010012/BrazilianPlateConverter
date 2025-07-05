<?php

namespace Wesley0010012\BrazilianPlateConverter\Impl\Strategies;

use Wesley0010012\BrazilianPlateConverter\Protocols\IStrategy;

class ValidatePlate implements IStrategy
{
    public function __construct(
        private readonly string $plateRegexp
    ) {}

    public function execute(mixed $input): mixed
    {
        $plate = (fn($i): string => $i)($input);

        return preg_match($this->plateRegexp, strtoupper($plate)) === 1;
    }
}
