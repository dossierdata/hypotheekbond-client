<?php

namespace MortgageUnion\Parsers;


use Carbon\Carbon;
use Illuminate\Support\Collection;
use MortgageUnion\Models\Signals\Renter;
use MortgageUnion\Models\Signals\Seller;

class RenterParser
{
    /**
     * @param $renters
     * @return Collection
     */
    public function parse($renters)
    {
        $signals = new Collection();

        foreach ($renters as $renter) {
            $attributes = [
                'mortgageUnionId' => (integer)$renter->HypotheekbondId,
                'externalId' => (integer)$renter->ExternId,
                'advisorName' => (string)$renter->AdviseurNaam,
                'name' => (string)$renter->Naam,
                'forRentSince' => Carbon::createFromFormat('Y-m-d', (string)$renter->TeHuurSinds),
                'address' => (string)$renter->TeHuurAdres,
                'numberOfDaysForRent' => (integer)$renter->TeHuurAantalDagen,
                'isOffline' => $this->parseBool((integer)$renter->TeHuurIsOffline),
            ];

            $signals->push(new Renter($attributes));
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