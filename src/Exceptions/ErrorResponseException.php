<?php namespace MortgageUnion\Exceptions;

use Findesk\Models\Error;

class ErrorResponseException extends Exception
{
    private $error;

    public function __construct(Error $error)
    {
        $this->setError($error);
        parent::__construct($error->getMessage());
    }

    public function setError(Error $error)
    {
        $this->error = $error;
    }

    public function getError()
    {
        return $this->error;
    }
}
