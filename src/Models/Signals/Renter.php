<?php namespace MortgageUnion\Models\Signals;

use Carbon\Carbon;
use MortgageUnion\Enums\SignalType;

/**
 * Class Renter
 * @package MortgageUnion\Models\Signals
 *
 * @property $mortgageUnionId;
 * @property $externalId;
 * @property $advisorName;
 * @property $name;
 * @property Carbon $forRentSince;
 * @property $address;
 * @property $numberOfDaysForRent;
 * @property $isOffline;
 *
 */
class Renter extends Signal
{

    protected $fillable = [
        'mortgageUnionId',
        'externalId',
        'advisorName',
        'name',
        'forRentSince',
        'address',
        'numberOfDaysForRent',
        'isOffline',
        'signalType',
    ];

    public $signalType = SignalType::RENTER;
}
