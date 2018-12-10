This is a package that consumes the hypotheekbond SOAP API for pushing customer data to their system and extracting important information in form of signals.
##Implementation
Implement your own version of the MortgageUnionConfig and bind it to the contract.


##Publish
There is an example config file that can be published with :
```bash
php artisan vendor:publish --provider='MortgageUnion\ServiceProvider' --tag='config'
```

The config contains advisor and partner credentials. The advisor credentials are the credentials of the user of the tenant of hypotheekbond that you want to access.
    And the partner credentials need to be requested at hypotheekbond.

##Examples
Example push usage:
```php
$customer = new \MortgageUnion\Models\Customer([
    'name' => 'Vries',
    'suffix' => 'de',
    'initials' => 'A',
    'firstName' => 'Anton',
]);

$customerRepository = app()->make(MortgageUnion\Repositories\CustomerRepository::class);
$customerRepository->createOrUpdate($customer);
```
Example signal usage:
```php
$signalRepository = app()->make(MortgageUnion\Repositories\SignalRepository::class)
$signalRepository->getSignals();
```
Example Config implementation.
```php
class MortgageUnionConfig implements \MortgageUnion\Config\Contracts\MortgageUnionConfig
{
    /**
     * @var Repository
     */
    private $configRepository;

    /**
     * MortgageUnionConfig constructor.
     * @param Repository $configRepository
     */
    public function __construct(ConfigRepository $configRepository)
    {
        $this->configRepository = $configRepository;
    }

    public function getAdvisorUser()
    {
        return $this->configRepository->get('hypotheekbond_adviseur');
    }

    public function getAdvisorPassword()
    {
        return $this->configRepository->get('hypotheekbond_adviseurPassword');
    }

    public function getPartnerUser()
    {
        return $this->configRepository->get('hypotheekbond.partner');
    }
    
    public function getPartnerPassword()
    {
        return $this->configRepository->get('hypotheekbond.partnerPassword');
    }

    public function getURI()
    {
        return $this->configRepository->get('hypotheekbond.uri');
    }
    
    public function getWSDL()
    {
        return $this->configRepository->get('hypotheekbond.wsdl');
    }
}
```