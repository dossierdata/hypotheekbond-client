<?php

namespace MortgageUnion\Repositories;


use Illuminate\Support\Collection;

interface BankRepository
{
    /**
     * @return Collection
     */
    public function all();
}