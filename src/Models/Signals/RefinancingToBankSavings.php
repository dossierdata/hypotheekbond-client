<?php namespace MortgageUnion\Models\Signals;

use MortgageUnion\Enums\SignalType;

/**
 * Class RefinancingToBankSavings
 * @package MortgageUnion\Models\Signals
 *
 * @property $mortgageUnionId;
 * @property $externalId;
 * @property $advisorName;
 * @property $name;
 * @property $principalAmount;
 * @property $fine;
 * @property $differencePerMonth;
 * @property $differenceIFP;
 * @property $paybackTime;
 */
class RefinancingToBankSavings extends Refinancing
{
    protected $fillable = [
        'mortgageUnionId',
        'externalId',
        'advisorName',
        'name',
        'principalAmount',
        'fine',
        'differencePerMonth',
        'differenceIFP',
        'signalType',
        'paybackTime',
    ];

    protected $signalType = SignalType::REFINANCING_TO_BANK_SAVINGS;
    protected $mortgageUnionId;
    protected $externalId;
    protected $advisorName;
    protected $name;
    protected $principalAmount;
    protected $fine;
    protected $differencePerMonth;
    protected $differenceIFP;
    protected $paybackTime;
}
