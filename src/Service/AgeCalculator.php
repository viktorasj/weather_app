<?php


namespace App\Service;


use App\Services\NumberFormatterInterface;

class AgeCalculator implements NumberFormatterInterface
{
    public function calculateAge (\DateTime $birthdate): \DateTime
    {
        $today = new \DateTime;
        $age = $today->diff($birthdate)->y;
        return $age;
    }
}