<?php

namespace MortgageUnion\Models;

/**
 * Class Account
 * @package MortgageUnion\Models
 * @property $externalID;
 * @property $type;
 * @property $bankID;
 * @property $mortgagePartID;
 * @property $accountNumber;
 * @property $box;
 * @property $startDate;
 * @property $endDate;
 * @property $inlay;
 * @property $inlayPeriod;
 * @property $firstPayment;
 * @property $targetCapital;
 * @property $investorProfile;
 * @property $fixedInterestPeriod;
 * @property $forecastPercentage;
 * @property $forecastReturn;
 * @property $balance;
 * @property $balanceDate;
 * @property $status;
 */
class Account
{
    protected $fillable = [
        'externalID',
        'type',
        'bankID',
        'mortgagePartID',
        'accountNumber', // policy contractNumber
        'box',
        'startDate',
        'endDate',
        'inlay',
        'inlayPeriod',
        'firstPayment',
        'targetCapital',
        'investorProfile',
        'fixedInterestPeriod',
        'forecastPercentage',
        'forecastReturn',
        'balance',
        'balanceDate',
        'status',
    ];

    public function __construct($propertyFields)
    {
        foreach ($propertyFields as $key => $value) {
            if (in_array($key, $this->fillable)) {
                $this->{$key} = $value;
            }
        }
    }

    /**
     * @param $value
     */
    public function setMortgagePartID($value)
    {
        $this->mortgagePartID = $value;
    }

    /**
     * @param $value
     */
    public function setBalance($value)
    {
        $this->balance = $value;
    }

    /**
     * @param $value
     */
    public function setInterest($value)
    {
        $this->forecastPercentage = $value;
    }

    /**
     * @param $value
     */
    public function setForecastReturn($value)
    {
        $this->forecastReturn = $value;
    }

    /**
     * @param $value
     */
    public function setBox($value)
    {
        $this->box = $value;
    }

    /**
     * @param $value
     */
    public function setStatus($value)
    {
        $this->status = $value;
    }

    /**
     * @param $value
     */
    public function setPaymentTerm($value)
    {
        $this->inlayPeriod = $value;
    }

    /**
     * @param $value
     */
    public function setBankID($value)
    {
        $this->bankID = $value;
    }
}