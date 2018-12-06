<?php

namespace MortgageUnion\Transformers;


use Carbon\Carbon;

abstract class Transformer
{
    const DATE_FORMAT = 'Y-m-d';

    protected $attributes;

    protected $dates;

    /**
     * @param Carbon $date
     * @return string
     */
    protected function transformDate(?Carbon $date)
    {
        if ($date instanceof Carbon) {
            return $date->format(self::DATE_FORMAT);
        }

        return null;
    }

    /**
     * @param $value
     * @return string
     */
    protected function transformSmoking($value)
    {
        if ($value == 0) {
            return 'no';
        }

        return 'yes';
    }

    /**
     *
     */
    protected function clearEmptyAttributes()
    {
        foreach ($this->attributes as $key => $value) {
            if ($value === null || $value === '' || (is_array($value) && count($value) === 0)) {
                unset($this->attributes[$key]);
            }
        }
    }

    /**
     *
     */
    protected function transformDates()
    {
        foreach ($this->dates as $arrayKey) {
            if (array_key_exists($arrayKey, $this->attributes)) {
                if (is_string($this->attributes[$arrayKey])) {
                    continue;
                }
                $this->attributes[$arrayKey] = $this->transformDate($this->attributes[$arrayKey]);
            }
        }
    }
}