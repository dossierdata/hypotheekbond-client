<?php namespace MortgageUnion\Exceptions;

class ValidationException extends Exception
{
    /**
     * @var array $errors
     */
    private $errors;

    public function __construct($validator = null, $response = null)
    {
        parent::__construct($validator, $response);
    }

    /**
     * @param $errors
     * @return $this
     */
    public function setErrors(array $errors)
    {
        $this->errors = $errors;
        return $this;
    }

    /**
     * @return array
     */
    public function getErrors()
    {
        if (isset($this->errors)) {
            return $this->errors;
        } else {
            return $this->validator->getMessageBag()->all();
        }
    }
}
