<?php


namespace App\Service;


interface AgeCalculatorInterface
{
    public function calculateAge (\DateTime $date): \DateTime;
}