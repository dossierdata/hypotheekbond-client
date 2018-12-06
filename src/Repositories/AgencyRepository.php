<?php

namespace MortgageUnion\Repositories;


use Illuminate\Support\Collection;
use MortgageUnion\Models\Agency;

interface AgencyRepository
{
    /**
     * @return Collection
     */
    public function all();

    /**
     * @param $hdnCode
     * @return mixed|Agency
     */
    public function findAgencyByHDNCode($hdnCode);
}