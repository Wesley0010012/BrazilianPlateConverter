<?php

namespace Wesley0010012\BrazilianPlateConverter\Impl\Strategies;

use DomainException;
use Wesley0010012\BrazilianPlateConverter\Protocols\IStrategy;

class ConvertNationalToMercosul implements IStrategy
{
    public function __construct(
        private IStrategy $validateNationalPlate
    ) {}

    public function execute(mixed $input): mixed
    {
        $plate = (fn($i): string => $i)($input);

        if (!$this->validateNationalPlate->execute($plate)) {
            throw new DomainException("Invalid national plate was provided");
        }

        $plate = strtoupper($plate);

        $plate[4] = chr(ord('A') + $plate[4]);
        return $plate;
    }
}
