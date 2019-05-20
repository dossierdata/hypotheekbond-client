<?php

namespace MortgageUnion\Repositories\Implementation;


use MortgageUnion\Clients\MortgageUnion;

class AuthRepository implements \MortgageUnion\Repositories\AuthRepository
{
    /**
     * @var MortgageUnion
     */
    private $client;

    /**
     * AuthRepository constructor.
     * @param MortgageUnion $client
     */
    public function __construct(
        MortgageUnion $client
    ) {
        $this->client = $client;
    }

    /**
     * @return mixed
     */
    public function singleClickLogin()
    {
        return $this->client->singleClickLogin();
    }
}