<?php

namespace MortgageUnion\Transformers;


use MortgageUnion\Models\Mortgage;

class MortgageTransformer extends Transformer
{

    /**
     * @var MortgagePartTransformer
     */
    private $mortgagePartTransformer;

    protected $dates = [

    ];

    /**
     * MortgageTransformer constructor.
     * @param MortgagePartTransformer $mortgagePartTransformer
     */
    public function __construct(MortgagePartTransformer $mortgagePartTransformer)
    {
        $this->mortgagePartTransformer = $mortgagePartTransformer;
    }

    /**
     * @param Mortgage $mortgage
     * @return array
     */
    public function transform(Mortgage $mortgage)
    {
        $this->attributes = [
            'externID' => $mortgage->externalID,
            'banken_labelID' => $mortgage->bankLabelID,
            'hdn_leningmijtype' => $mortgage->hdnLoanType,
            'status' => $mortgage->status,
            'hypotheeknummer' => $mortgage->mortgageNumber,
            'hoofdsom' => $mortgage->principalAmount,
            'hoofdsom_restant' => $mortgage->principalAmountRemainder,
            'inschrijving' => $mortgage->registration,
            'leningdelen' => $this->transformMortgageParts($mortgage->getMortgageParts()),
        ];

        $this->clearEmptyAttributes();
        $this->transformDates();

        return $this->attributes;
    }

    /**
     * @param $mortgageParts
     * @return array
     */
    protected function transformMortgageParts($mortgageParts)
    {
        $transformedMortgageParts = [];

        foreach ($mortgageParts as $mortgagePart) {
            $transformedMortgageParts = $this->mortgagePartTransformer->transform($mortgagePart);
        }

        return [
            'leningdeel' => $transformedMortgageParts
        ];
    }
}