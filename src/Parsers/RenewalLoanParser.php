<?php

namespace MortgageUnion\Parsers;


use Illuminate\Support\Collection;
use MortgageUnion\Models\Signals\Refinancing;
use MortgageUnion\Models\Signals\Renewal;
use MortgageUnion\Models\Signals\RenewalLoan;

class RenewalLoanParser
{
    /**
     * @param $renewalLoans
     * @return array
     */
    public function parse($renewalLoans)
    {
        $parsedRenewalLoans = [];

        foreach ($renewalLoans as $renewalLoan) {
            $attributes = [
                'sum' => (float)$renewalLoan->Bedrag,
                'months' => (float)$renewalLoan->_,
                'externalId' => (int)$renewalLoan->ExternId,
            ];

            $parsedRenewalLoans[] = new RenewalLoan($attributes);
        }

        return $parsedRenewalLoans;
    }
}