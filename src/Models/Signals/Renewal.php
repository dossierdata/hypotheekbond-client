<?php namespace MortgageUnion\Models\Signals;

use Html;
use MortgageUnion\Enums\SignalType;

/**
 * Class Renewal
 * @package MortgageUnion\Models\Signals
 *
 * @property $mortgageUnionId;
 * @property $externalId;
 * @property $advisorName;
 * @property $name;
 * @property $principalAmount;
 *
 */
class Renewal extends Signal
{
    protected $fillable = [
        'mortgageUnionId',
        'externalId',
        'advisorName',
        'name',
        'signalType',
        'principalAmount',
    ];

    protected $mortgageUnionId;
    protected $externalId;
    protected $advisorName;
    protected $name;
    protected $principalAmount;
    protected $signalType = SignalType::RENEWAL;

    private $loans = [];


    /**
     * @return RenewalLoan[]
     */
    public function getLoans()
    {
        return $this->loans;
    }

    /**
     * @param $loans
     */
    public function setLoans($loans)
    {
        $this->loans = $loans;
    }

    public function getRemainingMonths()
    {
        $months = null;
        foreach ($this->getLoans() as $loan) {
            if (!isset($months)) {
                $months = $loan->months;
            } elseif ($loan->months < $months) {
                $months = $loan->months;
            }
        }
        return $months;
    }
}
