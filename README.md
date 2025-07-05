# 🇧🇷 Brazilian Plate Converter

**Brazilian Plate Converter** is a PHP library that allows validation and conversion between the two main Brazilian vehicle license plate formats:

- **National Format**: `ABC1234`
- **Mercosul Format**: `ABC1C34`

## ✨ Features

- Validate whether a license plate is in a valid Brazilian format
- Detect if a plate is in Mercosul or National format
- Convert National format to Mercosul format
- Convert Mercosul format to National format
- Configurable error handling via environment variable

## 📦 Installation

Requires PHP 8.1+ and [Composer](https://getcomposer.org):

```bash
composer require wesley0010012/brazilian-plate-converter
```

## 🧪 Usage Example

```php
use Wesley0010012\BrazilianPlateConverter\BrazilianPlateConverter;

require_once(__DIR__ . "/vendor/autoload.php");

function convertBoolToText(bool $value): string {
    return $value ? 'YES' : 'NO';
}

$plate = "ABC1234";

echo "Is valid plate? " . convertBoolToText(BrazilianPlateConverter::isPlate($plate)) . PHP_EOL;
echo "Is Mercosul? " . convertBoolToText(BrazilianPlateConverter::isMercosul($plate)) . PHP_EOL;
echo "Is National? " . convertBoolToText(BrazilianPlateConverter::isNational($plate)) . PHP_EOL;

echo "To Mercosul: " . BrazilianPlateConverter::toMercosul($plate) . PHP_EOL;
echo "To National: " . BrazilianPlateConverter::toNational($plate) . PHP_EOL;
```

You can directly build without the main component, using BuilderClass:

```php
use Wesley0010012\BrazilianPlateConverter\Impl\Builder\BrazilianPlateConverterFacadeBuilder;

require_once(__DIR__ . "/../vendor/autoload.php");

function convertBoolToText(bool $value)
{
    return $value ? 'YES' : 'NO';
}

$facade = (new BrazilianPlateConverterFacadeBuilder())->build();

$plate = "ABC1234";

echo "Is valid plate? " . convertBoolToText($facade->isPlate($plate)) . PHP_EOL;
echo "Is Mercosul? " . convertBoolToText($facade->isMercosul($plate)) . PHP_EOL;
echo "Is National? " . convertBoolToText($facade->isNational($plate)) . PHP_EOL;

echo "To Mercosul: " . $facade->toMercosul($plate) . PHP_EOL;
echo "To National: " . $facade->toNational($plate) . PHP_EOL;
```

## ⚙️ Environment Variable

You can control whether the library should throw exceptions on invalid operations using the environment variable:

```env
BRAZILIAN_PLATE_CONVERTER_THROW_ERROR=true
```

Set to `true` to throw exceptions, or `false` to silently return fallback values.

## 🧑‍💻 Author

**Wesley0010012**  
📧 wglaurindo33@gmail.com

## 📄 License

This project is licensed under the [MIT License](LICENSE).