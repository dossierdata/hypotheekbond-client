<?php

namespace MortgageUnion\Transformers;


use MortgageUnion\Models\MortgagePart;

class MortgagePartTransformer extends Transformer
{
    /**
     * @var RemainingDebtTransformer
     */
    private $remainingDebtTransformer;

    protected $dates = [
        'rvp_ingangsdatum',
        'rvp_einddatum',
        'looptijd_begindatum',
        'einddatum_renteaftrek',
    ];

    /**
     * MortgagePartTransformer constructor.
     * @param RemainingDebtTransformer $remainingDebtTransformer
     */
    public function __construct(RemainingDebtTransformer $remainingDebtTransformer)
    {
        $this->remainingDebtTransformer = $remainingDebtTransformer;
    }

    public function transform(MortgagePart $mortgagePart)
    {
        $this->attributes = [
            'externID' => $mortgagePart->externalID,
            'leningdeel_nummer' => $mortgagePart->number,
            'productID' => $mortgagePart->productID,
            'product_anders_aflosvorm' => $mortgagePart->otherProductRepaymentType,
            'bedrag' => $mortgagePart->amount,
            'bedrag_deel_box3' => $mortgagePart->amountBox3,
            'tarief' => $mortgagePart->tariff,
            'tarief_op_basis_van' => $mortgagePart->tariffBasedOn,
            'percentage' => $mortgagePart->percentage,
            'procentpunt_korting' => $mortgagePart->percentagePointDiscount,
            'rvp_jaren' => $mortgagePart->fixedInterestPeriodYears,
            'rvp_ingangsdatum' => $mortgagePart->fixedInterestPeriodStartDate,
            'rvp_einddatum' => $mortgagePart->fixedInterestPeriodEndDate,
            'looptijd' => $mortgagePart->duration,
            'looptijd_begindatum' => $mortgagePart->durationStartDate,
            'einddatum_renteaftrek' => $mortgagePart->endDateInterestDeduction,
            'schuldrestpeilingen' => $this->transformRemainingDebts($mortgagePart->getRemainingDebts()),
        ];

        $this->clearEmptyAttributes();
        $this->transformDates();

        return $this->attributes;
    }

    /**
     * @param $remainingDebts
     * @return array
     */
    protected function transformRemainingDebts($remainingDebts)
    {
        $transformedRemainingDebts = [];

        if ($remainingDebts !== null) {
            foreach ($remainingDebts as $remainingDebt) {
                $transformedRemainingDebts = $this->remainingDebtTransformer->transform($remainingDebt);
            }
        }

        return $transformedRemainingDebts;
    }
}