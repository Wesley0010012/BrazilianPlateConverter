<?php

use Wesley0010012\BrazilianPlateConverter\Impl\Builder\BrazilianPlateConverterFacadeBuilder;

require_once(__DIR__ . "/../vendor/autoload.php");

function convertBoolToText(bool $value)
{
    return $value ? 'YES' : 'NO';
}

$facade = (new BrazilianPlateConverterFacadeBuilder())->build();

echo "National plate\n";

$samplePlate1 = "ABC1234";

echo "Is plate? " . convertBoolToText($facade->isPlate($samplePlate1)) . "\n";
echo "Is mercosul? " . convertBoolToText($facade->isMercosul($samplePlate1)) . "\n";
echo "Is national? " . convertBoolToText($facade->isNational($samplePlate1)) . "\n";

echo "Convert to Mercosul: " . $facade->toMercosul($samplePlate1) . "\n";
echo "Convert to National: " . $facade->toNational($samplePlate1) . "\n";
echo "Convert Only: " . $facade->toNational($samplePlate1) . "\n";

echo "\nMercosul plate\n";

$samplePlate2 = "ABC1C34";

echo "Is plate? " . convertBoolToText($facade->isPlate($samplePlate2)) . "\n";
echo "Is mercosul? " . convertBoolToText($facade->isMercosul($samplePlate2)) . "\n";
echo "Is national? " . convertBoolToText($facade->isNational($samplePlate2)) . "\n";

echo "Convert to Mercosul: " . $facade->toMercosul($samplePlate2) . "\n";
echo "Convert to National: " . $facade->toNational($samplePlate2) . "\n";
echo "Convert Only: " . $facade->toNational($samplePlate2) . "\n";

echo "\nInvalid plate\n";

$samplePlate3 = "ABC12341234ABC";

echo "Is plate? " . convertBoolToText($facade->isPlate($samplePlate3)) . "\n";
echo "Is mercosul? " . convertBoolToText($facade->isMercosul($samplePlate3)) . "\n";
echo "Is national? " . convertBoolToText($facade->isNational($samplePlate3)) . "\n";

echo "Convert to Mercosul: " . $facade->toMercosul($samplePlate3) . "\n";
echo "Convert to National: " . $facade->toNational($samplePlate3) . "\n";
echo "Convert Only: " . $facade->toNational($samplePlate3) . "\n";
