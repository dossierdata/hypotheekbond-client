Implement your own version of the MortgageUnionConfig and bind it tot the contract.
There is an example config file that can be published with ```bash php artisan vendor:publish --provider='MortgageUnion\ServiceProvider' --tag='config' ```

The config contains advisor and partner credentials. The advisor credentials are the credentials of the user of the tenant of hypotheekbond that you want to access.
    And the partner credentials need to be requested at hypotheekbond.

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