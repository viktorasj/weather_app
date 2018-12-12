<?php


namespace App\Service;


class AppServiceManager
{
    private $ageCalculator;
    private $checkAdult;

    public function __construct(AgeCalculatorInterface $ageCalculator, CheckAdultInterface $checkAdult)
    {
        $this->ageCalculator = $ageCalculator;
        $this->checkAdult = $checkAdult;
    }

    public function calcAge (\DateTime $birthdate)
    {
        $age = $this->ageCalculator->calculateAge($birthdate);
        return $age;
    }

}