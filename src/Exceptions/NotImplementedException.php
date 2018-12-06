<?php namespace MortgageUnion\Exceptions;

class NotImplementedException extends Exception
{
    public function __construct($message = null)
    {
        if ($message == null) {
            $message = 'Not implemented';
        } else {
            $message = sprintf('"%s" not implemented', $message);
        }

        parent::__construct($message);
    }
}
