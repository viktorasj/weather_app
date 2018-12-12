<?php


namespace App\Service;



class AgeCalculator
{
    public function calculateAge (\DateTime $birthdate): int
    {
        $today = new \DateTime;
        $age = $today->diff($birthdate)->y;
        return $age;
    }
}