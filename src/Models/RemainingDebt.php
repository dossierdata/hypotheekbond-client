<?php

namespace MortgageUnion\Models;


/**
 * Class RemainingDebt
 * @package MortgageUnion\Models
 * @property $situation;
 * @property $date;
 * @property $amount;
 * @property $amountFromSavingsOrInvestments;
 * @property $mortgageRate;
 * @property $mortgageRateBasedOn;
 */
class RemainingDebt
{
    public $fillable = [
        'situation',
        'date',
        'amount',
        'amountFromSavingsOrInvestments',
        'mortgageRate',
        'mortgageRateBasedOn',
    ];

    public function __construct($propertyFields)
    {
        foreach ($propertyFields as $key => $value) {
            if (in_array($key, $this->fillable)) {
                $this->{$key} = $value;
            }
        }

    }
}