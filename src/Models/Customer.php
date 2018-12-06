<?php

namespace MortgageUnion\Models;

/**
 * Class Customer
 * @package MortgageUnion\Models
 * @property $externalId;
 * @property $advisorId;
 * @property $name;
 * @property $suffix;
 * @property $initials;
 * @property $firstName;
 * @property $salutation;
 * @property $email;
 * @property $dob;
 * @property $maritalStatus;
 * @property $bsn;
 * @property $smoking;
 * @property $phonePrivate;
 * @property $phoneMobile;
 * @property $status;
 * @property $grossAnnualIncome;
 * @property $holidayBonus;
 * @property $fixedEndYearBenefit;
 * @property $incomeDate;
 * @property $retirementGrossAnnualIncome;
 * @property $retirementIncomeDate;
 * @property $partnerGrossAnnualIncome;
 * @property $partnerHolidayBonus;
 * @property $partnerFixedEndYearBenefit;
 * @property $partnerIncomeDate;
 * @property $partnerRetirementGrossAnnualIncome;
 * @property $partnerRetirementIncomeDate;
 * @property $partnerName;
 * @property $partnerFirstName;
 * @property $partnerSuffix;
 * @property $partnerInitials;
 * @property $partnerSalutation;
 * @property $partnerDOB;
 * @property $partnerBSN;
 * @property $partnerSmoking;
 * @property $partnerEmail;
 * @property $partnerPhonePrivate;
 * @property $partnerPhoneMobile;
 * @property $address
 * @property $postcode
 * @property $houseNumber
 * @property $houseNumberAddition
 * @property $city
 * @property $lastUpdatedAtDate
 * @property $participant
 * @property $mortgageUnionUsername
 * @property $mortgageUnionUserId
 * @property $dataSourceName
 * @property $phoneWork
 * @property $policies
 */
class Customer extends Model
{

    protected $fillable = [
        'externalId',
        'advisorId',
        'participant',
        'mortgageUnionUsername',
        'mortgageUnionUserId',
        'name',
        'suffix',
        'initials',
        'firstName',
        'salutation',
        'email',
        'dob',
        'maritalStatus',
        'bsn',
        'address',
        'postcode',
        'houseNumber',
        'houseNumberAddition',
        'city',
        'smoking',
        'phonePrivate',
        'phoneWork',
        'phoneMobile',
        'status',
        'grossAnnualIncome',
        'holidayBonus',
        'fixedEndYearBenefit',
        'incomeDate',
        'retirementGrossAnnualIncome',
        'retirementIncomeDate',
        'partnerGrossAnnualIncome',
        'partnerHolidayBonus',
        'partnerFixedEndYearBenefit',
        'partnerIncomeDate',
        'partnerRetirementGrossAnnualIncome',
        'partnerRetirementIncomeDate',
        'partnerName',
        'partnerFirstName',
        'partnerSuffix',
        'partnerInitials',
        'partnerSalutation',
        'partnerDOB',
        'partnerBSN',
        'partnerSmoking',
        'partnerEmail',
        'partnerPhonePrivate',
        'partnerPhoneMobile',
        'partnerPhoneWork',
        'properties',
        'policies',
        'lastUpdatedAtDate',
        'dataSourceName'
    ];

    protected $externalId;
    protected $advisorId;
    protected $name;
    protected $suffix;
    protected $initials;
    protected $firstName;
    protected $salutation;
    protected $email;
    protected $dob;
    protected $maritalStatus;
    protected $bsn;
    protected $city;
    protected $smoking;
    protected $phonePrivate;
    protected $phoneMobile;
    protected $status;
    protected $grossAnnualIncome;
    protected $holidayBonus;
    protected $fixedEndYearBenefit;
    protected $incomeDate;
    protected $retirementGrossAnnualIncome;
    protected $retirementIncomeDate;
    protected $partnerGrossAnnualIncome;
    protected $partnerHolidayBonus;
    protected $partnerFixedEndYearBenefit;
    protected $partnerIncomeDate;
    protected $partnerRetirementGrossAnnualIncome;
    protected $partnerRetirementIncomeDate;
    protected $partnerName;
    protected $partnerFirstName;
    protected $partnerSuffix;
    protected $partnerInitials;
    protected $partnerSalutation;
    protected $partnerDOB;
    protected $partnerBSN;
    protected $partnerSmoking;
    protected $partnerEmail;
    protected $partnerPhonePrivate;
    protected $partnerPhoneMobile;
    protected $partnerPhoneWork;
    protected $participant;
    protected $mortgageUnionUsername;
    protected $mortgageUnionUserId;
    protected $dataSourceName;
    protected $phoneWork;
    protected $lastUpdatedAtDate;

    //arrays
    protected $properties;
    protected $policies;
    protected $accounts;
    protected $creditAgencyRegistrations;

    /**
     * @param $value
     */
    public function setProperties($value)
    {
        $this->properties = $value;
    }

    /**
     * @param $value
     */
    public function setAccounts($value)
    {
        $this->accounts = $value;
    }

    /**
     * @param $value
     */
    public function setPolicies($value)
    {
        $this->policies = $value;
    }

    /**
     * @param $value
     */
    public function setCreditAgencyRegistrations($value)
    {
        $this->creditAgencyRegistrations = $value;
    }

    /**
     * @return mixed
     */
    public function getProperties()
    {
        return $this->properties;
    }

    /**
     * @return mixed
     */
    public function getPolicies()
    {
        return $this->policies;
    }

    /**
     * @return mixed
     */
    public function getAccounts()
    {
        return $this->accounts;
    }

    /**
     * @return mixed
     */
    public function getCreditAgencyRegistrations()
    {
        return $this->creditAgencyRegistrations;
    }

    /**
     * @param $value
     */
    public function setLastUpdatedAtDate($value)
    {
        $this->lastUpdatedAtDate = $value;
    }



}