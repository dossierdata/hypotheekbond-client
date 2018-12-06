<?php

namespace MortgageUnion\Models;

use Illuminate\Support\Collection;

/**
 * Class Agency
 * @package MortgageUnion\Models
 * @property $id
 * @property $name
 * @property $HDN
 */
class Agency
{
    protected $fillable = [
        'id',
        'name',
        'HDN',
    ];

    protected $labels;

    public function __construct($fields)
    {
        foreach ($fields as $key => $value) {
            if (in_array($key, $this->fillable)) {
                $this->{$key} = $value;
            }
        }
    }

    /**
     * @param $labels
     */
    public function setLabels($labels)
    {
        $this->labels = $labels;
    }

    /**
     * @param $value
     */
    public function setHDN($value)
    {
        $this->HDN = $value;
    }

    /**
     * @return Collection|AgencyLabel[]
     */
    public function getLabels()
    {
        return $this->labels;
    }

}