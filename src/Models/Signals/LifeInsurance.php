<?php namespace MortgageUnion\Models\Signals;

use MortgageUnion\Enums\SignalType;

/**
 * Class LifeInsurance
 * @package MortgageUnion\Models\Signals
 *
 * @property $mortgageUnionId;
 * @property $externalId;
 * @property $advisorName;
 * @property $name;
 * @property $mortgageUnionInsuranceId;
 * @property $externalInsuranceId;
 * @property $currentPremium;
 * @property $possiblePremium;
 * @property $diffTotal;
 *
 */
class LifeInsurance extends Signal
{

    protected $fillable = [
        'mortgageUnionId',
        'externalId',
        'advisorName',
        'name',
        'mortgageUnionInsuranceId',
        'externalInsuranceId',
        'currentPremium',
        'possiblePremium',
        'signalType',
        'diffTotal'
    ];

    protected $mortgageUnionId;
    protected $externalId;
    protected $advisorName;
    protected $name;
    protected $mortgageUnionInsuranceId;
    protected $externalInsuranceId;
    protected $currentPremium;
    protected $possiblePremium;
    protected $diffTotal;
    protected $signalType = SignalType::LIFE_INSURANCE;

}
