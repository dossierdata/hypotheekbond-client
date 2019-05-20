<?php namespace MortgageUnion\Clients;

interface MortgageUnion
{
    public function getSignals();

    /**
     * @param $data
     * @return mixed
     */
    public function insertUpdateClients($data);

    /**
     * @return mixed
     */
    public function singleClickLogin();
}
