<?php

namespace MortgageUnion\Repositories;


use Illuminate\Support\Collection;

interface LenderRepository
{
    /**
     * @return Collection
     */
    public function all();
}