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
 * @method static MortgageStatus CANCELLED()
 * @method static MortgageStatus PROSPECT()
 * @method static MortgageStatus UNKNOWN()
 *
 */
class MortgageStatus extends Enum
{
    const ACTIVE = 'Actief';
    const IN_PROGRESS = 'In behandeling';
    const LEAD = 'Lead';
    const CANCELLED = 'Vervallen';
    const PROSPECT = 'Prospect';
    const UNKNOWN = 'Onbekend';

}