<?php

namespace MortgageUnion\Models;
/**
 * Class AgencyLabel
 * @package MortgageUnion\Models
 * @property $id;
 * @property $name;
 * @property $HDN;
 * @property $products
 */
class AgencyLabel
{
    protected $fillable = [
        'id',
        'name',
        'HDN',
    ];

    protected $products;

    public function __construct($fields)
    {
        foreach ($fields as $key => $value) {
            if (in_array($key, $this->fillable)) {
                $this->{$key} = $value;
            }
        }
    }

    /**
     * @param $products
     */
    public function setProducts($products)
    {
        $this->products = $products;
    }

    /**
     * @param $value
     */
    public function setHDN($value)
    {
        $this->HDN = $value;
    }
}