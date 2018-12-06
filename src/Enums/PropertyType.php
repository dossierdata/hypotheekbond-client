<?php

namespace MortgageUnion\Enums;

use MyCLabs\Enum\Enum;

/**
 * Class PropertyType
 * @package MortgageUnion\Enums
 *
 * @method static PropertyType APARTMENT()
 * @method static PropertyType HOUSE()
 *
 */
class PropertyType extends Enum
{
    const APARTMENT = 1;
    const HOUSE = 2;
}