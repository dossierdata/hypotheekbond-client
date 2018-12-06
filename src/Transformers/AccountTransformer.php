<?php

namespace MortgageUnion\Transformers;


use MortgageUnion\Models\Account;

class AccountTransformer extends Transformer
{
    protected $dates = [
        'ingangsdatum',
        'einddatum',
        'saldo_datum',
    ];

    /**
     * @param Account $account
     * @return array
     */
    public function transform(Account $account)
    {
        $this->attributes = [
            'externID' => $account->externalID,
            'type' => $account->type,
            'bankID' => $account->bankID,
            'leningdeelID' => $account->mortgagePartID,
            'rekeningnummer' => $account->accountNumber,
            'box' => $account->box,
            'ingangsdatum' => $account->startDate,
            'einddatum' => $account->endDate,
            'inleg' => $account->inlay,
            'inleg_periode' => $account->inlayPeriod,
            'eerste_storting' => $account->firstPayment,
            'doelkapitaal' => $account->targetCapital,
            'beleggersprofiel' => $account->investorProfile,
            'rentevastperiode' => $account->fixedInterestPeriod,
            'rente' => $account->forecastPercentage,
            'prognoserendement' => $account->forecastReturn,
            'saldo' => $account->balance,
            'saldo_datum' => $account->balanceDate,
            'status' => $account->status,
        ];

        $this->clearEmptyAttributes();
        $this->transformDates();

        return $this->attributes;
    }
}