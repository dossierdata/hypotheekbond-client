<?php namespace MortgageUnion\Exceptions;

class DossierNotFoundException extends Exception
{
    public function __construct($dossierReference)
    {
        parent::__construct(sprintf('The dossier with reference "%s" could not be found', $dossierReference));
    }
}
