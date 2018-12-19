<?php

namespace MortgageUnion\Repositories\Implementation;


use Illuminate\Support\Collection;
use MortgageUnion\Clients\MortgageUnion;
use MortgageUnion\Enums\SignalType;
use MortgageUnion\Parsers\CriterionParser;
use MortgageUnion\Parsers\IncompleteDossierParser;
use MortgageUnion\Parsers\LifeInsuranceParser;
use MortgageUnion\Parsers\RefinancingParser;
use MortgageUnion\Parsers\RefinancingToBankSavingParser;
use MortgageUnion\Parsers\RenewalParser;
use MortgageUnion\Parsers\RenterParser;
use MortgageUnion\Parsers\SellerParser;
use MortgageUnion\Parsers\TopExitParser;

class SignalRepository implements \MortgageUnion\Repositories\SignalRepository
{

    /**
     * @var MortgageUnion
     */
    private $client;
    /**
     * @var RefinancingParser
     */
    private $refinancingParser;
    /**
     * @var RenewalParser
     */
    private $renewalParser;
    /**
     * @var LifeInsuranceParser
     */
    private $lifeInsuranceParser;
    /**
     * @var TopExitParser
     */
    private $topExitParser;
    /**
     * @var RenterParser
     */
    private $renterParser;
    /**
     * @var CriterionParser
     */
    private $criterionParser;
    /**
     * @var IncompleteDossierParser
     */
    private $incompleteDossierParser;
    /**
     * @var RefinancingToBankSavingParser
     */
    private $refinancingToBankSavingParser;
    /**
     * @var SellerParser
     */
    private $sellerParser;

    /**
     * SignalRepository constructor.
     * @param MortgageUnion $client
     * @param RefinancingParser $refinancingParser
     * @param LifeInsuranceParser $lifeInsuranceParser
     * @param SellerParser $sellerParser
     * @param TopExitParser $topExitParser
     * @param RenterParser $renterParser
     * @param CriterionParser $criterionParser
     * @param IncompleteDossierParser $incompleteDossierParser
     * @param RefinancingToBankSavingParser $refinancingToBankSavingParser
     * @param RenewalParser $renewalParser
     */
    public function __construct(
        MortgageUnion $client,
        RefinancingParser $refinancingParser,
        LifeInsuranceParser $lifeInsuranceParser,
        SellerParser $sellerParser,
        TopExitParser $topExitParser,
        RenterParser $renterParser,
        CriterionParser $criterionParser,
        IncompleteDossierParser $incompleteDossierParser,
        RefinancingToBankSavingParser $refinancingToBankSavingParser,
        RenewalParser $renewalParser
    ) {
        $this->client = $client;
        $this->refinancingParser = $refinancingParser;
        $this->renewalParser = $renewalParser;
        $this->lifeInsuranceParser = $lifeInsuranceParser;
        $this->topExitParser = $topExitParser;
        $this->renterParser = $renterParser;
        $this->criterionParser = $criterionParser;
        $this->incompleteDossierParser = $incompleteDossierParser;
        $this->refinancingToBankSavingParser = $refinancingToBankSavingParser;
        $this->sellerParser = $sellerParser;
    }

    /**
     * @return Collection
     */
    public function all()
    {
        $rawSignals = $this->client->getSignals();

        return $this->parseSignals($rawSignals);
    }

    /**
     * @param SignalType $type
     * @return Collection
     */
    public function getByType(SignalType $type)
    {
        $rawSignals = $this->client->getSignals()->Signalen;

        switch ($type) {
            case SignalType::REFINANCING():
                return $this->getRefinancingSignals($rawSignals->Oversluitingen);

            case SignalType::RENEWAL():
                return $this->getRenewalSignals($rawSignals->Renteverlengingen);

            case SignalType::LIFE_INSURANCE():
                return $this->getLifeInsuranceSignals($rawSignals->ORVs);

            case SignalType::SELLER():
                return $this->getSellerSignals($rawSignals->Verhuizers);

            case SignalType::RENTER():
                return $this->getRenterSignals($rawSignals->Verhuurders);

            case SignalType::TOP_EXIT():
                return $this->getTopExitSignals($rawSignals->Topafslagen);

            case SignalType::CRITERION():
                return $this->getCriterionSignals($rawSignals->Criteria);

            case SignalType::INCOMPLETE_RECORD():
                return $this->getIncompleteDossierSignals($rawSignals->IncompleteDossiers);

            case SignalType::REFINANCING_TO_BANK_SAVINGS():
                return $this->getRefinancingToBankSavingSignals($rawSignals->OversluitingenNaarBankspaar);
        }
    }

    /**
     * @param $externalId
     * @return Collection
     */
    public function getByExternalId($externalId)
    {

        return $this->all()->filter(function ($value, $key) use ($externalId) {
            return $value->externalId == $externalId;
        });
    }

