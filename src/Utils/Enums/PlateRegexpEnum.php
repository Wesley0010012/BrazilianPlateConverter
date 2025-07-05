<?php

namespace Wesley0010012\BrazilianPlateConverter\Utils\Enums;

abstract class PlateRegexpEnum
{
    public const NATIONAL = "/^[A-Z]{3}[0-9]{4}$/";
    public const MERCOSUL = "/^[A-Z]{3}[0-9][A-Z][0-9]{2}$/";
}
