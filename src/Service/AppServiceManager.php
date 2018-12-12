<?php


namespace App\Service;


use phpDocumentor\Reflection\Types\Boolean;
use phpDocumentor\Reflection\Types\Integer;

class AppServiceManager
{
    private $ageCalculator;
    private $checkAdult;
    private $age;

    public function __construct(AgeCalculatorInterface $ageCalculator, CheckAdultInterface $checkAdult)
    {
        $this->ageCalculator = $ageCalculator;
        $this->checkAdult = $checkAdult;
    }

    public function calcAge (\DateTime $birthdate)
    {
        $this->age = $this->ageCalculator->calculateAge($birthdate);

        return $this->age;
    }

    public function isAdult (): bool
    {
        $isAdult = $this->checkAdult($this->age);

        return $isAdult;
    }

}