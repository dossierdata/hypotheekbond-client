<?php

namespace MortgageUnion\Models;

/**
 * Class MortgagePart
 * @package MortgageUnion\Models
 * @property $externalID;
 * @property $amount;
 * @property $amountBox3;
 * @property $percentage;
 * @property $fixedInterestPeriodYears;
 * @property $duration;
 * @property $tariff;
 * @property $productID;
 * @property $otherProductRepaymentType;
 * @property $fixedInterestPeriodStartDate;
 * @property $fixedInterestPeriodEndDate;
 * @property $durationStartDate;
 * @property $number;
 * @property $riskClassType;
 * @property $tariffBasedOn;
 * @property $percentagePointDiscount;
 * @property $endDateInterestDeduction;
 */
class MortgagePart extends Model
{
    protected $fillable = [
        'externalID',
        'amount',
        'amountBox3',
        'percentage',
        'percentagePointDiscount',
        'fixedInterestPeriodYears',
        'duration',
        'tariff',
        'tariffBasedOn',
        'productID',
        'otherProductRepaymentType',
        'fixedInterestPeriodStartDate',
        'fixedInterestPeriodEndDate',
        'durationStartDate',
        'number',
        'riskClassType',
        'endDateInterestDeduction',
    ];

    protected $externalID;
    protected $amount;
    protected $amount_box3;
    protected $percentage;
    protected $fixedInterestPeriodYears;
    protected $duration;
    protected $tariff;
    protected $productID;
    protected $otherProductRepaymentType;
    protected $fixedInterestPeriodStartDate;
    protected $fixedInterestPeriodEndDate;
    protected $durationStartDate;
    protected $riskClassType;
    protected $tariffBasedOn;
    protected $percentagePointDiscount;
    protected $endDateInterestDeduction;
    protected $remainingDebts;

    /**
     * @param $value
     */
    public function setTariff($value)
    {
        $this->tariff = $value;
    }

    /**
     * @param $value
     */
    public function setProductID($value)
    {
        $this->productID = $value;
    }

    /**
     * @param $value
     */
    public function setOtherProductRepaymentType($value)
    {
        $this->otherProductRepaymentType = $value;
    }

    /**
     * @param $value
     */
    public function setFixedInterestPeriodStartDate($value)
    {
        $this->fixedInterestPeriodStartDate = $value;
    }

    /**
     * @param $value
     */
    public function setFixedInterestPeriodEndDate($value)
    {
        $this->fixedInterestPeriodEndDate = $value;
    }

    /**
     * @param $value
     */
    public function setDurationStartDate($value)
    {
        $this->durationStartDate = $value;
    }

    /**
     * @param $value
     */
    public function setRiskClassType($value)
    {
        $this->riskClassType = $value;
    }

    /**
     * @return mixed
     */
    public function getRemainingDebts()
    {
        return $this->remainingDebts;
    }

    /**
     * @param $remainingDebts
     */
    public function setRemainingDebts($remainingDebts)
    {
        $this->remainingDebts = $remainingDebts;
    }
}