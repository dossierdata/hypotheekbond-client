<?php

namespace MortgageUnion\Repositories\Implementation;

use Spatie\ArrayToXml\ArrayToXml;
use MortgageUnion\Clients\MortgageUnion;
use MortgageUnion\Exceptions\InvalidRequestException;
use MortgageUnion\Models\Customer;
use MortgageUnion\Transformers\CustomerTransformer;

class CustomerRepository implements \MortgageUnion\Repositories\CustomerRepository
{

    /**
     * @var MortgageUnion
     */
    private $client;
    /**
     * @var CustomerTransformer
     */
    private $customerTransformer;

    /**
     * SignalRepository constructor.
     * @param MortgageUnion $client
     * @param CustomerTransformer $customerTransformer
     */
    public function __construct(MortgageUnion $client, CustomerTransformer $customerTransformer)
    {
        $this->client = $client;
        $this->customerTransformer = $customerTransformer;
    }

    /**
     * @param Customer $customer
     * @param $lastUpdatedAtTimestamp
     * @return bool
     * @throws InvalidRequestException
     */
    public function createOrUpdate(Customer $customer, $lastUpdatedAtTimestamp)
    {
        $data = $this->customerTransformer->transform($customer);

        $data['laatste_bewerking'] = $lastUpdatedAtTimestamp;

//        dd($data);

        $result = $this->client->insertUpdateClients([
            'klanten' => [
                'klant' => $data,
                'versie' => '2.30'
            ],
        ]);

        return $result;
    }
}