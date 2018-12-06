<?php

namespace MortgageUnion\Config\Contracts;


interface MortgageUnionConfig
{

    public function getAdvisorUser();
    public function getAdvisorPassword();
    public function getPartnerUser();
    public function getPartnerPassword();
    public function getURI();
    public function getWSDL();
}