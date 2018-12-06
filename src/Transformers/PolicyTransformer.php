<?php

namespace MortgageUnion\Transformers;


use MortgageUnion\Models\Policy;

/**
 * Class PolicyTransformer
 * @package MortgageUnion\Transformers
 */
class PolicyTransformer extends Transformer
{
    protected $dates = [
        'ingangsdatum',
        'einddatum',
        'afkoopwaarde_datum',
    ];

    /**
     * @param Policy $policy
     * @return array
     */
    public function transform(Policy $policy)
    {
        $this->attributes = [
            'externID' => $policy->externalID,
            'type' => $policy->type,
            'bankID' => $policy->bankID,
            'hdn_leningmijtype' => $policy->hdnLoanType,
            'leningdeelID' => $policy->mortgagePartID,
            'verpand' => $policy->isPawned,
            'polisnummer' => $policy->policyNumber,
            'box' => $policy->box,
            'doelkapitaal' => $policy->targetCapital,
            'nemer1_persoon' => $policy->primaryPolicyHolder,
            'nemer2_persoon' => $policy->secondaryPolicyHolder,
            'verzekerde1_orv_dekking' => $policy->primaryInsuredPersonDeathCoverageAmount,
            'verzekerde1_orv_dekking_type' => $policy->primaryInsuredPersonDeathCoverageType,
            'verzekerde2_orv_dekking' => $policy->secondaryInsuredPersonDeathCoverageAmount,
            'verzekerde2_orv_dekking_type' => $policy->secondaryInsuredPersonDeathCoverageType,
            'premie' => $policy->premium,
            'premie_periode' => $policy->premiumPeriod,
            'premieopslag' => $policy->premiumPriceIncreaseAmount,
            'ingangsdatum' => $policy->startDate,
            'einddatum' => $policy->endDate,
            'premieduur' => $policy->premiumDuration,
            'eerste_storting' => $policy->firstDeposit,
            'afkoopwaarde' => $policy->redemptionValue,
            'afkoopwaarde_datum' => $policy->redemptionValueDate,
            'prognoserendement' => $policy->returnForecast,
            'spaardeel' => $policy->savingsShare,
            'verwachtekapitaal' => $policy->expectedCapitalAmount,
        ];

        $this->clearEmptyAttributes();
        $this->transformDates();

        return $this->attributes;
    }
}