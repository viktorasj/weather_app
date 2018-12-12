<?php


namespace App\Service;

use App\Service\AgeCalculator;
use App\Service\CheckAdult;


class AppServiceManager
{
    private $ageCalculator;
    private $checkAdult;
    private $age;

    public function __construct(AgeCalculator $ageCalculator, CheckAdult $checkAdult)
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
        $isAdult = $this->checkAdult->checkAdult($this->age);

        return $isAdult;
    }

}