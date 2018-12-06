<?php namespace MortgageUnion\Models\Signals;

/**
 * Class RenewalLoan
 * @package MortgageUnion\Models\Signals
 *
 * @property $months;
 * @property $sum;
 * @property $externalId;
 *
 */
class RenewalLoan
{
    protected $months;
    protected $sum;
    protected $externalId;

    protected $fillable = [
        'externalId',
        'sum',
        'months'
    ];

    public function __construct($attributes)
    {
        foreach ($attributes as $key => $value) {
            if (in_array($key, $this->fillable)) {
                $this->{$key} = $value;
            }
        }
    }

    public function __get($name)
    {
        if (in_array($name, $this->fillable)) {
            return $this->{$name};
        } else {
            throw new \Exception(sprintf('The field "%s" is not in the fillable array', $name));
        }
    }
}
