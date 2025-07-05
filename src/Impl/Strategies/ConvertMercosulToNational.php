<?php

namespace Wesley0010012\BrazilianPlateConverter\Impl\Strategies;

use DomainException;
use Wesley0010012\BrazilianPlateConverter\Protocols\IStrategy;

class ConvertMercosulToNational implements IStrategy
{
    public function __construct(
        private IStrategy $validateMercosulPlate
    ) {}

    public function execute(mixed $input): mixed
    {
        $plate = (fn($i): string => $i)($input);

        if (!$this->validateMercosulPlate->execute($plate)) {
            throw new DomainException("Invalid mercosul plate was provided");
        }

        $plate = strtoupper($plate);

        $plate[4] = ord($plate[4]) - ord('A');
        return $plate;
    }
}
