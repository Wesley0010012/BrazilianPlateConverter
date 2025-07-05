<?php

namespace Wesley0010012\BrazilianPlateConverter\Impl\Facades;

use DomainException;
use Wesley0010012\BrazilianPlateConverter\Facades\BrazilianPlateConverterFacade;
use Wesley0010012\BrazilianPlateConverter\Protocols\IStrategy;

class BrazilianPlateConverterFacadeImpl implements BrazilianPlateConverterFacade
{
    public function __construct(
        private IStrategy $validateMercosulPlate,
        private IStrategy $validateNationalPlate,
        private IStrategy $convertNationalToMercosul,
        private IStrategy $convertMercosulToNational,
        private bool $throwError = true
    ) {}

    public function toNational(string $mercosulPlate): string
    {
        return $this->validateEntryPlate($mercosulPlate, fn() => $this->isNational($mercosulPlate), fn() => $this->tryOrReturn($mercosulPlate, fn() => $this->convertMercosulToNational->execute($mercosulPlate)));
    }

    public function toMercosul(string $nationalPlate): string
    {
        return $this->validateEntryPlate($nationalPlate, fn() => $this->isMercosul($nationalPlate), fn() => $this->tryOrReturn($nationalPlate, fn() => $this->convertNationalToMercosul->execute($nationalPlate)));
    }

    public function isMercosul(string $mercosulPlate): bool
    {
        return $this->validateMercosulPlate->execute($mercosulPlate);
    }

    public function isNational(string $nationalPlate): bool
    {
        return $this->validateNationalPlate->execute($nationalPlate);
    }

    public function isPlate(string $plate): bool
    {
        return $this->isMercosul($plate) || $this->isNational($plate);
    }

    public function convert(string $plate): string
    {
        return match (true) {
            $this->isMercosul($plate) => $this->toNational($plate),
            $this->isNational($plate) => $this->toMercosul($plate),
            default => (function () use ($plate) {
                if ($this->throwError) {
                    throw new DomainException("Invalid plate was provided");
                }

                return $plate;
            })()
        };
    }

    private function validateEntryPlate(string $plate, callable $validation, callable $next): string
    {
        if ($validation()) {
            return $plate;
        }

        return $next();
    }

    private function tryOrReturn(string $original, callable $callback): string
    {
        try {
            return $callback();
        } catch (\Throwable $e) {
            if ($this->throwError) {
                throw $e;
            }

            return $original;
        }
    }
}
