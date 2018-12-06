<?php

namespace MortgageUnion\Parsers;


use Illuminate\Support\Collection;
use MortgageUnion\Models\Signals\Refinancing;

class RefinancingParser
{
    /**
     * @param $refinancings
     * @return Collection
     */
    public function parse($refinancings)
    {
        $signals = new Collection();

        foreach ($refinancings as $refinancing) {
            $attributes = [
                'mortgageUnionId' => (integer)$refinancing->HypotheekbondId,//externalID
                'externalId' => (integer)$refinancing->ExternId,//customerId
                'name' => (string)$refinancing->Naam,
                'advisorName' => (string)$refinancing->AdviseurNaam,
                'principalSum' => (float)$refinancing->Hoofdsom,
                'fine' => (float)$refinancing->Boete,
                'differencePerMonth' => (float)$refinancing->VerschilPerMaand,
                'differenceIFP' => (float)$refinancing->VerschilRvp,
                'paybackMonths' => (integer)$refinancing->Terugverdientijd,
            ];

            $signals->push(new Refinancing($attributes));
        }

        return $signals;
    }
}