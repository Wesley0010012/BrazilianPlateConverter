<?php

namespace Wesley0010012\BrazilianPlateConverter;

use Wesley0010012\BrazilianPlateConverter\Facades\BrazilianPlateConverterFacade;
use Wesley0010012\BrazilianPlateConverter\Impl\Builder\BrazilianPlateConverterFacadeBuilder;

class BrazilianPlateConverter
{
    private static ?BrazilianPlateConverterFacade $instance = null;

    private static function getInstance(): BrazilianPlateConverterFacade
    {
        if (!self::$instance) {
            self::$instance = (new BrazilianPlateConverterFacadeBuilder())->build();
        }

        return self::$instance;
    }

    public static function toMercosul(string $nationalPlate): string
    {
        return self::getInstance()->toMercosul($nationalPlate);
    }

    public static function toNational(string $mercosulPlate): string
    {
        return self::getInstance()->toNational($mercosulPlate);
    }

    public static function isMercosul(string $plate): bool
    {
        return self::getInstance()->isMercosul($plate);
    }

    public static function isNational(string $plate): bool
    {
        return self::getInstance()->isNational($plate);
    }

    public static function isPlate(string $plate): bool
    {
        return self::getInstance()->isPlate($plate);
    }
}
