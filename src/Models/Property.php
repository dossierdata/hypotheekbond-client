<?php

namespace MortgageUnion\Models;


use App\Models\Mortgage;
use Illuminate\Support\Collection;

/**
 * Class Property
 * @package MortgageUnion\Models
 *
 * @property $externalId
 * @property $application
 * @property $ownedSince
 * @property $taxationValue
 * @property $executionValue
 * @property $taxationDate
 * @property $realEstateValue
 * @property $realEstateDate
 * @property $type
 */
class Property extends Model
{
    public $fillable = [
        'externalId',
        'application',
        'ownedSince',
        'taxationValue',
        'executionValue',
        'taxationDate',
        'realEstateValue',
        'realEstateDate',
        'type',
    ];

    protected $mortgages;
    protected $externalId;
    protected $application;
    protected $ownedSince;
    protected $taxationValue;
    protected $executionValue;
    protected $taxationDate;
    protected $realEstateValue;
    protected $realEstateDate;
    protected $type;

    /**
     * @param $mortgages
     */
    public function setMortgages($mortgages)
    {
        $this->mortgages = $mortgages;
    }

    /**
     * @return mixed
     */
    public function getMortgages()
    {
        return $this->mortgages;
    }
}