<?php

namespace MortgageUnion\Repositories\Implementation;


use Illuminate\Support\Collection;
use MortgageUnion\Models\Agency;

class BankRepository implements \MortgageUnion\Repositories\BankRepository
{
    /**
     * @var XMLRepository
     */
    private $XMLRepository;
    /**
     * @var AgencyRepository
     */
    private $agencyRepository;

    /**
     * SignalRepository constructor.
     * @param XMLRepository $XMLRepository
     * @param AgencyRepository $agencyRepository
     */
    public function __construct(XMLRepository $XMLRepository, AgencyRepository $agencyRepository)
    {
        $this->XMLRepository = $XMLRepository;
        $this->agencyRepository = $agencyRepository;
    }

    /**
     * @return Collection
     */
    public function all()
    {
        $agencies = $this->agencyRepository->all();

        $XMLBanks = $this->XMLRepository->getBanks();

        $banks = new Collection();

        foreach ($XMLBanks as $XMLBank) {
            $XMLBankId = $XMLBank['ID']->__toString();
            if ($agencies->has($XMLBankId)) {
                $banks->put($XMLBankId, $agencies->get($XMLBankId));
            } else {
                $banks->put($XMLBankId, new Agency([
                    'id' => $XMLBankId,
                    'name' => $XMLBank['naam'],
                ]));
            }
        }

        return $banks;
    }
}