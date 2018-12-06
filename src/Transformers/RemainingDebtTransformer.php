<?php

namespace MortgageUnion\Transformers;


use MortgageUnion\Models\RemainingDebt;

class RemainingDebtTransformer extends Transformer
{

    protected $dates = [
        'datum',
    ];

    /**
     * @param RemainingDebt $remainingDebt
     * @return array
     */
    public function transform(RemainingDebt $remainingDebt)
    {
        $this->attributes = [
            'situatie' => $remainingDebt->situation,
            'datum' => $remainingDebt->date,
            'bedrag' => $remainingDebt->amount,
            'bedrag_box_3' => $remainingDebt->amountFromSavingsOrInvestments,
            'tarief' => $remainingDebt->mortgageRate,
            'tarief_op_basis_vans' => $remainingDebt->mortgageRateBasedOn,
        ];

        $this->clearEmptyAttributes();
        $this->transformDates();

        return $this->attributes;
    }
}