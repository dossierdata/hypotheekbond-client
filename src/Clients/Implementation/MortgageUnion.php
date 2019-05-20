<?php namespace MortgageUnion\Clients\Implementation;

use MortgageUnion\Config\Contracts\MortgageUnionConfig;
use MortgageUnion\Exceptions\ValidationException;
use MortgageUnion\Exceptions\VersionMismatchException;
use SoapClient;
use SoapHeader;

class MortgageUnion implements \MortgageUnion\Clients\MortgageUnion
{
    /**
     * @var SoapClient
     */
    private $client;
    /**
     * @var MortgageUnionConfig
     */
    private $mortgageUnionConfig;

    /**
     * @param MortgageUnionConfig $mortgageUnionConfig
     */
    public function __construct(MortgageUnionConfig $mortgageUnionConfig)
    {
        $this->mortgageUnionConfig = $mortgageUnionConfig;
    }

    protected function getSoapClient()
    {
        if ($this->client === null) {
            $this->client = new \SoapClient($this->mortgageUnionConfig->getWSDL(), [
            ]);

            $loginHeaderContent = [
                'adviseur' => $this->mortgageUnionConfig->getAdvisorUser(),
                'adviseurPassword' => $this->mortgageUnionConfig->getAdvisorPassword(),
                'partner' => $this->mortgageUnionConfig->getPartnerUser(),
                'partnerPassword' => $this->mortgageUnionConfig->getPartnerPassword(),
            ];

            $loginHeader = new SoapHeader($this->mortgageUnionConfig->getURI(), 'loginHeader', $loginHeaderContent,
                false);

            $this->client->__setSoapHeaders($loginHeader);
        }

        return $this->client;
    }

    /**
     * @return mixed
     */
    public function getSignals()
    {
        return $this->getSoapClient()->getSignals();
    }

    /**
     * @return mixed
     */
    public function singleClickLogin()
    {
        return $this->getSoapClient()->singleClickLogin();
    }

    public function createOrUpdateCustomer()
    {

    }

    /**
     * @param $data
     * @return mixed
     * @throws ValidationException
     * @throws VersionMismatchException
     */
    public function insertUpdateClients($data)
    {
        $result = $this->getSoapClient()->insertUpdateClients($data);

        try {
            $this->validateResult($result);
        } catch (ValidationException $validationException) {
            throw (new ValidationException())->setErrors($validationException->getErrors());
        } catch (VersionMismatchException $versionMismatchException) {
            throw (new VersionMismatchException())->setErrors($versionMismatchException->getErrors());
        }

        return $result;
    }

    /**
     * @param $result
     * @throws ValidationException
     * @throws VersionMismatchException
     */
    protected function validateResult($result)
    {
        if (isset($result->errors)) {
            $errors = [];
            foreach ($result->errors as $error) {
                $errors[] = $error;
            }
            throw (new ValidationException())->setErrors($errors);
            // parse error
            //throw exception
        } elseif (isset($result->klant->status) && $result->klant->status === "error") {
            throw (new VersionMismatchException())->setErrors([$result->klant->text]);
            //parse errors
        }
    }
}
