<?php

namespace Wesley0010012\BrazilianPlateConverter\Impl\Builder;

use Wesley0010012\BrazilianPlateConverter\Protocols\IBuilder;
use Wesley0010012\BrazilianPlateConverter\Impl\Facades\BrazilianPlateConverterFacadeImpl;
use Wesley0010012\BrazilianPlateConverter\Impl\Strategies\ConvertNationalToMercosul;
use Wesley0010012\BrazilianPlateConverter\Impl\Strategies\ConvertMercosulToNational;
use Wesley0010012\BrazilianPlateConverter\Impl\Strategies\ValidatePlate;
use Wesley0010012\BrazilianPlateConverter\Utils\ConvertEnvTextBooleanToBoolean;
use Wesley0010012\BrazilianPlateConverter\Utils\Enums\PlateRegexpEnum;

class BrazilianPlateConverterFacadeBuilder implements IBuilder
{
    public function build(mixed $params = null): mixed
    {
        $validateMercosulPlate = new ValidatePlate(PlateRegexpEnum::MERCOSUL);
        $validateNationalPlate = new ValidatePlate(PlateRegexpEnum::NATIONAL);

        return new BrazilianPlateConverterFacadeImpl(
            $validateMercosulPlate,
            $validateNationalPlate,
            new ConvertNationalToMercosul($validateNationalPlate),
            new ConvertMercosulToNational($validateMercosulPlate),
            throwError: ConvertEnvTextBooleanToBoolean::convert(getenv("BRAZILIAN_PLATE_CONVERTER_THROW_ERROR"), "BRAZILIAN_PLATE_CONVERTER_THROW_ERROR", false)
        );
    }
}
