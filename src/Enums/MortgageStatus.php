<?php

namespace MortgageUnion\Enums;

use MyCLabs\Enum\Enum;

/**
 * Class MortgageStatus
 * @package MortgageUnion\Enums
 *
 * @method static MortgageStatus ACTIVE()
 * @method static MortgageStatus IN_PROGRESS()
 * @method static MortgageStatus LEAD()
 *
 */
class MortgageStatus extends Enum
{
    const OFFER = 1;
    const OPEN = 2;
    const CANCELLED = 3;
    const PROSPECT = 'Prospect';
    const UNKNOWN = 'Onbekend';

}