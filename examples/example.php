<?php

use Wesley0010012\BrazilianPlateConverter\BrazilianPlateConverter;

require_once(__DIR__ . "/../vendor/autoload.php");

function convertBoolToText(bool $value)
{
    return $value ? 'YES' : 'NO';
}

echo "National plate\n";

$samplePlate1 = "ABC1234";

echo "Is plate? " . convertBoolToText(BrazilianPlateConverter::isPlate($samplePlate1)) . "\n";
echo "Is mercosul? " . convertBoolToText(BrazilianPlateConverter::isMercosul($samplePlate1)) . "\n";
echo "Is national? " . convertBoolToText(BrazilianPlateConverter::isNational($samplePlate1)) . "\n";

echo "Convert to Mercosul: " . BrazilianPlateConverter::toMercosul($samplePlate1) . "\n";
echo "Convert to National: " . BrazilianPlateConverter::toNational($samplePlate1) . "\n";
echo "Convert Only: " . BrazilianPlateConverter::toNational($samplePlate1) . "\n";

echo "\nMercosul plate\n";

$samplePlate2 = "ABC1C34";

echo "Is plate? " . convertBoolToText(BrazilianPlateConverter::isPlate($samplePlate2)) . "\n";
echo "Is mercosul? " . convertBoolToText(BrazilianPlateConverter::isMercosul($samplePlate2)) . "\n";
echo "Is national? " . convertBoolToText(BrazilianPlateConverter::isNational($samplePlate2)) . "\n";

echo "Convert to Mercosul: " . BrazilianPlateConverter::toMercosul($samplePlate2) . "\n";
echo "Convert to National: " . BrazilianPlateConverter::toNational($samplePlate2) . "\n";
echo "Convert Only: " . BrazilianPlateConverter::toNational($samplePlate2) . "\n";

echo "\nInvalid plate\n";

$samplePlate3 = "ABC12341234ABC";

echo "Is plate? " . convertBoolToText(BrazilianPlateConverter::isPlate($samplePlate3)) . "\n";
echo "Is mercosul? " . convertBoolToText(BrazilianPlateConverter::isMercosul($samplePlate3)) . "\n";
echo "Is national? " . convertBoolToText(BrazilianPlateConverter::isNational($samplePlate3)) . "\n";

echo "Convert to Mercosul: " . BrazilianPlateConverter::toMercosul($samplePlate3) . "\n";
echo "Convert to National: " . BrazilianPlateConverter::toNational($samplePlate3) . "\n";
echo "Convert Only: " . BrazilianPlateConverter::toNational($samplePlate3) . "\n";
