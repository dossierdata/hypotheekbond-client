<?php namespace MortgageUnion\Clients;

use Findesk\Exceptions\AuthenticationException;
use Findesk\Exceptions\AuthTokenExpiredException;
use Findesk\Exceptions\InvalidResponseException;
use Findesk\Exceptions\NotImplementedException;

interface MortgageUnion
{
    public function getSignals();

    /**
     * @param $data
     * @return mixed
     */
    public function insertUpdateClients($data);
}
