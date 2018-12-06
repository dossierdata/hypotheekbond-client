<?php

namespace MortgageUnion\Enums;

use MyCLabs\Enum\Enum;

/**
 * Class MortgageStatus
 * @package MortgageUnion\Enums
 *
 * @method static CustomerMortgageStatus ACTIVE()
 * @method static CustomerMortgageStatus IN_PROGRESS()
 * @method static CustomerMortgageStatus LEAD()
 * @method static CustomerMortgageStatus CANCELLED()
 * @method static CustomerMortgageStatus PROSPECT()
 * @method static CustomerMortgageStatus UNKNOWN()
 *
 */
class CustomerMortgageStatus extends Enum
{
    const ACTIVE = 'Actief';
    const IN_PROGRESS = 'In behandeling';
    const LEAD = 'Lead';
    const CANCELLED = 'Vervallen';
    const PROSPECT = 'Prospect';
    const UNKNOWN = 'Onbekend';

}