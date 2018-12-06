<?php

namespace MortgageUnion\Enums;

use MyCLabs\Enum\Enum;

/**
 * Class PolicyStatus
 * @package MortgageUnion\Enums
 *
 * @method static PolicyPaymentTerm ACTIVE()
 *
 */
class PolicyPaymentTerm extends Enum
{
    const MONTHLY = 1;
    const QUARTERLY = 2;
    const YEARLY = 3;
    const NO_PERIOD = 4;
    const HALF_YEAR = 6;

}