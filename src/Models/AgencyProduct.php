<?php

namespace MortgageUnion\Models;
/**
 * Class AgencyProduct
 * @package MortgageUnion\Models
 * @property $id;
 * @property $name;
 * @property $redemptionForm;
 * @property $redemptionFormCode;
 */
class AgencyProduct
{
    protected $fillable = [
        'id',
        'name',
        'redemptionForm',
        'redemptionFormCode',
    ];

    /**
     * AgencyProduct constructor.
     * @param $fields
     */
    public function __construct($fields)
    {
        foreach ($fields as $key => $value) {
            if (in_array($key, $this->fillable)) {
                $this->{$key} = $value;
            }
        }
    }
}