<?php

namespace MortgageUnion\Repositories;


interface XMLRepository
{
    public function getXML();

    /**
     * @return SimpleXMLElement[]
     */
    public function getAgencies();

    /**
     * @return SimpleXMLElement[]
     */
    public function getBanks();

    /**
     * @return SimpleXMLElement[]
     */
    public function getLenders();
}