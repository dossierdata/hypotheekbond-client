<?php

namespace MortgageUnion\Parsers;


use Illuminate\Support\Collection;
use MortgageUnion\Models\Signals\Criterion;
use MortgageUnion\Models\Signals\IncompleteRecord;
use MortgageUnion\Models\Signals\Seller;

class IncompleteDossierParser
{
    /**
     * @param $incompleteDossiers
     * @return Collection
     */
    public function parse($incompleteDossiers)
    {
        $signals = new Collection();

        foreach ($incompleteDossiers as $incompleteDossier) {
            $attributes = [
                'mortgageUnionId' => (integer)$incompleteDossier->HypotheekbondId,
                'externalId' => (integer)$incompleteDossier->ExternId,
                'name' => (string)$incompleteDossier->Naam,
                'percentage' => (integer)$incompleteDossier->Percentage,
                'isCalculated' => $this->parseBool((integer)$incompleteDossier->IsBerekenbaar),
            ];

            $signals->push(new IncompleteRecord($attributes));
        }

        return $signals;
    }

    /**
     * @param $value
     * @return bool
     */
    protected function parseBool($value)
    {
        if ($value === 0) {
            return false;
        }

        return true;
    }
}