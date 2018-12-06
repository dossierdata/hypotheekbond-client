<?php

namespace MortgageUnion\Parsers;


use Illuminate\Support\Collection;
use MortgageUnion\Models\Signals\Renewal;

class RenewalParser
{
    /**
     * @param $renewals
     * @return Collection
     */
    public function parse($renewals)
    {
        $signals = new Collection();

        foreach ($renewals as $renewal) {
            $attributes = [
                'mortgageUnionId' => (integer)$renewal->HypotheekbondId,
                'externalId' => (integer)$renewal->ExternId,
                'name' => (string)$renewal->Naam,
                'advisorName' => (string)$renewal->AdviseurNaam,
                'principalAmount' => (float)$renewal->Hoofdsom,
            ];

            $renewal = new Renewal($attributes);

            if (isset($rawSignal->MaandenResterend) && isset($rawSignal->MaandenResterend->Leningdeel)) {
                $renewal->setLoans(
                    $this->parseLoans(
                        is_array($renewal->MaandenResterend->Leningdeel) ? $renewal->MaandenResterend->Leningdeel : [$renewal->MaandenResterend->Leningdeel]
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