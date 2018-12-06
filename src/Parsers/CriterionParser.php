<?php

namespace MortgageUnion\Parsers;


use Carbon\Carbon;
use Illuminate\Support\Collection;
use MortgageUnion\Models\Signals\Criterion;
use MortgageUnion\Models\Signals\Seller;

class CriterionParser
{
    /**
     * @param $criteria
     * @return Collection
     */
    public function parse($criteria)
    {
        $signals = new Collection();

        foreach ($criteria as $criterion) {
            $attributes = [
                'mortgageUnionId' => (integer)$criterion->HypotheekbondId,
                'externalId' => (integer)$criterion->ExternId,
                'advisorName' => (string)$criterion->AdviseurNaam,
                'name' => (string)$criterion->Naam,
                'signal' => (string)$criterion->Signaal,
                'type' => (string)$criterion->Type,
                'note' => (string)$criterion->Notitie,
            ];

            if (isset($criterion->WaardeBedrag)) {
                $attributes['value'] = $criterion->WaardeBedrag;
            }

            if (isset($criterion->WaardeDatum)) {
                $attributes['valueDate'] = Carbon::createFromFormat('Y-m-d', $criterion->WaardeDatum);
            }

            $signals->push(new Criterion($attributes));
        }

        return $signals;
    }
}