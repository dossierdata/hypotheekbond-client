<?php

namespace MortgageUnion\Transformers;


class CreditAgencyRegistrationTransformer extends Transformer
{
    protected $dates = [

    ];

    /**
     * @return array
     */
    public function transform()
    {
        $this->attributes = [
        ];

        $this->clearEmptyAttributes();
        $this->transformDates();

        return $this->attributes;
    }
}