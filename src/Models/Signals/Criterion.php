<?php namespace MortgageUnion\Models\Signals;

use Carbon\Carbon;
use MortgageUnion\Enums\SignalType;

/**
 * Class Criterion
 * @package MortgageUnion\Models\Signals
 *
 * @property $mortgageUnionId;
 * @property $externalId;
 * @property $advisorName;
 * @property $name;
 * @property $signal;
 * @property $type;
 * @property $value;
 * @property Carbon $valueDate;
 * @property $note;
 *
 */
class Criterion extends Signal
{
    protected $fillable = [
        'mortgageUnionId',
        'externalId',
        'advisorName',
        'name',
        'signal',
        'type',
        'value',
        'valueDate',
        'signalType',
        'note'
    ];

    protected $signalType = SignalType::CRITERION;
    protected $mortgageUnionId;
    protected $externalId;
    protected $advisorName;
    protected $name;
    protected $signal;
    protected $type;
    protected $value;
    protected $valueDate;
    protected $note;
}
