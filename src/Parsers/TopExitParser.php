<?php

namespace MortgageUnion\Parsers;


use Illuminate\Support\Collection;
use MortgageUnion\Models\Signals\Renewal;
use MortgageUnion\Models\Signals\TopExit;

class TopExitParser
{
    /**
     * @param $topExits
     * @return Collection
     */
    public function parse($topExits)
    {
        $signals = new Collection();

        foreach ($topExits as $topExit) {
            $attributes = [
                'mortgageUnionId' => (integer)$topExit->HypotheekbondId,
                'externalId' => (integer)$topExit->ExternId,
                'advisorName' => (string)$topExit->AdviseurNaam,
                'name' => (string)$topExit->Naam,
                'bruto_difference' => (float)$topExit->VerschilBruto,
                'neto_difference' => (float)$topExit->VerschilNetto,
            ];

            $signals->push(new TopExit($attributes));
        }

        return $signals;
    }

}