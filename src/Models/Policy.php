<?php

namespace MortgageUnion\Models;

/**
 * Class Policy
 * @package MortgageUnion\Models
 * @property $externalID;
 * @property $type;
 * @property $bankID;
 * @property $hdnLoanType;
 * @property $mortgagePartID;
 * @property $isPawned;
 * @property $policyNumber;
 * @property $box;
 * @property $targetCapital;
 * @property $primaryPolicyHolder;
 * @property $secondaryPolicyHolder;
 * @property $primaryInsuredPersonDeathCoverageAmount;
 * @property $primaryInsuredPersonDeathCoverageType;
 * @property $secondaryInsuredPersonDeathCoverageAmount;
 * @property $secondaryInsuredPersonDeathCoverageType;
 * @property $premium;
 * @property $premiumPeriod;
 * @property $premiumPriceIncreaseAmount;
 * @property $startDate;
 * @property $endDate;
 * @property $premiumDuration;
 * @property $firstDeposit;
 * @property $redemptionValue;
 * @property $redemptionValueDate;
 * @property $returnForecast;
 * @property $savingsShare;
 * @property $expectedCapitalAmount;
 */
class Policy extends Model
{
    protected $fillable = [
        'externalID',
        'type',
        'bankID',
        'hdnLoanType',
        'mortgagePartID',
        'isPawned',
        'policyNumber',
        'box',
        'targetCapital',
        'primaryPolicyHolder',
        'secondaryPolicyHolder',
        'primaryInsuredPersonDeathCoverageAmount',
        'primaryInsuredPersonDeathCoverageType',
        'secondaryInsuredPersonDeathCoverageAmount',
        'secondaryInsuredPersonDeathCoverageType',
        'premium',
        'premiumPeriod',
        'premiumPriceIncreaseAmount',
        'startDate',
        'endDate',
        'premiumDuration',
        'firstDeposit',
        'redemptionValue',
        'redemptionValueDate',
        'returnForecast',
        'savingsShare',
        'expectedCapitalAmount',
    ];

    protected $externalID;
    protected $type;
    protected $bankID;
    protected $hdnLoanType;
    protected $mortgagePartID;
    protected $isPawned;
    protected $policyNumber;
    protected $box;
    protected $targetCapital;
    protected $primaryPolicyHolder;
    protected $secondaryPolicyHolder;
    protected $primaryInsuredPersonDeathCoverageAmount;
    protected $primaryInsuredPersonDeathCoverageType;
    protected $secondaryInsuredPersonDeathCoverageAmount;
    protected $secondaryInsuredPersonDeathCoverageType;
    protected $premium;
    protected $premiumPeriod;
    protected $premiumPriceIncreaseAmount;
    protected $startDate;
    protected $endDate;
    protected $premiumDuration;
    protected $firstDeposit;
    protected $redemptionValue;
    protected $redemptionValueDate;
    protected $returnForecast;
    protected $savingsShare;
    protected $expectedCapitalAmount;

}