<?php

namespace MortgageUnion\Parsers;


use Illuminate\Support\Collection;
use MortgageUnion\Models\Signals\Renewal;

class RenewalParser
{
    /**
     * @param $mortgageUnionRenewals
     * @return Collection
     */
    public function parse($mortgageUnionRenewals)
    {
        $signals = new Collection();

        foreach ($mortgageUnionRenewals as $mortgageUnionRenewal) {
            $attributes = [
                'mortgageUnionId' => (integer)$mortgageUnionRenewal->HypotheekbondId,
                'externalId' => (integer)$mortgageUnionRenewal->ExternId,
                'name' => (string)$mortgageUnionRenewal->Naam,
                'advisorName' => (string)$mortgageUnionRenewal->AdviseurNaam,
                'principalAmount' => (float)$mortgageUnionRenewal->Hoofdsom,
            ];

            $renewal = new Renewal($attributes);

            if (isset($mortgageUnionRenewal->MaandenResterend) && isset($mortgageUnionRenewal->MaandenResterend->Leningdeel)) {
                $renewal->setLoans(
                    $this->parseLoans(
                        is_array($mortgageUnionRenewal->MaandenResterend->Leningdeel) ? $mortgageUnionRenewal->MaandenResterend->Leningdeel : [$mortgageUnionRenewal->MaandenResterend->Leningdeel]
                    )
                );
            }

            $signals->push($renewal);
        }

        return $signals;
    }

    /**
     * @param $loans
     * @return array
     */
    protected function parseLoans($loans)
    {
        $renewalParser = $this->getLoanParser();

        return $renewalParser->parse($loans);
    }

    /**
     * @return RenewalLoanParser
     */
    protected function getLoanParser()
    {
        return app()->make(RenewalLoanParser::class);
    }
}