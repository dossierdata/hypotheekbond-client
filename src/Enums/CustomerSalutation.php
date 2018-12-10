<?php

namespace MortgageUnion\Enums;

use MyCLabs\Enum\Enum;

/**
 * Class CustomerSalutation
 * @package MortgageUnion\Enums
 *
 * @method static CustomerSalutation MALE()
 * @method static CustomerSalutation FEMALE()
 *
 */
class CustomerSalutation extends Enum
{
    const MALE = '1';
    const FEMALE = '2';
}