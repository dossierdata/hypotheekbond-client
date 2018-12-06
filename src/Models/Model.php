<?php

namespace MortgageUnion\Models;

use MortgageUnion\Exceptions\Exception;

/**
 * Class Model
 * @package MortgageUnion\Models
 */
abstract class Model
{

    /**
     * @var array
     */
    protected $fillable = [];

    public function __construct($propertyFields)
    {
        foreach ($propertyFields as $key => $value) {
            if (in_array($key, $this->fillable)) {
                $this->{$key} = $value;
            }
        }
    }


    public function __get($name)
    {
        if (in_array($name, $this->fillable)) {
            return $this->{$name};
        } else {
            throw new Exception(sprintf('The field "%s" is not in the fillable array', $name));
        }
    }
}