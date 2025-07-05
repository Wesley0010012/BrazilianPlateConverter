<?php

namespace Wesley0010012\BrazilianPlateConverter\Facades;

interface BrazilianPlateConverterFacade
{
    public function toNational(string $mercosulPlate): string;

    public function toMercosul(string $nationalPlate): string;

    public function isMercosul(string $mercosulPlate): bool;

    public function isNational(string $nationalPlate): bool;

    public function isPlate(string $plate): bool;

    public function convert(string $plate): string;
}
