<?php namespace MortgageUnion\Models\Signals;

use Carbon\Carbon;
use MortgageUnion\Enums\SignalType;

/**
 * Class Seller
 * @package MortgageUnion\Models\Signals
 *
 * @property $mortgageUnionId;
 * @property $externalId;
 * @property $advisorName;
 * @property $name;
 * @property Carbon $forSaleSince;
 * @property $address;
 * @property $status;
 * @property $numberOfDaysForSale;
 *
 */
class Seller extends Signal
{

    protected $fillable = [
        'mortgageUnionId',
        'externalId',
        'advisorName',
        'name',
        'forSaleSince',
        'address',
        'status',
        'numberOfDaysForSale',
        'signalType',
    ];

    protected $signalType = SignalType::SELLER;
    protected $mortgageUnionId;
    protected $externalId;
    protected $advisorName;
    protected $name;
    protected $forSaleSince;
    protected $address;
    protected $status;
    protected $numberOfDaysForSale;
}
