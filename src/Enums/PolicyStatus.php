<?php

namespace MortgageUnion\Enums;

use MyCLabs\Enum\Enum;

/**
 * Class PolicyStatus
 * @package MortgageUnion\Enums
 *
 * @method static PolicyStatus ACTIVE()
 *
 */
class PolicyStatus extends Enum
{
    const ACTIVE = 1;
    const PREMIUM_FREE = 2;
    const ENDING = 3;

}