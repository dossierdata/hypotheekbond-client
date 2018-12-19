<?php

namespace MortgageUnion\Transformers;


use MortgageUnion\Models\Property;

class PropertyTransformer extends Transformer
{

    /**
     * @var MortgageTransformer
     */
    private $mortgageTransformer;

    protected $dates = [
        'eigendom_sinds',
        'taxatiedatum',
        'woz_datum',
    ];

    /**
     * PropertyTransformer constructor.
     * @param MortgageTransformer $mortgageTransformer
     */
    public function __construct(MortgageTransformer $mortgageTransformer)
    {
        $this->mortgageTransformer = $mortgageTransformer;
    }

    public function transform(Property $property)
    {
        $this->attributes = [
            'externID' => $property->externalId,
            'woningtoepassing' => $property->application,
            'eigendom_sinds' => $property->ownedSince,
            'taxatiewaarde' => $property->taxationValue,
            'executiewaarde' => $property->executionValue,
            'taxatiedatum' => $property->taxationDate,
            'woz_waarde' => $property->realEstateValue,
            'woz_datum' => $property->realEstateDate,
            'type_woning' => $property->type,
            'hypotheken' => $this->transformMortgages($property->getMortgages()),
        ];

        $this->clearEmptyAttributes();
        $this->transformDates();

        return $this->attributes;
    }

    /**
     * @param $mortgages
     * @return array
     */
    protected function transformMortgages($mortgages)
    {
        $transformedMortgages = [];

        foreach ($mortgages as $mortgage) {
            $transformedMortgages[] = $this->mortgageTransformer->transform($mortgage);
        }

        return [
            'hypotheek' => $transformedMortgages
        ];
    }
}