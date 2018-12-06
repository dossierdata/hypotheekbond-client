<?php

namespace MortgageUnion\Parsers;


use Illuminate\Support\Collection;
use MortgageUnion\Models\Signals\LifeInsurance;
use MortgageUnion\Models\Signals\Refinancing;

/**
 * Class LifeInsuranceParser
 * @package MortgageUnion\Parsers
 */
class LifeInsuranceParser
{
    /**
     * @param $lifeInsurances
     * @return Collection
     */
    public function parse($lifeInsurances)
    {
        $signals = new Collection();

        foreach ($lifeInsurances as $lifeInsurance) {
            $attributes = [
                'mortgageUnionId' => (integer)$lifeInsurance->HypotheekbondId,
                'externalId' => (integer)$lifeInsurance->ExternId,
                'advisorName' => (string)$lifeInsurance->AdviseurNaam,
                'name' => (string)$lifeInsurance->Naam,
                'mortgageUnionInsuranceId' => (integer)$lifeInsurance->HypotheekbondVerzekeringId,
                'externalInsuranceId' => (integer)$lifeInsurance->ExternVerzekeringId,
                'currentPremium' => (float)$lifeInsurance->MaandpremieHuidig,
                'possiblePremium' => (float)$lifeInsurance->MaandpremieOversluiting,
                'diffTotal' => (float)$lifeInsurance->VerschilTotaal
            ];

            $signals->push(new LifeInsurance($attributes));
        }

        return $signals;
    }
}