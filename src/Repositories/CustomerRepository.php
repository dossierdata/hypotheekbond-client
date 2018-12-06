<?php

namespace MortgageUnion\Repositories;


use MortgageUnion\Exceptions\InvalidRequestException;
use MortgageUnion\Models\Customer;

interface CustomerRepository
{
    /**
     * @param Customer $customer
     * @param $lastUpdatedAtTimestamp
     * @return bool
     */
    public function createOrUpdate(Customer $customer, $lastUpdatedAtTimestamp);
}