<?php

namespace MortgageUnion\Parsers;


use Carbon\Carbon;
use Illuminate\Support\Collection;
use MortgageUnion\Models\Signals\RefinancingToBankSavings;

class RefinancingToBankSavingParser
{
    /**
     * @param $refinancingToBankSavings
     * @return Collection
     */
    public function parse($refinancingToBankSavings)
    {
        $signals = new Collection();

        foreach ($refinancingToBankSavings as $refinancingToBankSaving) {
            $attributes = [
                'mortgageUnionId' => (integer)$refinancingToBankSaving->HypotheekbondId,
                'externalId' => (integer)$refinancingToBankSaving->ExternId,
                'advisorName' => (string)$refinancingToBankSaving->AdviseurNaam,
                'name' => (string)$refinancingToBankSaving->Naam,
                'principalAmount' => (float)$refinancingToBankSaving->Hoofdsom,
                'fine' => (float)$refinancingToBankSaving->Boete,
                'differencePerMonth' => (float)$refinancingToBankSaving->VerschilPerMaand,
                'differenceIFP' => (float)$refinancingToBankSaving->VerschilRvp,
                'paybackTime' => Carbon::createFromFormat('Y-m-d', $refinancingToBankSaving->Terugverdientijd),
            ];

            $signals->push(new RefinancingToBankSavings($attributes));
        }

        return $signals;
    }

}