<?php

namespace MortgageUnion\Repositories\Implementation;


use Illuminate\Support\Collection;
use MortgageUnion\Models\Agency;

class LenderRepository implements \MortgageUnion\Repositories\LenderRepository
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

        $XMLLenders = $this->XMLRepository->getLenders();

        $lenders = new Collection();

        foreach ($XMLLenders as $XMLLender) {
            $XMLLenderId = $XMLLender['ID']->__toString();
            if ($agencies->has($XMLLenderId)) {
                $lenders->put($XMLLenderId, $agencies->get($XMLLenderId));
            } else {
                $lenders->put($XMLLenderId, new Agency([
                    'id' => $XMLLenderId,
                    'name' => $XMLLender['naam'],
                ]));
            }
        }
        
        return $lenders;
    }
}