<?php

namespace MortgageUnion\Enums;

use MyCLabs\Enum\Enum;

/**
 * Class SignalType
 * @package MortgageUnion\Enums
 *
 * @method static SignalType CRITERION()
 * @method static SignalType INCOMPLETE_RECORD()
 * @method static SignalType LIFE_INSURANCE()
 * @method static SignalType SELLER()
 * @method static SignalType REFINANCING()
 * @method static SignalType REFINANCING_TO_BANK_SAVINGS()
 * @method static SignalType RENEWAL()
 * @method static SignalType TOP_EXIT()
 * @method static SignalType RENTER()
 *
 */
class SignalType extends Enum
{
    const CRITERION = 'criterion';
    const INCOMPLETE_RECORD = 'incomplete_record';
    const LIFE_INSURANCE = 'life_insurance';
    const SELLER = 'seller';
    const RENTER = 'renter';
    const REFINANCING = 'refinancing';
    const REFINANCING_TO_BANK_SAVINGS = 'refinancing_to_bank_savings';
    const RENEWAL = 'renewal';
    const TOP_EXIT = 'top_exit';
}