<?php

namespace MortgageUnion\Enums;

use MyCLabs\Enum\Enum;

/**
 * Class CustomerMartialStatus
 * @package MortgageUnion\Enums
 *
 * @method static SignalType CRITERION()
 *
 */
class CustomerMartialStatus extends Enum
{
    const SINGLE = 1;
    const MARRIED_JOINT_ASSETS = 5;
    const MARRIED_PRENUP = 6;
    const PARTNER_REGISTRATION_JOINT_ASSETS = 7;
    const PARTNER_REGISTRATION_PRENUP = 8;
    const COHABITATION_WITH_PRENUP = 3;
    const COHABITATION_WITHOUT_PRENUP = 4;
    const DIVORCED = 2;
}