    /**
     * @param $rawResponse
     * @return Collection
     */
    protected function parseSignals($rawResponse)
    {
        $signals = new Collection();

        foreach ($rawResponse->Signalen as $key => $rawSignals) {
            switch ($key) {
                case 'Oversluitingen':
                    $signals = $signals->merge($this->getRefinancingSignals($rawSignals));
                    break;

                case 'Renteverlengingen':
                    $signals = $signals->merge($this->getRenewalSignals($rawSignals));
                    break;

                case 'ORVs':
                    $signals = $signals->merge($this->getLifeInsuranceSignals($rawSignals));
                    break;

                case 'Verhuizers':
                    $signals = $signals->merge($this->getSellerSignals($rawSignals));
                    break;

                case 'Verhuurders':
                    $signals = $signals->merge($this->getRenterSignals($rawSignals));
                    break;

                case 'Topafslagen':
                    $signals = $signals->merge($this->getTopExitSignals($rawSignals));
                    break;

                case 'Criteria':
                    $signals = $signals->merge($this->getCriterionSignals($rawSignals));
                    break;

                case 'IncompleteDossiers':
                    $signals = $signals->merge($this->getIncompleteDossierSignals($rawSignals));
                    break;

                case 'OversluitingenNaarBankspaar':
                    $signals = $signals->merge($this->getRefinancingToBankSavingSignals($rawSignals));
                    break;
            }
        }
        return $signals;
    }

    /**
     * @param $rawSignals
     * @return Collection
     */
    public function getRefinancingSignals($rawSignals)
    {
        $signals = new Collection();

        if (property_exists($rawSignals, 'Oversluiting')) {
            $signals = $this->refinancingParser->parse(
                is_array($rawSignals->Oversluiting) ? $rawSignals->Oversluiting : [$rawSignals->Oversluiting]
            );
        }

        return $signals;
    }

    /**
     * @param $rawSignals
     * @return Collection
     */
    public function getRenewalSignals($rawSignals)
    {
        $signals = new Collection();

        if (property_exists($rawSignals, 'Renteverlenging')) {
            $signals = $this->renewalParser->parse(
                is_array($rawSignals->Renteverlenging) ? $rawSignals->Renteverlenging : [$rawSignals->Renteverlenging]
            );
        }

        return $signals;
    }

    /**
     * @param $rawSignals
     * @return Collection
     */
    public function getLifeInsuranceSignals($rawSignals)
    {
        $signals = new Collection();

        if (property_exists($rawSignals, 'ORV')) {
            $signals = $this->lifeInsuranceParser->parse(
                is_array($rawSignals->ORV) ? $rawSignals->ORV : [$rawSignals->ORV]
            );
        }

        return $signals;
    }

    /**
     * @param $rawSignals
     * @return Collection
     */
    public function getSellerSignals($rawSignals)
    {
        $signals = new Collection();

        if (property_exists($rawSignals, 'Verhuizer')) {
            $signals = $this->sellerParser->parse(
                is_array($rawSignals->Verhuizer) ? $rawSignals->Verhuizer : [$rawSignals->Verhuizer]
            );
        }

        return $signals;
    }

    /**
     * @param $rawSignals
     * @return Collection
     */
    public function getRenterSignals($rawSignals)
    {
        $signals = new Collection();

        if (property_exists($rawSignals, 'Verhuurder')) {
            $signals = $this->renterParser->parse(
                is_array($rawSignals->Verhuurder) ? $rawSignals->Verhuurder : [$rawSignals->Verhuurder]
            );
        }

        return $signals;
    }

    /**
     * @param $rawSignals
     * @return Collection
     */
    public function getTopExitSignals($rawSignals)
    {
        $signals = new Collection();

        if (property_exists($rawSignals, 'Topafslag')) {
            $signals = $this->topExitParser->parse(
                is_array($rawSignals->Topafslag) ? $rawSignals->Topafslag : [$rawSignals->Topafslag]
            );
        }

        return $signals;
    }

    /**
     * @param $rawSignals
     * @return Collection
     */
    public function getCriterionSignals($rawSignals)
    {
        $signals = new Collection();

        if (property_exists($rawSignals, 'Criterium')) {
            $signals = $this->criterionParser->parse(
                is_array($rawSignals->Criterium) ? $rawSignals->Criterium : [$rawSignals->Criterium]
            );
        }

        return $signals;
    }

    /**
     * @param $rawSignals
     * @return Collection
     */
    public function getIncompleteDossierSignals($rawSignals)
    {
        $signals = new Collection();

        if (property_exists($rawSignals, 'Dossier')) {
            $signals = $this->incompleteDossierParser->parse(
                is_array($rawSignals->Dossier) ? $rawSignals->Dossier : [$rawSignals->Dossier]
            );
        }

        return $signals;
    }

    /**
     * @param $rawSignals
     * @return Collection
     */
    public function getRefinancingToBankSavingSignals($rawSignals)
    {
        $signals = new Collection();

        if (property_exists($rawSignals, 'OversluitingNaarBankspaar')) {
            $signals = $this->refinancingToBankSavingParser->parse(
                is_array($rawSignals->OversluitingNaarBankspaar) ? $rawSignals->OversluitingNaarBankspaar : [$rawSignals->OversluitingNaarBankspaar]
            );
        }

        return $signals;
    }

    /**
     * @param SignalType $type
     * @return int
     */
    public function getCountByType(SignalType $type)
    {
        return count($this->getByType($type));
    }
}