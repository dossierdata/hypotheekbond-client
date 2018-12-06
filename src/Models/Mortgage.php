<?php

namespace MortgageUnion\Models;

/**
 * Class Mortgage
 * @package MortgageUnion\Models
 *
 * @property $externalID
 * @property $status
 * @property $principalAmount
 * @property $principalAmountRemainder
 * @property $registration
 * @property $bankLabelID
 * @property $mortgageNumber
 * @property $hdnLoanType
 */
class Mortgage extends Model
{
    protected $fillable = [
        'externalID',
        'status',
        'principalAmount',
        'principalAmountRemainder',
        'registration',
        'bankLabelID',
        'mortgageNumber',
        'hdnLoanType',
    ];

    protected $externalID;
    protected $status;
    protected $principalAmount;
    protected $principalAmountRemainder;
    protected $registration;
    protected $bankLabelID;
    protected $mortgageNumber;
    protected $hdnLoanType;
    protected $mortgageParts;

    /**
     * @param $value
     */
    public function setMortgageParts($value)
    {
        $this->mortgageParts = $value;
    }

    /**
     * @return mixed
     */
    public function getMortgageParts()
    {
        return $this->mortgageParts;
    }
}