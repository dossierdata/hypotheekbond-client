<?php

namespace MortgageUnion\Repositories;


use Illuminate\Support\Collection;
use MortgageUnion\Enums\SignalType;

interface SignalRepository
{
    public function all();

    /**
     * @param SignalType $type
     * @return Collection
     */
    public function getByType(SignalType $type);
}