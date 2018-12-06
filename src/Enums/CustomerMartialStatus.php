<?php

namespace MortgageUnion\Enums;

use MyCLabs\Enum\Enum;

/**
 * Class CustomerMartialStatus
 * @package MortgageUnion\Enums
 *
 * @method static CustomerMartialStatus SINGLE()
 * @method static CustomerMartialStatus MARRIED_JOINT_ASSETS()
 * @method static CustomerMartialStatus MARRIED_PRENUP()
 * @method static CustomerMartialStatus PARTNER_REGISTRATION_JOINT_ASSETS()
 * @method static CustomerMartialStatus PARTNER_REGISTRATION_PRENUP()
 * @method static CustomerMartialStatus COHABITATION_WITH_PRENUP()
 * @method static CustomerMartialStatus COHABITATION_WITHOUT_PRENUP()
 * @method static CustomerMartialStatus DIVORCED()
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