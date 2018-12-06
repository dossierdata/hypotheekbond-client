<?php

namespace MortgageUnion\Repositories\Implementation;


use Illuminate\Support\Collection;
use MortgageUnion\Models\Agency;
use MortgageUnion\Models\AgencyLabel;
use MortgageUnion\Models\AgencyProduct;
use SimpleXMLElement;

class AgencyRepository implements \MortgageUnion\Repositories\AgencyRepository
{
    /**
     * @var XMLRepository
     */
    private $XMLRepository;

    /**
     * SignalRepository constructor.
     * @param XMLRepository $XMLRepository
     */
    public function __construct(XMLRepository $XMLRepository)
    {
        $this->XMLRepository = $XMLRepository;
    }

    /**
     * @param $hdnCode
     * @return mixed|Agency
     */
    public function findAgencyByHDNCode($hdnCode)
    {
        $agencies = $this->all();

        foreach ($agencies as $agency) {
            if (isset($agency->HDN) && $agency->HDN === $hdnCode) {
                return $agency;
            }
        }

        foreach ($agencies as $agency) {
            if ($this->getHDNCodeFromLabel($agency) === $hdnCode) {
                return $agency;
            }
        }
    }

    /**
     * @param Agency $agency
     * @return string|null
     */
    protected function getHDNCodeFromLabel(Agency $agency)
    {
        foreach ($agency->getLabels() as $label) {
            if (isset($label->HDN)) {
                return substr($label->HDN, 0, 2);
            }
        }

        return null;
    }

    /**
     * @return Collection|Agency[]
     */
    public function all()
    {
        $xmlAgencies =$this->XMLRepository->getAgencies();

        $agencies = new Collection();

        foreach ($xmlAgencies as $xmlAgency) {
            $attributes = $xmlAgency->attributes();
            $agency = new Agency([
                'id' => $attributes['ID']->__toString(),
                'name' => $attributes['naam']->__toString(),
            ]);

            if (isset($attributes['HDN'])) {
                $agency->setHDN($attributes['HDN']->__toString());
            }

            $agency->setLabels($this->getLabels($xmlAgency));

            $agencies->put($agency->id, $agency);
        }

        return $agencies;
    }

    /**
     * @param SimpleXMLElement $xmlAgency
     * @return Collection
     */
    protected function getLabels(SimpleXMLElement $xmlAgency)
    {
        $labels = new Collection();
        foreach ($xmlAgency->xpath('labels/label') as $XMLLabel) {
            $label = new AgencyLabel([
                'id' => $XMLLabel['ID']->__toString(),
                'name' => $XMLLabel['naam']->__toString(),
            ]);

            if (isset($XMLLabel['HDN'])) {
                $label->setHDN($XMLLabel['HDN']->__toString());
            }

            $label->setProducts($this->getProducts($XMLLabel));

            $labels->put($label->id, $label);
        }

        return $labels;
    }

    /**
     * @param SimpleXMLElement $XMLLabel
     * @return Collection
     */
    protected function getProducts(SimpleXMLElement $XMLLabel)
    {
        $products = new Collection();

        foreach ($XMLLabel->xpath('product') as $XMLProduct) {
            $product = new AgencyProduct([
                'id' => $XMLProduct['ID']->__toString(),
                'name' => $XMLProduct['naam']->__toString(),
                'redemptionForm' => $XMLProduct['aflosvorm']->__toString(),
                'redemptionFormCode' => $XMLProduct['aflosvorm_code']->__toString(),
            ]);

            $products->put($product->id, $product);
        }

        return $products;
    }
}