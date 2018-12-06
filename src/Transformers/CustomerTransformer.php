<?php

namespace MortgageUnion\Transformers;


use MortgageUnion\Models\Customer;

class CustomerTransformer extends Transformer
{
    /**
     * @var MortgageTransformer
     */
    private $mortgageTransformer;
    /**
     * @var PropertyTransformer
     */
    private $propertyTransformer;
    /**
     * @var PolicyTransformer
     */
    private $policyTransformer;
    /**
     * @var AccountTransformer
     */
    private $accountTransformer;
    /**
     * @var CreditAgencyRegistrationTransformer
     */
    private $creditAgencyRegistrationTransformer;

    protected $dates = [
        'geboortedatum',
        'bruto_jaarinkomen_stand_per',
        'partner_geboortedatum',
        'partner_bruto_jaarinkomen_stand_per',
        'pensioeninkomen_stand_per',
    ];

    /**
     * CustomerTransformer constructor.
     * @param MortgageTransformer $mortgageTransformer
     * @param PolicyTransformer $policyTransformer
     * @param AccountTransformer $accountTransformer
     * @param CreditAgencyRegistrationTransformer $creditAgencyRegistrationTransformer
     * @param PropertyTransformer $propertyTransformer
     */
    public function __construct(
        MortgageTransformer $mortgageTransformer,
        PolicyTransformer $policyTransformer,
        AccountTransformer $accountTransformer,
        CreditAgencyRegistrationTransformer $creditAgencyRegistrationTransformer,
        PropertyTransformer $propertyTransformer
    ) {
        $this->mortgageTransformer = $mortgageTransformer;
        $this->propertyTransformer = $propertyTransformer;
        $this->policyTransformer = $policyTransformer;
        $this->accountTransformer = $accountTransformer;
        $this->creditAgencyRegistrationTransformer = $creditAgencyRegistrationTransformer;
    }

    public function transform(Customer $customer)
    {
        $this->attributes = [
            'externID' => $customer->externalId,
            'adviseurID' => $customer->advisorId,
            'deelnemer' => $customer->participant,
            'adviseurs_gebruikernaam' => $customer->mortgageUnionUsername,
            'adviseurs_gebruikerID' => $customer->mortgageUnionUserId,
            'status' => $customer->status,
            'naam' => $customer->name,
            'tussenvoegsels' => $customer->suffix,
            'initialen' => $customer->initials,
            'voornaam' => $customer->firstName,
            'aanhef' => $customer->salutation,
            'email' => $customer->email,
            'geboortedatum' => $customer->dob,
            'adres' => $customer->address,
            'postcode' => $customer->postcode,
            'huisnummer' => $customer->houseNumber,
            'toevoeging' => $customer->houseNumberAddition,
            'woonplaats' => $customer->city,
            'bron' => $customer->dataSourceName,
            'bruto_jaarinkomen' => $customer->grossAnnualIncome,
            'vakantiegeld' => $customer->holidayBonus,
            'eindejaarsuitkering' => $customer->fixedEndYearBenefit,
            'bruto_jaarinkomen_stand_per' => $customer->incomeDate,
            'pensioeninkomen' => $customer->retirementGrossAnnualIncome,
            'pensioeninkomen_stand_per' => $customer->retirementIncomeDate,
            'burgerlijke_staat' => $customer->maritalStatus,
            'sofinummer' => $customer->bsn,
            'rookt' => $this->transformSmoking($customer->smoking),
            'telefoon_prive' => $customer->phonePrivate,
            'telefoon_werk' => $customer->phoneWork,
            'telefoon_mobiel' => $customer->phoneMobile,
            'partner_naam' => $customer->partnerName,
            'partner_voornaam' => $customer->partnerFirstName,
            'partner_tussenvoegsels' => $customer->partnerSuffix,
            'partner_initialen' => $customer->partnerInitials,
            'partner_aanhef' => $customer->partnerSalutation,
            'partner_geboortedatum' => $customer->partnerDOB,
            'partner_sofinummer' => $customer->partnerBSN,
            'partner_rookt' => $this->transformSmoking($customer->partnerSmoking),
            'partner_bruto_jaarinkomen' => $customer->partnerGrossAnnualIncome,
            'partner_vakantiegeld' => $customer->partnerHolidayBonus,
            'partner_eindejaarsuitkering' => $customer->partnerFixedEndYearBenefit,
            'partner_bruto_jaarinkomen_stand_per' => $customer->partnerIncomeDate,
            'partner_pensioeninkomen' => $customer->partnerRetirementGrossAnnualIncome,
            'partner_pensioeninkomen_stand_per' => $customer->partnerRetirementIncomeDate,
            'partner_email' => $customer->partnerEmail,
            'partner_telefoon_werk' => $customer->partnerPhonePrivate,
            'partner_telefoon_mobiel' => $customer->partnerPhoneMobile,
            'panden' => $this->transformProperties($customer->getProperties()),
            'verzekeringen' => $this->transformPolicies($customer->getPolicies()),
            'rekeningen' => $this->transformAccounts($customer->getAccounts()),
            'bkr' => $this->transformCreditAgencyRegistration($customer->getCreditAgencyRegistrations()),
        ];

        $this->clearEmptyAttributes();
        $this->transformDates();

        return $this->attributes;
    }

    /**
     * @param $property
     * @return array
     */
    protected function transformProperties($property)
    {
        return [
            'pand' => $this->propertyTransformer->transform($property)
        ];
    }

    /**
     * @param $policies
     * @return array
     */
    protected function transformPolicies($policies)
    {
        $transformedPolicies = [];

        foreach ($policies as $policy) {
            $transformedPolicies[] = $this->policyTransformer->transform($policy);
        }

        return $transformedPolicies;
    }

    /**
     * @param $accounts
     * @return array
     */
    protected function transformAccounts($accounts)
    {
        $transformedAccounts = [];

        if ($accounts !== null) {
            foreach ($accounts as $account) {
                $transformedAccounts[] = $this->accountTransformer->transform($account);
            }
        }


        return $transformedAccounts;
    }

    /**
     * @param $creditAgencyRegistrations
     * @return array
     */
    protected function transformCreditAgencyRegistration($creditAgencyRegistrations)
    {
        $transformedCreditAgencyRegistration = [];
        if ($creditAgencyRegistrations !== null) {
            foreach ($creditAgencyRegistrations as $creditAgencyRegistration) {
                $transformedCreditAgencyRegistration[] = $this->creditAgencyRegistrationTransformer->transform($creditAgencyRegistration);
            }
        }

        return $transformedCreditAgencyRegistration;
    }
}