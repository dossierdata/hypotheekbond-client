<?php namespace MortgageUnion\Models\Signals;

use MortgageUnion\Enums\SignalType;

/**
 * Class IncompleteRecord
 * @package MortgageUnion\Models\Signals
 *
 * @property $mortgageUnionId;
 * @property $externalId;
 * @property $name;
 * @property $percentage;
 * @property $isCalculated;
 *
 */
class IncompleteRecord extends Signal
{
    protected $fillable = [
        'mortgageUnionId',
        'externalId',
        'name',
        'percentage',
        'signalType',
        'isCalculated',
    ];

    protected $signalType = SignalType::INCOMPLETE_RECORD;
    protected $mortgageUnionId;
    protected $externalId;
    protected $name;
    protected $percentage;
    protected $isCalculated;

//    public function getIcon()
//    {
//        return $this->isCalculatable() ? 'mdi mdi-checkbox-marked-circle' : 'mdi mdi-alert-circle';
//    }
//
//    public function getStatusColor()
//    {
//        return $this->isCalculatable() ? '#b1ba1d' : '#fda10a';
//    }
}
