<?php

namespace Wesley0010012\BrazilianPlateConverter\Protocols;

interface IStrategy
{
    public function execute(mixed $input): mixed;
}
