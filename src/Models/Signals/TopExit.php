<?php namespace MortgageUnion\Models\Signals;

use MortgageUnion\Enums\SignalType;

/**
 * Class TopExit
 * @package MortgageUnion\Models\Signals
 *
 * @property $mortgageUnionId;
 * @property $externalId;
 * @property $advisorName;
 * @property $name;
 * @property $bruto_difference;
 * @property $neto_difference;
 *
 */
class TopExit extends Signal
{
    protected $fillable = [
        'mortgageUnionId',
        'externalId',
        'advisorName',
        'name',
        'bruto_difference',
        'neto_difference',
        'signalType',
    ];

    protected $signalType = SignalType::TOP_EXIT;
    protected $mortgageUnionId;
    protected $externalId;
    protected $advisorName;
    protected $name;
    protected $bruto_difference;
    protected $neto_difference;
}
