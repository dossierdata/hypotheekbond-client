<?php namespace MortgageUnion\Models\Signals;

use MortgageUnion\Enums\SignalType;

/**
 * Class Refinancing
 * @package MortgageUnion\Models\Signals
 *
 * @property $mortgageUnionId;
 * @property $externalId;
 * @property $advisorName;
 * @property $name;
 * @property $principalSum;
 * @property $fine;
 * @property $differencePerMonth;
 * @property $differenceIFP;
 * @property $paybackMonths;
 *
 */
class Refinancing extends Signal
{
    protected $fillable = [
        'mortgageUnionId',
        'externalId',
        'advisorName',
        'name',
        'principalSum',
        'fine',
        'differencePerMonth',
        'differenceIFP',
        'signalType',
        'paybackMonths',
    ];

    protected $signalType = SignalType::REFINANCING;
    protected $mortgageUnionId;
    protected $externalId;
    protected $advisorName;
    protected $name;
    protected $principalSum;
    protected $fine;
    protected $differencePerMonth;
    protected $differenceIFP;
    protected $paybackMonths;
}
