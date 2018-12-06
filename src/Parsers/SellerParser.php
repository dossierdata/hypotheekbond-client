<?php

namespace MortgageUnion\Parsers;


use Carbon\Carbon;
use Illuminate\Support\Collection;
use MortgageUnion\Models\Signals\Seller;

class SellerParser
{
    /**
     * @param $sellers
     * @return Collection
     */
    public function parse($sellers)
    {
        $signals = new Collection();

        foreach ($sellers as $seller) {
            $attributes = [
                'mortgageUnionId' => (integer)$seller->HypotheekbondId,
                'externalId' => (integer)$seller->ExternId,
                'advisorName' => (string)$seller->AdviseurNaam,
                'name' => (string)$seller->Naam,
                'forSaleSince' => Carbon::createFromFormat('Y-m-d', (string)$seller->TeKoopSinds),
                'address' => (string)$seller->TeKoopAdres,
                'status' => (string)$seller->TeKoopStatus,
                'numberOfDaysForSale' => (string)$seller->TeKoopAantalDagen,
            ];


            $signals->push(new Seller($attributes));
        }

        return $signals;
    }
}