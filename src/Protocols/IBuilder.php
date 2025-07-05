<?php

namespace Wesley0010012\BrazilianPlateConverter\Protocols;

interface IBuilder
{
    public function build(mixed $params = null): mixed;
}
