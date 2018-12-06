<?php

namespace MortgageUnion\Repositories\Implementation;


use MortgageUnion\Clients\MortgageUnion;
use SimpleXMLElement;

class XMLRepository implements \MortgageUnion\Repositories\XMLRepository
{

    /**
     * @var MortgageUnion
     */
    private $client;

    private $xpaths = [
        'agencies' => 'geldverstrekkers/geldverstrekker',
        'lenders' => 'verzekeraars/verzekeraar',
        'banks' => 'banken/bank',
    ];

    /**
     * @return SimpleXMLElement
     */
    public function getXML()
    {
        return new SimpleXMLElement(file_get_contents('https://www.hypotheekbond.nl/xml/productlijst.xml'));
    }

    /**
     * @return SimpleXMLElement[]
     */
    public function getAgencies()
    {
        return $this->getXML()->xpath($this->xpaths['agencies']);
    }

    /**
     * @return SimpleXMLElement[]
     */
    public function getBanks()
    {
        return $this->getXML()->xpath($this->xpaths['banks']);
    }

    /**
     * @return SimpleXMLElement[]
     */
    public function getLenders()
    {
        return $this->getXML()->xpath($this->xpaths['lenders']);
    }
}